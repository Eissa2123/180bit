<?php
   class PurchasequotationController extends Controller{

      private $LayerController;
      private $LayerLang;

      private $PurchasequotationModel;
      private $PurchasequotationLang;
      private $PurchasequotationView;

      public function __construct(){
         parent::__construct();
         
         $this->LayerController = new LayerController();
         $this->LayerLang = LayerLang::Translate();

         $this->PurchasequotationModel = new PurchasequotationModel();
         $this->PurchasequotationLang = PurchasequotationLang::Translate();
         $this->PurchasequotationView = new PurchasequotationView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasequotationLang;
         $PurchasequotationCore = new PurchasequotationCore();
         $PurchasequotationCore->LoadForm($in);
         $send['LPosts'] = $PurchasequotationCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->PurchasequotationModel->index($send['LPosts']));
         if(L($send, 'LPurchasequotations')){
            foreach($send['LPurchasequotations'] as $KPurchasequotation => $VPurchasequotation){

               $VPurchasequotation['TTC'] = $this->Format($VPurchasequotation['TTC']);

               $send['LPurchasequotations'][$KPurchasequotation] = $VPurchasequotation;
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
         $this->PurchasequotationView->index($send);
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasequotationLang;
         $PurchasequotationCore = new PurchasequotationCore();
         $PurchasequotationCore->LoadParams($in);
         $send['LPosts'] = $PurchasequotationCore->Preper(Core::FDISPLAY);
        
         $send = array_merge($send, $this->PurchasequotationModel->edit($PurchasequotationCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           
           $send['Cells'] = $Cells;
         }
         $this->PurchasequotationView->print($send);
      }
        
      public function prints($in){
         $send = array();

      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasequotationLang;
         $PurchasequotationCore = new PurchasequotationCore();
         $PurchasequotationCore->LoadParams($in);
         $send['Errors'] = $PurchasequotationCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $PurchasequotationCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->PurchasequotationModel->display($send['LPosts']));
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
            
            $Cells['HT'] = $this->Format($Cells['HT']);
            $Cells['Tax'] = $this->Format($Cells['Tax']);
            $Cells['TVA'] = $this->Format($Cells['TVA']);
            $Cells['Gift'] = $this->Format($Cells['Gift']);
            $Cells['Reduction'] = $this->Format($Cells['Reduction']);
            $Cells['Expense'] = $this->Format($Cells['Expense']);
            $Cells['TTC'] = $this->Format($Cells['TTC']);

            $send['Cells'] = $Cells;

            $this->PurchasequotationView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasequotationLang;
         $PurchasequotationCore = new PurchasequotationCore();
         $PurchasequotationCore->LoadParams($in);
         $send['LPosts'] = $PurchasequotationCore->Preper(Core::FDISPLAY);
         $send = array_merge($send, $this->PurchasequotationModel->add($send['LPosts']));
         if(clicked($in, 'btn_add')){ 
            $PurchasequotationCore->LoadForm($in);
            $send['Errors'] = $PurchasequotationCore->Check(CORE::FADD);
            $send['LPosts'] = $PurchasequotationCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->PurchasequotationModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $PurchasequotationCore->LoadParams($in);
                  $send['LPosts'] = $PurchasequotationCore->Preper(Core::FINDEX);
               }
            }
         }

         $this->PurchasequotationView->add($send);
      }

      public function edit($in){
         $send = array();

         $send['LTranslates'] = $this->PurchasequotationLang;
         $PurchasequotationCore = new PurchasequotationCore();
         $PurchasequotationCore->LoadParams($in);
         $send['LPosts'] = $PurchasequotationCore->Preper(Core::FDISPLAY);

         if(clicked($in, 'btn_edit')){ 
            $PurchasequotationCore->LoadForm($in);
            $send['Errors'] = $PurchasequotationCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $PurchasequotationCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->PurchasequotationModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  
               }
            }
         }
         $send = array_merge($send, $this->PurchasequotationModel->edit($PurchasequotationCore->Preper(Core::FDISPLAY)));
         if(L($send, 'Cells')){
            $Cells = $send['Cells'];
            
            $this->PurchasequotationView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasequotationLang;
         $PurchasequotationCore = new SalequotationCore();
         if(clicked($in, 'btn_remove')){ 
            $PurchasequotationCore->LoadForm($in);
            $send['Errors'] = $PurchasequotationCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $PurchasequotationCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->PurchasequotationModel->delete($send['LPosts']));
            }
         }
         $PurchasequotationCore->LoadParams($in);
         $send['Errors'] = $PurchasequotationCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $PurchasequotationCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->PurchasequotationModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
               $Cells = $send['Cells'];

               $Cells['Notes'] = nl2br($Cells['Notes']);

               $send['Cells'] = $Cells;
            }
            $this->PurchasequotationView->remove($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function dashboard($in){
         $send = array();
         
         $send['LTranslates'] = $this->PurchasequotationLang;
         $send['LTranslates'] = array_merge($send['LTranslates'], $this->LayerLang);

         $send = array_merge($send, $this->PurchasequotationModel->dashboard(null));

         $send['json'] = $this->Tochart(
            $send['Sales']['Charts'], 
            V($send['LTranslates'], 'Payments'),
            V($send['LTranslates'], 'Sales')
         );

         $this->LayerController->headerdashboard($in);
         $this->PurchasequotationView->dashboard($send);
         $this->LayerController->footerdashboard($in);
      }

      public function setting($in){
         $send = array();
         $send['LTranslates'] = $this->PurchasequotationLang;
         $PurchasequotationCore = new SalequotationCore();
         $this->PurchasequotationView->setting($send);
      }

   }
