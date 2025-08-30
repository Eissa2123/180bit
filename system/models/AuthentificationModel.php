<?php
   class AuthentificationModel extends Model{
      
      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         return $send;
      }

      public function login($in){
         $send = array();
         $send['Cells'] = $this->select('*')
            ->from(Model::EMPLOYEE)
            ->where('Username', $in['Username'], '=')
            ->where('Password', $in['Password'], '=', 'AND')
            ->where('State', '1', '<>', 'AND')
            ->get()->first;

            if(L($send, 'Cells')){
               $Cells = $send['Cells'];

               $send['Cells'] = array();

               $send['Cells']['ID'] = $Cells['ID'];
               $send['Cells']['Code'] = $Cells['Code'];
               $send['Cells']['NCID'] = $Cells['NCID'];
               $send['Cells']['Firstname'] = $Cells['Firstname'];
               $send['Cells']['Lastname'] = $Cells['Lastname'];
               $send['Cells']['Username'] = $Cells['Username'];
               //$send['Cells']['Password'] = $Cells['Password'];
               $send['Cells']['Gender'] = $this->select('*')
                  ->from(Model::GENDER)
                  ->where('ID', $Cells['Gender'])
                  ->get()->first;
               $send['Cells']['Picture'] = $Cells['Picture'];
               /*$send['Cells']['Country'] = $this->select('*')
                  ->from(Model::COUNTRY)
                  ->where('ID', $Cells['Country'])
                  ->get()->first;*/
               $send['Cells']['City'] = $Cells['City'];
               $send['Cells']['Address'] = $Cells['Address'];
               $send['Cells']['Email'] = $Cells['Email'];
               $send['Cells']['Phonenumber'] = $Cells['Phonenumber'];
               $send['Cells']['Job'] = $this->select('*')
                  ->from(Model::JOB)
                  ->where('ID', $Cells['Job'])
                  ->get()->first;
               $send['Cells']['SWork'] = $Cells['SWork'];
               $send['Cells']['EWork'] = $Cells['EWork'];
               $send['Cells']['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $Cells['State'])
                  ->get()->first;
               //$send['Cells']['Member'] = $this->select('*')
                  //->from(Model::EMPLOYEE)
                  //->where('ID', $Cells['Member'])
                  //->get()->first;
               //$send['Cells']['ISD'] = $Cells['ISD'];
               //$send['Cells']['CAT'] = $Cells['CAT'];
               //$send['Cells']['UAT'] = $Cells['UAT'];
               //$send['Cells']['DAT'] = $Cells['DAT'];
            }

         return $send;
      }

      public function api($in){
         $send = array();
         $send['Cells'] = $this->select('*')
            ->from(Model::EMPLOYEE)
            ->where('Token', $in['Token'], '=')
            ->where('State', '1', '<>', 'AND')
            ->get()->first;

            $this->DBG();

            if(L($send, 'Cells')){
               $Cells = $send['Cells'];

               $send['Cells'] = array();

               $send['Cells']['ID'] = $Cells['ID'];
               $send['Cells']['Code'] = $Cells['Code'];
               $send['Cells']['NCID'] = $Cells['NCID'];
               $send['Cells']['Firstname'] = $Cells['Firstname'];
               $send['Cells']['Lastname'] = $Cells['Lastname'];
               $send['Cells']['Username'] = $Cells['Username'];
               //$send['Cells']['Password'] = $Cells['Password'];
               $send['Cells']['Gender'] = $this->select('*')
                  ->from(Model::GENDER)
                  ->where('ID', $Cells['Gender'])
                  ->get()->first;
               $send['Cells']['Picture'] = $Cells['Picture'];
               /*$send['Cells']['Country'] = $this->select('*')
                  ->from(Model::COUNTRY)
                  ->where('ID', $Cells['Country'])
                  ->get()->first;*/
               $send['Cells']['City'] = $Cells['City'];
               $send['Cells']['Address'] = $Cells['Address'];
               $send['Cells']['Email'] = $Cells['Email'];
               $send['Cells']['Phonenumber'] = $Cells['Phonenumber'];
               $send['Cells']['Job'] = $this->select('*')
                  ->from(Model::JOB)
                  ->where('ID', $Cells['Job'])
                  ->get()->first;
               $send['Cells']['SWork'] = $Cells['SWork'];
               $send['Cells']['EWork'] = $Cells['EWork'];
               $send['Cells']['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $Cells['State'])
                  ->get()->first;
               //$send['Cells']['Member'] = $this->select('*')
                  //->from(Model::EMPLOYEE)
                  //->where('ID', $Cells['Member'])
                  //->get()->first;
               //$send['Cells']['ISD'] = $Cells['ISD'];
               //$send['Cells']['CAT'] = $Cells['CAT'];
               //$send['Cells']['UAT'] = $Cells['UAT'];
               //$send['Cells']['DAT'] = $Cells['DAT'];
            }

         return $send;
      }

      public function profile($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::EMPLOYEE)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->where('State', '2', '=', 'AND')
            ->get()->first;
         if(L($send, 'Cells')){
            $Cells = $send['Cells'];
            
            $Cells['Job'] = $this->select('*')
               ->from(Model::JOB)
               ->where('ID', $Cells['Job'])
               ->get()->first;

            $Cells['Gender'] = $this->select('*')
               ->from(Model::GENDER)
               ->where('ID', $Cells['Gender'])
               ->get()->first;

            $Cells['Country'] = $this->select('*')
               ->from(Model::COUNTRY)
               ->where('ID', $Cells['Country'])
               ->get()->first;
               
               $Cells['State'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ID', $Cells['State'])
               ->get()->first;

            $send['Cells'] = $Cells;
         }

         return $send;
      }

      public function edit($in){
         $send = array();

         return $send;
      }

      public function update($in){
         $send = array();

         $send['Success'][] = $this->into(Model::EMPLOYEE)->apt($in)->save();

         return $send;
      }

      public function check($in){
         $send = array();

         $send['Employee'] = $this->select('ID, Job, State')
            ->from(Model::EMPLOYEE)
            ->where('ID', $in['ID'], '=')
            ->where('State', '2', '=', 'AND')
			   ->where('ISD', '0', '=', 'AND')
            ->get()->count > 0;

         $send['Job'] = $this->select('*')
            ->from(Model::JOB)
            ->where('ID', $in['JID'], '=')
            ->where('State', '2', '=', 'AND')
            ->where('ISD', '0', '=', 'AND')
            ->get()->count > 0; 

         $send['Item'] = $this->select('*')
            ->from(Model::ITEM)
            ->where('Code', $in['Item'], '=')
            ->where('State', '2', '=', 'AND')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first; 

         if($send['Employee'] and $send['Job'] and V($send, 'Item', 'ID') !== '' and $in['Action'] !== ''){
            
            $send['Item'] = $send['Item']['ID'];

            $send['Privalage'] = $this->select('*')
               ->from(Model::PRIVILEGE)
               ->where('Job', $in['JID'], '=')
               ->where('Item', $send['Item'], '=', 'AND')
               ->get()->first; 

            if(L($send, 'Privalage')){
               $x = V($send, 'Privalage', $in['Action']);

               if(!is_array($x) and in_array($x, array(ALL, SOME, NONE))){
                  $send['Action'] = $x;
                  return $x;
               }
            }
         }
         
         return NONE;
      }

   }
