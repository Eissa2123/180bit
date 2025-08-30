<?php
   class HistoriqueController extends Controller{

      private $HistoriqueModel;
      private $HistoriqueLang;
      private $HistoriqueView;

      public function __construct(){
         parent::__construct();
         $this->HistoriqueModel = new HistoriqueModel();
         $this->HistoriqueLang = HistoriqueLang::Translate();
         $this->HistoriqueView = new HistoriqueView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->HistoriqueLang;
         $HistoriqueCore = new HistoriqueCore();
         $HistoriqueCore->LoadForm($in);
         $send['LPosts'] = $HistoriqueCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->HistoriqueModel->index($send['LPosts']));
         if(L($send, 'LHistoriques')){
            foreach($send['LHistoriques'] as $KHistorique => $VHistorique){
               $send['LHistoriques'][$KHistorique] = $VHistorique;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
         $send = array_merge($send, $this->Lengths());
         $this->HistoriqueView->index($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->HistoriqueLang;
         $HistoriqueCore = new HistoriqueCore();
         $HistoriqueCore->LoadParams($in);
         $send['Errors'] = $HistoriqueCore->Check(Core::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $HistoriqueCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->HistoriqueModel->display($send['LPosts']));
         }
         if(L($send,'Cells')) {
            $Cells = $send['Cells'];
            $send['Cells'] = $Cells;
            $this->HistoriqueView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->HistoriqueLang;
         $HistoriqueCore = new HistoriqueCore();
         $HistoriqueCore->LoadParams($in);
         $send['LPosts'] = $HistoriqueCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $HistoriqueCore->LoadForm($in);
            $send['Errors'] = $HistoriqueCore->Check(Core::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $HistoriqueCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->HistoriqueModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  
               }
            }
         }
         $send = array_merge($send, $this->HistoriqueModel->edit($HistoriqueCore->Preper(Core::FDISPLAY)));
         if(L($send, 'Cells')){
            $Cells = $send['Cells'];

            $this->HistoriqueView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->HistoriqueLang;
         $HistoriqueCore = new HistoriqueCore();
         if(clicked($in, 'btn_remove')){ 
            $HistoriqueCore->LoadForm($in);
            $send['Errors'] = $HistoriqueCore->Check(Core::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $HistoriqueCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->HistoriqueModel->delete($send['LPosts']));
            }
         }
         $HistoriqueCore->LoadParams($in);
         $send['Errors'] = $HistoriqueCore->Check(Core::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $HistoriqueCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->HistoriqueModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            $this->HistoriqueView->remove($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

   }
