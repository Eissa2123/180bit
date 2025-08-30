<?php
   class BalanceproviderModel extends Model{

      const ITEM = ',balancesproviders,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LRevenues'] = $this->select('*')
            ->from(Model::BALANCES_PROVIDERS)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LRevenues']) and count($send['LRevenues']) > 0){

            foreach($send['LRevenues'] as $KExpense => $VExpense){

               $VExpense['Provider'] = $this->select('*')
                  ->from(Model::PROVIDER)
                  ->where('ID', $VExpense['Provider'])
                  ->get()->first;

               $send['LRevenues'][$KExpense] = $VExpense;
            }
         }

         return $send;
      }
      
      public function print($in){
         $send = array();

         $send['LRevenues'] = $this->select('*')
            ->from(Model::BALANCES_PROVIDERS)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('Name', $in['Name'], 'LIKE', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LRevenues']) and count($send['LRevenues']) > 0){

            foreach($send['LRevenues'] as $KExpense => $VExpense){

               $VExpense['Provider'] = $this->select('*')
                  ->from(Model::PROVIDER)
                  ->where('ID', $VExpense['Provider'])
                  ->get()->first;

               $send['LRevenues'][$KExpense] = $VExpense;
            }
         }

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::BALANCES_PROVIDERS)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if(L($send,'Cells')){

            $Cells = $send['Cells'];

            $Cells['Provider'] = $this->select('*')
               ->from(Model::PROVIDER)
               ->where('ID', $Cells['Provider'])
               ->get()->first;

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

         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::BALANCES_PROVIDERS)->set($in)->save();

            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::BALANCES_PROVIDERS)
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

            $send['Cells'] = $Cells;
               
         }

         return $send;
      }

      public function update($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::BALANCES_PROVIDERS)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'][] = $this->into(Model::BALANCES_PROVIDERS)->apt($in)->save();
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
            ->from(Model::BALANCES_PROVIDERS)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::BALANCES_PROVIDERS)->del($in)->save();
         }

         return $send;
      }

   }
