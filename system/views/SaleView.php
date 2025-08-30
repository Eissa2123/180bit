<?php
   class SaleView extends View{

      const FOLDER = UI.'sale/';

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

         //echo '<pre>';
         //D($in['Cells']);
         //echo '</pre>';

         $this->output([
            'format' => 'A4',
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

         $options = [
            'body' => $html, 
            'rtl' => false
         ];

         if(isset($in['Orientation']) && $in['Orientation'] == 'L'){
            $options['orientation'] = 'L';
         }

         if(isset($in['rtl']) && $in['rtl']){
            $options['rtl'] = true;
         }

         $this->output($options);
      }

      public function dashboard($in){
         $send = array();
         $send = $in;
         $this->render(self::FOLDER.'/'.__FUNCTION__.TMP, $send);
      }

      public function setting($in){
         $send = array();
         $send = $in;
         $this->render(self::FOLDER.'/'.__FUNCTION__.TMP, $send);
      }

   }
