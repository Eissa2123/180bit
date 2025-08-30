<?php
   class BalancefinancialModel extends Model{

      const ITEM = ',balancesfinancials,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LRevenues'] = $this->select('*')
            ->from(Model::BALANCES_FINANCIALS)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('Name', $in['Name'], 'LIKE', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->orderby('ID', false)
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LRevenues']) and count($send['LRevenues']) > 0){

            foreach($send['LRevenues'] as $KExpense => $VExpense){

               $VExpense['Employee'] = $this->select('*')
                  ->from(Model::EMPLOYEE)
                  ->where('ISD', '0', '=')
                  ->where('Job', '3', '=', 'AND')
                  ->where('ID', $VExpense['Employee'], '=', 'AND')
                  ->get()->first;

               $send['LRevenues'][$KExpense] = $VExpense;
            }
         }

         $send['LEmployees'] = $this->select('*')
            ->from(Model::EMPLOYEE)
            ->where('ISD', '0', '=')
            ->where('ID', '3', '=', 'AND')
            ->get()->all;

         return $send;
      }
      
      public function print($in){
         $send = array();

         $send['LRevenues'] = $this->select('*')
            ->from(Model::BALANCES_FINANCIALS)
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

               $send['LRevenues'][$KExpense] = $VExpense;
            }
         }

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::BALANCES_FINANCIALS)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if(L($send,'Cells')){

            $send['Cells']['Employee'] = $this->select('*')
               ->from(Model::EMPLOYEE)
               ->where('ID', $send['Cells']['Employee'])
               ->get()->first;

         }

         return $send;
      }

      public function add($in){
         $send = array();

         $send['LEmployees'] = $this->select('*')
            ->from(Model::EMPLOYEE)
            ->where('Job', '3', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->all;

         $tax = $this->select('*')
            ->from(Model::SALE)
            ->where('ISD', '0', '=', 'AND')
            ->get()->sum('Tax');

         $payed = $this->select('*')
            ->from(Model::BALANCES_FINANCIALS)
            ->where('Employee', '0', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->sum('Amount');

         $impayed = ((double) $tax) - ((double) $payed);

         $send['Cells']['Impayed'] = $impayed;

         return $send;
      }

      public function insert($in){
         $send = array();

         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::BALANCES_FINANCIALS)->set($in)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::BALANCES_FINANCIALS)
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

            $send['LEmployees'] = $this->select('*')
               ->from(Model::EMPLOYEE)
               ->where('ISD', '0', '=')
               ->where('Job', '3', '=', 'AND')
               ->get()->all;

            $tax = $this->select('*')
               ->from(Model::SALE)
               ->where('ISD', '0', '=', 'AND')
               ->get()->sum('Tax');

            $payed = $this->select('*')
               ->from(Model::BALANCES_FINANCIALS)
               ->where('Employee', '0', '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->sum('Amount');

            $impayed = ((double) $tax) - ((double) $payed) + ((double) $Cells['Amount']);

            $Cells['Impayed'] = $impayed;
               
            $send['Cells'] = $Cells;
               
         }

         return $send;
      }

      public function update($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::BALANCES_FINANCIALS)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'][] = $this->into(Model::BALANCES_FINANCIALS)->apt($in)->save();
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
            ->from(Model::BALANCES_FINANCIALS)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::BALANCES_FINANCIALS)->del($in)->save();
         }

         return $send;
      }

   }
