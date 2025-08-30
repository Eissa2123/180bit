<?php
   class StateView extends View{

      const FOLDER = UI.'state/';

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

   }
