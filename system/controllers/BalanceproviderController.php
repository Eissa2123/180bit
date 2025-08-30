<?php
   class BalanceproviderController extends Controller{

      private $BalanceproviderModel;
      private $BalanceproviderLang;
      private $BalanceproviderView;

      public function __construct(){
         parent::__construct();
         $this->BalanceproviderModel = new BalanceproviderModel();
         $this->BalanceproviderLang = BalanceproviderLang::Translate();
         $this->BalanceproviderView = new BalanceproviderView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceproviderLang;
         $BalanceproviderCore = new BalanceproviderCore();
         $BalanceproviderCore->LoadForm($in);
         $send['LPosts'] = $BalanceproviderCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->BalanceproviderModel->index($send['LPosts']));
         if(L($send, 'LRevenues')){
            foreach($send['LRevenues'] as $KBalanceprovider => $VBalanceprovider){
               $VBalanceprovider['Amount'] = $this->Format($VBalanceprovider['Amount']);
               $send['LRevenues'][$KBalanceprovider] = $VBalanceprovider;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		   $send = array_merge($send, $this->Lengths());
         $this->BalanceproviderView->index($send);
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceproviderLang;
         $BalanceproviderCore = new BalanceproviderCore();
         $BalanceproviderCore->LoadParams($in);
         $send['LPosts'] = $BalanceproviderCore->Preper(Core::FDISPLAY);
         
         $send = array_merge($send, $this->BalanceproviderModel->edit($BalanceproviderCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->BalanceproviderView->print($send);
      }
        
      public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceproviderLang;
         $BalanceproviderCore = new BalanceproviderCore();
         $BalanceproviderCore->LoadForm($in);
         $send = array_merge(
           $send, 
           $this->BalanceproviderModel->print($BalanceproviderCore->Preper(Core::FINDEX))
         );
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->BalanceproviderView->prints($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceproviderLang;
         $BalanceproviderCore = new BalanceproviderCore();
         $BalanceproviderCore->LoadParams($in);
         $send['Errors'] = $BalanceproviderCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $BalanceproviderCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->BalanceproviderModel->display($send['LPosts']));
         }
         
         if(L($send,'Cells')) {
            $Cells = $send['Cells'];
            $send['Cells'] = $Cells;
            $this->BalanceproviderView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceproviderLang;
         $BalanceproviderCore = new BalanceproviderCore();
         if(clicked($in, 'btn_add')){ 
            $BalanceproviderCore->LoadForm($in);
            $send['Errors'] = $BalanceproviderCore->Check(CORE::FADD);
            $send['LPosts'] = $BalanceproviderCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->BalanceproviderModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $send['LPosts'] = array();
               }
            }
         }else{
            $send['LPosts'] = array();
         }
         $send = array_merge($send, $this->BalanceproviderModel->add($in));

         $this->BalanceproviderView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceproviderLang;
         $BalanceproviderCore = new BalanceproviderCore();
         $BalanceproviderCore->LoadParams($in);
         $send['LPosts'] = $BalanceproviderCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $BalanceproviderCore->LoadForm($in);
            $send['Errors'] = $BalanceproviderCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $BalanceproviderCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->BalanceproviderModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  
               }
            }
         }
         $send = array_merge($send, $this->BalanceproviderModel->edit($BalanceproviderCore->Preper(Core::FDISPLAY)));

         if(L($send, 'Cells')){
            $Cells = $send['Cells'];

            $send['Cells'] = $Cells;
            $this->BalanceproviderView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceproviderLang;
         $BalanceproviderCore = new BalanceproviderCore();
         if(clicked($in, 'btn_remove')){ 
            $BalanceproviderCore->LoadForm($in);
            $send['Errors'] = $BalanceproviderCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $BalanceproviderCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->BalanceproviderModel->delete($send['LPosts']));
            }
         }
         $BalanceproviderCore->LoadParams($in);
         $send['Errors'] = $BalanceproviderCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $BalanceproviderCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->BalanceproviderModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
               $Cells = $send['Cells'];
               
               $send['Cells'] = $Cells;
            }
            $this->BalanceproviderView->remove($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function dashboard($in){
         $send = array();
         
         /*$send['LTranslates'] = $this->CustomerLang;
         $send['LTranslates'] = array_merge($send['LTranslates'], $this->LayerLang);

         $send = array_merge($send, $this->CustomerModel->dashboard(null));
         
         $send['json'] = $this->Tochart(
            $send['Customers']['Charts'], 
            V($send['LTranslates'], 'Payments'),
            V($send['LTranslates'], 'Invoices')
         );

         $this->LayerController->headerdashboard($in);
         $this->CustomerView->dashboard($send);
         $this->LayerController->footerdashboard($in);*/
      }

      public function setting($in){
         $send = array();
         //$send['LTranslates'] = $this->CustomerLang;
         //$CustomerCore = new CustomerCore();
         
         /*if(clicked($in, 'btn_setting')){ 
            $CustomerCore->LoadForm($in);
            $send['Errors'] = $CustomerCore->Check(CORE::FSETTING);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $CustomerCore->Preper(Core::FSETTING);
               $send = array_merge($send, $this->CustomerModel->saving($send['LPosts']));
            }
         }*/

         /*$send = array_merge($send, $this->CustomerModel->setting(null));
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
				   $Cells = $send['Cells'];
               
               // .. 

               $send['Cells'] = $Cells;
            }
            $this->CustomerView->setting($send);
         }else{
            $this->ErrorController->e404($send);
         }*/
         //$this->CustomerView->setting($send);
      }

   }

