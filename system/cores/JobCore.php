<?php
   class JobCore extends Core{

      private $_Code;
      private $_NameFR;
      private $_NameEN;
      private $_NameAR;
      private $_State;

      public function Code($value = null) {
         if($value === null) {
            return $this->_Code;
         }else{
            $this->_Code = htmlspecialchars(trim($value));
            if(!$this->CodeCheck()){
               $this->_Code = '';
            }
         }
      }
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
      public function NameAR($value = null) {
         if($value === null) {
            return $this->_NameAR;
         }else{
            $this->_NameAR = htmlspecialchars(trim($value));
         }
      }
      public function State($value = null) {
         if($value === null) {
            return $this->_State;
         }else{
            $this->_State = htmlspecialchars(trim($value));
         }
      }

      public function __construct(){
         parent::__construct();
      }

      public function LoadForm($in){
         parent::LoadForm($in);
         $this->Code(P($in,'Code'));
         $this->NameFR(P($in,'NameFR'));
         $this->NameEN(P($in,'NameEN'));
         $this->NameAR(P($in,'NameAR'));
         $this->State(P($in,'State'));
      }

      public function CodeCheck(){
         if($this->Code() !== ''){
            return true;
         }
      }
      public function NameFRCheck(){
         if($this->NameFR() !== ''){
            return true;
         }
      }
      public function NameENCheck(){
         if($this->NameEN() !== ''){
            return true;
         }
      }
      public function NameARCheck(){
         if($this->NameAR() !== ''){
            return true;
         }
      }
      public function StateCheck(){
         if($this->State() !== '' and $this->State() > 0){
            return true;
         }
      }
      public function CheckAdd(){
         $send = array();
         $send = array_merge($send, parent::CheckAdd());
         if(!$this->CodeCheck()){
            $send['Code'] = false;
         }
         if(!$this->NameFRCheck()){
            $send['NameFR'] = false;
         }
         if(!$this->NameENCheck()){
            $send['NameEN'] = false;
         }
         if(!$this->NameARCheck()){
            $send['NameAR'] = false;
         }
         if(!$this->StateCheck()){
            $send['State'] = false;
         }
         return $send;
      }
      public function CheckEdit(){
         $send = array();
         $send = array_merge($send, parent::CheckEdit());
         if(!$this->CodeCheck()){
            $send['Code'] = false;
         }
         if(!$this->NameFRCheck()){
            $send['NameFR'] = false;
         }
         if(!$this->NameENCheck()){
            $send['NameEN'] = false;
         }
         if(!$this->NameARCheck()){
            $send['NameAR'] = false;
         }
         if(!$this->StateCheck()){
            $send['State'] = false;
         }
         return $send;
      }
      public function CheckDisplay(){
         $send = array();
         $send = array_merge($send, parent::CheckDisplay());
         if(!$this->CodeCheck()){
            $send['Code'] = false;
         }
         if(!$this->NameFRCheck()){
            $send['NameFR'] = false;
         }
         if(!$this->NameENCheck()){
            $send['NameEN'] = false;
         }
         if(!$this->NameARCheck()){
            $send['NameAR'] = false;
         }
         if(!$this->StateCheck()){
            $send['State'] = false;
         }
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
         $send['Code'] = $this->Code();
         $send['NameFR'] = $this->NameFR();
         $send['NameEN'] = $this->NameEN();
         $send['NameAR'] = $this->NameAR();
         $send['State'] = $this->State();
         return $send;
      }
      public function PreperEdit(){
         $send = array();
         $send = array_merge($send, parent::PreperEdit());
         $send['Code'] = $this->Code();
         $send['NameFR'] = $this->NameFR();
         $send['NameEN'] = $this->NameEN();
         $send['NameAR'] = $this->NameAR();
         $send['State'] = $this->State();
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
         $send['Code'] = $this->Code();
         $send['NameFR'] = $this->NameFR();
         $send['NameEN'] = $this->NameEN();
         $send['NameAR'] = $this->NameAR();
         $send['State'] = $this->State();
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
         $send['Code'] = $this->Code();
         $send['NameFR'] = $this->NameFR();
         $send['NameEN'] = $this->NameEN();
         $send['NameAR'] = $this->NameAR();
         $send['State'] = $this->State();
         return $send;
      }
   }
