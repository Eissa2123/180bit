<?php
   class BalanceproductController extends Controller{

      private $LayerController;
      private $LayerLang;

      private $BalanceproductModel;
      private $BalanceproductLang;
      private $BalanceproductView;

      public function __construct(){
         parent::__construct();
         
         $this->LayerController = new LayerController();
         $this->LayerLang = LayerLang::Translate();

         $this->BalanceproductModel = new BalanceproductModel();
         $this->BalanceproductLang = BalanceproductLang::Translate();
         $this->BalanceproductView = new BalanceproductView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceproductLang;
         $BalanceproductCore = new BalanceproductCore();
         $BalanceproductCore->LoadForm($in);
         $send['LPosts'] = $BalanceproductCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->BalanceproductModel->index($send['LPosts']));
         if(L($send, 'LBalances')){
            foreach($send['LBalances'] as $KBalance => $VBalance){
               $VBalance['Price'] = $this->Format($VBalance['Price']);

               $send['LBalances'][$KBalance] = $VBalance;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
         $send= $this->Formats($send);
		   $send = array_merge($send, $this->Lengths());
         $this->BalanceproductView->index($send);
      }
      
      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceproductLang;
         $BalanceproductCore = new BalanceproductCore();
         $BalanceproductCore->LoadParams($in);
         $send['LPosts'] = $BalanceproductCore->Preper(Core::FDISPLAY);
        
         $send = array_merge($send, $this->BalanceproductModel->edit($BalanceproductCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           
           $send['Cells'] = $Cells;
         }
         $this->BalanceproductView->print($send);
      }
        
      public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceproductLang;
         $BalanceproductCore = new BalanceproductCore();
         $BalanceproductCore->LoadForm($in);
         $send = array_merge(
           $send, 
           $this->BalanceproductModel->print($BalanceproductCore->Preper(Core::FINDEX))
         );
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           
           $send['Cells'] = $Cells;
         }
         $this->BalanceproductView->prints($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceproductLang;
         $BalanceproductCore = new BalanceproductCore();
         $BalanceproductCore->LoadParams($in);
         $send['Errors'] = $BalanceproductCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $BalanceproductCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->BalanceproductModel->display($send['LPosts']));
         }
         if(L($send,'Cells')) {
            $send['Cells']['Price'] = $this->Format($send['Cells']['Price']);

            $this->BalanceproductView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceproductLang;
         $BalanceproductCore = new BalanceproductCore();
         $BalanceproductCore->LoadParams($in);
         $send['LPosts'] = $BalanceproductCore->Preper(Core::FDISPLAY);
         $send = array_merge($send, $this->BalanceproductModel->add($send['LPosts']));
         if(clicked($in, 'btn_add')){ 
            $BalanceproductCore->LoadForm($in);
            $send['Errors'] = $BalanceproductCore->Check(CORE::FADD);
            $send['LPosts'] = $BalanceproductCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->BalanceproductModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $BalanceproductCore->LoadParams($in);
                  $send['LPosts'] = $BalanceproductCore->Preper(Core::FINDEX);
               }
            }
         }
         $this->BalanceproductView->add($send);
      }

      public function edit($in){
         $send = array();

         $send['LTranslates'] = $this->BalanceproductLang;
         $BalanceproductCore = new BalanceproductCore();
         $BalanceproductCore->LoadParams($in);
         $send['LPosts'] = $BalanceproductCore->Preper(Core::FDISPLAY);

         if(clicked($in, 'btn_edit')){ 
            $BalanceproductCore->LoadForm($in);
            $send['Errors'] = $BalanceproductCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $BalanceproductCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->BalanceproductModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  
               }
            }
         }
         $send = array_merge($send, $this->BalanceproductModel->edit($BalanceproductCore->Preper(Core::FDISPLAY)));

         if(L($send, 'Cells')){
            $send['Cells']['Price'] = $this->Format($send['Cells']['Price']);
            $this->BalanceproductView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceproductLang;
         $BalanceproductCore = new SalequotationCore();
         if(clicked($in, 'btn_remove')){ 
            $BalanceproductCore->LoadForm($in);
            $send['Errors'] = $BalanceproductCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $BalanceproductCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->BalanceproductModel->delete($send['LPosts']));
            }
         }
         $BalanceproductCore->LoadParams($in);
         $send['Errors'] = $BalanceproductCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $BalanceproductCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->BalanceproductModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
               $Cells = $send['Cells'];
               $Cells['Price'] = $this->Format($Cells['Price']);
               $send['Cells'] = $Cells;
            }
            $send['Cells'] = $this->Formats($send['Cells']);
            $this->BalanceproductView->remove($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function dashboard($in){
         $send = array();
         
         $send['LTranslates'] = $this->BalanceproductLang;
         $send['LTranslates'] = array_merge($send['LTranslates'], $this->LayerLang);

         $send = array_merge($send, $this->BalanceproductModel->dashboard(null));

         $send['json'] = $this->Tochart(
            $send['Sales']['Charts'], 
            V($send['LTranslates'], 'Payments'),
            V($send['LTranslates'], 'Sales')
         );

         $this->LayerController->headerdashboard($in);
         $this->BalanceproductView->dashboard($send);
         $this->LayerController->footerdashboard($in);
      }

      public function setting($in){
         $send = array();
         $send['LTranslates'] = $this->BalanceproductLang;
         $BalanceproductCore = new SalequotationCore();
         
         /*if(clicked($in, 'btn_setting')){ 
            $BalanceproductCore->LoadForm($in);
            $send['Errors'] = $BalanceproductCore->Check(CORE::FSETTING);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $BalanceproductCore->Preper(Core::FSETTING);
               $send = array_merge($send, $this->BalanceproductModel->saving($send['LPosts']));
            }
         }*/

         /*$send = array_merge($send, $this->BalanceproductModel->setting(null));
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
				   $Cells = $send['Cells'];
               
               // .. 

               $send['Cells'] = $Cells;
            }
            $this->BalanceproductView->setting($send);
         }else{
            $this->ErrorController->e404($send);
         }*/
         $this->BalanceproductView->setting($send);
      }

   }

