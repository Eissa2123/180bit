<?php
   class CobonController extends Controller{

      private $CobonModel;
      private $CobonLang;
      private $CobonView;

      public function __construct(){
         parent::__construct();
         $this->CobonModel = new CobonModel();
         $this->CobonLang = CobonLang::Translate();
         $this->CobonView = new CobonView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->CobonLang;
         $CobonCore = new CobonCore();
         $CobonCore->LoadForm($in);
         $send['LPosts'] = $CobonCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->CobonModel->index($send['LPosts']));
         if(L($send, 'LCobons')){
            foreach($send['LCobons'] as $KCobon => $VCobon){
               $send['LCobons'][$KCobon] = $VCobon;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		   $send = array_merge($send, $this->Lengths());
         $this->CobonView->index($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->CobonLang;
         $CobonCore = new CobonCore();
         $CobonCore->LoadParams($in);
         $send['Errors'] = $CobonCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $CobonCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->CobonModel->display($send['LPosts']));
         }
         
         if(L($send,'Cells')) {
            $Cells = $send['Cells'];

            $send['Cells'] = $Cells;
            $this->CobonView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->CobonLang;
         $CobonCore = new CobonCore();
         $CobonCore->LoadParams($in);
         $send['LPosts'] = $CobonCore->Preper(Core::FDISPLAY);
        
         $send = array_merge($send, $this->CobonModel->edit($CobonCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->CobonView->print($send);
        }
        
      public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->CobonLang;
         $CobonCore = new CobonCore();
         $CobonCore->LoadForm($in);
         $send = array_merge(
           $send, 
           $this->CobonModel->print($CobonCore->Preper(Core::FINDEX))
         );
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->CobonView->prints($send);
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->CobonLang;
         $CobonCore = new CobonCore();
         if(clicked($in, 'btn_add')){ 
            $CobonCore->LoadForm($in);
            $send['Errors'] = $CobonCore->Check(CORE::FADD);
            $send['LPosts'] = $CobonCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->CobonModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $send['LPosts'] = array();
               }
            }
         }else{
            $send['LPosts'] = array();
         }
         $send = array_merge($send, $this->CobonModel->add($in));
         $this->CobonView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->CobonLang;
         $CobonCore = new CobonCore();
         $CobonCore->LoadParams($in);
         $send['LPosts'] = $CobonCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $CobonCore->LoadForm($in);
            $send['Errors'] = $CobonCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $CobonCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->CobonModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  
               }
            }
         }
         $send = array_merge($send, $this->CobonModel->edit($CobonCore->Preper(Core::FDISPLAY)));

         if(L($send, 'Cells')){
            $Cells = $send['Cells'];

            $send['Cells'] = $Cells;
            $this->CobonView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->CobonLang;
         $CobonCore = new CobonCore();
         if(clicked($in, 'btn_remove')){ 
            $CobonCore->LoadForm($in);
            $send['Errors'] = $CobonCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $CobonCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->CobonModel->delete($send['LPosts']));
            }
         }
         $CobonCore->LoadParams($in);
         $send['Errors'] = $CobonCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $CobonCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->CobonModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
               $Cells = $send['Cells'];
               
               $send['Cells'] = $Cells;
            }
            $this->CobonView->remove($send);
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
?>
