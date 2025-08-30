<?php
   class ToolView extends View{

      const FOLDER = UI.'tool/';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();
         $send = $in;
         $this->render(self::FOLDER.'/'.__FUNCTION__.TMP, $send);
      }

      public function display($in){
         $send = array();
         $send = $in;
         $this->render(self::FOLDER.'/'.__FUNCTION__.TMP, $send);
      }

      public function add($in){
         $send = array();
         $send = $in;
         $this->render(self::FOLDER.'/'.__FUNCTION__.TMP, $send);
      }

      public function edit($in){
         $send = array();
         $send = $in;
         $this->render(self::FOLDER.'/'.__FUNCTION__.TMP, $send);
      }

      public function remove($in){
         $send = array();
         $send = $in;
         $this->render(self::FOLDER.'/'.__FUNCTION__.TMP, $send);
      }

      public function setting($in){
         $send = array();
         $send = $in;
         $this->render(self::FOLDER.'/'.__FUNCTION__.TMP, $send);
      }

      public function export($in){
         $send = array();
         $send = $in;
         $this->render(self::FOLDER.'/'.__FUNCTION__.TMP, $send);
      }

   }
