<?php
   class SalereturnController extends Controller{

      private $LayerController;

      private $SalereturnModel;
      private $SalereturnLang;
      private $SalereturnView;

      public function __construct(){
         parent::__construct();
         
         $this->LayerController = new LayerController();

         $this->SalereturnModel = new SalereturnModel();
         $this->SalereturnLang = SalereturnLang::Translate();
         $this->SalereturnView = new SalereturnView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->SalereturnLang;
         $SalereturnCore = new SalereturnCore();
         $SalereturnCore->LoadParams($in);
         $send['LPosts'] = $SalereturnCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->SalereturnModel->index($send['LPosts']));
         if(L($send, 'LSalereturns')){
            foreach($send['LSalereturns'] as $KSalereturn => $VSalereturn){
               $VSalereturn['TTC'] = $this->Format($VSalereturn['TTC']);
               $send['LSalereturns'][$KSalereturn] = $VSalereturn;
            }
            $send['TPR'] = $this->Formats($send['TPR']);
         }
		   $send = array_merge($send, $this->Lengths());
         $this->SalereturnView->index($send);
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->SalereturnLang;
         $SalereturnCore = new SalereturnCore();
         $SalereturnCore->LoadParams($in);
         $send['LPosts'] = $SalereturnCore->Preper(Core::FDISPLAY);
        
         $send = array_merge($send, $this->SalereturnModel->edit($SalereturnCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->SalereturnView->print($send);
        }
      
      public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->SalereturnLang;
         $SalereturnCore = new SalereturnCore();
         $SalereturnCore->LoadForm($in);
         $send = array_merge(
           $send, 
           $this->SalereturnModel->print($SalereturnCore->Preper(Core::FINDEX))
         );
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->SalereturnView->prints($send);
        }

      
      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->SalereturnLang;
         $SalereturnCore = new SalereturnCore();
         $SalereturnCore->LoadParams($in);
         $send['Errors'] = $SalereturnCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $SalereturnCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->SalereturnModel->display($send['LPosts']));
         }
         if(L($send,'Cells')) {
            $send['Cells'] = $this->Formats($send['Cells']);
            $this->SalereturnView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->SalereturnLang;
         $SalereturnCore = new SalereturnCore();
         $SalereturnCore->LoadParams($in);
         $send['LPosts'] = $SalereturnCore->Preper(Core::FINDEX);
         if(clicked($in, 'btn_add')){ 
            $SalereturnCore->LoadForm($in);
            $send['Errors'] = $SalereturnCore->Check(CORE::FADD);
            $send['LPosts'] = $SalereturnCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->SalereturnModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $SalereturnCore->LoadParams($in);
                  $send['LPosts'] = $SalereturnCore->Preper(Core::FINDEX);
               }
            }
         }
         $send = array_merge($send, $this->SalereturnModel->add($send['LPosts']));

         if(L($send['Cells'], 'Products')){
            $Products = $send['Cells']['Products'];
            foreach($Products as $KProduct => $VProduct){
               $VProduct['Price'] = $this->Format($VProduct['Price']);
               $VProduct['HT'] = $this->Format($VProduct['HT']);
               $Products[$KProduct] = $VProduct;
            }
            $send['Cells']['Products'] = $Products;

            $send['Cells']['TVA'] = $this->Format($send['Cells']['TVA']);
            $send['Cells']['Tax'] = $this->Format($send['Cells']['Tax']);
            $send['Cells']['Cobon'] = $this->Format($send['Cells']['Cobon']);
            $send['Cells']['Gift'] = $this->Format($send['Cells']['Gift']);
            $send['Cells']['Reduction'] = $this->Format($send['Cells']['Reduction']);
            $send['Cells']['Expense'] = $this->Format($send['Cells']['Expense']);
            $send['Cells']['HT'] = $this->Format($send['Cells']['HT']);
            $send['Cells']['TTC'] = $this->Format($send['Cells']['TTC']);
         }
         
         $this->SalereturnView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->SalereturnLang;
         $SalereturnCore = new SalereturnCore();
         $SalereturnCore->LoadParams($in);
         $send['LPosts'] = $SalereturnCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $SalereturnCore->LoadForm($in);
            $send['Errors'] = $SalereturnCore->Check(CORE::FEDIT);
            $send['LPosts'] = $SalereturnCore->Preper(Core::FEDIT);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->SalereturnModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  
               }
            }
         }
         $send = array_merge($send, $this->SalereturnModel->edit($send['LPosts']));
         if(L($send, 'Cells')){
            $this->SalereturnView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->SalereturnLang;
         $SalereturnCore = new SalereturnCore();
         if(clicked($in, 'btn_remove')){ 
            $SalereturnCore->LoadForm($in);
            $send['Errors'] = $SalereturnCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $SalereturnCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->SalereturnModel->delete($send['LPosts']));
            }
         }
         $SalereturnCore->LoadParams($in);
         $send['Errors'] = $SalereturnCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $SalereturnCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->SalereturnModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
			   if(L($send, 'Cells')){
               $send['Cells'] = $this->Formats($send['Cells']);
			   }
            $this->SalereturnView->remove($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function dashboard($in){
         $send = array();
         
         $send['LTranslates'] = $this->SalereturnLang;
         $send = array_merge($send, $this->SalereturnModel->dashboard(null));
         
         $this->LayerController->headerdashboard($in);
         $this->SalereturnView->dashboard($send);
         $this->LayerController->footerdashboard($in);
      }

      public function setting($in){
         $send = array();
         $send['LTranslates'] = $this->SalereturnLang;
         $SalereturnCore = new SalereturnCore();
         
         /*if(clicked($in, 'btn_setting')){ 
            $SalereturnCore->LoadForm($in);
            $send['Errors'] = $SalereturnCore->Check(CORE::FSETTING);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $SalereturnCore->Preper(Core::FSETTING);
               $send = array_merge($send, $this->SalereturnModel->saving($send['LPosts']));
            }
         }*/

         /*$send = array_merge($send, $this->SalereturnModel->setting(null));
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
				   $Cells = $send['Cells'];
               
               // .. 

               $send['Cells'] = $Cells;
            }
            $this->SalereturnView->setting($send);
         }else{
            $this->ErrorController->e404($send);
         }*/
         $this->SalereturnView->setting($send);
      }

   }
