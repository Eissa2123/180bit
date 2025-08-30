<?php
   class ExpenseModel extends Model{

      const ITEM = ',expenses,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LExpenses'] = $this->select('*')
            ->from(Model::EXPENSE)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('Name', $in['Name'], 'LIKE', 'AND')
            ->where('Method', $in['Methods'], 'IN', 'AND')
            ->where('Employee', $in['Employees'], 'IN', 'AND')
            ->where('Marketer', $in['Marketers'], 'IN', 'AND')
            ->where('State', $in['States'], 'IN', 'AND')
            ->where('Tax', $in['Tax'], '=', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->orderby('ID', false)
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LExpenses']) and count($send['LExpenses']) > 0){

            foreach($send['LExpenses'] as $KExpense => $VExpense){

               $VExpense['Method'] = $this->select('*')
                  ->from(Model::METHOD)
                  ->where('ID', $VExpense['Method'])
                  ->get()->first;

               $VExpense['Employee'] = $this->select('*')
                  ->from(Model::EMPLOYEE)
                  ->where('ID', $VExpense['Employee'])
                  ->get()->first;

               $VExpense['Marketer'] = $this->select('*')
                  ->from(Model::MARKETER)
                  ->where('ID', $VExpense['Marketer'])
                  ->get()->first;

               $VExpense['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VExpense['State'])
                  ->get()->first;

               $send['LExpenses'][$KExpense] = $VExpense;
            }
         }

         //R($send['LExpenses']);

         $send['LMethods'] = $this->select('*')
            ->from(Model::METHOD)
            ->where('ISD', '0', '=')
            ->get()->all;

         $send['LEmployees'] = $this->select('*')
            ->from(Model::EMPLOYEE)
            ->where('ISD', '0', '=')
            ->get()->all;

         $send['LMarketers'] = $this->select('*')
            ->from(Model::MARKETER)
            ->where('ISD', '0', '=')
            ->get()->all;

         $send['LStates'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ISD', '0', '=')
            ->where('Items', self::ITEM, 'LIKE', 'AND')
            ->get()->all;

         return $send;
      }
      
      public function print($in){
         $send = array();

         switch($in['ID']) {
            case 1:
               $send['Incomes']['TotalExpenseProviders'] = $this->select('*')
                  ->from(Model::PURCHASE_PAYMENT)
                  ->where('ISD', '0', '=')
                  ->between('AT', $in['From'], $in['To'], 'AND')
                  ->orderby('ID', false)
                  ->get()->sum('Amount');

               $send['Incomes']['Employees'] = $this->select('ID')
                  ->from(Model::EMPLOYEE)
                  ->where('ISD', '0', '=')
                  ->where('Job', '3', '=', 'AND')
                  ->get()->all;

               $send['Incomes']['TotalExpenseLeaders'] = $this->select('*')
                  ->from(Model::EXPENSE)
                  ->leftjoin(Model::EXPENSE, Model::EMPLOYEE, 'Employee')
                  ->where('ISD', '0', '=')
                  ->where('Employee', '0', '<>', 'AND')
                  ->where('Job', '5', '=', 'AND', Model::EMPLOYEE)
                  ->between('AT', $in['From'], $in['To'], 'AND')
                  ->get()->sum('Amount');

               $send['Incomes']['TotalExpenseMarketers'] = $this->select('*')
                  ->from(Model::EXPENSE)
                  ->where('ISD', '0', '=')
                  ->where('Marketer', '0', '<>', 'AND')
                  ->between('AT', $in['From'], $in['To'], 'AND')
                  ->orderby('ID', false)
                  ->get()->sum('Amount');

               $send['Incomes']['TotalExpenseTaxs'] = $this->select('*')
                  ->from(Model::EXPENSE)
                  ->where('ISD', '0', '=')
                  ->where('Tax', '0', '<>', 'AND')
                  ->between('AT', $in['From'], $in['To'], 'AND')
                  ->orderby('ID', false)
                  ->get()->sum('Amount');

               $send['Incomes']['TotalExpenseOthers'] = $this->select('*')
                  ->from(Model::EXPENSE)
                  ->where('ISD', '0', '=')
                  ->where('Employee', '0', '=', 'AND')
                  ->where('Marketer', '0', '=', 'AND')
                  ->where('Tax', '0', '=', 'AND')
                  ->between('AT', $in['From'], $in['To'], 'AND')
                  ->orderby('ID', false)
                  ->get()->sum('Amount');

               $send['Incomes']['TotalExpenseEmployees'] = $this->select('*')
                  ->from(Model::EXPENSE)
                  ->where('ISD', '0', '=')
                  ->where('Employee', '0', '<>', 'AND')
                  ->between('AT', $in['From'], $in['To'], 'AND')
                  ->orderby('ID', false)
                  ->get()->sum('Amount');

               $send['Incomes']['TotalExpenses'] = 0
                  + ((double) $send['Incomes']['TotalExpenseProviders']) 
                  + ((double) $send['Incomes']['TotalExpenseLeaders']) 
                  + ((double) $send['Incomes']['TotalExpenseMarketers']) 
                  + ((double) $send['Incomes']['TotalExpenseTaxs']) 
                  + ((double) $send['Incomes']['TotalExpenseOthers']) 
                  + ((double) $send['Incomes']['TotalExpenseEmployees']);
               
               break;
            case 2:
               
               break;
            case 3:
               $send['LPurchases'] = $this->select('*')
                  ->from(Model::PURCHASE)
                  ->where('ISD', '0', '=')
                  ->where('Provider', $in['Providers'], 'IN', 'AND')
                  //->between('AT', $in['From'], $in['To'], 'AND')
                  ->orderby('ID', false)
                  ->get()->all;

               $send['Count'] = $this->limit()->get()->count;

               $send['TTCs'] = $this->select('*')
                  ->from(Model::PURCHASE)
                  ->where('ISD', '0', '=')
                  ->where('Provider', $in['Providers'], 'IN', 'AND')
                  //->between('AT', $in['From'], $in['To'], 'AND')
                  ->get()->sum('TTC');

               $send['Paids'] = $this->select('*')
                  ->from(Model::PURCHASE)
                  ->leftjoin(Model::PURCHASE, Model::PURCHASE_PAYMENT, 'ID', 'Facture')
                  ->where('ISD', '0', '=')
                  ->where('Provider', $in['Providers'], 'IN', 'AND')
                  //->between('AT', $in['From'], $in['To'], 'AND')
                  ->get()->sum('Amount');

               if(is_array($send['LPurchases']) and count($send['LPurchases']) > 0){

                  foreach($send['LPurchases'] as $KPurchase => $VPurchase){

                     $VPurchase['Provider'] = $this->select('*')
                        ->from(Model::PROVIDER)
                        ->where('ID', $VPurchase['Provider'])
                        ->get()->first;
                        
                     $VPurchase['Cobon'] = $this->select('*')
                        ->from(Model::COBON)
                        ->where('ID', $VPurchase['Cobon'])
                        ->get()->first;

                     $VPurchase['State'] = $this->select('*')
                        ->from(Model::STATE)
                        ->where('ID', $VPurchase['State'])
                        ->get()->first;

                     $VPurchase['Paid'] = $this->select('*')
                        ->from(Model::PURCHASE_PAYMENT)
                        ->where('Facture', $VPurchase['ID'])
                        ->get()->sum('Amount');

                     $send['LPurchases'][$KPurchase] = $VPurchase;
                  }
               }
               break;
            case 4:
   
               $send['LPurchases'] = $this->select('*')
                  ->from(Model::PURCHASE_PAYMENT)
                  ->where('ISD', '0', '=')
                  ->where('Type', '-1', '=', 'AND')
                  ->between('AT', $in['From'], $in['To'], 'AND')
                  ->orderby('ID', false)
                  ->get()->all;

               $send['LExpenses'] = $this->select('*')
                  ->from(Model::EXPENSE)
                  ->where('ISD', '0', '=')
                  ->between('AT', $in['From'], $in['To'], 'AND')
                  ->orderby('ID', false)
                  ->get()->all;

               $send['Count'] = $this->limit()->get()->count;

               $send['ExpensesTTCs'] = $this->select('*')
                  ->from(Model::EXPENSE)
                  ->where('ISD', '0', '=')
                  ->between('AT', $in['From'], $in['To'], 'AND')
                  ->orderby('ID', false)
                  ->get()->sum('Amount');

               $send['PurchasesTTCs'] = $this->select('*')
                  ->from(Model::PURCHASE_PAYMENT)
                  ->where('ISD', '0', '=')
                  ->where('Type', '-1', '=', 'AND')
                  ->between('AT', $in['From'], $in['To'], 'AND')
                  ->orderby('ID', false)
                  ->get()->sum('Amount');

               $send['TTCs'] = ((double) $send['ExpensesTTCs']) - ((double) $send['PurchasesTTCs']);

               if(is_array($send['LExpenses']) and count($send['LExpenses']) > 0){

                  foreach($send['LExpenses'] as $KSale => $VSale){
                     $VSale['Employee'] = $this->select('*')
                        ->from(Model::EMPLOYEE)
                        ->where('ID', $VSale['Employee'])
                        ->get()->first;

                     $VSale['Marketer'] = $this->select('*')
                        ->from(Model::MARKETER)
                        ->where('ID', $VSale['Marketer'])
                        ->get()->first;

                     $VSale['State'] = $this->select('*')
                        ->from(Model::STATE)
                        ->where('ID', $VSale['State'])
                        ->get()->first;

                     $send['LExpenses'][$KSale] = $VSale;
                  }
               }
               break;
            }

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::EXPENSE)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if(L($send,'Cells')){

            $send['Cells']['Employee'] = $this->select('*')
               ->from(Model::EMPLOYEE)
               ->where('ID', $send['Cells']['Employee'])
               ->get()->first;

            $send['Cells']['Marketer'] = $this->select('*')
               ->from(Model::MARKETER)
               ->where('ID', $send['Cells']['Marketer'])
               ->get()->first;

            $send['Cells']['Method'] = $this->select('*')
               ->from(Model::METHOD)
               ->where('ID', $send['Cells']['Method'])
               ->get()->first;

            $send['Cells']['State'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ID', $send['Cells']['State'])
               ->get()->first;

         }

         return $send;
      }

      public function add($in){
         $send = array();

         $send['LEmployees'] = $this->select('*')
            ->from(Model::EMPLOYEE)
            ->where('ISD', '0', '=')
            ->get()->all;

         $send['LMethods'] = $this->select('*')
            ->from(Model::METHOD)
            ->where('ISD', '0', '=')
            ->get()->all;

         $send['LStates'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ISD', '0', '=')
            ->where('Items', self::ITEM, 'LIKE', 'AND')
            ->get()->all;

         $send['LMarketers'] = $this->select('*')
            ->from(Model::MARKETER)
            ->where('ISD', '0', '=')
            ->get()->all;

         $tax = $this->select('*')
            ->from(Model::SALE)
            ->where('ISD', '0', '=', 'AND')
            ->get()->sum('Tax');

         $payed = $this->select('*')
            ->from(Model::EXPENSE)
            ->where('Employee', '0', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->sum('Amount');

         $impayed = ((double) $tax) - ((double) $payed);

         $send['Cells']['Impayed'] = $impayed;

         return $send;
      }

      public function insert($in){
         $send = array();

         $State = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', $in['State'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($State === null){
            $send['Errors'][] = 'State';
         }

         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::EXPENSE)->set($in)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::EXPENSE)
                  ->where('ID', $this->lastid())
                  ->get()->first;
            }
         }

         return $send;
      }

      public function edit($in){
         $send = array();
         $send = array_merge($send, $this->display($in));
         
         if(L($send, 'Cells')){
            $Cells = $send['Cells'];

            $send['LEmployees'] = $this->select('*')
               ->from(Model::EMPLOYEE)
               ->where('ISD', '0', '=')
               ->get()->all;

            $send['LMethods'] = $this->select('*')
               ->from(Model::METHOD)
               ->where('ISD', '0', '=')
               ->get()->all;

            $send['LStates'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ISD', '0', '=')
               ->where('Items', self::ITEM, 'LIKE', 'AND')
               ->get()->all;

            $send['LMarketers'] = $this->select('*')
               ->from(Model::MARKETER)
               ->where('ISD', '0', '=')
               ->get()->all;

            $tax = $this->select('*')
               ->from(Model::SALE)
               ->where('ISD', '0', '=', 'AND')
               ->get()->sum('Tax');

            $payed = $this->select('*')
               ->from(Model::BALANCES_FINANCIALS)
               ->where('Employee', '0', '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->sum('Amount');

            $impayed = ((double) $tax) - ((double) $payed) + ((double) $Cells['Amount']);

            $Cells['Impayed'] = $impayed;
               
            $send['Cells'] = $Cells;
               
         }

         return $send;
      }

      public function update($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::EXPENSE)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if($in['State'] != $row['State']){
            $State = $this->select('*')
               ->from(Model::STATE)
               ->where('ID', $in['State'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;

            if($State === null){
               $send['Errors'][] = 'State';
            }
         }

         if(!isset($send['Errors'])){
            $send['Success'][] = $this->into(Model::EXPENSE)->apt($in)->save();
         }

         return $send;
      }

      public function remove($in){
         $send = array();

         $send = array_merge($send, $this->display($in));

         return $send;
      }

      public function delete($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::EXPENSE)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::EXPENSE)->del($in)->save();
         }

         return $send;
      }

   }
