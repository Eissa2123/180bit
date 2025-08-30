<?php
	class Core {

		const FINDEX   = 1;
		const FADD     = 2;
		const FDISPLAY = 3;
		const FEDIT    = 4;
		const FREMOVE  = 5;
		const FPRINT   = 6;
		const FAPI	   = 7;

		protected $_LStatus = array();

		protected $_ID;
		protected $_Member;
		protected $_Page;
		protected $_Length;
		protected $_Count;
		protected $_From;
		protected $_To;
		protected $_ISD;
		protected $_CAT;
		protected $_UAT;
		protected $_DAT;
		protected $_Token;
		protected $_General;

		function __construct(){

			if(isset($_SESSION[SESSION_NAME]) and isset($_SESSION[SESSION_NAME]['ID'])){
				$id = (int) $_SESSION[SESSION_NAME];
				if($id > 0){
					$this->Member($id);
				}else{
					$this->Member(0);
				}
				//var_dump($this->Toarray());
			}
		}

		protected function ID($value = null) {
			if($value === null) {
				return $this->_ID;
			} else {
				$this->_ID = (is_integer((int) $value) and ((int) $value) > 0) ? ((int) $value) : 0;
			}
		}

		protected function Member($value = null) {
			if($value === null) {
				return $this->_Member;
			} else {
				$this->_Member = htmlspecialchars(trim($value));
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

		protected function From($value = null) {
			if($value === null) {
				return $this->_From;
			} else {
				$this->_From = htmlspecialchars(trim($value));
			}
		}

		protected function To($value = null) {
			if($value === null) {
				return $this->_To;
			} else {
				$this->_To = htmlspecialchars(trim($value));
			}
		}
		
		protected function ISD($value = null) {
			if($value === null) {
				return $this->_CAT;
			} else {
				$this->_CAT = (is_integer((int) $value) and ((int) $value) > 0) ? ((int) $value) : 0;
			}
		}

		protected function CAT($value = null) {
			if($value === null) {
				return $this->_CAT;
			} else {
				$this->_CAT = htmlspecialchars(trim($value));
			}
		}

		protected function UAT($value = null) {
			if($value === null) {
				return $this->_UAT;
			} else {
				$this->_UAT = htmlspecialchars(trim($value));
			}
		}

		protected function DAT($value = null) {
			if($value === null) {
				return $this->_DAT;
			} else {
				$this->_DAT = htmlspecialchars(trim($value));
			}
		}

		protected function General($value = null) {
		   if($value === null) {
			  return $this->_General;
		   }else{
			  $this->_General = (int) $value;
		   }
		}

		protected function Token($value = null) {
			if($value === null) {
				return $this->_Token;
			} else {
				$this->_Token = htmlspecialchars(trim($value));
			}
		}

		public function LoadForm($in) {
			$this->ID(P($in,'ID'));
			//$this->Member(P($in,'Member'));
			$this->Page(P($in,'Page'));
			$this->Length(P($in,'Length'));
			$this->Count(P($in,'Count'));
			$this->From(P($in,'From'));
			$this->To(P($in,'To'));
			$this->ISD(P($in,'ISD'));
			$this->CAT(P($in,'CAT'));
			$this->UAT(P($in,'UAT'));
			$this->DAT(P($in,'DAT'));
			$this->General(P($in,'General'));
			//$this->Token(P($in, 'Token'));
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

		public function MemberCheck(){
			if($this->Member() !== '' and $this->Member() !== 0 and $this->Member() > 0){
				return true;
			}
			return false;
		}

		public function ISDCheck(){
			if($this->ISD() !== '' and ($this->ISD() === 0 or $this->ISD() === 1)){
				return true;
			}
			return false;
		}
		
		public function GeneralCheck(){
			if($this->General() !== '' and $this->General() > 0){
			   return true;
			}
		}
		
		protected function CheckAdd(){
			$send = array();
			if(!$this->MemberCheck()) {
				$send[] = 'Member';
			}
			return $send;
		}
		
		protected function CheckEdit(){
			$send = array();
			if(!$this->IDCheck()) {
				$send[] = 'ID';
			}
			return $send;
		}
		
		protected function CheckIndex(){
			$send = array();
			return $send;
		}

		protected function CheckDisplay () {
			$send = array();
			if(!$this->IDCheck()) {
				$send[] = 'ID';
			}
			return $send;
		}

		protected function CheckRemove () {
			$send = array();
			if(!$this->IDCheck()) {
				$send[] = 'ID';
			}
			return $send;
		}

		protected function CheckPrint () {
			$send = array();
			/*if(!$this->IDCheck()) {
				$send[] = 'ID';
			}*/
			return $send;
		}

		protected function PreperDisplay (){
			$send = array();

			$send['ID'] = $this->ID();

			return $send;
		}
		public function PreperAdd(){
			$send = array();
			
			$send['Member'] = $this->Member();
			//$send['Token'] = $this->Token();

			return $send;
		}
		
		public function PreperEdit(){
			$send = array();

			$send['ID'] = $this->ID();
			//$send['Member'] = $this->Member();

			return $send;
		}
	  
		public function PreperRemove(){
			$send = array();
			
			$send['ID'] = $this->ID();
			//$send['ISD'] = $this->ISD();
			
			//$send['Member'] = $this->Member();

			return $send;
		}
	  
		public function PreperPrint(){
			$send = array();
			
			$send['ID'] = $this->ID();
			$send['From'] = $this->From();
			$send['To'] = $this->To();
			$send['General'] = $this->General();
			
			return $send;
		}

		protected function PreperIndex (){
			$send = array();

			$send['ID'] = $this->ID();
			$send['Page'] = $this->Page();
			$send['Length'] = $this->Length();
			$send['Count'] = $this->Count();
			$send['From'] = $this->From();
			$send['To'] = $this->To();

			return $send;
		}

		protected function Toarray() {
			$send = array();

			$send['ID'] = $this->ID();
			$send['Member'] = $this->Member();
			$send['Page'] = $this->Page();
			$send['Length'] = $this->Length();
			$send['Count'] = $this->Count();
			$send['CAT'] = $this->CAT();
			$send['UAT'] = $this->UAT();
			$send['DAT'] = $this->DAT();
			$send['General'] = $this->General();
			//$send['Token'] = $this->Token();

			return $send;
		}

	}
