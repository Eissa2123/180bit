<?php
   class SalequotationModel extends Model{
      const ITEM = ',salesquotations,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LSales'] = $this->select('*')
            ->from(Model::SALE_QUOTATION)
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

         if(is_array($send['LSales']) and count($send['LSales']) > 0){

            foreach($send['LSales'] as $KInvoice => $VInvoice){

               $VInvoice['Customer'] = $this->select('*')
                  ->from(Model::CUSTOMER)
                  ->where('ID', $VInvoice['Customer'])
                  ->get()->first;

               $VInvoice['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VInvoice['State'])
                  ->get()->first;

               $send['TPR']['TTCs'] += (double) $VInvoice['TTC'];

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
      
      public function print($in){
         $send = array();

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::SALE_QUOTATION)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if(L($send,'Cells')){

            $Cells = $send['Cells'];

            $Cells['Customer'] = $this->select('*')
               ->from(Model::CUSTOMER)
               ->where('ID', $Cells['Customer'])
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
               ->from(Model::SALE_QUOTATION_DETAIL)
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

         if(isset($in['ID'])){

            $send['Cells'] = $this->select('*')
               ->from(Model::SALE_QUOTATION)
               ->where('ISD', '0', '=')
               ->where('ID', $in['ID'], '=', 'AND')
               ->get()->first;

            if(L($send, 'Cells')){
               $Cells = $send['Cells'];
               $Cells['Terms'] = explode(',', $Cells['Terms']);
               $Cells['Products'] = $this->select('*')
                  ->from(Model::SALE_QUOTATION_DETAIL)
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
                  $send['Cells'] = $Cells;
               }
            }
         }

         return $send;
      }

      public function insert($in){
         $send = array();

         $Customer = $this->select('*')
            ->from(Model::CUSTOMER)
            ->where('ID', $in['Customer'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($Customer === null){
            $send['Errors'][] = 'Customer';
         } 
         
         $Cobon = $this->select('*')
            ->from(Model::COBON)
            ->where('ID', $in['Cobon'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($Cobon === null){
            $send['Errors'][] = 'Cobon';
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
               ->from(Model::SALE_QUOTATION)
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
            $send['Success'] = $this->into(Model::SALE_QUOTATION)->set($Facture)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::SALE_QUOTATION)
                  ->where('ID', $this->lastid())
                  ->get()->first;

               foreach($Products as $KProduct => $VProduct){

                  $VProduct['Facture'] = $send['Cells']['ID'];
                  $VProduct['Product'] = $VProduct['ID'];

                  unset($VProduct['Code']);
                  unset($VProduct['Name']);
                  unset($VProduct['ID']);

                  $Products[$KProduct] = $VProduct;

                  $this->into(Model::SALE_QUOTATION_DETAIL)->set($VProduct)->save();
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
            ->from(Model::SALE_QUOTATION)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if($in['Customer'] != $row['Customer']){
            $Customer = $this->select('*')
               ->from(Model::CUSTOMER)
               ->where('ID', $in['Customer'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;

            if($Customer === null){
               $send['Errors'][] = 'Customer';
            }
         }

         if($in['Cobon'] != $row['Cobon']){
            $Cobon = $this->select('*')
               ->from(Model::COBON)
               ->where('ID', $in['Cobon'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;

            if($Cobon === null){
               $send['Errors'][] = 'Cobon';
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
            $send['Success'] = $this->into(Model::SALE_QUOTATION)->apt($Facture)->save();
            if($send['Success'] === true){
               $this->into(Model::SALE_QUOTATION_DETAIL)->del($row['ID'], true, 'Facture')->save();
      
               foreach($Products as $KProduct => $VProduct){
      
                  $VProduct['Facture'] = $row['ID'];
                  $VProduct['Product'] = $VProduct['ID'];
   
                  unset($VProduct['Code']);
                  unset($VProduct['Name']);
                  unset($VProduct['ID']);
   
                  $Products[$KProduct] = $VProduct;
   
                  $this->into(Model::SALE_QUOTATION_DETAIL)->set($VProduct)->save();
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
            ->from(Model::SALE_QUOTATION)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Success'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::SALE_QUOTATION)->del($in)->save();
         }

         return $send;
      }

      public function dashboard($in){
         $Invoices = array();

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
