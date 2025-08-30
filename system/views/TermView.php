<?php
   class TermView extends View{

      const FOLDER = UI.'term/';

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

      public function print($in){
         $send = array();
         $send = $in;
         ob_start();
         $this->render(self::FOLDER.'/'.__FUNCTION__.TMP, $send);
         $html = ob_get_contents();
         ob_end_clean();

         $this->output([
            'format' => 'A5',
            'body' => $html
         ]);
      }

      public function prints($in){
         $send = array();
         $send = $in;

         ob_start();
         $this->render(self::FOLDER.'/'.__FUNCTION__.TMP, $send);
         $html = ob_get_contents();
         ob_end_clean();

        $this->output([
           'body' => $html
        ]);
      }

   }
