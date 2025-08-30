<?php
   class BoxController extends Controller{

      private $BoxModel;
      private $BoxLang;
      private $BoxView;

      public function __construct(){
         parent::__construct();
         $this->BoxModel = new BoxModel();
         $this->BoxLang = BoxLang::Translate();
         $this->BoxView = new BoxView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->BoxLang;
         $BoxCore = new BoxCore();
         $BoxCore->LoadForm($in);
         $send['LPosts'] = $BoxCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->BoxModel->index($send['LPosts']));
         if(L($send, 'LBoxs')){
            array_multisort(array_column($send['LBoxs'], 'AT'), SORT_DESC, $send['LBoxs']);
            
            foreach($send['LBoxs'] as $KBox => $VBox){
               if($VBox['IN'] != ''){
                  $VBox['IN'] = $this->Format($VBox['IN']);
               }
               if($VBox['OUT'] != ''){
                  $VBox['OUT'] = $this->Format($VBox['OUT']);
               }
               $send['LBoxs'][$KBox] = $VBox;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		   $send = array_merge($send, $this->Lengths());
         $this->BoxView->index($send);
      }

      public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->BoxLang;
         $BoxCore = new BoxCore();
         $BoxCore->LoadForm($in);
         $send = array_merge(
           $send, 
           $this->BoxModel->print($BoxCore->Preper(Core::FINDEX))
         );
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->BoxView->prints($send);
      }

   }
