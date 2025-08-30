<?php
   class CustomerModel extends Model{

      const ITEM = ',customers,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LCustomers'] = $this->select('*')
            ->from(Model::CUSTOMER)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('RC', $in['RC'], 'LIKE', 'AND')
            ->where('Taxnumber', $in['Taxnumber'], 'LIKE', 'AND')
            ->where('Companyname', $in['Companyname'], 'LIKE', 'AND')
            ->where('Type', $in['Type'], '=', 'AND')
            ->where('State', $in['State'], '=', 'AND')
            ->where('Type', $in['Types'], 'IN', 'AND')
            ->where('State', $in['States'], 'IN', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LCustomers']) and count($send['LCustomers']) > 0){

            foreach($send['LCustomers'] as $KCustomer => $VCustomer){
               
               $VCustomer['Type'] = $this->select('*')
                  ->from(Model::GENDER)
                  ->where('ID', $VCustomer['Type'])
                  ->get()->first;

               $VCustomer['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VCustomer['State'])
                  ->get()->first;

               $send['LCustomers'][$KCustomer] = $VCustomer;
            }
         }

         $send['LTypes'] = $this->select('*')
            ->from(Model::GENDER)
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

         $send['LCustomers'] = $this->select('*')
            ->from(Model::CUSTOMER)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('RC', $in['RC'], 'LIKE', 'AND')
            ->where('Taxnumber', $in['Taxnumber'], 'LIKE', 'AND')
            ->where('Companyname', $in['Companyname'], 'LIKE', 'AND')
            ->where('Type', $in['Type'], '=', 'AND')
            ->where('State', $in['State'], '=', 'AND')
            ->where('State', $in['States'], 'IN', 'AND')
            ->where('Type', $in['Types'], 'IN', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LCustomers']) and count($send['LCustomers']) > 0){

            foreach($send['LCustomers'] as $KCustomer => $VCustomer){
               
               $VCustomer['Type'] = $this->select('*')
                  ->from(Model::GENDER)
                  ->where('ID', $VCustomer['Type'])
                  ->get()->first;

               $VCustomer['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VCustomer['State'])
                  ->get()->first;

               $send['LCustomers'][$KCustomer] = $VCustomer;
            }
         }

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::CUSTOMER)
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

         if(isset($in['Code']) and $in['Code'] != ''){
            $customer = $this->select('*')
               ->from(Model::CUSTOMER)
               ->where('Code', $in['Code'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;

            if($customer !== null){
               $send['Errors'][] = 'Customer';
            }
         }

         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::CUSTOMER)->set($in)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::CUSTOMER)
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
         }
         $send['LTypes'] = $this->select('*')
            ->from(Model::GENDER)
            ->where('ISD', '0', '=')
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

         return $send;
      }

      public function update($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::CUSTOMER)
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
            $send['Success'][] = $this->into(Model::CUSTOMER)->apt($in)->save();
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
            ->from(Model::CUSTOMER)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::CUSTOMER)->del($in)->save();
         }

         return $send;
      }

   }
