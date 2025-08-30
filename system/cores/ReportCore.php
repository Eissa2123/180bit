<?php
   class ReportCore extends Core{

      private $_NameAR;
      private $_NameEN;
      private $_NameFR;
      private $_Langue;
      private $_EN;
      private $_FR;
      private $_AR;
      private $_AddressEN;
      private $_AddressFR;
      private $_AddressAR;
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
      private $_Email1;
      private $_Email2;
      private $_Email3;
      private $_State;
      private $_Class;

      private $_Theme;

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

         $this->NameAR(P($in,'NameAR'));
         $this->NameEN(P($in,'NameEN'));
         $this->NameFR(P($in,'NameFR'));

         $this->Langue(P($in,'defaultlang'));

         $this->AR(P($in,'LangAR'));
         $this->EN(P($in,'LangEN'));
         $this->FR(P($in,'LangFR'));

         $this->AddressAR(P($in,'AddressAR'));
         $this->AddressFR(P($in,'AddressFR'));
         $this->AddressEN(P($in,'AddressEN'));

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

         $this->Email1(P($in,'Email1'));
         $this->Email2(P($in,'Email2'));
         $this->Email3(P($in,'Email3'));

         $this->State(P($in,'State'));
         $this->Class(P($in,'Class'));

         $this->Theme(P($in,'Theme'));
      }

      public function StateCheck(){
         if($this->State() !== ''){
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

         $send['NameAR'] = $this->NameAR();
         $send['NameEN'] = $this->NameEN();
         $send['NameFR'] = $this->NameFR();

         $send['Langue'] = $this->Langue();

         //$send['AR'] = $this->AR();
         $send['EN'] = $this->EN();
         $send['FR'] = $this->FR();

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

         $send['Email1'] = $this->Email1();
         $send['Email2'] = $this->Email2();
         $send['Email3'] = $this->Email3();

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

         $send['NameAR'] = $this->NameAR();
         $send['NameEN'] = $this->NameEN();
         $send['NameFR'] = $this->NameFR();

         $send['Langue'] = $this->Langue();

         $send['AR'] = $this->AR();
         $send['EN'] = $this->EN();
         $send['FR'] = $this->FR();

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

         $send['Email1'] = $this->Email1();
         $send['Email2'] = $this->Email2();
         $send['Email3'] = $this->Email3();

         $send['State'] = $this->State();
         $send['Class'] = $this->Class();

         return $send;
      }
   }
