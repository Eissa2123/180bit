<?php
   class SalereturnModel extends Model{
      const ITEM = ',salesreturns,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();
         $sale = null;

         if($in['Facture'] !== ''){
            $sale =  $this->select('*')
               ->from(Model::SALE)
               ->where('ID', $in['Facture'])
               ->get()->first;
         }
         $send['TPR']['Total'] = 0.0;
         if($sale == null){
            $send['Errors'][] = 'Facture';
         }else{
            $send['LSalereturns'] = $this->select('*')
               ->from(Model::SALE_RETURN)
               ->where('ISD', '0', '=')
               ->where('Facture', $in['Facture'], '=', 'AND')
               ->get()->all;

            if(is_array($send['LSalereturns']) and count($send['LSalereturns']) > 0){
               foreach($send['LSalereturns'] as $KSale => $VSale){

                  $VSale['State'] = $this->select('*')
                     ->from(Model::STATE)
                     ->where('ID', $VSale['State'])
                     ->get()->first;

                  $send['LSalereturns'][$KSale] = $VSale;

                  $send['TPR']['Total'] += (double) $VSale['TTC'];
               }
            }
         }

         return $send;
      }
      
      public function print($in){
         $send = array();
         $sale = null;

         if($in['Facture'] !== ''){
            $sale =  $this->select('*')
               ->from(Model::SALE)
               ->where('ID', $in['Facture'])
               ->get()->first;
         }
         $send['TPR']['Total'] = 0.0;
         if($sale == null){
            $send['Errors'][] = 'Facture';
         }else{
            $send['LSalereturns'] = $this->select('*')
               ->from(Model::SALE_RETURN)
               ->where('ISD', '0', '=')
               ->where('Facture', $in['Facture'], '=', 'AND')
               ->get()->all;

            if(is_array($send['LSalereturns']) and count($send['LSalereturns']) > 0){
               foreach($send['LSalereturns'] as $KSale => $VSale){

                  $VSale['State'] = $this->select('*')
                     ->from(Model::STATE)
                     ->where('ID', $VSale['State'])
                     ->get()->first;

                  $send['LSalereturns'][$KSale] = $VSale;

                  $send['TPR']['Total'] += (double) $VSale['TTC'];
               }
            }
         }

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::SALE_RETURN)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if(L($send,'Cells')){
            $Cells = $send['Cells'];

            $Cells['Cobon'] = $this->select('*')
               ->from(Model::COBON)
               ->where('ID', $Cells['Cobon'])
               ->get()->first;

            $Cells['Products'] = $this->select('*')
               ->from(Model::SALE_RETURN_DETAIL)
               ->where('Facture', $Cells['ID'])
               ->get()->all;

            if(L($Cells, 'Products')){
               foreach($Cells['Products'] as $KProduct => $VProduct){
                  $VProduct['Product'] = $this->select('*')
                     ->from(Model::PRODUCT)
                     ->where('ID', $VProduct['Product'])
                     ->get()->first;

                  $ht = ((double) $VProduct['Price']) * ((double) $VProduct['Quantity']);
                  $tax = $ht /100 * ((double) $Cells['TVA']);
                  $VProduct['Tax'] = $tax;
                  $VProduct['HT'] = $ht + $tax;
                     
                  $Cells['Products'][$KProduct] = $VProduct;
               }
            }

            $Cells['Facture'] = $this->select('*')
               ->from(Model::SALE)
               ->where('ID', $Cells['Facture'])
               ->get()->first;

            $send['Cells'] = $Cells;
         }

         return $send;
      }

      public function add($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::SALE)
            ->where('ID', $in['Facture'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         $send['LCobons'] = $this->select('*')
            ->from(Model::COBON)
            ->where('ISD', '0', '=', 'AND')
            ->get()->all;

         if(L($send,'Cells')){

            $Cells = $send['Cells'];

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
               ->where('ISD', '0', '=', 'AND')
               ->get()->all;

            if(L($Cells, 'Products')){
               foreach($Cells['Products'] as $KProduct => $VProduct){

                  $Product = $VProduct;

                  $VProduct['Product'] = $this->select('ID, Code, Name, Price')
                     ->from(Model::PRODUCT)
                     ->where('ID', $VProduct['Product'])
                     ->get()->first;
                  
                  $VProduct['REF'] = $VProduct['ID'];
                  $VProduct['ID'] = $VProduct['Product']['ID'];
                  $VProduct['Code'] = $VProduct['Product']['Code'];
                  $VProduct['Name'] = $VProduct['Product']['Name'];
                  $VProduct['Price'] = $Product['Price'];

                  $VProduct['Return'] = $this->select('Quantity')
                     ->from(Model::SALE_RETURN_DETAIL)
                     ->where('REF', $VProduct['REF'])
                     ->where('ISD', '0', '=', 'AND')
                     ->get()->sum('Quantity');

                  $VProduct['Quantity'] = (int) $VProduct['Quantity'] - (int) $VProduct['Return'];
                  $VProduct['HT'] = ((double) $VProduct['Price']) * $VProduct['Quantity'];

                  unset($VProduct['Product']);

                  $Cells['Products'][$KProduct] = $VProduct;
                  
                  if($VProduct['Quantity'] <= 0){
                     unset($Cells['Products'][$KProduct]);
                  }
               }
            }

            $send['Cells'] = $Cells;
            $send['Products'] = $Cells['Products'];
         }

         return $send;
      }

      public function insert($in){
         $send = array();

         $Facture = $this->select('*')
            ->from(Model::SALE)
            ->where('ID', $in['Facture'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($Facture === null){
            $send['Errors'][] = 'Facture';
         }

         if(!L($send, 'Errors')){
            $Products = $in['Products'];
            $RFacture = $in;
            unset($RFacture['Products']);
            $send['Success'] = $this->into(Model::SALE_RETURN)->set($RFacture)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::SALE_RETURN)
                  ->where('ID', $this->lastid())
                  ->get()->first;

               foreach($Products as $KProduct => $VProduct){

                  $VProduct['Facture'] = $send['Cells']['ID'];
                  $VProduct['Product'] = $VProduct['ID'];

                  unset($VProduct['Code']);
                  unset($VProduct['Name']);
                  unset($VProduct['ID']);

                  $Products[$KProduct] = $VProduct;

                  $r = $this->into(Model::SALE_RETURN_DETAIL)->set($VProduct)->save();
               }
				  
				if($in['TTC'] > 0.0){
				  $payment = array();

				  $payment['Facture'] = $send['Cells']['Facture'];
				  $payment['Amount'] = $send['Cells']['TTC'];
              $payment['Method'] = 1;
				  $payment['Customer'] = $Facture['Customer'];
				  $payment['Type'] = -1;
				  $payment['AT'] = $in['AT'];
				  $payment['State'] = 15;
				  $payment['Member'] = 1;

				  $this->into(Model::SALE_PAYMENT)->set($payment)->save();
			   }
            }
         }
         
         return $send;
      }

      public function edit($in){
         $send = array();
         $send = array_merge($send, $this->display($in));

         $send['LCobons'] = $this->select('*')
            ->from(Model::COBON)
            ->where('ISD', '0')
            ->orderby('ID', false)
            ->get()->all;

         return $send;
      }

      public function update($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::SALE_RETURN)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }
         
         if(!isset($send['Errors'])){
            $Products = $in['Products'];
            $Facture = $in;
            unset($Facture['Products']);
            $send['Success'] = $this->into(Model::SALE_RETURN)->apt($Facture)->save();

            if($send['Success'] === true){

               $this->into(Model::SALE_RETURN_DETAIL)->del($in['ID'], true, 'Facture')->save();

               foreach($Products as $KProduct => $VProduct){
                  $VProduct['Facture'] = $in['ID'];
                  $VProduct['Product'] = $VProduct['ID'];

                  unset($VProduct['Code']);
                  unset($VProduct['Name']);

                  $Products[$KProduct] = $VProduct;

                  $this->into(Model::SALE_RETURN_DETAIL)->set($VProduct)->save();
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
            ->from(Model::SALE_RETURN)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::SALE_RETURN)->del($in)->save();
            if($send['Success'] === true){
               $this->into(Model::SALE_RETURN_DETAIL)->del($in['ID'], false, 'Facture')->save();
            }
            $send['Cells'] = $this->select('*')
               ->from(Model::SALE_RETURN)
               ->where('ID', $in['ID'])
               ->get()->first;
         }

         return $send;
      }

      public function dashboard($in){
         $Payements = array();

         $Payements['Count'] = $this->select('*')
            ->from(Model::PAYMENT)
            ->where('ISD', '0', '=')
            ->get()->count;

         $Payements['Payed']['Cells'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', '15', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;
         $Payements['Payed']['Count'] = $this->select('*')
            ->from(Model::PAYMENT)
            ->where('State', '15', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->count;
         $Payements['Payed']['Percent'] = percent($Payements['Count'], $Payements['Payed']['Count']);

         $Payements['Completed']['Cells'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', '16', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;
         $Payements['Completed']['Count'] = $this->select('*')
            ->from(Model::PAYMENT)
            ->where('State', '16', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->count;
         $Payements['Completed']['Percent'] = percent($Payements['Count'], $Payements['Completed']['Count']);

         $Payements['Waiting']['Cells'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', '14', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;
         $Payements['Waiting']['Count'] = $this->select('*')
            ->from(Model::PAYMENT)
            ->where('State', '14', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->count;
         $Payements['Waiting']['Percent'] = percent($Payements['Count'], $Payements['Waiting']['Count']);

         $Payements['Bloked']['Cells'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', '4', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;
         $Payements['Bloked']['Count'] = $this->select('*')
            ->from(Model::PAYMENT)
            ->where('State', '4', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->count;
         $Payements['Bloked']['Percent'] = percent($Payements['Count'], $Payements['Bloked']['Count']);

         $Payements['Canceled']['Cells'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', '6', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;
         $Payements['Canceled']['Count'] = $this->select('*')
            ->from(Model::PAYMENT)
            ->where('State', '6', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->count;
         $Payements['Canceled']['Percent'] = percent($Payements['Count'], $Payements['Canceled']['Count']);

         $Payements['Cash']['Cells'] = $this->select('*')
            ->from(Model::METHOD)
            ->where('ID', '1', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;
         $Payements['Cash']['Count'] = $this->select('*')
            ->from(Model::PAYMENT)
            ->where('Method', '1', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->count;
         $Payements['Cash']['Percent'] = percent($Payements['Count'], $Payements['Cash']['Count']);

         $Payements['Card']['Cells'] = $this->select('*')
            ->from(Model::METHOD)
            ->where('ID', '2', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;
         $Payements['Card']['Count'] = $this->select('*')
            ->from(Model::PAYMENT)
            ->where('Method', '2', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->count;
         $Payements['Card']['Percent'] = percent($Payements['Count'], $Payements['Card']['Count']);

         $Payements['Transfer']['Cells'] = $this->select('*')
            ->from(Model::METHOD)
            ->where('ID', '3', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;
         $Payements['Transfer']['Count'] = $this->select('*')
            ->from(Model::PAYMENT)
            ->where('Method', '3', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->count;
         $Payements['Transfer']['Percent'] = percent($Payements['Count'], $Payements['Transfer']['Count']);

         $Payements['Cells'] = $this->select('*')
            ->from(Model::PAYMENT)
            ->where('ISD', '0', '=', 'AND')
            ->get()->all;

         if(is_array($Payements['Cells']) and count($Payements['Cells']) > 0){

            foreach($Payements['Cells'] as $KPayement => $VPayement){

               $VPayement['Payements'] = (float) $this->select('*')
                  ->from(Model::PAYMENT)
                  ->where('ISD', '0', '=')
                  ->where('Sale', $VPayement['ID'], '=', 'AND')
                  ->get()->sum('PAmount');
               
               $VPayement['Percent'] = 0;//percent($VSale['TTC'], $VSale['Payements']);
               $Payements['Cells'][$KPayement] = $VPayement;

               if($VPayement['Percent'] == 100){
                  unset($Payements['Cells'][$KPayement]);
               }
            }

         }

         $send['Payements'] = $Payements;

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
