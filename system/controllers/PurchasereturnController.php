<?php
   class PurchasereturnController extends Controller{

      private $LayerController;

      private $PurchasereturnModel;
      private $PurchasereturnLang;
      private $PurchasereturnView;

      public function __construct(){
         parent::__construct();
         
         $this->LayerController = new LayerController();

         $this->PurchasereturnModel = new PurchasereturnModel();
         $this->PurchasereturnLang = PurchasereturnLang::Translate();
         $this->PurchasereturnView = new PurchasereturnView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasereturnLang;
         $PurchasereturnCore = new PurchasereturnCore();
         $PurchasereturnCore->LoadParams($in);
         $send['LPosts'] = $PurchasereturnCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->PurchasereturnModel->index($send['LPosts']));
         if(L($send, 'LPurchasereturns')){
            foreach($send['LPurchasereturns'] as $KPurchasereturn => $VPurchasereturn){
               $VPurchasereturn['TTC'] = $this->Format($VPurchasereturn['TTC']);
               $send['LPurchasereturns'][$KPurchasereturn] = $VPurchasereturn;
            }
            $send['TPR'] = $this->Formats($send['TPR']);
         }
		   $send = array_merge($send, $this->Lengths());
         $this->PurchasereturnView->index($send);
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasereturnLang;
         $PurchasereturnCore = new PurchasereturnCore();
         $PurchasereturnCore->LoadParams($in);
         $send['LPosts'] = $PurchasereturnCore->Preper(Core::FDISPLAY);
        
         $send = array_merge($send, $this->PurchasereturnModel->edit($PurchasereturnCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->PurchasereturnView->print($send);
      }
        
      public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasereturnLang;
         $PurchasereturnCore = new PurchasereturnCore();
         $PurchasereturnCore->LoadForm($in);
         $send = array_merge(
           $send, 
           $this->PurchasereturnModel->print($PurchasereturnCore->Preper(Core::FINDEX))
         );
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->PurchasereturnView->prints($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasereturnLang;
         $PurchasereturnCore = new PurchasereturnCore();
         $PurchasereturnCore->LoadParams($in);
         $send['Errors'] = $PurchasereturnCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $PurchasereturnCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->PurchasereturnModel->display($send['LPosts']));
         }
         if(L($send,'Cells')) {
            $send['Cells'] = $this->Formats($send['Cells']);
            $this->PurchasereturnView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasereturnLang;
         $PurchasereturnCore = new PurchasereturnCore();
         $PurchasereturnCore->LoadParams($in);
         $send['LPosts'] = $PurchasereturnCore->Preper(Core::FINDEX);
         if(clicked($in, 'btn_add')){ 
            $PurchasereturnCore->LoadForm($in);
            $send['Errors'] = $PurchasereturnCore->Check(CORE::FADD);
            $send['LPosts'] = $PurchasereturnCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->PurchasereturnModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $PurchasereturnCore->LoadParams($in);
                  $send['LPosts'] = $PurchasereturnCore->Preper(Core::FINDEX);
               }
            }
         }
         $send = array_merge($send, $this->PurchasereturnModel->add($send['LPosts']));
         
         $this->PurchasereturnView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasereturnLang;
         $PurchasereturnCore = new PurchasereturnCore();
         $PurchasereturnCore->LoadParams($in);
         $send['LPosts'] = $PurchasereturnCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $PurchasereturnCore->LoadForm($in);
            $send['Errors'] = $PurchasereturnCore->Check(CORE::FEDIT);
            $send['LPosts'] = $PurchasereturnCore->Preper(Core::FEDIT);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->PurchasereturnModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  
               }
            }
         }
         $send = array_merge($send, $this->PurchasereturnModel->edit($send['LPosts']));
         if(L($send, 'Cells')){
            $this->PurchasereturnView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasereturnLang;
         $PurchasereturnCore = new PurchasereturnCore();
         if(clicked($in, 'btn_remove')){ 
            $PurchasereturnCore->LoadForm($in);
            $send['Errors'] = $PurchasereturnCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $PurchasereturnCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->PurchasereturnModel->delete($send['LPosts']));
            }
         }
         $PurchasereturnCore->LoadParams($in);
         $send['Errors'] = $PurchasereturnCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $PurchasereturnCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->PurchasereturnModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
			   if(L($send, 'Cells')){
               $send['Cells'] = $this->Formats($send['Cells']);
			   }
            $this->PurchasereturnView->remove($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function dashboard($in){
         $send = array();
         
         $send['LTranslates'] = $this->PurchasereturnLang;
         $send = array_merge($send, $this->PurchasereturnModel->dashboard(null));
         
         $this->LayerController->headerdashboard($in);
         $this->PurchasereturnView->dashboard($send);
         $this->LayerController->footerdashboard($in);
      }

      public function setting($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasereturnLang;
         $PurchasereturnCore = new PurchasereturnCore();
         
         /*if(clicked($in, 'btn_setting')){ 
            $PurchasereturnCore->LoadForm($in);
            $send['Errors'] = $PurchasereturnCore->Check(CORE::FSETTING);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $PurchasereturnCore->Preper(Core::FSETTING);
               $send = array_merge($send, $this->PurchasereturnModel->saving($send['LPosts']));
            }
         }*/

         /*$send = array_merge($send, $this->PurchasereturnModel->setting(null));
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
				   $Cells = $send['Cells'];
               
               // .. 

               $send['Cells'] = $Cells;
            }
            $this->PurchasereturnView->setting($send);
         }else{
            $this->ErrorController->e404($send);
         }*/
         $this->PurchasereturnView->setting($send);
      }

   }
