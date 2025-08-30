<?php
   class ReportModel extends Model{

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LEmployees'] = $this->select('*')
            ->from(Model::EMPLOYEE)
            ->where('ISD', '0', '=')
            ->get()->all;

         $send['LProducts'] = $this->select('*')
            ->from(Model::PRODUCT)
            ->where('ISD', '0', '=')
            ->get()->all;

         $send['LProductsExpense'] = $this->select('*')
            ->from(Model::PRODUCT)
            ->where('State', '2', '=')
            ->where('Nature', [2,3], 'IN', 'AND')
            ->where('ISD', '0', '=', 'AND')
            ->get()->all;

         $send['LProviders'] = $this->select('*')
            ->from(Model::PROVIDER)
            ->where('ISD', '0', '=')
            ->get()->all;

         $send['LCustomers'] = $this->select('*')
            ->from(Model::CUSTOMER)
            ->where('ISD', '0', '=')
            ->get()->all;

         $send['LMethods'] = $this->select('*')
            ->from(Model::METHOD)
            ->where('ISD', '0', '=')
            ->get()->all;

         $send['LProducts'] = $this->select('*')
            ->from(Model::PRODUCT)
            ->where('ISD', '0', '=')
            ->where('Nature', [1, 3], 'IN', 'AND')
            ->get()->all;

         return $send;
      }

   }
