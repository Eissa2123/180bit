<?php
   class DashboardCore {

        private $_Client; 
        private $_SYear;
        private $_EYear;
        private $_SMonth;
        private $_EMonth;

        public function Client($value = null) {
            if($value === null) {
               return $this->_Client;
            }else{
               $this->_Client = htmlspecialchars(trim($value));
            }
         }

      public function SYear($value = null) {
         if($value === null) {
            return $this->_SYear;
         }else{
            $this->_SYear = htmlspecialchars(trim($value));
         }
      }

      public function EYear($value = null) {
         if($value === null) {
            return $this->_EYear;
         }else{
            $this->_EYear = htmlspecialchars(trim($value));
         }
      }

      public function SMonth($value = null) {
         if($value === null) {
            return $this->_SMonth;
         }else{
            $this->_SMonth = htmlspecialchars(trim($value));
         }
      }

      public function EMonth($value = null) {
         if($value === null) {
            return $this->_EMonth;
         }else{
            $this->_EMonth = htmlspecialchars(trim($value));
         }
      }

      public function __construct(){

      }

      public function LoadForm($in){
         $this->Client(P($in,'Client'));
         $this->SYear(P($in,'SYear'));
         $this->EYear(P($in,'EYear'));
         $this->SMonth(P($in,'SMonth'));
         $this->EMonth(P($in,'EMonth'));
      }

      public function ClientCheck(){
        if($this->Client() !== '' and $this->Client() > 0){
            return true;
         }
      }

      public function SYearCheck(){
         if($this->SYear() !== ''){
            return true;
         }
      }

      public function EYearCheck(){
         if($this->EYear() !== ''){
            return true;
         }
      }

      public function SMonthCheck(){
         if($this->SMonth() !== ''){
            return true;
         }
      }

      public function EMonthCheck(){
         if($this->EMonth() !== ''){
            return true;
         }
      }
      
      public function CheckIndex(){
         $send = array();
         if(!$this->ClientCheck()){
            $send['Client'] = false;
         }
         if(!$this->SYearCheck()){
            $send['SYear'] = false;
         }
         if(!$this->EYearCheck()){
            $send['EYear'] = false;
         }
         if(!$this->SMonthCheck()){
            $send['SMonth'] = false;
         }
         if(!$this->EMonthCheck()){
            $send['EMonth'] = false;
         }
         return $send;
      }
      
      public function Check($CheckType){
         $send = array();
            switch($CheckType){
               case Core::FINDEX:
                  $send = $this->CheckIndex();
                  break;
            }
         return $send;
      }

      public function PreperIndex(){
         $send = array();
         $send['Client'] = $this->Client();
         $send['SYear'] = $this->SYear();
         $send['EYear'] = $this->EYear();
         $send['SMonth'] = $this->SMonth();
         $send['EMonth'] = $this->EMonth();
         return $send;
      }
      public function Preper($PreperType){
         $send = array();
            switch($PreperType){
               case Core::FINDEX:
                  $send = $this->PreperIndex();
                  break;
            }
         return $send;
      }

      public function Toarray(){
         $send = array();
         $send['Client'] = $this->Client();
         $send['SYear'] = $this->SYear();
         $send['EYear'] = $this->EYear();
         $send['SMonth'] = $this->SMonth();
         $send['EMonth'] = $this->EMonth();
         return $send;
      }
   }
