<?php
   class MarketerModel extends Model{

      const ITEM = ',marketers,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LMarketers'] = $this->select('*')
            ->from(Model::MARKETER)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('Name', $in['Name'], 'LIKE', 'AND')
            ->where('Type', $in['Type'], '=', 'AND')
            ->where('State', $in['State'], '=', 'AND')
            ->where('State', $in['States'], 'IN', 'AND')
            //->where('Type', $in['Types'], 'IN', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LMarketers']) and count($send['LMarketers']) > 0){

            foreach($send['LMarketers'] as $KProvider => $VProvider){
               
               $VProvider['Type'] = $this->select('*')
                  ->from(Model::GENDER)
                  ->where('ID', $VProvider['Type'], '=')
                  ->get()->first;

               $VProvider['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VProvider['State'], '=')
                  ->get()->first;

               $Cobons = $this->select('*')
                  ->from(Model::COBON)
                  ->where('Marketer', $VProvider['ID'], '=')
                  ->get()->all;


               $Due = 0.0;
               if($Cobons != null and count($Cobons) > 0){
                  foreach($Cobons as $Cobon){

                     $Sales = $this->select('*')
                        ->from(Model::SALE)
                        ->where('Cobon', $Cobon['ID'], '=')
                        ->get()->all;

                     if($Sales != null and count($Sales) > 0){
                        foreach($Sales as $Sale){
                           $Ratios = (double) $Cobon['Ratios'];
                           $TTC = (double) $Sale['TTC'];

                           $Due += ($TTC / 100 ) * $Ratios;                           
                        }
                     }
                  }
               }

               $Paid = $this->select('*')
                  ->from(Model::EXPENSE)
                  ->where('Marketer', $VProvider['ID'], '=')
                  ->get()->sum('Amount');

               $VProvider['Due'] = $Due;
               $VProvider['Paid'] = $Paid;
               $VProvider['Remaining'] = $Due - $Paid;

               $send['LMarketers'][$KProvider] = $VProvider;
            }
         }

         $send['LTypes'] = $this->select('*')
            ->from(Model::GENDER)
            ->where('ISD', '0', '=')
            ->where('ID', array(1,2), 'IN', 'AND')
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

         $send['LMarketers'] = $this->select('*')
            ->from(Model::MARKETER)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('Name', $in['Name'], 'LIKE', 'AND')
            ->where('Type', $in['Type'], '=', 'AND')
            ->where('State', $in['State'], '=', 'AND')
            ->where('State', $in['States'], 'IN', 'AND')
            ->where('Type', $in['Types'], 'IN', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LMarketers']) and count($send['LMarketers']) > 0){

            foreach($send['LMarketers'] as $KProvider => $VProvider){
               
               $VProvider['Type'] = $this->select('*')
                  ->from(Model::GENDER)
                  ->where('ID', $VProvider['Type'])
                  ->get()->first;

               $VProvider['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VProvider['State'])
                  ->get()->first;

               $send['LMarketers'][$KProvider] = $VProvider;
            }
         }

         return $send;
      }
      
      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::MARKETER)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if(L($send,'Cells')){
            $send['Cells']['Type'] = $this->select('*')
               ->from(Model::GENDER)
               ->where('ID', $send['Cells']['Type'])
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

         $send['LTypes'] = $this->select('*')
            ->from(Model::GENDER)
            ->where('ISD', '0', '=')
            ->where('ID', array(1,2), 'IN', 'AND')
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

         $State = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', $in['State'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($State === null){
            $send['Errors'][] = 'State';
         }

         $Marketer = $this->select('*')
            ->from(Model::MARKETER)
            ->where('Code', $in['Code'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($in['Code'] != '' and $Marketer !== null){
            $send['Errors'][] = 'Marketer';
         }

         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::MARKETER)->set($in)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::MARKETER)
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

            $send['LTypes'] = $this->select('*')
               ->from(Model::GENDER)
               ->where('ISD', '0', '=')
               ->where('ID', array(1,2), 'IN', 'AND')
               ->get()->all;

            $send['LStates'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['State']['ID'], '<>', 'AND')
               ->where('Items', self::ITEM, 'LIKE', 'AND')
               ->get()->all;
   
            $send['LStates'][] = $this->select('*')
               ->from(Model::STATE)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['State']['ID'], '=', 'AND')
               ->get()->first;
         }

         return $send;
      }

      public function update($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::MARKETER)
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
            $send['Success'][] = $this->into(Model::MARKETER)->apt($in)->save();
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
            ->from(Model::MARKETER)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::MARKETER)->del($in)->save();
         }

         return $send;
      }

   }
