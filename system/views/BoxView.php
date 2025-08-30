<?php
   class BoxView extends View{

      const FOLDER = UI.'box/';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();
         $send = $in;
         $this->render(self::FOLDER.'/'.__FUNCTION__.TMP, $send);
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
