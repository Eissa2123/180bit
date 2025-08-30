<?php
   class DashboardModel extends Model{

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array(); 

         //1
         $send['Cells']['Employees']['Count'] = $this->select('*')
               ->from(Model::EMPLOYEE)
               ->where('ISD', '0', '=')
               ->where('State', '2', '=', 'AND')
               ->get()->count;

         $send['Cells']['Customers']['Count'] = $this->select('*')
               ->from(Model::CUSTOMER)
               ->where('ISD', '0', '=')
               ->where('State', '2', '=', 'AND')
               ->get()->count;

         $send['Cells']['Clients']['Count'] = $this->select('*')
               ->from(Model::CUSTOMER)
               ->where('ISD', '0', '=')
               ->where('State', '2', '=', 'AND')
               ->get()->count;
         $send['Cells']['Expenses']['Count'] = $this->select('*')
               ->from(Model::EXPENSE)
               ->where('ISD', '0', '=')
               ->where('State', '2', '=', 'AND')
               ->get()->count;
         
         $l = $this->select('*')
            ->from(Model::SALE)
            ->where('ISD', '0', '=')
            ->where('State', '6', '<>', 'AND')
            ->where('Client', $in['Client'], '=', 'AND')
            ->get()->all;

         $pay = 0.0;
         if(is_array($l) && count($l) > 0){
            foreach ($l as $kinvoice => $vinvoice) {
               $pay += (float) $this->select('*')
                  ->from(Model::SALE_PAYMENT)
                  ->where('ISD', '0', '=')
                  ->where('State', '6', '<>', 'AND')
                  ->where('Invoice', $vinvoice['ID'], '=', 'AND')
                  ->get()->sum('PAmount');
            }
         }
         $send['Cells']['Payements']['Amount'] = $pay;

         $send['Cells']['Net']['Amount'] = (float) $this->select('*')
            ->from(Model::SALE)
            ->where('ISD', '0', '=')
            ->where('State', '6', '<>', 'AND')
            ->where('Debt', '0', '<>', 'AND')
            ->where('Client', $in['Client'], '=', 'AND')
            ->get()->sum('TTC');
         
         $send['Cells']['Payements']['Amount'] =  ((float) $send['Cells']['Payements']['Amount']) - ((float) $send['Cells']['Net']['Amount']);

         $send['Cells']['Credits']['Amount'] = 485;
         $send['Cells']['Credits2']['Amount'] = 45;

         $send['Cells']['Totals']['Amount'] = 12;
         $send['Cells']['Totals2']['Amount'] = 87;
         $send['Cells']['Totals3']['Amount'] = 321;

         //2
         $y = $this->select('YEAR(IDate)')
            ->from(Model::SALE)
            ->where('ISD', '0', '=')
            ->where('State', '4', '<>', 'AND')
            ->where('State', '6', '<>', 'AND')
            ->where('Client', $in['Client'], '=', 'AND')
            ->groupby('YEAR(IDate)')
            ->orderby('IDate')
            ->get()->all;//get('YearIDate')
         
         $years = array();
            
         if(is_array($y) && count($y) > 0){
            foreach ($y as $year) {
               $m = $this->select('MONTH(IDate), SUM(TTC)')
                  ->from(Model::INVOICE)
                  ->where('ISD', '0', '=')
                  ->where('State', '4', '<>', 'AND')
                  ->where('State', '6', '<>', 'AND')
                  ->where('Client', $in['Client'], '=', 'AND')
                  ->where('YEAR(IDate)', $year['YearIDate'], '=', 'AND')
                  ->groupby('YEAR(IDate), MONTH(IDate)')
                  ->get()->all;

               $d = array();
               for ($i=1; $i <= 12; $i++) { 
                  $d[$i] = array(
                     'x' => $i,
                     'y' => 0.0
                  );
               }
               
               if(is_array($m) && count($m) > 0){
                  foreach ($m as $kmonth => $vmonth) {
                     $d[$vmonth['MonthIDate']]['y'] =  (float) $vmonth['SumTTC'];
                  }

                  $years[$year['YearIDate']] = $d;
               }
            }
         }else{
            for ($i=1; $i <= 12; $i++) { 
               $years['0'][] = array(
                  'x' => $i,
                  'y' => 0
               );
            }
         }


         $send['Cells']['Invoices']['Charts'] = $years;

         //3

         $inv = array();

         $inv = $this->select('ID')
            ->from(Model::SALE)
            ->where('ISD', '0', '=')
            ->where('Client', $in['Client'], '=', 'AND')
            ->get('ID')->some;

         $y = $this->select('YEAR(PDate)')
            ->from(Model::SALE_PAYMENT)
            ->where('ISD', '0', '=')
            ->where('State', '4', '<>', 'AND') //Bloked
            ->where('State', '6', '<>', 'AND') //Canceled
            ->where('Invoice', $inv, 'IN', 'AND')
            ->groupby('YEAR(PDate)')
            ->orderby('PDate')
            ->get('YearPDate')->all;

         $years = array();
            
         if(is_array($y) && count($y) > 0){
            foreach ($y as $year) {
               $m = $this->select('MONTH(PDate), SUM(PAmount)')
                  ->from(Model::PAYMENT)
                  ->where('ISD', '0', '=')
                  ->where('State', '4', '<>', 'AND') //Bloked
                  ->where('State', '6', '<>', 'AND') //Canceled
                  ->where('Invoice', $inv, 'IN', 'AND')
                  ->where('YEAR(PDate)', $year['YearPDate'], '=', 'AND')
                  ->groupby('YEAR(PDate), MONTH(PDate)')
                  ->get()->all;

               $d = array();
               for ($i=1; $i <= 12; $i++) { 
                  $d[$i] = array(
                     'x' => $i,
                     'y' => 0.0
                  );
               }
               
               if(is_array($m) && count($m) > 0){
                  foreach ($m as $kmonth => $vmonth) {
                     $d[$vmonth['MonthPDate']]['y'] = (float) $vmonth['SumPAmount'];
                  }

                  $years[$year['YearPDate']] = $d;
               }
            }
         }else{
            for ($i=1; $i <= 12; $i++) { 
               $years['0'][] = array(
                  'x' => $i,
                  'y' => 0
               );
            }
         }

         $send['Cells']['Payements']['Charts'] = $years;
         
         $send['LClients'] = $this->select('*')
            ->from(Model::CUSTOMER)
            ->where('ISD', '0', '=')
            ->get()->all;

         $send['LYears'] = $y;
         $send['LMonths'] = array(
            '1' => 'يناير',
            '2' => 'فبراير',
            '3' => 'مارس',
            '4' => 'ابريل',
            '5' => 'ماي',
            '6' => 'يونيو',
            '7' => 'يوليو',
            '8' => 'غشت',
            '9' => 'شتنبر',
            '10' => 'اكتوبر',
            '11' => 'نونبر',
            '12' => 'دجنبر'
         );

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
