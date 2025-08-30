<?php
   class PurchasepaymentController extends Controller{

      private $LayerController;

      private $PurchasepaymentModel;
      private $PurchasepaymentLang;
      private $PurchasepaymentView;

      public function __construct(){
         parent::__construct();
         
         $this->LayerController = new LayerController();

         $this->PurchasepaymentModel = new PurchasepaymentModel();
         $this->PurchasepaymentLang = PurchasepaymentLang::Translate();
         $this->PurchasepaymentView = new PurchasepaymentView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasepaymentLang;
         $PurchasepaymentCore = new PurchasepaymentCore();
         $PurchasepaymentCore->LoadParams($in);
         $send['LPosts'] = $PurchasepaymentCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->PurchasepaymentModel->index($send['LPosts']));
         if(L($send, 'LPurchasepayments')){
            foreach($send['LPurchasepayments'] as $KPurchasepayment => $VPurchasepayment){
               $VPurchasepayment['Amount'] = $this->Format($VPurchasepayment['Amount']);
               $send['LPurchasepayments'][$KPurchasepayment] = $VPurchasepayment;
            }
         }
		   $send = array_merge($send, $this->Lengths());
         $this->PurchasepaymentView->index($send);
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasepaymentLang;
         $PurchasepaymentCore = new PurchasepaymentCore();
         $PurchasepaymentCore->LoadParams($in);
         $send['LPosts'] = $PurchasepaymentCore->Preper(Core::FDISPLAY);
        
         $send = array_merge($send, $this->PurchasepaymentModel->edit($PurchasepaymentCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->PurchasepaymentView->print($send);
      }
        
      public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasepaymentLang;
         $PurchasepaymentCore = new PurchasepaymentCore();
         $PurchasepaymentCore->LoadForm($in);
         $send = array_merge(
           $send, 
           $this->PurchasepaymentModel->print($PurchasepaymentCore->Preper(Core::FINDEX))
         );
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->PurchasepaymentView->prints($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasepaymentLang;
         $PurchasepaymentCore = new PurchasepaymentCore();
         $PurchasepaymentCore->LoadParams($in);
         $send['Errors'] = $PurchasepaymentCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $PurchasepaymentCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->PurchasepaymentModel->display($send['LPosts']));
         }
         if(L($send,'Cells')) {
            $send['Cells'] = $this->Formats($send['Cells']);
            $this->PurchasepaymentView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasepaymentLang;
         $PurchasepaymentCore = new PurchasepaymentCore();
         $PurchasepaymentCore->LoadParams($in);
         $send['LPosts'] = $PurchasepaymentCore->Preper(Core::FINDEX);
         if(clicked($in, 'btn_add')){ 
            $PurchasepaymentCore->LoadForm($in);
            $send['Errors'] = $PurchasepaymentCore->Check(CORE::FADD);
            $send['LPosts'] = $PurchasepaymentCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->PurchasepaymentModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $PurchasepaymentCore->LoadParams($in);
                  $send['LPosts'] = $PurchasepaymentCore->Preper(Core::FINDEX);
               }
            }
         }
         
         $send = array_merge($send, $this->PurchasepaymentModel->add($send['LPosts']));
		 if(L($send, 'Cells')){
			 $Cells = $send['Cells'];
			 
            $Cells['Paids'] = $this->Format($Cells['Paids']);
            $Cells['Return'] = $this->Format($Cells['Return']);
            $Cells['Rest'] = $this->Format($Cells['Rest']);

			$send['Cells'] = $Cells;
		 }
         $this->PurchasepaymentView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasepaymentLang;
         $PurchasepaymentCore = new PurchasepaymentCore();
         $PurchasepaymentCore->LoadParams($in);
         $send['LPosts'] = $PurchasepaymentCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $PurchasepaymentCore->LoadForm($in);
            $send['Errors'] = $PurchasepaymentCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $PurchasepaymentCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->PurchasepaymentModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  
               }
            }
         }
         $send = array_merge($send, $this->PurchasepaymentModel->edit($PurchasepaymentCore->Preper(Core::FDISPLAY)));
         if(L($send, 'Cells')){

            $send['Cells']['Amount'] = $this->Format($send['Cells']['Amount']);

            $this->PurchasepaymentView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasepaymentLang;
         $PurchasepaymentCore = new PurchasepaymentCore();
         if(clicked($in, 'btn_remove')){ 
            $PurchasepaymentCore->LoadForm($in);
            $send['Errors'] = $PurchasepaymentCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $PurchasepaymentCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->PurchasepaymentModel->delete($send['LPosts']));
            }
         }
         $PurchasepaymentCore->LoadParams($in);
         $send['Errors'] = $PurchasepaymentCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $PurchasepaymentCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->PurchasepaymentModel->remove($send['LPosts']));
         }

         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
			   if(L($send, 'Cells')){
               $send['Cells'] = $this->Formats($send['Cells']);
			   }
            $this->PurchasepaymentView->remove($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function dashboard($in){
         $send = array();
         
         $send['LTranslates'] = $this->PurchasepaymentLang;
         $send = array_merge($send, $this->PurchasepaymentModel->dashboard(null));
         
         $this->LayerController->headerdashboard($in);
         $this->PurchasepaymentView->dashboard($send);
         $this->LayerController->footerdashboard($in);
      }

      public function setting($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasepaymentLang;
         $PurchasepaymentCore = new PurchasepaymentCore();
         
         /*if(clicked($in, 'btn_setting')){ 
            $PurchasepaymentCore->LoadForm($in);
            $send['Errors'] = $PurchasepaymentCore->Check(CORE::FSETTING);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $PurchasepaymentCore->Preper(Core::FSETTING);
               $send = array_merge($send, $this->PurchasepaymentModel->saving($send['LPosts']));
            }
         }*/

         /*$send = array_merge($send, $this->PurchasepaymentModel->setting(null));
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
				   $Cells = $send['Cells'];
               
               // .. 

               $send['Cells'] = $Cells;
            }
            $this->PurchasepaymentView->setting($send);
         }else{
            $this->ErrorController->e404($send);
         }*/
         $this->PurchasepaymentView->setting($send);
      }

   }
