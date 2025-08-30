<?php
   class LogCore extends Core{

      private $_Tablealias;
      private $_Tablename;
      private $_Action;
      private $_Before;
      private $_After;
      private $_Member;
      private $_AT;

      public function Tablealias($value = null) {
         if($value === null) {
            return $this->_Tablealias;
         }else{
            $this->_Tablealias = htmlspecialchars(trim($value));
         }
      }
      public function Tablename($value = null) {
         if($value === null) {
            return $this->_Tablename;
         }else{
            $this->_Tablename = htmlspecialchars(trim($value));
         }
      }
      public function Action($value = null) {
         if($value === null) {
            return $this->_Action;
         }else{
            $this->_Action = htmlspecialchars(trim($value));
         }
      }
      public function Before($value = null) {
         if($value === null) {
            return $this->_Before;
         }else{
            $this->_Before = htmlspecialchars(trim($value));
         }
      }
      public function After($value = null) {
         if($value === null) {
            return $this->_After;
         }else{
            $this->_After = htmlspecialchars(trim($value));
         }
      }
      public function Member($value = null) {
         if($value === null) {
            return $this->_Member;
         }else{
            $this->_Member = htmlspecialchars(trim($value));
         }
      }
      public function AT($value = null) {
         if($value === null) {
            return $this->_AT;
         }else{
            $this->_AT = htmlspecialchars(trim($value));
         }
      }

      public function __construct(){
         parent::__construct();
      }

      public function LoadForm($in){
         parent::LoadForm($in);
         $this->Tablealias(P($in,'Tablealias'));
         $this->Tablename(P($in,'Tablename'));
         $this->Action(P($in,'Action'));
         $this->Before(P($in,'Before'));
         $this->After(P($in,'After'));
         $this->Member(P($in,'Member'));
         $this->AT(P($in,'AT'));
      }

      public function TablealiasCheck(){
         if($this->Tablealias() !== ''){
            return true;
         }
      }
      public function TablenameCheck(){
         if($this->Tablename() !== ''){
            return true;
         }
      }
      public function ActionCheck(){
         if($this->Action() !== '' and $this->Action() > 0){
            return true;
         }
      }
      public function BeforeCheck(){
      }
      public function AfterCheck(){
      }
      public function MemberCheck(){
         if($this->Member() !== '' and $this->Member() > 0){
            return true;
         }
      }
      public function ATCheck(){
      }
      public function CheckAdd(){
         $send = array();
         $send = array_merge($send, parent::CheckAdd());
         if(!$this->TablealiasCheck()){
            $send['Tablealias'] = false;
         }
         if(!$this->TablenameCheck()){
            $send['Tablename'] = false;
         }
         if(!$this->ActionCheck()){
            $send['Action'] = false;
         }
         if(!$this->AfterCheck()){
            $send['After'] = false;
         }
         if(!$this->ATCheck()){
            $send['AT'] = false;
         }
         return $send;
      }
      public function CheckEdit(){
         $send = array();
         $send = array_merge($send, parent::CheckEdit());
         if(!$this->TablealiasCheck()){
            $send['Tablealias'] = false;
         }
         if(!$this->TablenameCheck()){
            $send['Tablename'] = false;
         }
         if(!$this->ActionCheck()){
            $send['Action'] = false;
         }
         if(!$this->AfterCheck()){
            $send['After'] = false;
         }
         if(!$this->ATCheck()){
            $send['AT'] = false;
         }
         return $send;
      }
      public function CheckDisplay(){
         $send = array();
         $send = array_merge($send, parent::CheckDisplay());
         if(!$this->TablealiasCheck()){
            $send['Tablealias'] = false;
         }
         if(!$this->TablenameCheck()){
            $send['Tablename'] = false;
         }
         if(!$this->ActionCheck()){
            $send['Action'] = false;
         }
         if(!$this->AfterCheck()){
            $send['After'] = false;
         }
         if(!$this->ATCheck()){
            $send['AT'] = false;
         }
         return $send;
      }
      public function CheckIndex(){
         $send = array();
         $send = array_merge($send, parent::CheckIndex());
         if(!$this->TablealiasCheck()){
            $send['Tablealias'] = false;
         }
         if(!$this->TablenameCheck()){
            $send['Tablename'] = false;
         }
         if(!$this->ActionCheck()){
            $send['Action'] = false;
         }
         if(!$this->AfterCheck()){
            $send['After'] = false;
         }
         if(!$this->ATCheck()){
            $send['AT'] = false;
         }
         return $send;
      }
      public function CheckRemove(){
         $send = array();
         $send = array_merge($send, parent::CheckRemove());
         if(!$this->TablealiasCheck()){
            $send['Tablealias'] = false;
         }
         if(!$this->TablenameCheck()){
            $send['Tablename'] = false;
         }
         if(!$this->ActionCheck()){
            $send['Action'] = false;
         }
         if(!$this->AfterCheck()){
            $send['After'] = false;
         }
         if(!$this->ATCheck()){
            $send['AT'] = false;
         }
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
         $send['Tablealias'] = $this->Tablealias();
         $send['Tablename'] = $this->Tablename();
         $send['Action'] = $this->Action();
         $send['Before'] = $this->Before();
         $send['After'] = $this->After();
         $send['Member'] = $this->Member();
         $send['AT'] = $this->AT();
         return $send;
      }
      public function PreperEdit(){
         $send = array();
         $send = array_merge($send, parent::PreperEdit());
         $send['Tablealias'] = $this->Tablealias();
         $send['Tablename'] = $this->Tablename();
         $send['Action'] = $this->Action();
         $send['Before'] = $this->Before();
         $send['After'] = $this->After();
         $send['Member'] = $this->Member();
         $send['AT'] = $this->AT();
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
         $send['Tablealias'] = $this->Tablealias();
         $send['Tablename'] = $this->Tablename();
         $send['Action'] = $this->Action();
         $send['After'] = $this->After();
         $send['AT'] = $this->AT();
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
         $send['Tablealias'] = $this->Tablealias();
         $send['Tablename'] = $this->Tablename();
         $send['Action'] = $this->Action();
         $send['Before'] = $this->Before();
         $send['After'] = $this->After();
         $send['Member'] = $this->Member();
         $send['AT'] = $this->AT();
         return $send;
      }
   }
