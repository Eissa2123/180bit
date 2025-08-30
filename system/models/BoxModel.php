<?php
   class BoxModel extends Model{

      //const ITEM = ',expenses,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LBoxs'] = array();

         $send['LExpenses'] = $send['LExpenses'] = $this->select('*')
            ->from(Model::EXPENSE)
            ->where('ISD', '0', '=')
            ->between('AT', $in['From'], $in['To'], 'AND')
            ->orderby('AT', false)
            ->get()->all;
            
         if(is_array($send['LExpenses']) and count($send['LExpenses']) > 0){

            foreach($send['LExpenses'] as $k => $v){

               $v['Method'] = $this->select('ID, Code, NameFR, NameEN, NameAR')
                  ->from(Model::METHOD)
                  ->where('ID', $v['Method'])
                  ->get()->first;

               $v['State'] = $this->select('ID, NameFR, NameEN, NameAR, Class')
                  ->from(Model::STATE)
                  ->where('ID', $v['State'])
                  ->get()->first;

               $v['SRC'] = "Expense";
               $v['IN'] = "";
               $v['OUT'] = $v['Amount'];
               $v['Details'] = 'expense/display/'.$v['ID'];

               if($v['IN'] == ''){
                  $v['State'] = "danger";
               }else{
                  $v['State'] = "success";
               }

               $send['LExpenses'][$k] = $v;

               $send['LBoxs'][] = array(
                  'ID'           => $v['ID'],
                  'Code'         => $v['Code'],
                  'Name'         => $v['Name'],
                  'AT'           => $v['AT'],
                  'SRC'          => $v['SRC'],
                  'IN'           => $v['IN'],
                  'OUT'          => $v['OUT'],
                  'Method'       => $v['Method'],
                  'State'        => $v['State'],
                  'CAT'          => $v['CAT'],
                  'Details'      => $v['Details']
               );
            }
         }

         $send['LPurchasespayements'] = $this->select('*')
            ->from(Model::PURCHASE_PAYMENT)
            ->where('ISD', '0', '=')
            ->between('AT', $in['From'], $in['To'], 'AND')
            ->orderby('AT', false)
            ->get()->all;
            
         if(is_array($send['LPurchasespayements']) and count($send['LPurchasespayements']) > 0){

            foreach($send['LPurchasespayements'] as $k => $v){

               $v['Method'] = $this->select('ID, Code, NameFR, NameEN, NameAR')
                  ->from(Model::METHOD)
                  ->where('ID', $v['Method'])
                  ->get()->first;

               $v['State'] = $this->select('ID, NameFR, NameEN, NameAR, Class')
                  ->from(Model::STATE)
                  ->where('ID', $v['State'])
                  ->get()->first;

               $v['Name'] = "";
               $v['SRC'] = "Purchase";
               $v['IN'] = "";
               $v['OUT'] = $v['Amount'];
               $v['Details'] = 'purchase/display/'.$v['ID'];

               if($v['IN'] == ''){
                  $v['State'] = "danger";
               }else{
                  $v['State'] = "success";
               }

               $send['LPurchasespayements'][$k] = $v;

               $send['LBoxs'][] = array(
                  'ID'           => $v['ID'],
                  'Code'         => $v['Code'],
                  'Name'         => $v['Name'],
                  'SRC'          => $v['SRC'],
                  'AT'           => $v['AT'],
                  'IN'           => $v['IN'],
                  'OUT'          => $v['OUT'],
                  'Method'       => $v['Method'],
                  'State'        => $v['State'],
                  'CAT'          => $v['CAT'],
                  'Details'      => $v['Details']
               );
            }
         }
         
         $send['LPurchasereturns'] = $this->select('*')
            ->from(Model::PURCHASE_RETURN)
            ->where('ISD', '0', '=')
            ->between('AT', $in['From'], $in['To'], 'AND')
            ->orderby('AT', false)
            ->get()->all;
            
         if(is_array($send['LPurchasereturns']) and count($send['LPurchasereturns']) > 0){

            foreach($send['LPurchasereturns'] as $k => $v){

               $v['Method'] = "";

               $v['State'] = "";
                  
               $v['Name'] = "";
               $v['SRC'] = "Purchasereturn";
               $v['IN'] = $v['TTC'];
               $v['OUT'] = "";
               $v['Details'] = 'purchasereturn/display/'.$v['ID'];

               if($v['IN'] == ''){
                  $v['State'] = "danger";
               }else{
                  $v['State'] = "success";
               }

               $send['LPurchasereturns'][$k] = $v;

               $send['LBoxs'][] = array(
                  'ID'           => $v['ID'],
                  'Code'         => $v['Code'],
                  'Name'         => $v['Name'],
                  'SRC'          => $v['SRC'],
                  'AT'           => $v['AT'],
                  'IN'           => $v['IN'],
                  'OUT'          => $v['OUT'],
                  'Method'       => $v['Method'],
                  'State'        => $v['State'],
                  'CAT'          => $v['CAT'],
                  'Details'      => $v['Details']
               );
            }
         }

         $send['LRevenues'] = $this->select('*')
            ->from(Model::REVENUE)
            ->where('ISD', '0', '=')
            ->between('AT', $in['From'], $in['To'], 'AND')
            ->orderby('AT', false)
            ->get()->all;
            
         if(is_array($send['LRevenues']) and count($send['LRevenues']) > 0){

            foreach($send['LRevenues'] as $k => $v){

               $v['Method'] = $this->select('ID, Code, NameFR, NameEN, NameAR')
                  ->from(Model::METHOD)
                  ->where('ID', $v['Method'])
                  ->get()->first;

               $v['State'] = $this->select('ID, NameFR, NameEN, NameAR, Class')
                  ->from(Model::STATE)
                  ->where('ID', $v['State'])
                  ->get()->first;

               $v['SRC'] = "Revenue";
               $v['IN'] = $v['Amount'];
               $v['OUT'] = "";
               $v['Details'] = 'revenue/display/'.$v['ID'];

               if($v['IN'] == ''){
                  $v['State'] = "danger";
               }else{
                  $v['State'] = "success";
               }

               $send['LRevenues'][$k] = $v;

               $send['LBoxs'][] = array(
                  'ID'           => $v['ID'],
                  'Code'         => $v['Code'],
                  'Name'         => $v['Name'],
                  'SRC'          => $v['SRC'],
                  'AT'           => $v['AT'],
                  'IN'           => $v['IN'],
                  'OUT'          => $v['OUT'],
                  'Method'       => $v['Method'],
                  'State'        => $v['State'],
                  'CAT'          => $v['CAT'],
                  'Details'      => $v['Details']
               );
            }
         }

         $send['LSales'] = $this->select('*')
            ->from(Model::SALE_PAYMENT)
            ->where('ISD', '0', '=')
            ->between('AT', $in['From'], $in['To'], 'AND')
            ->orderby('AT', false)
            ->get()->all;
            
         if(is_array($send['LSales']) and count($send['LSales']) > 0){

            foreach($send['LSales'] as $k => $v){

               $v['Method'] = $this->select('ID, Code, NameFR, NameEN, NameAR')
                  ->from(Model::METHOD)
                  ->where('ID', $v['Method'])
                  ->get()->first;

               $v['State'] = $this->select('ID, NameFR, NameEN, NameAR, Class')
                  ->from(Model::STATE)
                  ->where('ID', $v['State'])
                  ->get()->first;

               $v['Name'] = "";
               $v['SRC'] = "Sale";
               $v['IN'] = $v['Amount'];
               $v['OUT'] = "";
               $v['Details'] = 'sale/display/'.$v['ID'];

               if($v['IN'] == ''){
                  $v['State'] = "danger";
               }else{
                  $v['State'] = "success";
               }

               $send['LSales'][$k] = $v;

               $send['LBoxs'][] = array(
                  'ID'           => $v['ID'],
                  'Code'         => $v['Code'],
                  'Name'         => $v['Name'],
                  'SRC'          => $v['SRC'],
                  'AT'           => $v['AT'],
                  'IN'           => $v['IN'],
                  'OUT'          => $v['OUT'],
                  'Method'       => $v['Method'],
                  'State'        => $v['State'],
                  'CAT'          => $v['CAT'],
                  'Details'      => $v['Details']
               );
            }
         }
         
         $send['LSalesereturns'] = $this->select('*')
            ->from(Model::SALE_RETURN)
            ->where('ISD', '0', '=')
            ->between('AT', $in['From'], $in['To'], 'AND')
            ->orderby('AT', false)
            ->get()->all;
            
         if(is_array($send['LSalesereturns']) and count($send['LSalesereturns']) > 0){

            foreach($send['LSalesereturns'] as $k => $v){

               $v['Method'] = "";
                  
               $v['Name'] = "";
               $v['SRC'] = "Salesereturn";
               $v['IN'] = "";
               $v['OUT'] = $v['TTC'];
               $v['Details'] = 'salesereturn/display/'.$v['ID'];

               if($v['IN'] == ''){
                  $v['State'] = "danger";
               }else{
                  $v['State'] = "success";
               }

               $send['LSalesereturns'][$k] = $v;

               $send['LBoxs'][] = array(
                  'ID'           => $v['ID'],
                  'Code'         => $v['Code'],
                  'Name'         => $v['Name'],
                  'SRC'          => $v['SRC'],
                  'AT'           => $v['AT'],
                  'IN'           => $v['IN'],
                  'OUT'          => $v['OUT'],
                  'Method'       => $v['Method'],
                  'State'        => $v['State'],
                  'CAT'          => $v['CAT'],
                  'Details'      => $v['Details']
               );
            }
         }

         $send['Count'] = count($send['LBoxs']);

         if(L($send, 'LBoxs')){
            $LBoxs = array();
            $size = $send['Count'];
            $length = $in['Length'];
            $page = $in['Page'];
            $from = ($page - 1) * $length;
            $to = $from + $length - 1;

            $x = array(
               'size'   => $size,
               'length' => $length,
               'page'   => $page,
               'from'   => $from,
               'to'     => $to,
            );
            
            $LBoxs = array_slice($send['LBoxs'], $from, $length); 
            $send['LBoxs'] = $LBoxs;
         }

         $send['LMethods'] = $this->select('*')
            ->from(Model::METHOD)
            ->where('ISD', '0', '=')
            ->get()->all;

         return $send;
      }
      
      public function print($in){
         $send = array();

         $send['LExpenses'] = $this->select('*')
            ->from(Model::EXPENSE)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('Name', $in['Name'], 'LIKE', 'AND')
            ->where('Method', $in['Methods'], 'IN', 'AND')
            ->where('Employee', $in['Employees'], 'IN', 'AND')
            ->where('State', $in['States'], 'IN', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->orderby('ID', false)
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LExpenses']) and count($send['LExpenses']) > 0){

            foreach($send['LExpenses'] as $KExpense => $VExpense){

               $VExpense['Method'] = $this->select('*')
                  ->from(Model::METHOD)
                  ->where('ID', $VExpense['Method'])
                  ->get()->first;

               $VExpense['Employee'] = $this->select('*')
                  ->from(Model::EMPLOYEE)
                  ->where('ID', $VExpense['Employee'])
                  ->get()->first;

               $VExpense['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VExpense['State'])
                  ->get()->first;

               $send['LExpenses'][$KExpense] = $VExpense;
            }
         }

         return $send;
      }
	  
   }
