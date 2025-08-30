<?php
   class PurchaseModel extends Model{
      const ITEM = ',purchases,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
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
                  
               $VInvoice['Paids'] = $this->select('*')
                  ->from(Model::PURCHASE_PAYMENT)
                  ->where('Facture', $VInvoice['ID'])
				      ->where('Type', '-1', '=', 'AND')
                  ->where('ISD', '0', '=', 'AND')
                  ->get()->sum('Amount');

               $VInvoice['Paid'] = (double) $VInvoice['Paids'];

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

         $send['LProviders'] = $this->select('*')
            ->from(Model::PROVIDER)
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
               $send['LPurchases'] = $this->select('*')
                  ->from(Model::PURCHASE)
                  ->where('ISD', '0', '=')
                  ->orderby('ID', false)
                  ->between('AT', $in['From'], $in['To'], 'AND')
                  ->get()->all;

               $send['Count'] = $this->limit()->get()->count;

               $send['TTCs'] = $this->select('*')
                  ->from(Model::PURCHASE)
                  ->where('ISD', '0', '=')
                  ->orderby('ID', false)
                  ->between('AT', $in['From'], $in['To'], 'AND')
                  ->get()->sum('TTC');

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

                     $send['LPurchases'][$KPurchase] = $VPurchase;
                  }
               }
               break;
            case 2:
               $send['LPurchases'] = $this->select('*')
                  ->from(Model::PURCHASE)
                  ->where('ISD', '0', '=')
                  ->where('Provider', $in['Providers'], 'IN', 'AND')
                  ->between('AT', $in['From'], $in['To'], 'AND')
                  ->orderby('ID', false)
                  ->get()->all;

               $send['Count'] = $this->limit()->get()->count;

               $send['TTCs'] = $this->select('*')
                  ->from(Model::PURCHASE)
                  ->where('ISD', '0', '=')
                  ->where('Provider', $in['Providers'], 'IN', 'AND')
                  ->between('AT', $in['From'], $in['To'], 'AND')
                  ->orderby('ID', false)
                  ->get()->sum('TTC');

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

                     $send['LPurchases'][$KPurchase] = $VPurchase;
                  }
               }
               break;
            case 3:
               
               $send['LProviders'] = $this->select('*')
                  ->from(Model::PROVIDER)
                  ->where('ISD', '0', '=')
                  ->orderby('ID', false)
                  ->get()->all;

               $send['Count'] = $this->limit()->get()->count;
               $send['TTCs'] = 0.0;
               $send['Returns'] = 0.0;
               $send['Payements'] = 0.0;
               $send['Deptors'] = 0.0;

               if(is_array($send['LProviders']) and count($send['LProviders']) > 0){

                  foreach($send['LProviders'] as $KProvider => $VProvider){

                     $VProvider['State'] = $this->select('*')
                        ->from(Model::STATE)
                        ->where('ID', $VProvider['State'])
                        ->get()->first;

                     $VProvider['TTC'] = $this->select('*')
                        ->from(Model::PURCHASE)
                        ->where('Provider', $VProvider['ID'])
                        ->get()->sum('TTC'); 

                     $VProvider['Payement'] = $this->select('*')
                        ->from(Model::PURCHASE_PAYMENT)
                        ->where('Provider', $VProvider['ID'])
                        ->where('Type', '-1', '=', 'AND')
                        ->get()->sum('Amount');  

                     $VProvider['Return'] = $this->select('*')
                        ->from(Model::PURCHASE_PAYMENT)
                        ->where('Provider', $VProvider['ID'])
                        ->where('Type', '1', '=', 'AND')
                        ->get()->sum('Amount');  

                     $VProvider['Deptor'] = ((double) $VProvider['TTC']) - ((double) $VProvider['Return']) - ((double) $VProvider['Payement']);

                     $send['TTCs'] += (double) $VProvider['TTC'];
                     $send['Returns'] += (double) $VProvider['Return'];
                     $send['Payements'] += (double) $VProvider['Payement'];
                     $send['Deptors'] += (double) $VProvider['Deptor'];

                     $send['LProviders'][$KProvider] = $VProvider;
                  }
               }
               break;
            }

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::PURCHASE)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if(L($send,'Cells')){

            $Cells = $send['Cells'];

            $Cells['Provider'] = $this->select('*')
               ->from(Model::PROVIDER)
               ->where('ID', $Cells['Provider'])
               ->get()->first;

            $Cells['Method'] = $this->select('*')
               ->from(Model::METHOD)
               ->where('ID', $Cells['Method'])
               ->get()->first;

            $Cells['State'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ID', $Cells['State'])
               ->get()->first;

            /*$Cells['Cobon'] = $this->select('*')
               ->from(Model::COBON)
               ->where('ID', $Cells['Cobon'])
               ->get()->first;*/

            $Cells['Products'] = $this->select('*')
               ->from(Model::PURCHASE_DETAIL)
               ->where('Facture', $Cells['ID'])
               ->get()->all;
            
            $Cells['Terms'] = explode(',', $Cells['Terms']);

            $Cells['LTerms'] =  $this->select('*')
               ->from(Model::TERM)
               ->where('ISD', '0', '=')
               ->get()->all;

            $Cells['Payments'] =  $this->select('*')
               ->from(Model::PURCHASE_PAYMENT)
               ->where('ISD', '0', '=')
               ->where('Type', '1', '=', 'AND')
               ->where('Facture', $Cells['ID'], '=', 'AND')
               ->get()->all;

            if(L($Cells, 'Products')){
               foreach($Cells['Products'] as $KProduct => $VProduct){
                  $VProduct['Product'] = $this->select('*')
                     ->from(Model::PRODUCT)
                     ->where('ID', $VProduct['Product'])
                     ->get()->first;

                  $ht = ((double) $VProduct['Price']) * ((double) $VProduct['Quantity']);
                  $tax = ($ht /100) * ((double) $Cells['TVA']);
                  $VProduct['Tax'] = $tax;
                  $VProduct['HT'] = $ht + $tax;

                  $Cells['Products'][$KProduct] = $VProduct;
               }
            }

            if(L($Cells, 'Payments')){
               foreach($Cells['Payments'] as $KPayment => $VPayment){
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
                  
            $Cells['Paids'] = $this->select('*')
               ->from(Model::PURCHASE_PAYMENT)
               ->where('Facture', $Cells['ID'])
               ->where('Type', '-1', '=', 'AND')
               ->where('ISD', '0', '=', 'AND')
               ->get()->sum('Amount');

            $Cells['Paid'] = (double) $Cells['Paids'];

            $Cells['Return'] = $this->select('*')
               ->from(Model::PURCHASE_RETURN)
               ->where('Facture', $Cells['ID'])
               ->where('ISD', '0', '=', 'AND')
               ->get()->sum('TTC');

            $Cells['Rest'] = (double) $Cells['TTC'] - (double) $Cells['Return'] - (double) $Cells['Paid'];

            $send['Cells'] = $Cells;
         }

         return $send;
      }

      public function add($in){
         $send = array();

         $send['LProviders'] = $this->select('*')
            ->from(Model::PROVIDER)
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

         /*$send['LCobons'] = $this->select('*')
            ->from(Model::COBON)
            ->where('ISD', '0', '=')
            ->orderby('ID', false)
            ->get()->all;*/

         $send['LProducts'] = $this->select('*')
            ->from(Model::PRODUCT)
            ->where('ISD', '0', '=')
            ->where('Nature', [2, 3], 'IN', 'AND')
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

         if(isset($in['ID'])){

            $send['LPosts'] = $this->select('*')
               ->from(Model::PURCHASE_QUOTATION)
               ->where('ISD', '0', '=')
               ->where('ID', $in['ID'], '=', 'AND')
               ->get()->first;

            if(L($send, 'LPosts')){
               $Cells = $send['LPosts'];
               $Cells['Terms'] = explode(',', $Cells['Terms']);
               $Cells['Products'] = $this->select('*')
                  ->from(Model::PURCHASE_QUOTATION_DETAIL)
                  ->where('Facture', $in['ID'], '=', 'AND')
                  ->get()->all;

               if(L($Cells, 'Products')){
                  foreach($Cells['Products'] as $KProduct => $VProduct){
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
                  $send['LPosts'] = $Cells;
               }
            }
         }

         return $send;
      }

      public function insert($in){
         $send = array();

         $Provider = $this->select('*')
            ->from(Model::PROVIDER)
            ->where('ID', $in['Provider'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($Provider === null){
            $send['Errors'][] = 'Provider';
         } 
         
         /*$Cobon = $this->select('*')
            ->from(Model::COBON)
            ->where('ID', $in['Cobon'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($Cobon === null){
            $send['Errors'][] = 'Cobon';
         }*/

         if($in['Paid'] == 0){
            $in['State'] = 14;
         }elseif($in['Rest'] == 0){
            $in['State'] = 15;
         }elseif($in['Paid'] > 0 and $in['Rest'] > 0){
            $in['State'] = 16;
         }

         $State = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', $in['State'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($State === null){
            $send['Errors'][] = 'State';
         }

         foreach($in['Products'] as $product){
            $product = $this->select('*')
               ->from(Model::PRODUCT)
               ->where('ID', $product['ID'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;
   
            if($product === null){
               $send['Errors'][] = 'Product';
               break;
            }
         }  
         if(is_array($in['Terms']) and count($in['Terms']) > 0){
            foreach($in['Terms'] as $term){
               $term = $this->select('*')
                  ->from(Model::TERM)
                  ->where('ID', $term, '=')
                  ->where('ISD', '0', '=', 'AND')
                  ->where('State', '2', '=', 'AND')
                  ->get()->first;
      
               if($term === null){
                  $send['Errors'][] = 'Term';
                  break;
               }
            }
            $in['Terms'] = implode(',', $in['Terms']);
         }else{
            $in['Terms'] = '';
         }

         if($in['Code'] !== ''){
            $Sale = $this->select('*')
               ->from(Model::PURCHASE)
               ->where('Code', $in['Code'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;
   
            if($Sale !== null){
               $send['Errors'][] = 'Sale';
            }
         }

         if(!L($send, 'Errors')){
            $Products = $in['Products'];
            $Facture = $in;
            unset($Facture['Products']);
            //$Facture['Paid'] = 0;
            $Facture['Method'] = 1;
            $send['Success'] = $this->into(Model::PURCHASE)->set($Facture)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::PURCHASE)
                  ->where('ID', $this->lastid())
                  ->get()->first;

               foreach($Products as $KProduct => $VProduct){

                  $VProduct['Facture'] = $send['Cells']['ID'];
                  $VProduct['Product'] = $VProduct['ID'];

                  unset($VProduct['Code']);
                  unset($VProduct['Name']);
                  unset($VProduct['ID']);

                  $Products[$KProduct] = $VProduct;

                  $this->into(Model::PURCHASE_DETAIL)->set($VProduct)->save();

               }

               if($in['PaidMonetary'] > 0.0){
                  $payment = array();

                  $payment['Facture'] = $send['Cells']['ID'];
                  $payment['Amount'] = $in['PaidMonetary'];
                  $payment['Method'] = 1;
                  $payment['Provider'] = $in['Provider'];
                  $payment['Type'] = -1;
                  $payment['AT'] = $in['AT'];
                  $payment['State'] = 15;
                  $payment['Member'] = 1;

                  $this->into(Model::PURCHASE_PAYMENT)->set($payment)->save();
               }
               
               if($in['PaidOnline'] > 0.0){
                  $payment = array();

                  $payment['Facture'] = $send['Cells']['ID'];
                  $payment['Amount'] = $in['PaidOnline'];
                  $payment['Method'] = 3;
                  $payment['Provider'] = $in['Provider'];
                  $payment['Type'] = -1;
                  $payment['AT'] = $in['AT'];
                  $payment['State'] = 15;
                  $payment['Member'] = 1;

                  $this->into(Model::PURCHASE_PAYMENT)->set($payment)->save();
               }
            }
         }

         return $send;
      }

      public function edit($in){
         $send = array();
         $send = array_merge($send, $this->display($in));
         if(L($send, 'Cells')){
            $Cells = $send['Cells'];

            $send['LProviders'] = $this->select('*')
               ->from(Model::PROVIDER)
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

            if(L($send, 'LProducts')){
               foreach($send['LProducts'] as $KProduct => $VProduct){
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

            /*$send['LStates'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ISD', '0', '=')
               ->where('Items', self::ITEM, 'LIKE', 'AND')
               ->get()->all;*/

         }

         return $send;
      }

      public function update($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::PURCHASE)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if($in['Provider'] != $row['Provider']){
            $Customer = $this->select('*')
               ->from(Model::PROVIDER)
               ->where('ID', $in['Provider'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;

            if($Customer === null){
               $send['Errors'][] = 'Provider';
            }
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
 
         if(is_array($in['Terms']) and count($in['Terms']) > 0){
            foreach($in['Terms'] as $term){
               $term = $this->select('*')
                  ->from(Model::TERM)
                  ->where('ID', $term, '=')
                  ->where('ISD', '0', '=', 'AND')
                  ->where('State', '2', '=', 'AND')
                  ->get()->first;
      
               if($term === null){
                  $send['Errors'][] = 'Term';
                  break;
               }
            }
            $in['Terms'] = implode(',', $in['Terms']);
         }else{
            $in['Terms'] = '';
         }
         foreach($in['Products'] as $product){
            $product = $this->select('*')
               ->from(Model::PRODUCT)
               ->where('ID', $product['ID'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;
      
            if($product === null){
               $send['Errors'][] = 'Product';
               exit();
            }
         }

         if(!isset($send['Errors'])){
            $Products = $in['Products'];
            $Facture = $in;
            unset($Facture['Products']);
            $send['Success'] = $this->into(Model::PURCHASE)->apt($Facture)->save();
            if($send['Success'] === true){
               $this->into(Model::PURCHASE_DETAIL)->del($row['ID'], true, 'Facture')->save();
      
               foreach($Products as $KProduct => $VProduct){
      
                  $VProduct['Facture'] = $row['ID'];
                  $VProduct['Product'] = $VProduct['ID'];
   
                  unset($VProduct['Code']);
                  unset($VProduct['Name']);
                  unset($VProduct['ID']);
   
                  $Products[$KProduct] = $VProduct;
   
                  $this->into(Model::PURCHASE_DETAIL)->set($VProduct)->save();
                }
              }
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
            ->from(Model::PURCHASE)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Success'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::PURCHASE)->del($in)->save();
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
