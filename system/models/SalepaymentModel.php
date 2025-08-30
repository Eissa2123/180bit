<?php
   class SalepaymentModel extends Model{
      const ITEM = ',salespayments,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();
         $sale = null;

         if($in['Sale'] !== ''){
            $sale =  $this->select('*')
               ->from(Model::SALE)
               ->where('ISD', '0', '=')
               ->where('ID', $in['Sale'], '=', 'AND')
               ->get()->first;
         }

         $this->select('*')->from(Model::SALE_PAYMENT)->where('ISD', '0', '=');

         if($sale != null){
            $this->where('Facture', $in['Sale'], '=', 'AND');
         }
         $send['LSalepayments'] = $this->where('ISD', '0', '=', 'AND')->orderby('ID', false)->get()->all;

         if(is_array($send['LSalepayments']) and count($send['LSalepayments']) > 0){
            foreach($send['LSalepayments'] as $KSale => $VSale){

               $VSale['Facture'] = $this->select('*')
                  ->from(Model::SALE)
                  ->where('ISD', '0', '=')
                  ->where('ID', $VSale['Facture'], '=', 'AND')
                  ->get()->first;

               $VSale['Method'] = $this->select('*')
                  ->from(Model::METHOD)
                  ->where('ISD', '0', '=')
                  ->where('ID', $VSale['Method'], '=', 'AND')
                  ->get()->first;

               $VSale['Customer'] = $this->select('*')
                  ->from(Model::CUSTOMER)
                  ->where('ISD', '0', '=')
                  ->where('ID', $VSale['Customer'], '=', 'AND')
                  ->get()->first;
               
               $VSale['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ISD', '0', '=')
                  ->where('ID', $VSale['State'], '=', 'AND')
                  ->get()->first;

               $send['LSalepayments'][$KSale] = $VSale;
            }
         }

         return $send;
      }
      
      public function print($in){
         $send = array();
         $sale = null;

         if($in['Sale'] !== ''){
            $sale =  $this->select('*')
               ->from(Model::SALE)
               ->where('ISD', '0', '=')
               ->where('ID', $in['Sale'], '=', 'AND')
               ->get()->first;
         }

         if($sale == null){
            $send['Errors'][] = 'Sale';
         }else{
            $send['LSalepayments'] = $this->select('*')
               ->from(Model::SALE_PAYMENT)
               ->where('ISD', '0', '=')
               ->where('Facture', $in['Sale'], '=', 'AND')
               ->get()->all;

            if(is_array($send['LSalepayments']) and count($send['LSalepayments']) > 0){
               foreach($send['LSalepayments'] as $KSale => $VSale){
                  
                  $VSale['Method'] = $this->select('*')
                     ->from(Model::METHOD)
                     ->where('ID', $VSale['Method'])
                     ->get()->first;
                  
                  $VSale['State'] = $this->select('*')
                     ->from(Model::STATE)
                     ->where('ID', $VSale['State'])
                     ->get()->first;

                  $send['LSalepayments'][$KSale] = $VSale;
               }
            }
         }

         return $send;
      }

      public function display($in){
         $send = array();
         $send['Cells'] = $this->select('*')
            ->from(Model::SALE_PAYMENT)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if(L($send,'Cells')){
            $Cells = $send['Cells'];

            $Cells['Facture'] = $this->select('*')
               ->from(Model::SALE)
               ->where('ID', $Cells['Facture'])
               ->get()->first;

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

            $send['Cells'] = $Cells;
         }
         return $send;
      }

      public function add($in){
         $send = array();
         $send['Cells'] = '';
         if(isset($in['Sale'])){
            $send['Cells'] = $this->select('*')
               ->from(Model::SALE)
               ->where('ID', $in['Sale'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;

            if(is_array($send['Cells']) and count($send['Cells']) > 0){
               $send['Cells']['Paids'] = $this->select('*')
                  ->from(Model::SALE_PAYMENT)
                  ->where('Facture', $send['Cells']['ID'])
                  ->where('Type', '1', '=', 'AND')
                  ->where('ISD', '0', '=', 'AND')
                  ->get()->sum('Amount');
               $send['Cells']['Return'] = $this->select('*')
                  ->from(Model::SALE_PAYMENT)
                  ->where('Facture', $send['Cells']['ID'])
                  ->where('Type', '-1', '=', 'AND')
                  ->where('ISD', '0', '=', 'AND')
                  ->get()->sum('Amount');
               
                  $send['Cells']['Rest'] = ((double) $send['Cells']['TTC']) - ((double) $send['Cells']['Return']) - ((double) $send['Cells']['Paids']);
            }
         }
         $send['LCustomers'] = $this->select('*')
            ->from(Model::CUSTOMER)
            ->where('ISD', '0', '=')
            ->get()->all;

         $send['LMethods'] = $this->select('*')
            ->from(Model::METHOD)
            ->where('ISD', '0', '=')
            ->where('State', '2', '=', 'AND')
            ->get()->all;

         $send['LStates'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ISD', '0', '=', 'AND')
            ->where('Items', self::ITEM, 'LIKE', 'AND')
            ->get()->all;

         return $send;
      }

      public function insert($in){
         $send = array();

         if($in['Facture'] != '0'){
            $Sale = $this->select('*')
               ->from(Model::SALE)
               ->where('ID', $in['Facture'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;
   
            if($Sale === null){
               $send['Errors'][] = 'Sale';
            }
         }

         $Method = $this->select('*')
            ->from(Model::METHOD)
            ->where('ID', $in['Method'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($Method === null){
            $send['Errors'][] = 'Method';
         }

         $State = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', $in['State'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($State === null){
            $send['Errors'][] = 'State';
         }

         if($in['Code'] !== ''){
            $payment = $this->select('*')
               ->from(Model::SALE_PAYMENT)
               ->where('Code', $in['Code'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;

            if($payment !== null){
               $send['Errors'][] = 'Payment';
            }
         }

         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::SALE_PAYMENT)->set($in)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::SALE_PAYMENT)
                  ->where('ID', $this->lastid())
                  ->get()->first;
               $this->refrech($send['Cells']);
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
               ->where('ID', $Cells['Customer']['ID'], '<>', 'AND')
               ->get()->all;

            $send['LCustomers'][] = $this->select('*')
               ->from(Model::CUSTOMER)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['Customer']['ID'], '=', 'AND')
               ->get()->first;

            $send['LMethods'] = $this->select('*')
               ->from(Model::METHOD)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['Method']['ID'], '<>', 'AND')
               ->get()->all;

            $send['LMethods'][] = $this->select('*')
               ->from(Model::METHOD)
               ->where('ISD', '0', '=')
               ->where('State', '2', '=', 'AND')
               ->where('ID', $Cells['Method']['ID'], '=', 'AND')
               ->get()->first;

            $send['LStates'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['State']['ID'], '<>', 'AND')
               ->where('Items', self::ITEM, 'LIKE', 'AND')
               ->get()->all;

            $send['LStates'][] = $this->select('*')
               ->from(Model::STATE)
               ->where('ID', $Cells['State']['ID'], '=')
               ->get()->first;

            $send['Cells'] = $Cells;
         }

         return $send;
      }

      public function update($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::SALE_PAYMENT)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if($in['Method'] != $row['Method']){
            $Method = $this->select('*')
               ->from(Model::METHOD)
               ->where('ID', $in['Method'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;

            if($Method === null){
               $send['Errors'][] = 'Method';
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
            $send['Success'][] = $this->into(Model::SALE_PAYMENT)->apt($in)->save();
            $this->refrech($row);
         }

         return $send;
      }

      public function refrech($in) {
         $send = array();

         $pay = $this->select('*')
            ->from(Model::SALE_PAYMENT)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         $sale = $this->select('*')
            ->from(Model::SALE)
            ->where('ID', $pay['Facture'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($sale === null){
            $send['Errors'][] = 'ID';
         }

         $Paids = $this->select('*')
            ->from(Model::SALE_PAYMENT)
            ->where('Facture', $sale['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->sum('Amount');

         $Return = $this->select('*')
            ->from(Model::SALE_RETURN)
            ->where('Facture', $sale['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->sum('TTC');

         $Paids = (double) $Paids + (double) $sale['Paid'];
         $Rests = (double) $sale['TTC'] - (double) $Return - (double) $Paids;

         $ID = $sale['ID'];
         $State = $sale['State'];

         $sale['TTC'] = NUMERIC::Format($sale['TTC']);

         $Paids = NUMERIC::Format($Paids);
         $Rests = NUMERIC::Format($Rests);

         if($Paids == 0){
            $State = 14;
         }elseif($Rests == 0){
            $State = 15;
         }elseif($Paids > 0 and $Rests > 0){
            $State = 16;
         }else{
            
         }

         $Facture = array(
            'ID' => $ID,
            'State' => $State,
         );

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::SALE)->apt($Facture)->save();
         }
      }

      public function remove($in){
         $send = array();

         $send = array_merge($send, $this->display($in));

         return $send;
      }

      public function delete($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::SALE_PAYMENT)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Success'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::SALE_PAYMENT)->del($in)->save();
            $send['Cells'] = $this->select('*')
               ->from(Model::SALE_PAYMENT)
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
