<?php
   class EmployeeModel extends Model{
      const ITEM = ',employees,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $this->select('*')
            ->from(Model::EMPLOYEE)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('NCID', $in['NCID'], 'LIKE', 'AND')
            ->where('Firstname', $in['Firstname'], 'LIKE', 'AND')
            ->where('Lastname', $in['Lastname'], 'LIKE', 'AND')
            ->where('Username', $in['Username'], 'LIKE', 'AND')
            ->where('Gender', $in['Genders'], 'IN', 'AND')
            ->where('Country', $in['Countrys'], 'IN', 'AND')
            ->where('State', $in['States'], 'IN', 'AND')
            ->where('Job', $in['Jobs'], 'IN', 'AND')
            //->where('Job', 1, '<>', 'AND')
            ->between('CAT', $in['From'], $in['To'], 'AND')
            ->between('SWork', $in['SWorkFrom'], $in['SWorkTo'], 'AND')
            ->between('EWork', $in['EWorkFrom'], $in['EWorkTo'], 'AND')
            ->limit($in['Page'], $in['Length'])
            ->orderby('ID', false);

         if($_SESSION[SESSION_NAME]['ID'] != 1){
            $this->where('ID', '1', '<>', 'AND');
         }

         $send['LEmployees'] = $this->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LEmployees']) and count($send['LEmployees']) > 0){

            foreach($send['LEmployees'] as $KEmployee => $VEmployee){

               $VEmployee['Gender'] = $this->select('*')
                  ->from(Model::GENDER)
                  ->where('ID', $VEmployee['Gender'])
                  ->get()->first;

               $VEmployee['Job'] = $this->select('*')
                  ->from(Model::JOB)
                  ->where('ID', $VEmployee['Job'])
                  ->get()->first;

               $VEmployee['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VEmployee['State'])
                  ->get()->first;

               $send['LEmployees'][$KEmployee] = $VEmployee;
            }
         }

         $send['LGenders'] = $this->select('*')
            ->from(Model::GENDER)
            ->where('ISD', '0', '=')
            ->where('ID', array(1, 2), 'IN', 'AND')
            ->get()->all;

         $this->select('*')
            ->from(Model::JOB)
            ->where('ISD', '0', '=');

         if($_SESSION[SESSION_NAME]['ID'] != 1){
            $this->where('ID', '1', '<>', 'AND');
         }
         $send['LJobs'] = $this->get()->all;

         $send['LStates'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ISD', '0', '=')
            ->where('Items', self::ITEM, 'LIKE', 'AND')
            ->get()->all;

         return $send;
      }

      public function print($in){
         $send = array();

         switch($in['ID']) {
            case 1:
               $send['LEmployees'] = $this->select('*')
                  ->from(Model::EMPLOYEE)
                  ->where('ISD', '0', '=')
                  ->orderby('ID', true)
                  ->get()->all;

               if(is_array($send['LEmployees']) and count($send['LEmployees']) > 0){
                  foreach($send['LEmployees'] as $KEmployee => $VEmployee){
      
                     $VEmployee['Gender'] = $this->select('*')
                        ->from(Model::GENDER)
                        ->where('ID', $VEmployee['Gender'])
                        ->get()->first;
      
                     $VEmployee['Job'] = $this->select('*')
                        ->from(Model::JOB)
                        ->where('ID', $VEmployee['Job'])
                        ->get()->first;
      
                     $VEmployee['State'] = $this->select('*')
                        ->from(Model::STATE)
                        ->where('ID', $VEmployee['State'])
                        ->get()->first;
      
                     $send['LEmployees'][$KEmployee] = $VEmployee;
                  }
               }
               break;
            case 2:
               $send['Employee'] = $this->select('*')
                  ->from(Model::EMPLOYEE)
                  ->where('ISD', '0', '=')
                  ->where('ID', $in['Employees'], 'IN', 'AND')
                  ->between('AT', $in['From'], $in['To'], 'AND')
                  ->orderby('ID', true)
                  ->get()->first;

               if(is_array($send['Employee']) and count($send['Employee']) > 0){
                  $send['Employee']['Gender'] = $this->select('*')
                     ->from(Model::GENDER)
                     ->where('ID', $send['Employee']['Gender'])
                     ->get()->first;

                  $send['Employee']['Job'] = $this->select('*')
                     ->from(Model::JOB)
                     ->where('ID', $send['Employee']['Job'])
                     ->get()->first;

                  $send['Employee']['State'] = $this->select('*')
                     ->from(Model::STATE)
                     ->where('ID', $send['Employee']['State'])
                     ->get()->first;
               }
               break;
            case 3:
               $send['Employee'] = '';
               if(is_array($in['Employees']) and count($in['Employees']) > 0){
                  $send['Employee'] = $in['Employees'][0];
               }

               $send['Employee'] = $this->select('*')
                  ->from(Model::EMPLOYEE)
                  ->where('ISD', '0', '=')
                  ->where('ID', $send['Employee'], '=', 'AND')
                  ->between('AT', $in['From'], $in['To'], 'AND')
                  ->orderby('ID', true)
                  ->get()->first;

               $send['LExpenses'] = $this->select('*')
                  ->from(Model::EXPENSE)
                  ->where('ISD', '0', '=')
                  //->where('Employee', $send['Employee']['ID'], '=', 'AND')
                  //->where('Employee', '0', '<>', 'AND')
                  ->orderby('ID', true)
                  ->get()->all;

               if(is_array($send['Employee']) and count($send['Employee']) > 0){
                  $send['Employee']['Gender'] = $this->select('*')
                     ->from(Model::GENDER)
                     ->where('ID', $send['Employee']['Gender'])
                     ->get()->first;
   
                  $send['Employee']['Job'] = $this->select('*')
                     ->from(Model::JOB)
                     ->where('ID', $send['Employee']['Job'])
                     ->get()->first;

                  $send['Employee']['State'] = $this->select('*')
                     ->from(Model::STATE)
                     ->where('ID', $send['Employee']['State'])
                     ->get()->first;
               }
               break;
            case 4:
               $send['LEmployees'] = $this->select('*')
                  ->from(Model::EMPLOYEE)
                  ->where('ISD', '0', '=')
                  ->orderby('ID', true)
                  ->get()->all;

               $send['Salaries'] = 0.0;

               if(is_array($send['LEmployees']) and count($send['LEmployees']) > 0){
                  foreach($send['LEmployees'] as $KEmployee => $VEmployee){
      
                     $VEmployee['Gender'] = $this->select('*')
                        ->from(Model::GENDER)
                        ->where('ID', $VEmployee['Gender'])
                        ->get()->first;
      
                     $VEmployee['Job'] = $this->select('*')
                        ->from(Model::JOB)
                        ->where('ID', $VEmployee['Job'])
                        ->get()->first;
      
                     $VEmployee['State'] = $this->select('*')
                        ->from(Model::STATE)
                        ->where('ID', $VEmployee['State'])
                        ->get()->first;

                     $send['Salaries'] += doubleval($VEmployee['Salary']);
      
                     $send['LEmployees'][$KEmployee] = $VEmployee;
                  }
               }
               break;
         }

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::EMPLOYEE)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if(L($send,'Cells')){

            $send['Cells']['Gender'] = $this->select('*')
               ->from(Model::GENDER)
               ->where('ID', $send['Cells']['Gender'])
               ->get()->first;

            $send['Cells']['Job'] = $this->select('*')
               ->from(Model::JOB)
               ->where('ID', $send['Cells']['Job'])
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

         $send['LGenders'] = $this->select('*')
            ->from(Model::GENDER)
            ->where('ISD', '0', '=')
            ->where('ID', array(1, 2), 'IN', 'AND')
            ->get()->all;

         $send['LJobs'] = $this->select('*')
            ->from(Model::JOB)
            ->where('ISD', '0', '=')
            ->where('ID', '1', '<>', 'AND')
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
		 
		   $Gender = $this->select('*')
            ->from(Model::GENDER)
            ->where('ID', $in['Gender'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($Gender === null){
            $send['Errors'][] = 'Gender';
         }

         $Job = $this->select('*')
            ->from(Model::JOB)
            ->where('ID', $in['Job'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->where('ID', '1', '<>', 'AND')
            ->get()->first;

         if($Job === null){
            $send['Errors'][] = 'Job';
         }

         $State = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', $in['State'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($State === null){
            $send['Errors'][] = 'State';
         }
         if($in['Code'] !== ''){
            $employee = $this->select('*')
               ->from(Model::EMPLOYEE)
               ->where('Code', $in['Code'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;

            if($employee !== null){
               $send['Errors'][] = 'Employee';
            }
         }

         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::EMPLOYEE)->set($in)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::EMPLOYEE)
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

			   $send['LGenders'] = $this->select('*')
               ->from(Model::GENDER)
               ->where('ISD', '0', '=')
               ->where('ID', array(1, 2), 'IN', 'AND')
               ->get()->all;

            $send['LJobs'] = $this->select('*')
               ->from(Model::JOB)
               ->where('ISD', '0', '=')
               ->where('ID', '1', '<>', 'AND')
               ->where('ID', $Cells['Job']['ID'], '<>', 'AND')
               ->get()->all;

            $send['LJobs'][] = $this->select('*')
               ->from(Model::JOB)
               ->where('ISD', '0', '=')
               //->where('ID', '1', '<>', 'AND')
               ->where('ID', $Cells['Job']['ID'], '=', 'AND')
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

         }
         return $send;
      }

      public function update($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::EMPLOYEE)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if($in['Gender'] != $row['Gender']){
            $Gender = $this->select('*')
               ->from(Model::GENDER)
               ->where('ID', $in['Gender'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;

            if($Gender === null){
               $send['Errors'][] = 'Gender';
            }
         }
		 
		 if($in['Job'] != $row['Job']){
            $Job = $this->select('*')
               ->from(Model::JOB)
               ->where('ID', $in['Job'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->where('ID', '1', '<>', 'AND')
               ->get()->first;

            if($Job === null){
               $send['Errors'][] = 'Job';
            }
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
            $send['Success'][] = $this->into(Model::EMPLOYEE)->apt($in)->save();
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
            ->from(Model::EMPLOYEE)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::EMPLOYEE)->del($in)->save();
         }

         return $send;
      }

      public function dashboard($in){
         $send = array();

         $Employees = array();

         $Employees['Count'] = $this->select('*')
            ->from(Model::EMPLOYEE)
            ->where('ISD', '0', '=')
            ->get()->count;

         $Employees['Enable']['Cells'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', '2', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;
         $Employees['Enable']['Count'] = $this->select('*')
            ->from(Model::EMPLOYEE)
            ->where('State', '2', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->count;
         $Employees['Enable']['Percent'] = percent($Employees['Count'], $Employees['Enable']['Count']);

         $Employees['Disable']['Cells'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', '3', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;
         $Employees['Disable']['Count'] = $this->select('*')
            ->from(Model::EMPLOYEE)
            ->where('State', '3', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->count;
         $Employees['Disable']['Percent'] = percent($Employees['Count'], $Employees['Disable']['Count']);

         $Employees['Bloked']['Cells'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', '4', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;
         $Employees['Bloked']['Count'] = $this->select('*')
            ->from(Model::EMPLOYEE)
            ->where('State', '4', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->count;
         $Employees['Bloked']['Percent'] = percent($Employees['Count'], $Employees['Bloked']['Count']);

         $Employees['Canceled']['Cells'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', '6', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;
         $Employees['Canceled']['Count'] = $this->select('*')
            ->from(Model::EMPLOYEE)
            ->where('State', '6', '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->count;
         $Employees['Canceled']['Percent'] = percent($Employees['Count'], $Employees['Canceled']['Count']);

         $send['Employees'] = $Employees;

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
