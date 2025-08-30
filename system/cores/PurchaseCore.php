<?php
   class PurchaseCore extends Core{

      private $_Code;
      private $_Provider;
      private $_AT;
      private $_ATFrom;
      private $_ATTo;
      private $_HT;
      private $_TVA;
      private $_Tax;
      private $_Cobon;
      private $_Gift;
      private $_Reduction;
      private $_Expense;
      private $_Paid;
      private $_PaidMonetary;
      private $_PaidOnline;
      private $_Method;
      private $_Rest;
      private $_TTC;
      private $_Notes;
      private $_State;
      
      private $_Providers;
      private $_Terms;
      private $_Methods;
      private $_Products;
      private $_Categories;
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
      public function Provider($value = null) {
         if($value === null) {
            return $this->_Provider;
         }else{
            $this->_Provider =  (is_integer((int) $value) and ((int) $value) > 0) ? ((int) $value) : CNF_ZER;
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
      public function Paid($value = null) {
         if($value === null) {
            return $this->_Paid;
         }else{
            $this->_Paid = (double) $value;
         }
      }
      public function PaidMonetary($value = null) {
         if($value === null) {
            return $this->_PaidMonetary;
         }else{
            $this->_PaidMonetary = (double) $value;
         }
      }
      public function PaidOnline($value = null) {
         if($value === null) {
            return $this->_PaidOnline;
         }else{
            $this->_PaidOnline = (double) $value;
         }
      }
      public function Rest($value = null) {
         if($value === null) {
            return $this->_Rest;
         }else{
            $this->_Rest = (double) $value;
         }
      }
      public function TTC($value = null) {
         if($value === null) {
            return $this->_TTC;
         }else{
            $this->_TTC = (double) $value;
         }
      }
      public function Method($value = null) {
         if($value === null) {
            return $this->_Method;
         }else{
            $this->_Method = (int) $value;
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
                  $Product['Code'] = isset($value['code']) ? htmlspecialchars(trim($value['code'])) : '';
                  $Product['Name'] = isset($value['name']) ? htmlspecialchars(trim($value['name'])) : '';
                  $Product['Description'] = isset($value['description']) ? htmlspecialchars(trim($value['description'])) : '';
                  $Product['Price'] = isset($value['price']) ? (double) $value['price'] : 0.0;
                  $Product['Quantity'] = isset($value['quantity']) ? (int) $value['quantity'] : CNF_ZER;
                  $Product['HT'] = isset($value['ht']) ? (double) $value['ht'] : 0.0;
                  //$Product['Tax'] = isset($value['tax']) ? (double) $value['tax'] : 0.0;

                  $this->_Products[] = $Product;
               }
            }
         }
      }
      public function Categories($value = null) {
         if($value === null) {
            return $this->_Categories;
         }else{
            $this->_Categories = $value;
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
      public function Providers($value = null) {
         if($value === null) {
            return $this->_Providers;
         }else{
            $this->_Providers = $value;
         }
      }
      public function Methods($value = null) {
         if($value === null) {
            return $this->_Methods;
         }else{
            $this->_Methods = $value;
         }
      }
      public function Terms($value = null) {
         if($value === null) {
            return $this->_Terms;
         }else{
            $this->_Terms = $value;
         }
      }

      public function __construct(){
         parent::__construct();
      }

      public function LoadForm($in){
         parent::LoadForm($in);
         $this->Code(P($in,'Code'));
         $this->Provider(P($in,'Provider'));
         $this->AT(P($in,'AT'));
         $this->ATFrom(P($in,'ATFrom'));
         $this->ATTo(P($in,'ATTo'));
         $this->HT(P($in,'HT'));
         $this->TVA(P($in,'TVA'));
         $this->Tax(P($in,'Tax'));
         $this->Cobon(P($in,'Cobon'));
         $this->Gift(P($in,'Gift'));
         $this->Reduction(P($in,'Reduction'));
         $this->Expense(P($in,'Expense'));
         $this->Paid(P($in,'Paid'));
         $this->PaidMonetary(P($in,'PaidMonetary'));
         $this->PaidOnline(P($in,'PaidOnline'));
         $this->Rest(P($in,'Rest'));
         $this->TTC(P($in,'TTC'));
         $this->Method(P($in,'Method'));
         $this->Notes(P($in,'Notes'));
         //$this->State(P($in,'State'));

         $this->Products(P($in,'Products'));
         $this->States(P($in,'States'));
         $this->Categories(P($in,'Categories'));
         $this->Providers(P($in,'Providers'));
         $this->Terms(P($in,'Terms'));
         $this->Methods(P($in,'Methods'));
      }

      public function CodeCheck(){
         if($this->Code() !== ''){
            return true;
         }
      }
      public function ProviderCheck(){
         if($this->Provider() !== '' and $this->Provider() > 0){
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
      public function PaidCheck(){
         if($this->Paid() !== '' and $this->Paid() >= 0.0){
            return true;
         }
      }
      public function PaidMonetaryCheck(){
         if($this->PaidMonetary() !== '' and $this->PaidMonetary() >= 0.0){
            return true;
         }
      }
      public function PaidOnlineCheck(){
         if($this->PaidOnline() !== '' and $this->PaidOnline() >= 0.0){
            return true;
         }
      }
      public function RestCheck(){
         if($this->Rest() !== '' and $this->Rest() >= 0.0){
            return true;
         }
      }
      public function TTCCheck(){
         if($this->TTC() !== '' and $this->TTC() > 0.0){
            return true;
         }
      }
      public function MethodCheck(){
         if($this->Method() !== '' and $this->Method() > 0){
            return true;
         }
      }
      public function NotesCheck(){
         return true;
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
      public function ProvidersCheck(){
         if(is_array($this->Provider()) and count($this->Providers())> 0){
            return true;
         }
      }
      public function ProductsCheck(){
         if(is_array($this->Products()) and count($this->Products()) > 0){
            foreach($this->Products() as $Product){
               
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

               /*if($Product['Tax'] === '' or  $Product['Tax'] < 0.0){
                  return false;
               }*/

            }
         }
         return true;
      }
      public function CategoriesCheck(){
         if(is_array($this->Categories()) and count($this->Categories())> 0){
            return true;
         }
      }
      public function CheckAdd(){
         $send = array();
         $send = array_merge($send, parent::CheckAdd());
         if(!$this->ProviderCheck()){
            $send['Provider'] = false;
         }
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
         /*if(!$this->CobonCheck()){
            $send['Cobon'] = false;
         }*/
         if(!$this->GiftCheck()){
            $send['Gift'] = false;
         }
         if(!$this->ReductionCheck()){
            $send['Reduction'] = false;
         }
         if(!$this->ExpenseCheck()){
            $send['Expense'] = false;
         }
         if(!$this->PaidCheck()){
            $send['Paid'] = false;
         }
         if(!$this->PaidMonetaryCheck()){
            $send['PaidMonetary'] = false;
         }
         if(!$this->PaidOnlineCheck()){
            $send['PaidOnline'] = false;
         }
         if(!$this->RestCheck()){
            $send['Rest'] = false;
         }
         if(!$this->TTCCheck()){
            $send['TTC'] = false;
         } 
         /*if(!$this->MethodCheck()){
            $send['Method'] = false;
         }*/
         if(!$this->ProductsCheck()){
            $send['Products'] = false;
         }
         /*if(!$this->StateCheck()){
            $send['State'] = false;
         }*/
         return $send;
      }
      public function CheckEdit(){
         $send = array();
         $send = array_merge($send, parent::CheckEdit());
         if(!$this->ProviderCheck()){
            $send['Provider'] = false;
         }
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
         /*if(!$this->CobonCheck()){
            $send['Cobon'] = false;
         }*/
         if(!$this->GiftCheck()){
            $send['Gift'] = false;
         }
         if(!$this->ReductionCheck()){
            $send['Reduction'] = false;
         }
         if(!$this->ExpenseCheck()){
            $send['Expense'] = false;
         }
         if(!$this->PaidCheck()){
            $send['Paid'] = false;
         }
         if(!$this->PaidMonetaryCheck()){
            $send['PaidMonetary'] = false;
         }
         if(!$this->PaidOnlineCheck()){
            $send['PaidOnline'] = false;
         }
         if(!$this->RestCheck()){
            $send['Rest'] = false;
         }
         if(!$this->TTCCheck()){
            $send['TTC'] = false;
         }
         if(!$this->ProductsCheck()){
            $send['Products'] = false;
         }
         /*if(!$this->MethodCheck()){
            $send['Method'] = false;
         }*/
         if(!$this->ProductsCheck()){
            $send['Products'] = false;
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
         $send['Provider'] = $this->Provider();
         $send['AT'] = $this->AT();
         $send['HT'] = $this->HT();
         $send['TVA'] = $this->TVA();
         $send['Tax'] = $this->Tax();
         $send['Cobon'] = $this->Cobon();
         $send['Gift'] = $this->Gift();
         $send['Reduction'] = $this->Reduction();
         $send['Expense'] = $this->Expense();
         $send['Paid'] = $this->Paid();
         $send['PaidMonetary'] = $this->PaidMonetary();
         $send['PaidOnline'] = $this->PaidOnline();
         $send['Rest'] = $this->Rest();
         $send['TTC'] = $this->TTC();
         //$send['Method'] = $this->Method();
         $send['Products'] = $this->Products();
         $send['Terms'] = $this->Terms();
         $send['Notes'] = $this->Notes();
         /*$send['State'] = $this->State();*/

         return $send;
      }
      public function PreperEdit(){
         $send = array();
         $send = array_merge($send, parent::PreperEdit());
         
         $send['Provider'] = $this->Provider();
         $send['AT'] = $this->AT();
         $send['HT'] = $this->HT();
         $send['TVA'] = $this->TVA();
         $send['Tax'] = $this->Tax();
         //$send['Cobon'] = $this->Cobon();
         $send['Gift'] = $this->Gift();
         $send['Reduction'] = $this->Reduction();
         $send['Expense'] = $this->Expense();
         $send['Paid'] = $this->Paid();
         $send['Rest'] = $this->Rest();
         $send['TTC'] = $this->TTC();
         $send['Products'] = $this->Products();
         $send['Terms'] = $this->Terms();
         $send['Notes'] = $this->Notes();
         /*$send['State'] = $this->State();*/

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
         $send['AT'] = $this->AT();
         $send['ATFrom'] = $this->ATFrom();
         $send['ATTo'] = $this->ATTo();
         $send['Providers'] = $this->Providers();
         $send['Categories'] = $this->Categories();
         $send['States'] = $this->States();

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

         $send['Providers'] = $this->Providers();

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

      public function Toarray(){
         $send = array();

         $send = array_merge($send, parent::Toarray());

         $send['Code'] = $this->Code();
         $send['Provider'] = $this->Provider();
         $send['AT'] = $this->AT();
         $send['HT'] = $this->HT();
         $send['TVA'] = $this->TVA();
         $send['Tax'] = $this->Tax();
         $send['Cobon'] = $this->Cobon();
         $send['Gift'] = $this->Gift();
         $send['Reduction'] = $this->Reduction();
         $send['Expense'] = $this->Expense();
         $send['Paid'] = $this->Paid();
         $send['PaidMonetary'] = $this->PaidMonetary();
         $send['PaidOnline'] = $this->PaidOnline();
         $send['Rest'] = $this->Rest();
         $send['TTC'] = $this->TTC();
         $send['Method'] = $this->Method();
         $send['Products'] = $this->Products();
         $send['Notes'] = $this->Notes();
         $send['State'] = $this->State();
         $send['States'] = $this->States();
         $send['Providers'] = $this->Providers();
         $send['Categories'] = $this->Categories();
         $send['Terms'] = $this->Terms();

         return $send;
      }
   }
