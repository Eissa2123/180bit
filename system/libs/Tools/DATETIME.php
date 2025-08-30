<?php

class DATETIME {
        
    public function __construct(){
        
    }

    public static function IsDate($date){
        return (date('Y-m-d', strtotime($date)) == $date) or (date('Y/m/d', strtotime($date)) == $date);
    }
    public static function IsTime($time){
		return preg_match("#([0-1]{1}[0-9]{1}|[2]{1}[0-3]{1}):[0-5]{1}[0-9]{1}#", $time);
    }
	public static function TimeFormat($time){
		if(istime($time)){
			return str_replace(':', 'h', date('h:m', strtotime($time)));
		}
		return CNF_EMP;
	}
	public static function dateformat($date){
		if(isdate($date)){
			return $date;
		}
		return CNF_EMP;
	}

}

?>