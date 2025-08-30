<?php
   class BalancecustomerController extends Controller{

      private $BalancecustomerModel;
      private $BalancecustomerLang;
      private $BalancecustomerView;

      public function __construct(){
         parent::__construct();
         $this->BalancecustomerModel = new BalancecustomerModel();
         $this->BalancecustomerLang = BalancecustomerLang::Translate();
         $this->BalancecustomerView = new BalancecustomerView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->BalancecustomerLang;
         $BalancecustomerCore = new BalancecustomerCore();
         $BalancecustomerCore->LoadForm($in);
         $send['LPosts'] = $BalancecustomerCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->BalancecustomerModel->index($send['LPosts']));
         if(L($send, 'LRevenues')){
            foreach($send['LRevenues'] as $KBalancecustomer => $VBalancecustomer){
               $VBalancecustomer['Amount'] = $this->Format($VBalancecustomer['Amount']);
               $send['LRevenues'][$KBalancecustomer] = $VBalancecustomer;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		   $send = array_merge($send, $this->Lengths());
         $this->BalancecustomerView->index($send);
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->BalancecustomerLang;
         $BalancecustomerCore = new BalancecustomerCore();
         $BalancecustomerCore->LoadParams($in);
         $send['LPosts'] = $BalancecustomerCore->Preper(Core::FDISPLAY);
         
         $send = array_merge($send, $this->BalancecustomerModel->edit($BalancecustomerCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->BalancecustomerView->print($send);
      }
        
      public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->BalancecustomerLang;
         $BalancecustomerCore = new BalancecustomerCore();
         $BalancecustomerCore->LoadForm($in);
         $send = array_merge(
           $send, 
           $this->BalancecustomerModel->print($BalancecustomerCore->Preper(Core::FINDEX))
         );
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->BalancecustomerView->prints($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->BalancecustomerLang;
         $BalancecustomerCore = new BalancecustomerCore();
         $BalancecustomerCore->LoadParams($in);
         $send['Errors'] = $BalancecustomerCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $BalancecustomerCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->BalancecustomerModel->display($send['LPosts']));
         }
         
         if(L($send,'Cells')) {
            $Cells = $send['Cells'];
            $send['Cells'] = $Cells;
            $this->BalancecustomerView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->BalancecustomerLang;
         $BalancecustomerCore = new BalancecustomerCore();
         if(clicked($in, 'btn_add')){ 
            $BalancecustomerCore->LoadForm($in);
            $send['Errors'] = $BalancecustomerCore->Check(CORE::FADD);
            $send['LPosts'] = $BalancecustomerCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->BalancecustomerModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $send['LPosts'] = array();
               }
            }
         }else{
            $send['LPosts'] = array();
         }
         $send = array_merge($send, $this->BalancecustomerModel->add($in));

         $this->BalancecustomerView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->BalancecustomerLang;
         $BalancecustomerCore = new BalancecustomerCore();
         $BalancecustomerCore->LoadParams($in);
         $send['LPosts'] = $BalancecustomerCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $BalancecustomerCore->LoadForm($in);
            $send['Errors'] = $BalancecustomerCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $BalancecustomerCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->BalancecustomerModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  
               }
            }
         }
         $send = array_merge($send, $this->BalancecustomerModel->edit($BalancecustomerCore->Preper(Core::FDISPLAY)));

         if(L($send, 'Cells')){
            $Cells = $send['Cells'];

            $send['Cells'] = $Cells;
            $this->BalancecustomerView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->BalancecustomerLang;
         $BalancecustomerCore = new BalancecustomerCore();
         if(clicked($in, 'btn_remove')){ 
            $BalancecustomerCore->LoadForm($in);
            $send['Errors'] = $BalancecustomerCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $BalancecustomerCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->BalancecustomerModel->delete($send['LPosts']));
            }
         }
         $BalancecustomerCore->LoadParams($in);
         $send['Errors'] = $BalancecustomerCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $BalancecustomerCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->BalancecustomerModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
               $Cells = $send['Cells'];
               
               $send['Cells'] = $Cells;
            }
            $this->BalancecustomerView->remove($send);
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

