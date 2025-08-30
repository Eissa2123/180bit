<?php
   class PurchasequotationModel extends Model{
      const ITEM = ',purchasesquotations,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LPurchasequotations'] = $this->select('*')
            ->from(Model::PURCHASE_QUOTATION)
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

         if(is_array($send['LPurchasequotations']) and count($send['LPurchasequotations']) > 0){

            foreach($send['LPurchasequotations'] as $KInvoice => $VInvoice){

               $VInvoice['Provider'] = $this->select('*')
                  ->from(Model::PROVIDER)
                  ->where('ID', $VInvoice['Provider'])
                  ->get()->first;

               $VInvoice['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VInvoice['State'])
                  ->get()->first;
               $send['TPR']['TTCs'] += (double) $VInvoice['TTC'];

               $send['LPurchasequotations'][$KInvoice] = $VInvoice;
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
         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::PURCHASE_QUOTATION)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if(L($send,'Cells')){

            $Cells = $send['Cells'];

            $Cells['Provider'] = $this->select('*')
               ->from(Model::PROVIDER)
               ->where('ID', $Cells['Provider'])
               ->get()->first;

            $Cells['State'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ID', $Cells['State'])
               ->get()->first;

            $Cells['Products'] = $this->select('*')
               ->from(Model::PURCHASE_QUOTATION_DETAIL)
               ->where('Facture', $Cells['ID'])
               ->get()->all;
            
            $Cells['Terms'] = explode(',', $Cells['Terms']);

            $Cells['LTerms'] =  $this->select('*')
               ->from(Model::TERM)
               ->where('ISD', '0', '=')
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

         $send['LStates'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ISD', '0', '=')
            ->where('Items', self::ITEM, 'LIKE', 'AND')
            ->get()->all;

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
               ->from(Model::PURCHASE_QUOTATION)
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
            $send['Success'] = $this->into(Model::PURCHASE_QUOTATION)->set($Facture)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::PURCHASE_QUOTATION)
                  ->where('ID', $this->lastid())
                  ->get()->first;

               foreach($Products as $KProduct => $VProduct){

                  $VProduct['Facture'] = $send['Cells']['ID'];
                  $VProduct['Product'] = $VProduct['ID'];

                  unset($VProduct['Code']);
                  unset($VProduct['Name']);
                  unset($VProduct['ID']);

                  $Products[$KProduct] = $VProduct;

                  $this->into(Model::PURCHASE_QUOTATION_DETAIL)->set($VProduct)->save();

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
            ->from(Model::PURCHASE_QUOTATION)
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
            $send['Success'] = $this->into(Model::PURCHASE_QUOTATION)->apt($Facture)->save();
            if($send['Success'] === true){
               $this->into(Model::PURCHASE_QUOTATION_DETAIL)->del($row['ID'], true, 'Facture')->save();
      
               foreach($Products as $KProduct => $VProduct){
      
                  $VProduct['Facture'] = $row['ID'];
                  $VProduct['Product'] = $VProduct['ID'];
   
                  unset($VProduct['Code']);
                  unset($VProduct['Name']);
                  unset($VProduct['ID']);
   
                  $Products[$KProduct] = $VProduct;
   
                  $this->into(Model::PURCHASE_QUOTATION_DETAIL)->set($VProduct)->save();
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
            ->from(Model::PURCHASE_QUOTATION)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Success'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::PURCHASE_QUOTATION)->del($in)->save();
         }

         return $send;
      }

      public function dashboard($in){
         $Invoices = array();

         $Invoices['Count'] = $this->select('*')
            ->from(Model::PURCHASE_QUOTATION)
            ->where('ISD', '0', '=')
            ->get()->count;

         $Invoices['Payed']['Cells'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', '15', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;
         $Invoices['Payed']['Count'] = $this->select('*')
            ->from(Model::PURCHASE_QUOTATION)
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
            ->from(Model::PURCHASE_QUOTATION)
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
            ->from(Model::PURCHASE_QUOTATION)
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
            ->from(Model::PURCHASE_QUOTATION)
            ->where('State', '6', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->count;
         $Invoices['Canceled']['Percent'] = percent($Invoices['Count'], $Invoices['Canceled']['Count']);

         $Invoices['Cells'] = $this->select('*')
            ->from(Model::PURCHASE_QUOTATION)
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

         return $send;
      }

      public function saving($in){
         $send = array();

         return $send;
      }

   }
