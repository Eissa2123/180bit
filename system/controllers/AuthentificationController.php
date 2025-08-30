<?php
   class AuthentificationController extends Controller{

      private $LayerController;
      private $AuthentificationModel;
      private $AuthentificationLang;
      private $AuthentificationView;

      public function __construct(){
         parent::__construct();
         $this->LayerController = new LayerController();
         $this->AuthentificationModel = new AuthentificationModel();
         $this->AuthentificationLang = AuthentificationLang::Translate();
         $this->AuthentificationView = new AuthentificationView();
      }

      public function login($in){
			$send = array();
         $send['LTranslates'] = $this->AuthentificationLang;
         $AuthentificationCore = new AuthentificationCore();

         $send = array_merge($send, $this->LayerController->headerlogin($in));
         $send = array_merge($send, $this->LayerController->footerlogin($in));
         
         if(clicked($in, 'btn_login')){ 
				$AuthentificationCore->LoadForm($in);
				$send['Errors'] = $AuthentificationCore->Check(CORE::FDISPLAY);
				$send['LPosts'] = $AuthentificationCore->Preper(Core::FDISPLAY);
				if(count($send['Errors']) === 0){
					$send = array_merge($send, $this->AuthentificationModel->login($send['LPosts']));
               if(isset($send['Cells']) and is_array($send) and $send['Cells'] != null ){
                  $_SESSION[SESSION_NAME] = $send['Cells'];
                  $_SESSION[SESSION_NAME]['SESSION_START'] = time();
                  $_SESSION[SESSION_NAME]['SESSION_NOW'] = time();
                  redirection(HOME_PAGE);
               }
				}
			}else{
				$send['LPosts'] = array();
			}

         $this->AuthentificationView->login($send);
      }

      public function api($in){
			$send = array();

         $AuthentificationCore = new AuthentificationCore();
         $AuthentificationCore->LoadForm($in);

         $send['Errors'] = $AuthentificationCore->Check(CORE::FAPI);
         $send['LPosts'] = $AuthentificationCore->Preper(Core::FAPI);

         D($send);
         
         if(count($send['Errors']) === 0){
            $send = array_merge($send, $this->AuthentificationModel->api($send['LPosts']));
            if(isset($send['Cells']) and is_array($send) and $send['Cells'] != null ){
               D($send['Cells']);
               return true;
            }
         }
         return false;
      }

      public function profile($in){
			$send = array();
         $send['LTranslates'] = $this->AuthentificationLang;
         $send = array_merge($send, $this->AuthentificationModel->profile($_SESSION[SESSION_NAME]));
		   if(L($send,'Cells')) {
            $Cells = $send['Cells'];
            if($Cells['Picture'] !== null and $Cells['Picture'] !== '' and file_exists(HPICTURES.$Cells['Picture'])){
               $Cells['Picture'] = WPICTURES.$Cells['Picture'];
            }else{
               $Cells['Picture'] = IMG_DEFAULT;
            }
            $send['Cells'] = $Cells;
            $this->AuthentificationView->profile($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function edit($in){
			$send = array();
         $send['LTranslates'] = $this->AuthentificationLang;
         $send = array_merge($send, $this->AuthentificationModel->profile($_SESSION[SESSION_NAME]));
         if(L($send, 'Cells')){
            if(clicked($in, 'btn_edit')){ 
               $AuthentificationCore = new AuthentificationCore();
               $AuthentificationCore->LoadForm($in);
               $AuthentificationCore->Password(V($send, 'Cells', 'Password'));
               $send['Errors'] = $AuthentificationCore->Check(CORE::FEDIT);
               if(count($send['Errors']) === 0){
                  $send['LPosts'] = $AuthentificationCore->Preper(Core::FEDIT);
                  $send = array_merge($send, $this->AuthentificationModel->update($send['LPosts']));
                  if(isset($send['Success']) and $send['Success']){
                  }
               }
            }
            $this->AuthentificationView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public static function check($action, $item){
         $send = array();

         switch(strtoupper($action)){
            case 'B': $action = 'Browse';break;
            case 'S': $action = 'Search';break;
            case 'D': $action = 'Display';break;
            case 'A': $action = 'Add';break;
            case 'E': $action = 'Edit';break;
            case 'R': $action = 'Remove';break;
         }

         if(isset($_SESSION[SESSION_NAME])){
            $send['ID'] = $_SESSION[SESSION_NAME]['ID'];
            $send['JID'] = $_SESSION[SESSION_NAME]['Job']['ID'];
            $send['JState'] = $_SESSION[SESSION_NAME]['Job']['State'];
            $send['Item'] = $item;
            $send['Action'] = $action;

            return (new AuthentificationController())->AuthentificationModel->check($send);
         }
         return false;
      }

      public function logout($in){
			$send = array();
         $_SESSION[SESSION_NAME] = array();
         session_destroy(); 
         redirection(LOGIN_PAGE);
      }

   }
   