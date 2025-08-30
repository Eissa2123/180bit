<?php
   class StateController extends Controller{

      private $StateModel;
      private $StateLang;
      private $StateView;

      public function __construct(){
         parent::__construct();
         $this->StateModel = new StateModel();
         $this->StateLang = StateLang::Translate();
         $this->StateView = new StateView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->StateLang;
         $StateCore = new StateCore();
         $StateCore->LoadForm($in);
         $send['LPosts'] = $StateCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->StateModel->index($send['LPosts']));
         if(L($send, 'LStates')){
            foreach($send['LStates'] as $KState => $VState){
               $send['LStates'][$KState] = $VState;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		 $send = array_merge($send, $this->Lengths());
         $this->StateView->index($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->StateLang;
         $StateCore = new StateCore();
         $StateCore->LoadParams($in);
         $send['Errors'] = $StateCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $StateCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->StateModel->display($send['LPosts']));
         }
         if(L($send,'Cells')) {
            $Cells = $send['Cells'];
            $send['Cells'] = $Cells;
            $this->StateView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->StateLang;
         $StateCore = new StateCore();
         if(clicked($in, 'btn_add')){ 
            $StateCore->LoadForm($in);
            $send['Errors'] = $StateCore->Check(CORE::FADD);
            $send['LPosts'] = $StateCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->StateModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  //$StateCore->Savefiles();
               }
            }
         }
         $send = array_merge($send, $this->StateModel->add($in));
         if(L($send,'Cells')){
            $this->StateView->add($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->StateLang;
         $StateCore = new StateCore();
         $StateCore->LoadParams($in);
         $send['LPosts'] = $BankCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $StateCore->LoadForm($in);
            $send['Errors'] = $StateCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $StateCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->StateModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  //$StateCore->Savefiles();
               }
            }
         }
         $send = array_merge($send, $this->StateModel->edit($StateCore->Preper(Core::FDISPLAY)));
         if(L($send, 'Cells')){
            $this->StateView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->StateLang;
         $StateCore = new StateCore();
         if(clicked($in, 'btn_remove')){ 
            $StateCore->LoadForm($in);
            $send['Errors'] = $StateCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $StateCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->StateModel->delete($send['LPosts']));
            }
         }
         $StateCore->LoadParams($in);
         $send['Errors'] = $StateCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $StateCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->StateModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            $this->StateView->remove($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

   }
