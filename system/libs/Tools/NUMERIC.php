<?php

class NUMERIC {
        
    public function __construct(){
        
    }

    public static function Format($Datas, $format = NBR_FORMAT){
        $Datas = '0' + $Datas;
        $Datas = round((double) $Datas, NBR_FORMAT);
        $Datas = explode('.', $Datas);

        if(count($Datas) == 1){
            $Datas[1] = '';
        }
        while(strlen($Datas[1]) < NBR_FORMAT){
            $Datas[1] .= '0';
        }
        if(NBR_FORMAT == 0){
            $Datas = $Datas[0];
        }else{
            $Datas = implode('.', $Datas);
        }

        return $Datas;
    }
    
}

?>