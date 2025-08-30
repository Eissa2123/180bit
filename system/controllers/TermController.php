<?php
   class TermController extends Controller{

      private $TermModel;
      private $TermLang;
      private $TermView;

      public function __construct(){
         parent::__construct();
         $this->TermModel = new TermModel();
         $this->TermLang = TermLang::Translate();
         $this->TermView = new TermView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->TermLang;
         $TermCore = new TermCore();
         $TermCore->LoadForm($in);
         $send['LPosts'] = $TermCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->TermModel->index($send['LPosts']));
         if(L($send, 'LTerms')){
            foreach($send['LTerms'] as $KTerm => $VTerm){
               $send['LTerms'][$KTerm] = $VTerm;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		   $send = array_merge($send, $this->Lengths());
         $this->TermView->index($send);
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->TermLang;
         $TermCore = new TermCore();
         $TermCore->LoadParams($in);
         $send['LPosts'] = $TermCore->Preper(Core::FDISPLAY);
        
         $send = array_merge($send, $this->TermModel->edit($TermCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];

           $send['Cells'] = $Cells;
         }
         $this->TermView->print($send);
        }
        
        public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->TermLang;
         $TermCore = new TermCore();
         $TermCore->LoadForm($in);
         $send = array_merge(
           $send, 
           $this->TermModel->print($TermCore->Preper(Core::FINDEX))
         );
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->TermView->prints($send);
        }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->TermLang;
         $TermCore = new TermCore();
         $TermCore->LoadParams($in);
         $send['Errors'] = $TermCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $TermCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->TermModel->display($send['LPosts']));
         }
         
         if(L($send,'Cells')) {
            $Cells = $send['Cells'];

            $send['Cells'] = $Cells;
            $this->TermView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->TermLang;
         $TermCore = new TermCore();
         if(clicked($in, 'btn_add')){ 
            $TermCore->LoadForm($in);
            $send['Errors'] = $TermCore->Check(CORE::FADD);
            $send['LPosts'] = $TermCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->TermModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $send['LPosts'] = array();
               }
            }
         }else{
            $send['LPosts'] = array();
         }
         $send = array_merge($send, $this->TermModel->add($in));
         $this->TermView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->TermLang;
         $TermCore = new TermCore();
         $TermCore->LoadParams($in);
         $send['LPosts'] = $TermCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $TermCore->LoadForm($in);
            $send['Errors'] = $TermCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $TermCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->TermModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  
               }
            }
         }
         $send = array_merge($send, $this->TermModel->edit($TermCore->Preper(Core::FDISPLAY)));

         if(L($send, 'Cells')){
            $Cells = $send['Cells'];

            $send['Cells'] = $Cells;
            $this->TermView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->TermLang;
         $TermCore = new TermCore();
         if(clicked($in, 'btn_remove')){ 
            $TermCore->LoadForm($in);
            $send['Errors'] = $TermCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $TermCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->TermModel->delete($send['LPosts']));
            }
         }
         $TermCore->LoadParams($in);
         $send['Errors'] = $TermCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $TermCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->TermModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
               $Cells = $send['Cells'];
               
               $send['Cells'] = $Cells;
            }
            $this->TermView->remove($send);
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

