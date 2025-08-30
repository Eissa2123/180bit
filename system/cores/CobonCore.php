<?php
   class CobonCore extends Core{

      private $_Code;
      private $_Name;
      private $_Marketer;
      private $_Ratio;
      private $_Ratios;
      private $_State;

      private $_States;

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
      public function Name($value = null) {
         if($value === null) {
            return $this->_Name;
         }else{
            $this->_Name = htmlspecialchars(trim($value));
         }
      }
      public function Marketer($value = null) {
         if($value === null) {
            return $this->_Marketer;
         }else{
            $this->_Marketer = (int) $value;
         }
      }
      public function Ratio($value = null) {
         if($value === null) {
            return $this->_Ratio;
         }else{
            $this->_Ratio = (double) $value;
         }
      }
      public function Ratios($value = null) {
         if($value === null) {
            return $this->_Ratios;
         }else{
            $this->_Ratios = (double) $value;
         }
      }
      public function State($value = null) {
         if($value === null) {
            return $this->_State;
         }else{
            $this->_State = (int) $value;
         }
      }
      public function States($value = null) {
         if($value === null) {
            return $this->_States;
         }else{
            $this->_States = $value;
         }
      }

      public function __construct(){
         parent::__construct();
      }

      public function LoadForm($in){
         parent::LoadForm($in);
         $this->Code(P($in,'Code'));
         $this->Name(P($in,'Name'));
         $this->Marketer(P($in,'Marketer'));
         $this->Ratio(P($in,'Ratio'));
         $this->Ratios(P($in,'Ratios'));
         $this->State(P($in,'State'));
         $this->States(P($in,'States'));
      }

      public function CodeCheck(){
         if($this->Code() !== ''){
            return true;
         }
      }
      public function NameCheck(){
         if($this->Name() !== ''){
            return true;
         }
      }
      public function MarketerCheck(){
         if($this->Marketer() !== '' and $this->Marketer() >= 0){
            return true;
         }
      }
      public function RatioCheck(){
         if($this->Ratio() !== '' and $this->Ratio() >= 0){
            return true;
         }
      }
      public function RatiosCheck(){
         if($this->Ratios() !== '' and $this->Ratios() >= 0){
            return true;
         }
      }
      public function StateCheck(){
         if($this->State() !== '' and $this->State() > 0){
            return true;
         }
      }
      public function StatesCheck(){
         if(is_array($this->States()) and count($this->States())> 0){
            return true;
         }
      }
      public function CheckAdd(){
         $send = array();
         $send = array_merge($send, parent::CheckAdd());
         if(!$this->NameCheck()){
            $send['Name'] = false;
         }
         if(!$this->MarketerCheck()){
            $send['Marketer'] = false;
         }
         if(!$this->RatioCheck()){
            $send['Ratio'] = false;
         }
         if(!$this->RatiosCheck()){
            $send['Ratios'] = false;
         }
         if(!$this->StateCheck()){
            $send['State'] = false;
         }
         return $send;
      }
      public function CheckEdit(){
         $send = array();
         $send = array_merge($send, parent::CheckEdit());
         if(!$this->NameCheck()){
            $send['Name'] = false;
         }
         if(!$this->MarketerCheck()){
            $send['Marketer'] = false;
         }
         if(!$this->RatioCheck()){
            $send['Ratio'] = false;
         }
         if(!$this->RatioCheck()){
            $send['Ratio'] = false;
         }
         if(!$this->StateCheck()){
            $send['State'] = false;
         }
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
         $send['Code'] = $this->Code();
         $send['Name'] = $this->Name();
         $send['Marketer'] = $this->Marketer();
         $send['Ratio'] = $this->Ratio();
         $send['Ratios'] = $this->Ratios();
         $send['State'] = $this->State();
         return $send;
      }
      public function PreperEdit(){
         $send = array();
         $send = array_merge($send, parent::PreperEdit());
         $send['Name'] = $this->Name();
         $send['Marketer'] = $this->Marketer();
         $send['Ratio'] = $this->Ratio();
         $send['Ratios'] = $this->Ratios();
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
         $send['Name'] = $this->Name();
         $send['Marketer'] = $this->Marketer();
         $send['State'] = $this->State();
         $send['States'] = $this->States();
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
         $send['Name'] = $this->Name();
         $send['Marketer'] = $this->Marketer();
         $send['Ratio'] = $this->Ratio();
         $send['Ratios'] = $this->Ratios();
         $send['State'] = $this->State();
         return $send;
      }
   }
