<?php
   class CustomerController extends Controller{

      private $CustomerModel;
      private $CustomerLang;
      private $LayerLang;
      private $CustomerView;

      public function __construct(){
         parent::__construct();
         
         $this->LayerController = new LayerController();

         $this->CustomerModel = new CustomerModel();
         $this->CustomerLang = CustomerLang::Translate();
         $this->LayerLang = LayerLang::Translate();
         $this->CustomerView = new CustomerView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->CustomerLang;
         $CustomerCore = new CustomerCore();
         $CustomerCore->LoadForm($in);
         $send['LPosts'] = $CustomerCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->CustomerModel->index($send['LPosts']));
         if(L($send, 'LCustomers')){
            foreach($send['LCustomers'] as $KCustomer => $VCustomer){
               $VCustomer['Picture'] = WUPLOADS.$VCustomer['Picture'];
               $send['LCustomers'][$KCustomer] = $VCustomer;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		   $send = array_merge($send, $this->Lengths());
         $this->CustomerView->index($send);
      }
      
      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->CustomerLang;
         $CustomerCore = new CustomerCore();
         $CustomerCore->LoadParams($in);
         $send['LPosts'] = $CustomerCore->Preper(Core::FDISPLAY);
        
         $send = array_merge($send, $this->CustomerModel->edit($CustomerCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           if($Cells['Picture'] !== '' and $Cells['Picture'] !== null and file_exists(HPICTURES.$Cells['Picture'])){
              $Cells['Type'] = $Cells['Type']['Name'.LNG];
              $Cells['Picture'] = WPICTURES.$Cells['Picture'];
           }else{
              $Cells['Picture'] = IMG_DEFAULT;
           }
           $send['Cells'] = $Cells;
         }
         $this->CustomerView->print($send);
      }
        
      public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->CustomerLang;
         $CustomerCore = new CustomerCore();
         $CustomerCore->LoadForm($in);
         $send = array_merge(
           $send, 
           $this->CustomerModel->print($CustomerCore->Preper(Core::FINDEX))
         );
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           if($Cells['Picture'] !== '' and $Cells['Picture'] !== null and file_exists(HPICTURES.$Cells['Picture'])){
              $Cells['Gender'] = $Cells['Gender']['Name'.LNG];
              $Cells['Picture'] = WPICTURES.$Cells['Picture'];
           }else{
              $Cells['Picture'] = IMG_DEFAULT;
           }
           $send['Cells'] = $Cells;
         }
         $this->CustomerView->prints($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->CustomerLang;
         $CustomerCore = new CustomerCore();
         $CustomerCore->LoadParams($in);
         $send['Errors'] = $CustomerCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $CustomerCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->CustomerModel->display($send['LPosts']));
         }
		   if(L($send,'Cells')) {
            $Cells = $send['Cells'];
            if($Cells['Picture'] !== null and $Cells['Picture'] !== '' and file_exists(HPICTURES.$Cells['Picture'])){
               $Cells['Picture'] = WPICTURES.$Cells['Picture'];
            }else{
               $Cells['Picture'] = IMG_DEFAULT;
            }
            $send['Cells'] = $Cells;
            $this->CustomerView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->CustomerLang;
         $CustomerCore = new CustomerCore();
         if(clicked($in, 'btn_add')){ 
            $CustomerCore->LoadForm($in);
            $send['Errors'] = $CustomerCore->Check(CORE::FADD);
            $send['LPosts'] = $CustomerCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->CustomerModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $CustomerCore->Savefiles();
                  $send['LPosts'] = array();
               }
            }
         }else{
            $send['LPosts'] = array();
         }
         $send = array_merge($send, $this->CustomerModel->add($in));
         $this->CustomerView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->CustomerLang;
         $CustomerCore = new CustomerCore();
         $CustomerCore->LoadParams($in);
         $send['LPosts'] = $CustomerCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $CustomerCore->LoadForm($in);
            $send['Errors'] = $CustomerCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $CustomerCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->CustomerModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  $CustomerCore->Savefiles();
               }
            }
         }
         $send = array_merge($send, $this->CustomerModel->edit($CustomerCore->Preper(Core::FDISPLAY)));
         if(L($send, 'Cells')){
            $Cells = $send['Cells'];

            if($Cells['Picture'] !== null and $Cells['Picture'] !== '' and file_exists(HPICTURES.$Cells['Picture'])){
               $Cells['Picture'] = WPICTURES.$Cells['Picture'];
            }else{
               $Cells['Picture'] = IMG_DEFAULT;
            }
            
            $send['Cells'] = $Cells;
            $this->CustomerView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->CustomerLang;
         $CustomerCore = new CustomerCore();
         if(clicked($in, 'btn_remove')){ 
            $CustomerCore->LoadForm($in);
            $send['Errors'] = $CustomerCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $CustomerCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->CustomerModel->delete($send['LPosts']));
            }
         }
         $CustomerCore->LoadParams($in);
         $send['Errors'] = $CustomerCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $CustomerCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->CustomerModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
               $Cells = $send['Cells'];
               if($Cells['Picture'] !== null and $Cells['Picture'] !== '' and file_exists(HPICTURES.$Cells['Picture'])){
                  $Cells['Picture'] = WPICTURES.$Cells['Picture'];
               }else{
                  $Cells['Picture'] = IMG_DEFAULT;
               }
               $send['Cells'] = $Cells;
            }
            $this->CustomerView->remove($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function dashboard($in){
         $send = array();
         
         $send['LTranslates'] = $this->CustomerLang;
         $send['LTranslates'] = array_merge($send['LTranslates'], $this->LayerLang);

         $send = array_merge($send, $this->CustomerModel->dashboard(null));
         
         $send['json'] = $this->Tochart(
            $send['Customers']['Charts'], 
            V($send['LTranslates'], 'Payments'),
            V($send['LTranslates'], 'Invoices')
         );

         $this->LayerController->headerdashboard($in);
         $this->CustomerView->dashboard($send);
         $this->LayerController->footerdashboard($in);
      }

      public function setting($in){
         $send = array();
         $send['LTranslates'] = $this->CustomerLang;
         $CustomerCore = new CustomerCore();
         
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
         $this->CustomerView->setting($send);
      }

   }
