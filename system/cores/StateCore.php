<?php
   class StateCore extends Core{

      private $_NameFR;
      private $_NameEN;
      private $_NameEN;
      private $_Class;
      private $_State;

      public function NameFR($value = null) {
         if($value === null) {
            return $this->_NameFR;
         }else{
            $this->_NameFR = htmlspecialchars(trim($value));
         }
      }
      public function NameEN($value = null) {
         if($value === null) {
            return $this->_NameEN;
         }else{
            $this->_NameEN = htmlspecialchars(trim($value));
         }
      }
      public function NameEN($value = null) {
         if($value === null) {
            return $this->_NameEN;
         }else{
            $this->_NameEN = htmlspecialchars(trim($value));
         }
      }
      public function Class($value = null) {
         if($value === null) {
            return $this->_Class;
         }else{
            $this->_Class = htmlspecialchars(trim($value));
         }
      }
      public function State($value = null) {
         if($value === null) {
            return $this->_State;
         }else{
            $this->_State = (int) $value;
         }
      }

      public function __construct(){
         parent::__construct();
      }

      public function LoadForm($in){
         parent::LoadForm($in);
         $this->NameFR(P($in,'NameFR'));
         $this->NameEN(P($in,'NameEN'));
         $this->NameEN(P($in,'NameEN'));
         $this->Class(P($in,'Class'));
         $this->State(P($in,'State'));
      }

      public function NameFRCheck(){
      }
      public function NameENCheck(){
      }
      public function NameENCheck(){
         if($this->NameEN() !== ''){
            return true;
         }
      }
      public function ClassCheck(){
         if($this->Class() !== ''){
            return true;
         }
      }
      public function StateCheck(){
         if($this->State() !== ''){
            return true;
         }
      }
      public function CheckAdd(){
         $send = array();
         $send = array_merge($send, parent::CheckAdd());
         return $send;
      }
      public function CheckEdit(){
         $send = array();
         $send = array_merge($send, parent::CheckEdit());
         return $send;
      }
      public function CheckDisplay(){
         $send = array();
         $send = array_merge($send, parent::CheckDisplay());
         return $send;
      }
      public function CheckIndex(){
         $send = array();
         $send = array_merge($send, parent::CheckIndex());
         return $send;
      }
      public function CheckRemove(){
         $send = array();
         $send = array_merge($send, parent::CheckRemove());
         return $send;
      }
      public function Check($CheckType){
         $send = array();
            switch($CheckType){
               case Core::FADD:
                  $send = $this->CheckAdd();
                  break;
               case Core::FEDIT:
                  $send = $this->CheckEdit();
                  break;
               case Core::FREMOVE:
                  $send = $this->CheckRemove();
                  break;
               case Core::FDISPLAY:
                  $send = $this->CheckDisplay();
                  break;
               case Core::FINDEX:
                  $send = $this->CheckIndex();
                  break;
            }
         return $send;
      }

      public function PreperAdd(){
         $send = array();
         $send = array_merge($send, parent::PreperAdd());
         return $send;
      }
      public function PreperEdit(){
         $send = array();
         $send = array_merge($send, parent::PreperEdit());
         return $send;
      }
      public function PreperDisplay(){
         $send = array();
         $send = array_merge($send, parent::PreperDisplay());
         return $send;
      }
      public function PreperIndex(){
         $send = array();
         $send = array_merge($send, parent::PreperIndex());
         return $send;
      }
      public function PreperRemove(){
         $send = array();
         $send = array_merge($send, parent::PreperRemove());
         return $send;
      }
      public function Preper($PreperType){
         $send = array();
            switch($PreperType){
               case Core::FADD:
                  $send = $this->PreperAdd();
                  break;
               case Core::FEDIT:
                  $send = $this->PreperEdit();
                  break;
               case Core::FREMOVE:
                  $send = $this->PreperRemove();
                  break;
               case Core::FDISPLAY:
                  $send = $this->PreperDisplay();
                  break;
               case Core::FINDEX:
                  $send = $this->PreperIndex();
                  break;
            }
         return $send;
      }

      public function Toarray(){
         $send = array();
         $send = array_merge($send, parent::Toarray());
         $send['NameFR'] = $this->NameFR();
         $send['NameEN'] = $this->NameEN();
         $send['NameEN'] = $this->NameEN();
         $send['Class'] = $this->Class();
         $send['State'] = $this->State();
         return $send;
      }
   }
