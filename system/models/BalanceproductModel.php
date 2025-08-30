<?php
   class BalanceproductModel extends Model{
      const ITEM = ',balanceproducts,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LBalances'] = $this->select('*')
            ->from(Model::BALANCES_PRODUCTS)
            ->where('ISD', '0', '=')
            ->where('Product', $in['Product'], '=', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->orderby('ID', false)
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LBalances']) and count($send['LBalances']) > 0){

            foreach($send['LBalances'] as $KInvoice => $VInvoice){

               $VInvoice['Product'] = $this->select('*')
                  ->from(Model::PRODUCT)
                  ->where('ID', $VInvoice['Product'])
                  ->get()->first;
               
               $VInvoice['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VInvoice['State'])
                  ->get()->first;

               $send['LBalances'][$KInvoice] = $VInvoice;
            }
         }

         $send['LProducts'] = $this->select('*')
            ->from(Model::PRODUCT)
            ->where('ISD', '0', '=')
            ->where('Nature', '3', '=', 'AND')
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

         $send['LPurchases'] = $this->select('*')
            ->from(Model::PURCHASE)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('Provider', $in['Providers'], 'IN', 'AND')
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

         if(is_array($send['LPurchases']) and count($send['LPurchases']) > 0){

            foreach($send['LPurchases'] as $KInvoice => $VInvoice){

               $VInvoice['Provider'] = $this->select('*')
                  ->from(Model::PROVIDER)
                  ->where('ID', $VInvoice['Provider'])
                  ->get()->first;

               $VInvoice['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VInvoice['State'])
                  ->get()->first;
                  
               $VInvoice['Paid'] = $this->select('*')
                  ->from(Model::PURCHASE_PAYMENT)
                  ->where('Facture', $VInvoice['ID'])
                  ->where('ISD', '0', '=', 'AND')
                  ->get()->sum('Amount');

               $VInvoice['Return'] = $this->select('*')
                  ->from(Model::PURCHASE_RETURN)
                  ->where('Facture', $VInvoice['ID'])
                  ->where('ISD', '0', '=', 'AND')
                  ->get()->sum('TTC');

               $VInvoice['Rest'] = (double) $VInvoice['TTC'] - (double) $VInvoice['Return'] - (double) $VInvoice['Paid'];


               $send['TPR']['TTCs'] += (double) $VInvoice['TTC'];
               $send['TPR']['Returns'] += (double) $VInvoice['Return'];
               $send['TPR']['Paids'] += (double) $VInvoice['Paid'];
               $send['TPR']['Rests'] += (double) $VInvoice['Rest'];

               $send['LPurchases'][$KInvoice] = $VInvoice;
            }
         }

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::BALANCES_PRODUCTS)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if(L($send,'Cells')){

            $Cells = $send['Cells'];

            $Cells['Product'] = $this->select('*')
               ->from(Model::PRODUCT)
               ->where('ID', $Cells['Product'])
               ->get()->first;

            $Cells['State'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ID', $Cells['State'])
               ->get()->first;

            $send['Cells'] = $Cells;
         }

         return $send;
      }

      public function add($in){
         $send = array();

         $send['LProducts'] = $this->select('*')
            ->from(Model::PRODUCT)
            ->where('ISD', '0', '=')
            ->where('Nature', '3', '=', 'AND')
            ->where('State', '2', '=', 'AND')
            ->get()->all;
            

         $send['LStates'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ISD', '0', '=')
            ->where('Items', self::ITEM, 'LIKE', 'AND')
            ->get()->all;

         if(L($send, 'LProducts')){
            foreach($send['LProducts'] as $KProduct => $VProduct){
               $send['LProducts'][$KProduct]['Category'] = $this->select('*')
                  ->from(Model::CATEGORIE)
                  ->where('ID', $VProduct['Category'])
                  ->get()->first;
            }
         }
         
         return $send;
      }

      public function insert($in){
         $send = array();

         $product = $this->select('*')
            ->from(Model::PRODUCT)
            ->where('ID', $in['Product'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($product === null){
            $send['Errors'][] = 'Product';
         }

         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::BALANCES_PRODUCTS)->set($in)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::BALANCES_PRODUCTS)
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

            $send['LProducts'] = $this->select('*')
               ->from(Model::PRODUCT)
               ->where('ISD', '0', '=')
               ->where('Nature', '3', '=', 'AND')
               ->where('State', '2', '=', 'AND')
               ->get()->all;

            if(L($send, 'LProducts')){
               foreach($send['LProducts'] as $KProduct => $VProduct){
                  $send['LProducts'][$KProduct]['Category'] = $this->select('*')
                     ->from(Model::CATEGORIE)
                     ->where('ID', $VProduct['Category'])
                     ->get()->first;
               }
            } 

            $send['LStates'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ISD', '0', '=')
               ->where('Items', self::ITEM, 'LIKE', 'AND')
               ->get()->all;

         }

         return $send;
      }

      public function update($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::BALANCES_PRODUCTS)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::BALANCES_PRODUCTS)->apt($in)->save();
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
            ->from(Model::BALANCES_PRODUCTS)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Success'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::BALANCES_PRODUCTS)->del($in)->save();
         }

         return $send;
      }

      public function dashboard($in){
         $Invoices = array();

         $Invoices['Count'] = $this->select('*')
            ->from(Model::PURCHASE)
            ->where('ISD', '0', '=')
            ->get()->count;

         $Invoices['Payed']['Cells'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', '15', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;
         $Invoices['Payed']['Count'] = $this->select('*')
            ->from(Model::PURCHASE)
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
            ->from(Model::PURCHASE)
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
            ->from(Model::PURCHASE)
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
            ->from(Model::PURCHASE)
            ->where('State', '6', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->count;
         $Invoices['Canceled']['Percent'] = percent($Invoices['Count'], $Invoices['Canceled']['Count']);

         $Invoices['Cells'] = $this->select('*')
            ->from(Model::PURCHASE)
            ->where('ISD', '0', '=', 'AND')
            ->get()->all;

         $datas1 = array();
         $datas2 = array();

         if(is_array($Invoices['Cells']) and count($Invoices['Cells']) > 0){

            foreach($Invoices['Cells'] as $KInvoice => $VInvoice){

               $VInvoice['Payements'] = (float) $this->select('*')
                  ->from(Model::PAYMENT)
                  ->where('ISD', '0', '=')
                  ->where('Invoice', $VInvoice['ID'], '=', 'AND')
                  ->get()->sum('PAmount');
               
               $VInvoice['Name'] = $VInvoice['Code'];
               
               $VInvoice['Rest'] = $VInvoice['TTC'] - $VInvoice['Payements'];
               $VInvoice['Percent'] = percent($VInvoice['TTC'], $VInvoice['Payements']);
               $Invoices['Cells'][$KInvoice] = $VInvoice;

               if($VInvoice['TTC'] == 0 or $VInvoice['Percent'] == 100){
                  unset($Invoices['Cells'][$KInvoice]);
               }
            }

            foreach($Invoices['Cells'] as $cell){
               $datas1[] = array('y' => $cell['Payements'], 'label' => $cell['Name']);
               $datas2[] = array('y' => $cell['Rest'], 'label' => $cell['Name']);
            }

         }

         $Invoices['Charts'] = array($datas1, $datas2);

         $send['Invoices'] = $Invoices;

         return $send;
      }

      public function setting($in){
         $send = array();

         /*$send['Cells'] = $this->select('*')
            ->from(Model::SETTING)
            ->get()->first;*/

         return $send;
      }

      public function saving($in){
         $send = array();

         // ..

         return $send;
      }

   }
