<?php
   class LogModel extends Model{

      const FOLDER = UI.'log/';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LLogs'] = $this->select('*')
            ->from(Model::LOG)
            ->where('State', '1', '<>')
            ->where('Tablealias', $in['Tablealias'], 'LIKE', 'AND')
            ->where('Tablename', $in['Tablename'], 'LIKE', 'AND')
            ->where('Action', $in['Action'], '=', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::LOG)
            ->where('ID', $in['ID'], '=')
            ->where('State', '1', '<>', 'AND')
            ->get()->first;

         return $send;
      }

      public function add($in){
         $send = array();

         return $send;
      }

      public function insert($in){
         $send = array();

         $log = $this->select('*')
            ->from(Model::LOG)
            ->where('Code', $in['Code'], '=')
            ->where('State', '1', '<>', 'AND')
            ->get()->first;

         if($log !== null){
            $send['Errors'][] = 'Log';
         }

         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::LOG)->set($in)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::LOG)
                  ->where('ID', $this->lastid())
                  ->get()->first;
            }
         }

         return $send;
      }

      public function edit($in){
         $send = array();
         $send = array_merge($send, $this->display($in));
         if(L($send, 'Cells')){
            $Cells = $send['Cells'];

         }
         return $send;
      }

      public function update($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::LOG)
            ->where('ID', $in['ID'])
            ->where('State', '1', '<>', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if($in['Code'] != $row['Code']){
            $log = $this->select('*')
               ->from(Model::LOG)
               ->where('Code', $in['Code'], '=')
               ->where('State', '1', '<>', 'AND')
               ->get()->first;

            if($log !== null){
               $send['Errors'][] = 'Log';
            }
         }

         if(!isset($send['Errors'])){
            $send['Success'][] = $this->into(Model::LOG)->apt($in)->save();
         }

         return $send;
      }

      public function remove($in){
         $send = array();

         $send = array_merge($send, $this->display($in));

         return $send;
      }

      public function delete($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::LOG)
            ->where('ID', $in['ID'])
            ->where('State', '1', '<>', 'AND')
            ->get()->first;

         if($row === null){
            $send['Success'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::LOG)->del($in)->save();
         }

         return $send;
      }

   }
