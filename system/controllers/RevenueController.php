<?php
   class RevenueController extends Controller{

      private $RevenueModel;
      private $RevenueLang;
      private $RevenueView;

      public function __construct(){
         parent::__construct();
         $this->RevenueModel = new RevenueModel();
         $this->RevenueLang = RevenueLang::Translate();
         $this->RevenueView = new RevenueView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->RevenueLang;
         $RevenueCore = new RevenueCore();
         $RevenueCore->LoadForm($in);
         $send['LPosts'] = $RevenueCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->RevenueModel->index($send['LPosts']));
         if(L($send, 'LRevenues')){
            foreach($send['LRevenues'] as $KRevenue => $VRevenue){
               $VRevenue['Amount'] = $this->Format($VRevenue['Amount']);
               $send['LRevenues'][$KRevenue] = $VRevenue;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		   $send = array_merge($send, $this->Lengths());
         $this->RevenueView->index($send);
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->RevenueLang;
         $RevenueCore = new RevenueCore();
         $RevenueCore->LoadParams($in);
         $send['LPosts'] = $RevenueCore->Preper(Core::FDISPLAY);
        
         $send = array_merge($send, $this->RevenueModel->edit($RevenueCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->RevenueView->print($send);
      }
        
      public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->RevenueLang;
         $RevenueCore = new RevenueCore();
         $RevenueCore->LoadForm($in);
         $send = array_merge(
           $send, 
           $this->RevenueModel->print($RevenueCore->Preper(Core::FINDEX))
         );
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->RevenueView->prints($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->RevenueLang;
         $RevenueCore = new RevenueCore();
         $RevenueCore->LoadParams($in);
         $send['Errors'] = $RevenueCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $RevenueCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->RevenueModel->display($send['LPosts']));
         }
         
         if(L($send,'Cells')) {
            $Cells = $send['Cells'];
            $send['Cells'] = $Cells;
            $this->RevenueView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->RevenueLang;
         $RevenueCore = new RevenueCore();
         if(clicked($in, 'btn_add')){ 
            $RevenueCore->LoadForm($in);
            $send['Errors'] = $RevenueCore->Check(CORE::FADD);
            $send['LPosts'] = $RevenueCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->RevenueModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $send['LPosts'] = array();
               }
            }
         }else{
            $send['LPosts'] = array();
         }
         $send = array_merge($send, $this->RevenueModel->add($in));
         $this->RevenueView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->RevenueLang;
         $RevenueCore = new RevenueCore();
         $RevenueCore->LoadParams($in);
         $send['LPosts'] = $RevenueCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $RevenueCore->LoadForm($in);
            $send['Errors'] = $RevenueCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $RevenueCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->RevenueModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  
               }
            }
         }
         $send = array_merge($send, $this->RevenueModel->edit($RevenueCore->Preper(Core::FDISPLAY)));

         if(L($send, 'Cells')){
            $Cells = $send['Cells'];

            $send['Cells'] = $Cells;
            $this->RevenueView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->RevenueLang;
         $RevenueCore = new RevenueCore();
         if(clicked($in, 'btn_remove')){ 
            $RevenueCore->LoadForm($in);
            $send['Errors'] = $RevenueCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $RevenueCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->RevenueModel->delete($send['LPosts']));
            }
         }
         $RevenueCore->LoadParams($in);
         $send['Errors'] = $RevenueCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $RevenueCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->RevenueModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
               $Cells = $send['Cells'];
               
               $send['Cells'] = $Cells;
            }
            $this->RevenueView->remove($send);
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
