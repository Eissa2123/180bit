<?php
   class StateModel extends Model{

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LStates'] = $this->select('*')
            ->from(Model::STATE)
            ->where('State', '1', '<>')
            ->limit($in['Page'], $in['Length'])
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::STATE)
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

         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::STATE)->set($in)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::STATE)
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
            ->from(Model::STATE)
            ->where('ID', $in['ID'])
            ->where('State', '1', '<>', 'AND')
            ->get()->first;

         if($row === null){
            $send['Success'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'][] = $this->into(Model::STATE)->apt($in)->save();
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
            ->from(Model::STATE)
            ->where('ID', $in['ID'])
            ->where('State', '1', '<>', 'AND')
            ->get()->first;

         if($row === null){
            $send['Success'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::STATE)->del($in)->save();
         }

         return $send;
      }

   }
