<?php
   class ProductController extends Controller{

      private $ProductModel;
      private $ProductLang;
      private $ProductView;

      public function __construct(){
         parent::__construct();
         $this->ProductModel = new ProductModel();
         $this->ProductLang = ProductLang::Translate();
         $this->ProductView = new ProductView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->ProductLang;
         $ProductCore = new ProductCore();
         $ProductCore->LoadForm($in);
         $send['LPosts'] = $ProductCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->ProductModel->index($send['LPosts']));
         if(L($send, 'LProducts')){
            foreach($send['LProducts'] as $KProduct => $VProduct){
               $send['LProducts'][$KProduct] = $VProduct;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		   $send = array_merge($send, $this->Lengths());
         $this->ProductView->index($send);
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->ProductLang;
         $ProductCore = new ProductCore();
         $ProductCore->LoadParams($in);
         $send['LPosts'] = $ProductCore->Preper(Core::FDISPLAY);
        
         $send = array_merge($send, $this->ProductModel->edit($ProductCore->Preper(Core::FDISPLAY)));
         
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
         $this->ProductView->print($send);
      }
        
      public function prints($in){
         $send = array();
         
         $send['LTranslates'] = $this->ProductLang;
         $ProductCore = new ProductCore();
         $ProductCore->LoadForm($in);
         $ProductCore->LoadParams($in);
         $send['LPosts'] = $ProductCore->Preper(Core::FPRINT);

         $send = array_merge(
            $send, 
            $this->ProductModel->print($send['LPosts'])
         );

         switch($send['LPosts']['ID']) {
            case 1:
               if(L($send, 'LProducts')){
                  foreach($send['LProducts'] as $KProduct => $VProduct){
                     if($VProduct['Picture'] !== '' and $VProduct['Picture'] !== null and file_exists(HPICTURES.$VProduct['Picture'])){
                        $VProduct['Gender'] = $VProduct['Gender']['Name'.LNG];
                        $VProduct['Picture'] = WPICTURES.$VProduct['Picture'];
                     }else{
                        $VProduct['Picture'] = IMG_DEFAULT;
                     }
                     $send['LProducts'][$KProduct] = $VProduct;
                  }
               }
               break;
            case 2:
               if(L($send, 'LProducts')){
                  foreach($send['LProducts'] as $KProduct => $VProduct){
                     if($VProduct['Picture'] !== '' and $VProduct['Picture'] !== null and file_exists(HPICTURES.$VProduct['Picture'])){
                        $VProduct['Gender'] = $VProduct['Gender']['Name'.LNG];
                        $VProduct['Picture'] = WPICTURES.$VProduct['Picture'];
                     }else{
                        $VProduct['Picture'] = IMG_DEFAULT;
                     }
                     $send['LProducts'][$KProduct] = $VProduct;
                  }
               }
               break;
            case 3:
               if(L($send, 'LProducts')){
                  foreach($send['LProducts'] as $KProduct => $VProduct){
                     if($VProduct['Picture'] !== '' and $VProduct['Picture'] !== null and file_exists(HPICTURES.$VProduct['Picture'])){
                        $VProduct['Gender'] = $VProduct['Gender']['Name'.LNG];
                        $VProduct['Picture'] = WPICTURES.$VProduct['Picture'];
                     }else{
                        $VProduct['Picture'] = IMG_DEFAULT;
                     }
                     $send['LProducts'][$KProduct] = $VProduct;
                  }
               }
               break;
            case 4:
               if(L($send, 'LProducts')){
                  foreach($send['LProducts'] as $KProduct => $VProduct){
                     if($VProduct['Picture'] !== '' and $VProduct['Picture'] !== null and file_exists(HPICTURES.$VProduct['Picture'])){
                        $VProduct['Gender'] = $VProduct['Gender']['Name'.LNG];
                        $VProduct['Picture'] = WPICTURES.$VProduct['Picture'];
                     }else{
                        $VProduct['Picture'] = IMG_DEFAULT;
                     }
                     $send['LProducts'][$KProduct] = $VProduct;
                  }
               }
               break;
            case 5:
               if(L($send, 'LProducts')){
                  foreach($send['LProducts'] as $KProduct => $VProduct){
                     if($VProduct['Picture'] !== '' and $VProduct['Picture'] !== null and file_exists(HPICTURES.$VProduct['Picture'])){
                        $VProduct['Gender'] = $VProduct['Gender']['Name'.LNG];
                        $VProduct['Picture'] = WPICTURES.$VProduct['Picture'];
                     }else{
                        $VProduct['Picture'] = IMG_DEFAULT;
                     }
                     $send['LProducts'][$KProduct] = $VProduct;
                  }
               }
               break;
         }

         $this->ProductView->prints($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->ProductLang;
         $ProductCore = new ProductCore();
         $ProductCore->LoadParams($in);
         $send['Errors'] = $ProductCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $ProductCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->ProductModel->display($send['LPosts']));
         }
         
         if(L($send,'Cells')) {
            $Cells = $send['Cells'];

            if($Cells['Picture'] !== '' and $Cells['Picture'] !== null and file_exists(HPICTURES.$Cells['Picture'])){
               $Cells['Picture'] = WPICTURES.$Cells['Picture'];
            }else{
               $Cells['Picture'] = IMG_DEFAULT;
            }

            $send['Cells'] = $Cells;
            $this->ProductView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->ProductLang;
         $ProductCore = new ProductCore();
         if(clicked($in, 'btn_add')){ 
            $ProductCore->LoadForm($in);
            $send['Errors'] = $ProductCore->Check(CORE::FADD);
            $send['LPosts'] = $ProductCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->ProductModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $ProductCore->Savefiles();
                  $send['LPosts'] = array();
               }
            }
         }else{
            $send['LPosts'] = array();
         }

         $send = array_merge($send, $this->ProductModel->add($in));
         $this->ProductView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->ProductLang;
         $ProductCore = new ProductCore();
         $ProductCore->LoadParams($in);
         $send['LPosts'] = $ProductCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $ProductCore->LoadForm($in);
            $send['Errors'] = $ProductCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $ProductCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->ProductModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  $ProductCore->Savefiles();
               }
            }
         }
         $send = array_merge($send, $this->ProductModel->edit($ProductCore->Preper(Core::FDISPLAY)));

         if(L($send, 'Cells')){
            $Cells = $send['Cells'];

            if($Cells['Picture'] !== '' and $Cells['Picture'] !== null and file_exists(HPICTURES.$Cells['Picture'])){
               $Cells['Picture'] = WPICTURES.$Cells['Picture'];
            }else{
               $Cells['Picture'] = IMG_DEFAULT;
            }
            $send['Cells'] = $Cells;
            $this->ProductView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->ProductLang;
         $ProductCore = new ProductCore();
         if(clicked($in, 'btn_remove')){ 
            $ProductCore->LoadForm($in);
            $send['Errors'] = $ProductCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $ProductCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->ProductModel->delete($send['LPosts']));
            }
         }
         $ProductCore->LoadParams($in);
         $send['Errors'] = $ProductCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $ProductCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->ProductModel->remove($send['LPosts']));
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
            $this->ProductView->remove($send);
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
