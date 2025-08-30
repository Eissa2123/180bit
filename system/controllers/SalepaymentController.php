<?php
   class SalepaymentController extends Controller{

      private $LayerController;

      private $SalepaymentModel;
      private $SalepaymentLang;
      private $SalepaymentView;

      public function __construct(){
         parent::__construct();
         
         $this->LayerController = new LayerController();

         $this->SalepaymentModel = new SalepaymentModel();
         $this->SalepaymentLang = SalepaymentLang::Translate();
         $this->SalepaymentView = new SalepaymentView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->SalepaymentLang;
         $SalepaymentCore = new SalepaymentCore();
         $SalepaymentCore->LoadParams($in);
         $send['LPosts'] = $SalepaymentCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->SalepaymentModel->index($send['LPosts']));
         if(L($send, 'LSalepayments')){
            foreach($send['LSalepayments'] as $KSalepayment => $VSalepayment){
               $VSalepayment['Amount'] = $this->Format($VSalepayment['Amount']);
               $send['LSalepayments'][$KSalepayment] = $VSalepayment;
            }
         }
		   $send = array_merge($send, $this->Lengths());
         $this->SalepaymentView->index($send);
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->SalepaymentLang;
         $SalepaymentCore = new SalepaymentCore();
         $SalepaymentCore->LoadParams($in);
         $send['LPosts'] = $SalepaymentCore->Preper(Core::FDISPLAY);
        
         $send = array_merge($send, $this->SalepaymentModel->edit($SalepaymentCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->SalepaymentView->print($send);
      }
        
      public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->SalepaymentLang;
         $SalepaymentCore = new SalepaymentCore();
         $SalepaymentCore->LoadForm($in);
         $send = array_merge(
           $send, 
           $this->SalepaymentModel->print($SalepaymentCore->Preper(Core::FINDEX))
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
         $this->SalepaymentView->prints($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->SalepaymentLang;
         $SalepaymentCore = new SalepaymentCore();
         $SalepaymentCore->LoadParams($in);
         $send['Errors'] = $SalepaymentCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $SalepaymentCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->SalepaymentModel->display($send['LPosts']));
         }
         if(L($send,'Cells')) {
            $send['Cells'] = $this->Formats($send['Cells']);
            $this->SalepaymentView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->SalepaymentLang;
         $SalepaymentCore = new SalepaymentCore();
         $SalepaymentCore->LoadParams($in);
         $send['LPosts'] = $SalepaymentCore->Preper(Core::FINDEX);
         if(clicked($in, 'btn_add')){ 
            $SalepaymentCore->LoadForm($in);
            $send['Errors'] = $SalepaymentCore->Check(CORE::FADD);
            $send['LPosts'] = $SalepaymentCore->Preper(Core::FADD);

            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->SalepaymentModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $SalepaymentCore->LoadParams($in);
                  $send['LPosts'] = $SalepaymentCore->Preper(Core::FINDEX);
               }
            }
         }
         
         $send = array_merge($send, $this->SalepaymentModel->add($send['LPosts']));
		 if(L($send, 'Cells')){
			 $Cells = $send['Cells'];
			 
            $Cells['Paids'] = $this->Format($Cells['Paids']);
            $Cells['Return'] = $this->Format($Cells['Return']);
            $Cells['Rest'] = $this->Format($Cells['Rest']);

			$send['Cells'] = $Cells;
		 }
         $this->SalepaymentView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->SalepaymentLang;
         $SalepaymentCore = new SalepaymentCore();
         $SalepaymentCore->LoadParams($in);
         $send['LPosts'] = $SalepaymentCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $SalepaymentCore->LoadForm($in);
            $send['Errors'] = $SalepaymentCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $SalepaymentCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->SalepaymentModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  
               }
            }
         }
         $send = array_merge($send, $this->SalepaymentModel->edit($SalepaymentCore->Preper(Core::FDISPLAY)));
         if(L($send, 'Cells')){

            $send['Cells']['Amount'] = $this->Format($send['Cells']['Amount']);

            $this->SalepaymentView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->SalepaymentLang;
         $SalepaymentCore = new SalepaymentCore();
         if(clicked($in, 'btn_remove')){ 
            $SalepaymentCore->LoadForm($in);
            $send['Errors'] = $SalepaymentCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $SalepaymentCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->SalepaymentModel->delete($send['LPosts']));
            }
         }
         $SalepaymentCore->LoadParams($in);
         $send['Errors'] = $SalepaymentCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $SalepaymentCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->SalepaymentModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
			   if(L($send, 'Cells')){
               $send['Cells'] = $this->Formats($send['Cells']);
			   }
            $this->SalepaymentView->remove($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function dashboard($in){
         $send = array();
         
         $send['LTranslates'] = $this->SalepaymentLang;
         $send = array_merge($send, $this->SalepaymentModel->dashboard(null));
         
         $this->LayerController->headerdashboard($in);
         $this->SalepaymentView->dashboard($send);
         $this->LayerController->footerdashboard($in);
      }

      public function setting($in){
         $send = array();
         $send['LTranslates'] = $this->SalepaymentLang;
         $SalepaymentCore = new SalepaymentCore();
         
         /*if(clicked($in, 'btn_setting')){ 
            $SalepaymentCore->LoadForm($in);
            $send['Errors'] = $SalepaymentCore->Check(CORE::FSETTING);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $SalepaymentCore->Preper(Core::FSETTING);
               $send = array_merge($send, $this->SalepaymentModel->saving($send['LPosts']));
            }
         }*/

         /*$send = array_merge($send, $this->SalepaymentModel->setting(null));
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
				   $Cells = $send['Cells'];
               
               // .. 

               $send['Cells'] = $Cells;
            }
            $this->SalepaymentView->setting($send);
         }else{
            $this->ErrorController->e404($send);
         }*/
         $this->SalepaymentView->setting($send);
      }

   }
