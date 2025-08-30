<?php
   class ApiController{

      private $AuthentificationController;
      private $AuthentificationModel;

      public function __construct(){
         $this->AuthentificationController = new AuthentificationController();
      }

      public function index($in){
         $x = $this->AuthentificationController->api($in);
         //D($x);
      }

   }