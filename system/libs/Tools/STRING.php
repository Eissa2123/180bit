<?php

class STRING {
        
    public function __construct(){
        
    }

    public static function endwith($string, $word){
        return (substr($string, -strlen($word)) === $word);
    }
    public static function startwith($string, $word){
        return (substr($string, 0, strlen($word)) === $word); 
    }
    
}

?>