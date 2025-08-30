<?php
   class CobonModel extends Model{

      const ITEM = ',cobons,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LCobons'] = $this->select('*')
            ->from(Model::COBON)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('Name', $in['Name'], 'LIKE', 'AND')
            ->where('State', $in['States'], 'IN', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LCobons']) and count($send['LCobons']) > 0){

            foreach($send['LCobons'] as $KCobon => $VCobon){

               $VCobon['Marketer'] = $this->select('*')
                  ->from(Model::MARKETER)
                  ->where('ID', $VCobon['Marketer'])
                  ->get()->first;
                  
               $VCobon['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VCobon['State'])
                  ->get()->first;

               $send['LCobons'][$KCobon] = $VCobon;
            }
         }

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

         $send['LCobons'] = $this->select('*')
            ->from(Model::COBON)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('Name', $in['Name'], 'LIKE', 'AND')
            ->where('State', $in['States'], 'IN', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LCobons']) and count($send['LCobons']) > 0){

            foreach($send['LCobons'] as $KCobon => $VCobon){

               $VCobon['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VCobon['State'])
                  ->get()->first;

               $send['LCobons'][$KCobon] = $VCobon;
            }
         }

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::COBON)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if(L($send,'Cells')){

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

         $send['LMarketers'] = $this->select('*')
            ->from(Model::MARKETER)
            ->where('ISD', '0', '=')
            ->where('State', '2', '=', 'AND')
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

         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::COBON)->set($in)->save();
            
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::COBON)
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
               
            $send['Cells'] = $Cells;
               
         }

         $send['LMarketers'] = $this->select('*')
            ->from(Model::MARKETER)
            ->where('ISD', '0', '=')
            ->where('State', '2', '=', 'AND')
            ->get()->all;

         return $send;
      }

      public function update($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::COBON)
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
            $send['Success'][] = $this->into(Model::COBON)->apt($in)->save();
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
            ->from(Model::COBON)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::COBON)->del($in)->save();
         }

         return $send;
      }

   }
