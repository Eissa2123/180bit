<?php
   class SettingModel extends Model{

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::SETTING)
            ->get()->first;

         if(L($send,'Cells')){
            $Cells = $send['Cells'];

            $Cells['AR'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['AR'], '=', 'AND')
               ->get()->first;

            $Cells['EN'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['EN'], '=', 'AND')
               ->get()->first;

            $Cells['FR'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['FR'], '=', 'AND')
               ->get()->first;

            $Cells['State'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['State'], '=', 'AND')
               ->get()->first;

            $send['Cells'] = $Cells;
         }

         return $send;
      }

      public function display($in){
         $send = array();

         $send = array_merge($send, $this->index($in));

         return $send;
      }

      public function edit($in){
         $send = array();

         $send = array_merge($send, $this->index($in));

         return $send;
      }

      public function update($in){
         $send = array();

         $send['Success'] = $this->into(Model::SETTING)->apt($in)->save();
         
         return $send;
      }

   }
