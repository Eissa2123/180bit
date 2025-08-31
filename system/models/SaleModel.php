<?php
class SaleModel extends Model
{
   const ITEM = ',sales,';

   public function __construct()
   {
      parent::__construct();
   }

   public function index($in)
   {
      $send = array();

      $send['LSales'] = $this->select('*')
         ->from(Model::SALE)
         ->where('ISD', '0', '=')
         ->where('Code', $in['Code'], 'LIKE', 'AND')
         ->where('Customer', $in['Customers'], 'IN', 'AND')
         ->where('State', $in['States'], 'IN', 'AND')
         ->between('CAT', $in['From'], $in['To'], 'AND')
         ->between('AT', $in['ATFrom'], $in['ATTo'], 'AND')
         ->limit($in['Page'], $in['Length'])
         ->orderby('ID', false)
         ->get()->all;

      $send['Count'] = $this->limit()->get()->count;

      $send['TPR']['TTCs'] = 0.0;
      $send['TPR']['Returns'] = 0.0;
      $send['TPR']['Paids'] = 0.0;
      $send['TPR']['Rests'] = 0.0;

      if (is_array($send['LSales']) and count($send['LSales']) > 0) {

         foreach ($send['LSales'] as $KInvoice => $VInvoice) {

            $VInvoice['Customer'] = $this->select('*')
               ->from(Model::CUSTOMER)
               ->where('ID', $VInvoice['Customer'])
               ->get()->first;

            $VInvoice['State'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ID', $VInvoice['State'])
               ->get()->first;

            $VInvoice['Paids'] = $this->select('*')
               ->from(Model::SALE_PAYMENT)
               ->where('Facture', $VInvoice['ID'])
               ->where('Type', '1', '=', 'AND')
               ->where('ISD', '0', '=', 'AND')
               ->get()->sum('Amount');

            $VInvoice['Return'] = $this->select('*')
               ->from(Model::SALE_PAYMENT)
               ->where('Facture', $VInvoice['ID'])
               ->where('Type', '-1', '=', 'AND')
               ->where('ISD', '0', '=', 'AND')
               ->get()->sum('Amount');

            $VInvoice['Rest'] = (float) $VInvoice['TTC'] - (float) $VInvoice['Return'] - (float) $VInvoice['Paids'];

            $send['TPR']['TTCs'] += (float) $VInvoice['TTC'];
            $send['TPR']['Returns'] += (float) $VInvoice['Return'];
            $send['TPR']['Paids'] += (float) $VInvoice['Paids'];
            $send['TPR']['Rests'] += (float) $VInvoice['Rest'];

            $send['LSales'][$KInvoice] = $VInvoice;
         }
      }

      $send['LCustomers'] = $this->select('*')
         ->from(Model::CUSTOMER)
         ->where('ISD', '0', '=')
         ->get()->all;

      $send['LStates'] = $this->select('*')
         ->from(Model::STATE)
         ->where('ISD', '0', '=')
         ->where('Items', self::ITEM, 'LIKE', 'AND')
         ->get()->all;

      return $send;
   }

   public function print($in)
   {
      $send = array();

      switch ($in['ID']) {
         case 1:
            switch ($in['General']) {
               case 0:
                  //if($in['From'] != '' && $in['To'] != ''){
                  $send['Sales']['TTCs'] = 0;
                  $send['Sales']['Paids'] = 0;
                  $send['Sales']['Unpaids'] = 0;
                  $send['Sales']['Ruturneds'] = 0;

                  $send['LSales'] = $this->select('*')
                     ->from(Model::SALE)
                     ->where('ISD', '0', '=')
                     ->between('AT', $in['From'], $in['To'], 'AND')
                     ->orderby('ID', false)
                     ->get()->all;

                  if (is_array($send['LSales']) and count($send['LSales']) > 0) {
                     foreach ($send['LSales'] as $KSale => $VSale) {

                        $VSale['Customer'] = $this->select('*')
                           ->from(Model::CUSTOMER)
                           ->where('ID', $VSale['Customer'])
                           ->get()->first;

                        $VSale['State'] = $this->select('*')
                           ->from(Model::STATE)
                           ->where('ID', $VSale['State'])
                           ->get()->first;

                        $VSale['Paid'] = $this->select('*')
                           ->from(Model::SALE_PAYMENT)
                           ->where('Facture', $VSale['ID'], '=', 'AND')
                           ->where('Type', '1', '=', 'AND')
                           ->get()->sum('Amount');

                        $VSale['Ruturned'] = $this->select('*')
                           ->from(Model::SALE_PAYMENT)
                           ->where('Facture', $VSale['ID'], '=', 'AND')
                           ->where('Type', '-1', '=', 'AND')
                           ->get()->sum('Amount');

                        $VSale['Unpaid'] = ((float) $VSale['TTC']) - ((float) $VSale['Paid']) - ((float) $VSale['Ruturned']);
                        if ($VSale['Unpaid'] < 0) {
                           $VSale['Unpaid'] = 0;
                        }

                        $send['Sales']['TTCs'] += (float) $VSale['TTC'];
                        $send['Sales']['Paids'] += (float) $VSale['Paid'];
                        $send['Sales']['Unpaids'] += (float) $VSale['Unpaid'];
                        $send['Sales']['Ruturneds'] += (float) $VSale['Ruturned'];

                        $send['LSales'][$KSale] = $VSale;
                     }
                  }
                  //}

                  break;
               case 1:
                  if ($in['From'] != '' && $in['To'] != '') {
                     $send['Totals']['Sales'] = 0;
                     $send['Totals']['SalesReturns'] = 0;
                     $send['Totals']['CashsPayments'] = 0;
                     $send['Totals']['BankPayments'] = 0;
                     $send['Totals']['SalesUnpaids'] = 0;
                     $send['Totals']['SalesNets'] = 0;
                     $send['Totals']['SalesNetPaid'] = 0;

                     $send['LSales'] = $this->select('*')
                        ->from(Model::SALE)
                        ->where('ISD', '0', '=')
                        ->between('AT', $in['From'], $in['To'], 'AND')
                        ->orderby('ID', false)
                        ->get()->all;

                     if (is_array($send['LSales']) and count($send['LSales']) > 0) {

                        foreach ($send['LSales'] as $KSale => $VSale) {

                           $VSale['Paid'] = $this->select('*')
                              ->from(Model::SALE_PAYMENT)
                              ->where('Facture', $VSale['ID'], '=', 'AND')
                              ->where('Type', '1', '=', 'AND')
                              ->get()->sum('Amount');

                           $VSale['CashsPayments'] = $this->select('*')
                              ->from(Model::SALE_PAYMENT)
                              ->where('Facture', $VSale['ID'], '=', 'AND')
                              ->where('Type', '1', '=', 'AND')
                              ->where('Method', [1], 'IN', 'AND')
                              ->get()->sum('Amount');

                           $VSale['BankPayments'] = $this->select('*')
                              ->from(Model::SALE_PAYMENT)
                              ->where('Facture', $VSale['ID'], '=', 'AND')
                              ->where('Type', '1', '=', 'AND')
                              ->where('Method', [3, 4], 'IN', 'AND')
                              ->get()->sum('Amount');

                           $VSale['Ruturned'] = $this->select('*')
                              ->from(Model::SALE_PAYMENT)
                              ->where('Facture', $VSale['ID'], '=', 'AND')
                              ->where('Type', '-1', '=', 'AND')
                              ->get()->sum('Amount');

                           $VSale['SalesUnpaids'] = ((float) $VSale['TTC']) - ((float) $VSale['CashsPayments']) - ((float) $VSale['BankPayments']) - ((float) $VSale['Ruturned']);
                           if ($VSale['SalesUnpaids'] < 0) {
                              $VSale['SalesUnpaids'] = 0;
                           }

                           $VSale['SalesNets'] = ((float) $VSale['TTC']) - ((float) $VSale['Ruturned']);
                           $VSale['SalesNetPaid'] = ((float) $VSale['SalesNets']) - ((float) $VSale['SalesUnpaids']);

                           $send['Totals']['Sales'] += (float) $VSale['TTC'];
                           $send['Totals']['SalesReturns'] += (float) $VSale['Ruturned'];
                           $send['Totals']['CashsPayments'] += (float) $VSale['CashsPayments'];
                           $send['Totals']['BankPayments'] += (float) $VSale['BankPayments'];
                           $send['Totals']['SalesUnpaids'] += (float) $VSale['SalesUnpaids'];
                           $send['Totals']['SalesNets'] += (float) $VSale['SalesNets'];
                           $send['Totals']['SalesNetPaid'] += (float) $VSale['SalesNetPaid'];

                           $send['LSales'][$KSale] = $VSale;
                        }
                     }
                  }
                  break;
            }
            break;
         case 2:
            switch ($in['General']) {
               case 0:
                  $send['Sales']['Amounts'] = 0;
                  $send['Totals']['Sales'] = 0;

                  $send['LCustomers'] = array();

                  //if($in['From'] != '' && $in['To'] != ''){
                  $send['LCustomers'] = $this->select('*')
                     ->from(Model::CUSTOMER)
                     ->where('ISD', '0', '=')
                     ->orderby('ID', false)
                     ->get()->all;

                  if (is_array($send['LCustomers']) and count($send['LCustomers']) > 0) {
                     foreach ($send['LCustomers'] as $KCustomer => $VCustomer) {

                        $VCustomer['Sales'] = $this->select('*')
                           ->from(Model::SALE)
                           ->where('ISD', '0', '=')
                           ->between('AT', $in['From'], $in['To'], 'AND')
                           ->where('Customer', $VCustomer['ID'], '=', 'AND')
                           ->orderby('ID', false)
                           ->get()->all;

                        $VCustomer['Payements'] = 0;

                        if (is_array($VCustomer['Sales']) and count($VCustomer['Sales']) > 0) {
                           foreach ($VCustomer['Sales'] as $KSale => $VSale) {
                              $VSale['Payements'] = $this->select('*')
                                 ->from(Model::SALE_PAYMENT)
                                 ->where('Facture', $VSale['ID'], '=', 'AND')
                                 ->where('Method', $in['Methods'], 'IN', 'AND')
                                 //->where('Type', '1', '=', 'AND')
                                 ->get()->all;

                              if (is_array($VSale['Payements']) and count($VSale['Payements']) > 0) {
                                 foreach ($VSale['Payements'] as $KPayement => $VPayement) {

                                    $VPayement['Method'] = $this->select('*')
                                       ->from(Model::METHOD)
                                       ->where('ID', $VPayement['Method'], '=', 'AND')
                                       ->get()->first;

                                    if ($VPayement['Type'] == '1') {
                                       //$VPayement['Amount'] = $VPayement['Amount'];
                                    } else {
                                       $VPayement['Amount'] = ((float) $VPayement['Amount']) * (-1);
                                    }

                                    $send['Totals']['Sales'] += (float) $VPayement['Amount'];
                                    $VCustomer['Payements'] += (float) $VPayement['Amount'];
                                    $VSale['Payements'][$KPayement] = $VPayement;
                                 }
                              }

                              $VCustomer['Sales'][$KSale] = $VSale;
                           }

                           $send['LCustomers'][$KCustomer] = $VCustomer;

                           if ($VCustomer['Payements'] <= 0) {
                              unset($send['LCustomers'][$KCustomer]);
                           }
                        } else {
                           unset($send['LCustomers'][$KCustomer]);
                        }
                     }
                  }
                  //}
                  break;

               case 1:
                  $send['LPayements'] = $this->select('*')
                     ->from(Model::SALE_PAYMENT)
                     ->where('Method', $in['Methods'], 'IN', 'AND')
                     ->between('AT', $in['From'], $in['To'], 'AND')
                     //->where('Type', '1', '=', 'AND')
                     ->get()->all;

                  $send['Totals']['Paids'] = 0;

                  if (is_array($send['LPayements']) and count($send['LPayements']) > 0) {
                     foreach ($send['LPayements'] as $KPayement => $VPayement) {
                        if ($VPayement['Type'] == '1') {
                           //$VPayement['Amount'] = $VPayement['Amount'];
                        } else {
                           $VPayement['Amount'] = ((float) $VPayement['Amount']) * (-1);
                        }
                        $send['Totals']['Paids'] += ((float) $VPayement['Amount']);
                        $send['LPayements'][$KPayement] = $VPayement;
                     }
                  }

                  break;
            }
            break;
         case 3:
            switch ($in['General']) {
               case 0:
                  $send['Totals']['Paid'] = 0;
                  $send['Totals']['Unpaid'] = 0;

                  $send['LCustomers'] = $this->select('*')
                     ->from(Model::CUSTOMER)
                     ->where('ISD', '0', '=')
                     ->orderby('ID', false)
                     ->get()->all;

                  if (is_array($send['LCustomers']) and count($send['LCustomers']) > 0) {
                     foreach ($send['LCustomers'] as $KCustomer => $VCustomer) {

                        $VCustomer['Sales'] = $this->select('*')
                           ->from(Model::SALE)
                           ->where('ISD', '0', '=')
                           ->between('AT', $in['From'], $in['To'], 'AND')
                           ->where('Customer', $VCustomer['ID'], '=', 'AND')
                           ->orderby('ID', false)
                           ->get()->all;

                        if (is_array($VCustomer['Sales']) and count($VCustomer['Sales']) > 0) {
                           $VCustomer['Paid'] = 0;
                           $VCustomer['Unpaid'] = 0;
                           foreach ($VCustomer['Sales'] as $KSale => $VSale) {
                              $VSale['Paid'] = $this->select('*')
                                 ->from(Model::SALE_PAYMENT)
                                 ->where('Facture', $VSale['ID'], '=', 'AND')
                                 ->where('Type', '1', '=', 'AND')
                                 ->get()->sum('Amount');

                              $VSale['Retured'] = $this->select('*')
                                 ->from(Model::SALE_PAYMENT)
                                 ->where('Facture', $VSale['ID'], '=', 'AND')
                                 ->where('Type', '-1', '=', 'AND')
                                 ->get()->sum('Amount');

                              $VSale['Unpaid'] = ((float) $VSale['TTC']) - ((float) $VSale['Paid']) - ((float) $VSale['Retured']);

                              if ($VSale['Unpaid'] < 0) {
                                 $VSale['Unpaid'] = 0;
                              }

                              $VCustomer['Paid'] += ((float) $VSale['Paid']);
                              $VCustomer['Unpaid'] += ((float) $VSale['Unpaid']);

                              $VCustomer['Sales'][$KSale] = $VSale;

                              if ($VSale['Unpaid'] <= 0) {
                                 unset($VCustomer['Sales'][$KSale]);
                              }
                           }

                           $send['Totals']['Paid'] += ((float) $VCustomer['Paid']);
                           $send['Totals']['Unpaid'] += ((float) $VCustomer['Unpaid']);

                           $send['LCustomers'][$KCustomer] = $VCustomer;

                           if ($VCustomer['Unpaid'] <= 0.0) {
                              unset($send['LCustomers'][$KCustomer]);
                           }
                        } else {
                           unset($send['LCustomers'][$KCustomer]);
                        }
                     }
                  }
                  break;
               case 1:
                  $send['Totals']['Paid'] = 0;
                  $send['Totals']['Unpaid'] = 0;

                  $send['LCustomers'] = array();

                  //if($in['From'] != '' && $in['To'] != ''){
                  $send['LCustomers'] = $this->select('*')
                     ->from(Model::CUSTOMER)
                     ->where('ISD', '0', '=')
                     ->orderby('ID', false)
                     ->get()->all;

                  if (is_array($send['LCustomers']) and count($send['LCustomers']) > 0) {
                     foreach ($send['LCustomers'] as $KCustomer => $VCustomer) {

                        $VCustomer['Sales'] = $this->select('*')
                           ->from(Model::SALE)
                           ->where('ISD', '0', '=')
                           ->between('AT', $in['From'], $in['To'], 'AND')
                           ->where('Customer', $VCustomer['ID'], '=', 'AND')
                           ->orderby('ID', false)
                           ->get()->all;

                        if (is_array($VCustomer['Sales']) and count($VCustomer['Sales']) > 0) {
                           $VCustomer['Paid'] = 0;
                           $VCustomer['Unpaid'] = 0;
                           foreach ($VCustomer['Sales'] as $KSale => $VSale) {
                              $VSale['Paid'] = $this->select('*')
                                 ->from(Model::SALE_PAYMENT)
                                 ->where('Facture', $VSale['ID'], '=', 'AND')
                                 ->where('Type', '1', '=', 'AND')
                                 ->get()->sum('Amount');

                              $VSale['Retured'] = $this->select('*')
                                 ->from(Model::SALE_PAYMENT)
                                 ->where('Facture', $VSale['ID'], '=', 'AND')
                                 ->where('Type', '-1', '=', 'AND')
                                 ->get()->sum('Amount');

                              $VSale['Unpaid'] = ((float) $VSale['TTC']) - ((float) $VSale['Paid']) - ((float) $VSale['Retured']);

                              if ($VSale['Unpaid'] <= 0) {
                                 unset($VCustomer['Sales'][$KSale]);
                              } else {
                                 $VCustomer['Paid'] += ((float) $VSale['Paid']);
                                 $VCustomer['Unpaid'] += ((float) $VSale['Unpaid']);

                                 $VCustomer['Sales'][$KSale] = $VSale;
                              }
                           }

                           $send['Totals']['Paid'] += ((float) $VCustomer['Paid']);
                           $send['Totals']['Unpaid'] += ((float) $VCustomer['Unpaid']);

                           $send['LCustomers'][$KCustomer] = $VCustomer;
                        } else {
                           unset($send['LCustomers'][$KCustomer]);
                        }
                     }
                  }
                  //}
                  break;
            }
            break;
         case 4:
            switch ($in['General']) {
               case 0:
                  $send['Totals']['OpretionDebit'] = 0;
                  $send['Totals']['OpretionCredit'] = 0;
                  $send['Totals']['BalanceDebit'] = 0;
                  $send['Totals']['BalanceCredit'] = 0;

                  $send['LCustomers'] = array();

                  //if($in['From'] != '' && $in['To'] != ''){

                  $send['LCustomers'] = $this->select('*')
                     ->from(Model::CUSTOMER)
                     ->where('ISD', '0', '=')
                     ->where('ID', $in['Customers'], 'IN', 'AND')
                     ->orderby('ID', false)
                     ->get()->all;

                  if (is_array($send['LCustomers']) and count($send['LCustomers']) > 0) {
                     foreach ($send['LCustomers'] as $KCustomer => $VCustomer) {

                        $Statements = array();

                        $VCustomer['Balances'] = $this->select('*')
                           ->from(Model::BALANCES_CUSTOMERS)
                           ->where('ISD', '0', '=')
                           ->where('Customer', $VCustomer['ID'], '=', 'AND')
                           ->between('AT', $in['From'], $in['To'], 'AND')
                           ->get()->all;

                        if (is_array($VCustomer['Balances']) and count($VCustomer['Balances']) > 0) {
                           foreach ($VCustomer['Balances'] as $KBalance => $VBalance) {
                              $Statement = array();

                              $Statement['ID'] = $VBalance['ID'];
                              $Statement['Code'] = $VBalance['Code'];
                              $Statement['Description'] = 'رصيد افتتاحي';
                              $Statement['AT'] = $VBalance['AT'];
                              $Statement['CAT'] = $VBalance['CAT'];
                              $Statement['Type'] = 'Balance';
                              $Statement['Opretion']['Debit'] = ((float) $VBalance['Amount']);
                              $Statement['Opretion']['Credit'] = 0;
                              $Statement['Balance']['Debit'] = 0;
                              $Statement['Balance']['Credit'] = 0;

                              $Statements[] = $Statement;
                           }
                        }

                        $VCustomer['Sales'] = $this->select('*')
                           ->from(Model::SALE)
                           ->where('ISD', '0', '=')
                           ->where('Customer', $VCustomer['ID'], '=', 'AND')
                           ->between('AT', $in['From'], $in['To'], 'AND')
                           ->orderby('ID', false)
                           ->get()->all;

                        if (is_array($VCustomer['Sales']) and count($VCustomer['Sales']) > 0) {
                           foreach ($VCustomer['Sales'] as $KSale => $VSale) {
                              $Statement = array();

                              $Statement['ID'] = $VSale['ID'];
                              $Statement['Code'] = $VSale['Code'];
                              $Statement['Description'] = $VSale['Code'] . ' فاتورة رقم';
                              $Statement['AT'] = $VSale['AT'];
                              $Statement['CAT'] = $VSale['CAT'];
                              $Statement['Type'] = 'Sale';
                              $Statement['Opretion']['Debit'] = ((float) $VSale['TTC']);
                              $Statement['Opretion']['Credit'] = 0;
                              $Statement['Balance']['Debit'] = 0;
                              $Statement['Balance']['Credit'] = 0;

                              $Statements[] = $Statement;
                           }
                        }

                        $VCustomer['Payements'] = $this->select('*')
                           ->from(Model::SALE_PAYMENT)
                           ->where('Customer', $VCustomer['ID'], '=', 'AND')
                           ->between('AT', $in['From'], $in['To'], 'AND')
                           ->get()->all;

                        if (is_array($VCustomer['Payements']) and count($VCustomer['Payements']) > 0) {
                           foreach ($VCustomer['Payements'] as $KPayement => $VPayement) {
                              $Statement = array();

                              $sale = $this->select('*')
                                 ->from(Model::SALE)
                                 ->where('ISD', '0', '=')
                                 ->where('ID', $VPayement['Facture'], '=', 'AND')
                                 ->between('AT', $in['From'], $in['To'], 'AND')
                                 ->orderby('ID', false)
                                 ->get()->first;

                              $Statement['ID'] = $VPayement['ID'];
                              $Statement['Code'] = $VPayement['Code'];
                              if ($VPayement['Type'] == 1) {
                                 $Statement['Description'] = $sale['Code'] . ' مدفوعات العميل لفاتورة رقم';
                                 $Statement['Opretion']['Debit'] = 0;
                                 $Statement['Opretion']['Credit'] = ((float) $VPayement['Amount']);
                                 $Statement['Balance']['Debit'] = 0;
                                 $Statement['Balance']['Credit'] = 0;
                              } else {
                                 $Statement['Description'] = $sale['Code'] . ' مرتجعات العميل لفاتورة رقم';
                                 $Statement['Opretion']['Debit'] = 0;
                                 $Statement['Opretion']['Credit'] = ((float) $VPayement['Amount']);
                                 $Statement['Balance']['Debit'] = 0;
                                 $Statement['Balance']['Credit'] = 0;
                              }
                              $Statement['AT'] = $VPayement['AT'];
                              $Statement['CAT'] = $VPayement['CAT'];
                              $Statement['Type'] = 'Payement';

                              $Statements[] = $Statement;
                           }
                        }

                        $VCustomer['OpretionDebit'] = 0;
                        $VCustomer['OpretionCredit'] = 0;
                        $VCustomer['BalanceDebit'] = 0;
                        $VCustomer['BalanceCredit'] = 0;

                        $VCustomer['Statements'] = $Statements;

                        if (is_array($VCustomer['Statements']) and count($VCustomer['Statements']) > 0) {
                           $Balance = 0;
                           $i = 0;
                           foreach ($VCustomer['Statements'] as $KStatement => $VStatement) {

                              $ODebit = ((float) $VStatement['Opretion']['Debit']);
                              $OCredit = ((float) $VStatement['Opretion']['Credit']);

                              if ($i == 0) {
                                 if ($ODebit > 0.0) {
                                    $Balance = $ODebit;
                                 } elseif ($OCredit >= 0.0) {
                                    $Balance = (-1) * $OCredit;
                                 }
                              } else {
                                 if ($ODebit > 0.0) {
                                    $Balance += $ODebit;
                                 } elseif ($OCredit >= 0.0) {
                                    $Balance += (-1) * $OCredit;
                                 }
                              }

                              if ($Balance >= 0.0) {
                                 $VStatement['Balance']['Debit'] = $Balance;
                              } else {
                                 $VStatement['Balance']['Credit'] = (-1) * $Balance;
                              }

                              $VCustomer['OpretionDebit'] += ((float) $VStatement['Opretion']['Debit']);
                              $VCustomer['OpretionCredit'] += ((float) $VStatement['Opretion']['Credit']);
                              $VCustomer['BalanceDebit'] += ((float) $VStatement['Balance']['Debit']);
                              $VCustomer['BalanceCredit'] += ((float) $VStatement['Balance']['Credit']);

                              $VCustomer['Statements'][$KStatement] = $VStatement;

                              $i++;
                           }

                           $send['Totals']['OpretionDebit'] += $VCustomer['OpretionDebit'];
                           $send['Totals']['OpretionCredit'] += $VCustomer['OpretionCredit'];
                           $send['Totals']['BalanceDebit'] += $VCustomer['BalanceDebit'];
                           $send['Totals']['BalanceCredit'] += $VCustomer['BalanceCredit'];

                           $send['LCustomers'][$KCustomer] = $VCustomer;
                        } else {
                           unset($send['LCustomers'][$KCustomer]);
                        }
                     }
                  }
                  //}
                  break;
            }
            break;
         case 5:
            switch ($in['General']) {
               case 0:
                  $send['Totals']['Sales'] = 0;
                  $send['Totals']['Rutruns'] = 0;
                  $send['Totals']['Nets'] = 0;
                  $send['Totals']['Paids'] = 0;
                  $send['Totals']['Inpaids'] = 0;

                  $send['LCustomers'] = array();

                  //if($in['From'] != '' && $in['To'] != ''){
                  $send['LCustomers'] = $this->select('*')
                     ->from(Model::CUSTOMER)
                     ->where('ISD', '0', '=')
                     ->where('ID', $in['Customers'], 'IN', 'AND')
                     ->orderby('ID', false)
                     ->get()->all;

                  if (is_array($send['LCustomers']) and count($send['LCustomers']) > 0) {
                     foreach ($send['LCustomers'] as $KCustomer => $VCustomer) {

                        $VCustomer['Sales'] = $this->select('*')
                           ->from(Model::SALE)
                           ->where('ISD', '0', '=')
                           ->between('AT', $in['From'], $in['To'], 'AND')
                           ->where('Customer', $VCustomer['ID'], '=', 'AND')
                           ->orderby('ID', false)
                           ->get()->sum('TTC');

                        $VCustomer['Rutruns'] = $this->select('*')
                           ->from(Model::SALE_PAYMENT)
                           ->where('ISD', '0', '=')
                           ->between('AT', $in['From'], $in['To'], 'AND')
                           ->where('Customer', $VCustomer['ID'], '=', 'AND')
                           ->where('Type', '-1', '=', 'AND')
                           ->orderby('ID', false)
                           ->get()->sum('Amount');

                        $VCustomer['Nets'] = ((float) $VCustomer['Sales']) - ((float) $VCustomer['Rutruns']);

                        $VCustomer['Paids'] = $this->select('*')
                           ->from(Model::SALE_PAYMENT)
                           ->where('ISD', '0', '=')
                           ->between('AT', $in['From'], $in['To'], 'AND')
                           ->where('Customer', $VCustomer['ID'], '=', 'AND')
                           ->where('Type', '1', '=', 'AND')
                           ->orderby('ID', false)
                           ->get()->sum('Amount');

                        $VCustomer['Paids'] = ((float) $VCustomer['Paids']) - ((float) $VCustomer['Rutruns']);
                        $VCustomer['Inpaids'] = ((float) $VCustomer['Nets']) - ((float) $VCustomer['Paids']);
                        if ($VCustomer['Inpaids'] < 0) {
                           $VCustomer['Inpaids'] = 0;
                        }

                        $send['LCustomers'][$KCustomer] = $VCustomer;

                        $send['Totals']['Sales'] += ((float) $VCustomer['Sales']);
                        $send['Totals']['Rutruns'] += ((float) $VCustomer['Rutruns']);
                        $send['Totals']['Nets'] += ((float) $VCustomer['Nets']);
                        $send['Totals']['Paids'] += ((float) $VCustomer['Paids']);
                        $send['Totals']['Inpaids'] += ((float) $VCustomer['Inpaids']);

                        if ($VCustomer['Sales'] > 0) {
                        } else {
                           unset($send['LCustomers'][$KCustomer]);
                        }
                     }
                  }
                  //}

                  break;
            }
            break;
         case 6:
            switch ($in['General']) {
               case 0:
                  $send['Totals']['TTCs'] = 0;
                  $send['Totals']['Rutruns'] = 0;
                  $send['Totals']['Nets'] = 0;
                  $send['Totals']['Paids'] = 0;
                  $send['Totals']['Inpaids'] = 0;

                  $send['LCustomers'] = array();

                  //if($in['From'] != '' && $in['To'] != ''){
                  $send['LCustomers'] = $this->select('*')
                     ->from(Model::CUSTOMER)
                     ->where('ISD', '0', '=')
                     ->where('ID', $in['Customers'], 'IN', 'AND')
                     ->orderby('ID', false)
                     ->get()->all;

                  if (is_array($send['LCustomers']) and count($send['LCustomers']) > 0) {
                     foreach ($send['LCustomers'] as $KCustomer => $VCustomer) {

                        $VCustomer['Sales'] = $this->select('*')
                           ->from(Model::SALE)
                           ->where('ISD', '0', '=')
                           ->between('AT', $in['From'], $in['To'], 'AND')
                           ->where('Customer', $VCustomer['ID'], '=', 'AND')
                           ->orderby('ID', false)
                           ->get()->all;

                        $VCustomer['TTCs'] = 0;
                        $VCustomer['Rutruns'] = 0;
                        $VCustomer['Nets'] = 0;
                        $VCustomer['Paids'] = 0;
                        $VCustomer['Inpaids'] = 0;

                        if (is_array($VCustomer['Sales']) and count($VCustomer['Sales']) > 0) {
                           foreach ($VCustomer['Sales'] as $KSale => $VSale) {
                              $VSale['Rutruns'] = $this->select('*')
                                 ->from(Model::SALE_PAYMENT)
                                 ->where('Facture', $VSale['ID'], '=', 'AND')
                                 ->where('Type', '-1', '=', 'AND')
                                 ->get()->sum('Amount');

                              $VSale['Paids'] = $this->select('*')
                                 ->from(Model::SALE_PAYMENT)
                                 ->where('Facture', $VSale['ID'], '=', 'AND')
                                 ->where('Type', '1', '=', 'AND')
                                 ->get()->sum('Amount');

                              $VSale['Nets'] = ((float) $VSale['TTC']) - ((float) $VSale['Rutruns']);
                              $VSale['Inpaids'] = ((float) $VSale['Nets']) - ((float) $VSale['Paids']);

                              if ($VSale['Inpaids'] < 0) {
                                 $VSale['Inpaids'] = 0;
                              }

                              $VCustomer['TTCs'] += ((float) $VSale['TTC']);
                              $VCustomer['Rutruns'] += ((float) $VSale['Rutruns']);
                              $VCustomer['Nets'] += ((float) $VSale['Nets']);
                              $VCustomer['Paids'] += ((float) $VSale['Paids']);
                              $VCustomer['Inpaids'] += ((float) $VSale['Inpaids']);

                              $VCustomer['Sales'][$KSale] = $VSale;
                           }

                           $send['Totals']['TTCs'] += ((float) $VCustomer['TTCs']);
                           $send['Totals']['Rutruns'] += ((float) $VCustomer['Rutruns']);
                           $send['Totals']['Nets'] += ((float) $VCustomer['Nets']);
                           $send['Totals']['Paids'] += ((float) $VCustomer['Paids']);
                           $send['Totals']['Inpaids'] += ((float) $VCustomer['Inpaids']);

                           $send['LCustomers'][$KCustomer] = $VCustomer;
                        } else {
                           unset($send['LCustomers'][$KCustomer]);
                        }
                     }
                  }
                  //}
                  break;
               case 1:
                  $send['Totals']['TTCs'] = 0;
                  $send['Totals']['Rutruns'] = 0;
                  $send['Totals']['Nets'] = 0;
                  $send['Totals']['Paids'] = 0;
                  $send['Totals']['Inpaids'] = 0;

                  $send['LCustomers'] = array();

                  //if($in['From'] != '' && $in['To'] != ''){
                  $send['LCustomers'] = $this->select('*')
                     ->from(Model::CUSTOMER)
                     ->where('ISD', '0', '=')
                     ->where('ID', $in['Customers'], 'IN', 'AND')
                     ->orderby('ID', false)
                     ->get()->all;

                  if (is_array($send['LCustomers']) and count($send['LCustomers']) > 0) {
                     foreach ($send['LCustomers'] as $KCustomer => $VCustomer) {

                        $VCustomer['Sales'] = $this->select('*')
                           ->from(Model::SALE)
                           ->where('ISD', '0', '=')
                           ->between('AT', $in['From'], $in['To'], 'AND')
                           ->where('Customer', $VCustomer['ID'], '=', 'AND')
                           ->orderby('ID', false)
                           ->get()->all;

                        $VCustomer['TTCs'] = 0;
                        $VCustomer['Rutruns'] = 0;
                        $VCustomer['Nets'] = 0;
                        $VCustomer['Paids'] = 0;
                        $VCustomer['Inpaids'] = 0;

                        if (is_array($VCustomer['Sales']) and count($VCustomer['Sales']) > 0) {
                           foreach ($VCustomer['Sales'] as $KSale => $VSale) {
                              $VSale['Rutruns'] = $this->select('*')
                                 ->from(Model::SALE_PAYMENT)
                                 ->where('Facture', $VSale['ID'], '=', 'AND')
                                 ->where('Type', '-1', '=', 'AND')
                                 ->get()->sum('Amount');

                              $VSale['Paids'] = $this->select('*')
                                 ->from(Model::SALE_PAYMENT)
                                 ->where('Facture', $VSale['ID'], '=', 'AND')
                                 ->where('Type', '1', '=', 'AND')
                                 ->get()->sum('Amount');

                              $VSale['Nets'] = ((float) $VSale['TTC']) - ((float) $VSale['Rutruns']);
                              $VSale['Inpaids'] = ((float) $VSale['Nets']) - ((float) $VSale['Paids']);

                              if ($VSale['Inpaids'] < 0) {
                                 $VSale['Inpaids'] = 0;
                              }

                              $VCustomer['TTCs'] += ((float) $VSale['TTC']);
                              $VCustomer['Rutruns'] += ((float) $VSale['Rutruns']);
                              $VCustomer['Nets'] += ((float) $VSale['Nets']);
                              $VCustomer['Paids'] += ((float) $VSale['Paids']);
                              $VCustomer['Inpaids'] += ((float) $VSale['Inpaids']);

                              $VCustomer['Sales'][$KSale] = $VSale;
                           }

                           $send['Totals']['TTCs'] += ((float) $VCustomer['TTCs']);
                           $send['Totals']['Rutruns'] += ((float) $VCustomer['Rutruns']);
                           $send['Totals']['Nets'] += ((float) $VCustomer['Nets']);
                           $send['Totals']['Paids'] += ((float) $VCustomer['Paids']);
                           $send['Totals']['Inpaids'] += ((float) $VCustomer['Inpaids']);

                           $send['LCustomers'][$KCustomer] = $VCustomer;
                        } else {
                           unset($send['LCustomers'][$KCustomer]);
                        }
                     }
                  }
                  //}
                  break;
            }
            break;
      }

      return $send;
   }

   public function display($in)
   {
      $send = array();

      $send['Cells'] = $this->select('*')
         ->from(Model::SALE)
         ->where('ID', $in['ID'], '=')
         ->where('ISD', '0', '=', 'AND')
         ->get()->first;

      if (L($send, 'Cells')) {

         $Cells = $send['Cells'];

         $Cells['Customer'] = $this->select('*')
            ->from(Model::CUSTOMER)
            ->where('ID', $Cells['Customer'])
            ->get()->first;

         $Cells['Method'] = $this->select('*')
            ->from(Model::METHOD)
            ->where('ID', $Cells['Method'])
            ->get()->first;

         $Cells['State'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', $Cells['State'])
            ->get()->first;

         $Cells['Cobon'] = $this->select('*')
            ->from(Model::COBON)
            ->where('ID', $Cells['Cobon'])
            ->get()->first;

         $Cells['Products'] = $this->select('*')
            ->from(Model::SALE_DETAIL)
            ->where('Facture', $Cells['ID'])
            ->get()->all;

         $Cells['Terms'] = explode(',', $Cells['Terms']);

         $Cells['LTerms'] =  $this->select('*')
            ->from(Model::TERM)
            ->where('ISD', '0', '=')
            ->get()->all;

         $Cells['Payments'] =  $this->select('*')
            ->from(Model::SALE_PAYMENT)
            ->where('ISD', '0', '=')
            ->where('Type', '1', '=', 'AND')
            ->where('Facture', $Cells['ID'], '=', 'AND')
            ->get()->all;

         if (L($Cells, 'Products')) {
            foreach ($Cells['Products'] as $KProduct => $VProduct) {

               $VProduct['Product'] = $this->select('*')
                  ->from(Model::PRODUCT)
                  ->where('ID', $VProduct['Product'])
                  ->get()->first;

               $ht = ((float) $VProduct['Price']) * ((float) $VProduct['Quantity']);
               $tax = ($ht / 100) * ((float) $Cells['TVA']);
               $VProduct['Tax'] = $tax;
               $VProduct['HT'] = $ht + $tax;

               $Cells['Products'][$KProduct] = $VProduct;
            }
         }

         if (L($Cells, 'Payments')) {
            foreach ($Cells['Payments'] as $KPayment => $VPayment) {
               $Cells['Payments'][$KPayment]['Method'] = $this->select('*')
                  ->from(Model::METHOD)
                  ->where('ID', $VPayment['Method'])
                  ->get()->first;

               $Cells['Payments'][$KPayment]['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VPayment['State'])
                  ->get()->first;
            }
         }

         $Cells['Amounts'] = $this->select('*')
            ->from(Model::SALE_PAYMENT)
            ->where('Facture', $Cells['ID'])
            ->where('Type', '1', '=', 'AND')
            ->where('ISD', '0', '=', 'AND')
            ->get()->sum('Amount');

         $Cells['Paids'] = (float) $Cells['Amounts'];

         $Cells['Return'] = $this->select('*')
            ->from(Model::SALE_PAYMENT)
            ->where('Facture', $Cells['ID'])
            ->where('Type', '-1', '=', 'AND')
            ->where('ISD', '0', '=', 'AND')
            ->get()->sum('Amount');

         $Cells['Rest'] = (float) $Cells['TTC'] - ((float) $Cells['Return'] + (float) $Cells['Paids']);

         $send['Cells'] = $Cells;
      }

      return $send;
   }

   public function add($in)
   {
      $send = array();

      $send['LCustomers'] = $this->select('*')
         ->from(Model::CUSTOMER)
         ->where('ISD', '0', '=')
         ->get()->all;

      $send['LTerms'] = $this->select('*')
         ->from(Model::TERM)
         ->where('ISD', '0', '=')
         ->where('State', '2', '=', 'AND')
         ->get()->all;

      $send['Setting'] = $this->select('*')
         ->from(Model::SETTING)
         ->get()->first;

      $send['LCobons'] = $this->select('*')
         ->from(Model::COBON)
         ->where('ISD', '0', '=')
         ->orderby('ID', true)
         ->get()->all;

      $send['LProducts'] = $this->select('*')
         ->from(Model::PRODUCT)
         ->where('ISD', '0', '=')
         ->where('Nature', [1, 3], 'IN', 'AND')
         ->where('State', '2', '=', 'AND')
         ->get()->all;

      if (L($send, 'LProducts')) {
         foreach ($send['LProducts'] as $KProduct => $VProduct) {
            $send['LProducts'][$KProduct]['Category'] = $this->select('*')
               ->from(Model::CATEGORIE)
               ->where('ID', $VProduct['Category'])
               ->get()->first;
         }
      }

      $send['LCategories'] = $this->select('*')
         ->from(Model::CATEGORIE)
         ->where('ISD', '0', '=')
         ->get()->all;

      $send['LMethods'] = $this->select('*')
         ->from(Model::METHOD)
         ->where('ISD', '0', '=')
         ->where('State', '2', '=', 'AND')
         ->get()->all;

      $send['LStates'] = $this->select('*')
         ->from(Model::STATE)
         ->where('ISD', '0', '=')
         ->where('Items', self::ITEM, 'LIKE', 'AND')
         ->get()->all;

      if (isset($in['ID'])) {

         $send['LPosts'] = $this->select('*')
            ->from(Model::SALE_QUOTATION)
            ->where('ISD', '0', '=')
            ->where('ID', $in['ID'], '=', 'AND')
            ->get()->first;

         if (L($send, 'LPosts')) {
            $Cells = $send['LPosts'];

            $Cells['Terms'] = explode(',', $Cells['Terms']);
            $Cells['Products'] = $this->select('*')
               ->from(Model::SALE_QUOTATION_DETAIL)
               ->where('Facture', $in['ID'], '=', 'AND')
               ->get()->all;

            if (L($Cells, 'Products')) {
               foreach ($Cells['Products'] as $KProduct => $VProduct) {
                  $VProduct['Product'] = $this->select('ID, Code, Name, Price')
                     ->from(Model::PRODUCT)
                     ->where('ID', $VProduct['Product'])
                     ->get()->first;

                  $VProduct['REF'] = $VProduct['ID'];
                  $VProduct['ID'] = $VProduct['Product']['ID'];
                  $VProduct['Code'] = $VProduct['Product']['Code'];
                  $VProduct['Name'] = $VProduct['Product']['Name'];
                  $VProduct['Price'] = $VProduct['Product']['Price'];

                  $Cells['Products'][$KProduct] = $VProduct;
               }
            }
            $send['LPosts'] = $Cells;
         }
      }

      return $send;
   }

   public function insert($in)
   {

      $send = array();
      $in['Products'] = $in['Products'] ?? [];

      $Customer = $this->select('*')
         ->from(Model::CUSTOMER)
         ->where('ID', $in['Customer'], '=')
         ->where('ISD', '0', '=', 'AND')
         ->get()->first;

      if ($Customer === null) {
         $send['Errors'][] = 'Customer';
      }

      $Cobon = $this->select('*')
         ->from(Model::COBON)
         ->where('ID', $in['Cobon'], '=')
         ->where('ISD', '0', '=', 'AND')
         ->get()->first;

      if ($Cobon === null) {
         $send['Errors'][] = 'Cobon';
      }

      if ($in['Paid'] == 0) {
         $in['State'] = 14;
      } elseif ($in['Rest'] == 0) {
         $in['State'] = 15;
      } elseif ($in['Paid'] > 0 and $in['Rest'] > 0) {
         $in['State'] = 16;
      }

      $State = $this->select('*')
         ->from(Model::STATE)
         ->where('ID', $in['State'], '=')
         ->where('ISD', '0', '=', 'AND')
         ->get()->first;

      if ($State === null) {
         $send['Errors'][] = 'State';
      }

      foreach ($in['Products'] as $product) {
         $product = $this->select('*')
            ->from(Model::PRODUCT)
            ->where('ID', $product['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if ($product === null) {
            $send['Errors'][] = 'Product';
            break;
         }
      }
      if (is_array($in['Terms']) and count($in['Terms']) > 0) {
         foreach ($in['Terms'] as $term) {
            $term = $this->select('*')
               ->from(Model::TERM)
               ->where('ID', $term, '=')
               ->where('ISD', '0', '=', 'AND')
               ->where('State', '2', '=', 'AND')
               ->get()->first;

            if ($term === null) {
               $send['Errors'][] = 'Term';
               break;
            }
         }
         $in['Terms'] = implode(',', $in['Terms']);
      } else {
         $in['Terms'] = '';
      }

      $code = isset($in['Code']) ? trim((string)$in['Code']) : '';
      if ($code !== '') {
         $Sale = $this->select('*')
            ->from(Model::SALE)
            ->where('Code', $code, '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if ($Sale !== null) {
            $send['Errors'][] = 'Sale';
         }
      }


      if (!L($send, 'Errors')) {
         $Products = $in['Products'];
         $Facture = $in;
         unset($Facture['Products']);

         //$Facture['Paid'] = 0;
         $Facture['Method'] = 1;
         $send['Success'] = $this->into(Model::SALE)->set($Facture)->save();
         if ($send['Success'] === true) {
            $send['Cells'] =  $this->select('*')
               ->from(Model::SALE)
               ->where('ID', $this->lastid())
               ->get()->first;

            foreach ($Products as $KProduct => $VProduct) {

               $VProduct['Facture'] = $send['Cells']['ID'];
               $VProduct['Product'] = $VProduct['ID'];

               unset($VProduct['Code']);
               unset($VProduct['Name']);
               unset($VProduct['ID']);

               $Products[$KProduct] = $VProduct;

               $this->into(Model::SALE_DETAIL)->set($VProduct)->save();
            }

            if ($in['PaidMonetary'] > 0.0) {
               $payment = array();

               $payment['Facture'] = $send['Cells']['ID'];
               $payment['Amount'] = $in['PaidMonetary'];
               $payment['Method'] = 1;
               $payment['Customer'] = $in['Customer'];
               $payment['Type'] = 1;
               $payment['AT'] = $in['AT'];
               $payment['State'] = 15;
               $payment['Member'] = 1;

               $this->into(Model::SALE_PAYMENT)->set($payment)->save();
            }

            if ($in['PaidOnline'] > 0.0) {
               $payment = array();

               $payment['Facture'] = $send['Cells']['ID'];
               $payment['Amount'] = $in['PaidOnline'];
               $payment['Method'] = 3;
               $payment['Customer'] = $in['Customer'];
               $payment['Type'] = 1;
               $payment['AT'] = $in['AT'];
               $payment['State'] = 15;
               $payment['Member'] = 1;

               $this->into(Model::SALE_PAYMENT)->set($payment)->save();
            }
         }
      }

      return $send;
   }

   public function edit($in)
   {
      $send = array();
      $send = array_merge($send, $this->display($in));
      if (L($send, 'Cells')) {
         $Cells = $send['Cells'];

         $send['LCustomers'] = $this->select('*')
            ->from(Model::CUSTOMER)
            ->where('ISD', '0', '=')
            ->get()->all;

         $send['LCobons'] = $this->select('*')
            ->from(Model::COBON)
            ->where('ISD', '0', '=')
            ->orderby('ID', false)
            ->get()->all;

         $send['LProducts'] = $this->select('*')
            ->from(Model::PRODUCT)
            ->where('ISD', '0', '=')
            ->where('State', '2', '=', 'AND')
            ->get()->all;

         if (L($send, 'LProducts')) {
            foreach ($send['LProducts'] as $KProduct => $VProduct) {
               $send['LProducts'][$KProduct]['Category'] = $this->select('*')
                  ->from(Model::CATEGORIE)
                  ->where('ID', $VProduct['Category'])
                  ->get()->first;
            }
         }

         $send['LTerms'] = $this->select('*')
            ->from(Model::TERM)
            ->where('ISD', '0', '=')
            ->where('State', '2', '=', 'AND')
            ->get()->all;

         $send['LCategories'] = $this->select('*')
            ->from(Model::CATEGORIE)
            ->where('ISD', '0', '=')
            ->get()->all;

         /*$send['LMethods'] = $this->select('*')
               ->from(Model::METHOD)
               ->where('ISD', '0', '=')
               ->where('State', '2', '=', 'AND')
               ->get()->all;*/

         /*$send['LStates'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ISD', '0', '=')
               ->where('Items', self::ITEM, 'LIKE', 'AND')
               ->get()->all;*/
      }

      return $send;
   }

   public function update($in)
   {
      $send = array();

      $row = $this->select('*')
         ->from(Model::SALE)
         ->where('ID', $in['ID'])
         ->where('ISD', '0', '=', 'AND')
         ->get()->first;

      if ($row === null) {
         $send['Errors'][] = 'ID';
      }

      if ($in['Customer'] != $row['Customer']) {
         $Customer = $this->select('*')
            ->from(Model::CUSTOMER)
            ->where('ID', $in['Customer'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if ($Customer === null) {
            $send['Errors'][] = 'Customer';
         }
      }

      if ($in['Cobon'] != $row['Cobon']) {
         $Cobon = $this->select('*')
            ->from(Model::COBON)
            ->where('ID', $in['Cobon'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if ($Cobon === null) {
            $send['Errors'][] = 'Cobon';
         }
      }

      $Paids = $this->select('*')
         ->from(Model::SALE_PAYMENT)
         ->where('Facture', $in['ID'])
         ->where('ISD', '0', '=', 'AND')
         ->get()->sum('Amount');

      $Return = $this->select('*')
         ->from(Model::SALE_RETURN)
         ->where('Facture', $in['ID'])
         ->where('ISD', '0', '=', 'AND')
         ->get()->sum('TTC');

      $Paids = (float) $Paids + (float) $in['Paid'];
      $Rests = (float) $in['TTC'] - (float) $Return - (float) $Paids;

      if ($Paids == 0) {
         $in['State'] = 14;
      } elseif ($Rests == 0) {
         $in['State'] = 15;
      } elseif ($Paids > 0 and $Rests > 0) {
         $in['State'] = 16;
      }

      if ($in['State'] != $row['State']) {
         $State = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', $in['State'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if ($State === null) {
            $send['Errors'][] = 'State';
         }
      }

      if (is_array($in['Terms']) and count($in['Terms']) > 0) {
         foreach ($in['Terms'] as $term) {
            $term = $this->select('*')
               ->from(Model::TERM)
               ->where('ID', $term, '=')
               ->where('ISD', '0', '=', 'AND')
               ->where('State', '2', '=', 'AND')
               ->get()->first;

            if ($term === null) {
               $send['Errors'][] = 'Term';
               break;
            }
         }
         $in['Terms'] = implode(',', $in['Terms']);
      } else {
         $in['Terms'] = '';
      }
      foreach ($in['Products'] as $product) {
         $product = $this->select('*')
            ->from(Model::PRODUCT)
            ->where('ID', $product['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if ($product === null) {
            $send['Errors'][] = 'Product';
            exit();
         }
      }

      if (!isset($send['Errors'])) {
         $Products = $in['Products'];
         $Facture = $in;
         unset($Facture['Products']);
         $send['Success'] = $this->into(Model::SALE)->apt($Facture)->save();
         if ($send['Success'] === true) {
            $this->into(Model::SALE_DETAIL)->del($row['ID'], true, 'Facture')->save();

            foreach ($Products as $KProduct => $VProduct) {

               $VProduct['Facture'] = $row['ID'];
               $VProduct['Product'] = $VProduct['ID'];

               unset($VProduct['Code']);
               unset($VProduct['Name']);
               unset($VProduct['ID']);

               $Products[$KProduct] = $VProduct;

               $this->into(Model::SALE_DETAIL)->set($VProduct)->save();
            }
         }
      }

      return $send;
   }

   public function remove($in)
   {
      $send = array();

      $send = array_merge($send, $this->display($in));

      return $send;
   }

   public function delete($in)
   {
      $send = array();

      $row = $this->select('*')
         ->from(Model::SALE)
         ->where('ID', $in['ID'])
         ->where('ISD', '0', '=', 'AND')
         ->get()->first;

      if ($row === null) {
         $send['Success'][] = 'ID';
      }

      if (!isset($send['Errors'])) {
         $send['Success'] = $this->into(Model::SALE)->del($in)->save();
      }

      return $send;
   }

   public function dashboard($in)
   {
      $Invoices = array();

      $Invoices['Count'] = $this->select('*')
         ->from(Model::SALE)
         ->where('ISD', '0', '=')
         ->get()->count;

      $Invoices['Payed']['Cells'] = $this->select('*')
         ->from(Model::STATE)
         ->where('ID', '15', '=')
         ->where('ISD', '0', '=', 'AND')
         ->get()->first;
      $Invoices['Payed']['Count'] = $this->select('*')
         ->from(Model::SALE)
         ->where('State', '15', '=')
         ->where('ISD', '0', '=', 'AND')
         ->get()->count;
      $Invoices['Payed']['Percent'] = percent($Invoices['Count'], $Invoices['Payed']['Count']);

      $Invoices['Completed']['Cells'] = $this->select('*')
         ->from(Model::STATE)
         ->where('ID', '16', '=')
         ->where('ISD', '0', '=', 'AND')
         ->get()->first;
      $Invoices['Completed']['Count'] = $this->select('*')
         ->from(Model::SALE)
         ->where('State', '16', '=')
         ->where('ISD', '0', '=', 'AND')
         ->get()->count;
      $Invoices['Completed']['Percent'] = percent($Invoices['Count'], $Invoices['Completed']['Count']);

      $Invoices['Waiting']['Cells'] = $this->select('*')
         ->from(Model::STATE)
         ->where('ID', '14', '=')
         ->where('ISD', '0', '=', 'AND')
         ->get()->first;
      $Invoices['Waiting']['Count'] = $this->select('*')
         ->from(Model::SALE)
         ->where('State', '14', '=')
         ->where('ISD', '0', '=', 'AND')
         ->get()->count;
      $Invoices['Waiting']['Percent'] = percent($Invoices['Count'], $Invoices['Waiting']['Count']);

      $Invoices['Canceled']['Cells'] = $this->select('*')
         ->from(Model::STATE)
         ->where('ID', '6', '=')
         ->where('ISD', '0', '=', 'AND')
         ->get()->first;
      $Invoices['Canceled']['Count'] = $this->select('*')
         ->from(Model::SALE)
         ->where('State', '6', '=')
         ->where('ISD', '0', '=', 'AND')
         ->get()->count;
      $Invoices['Canceled']['Percent'] = percent($Invoices['Count'], $Invoices['Canceled']['Count']);

      $Invoices['Cells'] = $this->select('*')
         ->from(Model::SALE)
         ->where('ISD', '0', '=', 'AND')
         ->get()->all;

      $datas1 = array();
      $datas2 = array();

      if (is_array($Invoices['Cells']) and count($Invoices['Cells']) > 0) {

         foreach ($Invoices['Cells'] as $KInvoice => $VInvoice) {

            $VInvoice['Payements'] = (float) $this->select('*')
               ->from(Model::PAYMENT)
               ->where('ISD', '0', '=')
               ->where('Invoice', $VInvoice['ID'], '=', 'AND')
               ->get()->sum('PAmount');

            $VInvoice['Name'] = $VInvoice['Code'];

            $VInvoice['Rest'] = $VInvoice['TTC'] - $VInvoice['Payements'];
            $VInvoice['Percent'] = percent($VInvoice['TTC'], $VInvoice['Payements']);
            $Invoices['Cells'][$KInvoice] = $VInvoice;

            if ($VInvoice['TTC'] == 0 or $VInvoice['Percent'] == 100) {
               unset($Invoices['Cells'][$KInvoice]);
            }
         }

         foreach ($Invoices['Cells'] as $cell) {
            $datas1[] = array('y' => $cell['Payements'], 'label' => $cell['Name']);
            $datas2[] = array('y' => $cell['Rest'], 'label' => $cell['Name']);
         }
      }

      $Invoices['Charts'] = array($datas1, $datas2);

      $send['Invoices'] = $Invoices;

      return $send;
   }

   public function setting($in)
   {
      $send = array();

      /*$send['Cells'] = $this->select('*')
            ->from(Model::SETTING)
            ->get()->first;*/

      return $send;
   }

   public function saving($in)
   {
      $send = array();

      // ..

      return $send;
   }
}
