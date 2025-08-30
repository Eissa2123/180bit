<?php
   class CategoryCore extends Core{

      private $_Code;
      private $_Name;
      private $_Category;
      private $_State;
      private $_Picture;
      
      private $_Categories;
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
      public function Category($value = null) {
         if($value === null) {
            return $this->_Category;
         }else{
            $this->_Category = (int) $value;
         }
      }
      public function State($value = null) {
         if($value === null) {
            return $this->_State;
         }else{
            $this->_State = (int) $value;
         }
      }
      public function Picture($value = null) {
         if($value === null) {
            return $this->_Picture;
         }else{
            $this->_Picture = htmlspecialchars(trim($value));
         }
      }
      public function Categories($value = null) {
         if($value === null) {
            return $this->_Categories;
         }else{
            $this->_Categories = $value;
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
         $this->Category(P($in,'Category'));
         $this->State(P($in,'State'));
         $this->Picture(F($in,'Picture'));
         $this->States(P($in,'States'));
         $this->Categories(P($in,'Categories'));
      }

      public function CodeCheck(){
         if($this->Code() !== ''){
            return true;
         }
         return false;
      }
      public function NameCheck(){
         if($this->Name() !== ''){
            return true;
         }
         return false;
      }
      public function CategoryCheck(){
         if($this->Category() !== '' and $this->Category() >= 0){
            return true;
         }
      }
      public function StateCheck(){
         if($this->State() !== '' and $this->State() > 0){
            return true;
         }
         return false;
      }
      public function PictureCheck(){
         if($this->Picture() !== ''){
            return true;
         }
         return false;
      }
      public function StatesCheck(){
         if(is_array($this->States()) and count($this->States())> 0){
            return true;
         }
         return false;
      }
      public function CategoriesCheck(){
         if(is_array($this->Categories()) and count($this->Categories())> 0){
            return true;
         }
         return false;
      }
      public function CheckAdd(){
         $send = array();
         $send = array_merge($send, parent::CheckAdd());
         if(!$this->NameCheck()){
            $send['Name'] = false;
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
         $send['Category'] = $this->Category();
         $send['State'] = $this->State();
         if($this->PictureCheck()){
            $send['Picture'] = $this->Picture();
         }
         return $send;
      }
      public function PreperEdit(){
         $send = array();
         $send = array_merge($send, parent::PreperEdit());
         $send['Name'] = $this->Name();
         $send['Category'] = $this->Category();
         $send['State'] = $this->State();
         if($this->PictureCheck()){
            $send['Picture'] = $this->Picture();
         }
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
         $send['State'] = $this->State();
         $send['States'] = $this->States();
         $send['Categories'] = $this->Categories();
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
		
		public function Savefiles(){
			if($this->PictureCheck()){
				Saveimage($this->Picture());
			}
		}

      public function Toarray(){
         $send = array();
         $send = array_merge($send, parent::Toarray());
         $send['Code'] = $this->Code();
         $send['Name'] = $this->Name();
         $send['Category'] = $this->Category();
         $send['State'] = $this->State();
         return $send;
      }
   }
