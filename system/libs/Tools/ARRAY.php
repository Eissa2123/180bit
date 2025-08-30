<?php

    class ARRAY {
            
        public function __construct(){
            
        }

        public static function in_keys($key,$array){
            if(is_array($array) and count($array) > 0){
                foreach($array as $k => $v){
                    if($k === $key){
                        return true;
                    }
                }
            }
            return false;
        }
        
        public static function I ($value1, $key1, $value2, $key2){
            $inarray = false;
            if(isset($value1[$key1]) and isset($value2[$key2]) and is_array($value2[$key2])){
                $v1 = V($value1, $key1);
                $v2 = V($value2, $key2);
                $inarray = in_array($v1, $v2);
            }
            return $inarray;
        }
        
        public static function K ($value1, $key1, $value2, $value3, $key){
            $value = array();
            if(L($value2, $key)){
                $value = $value2;
            }elseif(L($value3, $key)){
                $value = $value3;
            }
            $inarray = I($value1, $key1, $value, $key);
            return $inarray;
        }
        
        public static function R($datas, $file = null, $line = null){ 
            echo '<pre>';
            if($file != null && $line != null){
                print_r(
                    array(
                        'SRC' => $file.' ['.$line.']',
                        'DTS' => $datas,
                    )
                ); 
            }else{
                print_r($datas);
            }
            echo '</pre>';
        }
        public static function N($in) { 
            return (0); 
        }
        public static function S($in, $key) { 
            return (isset($in[$key]));
        }
        public static function E($in, $key)      {
            if(isset($in['LPosts']) and isset($in['LPosts'][$key])){
                return $in['LPosts'][$key];
            }
            return '';
        }
        public static function A($in) { 
            return (S($in) and !E($in));
        }
        public static function O($in, $key, $state = true){
            if(S($in['AUTO'], $key)){
                $value = $in['AUTO'][$key];
                return $value;
            }
            if($state){
                return array();
            }else{
                return CNF_EMP;
            }
        }
        
    }
    
?>