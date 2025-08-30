<?php
   class PurchasereturnCore extends Core{

      private $_Code;
      private $_AT;
      private $_HT;
      private $_TVA;
      private $_Tax;
      private $_Cobon;
      private $_Gift;
      private $_Reduction;
      private $_Expense;
      private $_TTC;
      private $_Notes;
      private $_Products;
      private $_Facture;

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
      public function AT($value = null) {
         if($value === null) {
            return $this->_AT;
         }else{
            $this->_AT = htmlspecialchars(trim($value));
         }
      }
      public function HT($value = null) {
         if($value === null) {
            return $this->_HT;
         }else{
            $this->_HT = (double) $value;
         }
      }
      public function TVA($value = null) {
         if($value === null) {
            return $this->_TVA;
         }else{
            $this->_TVA = (double) $value;
         }
      }
      public function Tax($value = null) {
         if($value === null) {
            return $this->_Tax;
         }else{
            $this->_Tax = (double) $value;
         }
      }
      public function Cobon($value = null) {
         if($value === null) {
            return $this->_Cobon;
         }else{
            $this->_Cobon = (is_integer((int) $value) and ((int) $value) > 0) ? ((int) $value) : CNF_ZER;
         }
      }
      public function Gift($value = null) {
         if($value === null) {
            return $this->_Gift;
         }else{
            $this->_Gift = (double) $value;
         }
      }
      public function Reduction($value = null) {
         if($value === null) {
            return $this->_Reduction;
         }else{
            $this->_Reduction = (double) $value;
         }
      }
      public function Expense($value = null) {
         if($value === null) {
            return $this->_Expense;
         }else{
            $this->_Expense = (double) $value;
         }
      }
      public function TTC($value = null) {
         if($value === null) {
            return $this->_TTC;
         }else{
            $this->_TTC = (double) $value;
         }
      }
      public function Facture($value = null) {
         if($value === null) {
            return $this->_Facture;
         }else{
            $this->_Facture = (int) $value;
         }
      }
      public function Notes($value = null) {
         if($value === null) {
            return $this->_Notes;
         }else{
            $this->_Notes = htmlspecialchars(trim($value));
         }
      }
      public function Products($values = null) {
         if($values === null) {
            return $this->_Products;
         }else{
            $this->_Products = array();
            if(is_array($values) and count($values) > 0){
               foreach($values as $value){
                  $Product = array();

                  $Product['ID'] = isset($value['id']) ? (int) $value['id'] : CNF_ZER;
                  $Product['REF'] = isset($value['ref']) ? (int) $value['ref'] : CNF_ZER;
                  $Product['Code'] = isset($value['code']) ? htmlspecialchars(trim($value['code'])) : '';
                  $Product['Name'] = isset($value['name']) ? htmlspecialchars(trim($value['name'])) : '';
                  $Product['Price'] = isset($value['price']) ? (double) $value['price'] : 0.0;
                  $Product['Quantity'] = isset($value['quantity']) ? (int) $value['quantity'] : CNF_ZER;
                  $Product['HT'] = isset($value['ht']) ? (double) $value['ht'] : 0.0;

                  $this->_Products[] = $Product;
               }
            }
         }
      }

      public function __construct(){
         parent::__construct();
      }

      public function LoadForm($in){
         parent::LoadForm($in);
         $this->Code(P($in,'Code'));
         $this->AT(P($in,'AT'));
         $this->HT(P($in,'HT'));
         $this->TVA(P($in,'TVA'));
         $this->Tax(P($in,'Tax'));
         $this->Cobon(P($in,'Cobon'));
         $this->Gift(P($in,'Gift'));
         $this->Reduction(P($in,'Reduction'));
         $this->Expense(P($in,'Expense'));
         $this->TTC(P($in,'TTC'));
         $this->Notes(P($in,'Notes'));
         $this->Products(P($in,'Products'));
         $this->Facture(P($in,'Facture'));
      }

      public function CodeCheck(){
         if($this->Code() !== ''){
            return true;
         }
      }
      public function ATCheck(){
		   return (isdate($this->AT()));
      }
      public function HTCheck(){
         if($this->HT() !== '' and $this->HT() > 0.0){
            return true;
         }
      }
      public function TVACheck(){
         if($this->TVA() !== '' and $this->TVA() >= 0.0){
            return true;
         }
      }
      public function TaxCheck(){
         if($this->Tax() !== '' and $this->Tax() >= 0.0){
            return true;
         }
      }
      public function CobonCheck(){
         if($this->Cobon() !== '' and $this->Cobon() >= 0.0){
            return true;
         }
      }
      public function GiftCheck(){
         if($this->Gift() !== '' and $this->Gift() >= 0.0){
            return true;
         }
      }
      public function ReductionCheck(){
         if($this->Reduction() !== '' and $this->Reduction() >= 0.0){
            return true;
         }
      }
      public function ExpenseCheck(){
         if($this->Expense() !== '' and $this->Expense() >= 0.0){
            return true;
         }
      }
      public function FactureCheck(){
         if($this->Facture() !== '' and $this->Facture() > 0){
            return true;
         }
      }
      public function TTCCheck(){
         if($this->TTC() !== '' and $this->TTC() > 0.0){
            return true;
         }
      }
      public function NotesCheck(){
         return true;
      }
      public function ProductsCheck($state = true){
         if(is_array($this->Products()) and count($this->Products()) > 0){
            foreach($this->Products() as $Product){

               if($state){
                  if($Product['REF'] === '' or  $Product['REF'] <= 0){
                     D(array('REF' => false));
                     return false;
                  }
               }
               
               if($Product['ID'] === '' or  $Product['ID'] <= 0){
                  return false;
               }

               if($Product['Name'] === ''){
                  return false;
               }

               if($Product['Price'] === '' or  $Product['Price'] <= 0.0){
                  return false;
               }

               if($Product['Quantity'] === '' or  $Product['Quantity'] <= 0){
                  return false;
               }

               if($Product['HT'] === '' or  $Product['HT'] <= 0.0){
                  return false;
               }

            }
         }else{
            return false;
         }
         return true;
      }
      public function CheckAdd(){
         $send = array();
         $send = array_merge($send, parent::CheckAdd());
         if(!$this->ATCheck()){
            $send['AT'] = false;
         }
         if(!$this->FactureCheck()){
            $send['Facture'] = false;
         }
         if(!$this->HTCheck()){
            $send['HT'] = false;
         }
         if(!$this->TVACheck()){
            $send['TVA'] = false;
         }
         if(!$this->TaxCheck()){
            $send['Tax'] = false;
         }
         if(!$this->CobonCheck()){
            $send['Cobon'] = false;
         }
         if(!$this->GiftCheck()){
            $send['Gift'] = false;
         }
         if(!$this->ReductionCheck()){
            $send['Reduction'] = false;
         }
         if(!$this->ExpenseCheck()){
            $send['Expense'] = false;
         }
         if(!$this->TTCCheck()){
            $send['TTC'] = false;
         }
         if(!$this->ProductsCheck()){
            $send['Products'] = false;
         }
         return $send;
      }
      public function CheckEdit(){
         $send = array();
         $send = array_merge($send, parent::CheckEdit());
         if(!$this->ATCheck()){
            $send['AT'] = false;
         }
         if(!$this->HTCheck()){
            $send['HT'] = false;
         }
         if(!$this->TVACheck()){
            $send['TVA'] = false;
         }
         if(!$this->TaxCheck()){
            $send['Tax'] = false;
         }
         if(!$this->CobonCheck()){
            $send['Cobon'] = false;
         }
         if(!$this->GiftCheck()){
            $send['Gift'] = false;
         }
         if(!$this->ReductionCheck()){
            $send['Reduction'] = false;
         }
         if(!$this->ExpenseCheck()){
            $send['Expense'] = false;
         }
         if(!$this->TTCCheck()){
            $send['TTC'] = false;
         }
         if(!$this->ProductsCheck(false)){ //false for ref
            $send['Products'] = false;
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
            $send['Facture'] = false;
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
         $send['AT'] = $this->AT();
         $send['HT'] = $this->HT();
         $send['TVA'] = $this->TVA();
         $send['Tax'] = $this->Tax();
         $send['Cobon'] = $this->Cobon();
         $send['Gift'] = $this->Gift();
         $send['Reduction'] = $this->Reduction();
         $send['Expense'] = $this->Expense();
         $send['TTC'] = $this->TTC();
         $send['Products'] = $this->Products();
         $send['Notes'] = $this->Notes();
         $send['Facture'] = $this->Facture();

         return $send;
      }
      public function PreperEdit(){
         $send = array();
         $send = array_merge($send, parent::PreperEdit());
         
         $send['AT'] = $this->AT();
         $send['HT'] = $this->HT();
         $send['TVA'] = $this->TVA();
         $send['Tax'] = $this->Tax();
         $send['Cobon'] = $this->Cobon();
         $send['Gift'] = $this->Gift();
         $send['Reduction'] = $this->Reduction();
         $send['Expense'] = $this->Expense();
         $send['TTC'] = $this->TTC();
         $send['Products'] = $this->Products();
         $send['Notes'] = $this->Notes();

         return $send;
      }
      public function PreperDisplay(){
         $send = array();
         $send = array_merge($send, parent::PreperDisplay());
         return $send;
      }
      public function PreperIndex(){
         $send = array();
         $send['Facture'] = $this->ID();
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

         $send['Facture'] = $this->Facture();
         $send['REF'] = $this->REF();
         $send['Code'] = $this->Code();
         $send['AT'] = $this->AT();
         $send['HT'] = $this->HT();
         $send['TVA'] = $this->TVA();
         $send['Tax'] = $this->Tax();
         $send['Cobon'] = $this->Cobon();
         $send['Gift'] = $this->Gift();
         $send['Reduction'] = $this->Reduction();
         $send['Expense'] = $this->Expense();
         $send['TTC'] = $this->TTC();
         $send['Products'] = $this->Products();
         $send['Notes'] = $this->Notes();

         return $send;
      }
   }
