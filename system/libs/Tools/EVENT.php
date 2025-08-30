<?php

    class EVENT {
            
        public function __construct(){
            
        }
        
        function clicked($datas, $button){
            if(isset($datas['POSTS'])){
                return isset($datas['POSTS'][$button]);
            }
            return false;
        }
        
    }
    
?>