<?php
   class SettingController extends Controller{

      private $SettingModel;
      private $SettingLang;
      private $SettingView;

      public function __construct(){
         parent::__construct();
         $this->SettingModel = new SettingModel();
         $this->SettingLang = SettingLang::Translate();
         $this->SettingView = new SettingView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->SettingLang;
         $send = array_merge($send, $this->SettingModel->index(null));
         if(L($send, 'LSettings')){
            foreach($send['LSettings'] as $KSetting => $VSetting){
               $send['LSettings'][$KSetting] = $VSetting;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		   //$send = array_merge($send, $this->Lengths());
         $this->SettingView->index($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->SettingLang;
         $SettingCore = new SettingCore();
         
         if(clicked($in, 'btn_edit')){ 
            $SettingCore->LoadForm($in);
            $send['Errors'] = $SettingCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $SettingCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->SettingModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  $SettingCore->Savefiles();
               }
            }
         }

         $send = array_merge($send, $this->SettingModel->edit(null));

         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
				   $Cells = $send['Cells'];

               if($Cells['Logo'] !== null and $Cells['Logo'] !== '' and file_exists(HPICTURES.$Cells['Logo'])){
                  $Cells['Logo'] = WPICTURES.$Cells['Logo'];
               }else{
                  $Cells['Logo'] = IMG_DEFAULT;
               }

               $send['Cells'] = $Cells;
            }
            $this->SettingView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

   }
