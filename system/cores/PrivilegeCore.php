<?php
   class PrivilegeCore extends Core{

	  private $_Items;
	  
      private $_Job;
      private $_Browse;
      private $_Search;
      private $_Display;
      private $_Add;
      private $_Edit;
      private $_Remove;
	  
	   private $_Actions = array();

      public function Job($value = null) {
         if($value === null) {
            return $this->_Job;
         }else{
            $this->_Job = $value;
         }
      }
      public function Position($value = null) {
         if($value === null) {
            return $this->_Position;
         }else{
            $this->_Position = htmlspecialchars(trim($value));
         }
      }
      public function Items($value = null) {
         if($value === null) {
            return $this->_Items;
         }else{
            $this->_Items = $value;
			
			
         }
      }
      public function Browse($value = null) {
         if($value === null) {
            return $this->_Browse;
         }else{
            $this->_Browse = array();
            foreach($this->Items() as $KItem => $VItem){
               if(isset($value[$VItem['NameEN']]) and in_array($value[$VItem['NameEN']], array(ALL, SOME, NONE))){
                  $this->_Browse[$VItem['ID']] = $value[$VItem['NameEN']];
               }else{
                  $this->_Browse[$VItem['ID']] = NONE;
               }
            }
         }
      }
      public function Search($value = null) {
         if($value === null) {
            return $this->_Search;
         }else{
            $this->_Search = array();
			foreach($this->Items() as $KItem => $VItem){
				if(isset($value[$VItem['NameEN']]) and in_array($value[$VItem['NameEN']], array(ALL, SOME, NONE))){
					$this->_Search[$VItem['ID']] = $value[$VItem['NameEN']];
				}else{
					$this->_Search[$VItem['ID']] = NONE;
				}
			}
         }
      }
      public function Display($value = null) {
         if($value === null) {
            return $this->_Display;
         }else{
            $this->_Display = array();
			foreach($this->Items() as $KItem => $VItem){
				if(isset($value[$VItem['NameEN']]) and in_array($value[$VItem['NameEN']], array(ALL, SOME, NONE))){
					$this->_Display[$VItem['ID']] = $value[$VItem['NameEN']];
				}else{
					$this->_Display[$VItem['ID']] = NONE;
				}
			}
         }
      }
      public function Add($value = null) {
         if($value === null) {
            return $this->_Add;
         }else{
            $this->_Add = array();
			foreach($this->Items() as $KItem => $VItem){
				if(isset($value[$VItem['NameEN']]) and in_array($value[$VItem['NameEN']], array(ALL, SOME, NONE))){
					$this->_Add[$VItem['ID']] = $value[$VItem['NameEN']];
				}else{
					$this->_Add[$VItem['ID']] = NONE;
				}
			}
         }
      }
      public function Edit($value = null) {
         if($value === null) {
            return $this->_Edit;
         }else{
            $this->_Edit = array();
			foreach($this->Items() as $KItem => $VItem){
				if(isset($value[$VItem['NameEN']]) and in_array($value[$VItem['NameEN']], array(ALL, SOME, NONE))){
					$this->_Edit[$VItem['ID']] = $value[$VItem['NameEN']];
				}else{
					$this->_Edit[$VItem['ID']] = NONE;
				}
			}
         }
      }
      public function Remove($value = null) {
         if($value === null) {
            return $this->_Remove;
         }else{
            $this->_Remove = array();
			foreach($this->Items() as $KItem => $VItem){
				if(isset($value[$VItem['NameEN']]) and in_array($value[$VItem['NameEN']], array(ALL, SOME, NONE))){
					$this->_Remove[$VItem['ID']] = $value[$VItem['NameEN']];
				}else{
					$this->_Remove[$VItem['ID']] = NONE;
				}
			}
         }
      }
	  
	   public function Actions(){
         $this->_Actions = array();

         foreach($this->Items() as $KItem => $VItem){
            $this->_Actions[] = array(
               'Job' => $this->Job(),
               'Item' => $VItem['ID'],
               'Browse' => $this->_Browse[$VItem['ID']],
               'Search' => $this->_Search[$VItem['ID']],
               'Display' => $this->_Display[$VItem['ID']],
               'Add' => $this->_Add[$VItem['ID']],
               'Edit' => $this->_Edit[$VItem['ID']],
               'Remove' => $this->_Remove[$VItem['ID']],
            );
         }

         return $this->_Actions;
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
		 
			$this->Items(O($in,'LItems'));
			$this->Job(O($in,'Job', false));

			if(!$this->JobCheck()){
				$this->Job(P($in,'Job'));
			}
		
			$this->Browse(Y($in,'Browse'));
			$this->Search(Y($in,'Search'));
			$this->Display(Y($in,'Display'));
			$this->Add(Y($in,'Add'));
			$this->Edit(Y($in,'Edit'));
			$this->Remove(Y($in,'Remove'));

			$this->Actions();
		}

		public function JobCheck(){
			if($this->Job() !== ''){
				return true;
			}
		}
		public function BrowseCheck(){
			if($this->Browse() !== ''){
				return true;
			}
		}
      public function SearchCheck(){
         if($this->Search() !== ''){
            return true;
         }
      }
      public function DisplayCheck(){
         if($this->Display() !== ''){
            return true;
         }
      }
      public function AddCheck(){
         if($this->Add() !== ''){
            return true;
         }
      }
      public function EditCheck(){
         if($this->Edit() !== ''){
            return true;
         }
      }
      public function RemoveCheck(){
         if($this->Remove() !== ''){
            return true;
         }
      }
      public function CheckAdd(){
         $send = array();
         $send = array_merge($send, parent::CheckAdd());
         if(!$this->JobCheck()){
            $send['Job'] = false;
         }
         if(!$this->BrowseCheck()){
            $send['Browse'] = false;
         }
         if(!$this->SearchCheck()){
            $send['Search'] = false;
         }
         if(!$this->DisplayCheck()){
            $send['Display'] = false;
         }
         if(!$this->AddCheck()){
            $send['Add'] = false;
         }
         if(!$this->EditCheck()){
            $send['Edit'] = false;
         }
         if(!$this->RemoveCheck()){
            $send['Remove'] = false;
         }
         return $send;
      }
      public function CheckEdit(){
         $send = array();
         //$send = array_merge($send, parent::CheckEdit());
         return $send;
      }
      public function CheckDisplay(){
         $send = array();
         $send = array_merge($send, parent::CheckDisplay());
         if(!$this->JobCheck()){
            $send['Job'] = false;
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

         unset($send['Member']);
		   $this->_Actions = array();
         foreach($this->Items() as $KItem => $VItem){
            $this->_Actions[] = array(
               'Member' => $this->Member(),
               'Job' => $this->Job(),
               'Item' => $VItem['ID'],
               'Browse' => $this->_Browse[$VItem['ID']],
               'Search' => $this->_Search[$VItem['ID']],
               'Display' => $this->_Display[$VItem['ID']],
               'Add' => $this->_Add[$VItem['ID']],
               'Edit' => $this->_Edit[$VItem['ID']],
               'Remove' => $this->_Remove[$VItem['ID']],
            );
         }
         $send['Privileges'] = $this->_Actions;
         return $send;
      }
      public function PreperEdit(){
         $send = array();
         $send = array_merge($send, parent::PreperAdd());

         unset($send['Member']);
         
		   $this->_Actions = array();
         foreach($this->Items() as $KItem => $VItem){
            $this->_Actions[$VItem['ID']] = array(
               'Member' => $this->Member(),
               'Job' => $this->Job(),
               'Item' => $VItem['ID'],
               'Browse' => $this->_Browse[$VItem['ID']],
               'Search' => $this->_Search[$VItem['ID']],
               'Display' => $this->_Display[$VItem['ID']],
               'Add' => $this->_Add[$VItem['ID']],
               'Edit' => $this->_Edit[$VItem['ID']],
               'Remove' => $this->_Remove[$VItem['ID']],
            );
         }
         $send = array_merge($send, $this->_Actions);
         
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
         $send['Job'] = $this->Job();
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
         $send['Job'] = $this->Job();
         $send['Browse'] = $this->Browse();
         $send['Search'] = $this->Search();
         $send['Display'] = $this->Display();
         $send['Add'] = $this->Add();
         $send['Edit'] = $this->Edit();
         $send['Remove'] = $this->Remove();
         $send['Actions'] = $this->_Actions;
         return $send;
      }
   }
