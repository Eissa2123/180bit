<?php
   class ItemModel extends Model{

      public function __construct(){
         parent::__construct();
      }

      public function index($in = null){
         $send = array();

         $send['LItems'] = $this->select('*')
            ->from(Model::ITEM)
            ->where('State', '2', '=')
            //->limit($in['Page'], $in['Length'])
            ->orderby('Position', true)
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::ITEM)
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

         $item = $this->select('*')
            ->from(Model::ITEM)
            ->where('Code', $in['Code'], '=')
            ->where('State', '1', '<>', 'AND')
            ->get()->first;

         if($item !== null){
            $send['Errors'][] = 'Item';
         }

         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::ITEM)->set($in)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::ITEM)
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
            ->from(Model::ITEM)
            ->where('ID', $in['ID'])
            ->where('State', '1', '<>', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if($in['Code'] != $row['Code']){
            $item = $this->select('*')
               ->from(Model::ITEM)
               ->where('Code', $in['Code'], '=')
               ->where('State', '1', '<>', 'AND')
               ->get()->first;

            if($item !== null){
               $send['Errors'][] = 'Item';
            }
         }

         if(!isset($send['Errors'])){
            $send['Success'][] = $this->into(Model::ITEM)->apt($in)->save();
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
            ->from(Model::ITEM)
            ->where('ID', $in['ID'])
            ->where('State', '1', '<>', 'AND')
            ->get()->first;

         if($row === null){
            $send['Success'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::ITEM)->del($in)->save();
         }

         return $send;
      }

   }
