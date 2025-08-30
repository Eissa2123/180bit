<?php
   class BalancecustomerModel extends Model{

      const ITEM = ',balancescustomers,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LRevenues'] = $this->select('*')
            ->from(Model::BALANCES_CUSTOMERS)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LRevenues']) and count($send['LRevenues']) > 0){

            foreach($send['LRevenues'] as $KExpense => $VExpense){

               $VExpense['Customer'] = $this->select('*')
                  ->from(Model::CUSTOMER)
                  ->where('ID', $VExpense['Customer'])
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
            ->from(Model::BALANCES_CUSTOMERS)
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
            ->from(Model::BALANCES_CUSTOMERS)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if(L($send,'Cells')){

            $Cells = $send['Cells'];

            $Cells['Customer'] = $this->select('*')
               ->from(Model::CUSTOMER)
               ->where('ID', $Cells['Customer'])
               ->get()->first;

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

         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::BALANCES_CUSTOMERS)->set($in)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::BALANCES_CUSTOMERS)
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

            $send['Cells'] = $Cells;
               
         }

         return $send;
      }

      public function update($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::BALANCES_CUSTOMERS)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'][] = $this->into(Model::BALANCES_CUSTOMERS)->apt($in)->save();
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
            ->from(Model::BALANCES_CUSTOMERS)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::BALANCES_CUSTOMERS)->del($in)->save();
         }

         return $send;
      }

   }
