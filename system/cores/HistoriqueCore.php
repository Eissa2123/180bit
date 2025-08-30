<?php
   class HistoriqueCore extends Core {

      protected $_ID;
		private $_Employee;
		protected $_Page;
		protected $_Length;
		protected $_Count;
      private $_Tablealias;
      private $_Tablename;
      private $_Action;
      private $_Before;
      private $_After;
      private $_AT;
      private $_ATFrom;
      private $_ATTo;

      protected function ID($value = null) {
			if($value === null) {
				return $this->_ID;
			} else {
				$this->_ID = (is_integer((int) $value) and ((int) $value) > 0) ? ((int) $value) : 0;
			}
		}

		protected function Page($value = null) {
			if($value === null) {
				return $this->_Page;
			} else {
				$this->_Page = (is_integer((int) $value) and ((int) $value) > 0) ? ((int) $value) : CNF_NPG;
			}
		}

		protected function Length($value = null) {
			if($value === null) {
				return $this->_Length;
			} else {
				$this->_Length = (is_integer((int) $value) and ((int) $value) > 0) ? ((int) $value) : CNF_RPP;
			}
		}

		protected function Count($value = null) {
			if($value === null) {
				return $this->_Count;
			} else {
				$this->_Count = (is_integer((int) $value) and ((int) $value) > 0) ? ((int) $value) : CNF_NUL;
			}
		}

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
      public function Employee($value = null) {
         if($value === null) {
            return $this->_Employee;
         }else{
            $this->_Employee = htmlspecialchars(trim($value));
         }
      }
      public function AT($value = null) {
         if($value === null) {
            return $this->_AT;
         }else{
            $this->_AT = htmlspecialchars(trim($value));
         }
      }
      public function ATFrom($value = null) {
         if($value === null) {
            return $this->_ATFrom;
         }else{
            $this->_ATFrom = htmlspecialchars(trim($value));
         }
      }

      public function ATTo($value = null) {
         if($value === null) {
            return $this->_ATTo;
         }else{
            $this->_ATTo = htmlspecialchars(trim($value));
         }
      }

      public function __construct(){
         
      }

      public function LoadForm($in){
			$this->ID(P($in,'ID'));
			$this->Employee(P($in,'Employee'));
			$this->Page(P($in,'Page'));
			$this->Length(P($in,'Length'));
			$this->Count(P($in,'Count'));
         $this->Tablealias(P($in,'Tablealias'));
         $this->Tablename(P($in,'Tablename'));
         $this->Action(P($in,'Action'));
         $this->Before(P($in,'Before'));
         $this->After(P($in,'After'));
         $this->AT(P($in,'AT'));
         $this->ATFrom(P($in,'ATFrom'));
         $this->ATTo(P($in,'ATTo'));
      }

		public function LoadParams($in){
			$this->ID(G($in,'ID'));
		}
      
		public function IDCheck(){
			if($this->ID() !== '' and $this->ID() !== 0 and $this->ID() > 0){
				return true;
			}
			return false;
		}

		public function EmployeeCheck(){
			if($this->Employee() !== '' and $this->Employee() !== 0 and $this->Employee() > 0){
				return true;
			}
			return false;
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
         if($this->Before() !== ''){
            return true;
         }
      }
      public function AfterCheck(){
         if($this->After() !== ''){
            return true;
         }
      }
      public function ATCheck(){
      }
      public function ATFromCheck(){
      }
      public function ATToCheck(){
      }
      public function CheckAdd(){
         $send = array();
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
         if(!$this->IDCheck()){
            $send['ID'] = false;
         }
         if(!$this->BeforeCheck()){
            $send['Before'] = false;
         }
         return $send;
      }
      public function CheckDisplay(){
         $send = array();
         if(!$this->IDCheck()){
            $send['ID'] = false;
         }
         return $send;
      }
      public function CheckIndex(){
         $send = array();
         return $send;
      }
      public function CheckRemove(){
         $send = array();
         if(!$this->IDCheck()){
            $send['ID'] = false;
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
      public function PreperEdit(){
         $send = array();

         $send['ID'] = $this->ID();
         $send['Before'] = $this->Before();

         return $send;
      }
      public function PreperDisplay(){
         $send = array();

         $send['ID'] = $this->ID();

         return $send;
      }
      public function PreperIndex(){
         $send = array();
         
         $send['Page'] = $this->Page();
			$send['Length'] = $this->Length();
			$send['Count'] = $this->Count();
         $send['Tablename'] = $this->Tablename();
         $send['Action'] = $this->Action();
         $send['Member'] = $this->Employee();
         $send['AT'] = $this->AT();
         $send['ATFrom'] = $this->ATFrom();
         $send['ATTo'] = $this->ATTo();
         
         return $send;
      }
      public function PreperRemove(){
         $send = array();

         $send['ID'] = $this->ID();
         
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
         $send['Tablealias'] = $this->Tablealias();
         $send['Tablename'] = $this->Tablename();
         $send['Action'] = $this->Action();
         $send['Before'] = $this->Before();
         $send['After'] = $this->After();
         $send['Member'] = $this->Employee();
         $send['AT'] = $this->AT();
         $send['ATFrom'] = $this->ATFrom();
         $send['ATTo'] = $this->ATTo();
         return $send;
      }
   }
