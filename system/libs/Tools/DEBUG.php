<?php

    class DEBUG {
            
        public function __construct(){
            
        }
        
        public static function D($datas, $file = null, $line = null){ 
            if($file != null && $line != null){
                var_dump(
                    array(
                        'SRC' => $file.' ['.$line.']',
                        'DTS' => $datas,
                    )
                );
            }else{
                var_dump($datas);
            }
        }
        
    }
    
?>