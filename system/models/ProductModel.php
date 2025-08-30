<?php
   class ProductModel extends Model{

      const ITEM = ',products,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LProducts'] = $this->select('*')
            ->from(Model::PRODUCT)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('Name', $in['Name'], 'LIKE', 'AND')
            ->where('State', $in['States'], 'IN', 'AND')
            ->where('Category', $in['Categories'], 'IN', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->orderby('ID', false)
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LProducts']) and count($send['LProducts']) > 0){

            foreach($send['LProducts'] as $KProduct => $VProduct){

               $VProduct['Unite'] = $this->select('*')
                  ->from(Model::UNITE)
                  ->where('ID', $VProduct['Unite'])
                  ->get()->first;

               $VProduct['Category'] = $this->select('*')
                  ->from(Model::CATEGORIE)
                  ->where('ID', $VProduct['Category'])
                  ->get()->first;
               
               $VProduct['Nature'] = $this->select('*')
                  ->from(Model::NATURE)
                  ->where('ID', $VProduct['Nature'])
                  ->get()->first;

               $VProduct['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VProduct['State'])
                  ->get()->first;

               $send['LProducts'][$KProduct] = $VProduct;
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
            
      public function print($in){
         $send = array();

         switch($in['ID']) {
            case 1:
               $send['LProducts'] = $this->select('*')
                  ->from(Model::PRODUCT)
                  ->where('ISD', '0', '=')
                  ->orderby('ID', false)
                  ->get()->all;

               $send['Count'] = $this->limit()->get()->count;

               if(is_array($send['LProducts']) and count($send['LProducts']) > 0){

                  foreach($send['LProducts'] as $KProduct => $VProduct){

                     $VProduct['Unite'] = $this->select('*')
                        ->from(Model::UNITE)
                        ->where('ID', $VProduct['Unite'])
                        ->get()->first;

                     $VProduct['Category'] = $this->select('*')
                        ->from(Model::CATEGORIE)
                        ->where('ID', $VProduct['Category'])
                        ->get()->first;
                  
                     $VProduct['Nature'] = $this->select('*')
                        ->from(Model::NATURE)
                        ->where('ID', $VProduct['Nature'])
                        ->get()->first;

                     $VProduct['State'] = $this->select('*')
                        ->from(Model::STATE)
                        ->where('ID', $VProduct['State'])
                        ->get()->first;

                     $send['LProducts'][$KProduct] = $VProduct;
                  }
               }
               break;
            case 2:
               $send['LProducts'] = $this->select('*')
                  ->from(Model::PRODUCT)
                  ->where('ISD', '0', '=')
                  ->orderby('ID', false)
                  ->get()->all;

               $send['Count'] = $this->limit()->get()->count;

               if(is_array($send['LProducts']) and count($send['LProducts']) > 0){

                  foreach($send['LProducts'] as $KProduct => $VProduct){

                     $VProduct['Unite'] = $this->select('*')
                        ->from(Model::UNITE)
                        ->where('ID', $VProduct['Unite'])
                        ->get()->first;

                     $VProduct['Category'] = $this->select('*')
                        ->from(Model::CATEGORIE)
                        ->where('ID', $VProduct['Category'])
                        ->get()->first;
                  
                     $VProduct['Nature'] = $this->select('*')
                        ->from(Model::NATURE)
                        ->where('ID', $VProduct['Nature'])
                        ->get()->first;

                     $VProduct['State'] = $this->select('*')
                        ->from(Model::STATE)
                        ->where('ID', $VProduct['State'])
                        ->get()->first;

                     $VProduct['Purchase'] = $this->select('*')
                        ->from(Model::PURCHASE_DETAIL)
                        ->where('Product', $VProduct['ID'])
                        ->get()->sum('Quantity');

                     $VProduct['Sale'] = $this->select('*')
                        ->from(Model::SALE_DETAIL)
                        ->where('Product', $VProduct['ID'])
                        ->get()->sum('Quantity');

                     $VProduct['SaleReturn'] = $this->select('*')
                        ->from(Model::SALE_RETURN_DETAIL)
                        ->where('Product', $VProduct['ID'])
                        ->get()->sum('Quantity');

                     $VProduct['PurchaseReturn'] = $this->select('*')
                        ->from(Model::PURCHASE_RETURN_DETAIL)
                        ->where('Product', $VProduct['ID'])
                        ->get()->sum('Quantity');

                     $VProduct['PurchaseQuantity'] = (((double) $VProduct['Purchase']) - ((double) $VProduct['PurchaseReturn']))  + ((double) $VProduct['SaleReturn']);
                     $VProduct['SaleQuantity'] = (((double) $VProduct['Sale'])) - ((double) $VProduct['SaleReturn']);

                     $VProduct['Quantity'] = (((double) $VProduct['Purchase']) - ((double) $VProduct['PurchaseReturn'])) - (((double) $VProduct['Sale'])) + ((double) $VProduct['SaleReturn']); 

                     $send['LProducts'][$KProduct] = $VProduct;
                  }
               }
               break;
            case 3:
               $send['LProducts'] = $this->select('*')
                  ->from(Model::PRODUCT)
                  ->where('ISD', '0', '=')
                  ->orderby('ID', false)
                  ->get()->all;

               $send['Count'] = $this->limit()->get()->count;

               if(is_array($send['LProducts']) and count($send['LProducts']) > 0){

                  foreach($send['LProducts'] as $KProduct => $VProduct){

                     $VProduct['Unite'] = $this->select('*')
                        ->from(Model::UNITE)
                        ->where('ID', $VProduct['Unite'])
                        ->get()->first;

                     $VProduct['Category'] = $this->select('*')
                        ->from(Model::CATEGORIE)
                        ->where('ID', $VProduct['Category'])
                        ->get()->first;
                  
                     $VProduct['Nature'] = $this->select('*')
                        ->from(Model::NATURE)
                        ->where('ID', $VProduct['Nature'])
                        ->get()->first;

                     $VProduct['State'] = $this->select('*')
                        ->from(Model::STATE)
                        ->where('ID', $VProduct['State'])
                        ->get()->first;

                     $VProduct['Purchase'] = $this->select('*')
                        ->from(Model::PURCHASE_DETAIL)
                        ->where('Product', $VProduct['ID'])
                        ->get()->sum('Quantity');

                     $VProduct['Sale'] = $this->select('*')
                        ->from(Model::SALE_DETAIL)
                        ->where('Product', $VProduct['ID'])
                        ->between('AT', $in['From'], $in['To'], 'AND')
                        ->get()->sum('Quantity');

                     $VProduct['SaleReturn'] = $this->select('*')
                        ->from(Model::SALE_RETURN_DETAIL)
                        ->where('Product', $VProduct['ID'])
                        ->get()->sum('Quantity');

                     $VProduct['PurchaseReturn'] = $this->select('*')
                        ->from(Model::PURCHASE_RETURN_DETAIL)
                        ->where('Product', $VProduct['ID'])
                        ->get()->sum('Quantity');

                     $VProduct['PurchaseQuantity'] = (((double) $VProduct['Purchase']) - ((double) $VProduct['PurchaseReturn']))  + ((double) $VProduct['SaleReturn']);
                     $VProduct['SaleQuantity'] = (((double) $VProduct['Sale'])) - ((double) $VProduct['SaleReturn']);

                     $VProduct['Quantity'] = (((double) $VProduct['Purchase']) - ((double) $VProduct['PurchaseReturn'])) - (((double) $VProduct['Sale'])) + ((double) $VProduct['SaleReturn']); 

                     $send['LProducts'][$KProduct] = $VProduct;
                  }
               }
               break;
            case 4:
               $send['LProducts'] = $this->select('*')
                  ->from(Model::PRODUCT)
                  ->where('ISD', '0', '=')
                  ->orderby('ID', false)
                  ->get()->all;

               $send['Count'] = $this->limit()->get()->count;

               if(is_array($send['LProducts']) and count($send['LProducts']) > 0){

                  foreach($send['LProducts'] as $KProduct => $VProduct){

                     $VProduct['Unite'] = $this->select('*')
                        ->from(Model::UNITE)
                        ->where('ID', $VProduct['Unite'])
                        ->get()->first;

                     $VProduct['Category'] = $this->select('*')
                        ->from(Model::CATEGORIE)
                        ->where('ID', $VProduct['Category'])
                        ->get()->first;
                  
                     $VProduct['Nature'] = $this->select('*')
                        ->from(Model::NATURE)
                        ->where('ID', $VProduct['Nature'])
                        ->get()->first;

                     $VProduct['State'] = $this->select('*')
                        ->from(Model::STATE)
                        ->where('ID', $VProduct['State'])
                        ->get()->first;

                     $VProduct['Purchase'] = $this->select('*')
                        ->from(Model::PURCHASE_DETAIL)
                        ->where('Product', $VProduct['ID'])
                        ->between('AT', $in['From'], $in['To'], 'AND', Model::PURCHASE)
                        ->leftjoin(Model::PURCHASE_DETAIL, Model::PURCHASE, 'Facture')
                        ->get()
                        ->sum('Quantity');

                     $VProduct['Sale'] = $this->select('*')
                        ->from(Model::SALE_DETAIL)
                        ->where('Product', $VProduct['ID'])
                        ->between('AT', $in['From'], $in['To'], 'AND', Model::SALE)
                        ->leftjoin(Model::SALE_DETAIL, Model::SALE, 'Facture')
                        ->get()
                        ->sum('Quantity');

                     $VProduct['SaleReturn'] = $this->select('*')
                        ->from(Model::SALE_RETURN_DETAIL)
                        ->where('Product', $VProduct['ID'])
                        ->between('AT', $in['From'], $in['To'], 'AND', Model::SALE_RETURN)
                        ->leftjoin(Model::SALE_RETURN_DETAIL, Model::SALE_RETURN, 'Facture')
                        ->get()
                        ->sum('Quantity');

                     $VProduct['PurchaseReturn'] = $this->select('*')
                        ->from(Model::PURCHASE_RETURN_DETAIL)
                        ->where('Product', $VProduct['ID'])
                        ->between('AT', $in['From'], $in['To'], 'AND', Model::PURCHASE_RETURN)
                        ->leftjoin(Model::PURCHASE_RETURN_DETAIL, Model::PURCHASE_RETURN, 'Facture')
                        ->get()
                        ->sum('Quantity');

                     $VProduct['PurchaseQuantity'] = (((double) $VProduct['Purchase']) - ((double) $VProduct['PurchaseReturn'])) + ((double) $VProduct['SaleReturn']);
                     $VProduct['SaleQuantity'] = (((double) $VProduct['Sale'])) - ((double) $VProduct['SaleReturn']);

                     $VProduct['Quantity'] = (((double) $VProduct['Purchase']) - ((double) $VProduct['PurchaseReturn'])) - (((double) $VProduct['Sale'])) + ((double) $VProduct['SaleReturn']); 

                     $send['LProducts'][$KProduct] = $VProduct;
                  }
               }
               break;
            case 5:
               $send['LProducts'] = $this->select('*')
                  ->from(Model::PRODUCT)
                  ->where('ISD', '0', '=')
                  ->where('ID', $in['Products'], 'IN', 'AND')
                  ->orderby('ID', false)
                  ->get()->all;

               $send['Count'] = $this->limit()->get()->count;

               if(is_array($send['LProducts']) and count($send['LProducts']) > 0){
                  foreach($send['LProducts'] as $KProduct => $VProduct){

                     $VProduct['Unite'] = $this->select('*')
                        ->from(Model::UNITE)
                        ->where('ID', $VProduct['Unite'])
                        ->get()->first;

                     $VProduct['Category'] = $this->select('*')
                        ->from(Model::CATEGORIE)
                        ->where('ID', $VProduct['Category'])
                        ->get()->first;
                  
                     $VProduct['Nature'] = $this->select('*')
                        ->from(Model::NATURE)
                        ->where('ID', $VProduct['Nature'])
                        ->get()->first;

                     $VProduct['State'] = $this->select('*')
                        ->from(Model::STATE)
                        ->where('ID', $VProduct['State'])
                        ->get()->first;

                     $VProduct['Purchase'] = $this->select('*')
                        ->from(Model::PURCHASE_DETAIL)
                        ->where('Product', $VProduct['ID'])
                        ->between('AT', $in['From'], $in['To'], 'AND', Model::PURCHASE)
                        ->leftjoin(Model::PURCHASE_DETAIL, Model::PURCHASE, 'Facture')
                        ->get()
                        ->sum('Quantity');

                     $VProduct['Sale'] = $this->select('*')
                        ->from(Model::SALE_DETAIL)
                        ->where('Product', $VProduct['ID'])
                        ->between('AT', $in['From'], $in['To'], 'AND', Model::SALE)
                        ->leftjoin(Model::SALE_DETAIL, Model::SALE, 'Facture')
                        ->get()
                        ->sum('Quantity');

                     $VProduct['SaleReturn'] = $this->select('*')
                        ->from(Model::SALE_RETURN_DETAIL)
                        ->where('Product', $VProduct['ID'])
                        ->between('AT', $in['From'], $in['To'], 'AND', Model::SALE_RETURN)
                        ->leftjoin(Model::SALE_RETURN_DETAIL, Model::SALE_RETURN, 'Facture')
                        ->get()
                        ->sum('Quantity');

                     $VProduct['PurchaseReturn'] = $this->select('*')
                        ->from(Model::PURCHASE_RETURN_DETAIL)
                        ->where('Product', $VProduct['ID'])
                        ->between('AT', $in['From'], $in['To'], 'AND', Model::PURCHASE_RETURN)
                        ->leftjoin(Model::PURCHASE_RETURN_DETAIL, Model::PURCHASE_RETURN, 'Facture')
                        ->get()
                        ->sum('Quantity');

                     $VProduct['PurchaseQuantity'] = (((double) $VProduct['Purchase']) - ((double) $VProduct['PurchaseReturn'])) + ((double) $VProduct['SaleReturn']);
                     $VProduct['SaleQuantity'] = (((double) $VProduct['Sale'])) - ((double) $VProduct['SaleReturn']);

                     $VProduct['Quantity'] = (((double) $VProduct['Purchase']) - ((double) $VProduct['PurchaseReturn'])) - (((double) $VProduct['Sale'])) + ((double) $VProduct['SaleReturn']); 

                     $send['LProducts'][$KProduct] = $VProduct;
                  }
               }
               break;
            }

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::PRODUCT)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if(L($send,'Cells')){
            
            $send['Cells']['Category'] = $this->select('*')
               ->from(Model::CATEGORIE)
               ->where('ID', $send['Cells']['Category'])
               ->get()->first;

            $send['Cells']['Unite'] = $this->select('*')
               ->from(Model::UNITE)
               ->where('ID', $send['Cells']['Unite'])
               ->get()->first;
               
            $send['Cells']['Nature'] = $this->select('*')
               ->from(Model::NATURE)
               ->where('ID', $send['Cells']['Nature'])
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

         $send['LStates'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ISD', '0', '=')
            ->where('Items', self::ITEM, 'LIKE', 'AND')
            ->get()->all;

         $send['LCategories'] = $this->select('*')
            ->from(Model::CATEGORIE)
            ->where('ISD', '0', '=')
            ->get()->all;

         $send['LNatures'] = $this->select('*')
            ->from(Model::NATURE)
            ->where('ISD', '0', '=')
            ->get()->all;

         $send['LUnites'] = $this->select('*')
            ->from(Model::UNITE)
            ->where('ISD', '0', '=')
            ->get()->all;

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

         $Category = $this->select('*')
            ->from(Model::CATEGORIE)
            ->where('ID', $in['Category'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($Category === null){
            unset($in['Category']);
         }

         $Nature = $this->select('*')
            ->from(Model::NATURE)
            ->where('ID', $in['Nature'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($Nature === null){
            unset($in['Nature']);
         }

         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::PRODUCT)->set($in)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::PRODUCT)
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

            $send['LCategories'] = $this->select('*')
               ->from(Model::CATEGORIE)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['Category']['ID'], '<>', 'AND')
               ->get()->all;

            $send['LCategories'][] = $this->select('*')
               ->from(Model::CATEGORIE)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['Category']['ID'], '=', 'AND')
               ->get()->first;
               
            $send['LUnites'] = $this->select('*')
               ->from(Model::UNITE)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['Unite']['ID'], '<>', 'AND')
               ->get()->all;

            $send['LUnites'][] = $this->select('*')
               ->from(Model::UNITE)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['Unite']['ID'], '=', 'AND')
               ->get()->first;

            $send['LStates'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['State']['ID'], '<>', 'AND')
               ->where('Items', self::ITEM, 'LIKE', 'AND')
               ->get()->all;

            $send['LNatures'] = $this->select('*')
               ->from(Model::NATURE)
               ->where('ISD', '0', '=')
               ->get()->all;
   
            $send['LStates'][] = $this->select('*')
               ->from(Model::STATE)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['State']['ID'], '=', 'AND')
               ->get()->first;
               
            $send['Cells'] = $Cells;
               
         }

         return $send;
      }

      public function update($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::PRODUCT)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if(isset($in['Category'])){
            $Category = $this->select('*')
               ->from(Model::CATEGORIE)
               ->where('ID', $in['Category'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;
   
            if($Category === null){
               unset($in['Category']);
            }
         }

         if(isset($in['Nature'])){
            $Nature = $this->select('*')
               ->from(Model::NATURE)
               ->where('ID', $in['Nature'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;
   
            if($Nature === null){
               unset($in['Nature']);
            }
         }

         if(isset($in['Unite'])){
            $Unite = $this->select('*')
               ->from(Model::UNITE)
               ->where('ID', $in['Unite'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;
   
            if($Unite === null){
               unset($in['Unite']);
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

         if(!isset($send['Errors'])){
            $send['Success'][] = $this->into(Model::PRODUCT)->apt($in)->save();
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
            ->from(Model::PRODUCT)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::PRODUCT)->del($in)->save();
         }

         return $send;
      }

   }
