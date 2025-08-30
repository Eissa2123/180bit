<?php
   class CustomerCore extends Core{

      private $_Code;
      private $_RC;
      private $_Taxnumber;
      private $_Companyname;
      private $_Country;
      private $_City;
      private $_Address;
      private $_Phonenumber;
      private $_Email;
      private $_Type;
      private $_Picture;
      private $_State;
      
      private $_States;
      private $_Types;

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
      public function RC($value = null) {
         if($value === null) {
            return $this->_RC;
         }else{
            $this->_RC = htmlspecialchars(trim($value));
         }
      }
      public function Taxnumber($value = null) {
         if($value === null) {
            return $this->_Taxnumber;
         }else{
            $this->_Taxnumber = htmlspecialchars(trim($value));
         }
      }
      public function Companyname($value = null) {
         if($value === null) {
            return $this->_Companyname;
         }else{
            $this->_Companyname = htmlspecialchars(trim($value));
         }
      }
      public function Country($value = null) {
         if($value === null) {
            return $this->_Country;
         }else{
            $this->_Country = htmlspecialchars(trim($value));
         }
      }
      public function City($value = null) {
         if($value === null) {
            return $this->_City;
         }else{
            $this->_City = htmlspecialchars(trim($value));
         }
      }
      public function Address($value = null) {
         if($value === null) {
            return $this->_Address;
         }else{
            $this->_Address = htmlspecialchars(trim($value));
         }
      }
      public function Phonenumber($value = null) {
         if($value === null) {
            return $this->_Phonenumber;
         }else{
            $this->_Phonenumber = htmlspecialchars(trim($value));
         }
      }
      public function Email($value = null) {
         if($value === null) {
            return $this->_Email;
         }else{
            $this->_Email = htmlspecialchars(trim($value));
         }
      }
      public function Type($value = null) {
         if($value === null) {
            return $this->_Type;
         }else{
            $this->_Type = (int) $value;
         }
      }
      public function Picture($value = null) {
         if($value === null) {
            return $this->_Picture;
         }else{
            $this->_Picture = htmlspecialchars(trim($value));
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
      public function Types($value = null) {
         if($value === null) {
            return $this->_Types;
         }else{
            $this->_Types = $value;
         }
      }

      public function __construct(){
         parent::__construct();
      }

      public function LoadForm($in){
         parent::LoadForm($in);
         $this->Code(P($in,'Code'));
         $this->RC(P($in,'RC'));
         $this->Taxnumber(P($in,'Taxnumber'));
         $this->Companyname(P($in,'Companyname'));
         $this->Country(P($in,'Country'));
         $this->City(P($in,'City'));
         $this->Address(P($in,'Address'));
         $this->Phonenumber(P($in,'Phonenumber'));
         $this->Email(P($in,'Email'));
         $this->Type(P($in,'Type'));
         $this->Picture(F($in,'Picture'));
         $this->State(P($in,'State'));
         
         $this->States(P($in,'States'));
         $this->Types(P($in,'Types'));
      }

      public function CodeCheck(){
         if($this->Code() !== ''){
            return true;
         }
      }
      public function RCCheck(){
         if($this->RC() !== ''){
            return true;
         }
      }
      public function TaxnumberCheck(){
         if($this->Taxnumber() !== ''){
            return true;
         }
      }
      public function CompanynameCheck(){
         if($this->Companyname() !== ''){
            return true;
         }
      }
      public function CountryCheck(){
         if($this->Country() !== ''){
            return true;
         }
      }
      public function CityCheck(){
         if($this->City() !== ''){
            return true;
         }
      }
      public function AddressCheck(){
         if($this->Address() !== ''){
            return true;
         }
      }
      public function PhonenumberCheck(){
         if($this->Phonenumber() !== ''){
            return true;
         }
      }
      public function EmailCheck(){
         if($this->Email() !== ''){
            return true;
         }
      }
      public function TypeCheck(){
         if($this->Type() !== '' and $this->Type() > 0){
            return true;
         }
      }
      public function PictureCheck(){
         if($this->Picture() !== ''){
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
      public function TypesCheck(){
         if(is_array($this->Types()) and count($this->Types())> 0){
            return true;
         }
      }
      public function CheckAdd(){
         $send = array();
         $send = array_merge($send, parent::CheckAdd());
         
         if(!$this->CompanynameCheck()){
            $send['Companyname'] = false;
         }
         if(!$this->TypeCheck()){
            $send['Type'] = false;
         }
         if(!$this->StateCheck()){
            $send['State'] = false;
         }
         return $send;
      }
      public function CheckEdit(){
         $send = array();
         $send = array_merge($send, parent::CheckEdit());
         if(!$this->CompanynameCheck()){
            $send['Companyname'] = false;
         }
         if(!$this->TypeCheck()){
            $send['Type'] = false;
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
         if(!$this->RCCheck()){
            $send['RC'] = $this->RC();
         }
         if(!$this->TaxnumberCheck()){
            $send['Taxnumber'] = $this->Taxnumber();
         }
         $send['Companyname'] = $this->Companyname();
         
         if(!$this->CountryCheck()){
            $send['Country'] = $this->Country();
         }
         if(!$this->CityCheck()){
            $send['City'] = $this->City();
         }
         if(!$this->AddressCheck()){
            $send['Address'] = $this->Address();
         }
         if(!$this->PhonenumberCheck()){
            $send['Phonenumber'] = $this->Phonenumber();
         }
         if(!$this->EmailCheck()){
            $send['Email'] = $this->Email();
         }
         $send['Type'] = $this->Type();
         if($this->PictureCheck()){
            $send['Picture'] = $this->Picture();
         }
         $send['State'] = $this->State();
         return $send;
      }
      public function PreperEdit(){
         $send = array();
         $send = array_merge($send, parent::PreperEdit());
         $send['RC'] = $this->RC();
         $send['Taxnumber'] = $this->Taxnumber();
         $send['Companyname'] = $this->Companyname();
         $send['Country'] = $this->Country();
         $send['City'] = $this->City();
         $send['Address'] = $this->Address();
         $send['Phonenumber'] = $this->Phonenumber();
         $send['Email'] = $this->Email();
         $send['Type'] = $this->Type();
         if($this->PictureCheck()){
            $send['Picture'] = $this->Picture();
         }
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
         $send['RC'] = $this->RC();
         $send['Taxnumber'] = $this->Taxnumber();
         $send['Companyname'] = $this->Companyname();
         $send['Type'] = $this->Type();
         $send['State'] = $this->State();
         $send['States'] = $this->States();
         $send['Types'] = $this->Types();
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
         $send['RC'] = $this->RC();
         $send['Taxnumber'] = $this->Taxnumber();
         $send['Companyname'] = $this->Companyname();
         $send['Country'] = $this->Country();
         $send['City'] = $this->City();
         $send['Address'] = $this->Address();
         $send['Phonenumber'] = $this->Phonenumber();
         $send['Email'] = $this->Email();
         $send['Type'] = $this->Type();
         $send['Picture'] = $this->Picture();
         $send['State'] = $this->State();
         $send['States'] = $this->States();
         $send['Types'] = $this->Types();
         return $send;
      }
   }
