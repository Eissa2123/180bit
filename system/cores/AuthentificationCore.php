<?php
   class AuthentificationCore extends Core{

      //private $_Token;
      private $_Username;
      private $_Password;
      private $_OPassword;
      private $_NPassword;
      private $_Confirm;

      public function Token($value = null) {
         if($value === null) {
            return $this->_Token;
         }else{
            $this->_Token = htmlspecialchars(trim($value));
         }
      }

      public function Username($value = null) {
         if($value === null) {
            return $this->_Username;
         }else{
            $this->_Username = htmlspecialchars(trim($value));
         }
      }
      public function Password($value = null) {
         if($value === null) {
            return $this->_Password;
         }else{
            $this->_Password = htmlspecialchars(trim($value));
         }
      }
      public function OPassword($value = null) {
         if($value === null) {
            return $this->_OPassword;
         }else{
            $this->_OPassword = htmlspecialchars(trim($value));
         }
      }
      public function NPassword($value = null) {
         if($value === null) {
            return $this->_NPassword;
         }else{
            $this->_NPassword = htmlspecialchars(trim($value));
         }
      }
      public function Confirm($value = null) {
         if($value === null) {
            return $this->_Confirm;
         }else{
            $this->_Confirm = htmlspecialchars(trim($value));
         }
      }

      public function __construct(){
         parent::__construct();
      }

      public function LoadForm($in){
         parent::LoadForm($in);
         $this->Token($this->ID());
         $this->Username(P($in,'Username'));
         $this->Password(P($in,'Password'));
         $this->OPassword(P($in,'OPassword'));
         $this->NPassword(P($in,'NPassword'));
         $this->Confirm(P($in,'NPConfirm'));
      }

      public function TokenCheck(){
         if($this->Token() !== ''){
            return true;
         }
      }

      public function UsernameCheck(){
         if($this->Username() !== ''){
            return true;
         }
      }
      public function PasswordCheck(){
         if($this->Password() !== ''){
            return true;
         }
      }
      public function OPasswordCheck(){
         if($this->OPassword() !== '' && $this->OPassword() === $this->Password()){
            return true;
         }
      }
      public function NPasswordCheck(){
         if($this->NPassword() !== ''){
            return true;
         }
      }
      public function CheckApi(){
         $send = array();
         if(!$this->TokenCheck()){
            $send[] = 'Token';
         }
         return $send;
      }
      public function ConfirmCheck(){
         if($this->Confirm() !== '' && $this->NPassword() === $this->Confirm()){
            return true;
         }
      }
      public function CheckDisplay(){
         $send = array();
         if(!$this->UsernameCheck()){
            $send[] = 'Username';
         }
         if(!$this->PasswordCheck()){
            $send[] = 'Password';
         }
         return $send;
      }
      public function CheckEdit(){
         $send = array();
         if(!$this->IDCheck()){
            $send[] = 'ID';
         }
         if(!$this->OPasswordCheck()){
            $send[] = 'OPassword';
         }
         if(!$this->NPasswordCheck()){
            $send[] = 'NPassword';
         }
         if(!$this->ConfirmCheck()){
            $send[] = 'CPassword';
         }
         return $send;
      }
      public function Check($CheckType){
         $send = array();
            switch($CheckType){
               case Core::FDISPLAY:
                  $send = $this->CheckDisplay();
                  break;
               case Core::FEDIT:
                  $send = $this->CheckEdit();
                  break;
               case Core::FAPI:
                  $send = $this->CheckApi();
                  break;
            }
         return $send;
      }
      
      public function PreperDisplay(){
         $send = array();

         $send['Username'] = $this->Username();
         $send['Password'] = $this->Password();

         return $send;
      }
      
      public function PreperEdit(){
         $send = array();

         $send['ID'] = $this->ID();
         $send['Password'] = $this->NPassword();

         return $send;
      }
      
      public function PreperApi(){
         $send = array();

         $send['Token'] = $this->Token();

         return $send;
      }

      public function Preper($PreperType){
         $send = array();
            switch($PreperType){
               case Core::FDISPLAY:
                  $send = $this->PreperDisplay();
                  break;
               case Core::FEDIT:
                  $send = $this->PreperEdit();
                  break;
               case Core::FAPI:
                  $send = $this->PreperApi();
                  break;
            }
         return $send;
      }

      public function Toarray(){
         $send = array();
         $send = array_merge($send, parent::Toarray());
         $send['Token'] = $this->Token();
         $send['Username'] = $this->Username();
         $send['Password'] = $this->Password();
         $send['OPassword'] = $this->OPassword();
         $send['NPassword'] = $this->NPassword();
         $send['Confirm'] = $this->Confirm();
         return $send;
      }
   }
