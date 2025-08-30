<?php
   class ReportController extends Controller{

      private $ReportModel;
      private $ReportLang;
      private $ReportView;

      public function __construct(){
         parent::__construct();
         $this->ReportModel = new ReportModel();
         $this->ReportLang = ReportLang::Translate();
         $this->ReportView = new ReportView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->ReportLang;
         $send = array_merge($send, $this->ReportModel->index(null));
         if(L($send, 'LReports')){
            foreach($send['LReports'] as $KReport => $VReport){
               $send['LReports'][$KReport] = $VReport;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		 $send = array_merge($send, $this->Lengths());
         $this->ReportView->index($send);
      }

   }

