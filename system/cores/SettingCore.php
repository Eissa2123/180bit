<?php
   class SettingCore extends Core{

      private $_RC;
      private $_TaxNumber;

      private $_CompanynameAR;
      private $_CompanynameEN;
      private $_CompanynameFR;

      private $_BossnameAR;
      private $_BossnameEN;
      private $_BossnameFR;

      private $_TVA;

      private $_NameAR;
      private $_NameEN;
      private $_NameFR;

      private $_Langue;
      private $_EN;
      private $_FR;
      private $_AR;

      private $_RIB;
      private $_IBAN;
      private $_SWIFT;
      private $_Bankname;

      private $_AddressEN;
      private $_AddressFR;
      private $_AddressAR;

      private $_ZIPCode;

      private $_RegionEN;
      private $_RegionFR;
      private $_RegionAR;

      private $_CityAR;
      private $_CityEN;
      private $_CityFR;

      private $_CountryAR;
      private $_CountryEN;
      private $_CountryFR;

      private $_PN1;
      private $_PN2;
      private $_PN3;

      private $_Fax;

      private $_Email1;
      private $_Email2;
      private $_Email3;

      private $_State;
      private $_Class;

      private $_Logo;

      private $_Theme;

      public function RC($value = null) {
         if($value === null) {
            return $this->_RC;
         }else{
            $this->_RC = htmlspecialchars(trim($value));
         }
      }

      public function TaxNumber($value = null) {
         if($value === null) {
            return $this->_TaxNumber;
         }else{
            $this->_TaxNumber = htmlspecialchars(trim($value));
         }
      }

      public function CompanynameAR($value = null) {
         if($value === null) {
            return $this->_CompanynameAR;
         }else{
            $this->_CompanynameAR = htmlspecialchars(trim($value));
         }
      }

      public function CompanynameEN($value = null) {
         if($value === null) {
            return $this->_CompanynameEN;
         }else{
            $this->_CompanynameEN = htmlspecialchars(trim($value));
         }
      }

      public function CompanynameFR($value = null) {
         if($value === null) {
            return $this->_CompanynameFR;
         }else{
            $this->_CompanynameFR = htmlspecialchars(trim($value));
         }
      }

      public function BossnameAR($value = null) {
         if($value === null) {
            return $this->_BossnameAR;
         }else{
            $this->_BossnameAR = htmlspecialchars(trim($value));
         }
      }

      public function BossnameEN($value = null) {
         if($value === null) {
            return $this->_BossnameEN;
         }else{
            $this->_BossnameEN = htmlspecialchars(trim($value));
         }
      }

      public function BossnameFR($value = null) {
         if($value === null) {
            return $this->_BossnameFR;
         }else{
            $this->_BossnameFR = htmlspecialchars(trim($value));
         }
      }

      public function TVA($value = null) {
         if($value === null) {
            return $this->_TVA;
         }else{
            $this->_TVA = (double) (trim($value));
         }
      }

      public function NameAR($value = null) {
         if($value === null) {
            return $this->_NameAR;
         }else{
            $this->_NameAR = htmlspecialchars(trim($value));
         }
      }

      public function NameEN($value = null) {
         if($value === null) {
            return $this->_NameEN;
         }else{
            $this->_NameEN = htmlspecialchars(trim($value));
         }
      }

      public function NameFR($value = null) {
         if($value === null) {
            return $this->_NameFR;
         }else{
            $this->_NameFR = htmlspecialchars(trim($value));
         }
      }

      public function Langue($value = null) {
         if($value === null) {
            return $this->_Langue;
         }else{
            $this->_Langue = htmlspecialchars(trim($value));
         }
      }

      public function AR($value = null) {
         if($value === null) {
            return $this->_AR;
         }else{
            $value = htmlspecialchars(trim($value));
            if($value === 'AR'){
               $value = 2;
            }else{
               $value = 3;
            }
            $this->_AR = $value;
         }
      }

      public function FR($value = null) {
         if($value === null) {
            return $this->_FR;
         }else{
            $value = htmlspecialchars(trim($value));
            if($value === 'FR'){
               $value = 2;
            }else{
               $value = 3;
            }
            $this->_FR = $value;
         }
      }

      public function EN($value = null) {
         if($value === null) {
            return $this->_EN;
         }else{
            $value = htmlspecialchars(trim($value));
            if($value === 'EN'){
               $value = 2;
            }else{
               $value = 3;
            }
            $this->_EN = $value;
         }
      }

      public function RIB($value = null) {
         if($value === null) {
            return $this->_RIB;
         }else{
            $this->_RIB = htmlspecialchars(trim($value));
         }
      }

      public function IBAN($value = null) {
         if($value === null) {
            return $this->_IBAN;
         }else{
            $this->_IBAN = htmlspecialchars(trim($value));
         }
      }

      public function SWIFT($value = null) {
         if($value === null) {
            return $this->_SWIFT;
         }else{
            $this->_SWIFT = htmlspecialchars(trim($value));
         }
      }

      public function Bankname($value = null) {
         if($value === null) {
            return $this->_Bankname;
         }else{
            $this->_Bankname = htmlspecialchars(trim($value));
         }
      }

      public function AddressEN($value = null) {
         if($value === null) {
            return $this->_AddressEN;
         }else{
            $this->_AddressEN = htmlspecialchars(trim($value));
         }
      }

      public function AddressFR($value = null) {
         if($value === null) {
            return $this->_AddressFR;
         }else{
            $this->_AddressFR = htmlspecialchars(trim($value));
         }
      }

      public function AddressAR($value = null) {
         if($value === null) {
            return $this->_AddressAR;
         }else{
            $this->_AddressAR = htmlspecialchars(trim($value));
         }
      }

      public function ZIPCode($value = null) {
         if($value === null) {
            return $this->_ZIPCode;
         }else{
            $this->_ZIPCode = htmlspecialchars(trim($value));
         }
      }

      public function RegionEN($value = null) {
         if($value === null) {
            return $this->_RegionEN;
         }else{
            $this->_RegionEN = htmlspecialchars(trim($value));
         }
      }

      public function RegionFR($value = null) {
         if($value === null) {
            return $this->_RegionFR;
         }else{
            $this->_RegionFR = htmlspecialchars(trim($value));
         }
      }

      public function RegionAR($value = null) {
         if($value === null) {
            return $this->_RegionAR;
         }else{
            $this->_RegionAR = htmlspecialchars(trim($value));
         }
      }

      public function CityAR($value = null) {
         if($value === null) {
            return $this->_CityAR;
         }else{
            $this->_CityAR = htmlspecialchars(trim($value));
         }
      }

      public function CityEN($value = null) {
         if($value === null) {
            return $this->_CityEN;
         }else{
            $this->_CityEN = htmlspecialchars(trim($value));
         }
      }

      public function CityFR($value = null) {
         if($value === null) {
            return $this->_CityFR;
         }else{
            $this->_CityFR = htmlspecialchars(trim($value));
         }
      }

      public function CountryAR($value = null) {
         if($value === null) {
            return $this->_CountryAR;
         }else{
            $this->_CountryAR = htmlspecialchars(trim($value));
         }
      }

      public function CountryEN($value = null) {
         if($value === null) {
            return $this->_CountryEN;
         }else{
            $this->_CountryEN = htmlspecialchars(trim($value));
         }
      }

      public function CountryFR($value = null) {
         if($value === null) {
            return $this->_CountryFR;
         }else{
            $this->_CountryFR = htmlspecialchars(trim($value));
         }
      }

      public function PN1($value = null) {
         if($value === null) {
            return $this->_PN1;
         }else{
            $this->_PN1 = htmlspecialchars(trim($value));
         }
      }

      public function PN2($value = null) {
         if($value === null) {
            return $this->_PN2;
         }else{
            $this->_PN2 = htmlspecialchars(trim($value));
         }
      }

      public function PN3($value = null) {
         if($value === null) {
            return $this->_PN3;
         }else{
            $this->_PN3 = htmlspecialchars(trim($value));
         }
      }

      public function Fax($value = null) {
         if($value === null) {
            return $this->_Fax;
         }else{
            $this->_Fax = htmlspecialchars(trim($value));
         }
      }

      public function Email1($value = null) {
         if($value === null) {
            return $this->_Email1;
         }else{
            $this->_Email1 = htmlspecialchars(trim($value));
         }
      }

      public function Email2($value = null) {
         if($value === null) {
            return $this->_Email2;
         }else{
            $this->_Email2 = htmlspecialchars(trim($value));
         }
      }

      public function Email3($value = null) {
         if($value === null) {
            return $this->_Email3;
         }else{
            $this->_Email3 = htmlspecialchars(trim($value));
         }
      }

      public function Logo($value = null) {
         if($value === null) {
            return $this->_Logo;
         }else{
            $this->_Logo = htmlspecialchars(trim($value));
         }
      }

      public function State($value = null) {
         if($value === null) {
            return $this->_State;
         }else{
            $this->_State = htmlspecialchars(trim($value));
         }
      }

      public function Class($value = null) {
         if($value === null) {
            return $this->_Class;
         }else{
            $this->_Class = htmlspecialchars(trim($value));
         }
      }

      public function Theme($value = null) {
         if($value === null) {
            return $this->_Theme;
         }else{
            $this->_Theme = htmlspecialchars(trim($value));
         }
      }

      public function __construct(){
         parent::__construct();
      }

      public function LoadForm($in){
         parent::LoadForm($in);

         $this->RC(P($in,'RC'));
         $this->TaxNumber(P($in,'TaxNumber'));

         $this->CompanynameAR(P($in,'CompanynameAR'));
         $this->CompanynameEN(P($in,'CompanynameEN'));
         $this->CompanynameFR(P($in,'CompanynameFR'));

         $this->BossnameAR(P($in,'BossnameAR'));
         $this->BossnameEN(P($in,'BossnameEN'));
         $this->BossnameFR(P($in,'BossnameFR'));

         $this->NameAR(P($in,'NameAR'));
         $this->NameEN(P($in,'NameEN'));
         $this->NameFR(P($in,'NameFR'));

         $this->TVA(P($in,'TVA'));

         $this->Langue(P($in,'defaultlang'));

         $this->AR(P($in,'LangAR'));
         $this->EN(P($in,'LangEN'));
         $this->FR(P($in,'LangFR'));

         $this->Bankname(P($in,'Bankname'));
         $this->RIB(P($in,'RIB'));
         $this->IBAN(P($in,'IBAN'));
         $this->SWIFT(P($in,'SWIFT'));

         $this->AddressAR(P($in,'AddressAR'));
         $this->AddressFR(P($in,'AddressFR'));
         $this->AddressEN(P($in,'AddressEN'));

         $this->ZIPCode(P($in,'ZIPCode'));

         $this->RegionAR(P($in,'RegionAR'));
         $this->RegionFR(P($in,'RegionFR'));
         $this->RegionEN(P($in,'RegionEN'));

         $this->CityAR(P($in,'CityAR'));
         $this->CityEN(P($in,'CityEN'));
         $this->CityFR(P($in,'CityFR'));

         $this->CountryAR(P($in,'CountryAR'));
         $this->CountryEN(P($in,'CountryEN'));
         $this->CountryFR(P($in,'CountryFR'));

         $this->PN1(P($in,'PN1'));
         $this->PN2(P($in,'PN2'));
         $this->PN3(P($in,'PN3'));

         $this->Fax(P($in,'Fax'));

         $this->Email1(P($in,'Email1'));
         $this->Email2(P($in,'Email2'));
         $this->Email3(P($in,'Email3'));

         $this->State(P($in,'State'));
         $this->Class(P($in,'Class'));

         $this->Logo(F($in,'Logo'));

         $this->Theme(P($in,'Theme'));
      }

      public function StateCheck(){
         if($this->State() !== ''){
            return true;
         }
      }

      public function LogoCheck(){
         if($this->Logo() !== ''){
            return true;
         }
      }

      public function ClassCheck(){
         if($this->Class() !== ''){
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

         $send['RC'] = $this->RC();
         $send['TaxNumber'] = $this->TaxNumber();

         $send['CompanynameAR'] = $this->CompanynameAR();
         $send['CompanynameEN'] = $this->CompanynameEN();
         $send['CompanynameFR'] = $this->CompanynameFR();

         $send['BossnameAR'] = $this->BossnameAR();
         $send['BossnameEN'] = $this->BossnameEN();
         $send['BossnameFR'] = $this->BossnameFR();

         $send['NameAR'] = $this->NameAR();
         $send['NameEN'] = $this->NameEN();
         $send['NameFR'] = $this->NameFR();

         $send['TVA'] = $this->TVA();

         $send['Langue'] = $this->Langue();
         //$send['AR'] = $this->AR();
         $send['EN'] = $this->EN();
         $send['FR'] = $this->FR();

         $send['RIB'] = $this->RIB();
         $send['IBAN'] = $this->IBAN();
         $send['SWIFT'] = $this->SWIFT();
         $send['Bankname'] = $this->Bankname();

         $send['AddressAR'] = $this->AddressAR();
         $send['AddressFR'] = $this->AddressFR();
         $send['AddressEN'] = $this->AddressEN();

         $send['ZIPCode'] = $this->ZIPCode();

         $send['RegionAR'] = $this->RegionAR();
         $send['RegionFR'] = $this->RegionFR();
         $send['RegionEN'] = $this->RegionEN();

         $send['CityAR'] = $this->CityAR();
         $send['CityEN'] = $this->CityEN();
         $send['CityFR'] = $this->CityFR();

         $send['CountryAR'] = $this->CountryAR();
         $send['CountryEN'] = $this->CountryEN();
         $send['CountryFR'] = $this->CountryFR();

         $send['PN1'] = $this->PN1();
         $send['PN2'] = $this->PN2();
         $send['PN3'] = $this->PN3();

         $send['Fax'] = $this->Fax();

         $send['Email1'] = $this->Email1();
         $send['Email2'] = $this->Email2();
         $send['Email3'] = $this->Email3();

         $send['State'] = $this->State();

         if($this->LogoCheck()){
            $send['Logo'] = $this->Logo();
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
			if($this->LogoCheck()){
				Saveimage($this->Logo());
			}
		}

      public function Toarray(){
         $send = array();

         $send = array_merge($send, parent::Toarray());

         $send['NameAR'] = $this->NameAR();
         $send['NameEN'] = $this->NameEN();
         $send['NameFR'] = $this->NameFR();

         $send['Langue'] = $this->Langue();

         $send['AR'] = $this->AR();
         $send['EN'] = $this->EN();
         $send['FR'] = $this->FR();

         $send['RIB'] = $this->RIB();
         $send['IBAN'] = $this->IBAN();
         $send['SWIFT'] = $this->SWIFT();
         $send['Bankname'] = $this->Bankname();

         $send['AddressAR'] = $this->AddressAR();
         $send['AddressFR'] = $this->AddressFR();
         $send['AddressEN'] = $this->AddressEN();

         $send['RegionAR'] = $this->RegionAR();
         $send['RegionFR'] = $this->RegionFR();
         $send['RegionEN'] = $this->RegionEN();

         $send['CityAR'] = $this->CityAR();
         $send['CityEN'] = $this->CityEN();
         $send['CityFR'] = $this->CityFR();

         $send['CountryAR'] = $this->CountryAR();
         $send['CountryEN'] = $this->CountryEN();
         $send['CountryFR'] = $this->CountryFR();

         $send['PN1'] = $this->PN1();
         $send['PN2'] = $this->PN2();
         $send['PN3'] = $this->PN3();

         $send['Fax'] = $this->PN3();

         $send['Email1'] = $this->Email1();
         $send['Email2'] = $this->Email2();
         $send['Email3'] = $this->Email3();

         $send['State'] = $this->State();
         $send['Class'] = $this->Class();
         
         $send['Logo'] = $this->Logo();

         return $send;
      }
   }
   