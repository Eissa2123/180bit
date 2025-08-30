<?php
   class CategoryController extends Controller{

      private $CategoryModel;
      private $CategoryLang;
      private $CategoryView;

      public function __construct(){
         parent::__construct();
         $this->CategoryModel = new CategoryModel();
         $this->CategoryLang = CategoryLang::Translate();
         $this->CategoryView = new CategoryView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->CategoryLang;
         $CategoryCore = new CategoryCore();
         $CategoryCore->LoadForm($in);
         $send['LPosts'] = $CategoryCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->CategoryModel->index($send['LPosts']));
         if(L($send, 'LCategorys')){
            foreach($send['LCategorys'] as $KCategory => $VCategory){
               $send['LCategorys'][$KCategory] = $VCategory;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		   $send = array_merge($send, $this->Lengths());
         $this->CategoryView->index($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->CategoryLang;
         $CategoryCore = new CategoryCore();
         $CategoryCore->LoadParams($in);
         $send['Errors'] = $CategoryCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $CategoryCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->CategoryModel->display($send['LPosts']));
         }
         
         if(L($send,'Cells')) {
            $Cells = $send['Cells'];

            if($Cells['Picture'] !== '' and $Cells['Picture'] !== null and file_exists(HPICTURES.$Cells['Picture'])){
               $Cells['Picture'] = WPICTURES.$Cells['Picture'];
            }else{
               $Cells['Picture'] = IMG_DEFAULT;
            }

            $send['Cells'] = $Cells;
            $this->CategoryView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->CategoryLang;
         $CategoryCore = new CategoryCore();
         if(clicked($in, 'btn_add')){ 
            $CategoryCore->LoadForm($in);
            $send['Errors'] = $CategoryCore->Check(CORE::FADD);
            $send['LPosts'] = $CategoryCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->CategoryModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $CategoryCore->Savefiles();
                  $send['LPosts'] = array();
               }
            }
         }else{
            $send['LPosts'] = array();
         }
         $send = array_merge($send, $this->CategoryModel->add($in));
         $this->CategoryView->add($send);
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->CategoryLang;
         $CategoryCore = new CategoryCore();
         $CategoryCore->LoadParams($in);
         $send['LPosts'] = $CategoryCore->Preper(Core::FDISPLAY);
        
         $send = array_merge($send, $this->CategoryModel->edit($CategoryCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->CategoryView->print($send);
        }
        
      public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->CategoryLang;
         $CategoryCore = new CategoryCore();
         $CategoryCore->LoadForm($in);
         $send = array_merge(
           $send, 
           $this->CategoryModel->print($CategoryCore->Preper(Core::FINDEX))
         );
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->CategoryView->prints($send);
      }
      
      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->CategoryLang;
         $CategoryCore = new CategoryCore();
         $CategoryCore->LoadParams($in);
         $send['LPosts'] = $CategoryCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $CategoryCore->LoadForm($in);
            $send['Errors'] = $CategoryCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $CategoryCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->CategoryModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  $CategoryCore->Savefiles();
               }
            }
         }
         $send = array_merge($send, $this->CategoryModel->edit($CategoryCore->Preper(Core::FDISPLAY)));

         if(L($send, 'Cells')){
            $Cells = $send['Cells'];

            if($Cells['Picture'] !== '' and $Cells['Picture'] !== null and file_exists(HPICTURES.$Cells['Picture'])){
               $Cells['Picture'] = WPICTURES.$Cells['Picture'];
            }else{
               $Cells['Picture'] = IMG_DEFAULT;
            }
            $send['Cells'] = $Cells;
            $this->CategoryView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->CategoryLang;
         $CategoryCore = new CategoryCore();
         if(clicked($in, 'btn_remove')){ 
            $CategoryCore->LoadForm($in);
            $send['Errors'] = $CategoryCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $CategoryCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->CategoryModel->delete($send['LPosts']));
            }
         }
         $CategoryCore->LoadParams($in);
         $send['Errors'] = $CategoryCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $CategoryCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->CategoryModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
               $Cells = $send['Cells'];
               if($Cells['Picture'] !== '' and $Cells['Picture'] !== null and file_exists(HPICTURES.$Cells['Picture'])){
                  $Cells['Picture'] = WPICTURES.$Cells['Picture'];
               }else{
                  $Cells['Picture'] = IMG_DEFAULT;
               }
               $send['Cells'] = $Cells;
            }
            $this->CategoryView->remove($send);
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

