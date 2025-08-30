<?php
   class ToolModel extends Model{

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::SETTING)
            ->get()->first;

         return $send;
      }

      /*public function add($in){
         $send = array();
         return $send;
      }*/

      /*public function edit($in){
         $send = array();
         $send = array_merge($send, $this->display($in));
         if(L($send, 'Cells')){
            $Cells = $send['Cells'];

         }
         return $send;
      }*/

      /*public function update($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::SETTING)
            ->where('ID', $in['ID'])
            ->where('State', '1', '<>', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if($in['Code'] != $row['Code']){
            $setting = $this->select('*')
               ->from(Model::SETTING)
               ->where('Code', $in['Code'], '=')
               ->where('State', '1', '<>', 'AND')
               ->get()->first;

            if($setting !== null){
               $send['Errors'][] = 'Setting';
            }
         }

         if(!isset($send['Errors'])){
            $send['Success'][] = $this->into(Model::SETTING)->apt($in)->save();
         }

         return $send;
      }*/

      public function export(){
         $send = array();

         $send['Output'] = $this->backup();

         return $send;
      }

   }
