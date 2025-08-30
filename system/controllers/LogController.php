<?php
   class LogController extends Controller{

      private $LogModel;
      private $LogLang;
      private $LogView;

      public function __construct(){
         parent::__construct();
         $this->LogModel = new LogModel();
         $this->LogLang = LogLang::Translate();
         $this->LogView = new LogView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->LogLang;
         $LogCore = new LogCore();
         $LogCore->LoadForm($in);
         $send['LPosts'] = $LogCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->LogModel->index($send['LPosts']));
         if(L($send, 'LLogs')){
            foreach($send['LLogs'] as $KLog => $VLog){
               $send['LLogs'][$KLog] = $VLog;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
         $this->LogView->index($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->LogLang;
         $LogCore = new LogCore();
         $LogCore->LoadParams($in);
         $send['Errors'] = $LogCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $LogCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->LogModel->display($send['LPosts']));
         }
         if(L($send,'Cells')) {
            $Cells = $send['Cells'];
            $send['Cells'] = $Cells;
            $this->LogView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->LogLang;
         $LogCore = new LogCore();
         if(clicked($in, 'btn_add')){ 
            $LogCore->LoadForm($in);
            $send['Errors'] = $LogCore->Check(CORE::FADD);
            $send['LPosts'] = $LogCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->LogModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  //$LogCore->Savefiles();
                  $send['LPosts'] = array();
               }
            }
         }else{
            $send['LPosts'] = array();
         }
         $send = array_merge($send, $this->LogModel->add($in));
         $this->LogView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->LogLang;
         $LogCore = new LogCore();
         $LogCore->LoadParams($in);
         $send['LPosts'] = $LogCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $LogCore->LoadForm($in);
            $send['Errors'] = $LogCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $LogCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->LogModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  //$LogCore->Savefiles();
               }
            }
         }
         $send = array_merge($send, $this->LogModel->edit($LogCore->Preper(Core::FDISPLAY)));
         if(L($send, 'Cells')){
            $Cells = $send['Cells'];
            $this->LogView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->LogLang;
         $LogCore = new LogCore();
         if(clicked($in, 'btn_remove')){ 
            $LogCore->LoadForm($in);
            $send['Errors'] = $LogCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $LogCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->LogModel->delete($send['LPosts']));
            }
         }
         $LogCore->LoadParams($in);
         $send['Errors'] = $LogCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $LogCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->LogModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            $this->LogView->remove($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

   }
