<?php
   class ProviderController extends Controller{

      private $LayerController;

      private $ProviderModel;
      private $ProviderLang;
      private $LayerLang;
      private $ProviderView;

      public function __construct(){
         parent::__construct();
         
         $this->LayerController = new LayerController();

         $this->ProviderModel = new ProviderModel();
         $this->ProviderLang = ProviderLang::Translate();
         $this->LayerLang = LayerLang::Translate();
         $this->ProviderView = new ProviderView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->ProviderLang;
         $ProviderCore = new ProviderCore();
         $ProviderCore->LoadForm($in);
         $send['LPosts'] = $ProviderCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->ProviderModel->index($send['LPosts']));
         if(L($send, 'LProviders')){
            foreach($send['LProviders'] as $KProvider => $VProvider){
               $VProvider['Picture'] = WUPLOADS.$VProvider['Picture'];
               $send['LProviders'][$KProvider] = $VProvider;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		   $send = array_merge($send, $this->Lengths());
         $this->ProviderView->index($send);
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->ProviderLang;
         $ProviderCore = new ProviderCore();
         $ProviderCore->LoadParams($in);
         $send['LPosts'] = $ProviderCore->Preper(Core::FDISPLAY);
        
         $send = array_merge($send, $this->ProviderModel->edit($ProviderCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           if($Cells['Picture'] !== '' and $Cells['Picture'] !== null and file_exists(HPICTURES.$Cells['Picture'])){
              $Cells['Type'] = $Cells['Type']['Name'.LNG];
              $Cells['Picture'] = WPICTURES.$Cells['Picture'];
           }else{
              $Cells['Picture'] = IMG_DEFAULT;
           }
           $send['Cells'] = $Cells;
         }
         $this->ProviderView->print($send);
        }
        
        public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->ProviderLang;
         $ProviderCore = new ProviderCore();
         $ProviderCore->LoadForm($in);
         $send = array_merge(
           $send, 
           $this->ProviderModel->print($ProviderCore->Preper(Core::FINDEX))
         );
         
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
         $this->ProviderView->prints($send);
        }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->ProviderLang;
         $ProviderCore = new ProviderCore();
         $ProviderCore->LoadParams($in);
         $send['Errors'] = $ProviderCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $ProviderCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->ProviderModel->display($send['LPosts']));
         }
		   if(L($send,'Cells')) {
            $Cells = $send['Cells'];
            if($Cells['Picture'] !== null and $Cells['Picture'] !== '' and file_exists(HPICTURES.$Cells['Picture'])){
               $Cells['Picture'] = WPICTURES.$Cells['Picture'];
            }else{
               $Cells['Picture'] = IMG_DEFAULT;
            }
            $send['Cells'] = $Cells;
            $this->ProviderView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->ProviderLang;
         $ProviderCore = new ProviderCore();
         if(clicked($in, 'btn_add')){ 
            $ProviderCore->LoadForm($in);
            $send['Errors'] = $ProviderCore->Check(CORE::FADD);
            $send['LPosts'] = $ProviderCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->ProviderModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $ProviderCore->Savefiles();
                  $send['LPosts'] = array();
               }
            }
         }else{
            $send['LPosts'] = array();
         }
         $send = array_merge($send, $this->ProviderModel->add($in));
         $this->ProviderView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->ProviderLang;
         $ProviderCore = new ProviderCore();
         $ProviderCore->LoadParams($in);
         $send['LPosts'] = $ProviderCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $ProviderCore->LoadForm($in);
            $send['Errors'] = $ProviderCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $ProviderCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->ProviderModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  $ProviderCore->Savefiles();
               }
            }
         }
         $send = array_merge($send, $this->ProviderModel->edit($ProviderCore->Preper(Core::FDISPLAY)));
         if(L($send, 'Cells')){
            $Cells = $send['Cells'];
            
			   if($Cells['Picture'] !== null and $Cells['Picture'] !== '' and file_exists(HPICTURES.$Cells['Picture'])){
               $Cells['Picture'] = WPICTURES.$Cells['Picture'];
            }else{
               $Cells['Picture'] = IMG_DEFAULT;
            }
            $send['Cells'] = $Cells;
            $this->ProviderView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->ProviderLang;
         $ProviderCore = new ProviderCore();
         if(clicked($in, 'btn_remove')){ 
            $ProviderCore->LoadForm($in);
            $send['Errors'] = $ProviderCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $ProviderCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->ProviderModel->delete($send['LPosts']));
            }
         }
         $ProviderCore->LoadParams($in);
         $send['Errors'] = $ProviderCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $ProviderCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->ProviderModel->remove($send['LPosts']));
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
            $this->ProviderView->remove($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function dashboard($in){
         $send = array();
         
         $send['LTranslates'] = $this->ProviderLang;
         $send['LTranslates'] = array_merge($send['LTranslates'], $this->LayerLang);

         $send = array_merge($send, $this->ProviderModel->dashboard(null));

         $send['json'] = $this->Tochart(
            $send['Providers']['Charts'], 
            V($send['LTranslates'], 'Payments'),
            V($send['LTranslates'], 'Invoices')
         );

         $this->LayerController->headerdashboard($in);
         $this->ProviderView->dashboard($send);
         $this->LayerController->footerdashboard($in);
      }

      public function setting($in){
         $send = array();
         $send['LTranslates'] = $this->ProviderLang;
         $ProviderCore = new ProviderCore();
         
         /*if(clicked($in, 'btn_setting')){ 
            $ProviderCore->LoadForm($in);
            $send['Errors'] = $ProviderCore->Check(CORE::FSETTING);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $ProviderCore->Preper(Core::FSETTING);
               $send = array_merge($send, $this->ProviderModel->saving($send['LPosts']));
            }
         }*/

         /*$send = array_merge($send, $this->ProviderModel->setting(null));
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
				   $Cells = $send['Cells'];
               
               // .. 

               $send['Cells'] = $Cells;
            }
            $this->ProviderView->setting($send);
         }else{
            $this->ErrorController->e404($send);
         }*/
         $this->ProviderView->setting($send);
      }

   }
