<?php
   class BalanceproductCore extends Core{

      private $_Code;
      private $_Product;
      private $_Price;
      private $_Quantity;
      private $_State;
      
      private $_Products;
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
      public function Product($value = null) {
         if($value === null) {
            return $this->_Product;
         }else{
            $this->_Product = $value;
         }
      }
      public function Price($value = null) {
         if($value === null) {
            return $this->_Price;
         }else{
            $this->_Price = (double) $value;
         }
      }
      public function Quantity($value = null) {
         if($value === null) {
            return $this->_Quantity;
         }else{
            $this->_Quantity = (int) $value;
         }
      }
      public function State($value = null) {
         if($value === null) {
            return $this->_State;
         }else{
            $this->_State = (int) $value;
         }
      }
      public function Products($value = null) {
         if($value === null) {
            return $this->_Products;
         }else{
            $this->_Products = $value;
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

         $this->Product(P($in,'Product'));
         $this->Price(P($in,'Price'));
         $this->Quantity(P($in,'Quantity'));
         $this->State('2');//P($in,'State')

         $this->Products(P($in,'Products'));
      }

      public function CodeCheck(){
         if($this->Code() !== ''){
            return true;
         }
      }

      public function ProductCheck(){
         if($this->Product() !== '' && $this->Product() > 0){
            return true;
         }
      }

      public function PriceCheck(){
         if($this->Price() !== '' && $this->Price() > 0.0){
            return true;
         }
      }

      public function QuantityCheck(){
         if($this->Quantity() !== '' && $this->Quantity() > 0){
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
      public function CheckAdd(){
         $send = array();
         $send = array_merge($send, parent::CheckAdd());
         
         if(!$this->ProductCheck()){
            $send['Product'] = false;
         }
         if(!$this->PriceCheck()){
            $send['Price'] = false;
         }
         if(!$this->QuantityCheck()){
            $send['Quantity'] = false;
         }
         /*if(!$this->StateCheck()){
            $send['State'] = false;
         }*/
         return $send;
      }
      public function CheckEdit(){
         $send = array();
         $send = array_merge($send, parent::CheckEdit());
         /*if(!$this->ProductCheck()){
            $send['Product'] = false;
         }*/
         if(!$this->PriceCheck()){
            $send['Price'] = false;
         }
         if(!$this->QuantityCheck()){
            $send['Quantity'] = false;
         }
         /*if(!$this->StateCheck()){
            $send['State'] = false;
         }*/
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
         
         $send['Product'] = $this->Product();
         $send['Price'] = $this->Price();
         $send['Quantity'] = $this->Quantity();
         $send['State'] = $this->State();

         return $send;
      }
      public function PreperEdit(){
         $send = array();
         $send = array_merge($send, parent::PreperEdit());
         
         //$send['Code'] = $this->Code();
         //$send['Product'] = $this->Product();
         $send['Price'] = $this->Price();
         $send['Quantity'] = $this->Quantity();
         //$send['State'] = $this->State();

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
         $send['Product'] = $this->Product();
         $send['Products'] = $this->Products();
         $send['States'] = $this->States();

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
         $send['Product'] = $this->Product();
         $send['Price'] = $this->Price();
         $send['Quantity'] = $this->Quantity();
         $send['State'] = $this->State();
         $send['Products'] = $this->Products();
         $send['States'] = $this->States();

         return $send;
      }
   }
