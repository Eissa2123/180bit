<?php
   class ToolController extends Controller{

      private $ToolModel;
      private $ToolLang;
      private $ToolView;

      public function __construct(){
         parent::__construct();
         $this->ToolModel = new ToolModel();
         $this->ToolLang = ToolLang::Translate();
         $this->ToolView = new ToolView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->ToolLang;
         $send = array_merge($send, $this->ToolModel->index(null));
         $send['Cells']['Server'] = DB_HOST;
         $send['Cells']['DBName'] = DB_NAME;
         $send['Cells']['Appname'] = APP;
         $this->ToolView->index($send);
      }

      public function export($in){
         $send = array();
         $send['LTranslates'] = $this->ToolLang;
         $send = array_merge($send, $this->ToolModel->export(null));

			$filename = DB_NAME.'_'.date('Y-m-d_H.i.s').SQL;
			$fullname = BACKUPS.$filename;

         Createfile($fullname, $send['Output']);
         Downloadfile($filename, $fullname, SQL);
      }

      public function backup($in){
         $send = array();

			$filename = BACKUP.'_'.APP.'_'.date('Y-m-d_H.i.s').ZIP;
			$fullname = BACKUPS.$filename;

         Createzip($fullname);
         Downloadfile($filename, $fullname, ZIP);
         
      }

      public function uploaded($in){
         /*$send = array();

			$filename = APP.'_'.PICTURE.'_'.date('Y-m-d_H.i.s').ZIP;
			$fullname = BACKUPS.$filename;

         Createzips($fullname, HPICTURES);
         Downloadfile($filename, $fullname, ZIP);*/
         
      }

      public function clear(){
         DeleteFolder(BACKUPS);
         DeleteFolder(HTEMPS);
         redirection(TOOL_PAGE);
      }


   }
