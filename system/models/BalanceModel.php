<?php
   class BalanceModel extends Model{

      const ITEM = ',revenues,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LRevenues'] = $this->select('*')
            ->from(Model::REVENUE)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('Name', $in['Name'], 'LIKE', 'AND')
            ->where('Method', $in['Methods'], 'IN', 'AND')
            ->where('State', $in['States'], 'IN', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LRevenues']) and count($send['LRevenues']) > 0){

            foreach($send['LRevenues'] as $KExpense => $VExpense){

               $VExpense['Method'] = $this->select('*')
                  ->from(Model::METHOD)
                  ->where('ID', $VExpense['Method'])
                  ->get()->first;

               $VExpense['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VExpense['State'])
                  ->get()->first;

               $send['LRevenues'][$KExpense] = $VExpense;
            }
         }

         $send['LMethods'] = $this->select('*')
            ->from(Model::METHOD)
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

         $send['LRevenues'] = $this->select('*')
            ->from(Model::REVENUE)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('Name', $in['Name'], 'LIKE', 'AND')
            ->where('Method', $in['Methods'], 'IN', 'AND')
            ->where('State', $in['States'], 'IN', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LRevenues']) and count($send['LRevenues']) > 0){

            foreach($send['LRevenues'] as $KExpense => $VExpense){

               $VExpense['Method'] = $this->select('*')
                  ->from(Model::METHOD)
                  ->where('ID', $VExpense['Method'])
                  ->get()->first;

               $VExpense['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VExpense['State'])
                  ->get()->first;

               $send['LRevenues'][$KExpense] = $VExpense;
            }
         }

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::REVENUE)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if(L($send,'Cells')){

            $send['Cells']['Method'] = $this->select('*')
               ->from(Model::METHOD)
               ->where('ID', $send['Cells']['Method'])
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

         $send['LMethods'] = $this->select('*')
            ->from(Model::METHOD)
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

         $State = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', $in['State'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($State === null){
            $send['Errors'][] = 'State';
         }

         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::REVENUE)->set($in)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::REVENUE)
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
            
            $send['LMethods'] = $this->select('*')
               ->from(Model::METHOD)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['Method']['ID'], '<>', 'AND')
               ->get()->all;
            
            $send['LMethods'][] = $this->select('*')
               ->from(Model::METHOD)
               ->where('ISD', '0', '=')
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
            ->from(Model::REVENUE)
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
            $send['Success'][] = $this->into(Model::REVENUE)->apt($in)->save();
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
            ->from(Model::REVENUE)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::REVENUE)->del($in)->save();
         }

         return $send;
      }

   }

