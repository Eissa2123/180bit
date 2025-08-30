<?php
   class BalancefinancialController extends Controller{

      private $BalancefinancialModel;
      private $BalancefinancialLang;
      private $BalancefinancialView;

      public function __construct(){
         parent::__construct();
         $this->BalancefinancialModel = new BalancefinancialModel();
         $this->BalancefinancialLang = BalancefinancialLang::Translate();
         $this->BalancefinancialView = new BalancefinancialView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->BalancefinancialLang;
         $BalancefinancialCore = new BalancefinancialCore();
         $BalancefinancialCore->LoadForm($in);
         $send['LPosts'] = $BalancefinancialCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->BalancefinancialModel->index($send['LPosts']));
         if(L($send, 'LRevenues')){
            foreach($send['LRevenues'] as $KBalancefinancial => $VBalancefinancial){
               $VBalancefinancial['Amount'] = $this->Format($VBalancefinancial['Amount']);
               $send['LRevenues'][$KBalancefinancial] = $VBalancefinancial;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		   $send = array_merge($send, $this->Lengths());
         $this->BalancefinancialView->index($send);
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->BalancefinancialLang;
         $BalancefinancialCore = new BalancefinancialCore();
         $BalancefinancialCore->LoadParams($in);
         $send['LPosts'] = $BalancefinancialCore->Preper(Core::FDISPLAY);
        
         $send = array_merge($send, $this->BalancefinancialModel->edit($BalancefinancialCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->BalancefinancialView->print($send);
      }
        
      public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->BalancefinancialLang;
         $BalancefinancialCore = new BalancefinancialCore();
         $BalancefinancialCore->LoadForm($in);
         $send = array_merge(
           $send, 
           $this->BalancefinancialModel->print($BalancefinancialCore->Preper(Core::FINDEX))
         );
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->BalancefinancialView->prints($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->BalancefinancialLang;
         $BalancefinancialCore = new BalancefinancialCore();
         $BalancefinancialCore->LoadParams($in);
         $send['Errors'] = $BalancefinancialCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $BalancefinancialCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->BalancefinancialModel->display($send['LPosts']));
         }
         
         if(L($send,'Cells')) {
            $Cells = $send['Cells'];
            $send['Cells'] = $Cells;
            $this->BalancefinancialView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->BalancefinancialLang;
         $BalancefinancialCore = new BalancefinancialCore();
         if(clicked($in, 'btn_add')){ 
            $BalancefinancialCore->LoadForm($in);
            $send['Errors'] = $BalancefinancialCore->Check(CORE::FADD);
            $send['LPosts'] = $BalancefinancialCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->BalancefinancialModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $send['LPosts'] = array();
               }
            }
         }else{
            $send['LPosts'] = array();
         }
         $send = array_merge($send, $this->BalancefinancialModel->add($in));
         $send['Cells']['Impayed'] = $this->Format($send['Cells']['Impayed']);
         $this->BalancefinancialView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->BalancefinancialLang;
         $BalancefinancialCore = new BalancefinancialCore();
         $BalancefinancialCore->LoadParams($in);
         $send['LPosts'] = $BalancefinancialCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $BalancefinancialCore->LoadForm($in);
            $send['Errors'] = $BalancefinancialCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $BalancefinancialCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->BalancefinancialModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  
               }
            }
         }
         $send = array_merge($send, $this->BalancefinancialModel->edit($BalancefinancialCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
            $Cells = $send['Cells'];
            $Cells['Impayed'] = $this->Format($Cells['Impayed']);
            $send['Cells'] = $Cells;
            $this->BalancefinancialView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->BalancefinancialLang;
         $BalancefinancialCore = new BalancefinancialCore();
         if(clicked($in, 'btn_remove')){ 
            $BalancefinancialCore->LoadForm($in);
            $send['Errors'] = $BalancefinancialCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $BalancefinancialCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->BalancefinancialModel->delete($send['LPosts']));
            }
         }
         $BalancefinancialCore->LoadParams($in);
         $send['Errors'] = $BalancefinancialCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $BalancefinancialCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->BalancefinancialModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
               $Cells = $send['Cells'];
               
               $send['Cells'] = $Cells;
            }
            $this->BalancefinancialView->remove($send);
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

