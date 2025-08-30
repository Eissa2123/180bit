<?php
   class BalanceController extends Controller{

      private $BalanceModel;
      private $BalanceLang;
      private $BalanceView;

      public function __construct(){
         parent::__construct();
         $this->BalanceModel = new BalanceModel();
         $this->BalanceLang = BalanceLang::Translate();
         $this->BalanceView = new BalanceView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceLang;
         $BalanceCore = new BalanceCore();
         $BalanceCore->LoadForm($in);
         $send['LPosts'] = $BalanceCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->BalanceModel->index($send['LPosts']));
         if(L($send, 'LBalances')){
            foreach($send['LBalances'] as $KBalance => $VBalance){
               $VBalance['Amount'] = $this->Format($VBalance['Amount']);
               $send['LBalances'][$KBalance] = $VBalance;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		   $send = array_merge($send, $this->Lengths());
         $this->BalanceView->index($send);
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceLang;
         $BalanceCore = new BalanceCore();
         $BalanceCore->LoadParams($in);
         $send['LPosts'] = $BalanceCore->Preper(Core::FDISPLAY);
        
         $send = array_merge($send, $this->BalanceModel->edit($BalanceCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->BalanceView->print($send);
      }
        
      public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceLang;
         $BalanceCore = new BalanceCore();
         $BalanceCore->LoadForm($in);
         $send = array_merge(
           $send, 
           $this->BalanceModel->print($BalanceCore->Preper(Core::FINDEX))
         );
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->BalanceView->prints($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceLang;
         $BalanceCore = new BalanceCore();
         $BalanceCore->LoadParams($in);
         $send['Errors'] = $BalanceCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $BalanceCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->BalanceModel->display($send['LPosts']));
         }
         
         if(L($send,'Cells')) {
            $Cells = $send['Cells'];
            $send['Cells'] = $Cells;
            $this->BalanceView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceLang;
         $BalanceCore = new BalanceCore();
         if(clicked($in, 'btn_add')){ 
            $BalanceCore->LoadForm($in);
            $send['Errors'] = $BalanceCore->Check(CORE::FADD);
            $send['LPosts'] = $BalanceCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->BalanceModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $send['LPosts'] = array();
               }
            }
         }else{
            $send['LPosts'] = array();
         }
         $send = array_merge($send, $this->BalanceModel->add($in));
         $this->BalanceView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceLang;
         $BalanceCore = new BalanceCore();
         $BalanceCore->LoadParams($in);
         $send['LPosts'] = $BalanceCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $BalanceCore->LoadForm($in);
            $send['Errors'] = $BalanceCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $BalanceCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->BalanceModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  
               }
            }
         }
         $send = array_merge($send, $this->BalanceModel->edit($BalanceCore->Preper(Core::FDISPLAY)));

         if(L($send, 'Cells')){
            $Cells = $send['Cells'];

            $send['Cells'] = $Cells;
            $this->BalanceView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceLang;
         $BalanceCore = new BalanceCore();
         if(clicked($in, 'btn_remove')){ 
            $BalanceCore->LoadForm($in);
            $send['Errors'] = $BalanceCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $BalanceCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->BalanceModel->delete($send['LPosts']));
            }
         }
         $BalanceCore->LoadParams($in);
         $send['Errors'] = $BalanceCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $BalanceCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->BalanceModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
               $Cells = $send['Cells'];
               
               $send['Cells'] = $Cells;
            }
            $this->BalanceView->remove($send);
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
