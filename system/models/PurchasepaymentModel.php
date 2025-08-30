<?php
   class PurchasepaymentModel extends Model{
      const ITEM = ',purchasespayments,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();
         $purchase = null;

         if($in['Purchase'] !== ''){
            $purchase =  $this->select('*')
               ->from(Model::PURCHASE)
               ->where('ID', $in['Purchase'])
               ->get()->first;
         }

         $this->select('*')->from(Model::PURCHASE_PAYMENT)->where('ISD', '0', '=');

         if($purchase != null){
            $this->where('Facture', $in['Purchase'], '=', 'AND');
         }
         
         $send['LPurchasepayments'] = $this->orderby('ID', false)->get()->all;

         if(is_array($send['LPurchasepayments']) and count($send['LPurchasepayments']) > 0){
            foreach($send['LPurchasepayments'] as $KPurchase => $VPurchase){
               
               $VPurchase['Facture'] = $this->select('*')
                  ->from(Model::PURCHASE)
                  ->where('ID', $VPurchase['Facture'])
                  ->get()->first;

               $VPurchase['Provider'] = $this->select('*')
                  ->from(Model::PROVIDER)
                  ->where('ID', $VPurchase['Provider'])
                  ->get()->first;

               $VPurchase['Method'] = $this->select('*')
                  ->from(Model::METHOD)
                  ->where('ID', $VPurchase['Method'])
                  ->get()->first;
               
               $VPurchase['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VPurchase['State'])
                  ->get()->first;

               $send['LPurchasepayments'][$KPurchase] = $VPurchase;
            }
         }

         return $send;
      }
            
      public function print($in){
         $send = array();
         $purchase = null;

         if($in['Purchase'] !== ''){
            $purchase =  $this->select('*')
               ->from(Model::PURCHASE)
               ->where('ID', $in['Purchase'])
               ->get()->first;
         }

         if($purchase == null){
            $send['Errors'][] = 'Purchase';
         }else{
            $send['LPurchasepayments'] = $this->select('*')
               ->from(Model::PURCHASE_PAYMENT)
               ->where('ISD', '0', '=')
               ->where('Facture', $in['Purchase'], '=', 'AND')
               ->get()->all;

            if(is_array($send['LPurchasepayments']) and count($send['LPurchasepayments']) > 0){
               foreach($send['LPurchasepayments'] as $KPurchase => $VPurchase){
                  
                  $VPurchase['Method'] = $this->select('*')
                     ->from(Model::METHOD)
                     ->where('ID', $VPurchase['Method'])
                     ->get()->first;
                  
                  $VPurchase['State'] = $this->select('*')
                     ->from(Model::STATE)
                     ->where('ID', $VPurchase['State'])
                     ->get()->first;

                  $send['LPurchasepayments'][$KPurchase] = $VPurchase;
               }
            }
         }

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::PURCHASE_PAYMENT)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if(L($send,'Cells')){
            $Cells = $send['Cells'];

            $Cells['Facture'] = $this->select('*')
               ->from(Model::PURCHASE)
               ->where('ID', $Cells['Facture'])
               ->get()->first;

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

            $send['Cells'] = $Cells;

         }
         return $send;
      }

      public function add($in){
         $send = array();

         $send['Cells'] = '';
         
         if(isset($in['Purchase'])){
            $send['Cells'] = $this->select('*')
               ->from(Model::PURCHASE)
               ->where('ID', $in['Purchase'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;
               
            if(is_array($send['Cells']) and count($send['Cells']) > 0){

               $send['Cells']['Paids'] = $this->select('*')
                  ->from(Model::PURCHASE_PAYMENT)
                  ->where('Facture', $send['Cells']['ID'])
                  ->where('Type', '1', '=', 'AND')
                  ->where('ISD', '0', '=', 'AND')
                  ->get()->sum('Amount');

               $send['Cells']['Return'] = $this->select('*')
                  ->from(Model::PURCHASE_PAYMENT)
                  ->where('Facture', $send['Cells']['ID'])
                  ->where('Type', '-1', '=', 'AND')
                  ->where('ISD', '0', '=', 'AND')
                  ->get()->sum('Amount');
               
                  $send['Cells']['Rest'] = ((double) $send['Cells']['TTC']) - ((double) $send['Cells']['Return']) - ((double) $send['Cells']['Paids']);
            }
         }

         $send['LProviders'] = $this->select('*')
            ->from(Model::PROVIDER)
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
            $Purchase = $this->select('*')
               ->from(Model::PURCHASE)
               ->where('ID', $in['Facture'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;
   
            if($Purchase === null){
               $send['Errors'][] = 'Purchase';
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
               ->from(Model::PURCHASE_PAYMENT)
               ->where('Code', $in['Code'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;

            if($payment !== null){
               $send['Errors'][] = 'Payment';
            }
         }
         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::PURCHASE_PAYMENT)->set($in)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::PURCHASE_PAYMENT)
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

            $send['LProviders'] = $this->select('*')
               ->from(Model::PROVIDER)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['Provider']['ID'], '<>', 'AND')
               ->get()->all;
            
            $send['LProviders'][] = $this->select('*')
               ->from(Model::PROVIDER)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['Provider']['ID'], '=', 'AND')
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
            ->from(Model::PURCHASE_PAYMENT)
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
            $send['Success'][] = $this->into(Model::PURCHASE_PAYMENT)->apt($in)->save();
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
            ->from(Model::PURCHASE_PAYMENT)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Success'] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::PURCHASE_PAYMENT)->del($in)->save();
            $send['Cells'] = $this->select('*')
               ->from(Model::PURCHASE_PAYMENT)
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
                  ->where('Purchase', $VPayement['ID'], '=', 'AND')
                  ->get()->sum('PAmount');
               
               $VPayement['Percent'] = 0;//percent($VPurchase['TTC'], $VPurchase['Payements']);
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
