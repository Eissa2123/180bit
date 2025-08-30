<?php

   class EmployeeController extends Controller{

      private $LayerController;

      private $EmployeeModel;
      private $EmployeeLang;
      private $EmployeeView;

      const Name = 'Employees';

      private $Privilages = array();

      public function __construct(){
         parent::__construct();
         
         $this->LayerController = new LayerController();

         $this->EmployeeModel = new EmployeeModel();
         $this->EmployeeLang = EmployeeLang::Translate();
         $this->EmployeeView = new EmployeeView();
      }

      public function index($in){
         $send = array();
         $send = array_merge($send, $this->Privilages);
         $send['LTranslates'] = $this->EmployeeLang;
         $EmployeeCore = new EmployeeCore();
         $EmployeeCore->LoadForm($in);
         $send['LPosts'] = $EmployeeCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->EmployeeModel->index($send['LPosts']));
         if(L($send, 'LEmployees')){
            foreach($send['LEmployees'] as $KEmployee => $VEmployee){
               $VEmployee['Picture'] = WUPLOADS.$VEmployee['Picture'];
               $send['LEmployees'][$KEmployee] = $VEmployee;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		   $send = array_merge($send, $this->Lengths());
         $this->EmployeeView->index($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->EmployeeLang;
         $EmployeeCore = new EmployeeCore();
         $EmployeeCore->LoadParams($in);
         $send['Errors'] = $EmployeeCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $EmployeeCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->EmployeeModel->display($send['LPosts']));
         }
         if(L($send,'Cells')) {
            $Cells = $send['Cells'];
			
            if($Cells['Picture'] !== '' and $Cells['Picture'] !== null and file_exists(HPICTURES.$Cells['Picture'])){
               $Cells['Picture'] = WPICTURES.$Cells['Picture'];
            }else{
               $Cells['Picture'] = IMG_DEFAULT;
            }
            $send['Cells'] = $Cells;
            $this->EmployeeView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->EmployeeLang;
         $EmployeeCore = new EmployeeCore();
         if(clicked($in, 'btn_add')){ 
            $EmployeeCore->LoadForm($in);
            $send['Errors'] = $EmployeeCore->Check(CORE::FADD);
            $send['LPosts'] = $EmployeeCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
				   unset($send['Errors']);
               $send = array_merge($send, $this->EmployeeModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $EmployeeCore->Savefiles();
                  $send['LPosts'] = array();
               }
            }
         }else{
            $send['LPosts'] = array();
         }
         $send = array_merge($send, $this->EmployeeModel->add($in));
         $this->EmployeeView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->EmployeeLang;
         $EmployeeCore = new EmployeeCore();
         $EmployeeCore->LoadParams($in);
         $send['LPosts'] = $EmployeeCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $EmployeeCore->LoadForm($in);
            $send['Errors'] = $EmployeeCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $EmployeeCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->EmployeeModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
					   $EmployeeCore->Savefiles();
               }
            }
         }
         $send = array_merge($send, $this->EmployeeModel->edit($EmployeeCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
            $Cells = $send['Cells'];
			
            if($Cells['Picture'] !== '' and $Cells['Picture'] !== null and file_exists(HPICTURES.$Cells['Picture'])){
               $Cells['Picture'] = WPICTURES.$Cells['Picture'];
            }else{
               $Cells['Picture'] = IMG_DEFAULT;
            }
            $send['Cells'] = $Cells;
            $this->EmployeeView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->EmployeeLang;
         $EmployeeCore = new EmployeeCore();
         if(clicked($in, 'btn_remove')){ 
            $EmployeeCore->LoadForm($in);
            $send['Errors'] = $EmployeeCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $EmployeeCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->EmployeeModel->delete($send['LPosts']));
            }
         }
         $EmployeeCore->LoadParams($in);
         $send['Errors'] = $EmployeeCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $EmployeeCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->EmployeeModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
				$Cells = $send['Cells'];
				if($Cells['Picture'] !== '' and file_exists(HPICTURES.$Cells['Picture'])){
					$Cells['Picture'] = WPICTURES.$Cells['Picture'];
				}else{
					$Cells['Picture'] = IMG_DEFAULT;
				}
				$send['Cells'] = $Cells;
			}
            $this->EmployeeView->remove($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->EmployeeLang;
         $EmployeeCore = new EmployeeCore();
         $EmployeeCore->LoadParams($in);
         $send['LPosts'] = $EmployeeCore->Preper(Core::FDISPLAY);

         $send = array_merge($send, $this->EmployeeModel->edit($EmployeeCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
            $Cells = $send['Cells'];
			
            if($Cells['Picture'] !== '' and $Cells['Picture'] !== null and file_exists(HPICTURES.$Cells['Picture'])){
               $Cells['Gender'] = $Cells['Gender']['Name'.LNG];
               $Cells['Picture'] = WPICTURES.$Cells['Picture'];
            }else{
               $Cells['Picture'] = IMG_DEFAULT;
            }
            $send['Cells'] = $Cells;
         }
         $this->EmployeeView->print($send);
      }

      public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->EmployeeLang;
         $EmployeeCore = new EmployeeCore();
         $EmployeeCore->LoadForm($in);
         $EmployeeCore->LoadParams($in);
         $send['LPosts'] = $EmployeeCore->Preper(Core::FPRINT);

         $send = array_merge(
            $send, 
            $this->EmployeeModel->print($send['LPosts'])
         );

         switch($send['LPosts']['ID']) {
            case 1:
               if(L($send, 'LEmployees')){
                  foreach($send['LEmployees'] as $KEmployee => $VEmployee){
                     if($VEmployee['Picture'] !== '' and $VEmployee['Picture'] !== null and file_exists(HPICTURES.$VEmployee['Picture'])){
                        $VEmployee['Gender'] = $VEmployee['Gender']['Name'.LNG];
                        $VEmployee['Picture'] = WPICTURES.$VEmployee['Picture'];
                     }else{
                        $VEmployee['Picture'] = IMG_DEFAULT;
                     }
                     $send['LEmployees'][$KEmployee] = $VEmployee;
                  }
               }
               break;
            case 2:
               if(L($send, 'Employee')){
                  $Employee = $send['Employee'];
                  if($Employee['Picture'] !== '' and $Employee['Picture'] !== null and file_exists(HPICTURES.$Employee['Picture'])){
                     $Employee['Gender'] = $Employee['Gender']['Name'.LNG];
                     $Employee['Picture'] = WPICTURES.$Employee['Picture'];
                  }else{
                     $Employee['Picture'] = IMG_DEFAULT;
                  }
                  $send['Employee'] = $Employee;
               }
               break;
            case 3:
               if(L($send, 'LExpenses')){

               }
               break;
            case 4:
               if(L($send, 'LEmployees')){
                  foreach($send['LEmployees'] as $KEmployee => $VEmployee){
                     if($VEmployee['Picture'] !== '' and $VEmployee['Picture'] !== null and file_exists(HPICTURES.$VEmployee['Picture'])){
                        $VEmployee['Gender'] = $VEmployee['Gender']['Name'.LNG];
                        $VEmployee['Picture'] = WPICTURES.$VEmployee['Picture'];
                     }else{
                        $VEmployee['Picture'] = IMG_DEFAULT;
                     }
                     $send['LEmployees'][$KEmployee] = $VEmployee;
                  }
               }
               break;
         }

         $this->EmployeeView->prints($send);
      }

      public function dashboard($in){
         $send = array();

         $send['LTranslates'] = $this->EmployeeLang;
         $send = array_merge($send, $this->EmployeeModel->dashboard(null));

         $this->LayerController->headerdashboard($in);
         $this->EmployeeView->dashboard($send);
         $this->LayerController->footerdashboard($in);
      }

      public function setting($in){
         $send = array();
         $send['LTranslates'] = $this->EmployeeLang;
         $EmployeeCore = new EmployeeCore();
         
         /*if(clicked($in, 'btn_setting')){ 
            $EmployeeCore->LoadForm($in);
            $send['Errors'] = $EmployeeCore->Check(CORE::FSETTING);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $EmployeeCore->Preper(Core::FSETTING);
               $send = array_merge($send, $this->EmployeeModel->saving($send['LPosts']));
            }
         }*/

         /*$send = array_merge($send, $this->EmployeeModel->setting(null));
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
				   $Cells = $send['Cells'];
               
               // .. 

               $send['Cells'] = $Cells;
            }
            $this->EmployeeView->setting($send);
         }else{
            $this->ErrorController->e404($send);
         }*/
         $this->EmployeeView->setting($send);
      }

   }
