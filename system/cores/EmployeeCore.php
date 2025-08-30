<?php
   class EmployeeCore extends Core{

      private $_Code;
      private $_NCID;
      private $_Firstname;
      private $_Lastname;
      private $_Gender;
      private $_Username;
      private $_Password;
      private $_Job;

      private $_SWork;
      private $_SWorkFrom;
      private $_SWorkTo;

      private $_EWork;
      private $_EWorkFrom;
      private $_EWorkTo;
      
      private $_SBilive;
      private $_SBiliveFrom;
      private $_SBiliveTo;
      
      private $_EBilive;
      private $_EBiliveFrom;
      private $_EBiliveTo;
      
      private $_Salary;

      private $_Address;
      private $_City;
      private $_Country;
      private $_Phonenumber;
      private $_Email;
      private $_Picture;
      private $_State;
      
      private $_Employees;
      private $_States;
      private $_Genders;
      private $_Countrys;
      private $_Jobs;

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
      public function NCID($value = null) {
         if($value === null) {
            return $this->_NCID;
         }else{
            $this->_NCID = htmlspecialchars(trim($value));
         }
      }
      public function Firstname($value = null) {
         if($value === null) {
            return $this->_Firstname;
         }else{
            $this->_Firstname = htmlspecialchars(trim($value));
         }
      }
      public function Lastname($value = null) {
         if($value === null) {
            return $this->_Lastname;
         }else{
            $this->_Lastname = htmlspecialchars(trim($value));
         }
      }
      public function Gender($value = null) {
         if($value === null) {
            return $this->_Gender;
         }else{
            $this->_Gender = (int) $value;
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
      public function Job($value = null) {
         if($value === null) {
            return $this->_Job;
         }else{
            $this->_Job = htmlspecialchars(trim($value));
         }
      }
      public function SWork($value = null) {
         if($value === null) {
            return $this->_SWork;
         }else{
            $this->_SWork = htmlspecialchars(trim($value));
         }
      }
      public function SWorkFrom($value = null) {
         if($value === null) {
            return $this->_SWorkFrom;
         }else{
            $this->_SWorkFrom = htmlspecialchars(trim($value));
         }
      }
      public function SWorkTo($value = null) {
         if($value === null) {
            return $this->_SWorkTo;
         }else{
            $this->_SWorkTo = htmlspecialchars(trim($value));
         }
      }
      public function EWork($value = null) {
         if($value === null) {
            return $this->_EWork;
         }else{
            $this->_EWork = htmlspecialchars(trim($value));
         }
      }
      public function EWorkFrom($value = null) {
         if($value === null) {
            return $this->_EWorkFrom;
         }else{
            $this->_EWorkFrom = htmlspecialchars(trim($value));
         }
      }
      public function EWorkTo($value = null) {
         if($value === null) {
            return $this->_EWorkTo;
         }else{
            $this->_EWorkTo = htmlspecialchars(trim($value));
         }
      }
      public function SBilive($value = null) {
         if($value === null) {
            return $this->_EBilive;
         }else{
            $this->_EBilive = htmlspecialchars(trim($value));
         }
      }
      public function SBiliveFrom($value = null) {
         if($value === null) {
            return $this->_SBiliveFrom;
         }else{
            $this->_SBiliveFrom = htmlspecialchars(trim($value));
         }
      }
      public function SBiliveTo($value = null) {
         if($value === null) {
            return $this->_SBiliveTo;
         }else{
            $this->_SBiliveTo = htmlspecialchars(trim($value));
         }
      }
      public function EBilive($value = null) {
         if($value === null) {
            return $this->_EBilive;
         }else{
            $this->_EBilive = htmlspecialchars(trim($value));
         }
      }
      public function EBiliveFrom($value = null) {
         if($value === null) {
            return $this->_EBiliveFrom;
         }else{
            $this->_EBiliveFrom = htmlspecialchars(trim($value));
         }
      }
      public function EBiliveTo($value = null) {
         if($value === null) {
            return $this->_EBiliveTo;
         }else{
            $this->_EBiliveTo = htmlspecialchars(trim($value));
         }
      }
      public function Salary($value = null) {
         if($value === null) {
            return $this->_Salary;
         }else{
            $this->_Salary = (double) $value;
         }
      }
      public function Address($value = null) {
         if($value === null) {
            return $this->_Address;
         }else{
            $this->_Address = htmlspecialchars(trim($value));
         }
      }
      public function City($value = null) {
         if($value === null) {
            return $this->_City;
         }else{
            $this->_City = htmlspecialchars(trim($value));
         }
      }
      public function Country($value = null) {
         if($value === null) {
            return $this->_Country;
         }else{
            $this->_Country = htmlspecialchars(trim($value));
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
      public function Employees($value = null) {
         if($value === null) {
            return $this->_Employees;
         }else{
            $this->_Employees = $value;
         }
      }
      public function Genders($value = null) {
         if($value === null) {
            return $this->_Genders;
         }else{
            $this->_Genders = $value;
         }
      }
      public function Countrys($value = null) {
         if($value === null) {
            return $this->_Countrys;
         }else{
            $this->_Countrys = $value;
         }
      }
      public function Jobs($value = null) {
         if($value === null) {
            return $this->_Jobs;
         }else{
            $this->_Jobs = $value;
         }
      }

      public function __construct(){
         parent::__construct();
      }

      public function LoadForm($in){
         parent::LoadForm($in);

         $this->Code(P($in,'Code'));
         $this->NCID(P($in,'NCID'));
         $this->Firstname(P($in,'Firstname'));
         $this->Lastname(P($in,'Lastname'));
         $this->Gender(P($in,'Gender'));
         $this->Username(P($in,'Username'));
         $this->Password(P($in,'Password'));
         $this->Job(P($in,'Job'));

         $this->SWork(P($in,'SWork'));
         $this->SWorkFrom(P($in,'SWorkFrom'));
         $this->SWorkTo(P($in,'SWorkTo'));

         $this->EWork(P($in,'EWork'));
         $this->EWorkFrom(P($in,'EWorkFrom'));
         $this->EWorkTo(P($in,'EWorkTo'));

         $this->SBilive(P($in,'SBilive'));
         $this->SBiliveFrom(P($in,'SBiliveFrom'));
         $this->SBiliveTo(P($in,'SBiliveTo'));

         $this->EBilive(P($in,'EBilive'));
         $this->EBiliveFrom(P($in,'EBiliveFrom'));
         $this->EBiliveTo(P($in,'EBiliveTo'));

         $this->Salary(P($in,'Salary'));

         $this->Address(P($in,'Address'));
         $this->City(P($in,'City'));
         $this->Country(P($in,'Country'));
         $this->Phonenumber(P($in,'Phonenumber'));
         $this->Email(P($in,'Email'));
         $this->Picture(F($in,'Picture'));
         $this->State(P($in,'State'));
         $this->States(P($in,'States'));
         $this->Employees(P($in,'Employees'));
         $this->Genders(P($in,'Genders'));
         $this->Countrys(P($in,'Countrys'));
         $this->Jobs(P($in,'Jobs'));
      }

      public function CodeCheck(){
         if($this->Code() !== ''){
            return true;
         }
      }
      public function NCIDCheck(){
         if($this->NCID() !== ''){
            return true;
         }
      }
      public function FirstnameCheck(){
         if($this->Firstname() !== ''){
            return true;
         }
      }
      public function LastnameCheck(){
         if($this->Lastname() !== ''){
            return true;
         }
      }
      public function GenderCheck(){
         if($this->Gender() !== ''){
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
      public function JobCheck(){
         if($this->Job() !== '' and $this->Job() > 0){
            return true;
         }
      }
      public function SWorkCheck(){
		  return (isdate($this->SWork()));
      }
      public function SWorkFromCheck(){
		  return (isdate($this->SWorkFrom()));
      }
      public function SWorkToCheck(){
		  return (isdate($this->SWorkTo()));
      }
      public function EWorkCheck(){
		  return (isdate($this->EWork()));
      }
      public function EWorkFromCheck(){
		  return (isdate($this->EWorkFrom()));
      }
      public function EWorkToCheck(){
		  return (isdate($this->EWorkTo()));
      }
      public function SBiliveCheck(){
         return (isdate($this->SBilive()));
       }
       public function SBiliveFromCheck(){
         return (isdate($this->SBiliveFrom()));
       }
       public function SBiliveToCheck(){
         return (isdate($this->SBiliveTo()));
       }
       public function EBiliveCheck(){
         return (isdate($this->EBilive()));
       }
       public function EBiliveFromCheck(){
         return (isdate($this->EBiliveFrom()));
       }
       public function EBiliveToCheck(){
         return (isdate($this->EBiliveTo()));
       }
       public function SalaryCheck(){
          if($this->Salary() !== '' and $this->Salary() > 0){
             return true;
          }
       }
      
       public function AddressCheck(){
         if($this->Address() !== ''){
            return true;
         }
      }
      public function CityCheck(){
         if($this->City() !== ''){
            return true;
         }
      }
      public function CountryCheck(){
         if($this->Country() !== ''){
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
      public function GendersCheck(){
         if(is_array($this->Genders()) and count($this->Genders())> 0){
            return true;
         }
      }
      public function CountrysCheck(){
         if(is_array($this->Countrys()) and count($this->Countrys())> 0){
            return true;
         }
      }
      public function JobsCheck(){
         if(is_array($this->Jobs()) and count($this->Jobs())> 0){
            return true;
         }
      }
      public function CheckAdd(){
         $send = array();
         $send = array_merge($send, parent::CheckAdd());
         if(!$this->NCIDCheck()){
            $send['NCID'] = false;
         }
         if(!$this->FirstnameCheck()){
            $send['Firstname'] = false;
         }
         if(!$this->LastnameCheck()){
            $send['Lastname'] = false;
         }
         if(!$this->GenderCheck()){
            $send['Gender'] = false;
         }
         if(!$this->UsernameCheck()){
            $send['Username'] = false;
         }
         if(!$this->PasswordCheck()){
            $send['Password'] = false;
         }
         if(!$this->JobCheck()){
            $send['Job'] = false;
         }
         if(!$this->SWorkCheck()){
            $send['SWork'] = false;
         }
         if(!$this->SBiliveCheck()){
            $send['SBilive'] = false;
         }
         if(!$this->EBiliveCheck()){
            $send['EBilive'] = false;
         }
         if(!$this->Salary()){
            $send['Salary'] = false;
         }
         if(!$this->StateCheck()){
            $send['State'] = false;
         }
         return $send;
      }
      public function CheckEdit(){
         $send = array();
         $send = array_merge($send, parent::CheckEdit());
         if(!$this->NCIDCheck()){
            $send['NCID'] = false;
         }
         if(!$this->FirstnameCheck()){
            $send['Firstname'] = false;
         }
         if(!$this->LastnameCheck()){
            $send['Lastname'] = false;
         }
         if(!$this->GenderCheck()){
            $send['Gender'] = false;
         }
         if(!$this->UsernameCheck()){
            $send['Username'] = false;
         }
         if(!$this->JobCheck()){
            $send['Job'] = false;
         }
         if(!$this->SWorkCheck()){
            $send['SWork'] = false;
         }
         if(!$this->SBiliveCheck()){
            $send['SBilive'] = false;
         }
         if(!$this->EBiliveCheck()){
            $send['EBilive'] = false;
         }
         if(!$this->Salary()){
            $send['Salary'] = false;
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
      public function CheckPrint(){
         $send = array();
         $send = array_merge($send, parent::CheckPrint());
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
               case Core::FPRINT:
                  $send = $this->CheckIndex();
                  break;
            }
         return $send;
      }

      public function PreperAdd(){
         $send = array();
         $send = array_merge($send, parent::PreperAdd());
         $send['Code'] = $this->Code();
         $send['NCID'] = $this->NCID();
         $send['Firstname'] = $this->Firstname();
         $send['Lastname'] = $this->Lastname();
         $send['Gender'] = $this->Gender();
         $send['Username'] = $this->Username();
         $send['Password'] = $this->Password();
         $send['Job'] = $this->Job();
         $send['SWork'] = $this->SWork();
         if($this->EWorkCheck()){
            $send['EWork'] = $this->EWork();
         }
         $send['SBilive'] = $this->SBilive();
         $send['EBilive'] = $this->EBilive();
         $send['Salary'] = $this->Salary();
         $send['Address'] = $this->Address();
         $send['City'] = $this->City();
         $send['Country'] = $this->Country();
         $send['Phonenumber'] = $this->Phonenumber();
         $send['Email'] = $this->Email();
         if($this->PictureCheck()){
            $send['Picture'] = $this->Picture();
         }
         $send['State'] = $this->State();
         return $send;
      }
      public function PreperEdit(){
         $send = array();
         $send = array_merge($send, parent::PreperEdit());
         $send['NCID'] = $this->NCID();
         $send['Firstname'] = $this->Firstname();
         $send['Lastname'] = $this->Lastname();
         $send['Gender'] = $this->Gender();
         $send['Username'] = $this->Username();
         if($this->PasswordCheck()){
            $send['Password'] = $this->Password();
         }
         $send['Job'] = $this->Job();
         $send['SWork'] = $this->SWork();
         if($this->EWorkCheck()){
            $send['EWork'] = $this->EWork();
         }
         $send['SBilive'] = $this->SBilive();
         $send['EBilive'] = $this->EBilive();
         $send['Salary'] = $this->Salary();
         $send['Address'] = $this->Address();
         $send['City'] = $this->City();
         $send['Country'] = $this->Country();
         $send['Phonenumber'] = $this->Phonenumber();
         $send['Email'] = $this->Email();
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
         $send['NCID'] = $this->NCID();
         $send['Firstname'] = $this->Firstname();
         $send['Lastname'] = $this->Lastname();
         $send['Username'] = $this->Username();
         $send['SWork'] = $this->SWork();
         $send['SWorkFrom'] = $this->SWorkFrom();
         $send['SWorkTo'] = $this->SWorkTo();
         $send['EWork'] = $this->EWork();
         $send['EWorkFrom'] = $this->EWorkFrom();
         $send['EWorkTo'] = $this->EWorkTo();
         $send['Country'] = $this->Country();
         $send['Gender'] = $this->Gender();
         $send['Job'] = $this->Job();
         $send['State'] = $this->State();
         $send['States'] = $this->States();
         $send['Genders'] = $this->Genders();
         $send['Countrys'] = $this->Countrys();
         $send['Jobs'] = $this->Jobs();
         return $send;
      }
      public function PreperRemove(){
         $send = array();
         $send = array_merge($send, parent::PreperRemove());
         return $send;
      }
      public function PreperPrint(){
         $send = array();

         $send = array_merge($send, parent::PreperPrint());

         $send['Employees'] = $this->Employees();

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
               case Core::FPRINT:
                  $send = $this->PreperPrint();
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
         $send['NCID'] = $this->NCID();
         $send['Firstname'] = $this->Firstname();
         $send['Lastname'] = $this->Lastname();
         $send['Gender'] = $this->Gender();
         $send['Username'] = $this->Username();
		   $send['Password'] = $this->Password();
         $send['Job'] = $this->Job();
         $send['SWork'] = $this->SWork();
         $send['EWork'] = $this->EWork();
         $send['SBilive'] = $this->SBilive();
         $send['EBilive'] = $this->EBilive();
         $send['Salary'] = $this->Salary();
         $send['Address'] = $this->Address();
         $send['City'] = $this->City();
         $send['Country'] = $this->Country();
         $send['Phonenumber'] = $this->Phonenumber();
         $send['Email'] = $this->Email();
         $send['Picture'] = $this->Picture();
         $send['State'] = $this->State();
         $send['States'] = $this->States();
         $send['Genders'] = $this->Genders();
         $send['Countrys'] = $this->Countrys();
         $send['Jobs'] = $this->Jobs();
         return $send;
      }
   }
