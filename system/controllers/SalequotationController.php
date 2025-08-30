<?php
   class SalequotationController extends Controller{

      private $LayerController;
      private $LayerLang;

      private $SalequotationModel;
      private $SalequotationLang;
      private $SalequotationView;

      public function __construct(){
         parent::__construct();
         
         $this->LayerController = new LayerController();
         $this->LayerLang = LayerLang::Translate();

         $this->SalequotationModel = new SalequotationModel();
         $this->SalequotationLang = SalequotationLang::Translate();
         $this->SalequotationView = new SalequotationView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->SalequotationLang;
         $SalequotationCore = new SalequotationCore();
         $SalequotationCore->LoadForm($in);
         $send['LPosts'] = $SalequotationCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->SalequotationModel->index($send['LPosts']));
         if(L($send, 'LSales')){
            foreach($send['LSales'] as $KSale => $VSale){

               $VSale['TTC'] = $this->Format($VSale['TTC']);

               $send['LSales'][$KSale] = $VSale;
            }
            foreach($send['TPR'] as $K => $V){
               $V = $this->Format($V);
               $send['TPR'][$K] = $V;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
         
		   $send = array_merge($send, $this->Lengths());
         $this->SalequotationView->index($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->SalequotationLang;
         $SalequotationCore = new SalequotationCore();
         $SalequotationCore->LoadParams($in);
         $send['Errors'] = $SalequotationCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $SalequotationCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->SalequotationModel->display($send['LPosts']));
         }
         if(L($send,'Cells')) {

            $Cells = $send['Cells'];

            if(L($Cells,'Products')){
               foreach($Cells['Products'] as $KCell => $VCell){

                  $VCell['Price'] = $this->Format($VCell['Price']);
                  $VCell['HT'] = $this->Format($VCell['HT']);
                  $VCell['Tax'] = $this->Format($VCell['Tax']);
   
                  $Cells['Products'][$KCell] = $VCell;
               }
            }
            if(L($Cells,'Payments')){
               foreach($Cells['Payments'] as $KCell => $VCell){
                  $VCell['Amount'] = $this->Format($VCell['Amount']);

                  $Cells['Payments'][$KCell] = $VCell;
               }
            }
            
            $Cells['HT'] = $this->Format($Cells['HT']);
            $Cells['Tax'] = $this->Format($Cells['Tax']);
            $Cells['TVA'] = $this->Format($Cells['TVA']);
            $Cells['Gift'] = $this->Format($Cells['Gift']);
            $Cells['Reduction'] = $this->Format($Cells['Reduction']);
            $Cells['Expense'] = $this->Format($Cells['Expense']);
            $Cells['TTC'] = $this->Format($Cells['TTC']);

            $send['Cells'] = $Cells;

            $this->SalequotationView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function print($in){
         $send = array();
         
         $this->SalequotationView->print($send);
      }
        
      public function prints($in){
         $send = array();
         
         $this->SalequotationView->prints($send);
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->SalequotationLang;
         $SalequotationCore = new SalequotationCore();
         $SalequotationCore->LoadParams($in);
         $send['LPosts'] = $SalequotationCore->Preper(Core::FDISPLAY);
         $send = array_merge($send, $this->SalequotationModel->add($send['LPosts']));
         if(clicked($in, 'btn_add')){ 
            $SalequotationCore->LoadForm($in);
            $send['Errors'] = $SalequotationCore->Check(CORE::FADD);
            $send['LPosts'] = $SalequotationCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->SalequotationModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $SalequotationCore->LoadParams($in);
                  $send['LPosts'] = $SalequotationCore->Preper(Core::FINDEX);
               }
            }
         }
         $this->SalequotationView->add($send);
      }

      public function edit($in){
         $send = array();

         $send['LTranslates'] = $this->SalequotationLang;
         $SalequotationCore = new SalequotationCore();
         $SalequotationCore->LoadParams($in);
         $send['LPosts'] = $SalequotationCore->Preper(Core::FDISPLAY);

         if(clicked($in, 'btn_edit')){ 
            $SalequotationCore->LoadForm($in);
            $send['Errors'] = $SalequotationCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $SalequotationCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->SalequotationModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  
               }
            }
         }
         
         $send = array_merge($send, $this->SalequotationModel->edit($SalequotationCore->Preper(Core::FDISPLAY)));
         if(L($send, 'Cells')){
            $Cells = $send['Cells'];
            
            $this->SalequotationView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->SalequotationLang;
         $SalequotationCore = new SalequotationCore();
         if(clicked($in, 'btn_remove')){ 
            $SalequotationCore->LoadForm($in);
            $send['Errors'] = $SalequotationCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $SalequotationCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->SalequotationModel->delete($send['LPosts']));
            }
         }
         $SalequotationCore->LoadParams($in);
         $send['Errors'] = $SalequotationCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $SalequotationCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->SalequotationModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
               $Cells = $send['Cells'];

               $Cells['Notes'] = nl2br($Cells['Notes']);

               $send['Cells'] = $Cells;
            }
            $this->SalequotationView->remove($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function dashboard($in){
         $send = array();
      }

      public function setting($in){
         $send = array();
         $send['LTranslates'] = $this->SalequotationLang;
         $SalequotationCore = new SalequotationCore();
         $this->SalequotationView->setting($send);
      }

   }
