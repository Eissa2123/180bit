<?php
   class PurchaseController extends Controller{

      private $LayerController;
      private $LayerLang;

      private $PurchaseModel;
      private $PurchaseLang;
      private $PurchaseView;

      public function __construct(){
         parent::__construct();
         
         $this->LayerController = new LayerController();
         $this->LayerLang = LayerLang::Translate();

         $this->PurchaseModel = new PurchaseModel();
         $this->PurchaseLang = PurchaseLang::Translate();
         $this->PurchaseView = new PurchaseView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->PurchaseLang;
         $PurchaseCore = new PurchaseCore();
         $PurchaseCore->LoadForm($in);
         $send['LPosts'] = $PurchaseCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->PurchaseModel->index($send['LPosts']));
         if(L($send, 'LPurchases')){
            foreach($send['LPurchases'] as $KPurchase => $VPurchase){
               $VPurchase['TTC'] = $this->Format($VPurchase['TTC']);
               $VPurchase['Paid'] = $this->Format($VPurchase['Paid']);
               $VPurchase['Return'] = $this->Format($VPurchase['Return']);
               $VPurchase['Rest'] = $this->Format($VPurchase['Rest']);

               $send['LPurchases'][$KPurchase] = $VPurchase;
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
         $this->PurchaseView->index($send);
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->PurchaseLang;
         $PurchaseCore = new PurchaseCore();
         $PurchaseCore->LoadParams($in);
         $send['LPosts'] = $PurchaseCore->Preper(Core::FDISPLAY);
        
         $send = array_merge($send, $this->PurchaseModel->edit($PurchaseCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           
           $send['Cells'] = $Cells;
         }
         $this->PurchaseView->print($send);
      }
        
      public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->PurchaseLang;
         $PurchaseCore = new PurchaseCore();
         
         $PurchaseCore->LoadForm($in);
         $PurchaseCore->LoadParams($in);
         $send['LPosts'] = $PurchaseCore->Preper(Core::FPRINT);

         $send = array_merge(
            $send, 
            $this->PurchaseModel->print($send['LPosts'])
         );
         switch($send['LPosts']['ID']) {
            case 1:
               if(L($send, 'LPurchases')){
                  foreach($send['LPurchases'] as $KPurchase => $VPurchase){
                     $VPurchase['TTC'] = $this->Format($VPurchase['TTC']);
                     $send['LPurchases'][$KPurchase] = $VPurchase;
                  }
                  $send['TTCs'] = $this->Format($send['TTCs']);
               }
               break;
            case 2:
               if(L($send, 'LPurchases')){
                  foreach($send['LPurchases'] as $KPurchase => $VPurchase){
                     
                     $send['LPurchases'][$KPurchase] = $VPurchase;
                  }
               }
               break;
            case 3:
               if(L($send, 'LProviders')){
                  foreach($send['LProviders'] as $KProvider => $VProvider){
                     $VProvider['TTC'] = $this->Format($VProvider['TTC']);
                     $VProvider['Return'] = $this->Format($VProvider['Return']);
                     $VProvider['Payement'] = $this->Format($VProvider['Payement']);
                     $VProvider['Deptor'] = $this->Format($VProvider['Deptor']);
                     $send['LProviders'][$KProvider] = $VProvider;
                  }
                  
                  $send['TTCs'] = $this->Format($send['TTCs']);
                  $send['Returns'] = $this->Format($send['Returns']);
                  $send['Payements'] = $this->Format($send['Payements']);
                  $send['Deptors'] = $this->Format($send['Deptors']);
               }
               break;
         }

         $this->PurchaseView->prints($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->PurchaseLang;
         $PurchaseCore = new PurchaseCore();
         $PurchaseCore->LoadParams($in);
         $send['Errors'] = $PurchaseCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $PurchaseCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->PurchaseModel->display($send['LPosts']));
         }
         if(L($send,'Cells')) {
            $send['Cells'] = $this->Formats($send['Cells']);
            $this->PurchaseView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->PurchaseLang;
         $PurchaseCore = new PurchaseCore();
         $PurchaseCore->LoadParams($in);
         $send['LPosts'] = $PurchaseCore->Preper(Core::FDISPLAY);
         $send = array_merge($send, $this->PurchaseModel->add($send['LPosts']));
         if(clicked($in, 'btn_add')){ 
            $PurchaseCore->LoadForm($in);
            $send['Errors'] = $PurchaseCore->Check(CORE::FADD);
            $send['LPosts'] = $PurchaseCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->PurchaseModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $PurchaseCore->LoadParams($in);
                  $send['LPosts'] = $PurchaseCore->Preper(Core::FINDEX);
               }
            }
         }

         $this->PurchaseView->add($send);
      }

      public function edit($in){
         $send = array();

         $send['LTranslates'] = $this->PurchaseLang;
         $PurchaseCore = new PurchaseCore();
         $PurchaseCore->LoadParams($in);
         $send['LPosts'] = $PurchaseCore->Preper(Core::FDISPLAY);

         if(clicked($in, 'btn_edit')){ 
            $PurchaseCore->LoadForm($in);
            $send['Errors'] = $PurchaseCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $PurchaseCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->PurchaseModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  
               }
            }
         }
         $send = array_merge($send, $this->PurchaseModel->edit($PurchaseCore->Preper(Core::FDISPLAY)));
         if(L($send, 'Cells')){
            $Cells = $send['Cells'];
            
            $this->PurchaseView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->PurchaseLang;
         $PurchaseCore = new SalequotationCore();
         if(clicked($in, 'btn_remove')){ 
            $PurchaseCore->LoadForm($in);
            $send['Errors'] = $PurchaseCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $PurchaseCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->PurchaseModel->delete($send['LPosts']));
            }
         }
         $PurchaseCore->LoadParams($in);
         $send['Errors'] = $PurchaseCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $PurchaseCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->PurchaseModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
               $Cells = $send['Cells'];
               $Cells['Notes'] = nl2br($Cells['Notes']);
               $send['Cells'] = $Cells;
            }
            $send['Cells'] = $this->Formats($send['Cells']);
            $this->PurchaseView->remove($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function dashboard($in){
         $send = array();
         
         $send['LTranslates'] = $this->PurchaseLang;
         $send['LTranslates'] = array_merge($send['LTranslates'], $this->LayerLang);

         $send = array_merge($send, $this->PurchaseModel->dashboard(null));

         $send['json'] = $this->Tochart(
            $send['Sales']['Charts'], 
            V($send['LTranslates'], 'Payments'),
            V($send['LTranslates'], 'Sales')
         );

         $this->LayerController->headerdashboard($in);
         $this->PurchaseView->dashboard($send);
         $this->LayerController->footerdashboard($in);
      }

      public function setting($in){
         $send = array();
         $send['LTranslates'] = $this->PurchaseLang;
         $PurchaseCore = new SalequotationCore();
         
         /*if(clicked($in, 'btn_setting')){ 
            $PurchaseCore->LoadForm($in);
            $send['Errors'] = $PurchaseCore->Check(CORE::FSETTING);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $PurchaseCore->Preper(Core::FSETTING);
               $send = array_merge($send, $this->PurchaseModel->saving($send['LPosts']));
            }
         }*/

         /*$send = array_merge($send, $this->PurchaseModel->setting(null));
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
				   $Cells = $send['Cells'];
               
               // .. 

               $send['Cells'] = $Cells;
            }
            $this->PurchaseView->setting($send);
         }else{
            $this->ErrorController->e404($send);
         }*/
         $this->PurchaseView->setting($send);
      }

   }
