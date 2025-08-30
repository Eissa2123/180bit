<?php
class DashboardView extends View
{

   const FOLDER = UI . 'dashboard/';

   public function __construct()
   {
      parent::__construct();
   }

   public function index($in)
   {
      $send = array();
      $send = $in;
      $this->render(self::FOLDER . '/' . __FUNCTION__ . TMP, $send);
   }

   public function setting($in)
   {
      $send = array();
      $send = $in;
      $this->render(self::FOLDER . '/' . __FUNCTION__ . TMP, $send);
   }

}
