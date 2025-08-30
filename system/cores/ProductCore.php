<?php
   class ProductCore extends Core{

      private $_Code;
      private $_Name;
      private $_Category;
      private $_Cost;
      private $_Price;
      private $_Unite;
      private $_Nature;
      private $_State;
      private $_Picture;
      
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
      public function Name($value = null) {
         if($value === null) {
            return $this->_Name;
         }else{
            $this->_Name = htmlspecialchars(trim($value));
         }
      }
      public function Category($value = null) {
         if($value === null) {
            return $this->_Category;
         }else{
            $this->_Category = (int) $value;
         }
      }
      public function Cost($value = null) {
         if($value === null) {
            return $this->_Cost;
         }else{
            $this->_Cost = (double) $value;
         }
      }
      public function Price($value = null) {
         if($value === null) {
            return $this->_Price;
         }else{
            $this->_Price = (double) $value;
         }
      }
      public function Unite($value = null) {
         if($value === null) {
            return $this->_Unite;
         }else{
            $this->_Unite = (int) $value;
         }
      }
      public function Nature($value = null) {
         if($value === null) {
            return $this->_Nature;
         }else{
            $this->_Nature = (int) $value;
         }
      }
      public function State($value = null) {
         if($value === null) {
            return $this->_State;
         }else{
            $this->_State = (int) $value;
         }
      }
      public function Picture($value = null) {
         if($value === null) {
            return $this->_Picture;
         }else{
            $this->_Picture = htmlspecialchars(trim($value));
         }
      }
      public function Products($value = null) {
         if($value === null) {
            return $this->_Products;
         }else{
            $this->_Products = $value;
         }
      }
      public function Categories($value = null) {
         if($value === null) {
            return $this->_Categories;
         }else{
            $this->_Categories = $value;
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
         $this->Code(P($in,'Code'));
         $this->Name(P($in,'Name'));
         $this->Category(P($in,'Category'));
         $this->Cost(P($in,'Cost'));
         $this->Price(P($in,'Price'));
         $this->Unite(P($in,'Unite'));
         $this->Nature(P($in,'Nature'));
         $this->State(P($in,'State'));
         $this->Picture(F($in,'Picture'));
         $this->States(P($in,'States'));
         $this->Products(P($in,'Products'));
         $this->Categories(P($in,'Categories'));
      }

      public function CodeCheck(){
         if($this->Code() !== ''){
            return true;
         }
      }
      public function NameCheck(){
         if($this->Name() !== ''){
            return true;
         }
      }
      public function CategoryCheck(){
         if($this->Category() !== ''){
            return true;
         }
      }
      public function PriceCheck(){
         if($this->Price() !== '' and $this->Price() > 0){
            return true;
         }
      }
      public function CostCheck(){
         if($this->Cost() !== '' and $this->Cost() > 0){
            return true;
         }
      }
      public function UniteCheck(){
         if($this->Unite() !== '' and $this->Unite() > 0){
            return true;
         }
      }
      public function NatureCheck(){
         if($this->Nature() !== '' and $this->Nature() > 0){
            return true;
         }
      }
      public function StateCheck(){
         if($this->State() !== '' and $this->State() > 0){
            return true;
         }
      }
      public function PictureCheck(){
         if($this->Picture() !== ''){
            return true;
         }
      }
      public function StatesCheck(){
         if(is_array($this->States()) and count($this->States())> 0){
            return true;
         }
      }
      public function CategoriesCheck(){
         if(is_array($this->Categories()) and count($this->Categories())> 0){
            return true;
         }
      }
      public function CheckAdd(){
         $send = array();
         $send = array_merge($send, parent::CheckAdd());
         /*if(!$this->CodeCheck()){
            $send['Code'] = false;
         }*/
         if(!$this->NameCheck()){
            $send['Name'] = false;
         }
         if(!$this->PriceCheck()){
            $send['Price'] = false;
         }
         if(!$this->CostCheck()){
            $send['Cost'] = false;
         }
         if(!$this->UniteCheck()){
            $send['Unite'] = false;
         }
         if(!$this->NatureCheck()){
            $send['Nature'] = false;
         }
         if(!$this->CategoryCheck()){
            $send['Category'] = false;
         }
         if(!$this->StateCheck()){
            $send['State'] = false;
         }
         return $send;
      }
      public function CheckEdit(){
         $send = array();
         $send = array_merge($send, parent::CheckEdit());
         /*if(!$this->CodeCheck()){
            $send['Code'] = false;
         }*/
         if(!$this->NameCheck()){
            $send['Name'] = false;
         }
         if(!$this->PriceCheck()){
            $send['Price'] = false;
         }
         if(!$this->CostCheck()){
            $send['Cost'] = false;
         }
         if(!$this->UniteCheck()){
            $send['Unite'] = false;
         }
         if(!$this->CategoryCheck()){
            $send['Category'] = false;
         }
         if(!$this->NatureCheck()){
            $send['Nature'] = false;
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
         $send['Name'] = $this->Name();
         $send['Price'] = $this->Price();
         $send['Cost'] = $this->Cost();
         $send['Unite'] = $this->Unite();
         $send['Nature'] = $this->Nature();
         $send['Category'] = $this->Category();
         $send['State'] = $this->State();
         if($this->PictureCheck()){
            $send['Picture'] = $this->Picture();
         }
         return $send;
      }
      public function PreperEdit(){
         $send = array();
         $send = array_merge($send, parent::PreperEdit());
         $send['Name'] = $this->Name();
         $send['Price'] = $this->Price();
         $send['Cost'] = $this->Cost();
         $send['Unite'] = $this->Unite();
         $send['Nature'] = $this->Nature();
         $send['Category'] = $this->Category();
         $send['State'] = $this->State();
         if($this->PictureCheck()){
            $send['Picture'] = $this->Picture();
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
         $send['Code'] = $this->Code();
         $send['Name'] = $this->Name();
         $send['State'] = $this->State();
         $send['Nature'] = $this->Nature();
         $send['States'] = $this->States();
         $send['Category'] = $this->Category();
         $send['Categories'] = $this->Categories();

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
               case Core::FPRINT:
                  $send = $this->PreperPrint();
                  break;
            }
         return $send;
      }
      public function PreperPrint(){
         $send = array();

         $send = array_merge($send, parent::PreperPrint());

         $send['Products'] = $this->Products();

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
         $send['Name'] = $this->Name();
         $send['Price'] = $this->Price();
         $send['Cost'] = $this->Cost();
         $send['Nature'] = $this->Nature();
         $send['Unite'] = $this->Unite();
         $send['Category'] = $this->Category();
         $send['State'] = $this->State();
         return $send;
      }
   }
