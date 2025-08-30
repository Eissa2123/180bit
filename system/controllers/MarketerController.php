<?php
   class MarketerController extends Controller{

      private $LayerController;

      private $MarketerModel;
      private $MarketerLang;
      private $LayerLang;
      private $MarketerView;

      public function __construct(){
         parent::__construct();
         
         $this->LayerController = new LayerController();

         $this->MarketerModel = new MarketerModel();
         $this->MarketerLang = MarketerLang::Translate();
         $this->LayerLang = LayerLang::Translate();
         $this->MarketerView = new MarketerView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->MarketerLang;
         $MarketerCore = new MarketerCore();
         $MarketerCore->LoadForm($in);
         $send['LPosts'] = $MarketerCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->MarketerModel->index($send['LPosts']));
         if(L($send, 'LMarketers')){
            foreach($send['LMarketers'] as $KMarketer => $VMarketer){
               
               $VMarketer['Picture'] = WUPLOADS.$VMarketer['Picture'];
               $VMarketer['Due'] = $this->Format($VMarketer['Due']);
               $VMarketer['Paid'] = $this->Format($VMarketer['Paid']);
               $VMarketer['Remaining'] = $this->Format($VMarketer['Remaining']);

               $send['LMarketers'][$KMarketer] = $VMarketer;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		   $send = array_merge($send, $this->Lengths());
         $this->MarketerView->index($send);
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->MarketerLang;
         $MarketerCore = new MarketerCore();
         $MarketerCore->LoadParams($in);
         $send['LPosts'] = $MarketerCore->Preper(Core::FDISPLAY);
        
         $send = array_merge($send, $this->MarketerModel->edit($MarketerCore->Preper(Core::FDISPLAY)));
         
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
         $this->MarketerView->print($send);
        }
        
        public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->MarketerLang;
         $MarketerCore = new MarketerCore();
         $MarketerCore->LoadForm($in);
         $send = array_merge(
           $send, 
           $this->MarketerModel->print($MarketerCore->Preper(Core::FINDEX))
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
         $this->MarketerView->prints($send);
        }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->MarketerLang;
         $MarketerCore = new MarketerCore();
         $MarketerCore->LoadParams($in);
         $send['Errors'] = $MarketerCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $MarketerCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->MarketerModel->display($send['LPosts']));
         }
		   if(L($send,'Cells')) {
            $Cells = $send['Cells'];
            if($Cells['Picture'] !== null and $Cells['Picture'] !== '' and file_exists(HPICTURES.$Cells['Picture'])){
               $Cells['Picture'] = WPICTURES.$Cells['Picture'];
            }else{
               $Cells['Picture'] = IMG_DEFAULT;
            }
            $send['Cells'] = $Cells;
            $this->MarketerView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->MarketerLang;
         $MarketerCore = new MarketerCore();
         if(clicked($in, 'btn_add')){ 
            $MarketerCore->LoadForm($in);
            $send['Errors'] = $MarketerCore->Check(CORE::FADD);
            $send['LPosts'] = $MarketerCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->MarketerModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  //$MarketerCore->Savefiles();
                  $send['LPosts'] = array();
               }
            }
         }else{
            $send['LPosts'] = array();
         }
         $send = array_merge($send, $this->MarketerModel->add($in));
         $this->MarketerView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->MarketerLang;
         $MarketerCore = new MarketerCore();
         $MarketerCore->LoadParams($in);
         $send['LPosts'] = $MarketerCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $MarketerCore->LoadForm($in);
            $send['Errors'] = $MarketerCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $MarketerCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->MarketerModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  //$MarketerCore->Savefiles();
               }
            }
         }
         $send = array_merge($send, $this->MarketerModel->edit($MarketerCore->Preper(Core::FDISPLAY)));
         if(L($send, 'Cells')){
            $Cells = $send['Cells'];
            
			   if($Cells['Picture'] !== null and $Cells['Picture'] !== '' and file_exists(HPICTURES.$Cells['Picture'])){
               $Cells['Picture'] = WPICTURES.$Cells['Picture'];
            }else{
               $Cells['Picture'] = IMG_DEFAULT;
            }
            $send['Cells'] = $Cells;
            $this->MarketerView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->MarketerLang;
         $MarketerCore = new MarketerCore();
         if(clicked($in, 'btn_remove')){ 
            $MarketerCore->LoadForm($in);
            $send['Errors'] = $MarketerCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $MarketerCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->MarketerModel->delete($send['LPosts']));
            }
         }
         $MarketerCore->LoadParams($in);
         $send['Errors'] = $MarketerCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $MarketerCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->MarketerModel->remove($send['LPosts']));
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
            $this->MarketerView->remove($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function dashboard($in){
         $send = array();
         
         $send['LTranslates'] = $this->MarketerLang;
         $send['LTranslates'] = array_merge($send['LTranslates'], $this->LayerLang);

         $send = array_merge($send, $this->MarketerModel->dashboard(null));

         $send['json'] = $this->Tochart(
            $send['Marketers']['Charts'], 
            V($send['LTranslates'], 'Payments'),
            V($send['LTranslates'], 'Invoices')
         );

         $this->LayerController->headerdashboard($in);
         $this->MarketerView->dashboard($send);
         $this->LayerController->footerdashboard($in);
      }

      public function setting($in){
         $send = array();
         $send['LTranslates'] = $this->MarketerLang;
         $MarketerCore = new MarketerCore();
         
         /*if(clicked($in, 'btn_setting')){ 
            $MarketerCore->LoadForm($in);
            $send['Errors'] = $MarketerCore->Check(CORE::FSETTING);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $MarketerCore->Preper(Core::FSETTING);
               $send = array_merge($send, $this->MarketerModel->saving($send['LPosts']));
            }
         }*/

         /*$send = array_merge($send, $this->MarketerModel->setting(null));
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
				   $Cells = $send['Cells'];
               
               // .. 

               $send['Cells'] = $Cells;
            }
            $this->MarketerView->setting($send);
         }else{
            $this->ErrorController->e404($send);
         }*/
         $this->MarketerView->setting($send);
      }

   }
