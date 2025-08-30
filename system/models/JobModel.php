<?php
   class JobModel extends Model{

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LJobs'] = $this->select('*')
            ->from(Model::JOB)
            ->where('State', '1', '<>')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('NameFR', $in['NameFR'], 'LIKE', 'AND')
            ->where('NameEN', $in['NameEN'], 'LIKE', 'AND')
            ->where('NameAR', $in['NameAR'], 'LIKE', 'AND')
            ->where('State', $in['State'], '=', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::JOB)
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

         $job = $this->select('*')
            ->from(Model::JOB)
            ->where('Code', $in['Code'], '=')
            ->where('State', '1', '<>', 'AND')
            ->get()->first;

         if($job !== null){
            $send['Errors'][] = 'Job';
         }

         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::JOB)->set($in)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::JOB)
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
            ->from(Model::JOB)
            ->where('ID', $in['ID'])
            ->where('State', '1', '<>', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if($in['Code'] != $row['Code']){
            $job = $this->select('*')
               ->from(Model::JOB)
               ->where('Code', $in['Code'], '=')
               ->where('State', '1', '<>', 'AND')
               ->get()->first;

            if($job !== null){
               $send['Errors'][] = 'Job';
            }
         }

         if(!isset($send['Errors'])){
            $send['Success'][] = $this->into(Model::JOB)->apt($in)->save();
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
            ->from(Model::JOB)
            ->where('ID', $in['ID'])
            ->where('State', '1', '<>', 'AND')
            ->get()->first;

         if($row === null){
            $send['Success'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::JOB)->del($in)->save();
         }

         return $send;
      }

   }
