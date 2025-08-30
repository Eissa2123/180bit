<?php
   class SalepaymentCore extends Core{

      private $_Code;
      private $_Amount;
      private $_AT;
      private $_ATFrom;
      private $_ATTo;
      private $_Sale;
      private $_Method;
      private $_Customer;
      private $_Type;
      private $_State;

      private $_Methods;
      private $_States;
      private $_Customers;

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
      public function Amount($value = null) {
         if($value === null) {
            return $this->_Amount;
         }else{
            $this->_Amount = (double) $value;
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
      public function Sale($value = null) {
         if($value === null) {
            return $this->_Sale;
         }else{
            $this->_Sale =  (int) $value;
         }
      }
      public function Method($value = null) {
         if($value === null) {
            return $this->_Method;
         }else{
            $this->_Method = (int) $value;
         }
      }
      public function Customer($value = null) {
         if($value === null) {
            return $this->_Customer;
         }else{
            $this->_Customer = (int) $value;
         }
      }
      public function Type($value = null) {
         if($value === null) {
            return $this->_Type;
         }else{
            $this->_Type = (int) $value;
         }
      }
      public function State($value = null) {
         if($value === null) {
            return $this->_State;
         }else{
            $this->_State = (int) $value;
         }
      }
      public function Methods($value = null) {
         if($value === null) {
            return $this->_Methods;
         }else{
            $this->_Methods = $value;
         }
      }
      public function States($value = null) {
         if($value === null) {
            return $this->_States;
         }else{
            $this->_States = $value;
         }
      }
      public function Customers($value = null) {
         if($value === null) {
            return $this->_Customers;
         }else{
            $this->_Customers = $value;
         }
      }

      public function __construct(){
         parent::__construct();
      }

      public function LoadForm($in){
         parent::LoadForm($in);
         $this->Code(P($in,'Code'));
         $this->Amount(P($in,'Amount'));
         $this->AT(P($in,'AT'));
         $this->ATFrom(P($in,'ATFrom'));
         $this->ATTo(P($in,'ATTo'));
         $this->Sale(P($in,'Sale'));
         $this->Method(P($in,'Method'));
         $this->Customer(P($in,'Customer'));
         $this->Type(P($in,'Type'));
         $this->State(P($in,'State'));
      }

      public function CodeCheck(){
         if($this->Code() !== ''){
            return true;
         }
      }
      public function AmountCheck(){
         if($this->Amount() !== '' and $this->Amount() > 0.0){
            return true;
         }
      }
      public function ATCheck(){
         if($this->AT() !== '' and isdate($this->AT())){
            return true;
         }
      }
      public function ATFromCheck(){
         if($this->ATFrom() !== '' and isdate($this->ATFrom())){
            return true;
         }
      }
      public function ATToCheck(){
         if($this->ATTo() !== '' and isdate($this->ATTo())){
            return true;
         }
      }
      public function SaleCheck(){
         if($this->Sale() !== '' and $this->Sale() > 0){
            return true;
         }
      }
      public function MethodCheck(){
         if($this->Method() !== '' and $this->Method() > 0){
            return true;
         }
      }
      public function CustomerCheck(){
         if($this->Customer() !== '' and $this->Customer() > 0){
            return true;
         }
      }
      public function TypeCheck(){
         if($this->Type() !== '' and in_array($this->Type(), [-1, 1])){
            return true;
         }
      }
      public function StateCheck(){
         if($this->State() !== '' and $this->State() > 0){
            return true;
         }
      }
      public function MethodsCheck(){
         if(is_array($this->Methods()) and count($this->Methods())> 0){
            return true;
         }
      }
      public function StatesCheck(){
         if(is_array($this->States()) and count($this->States())> 0){
            return true;
         }
      }
      public function CustomersCheck(){
         if(is_array($this->Customer()) and count($this->Customers())> 0){
            return true;
         }
      }
      public function CheckAdd(){
         $send = array();
         $send = array_merge($send, parent::CheckAdd());
         if(!$this->AmountCheck()){
            $send['Amount'] = false;
         }
         if(!$this->ATCheck()){
            $send['AT'] = false;
         }
         /*if(!$this->SaleCheck()){
            $send['Sale'] = false;
         }*/
         if(!$this->MethodCheck()){
            $send['Method'] = false;
         }
         if(!$this->CustomerCheck()){
            $send['Customer'] = false;
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
         if(!$this->AmountCheck()){
            $send['Amount'] = false;
         }
         if(!$this->ATCheck()){
            $send['AT'] = false;
         }
         if(!$this->MethodCheck()){
            $send['Method'] = false;
         }
         if(!$this->CustomerCheck()){
            $send['Customer'] = false;
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
         //$send = array_merge($send, parent::CheckIndex());
         if(!$this->IDCheck()){
            $send['Sale'] = false;
         }
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
         $send['Amount'] = $this->Amount();
         $send['AT'] = $this->AT();
         $send['Facture'] = $this->Sale();
         $send['Method'] = $this->Method();
         $send['Customer'] = $this->Customer();
         $send['Type'] = $this->Type();
         $send['State'] = $this->State();
         return $send;
      }
      public function PreperEdit(){
         $send = array();
         $send = array_merge($send, parent::PreperEdit());
         $send['Amount'] = $this->Amount();
         $send['AT'] = $this->AT();
         $send['Method'] = $this->Method();
         $send['Customer'] = $this->Customer();
         $send['Type'] = $this->Type();
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
         $send['Sale'] = $this->ID();
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
         $send['Amount'] = $this->Amount();
         $send['AT'] = $this->AT();
         $send['ATFrom'] = $this->ATFrom();
         $send['ATTo'] = $this->ATTo();
         $send['Sale'] = $this->Sale();
         $send['Method'] = $this->Method();
         $send['Customer'] = $this->Customer();
         $send['Type'] = $this->Type();
         $send['State'] = $this->State();
         $send['Customer'] = $this->Customer();
         $send['Methods'] = $this->Methods();
         $send['States'] = $this->States();
         $send['Customers'] = $this->Customers();
         return $send;
      }
   }
