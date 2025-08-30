<?php
   class CategoryModel extends Model{

      const ITEM = ',categories,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LCategories'] = $this->select('*')
            ->from(Model::CATEGORIE)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('Name', $in['Name'], 'LIKE', 'AND')
            ->where('State', $in['States'], 'IN', 'AND')
            ->where('Category', $in['Categories'], 'IN', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->orderby('ID', false)
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LCategories']) and count($send['LCategories']) > 0){

            foreach($send['LCategories'] as $KCategory => $VCategory){

               $VCategory['Category'] = $this->select('*')
                  ->from(Model::CATEGORIE)
                  ->where('ID', $VCategory['Category'])
                  ->get()->first;

               $VCategory['State'] = $this->select('*')
                  ->from(Model::STATE) 
                  ->where('ID', $VCategory['State'])
                  ->get()->first;

               $send['LCategories'][$KCategory] = $VCategory;
            }
         }

         $send['LParents'] = $this->select('*')
            ->from(Model::CATEGORIE)
            ->where('ISD', '0', '=')
            ->get()->all;

         $send['LStates'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ISD', '0', '=')
            ->where('Items', self::ITEM, 'LIKE', 'AND')
            ->get()->all;

         return $send;
      }

      public function print($in){
         $send = array();

         $send['LCategories'] = $this->select('*')
            ->from(Model::CATEGORIE)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('Name', $in['Name'], 'LIKE', 'AND')
            ->where('State', $in['States'], 'IN', 'AND')
            ->where('Category', $in['Categories'], 'IN', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->orderby('ID', false)
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LCategories']) and count($send['LCategories']) > 0){

            foreach($send['LCategories'] as $KCategory => $VCategory){

               $VCategory['Category'] = $this->select('*')
                  ->from(Model::CATEGORIE)
                  ->where('ID', $VCategory['Category'])
                  ->get()->first;

               $VCategory['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VCategory['State'])
                  ->get()->first;

               $send['LCategories'][$KCategory] = $VCategory;
            }
         }

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::CATEGORIE)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if(L($send,'Cells')){
            
            $send['Cells']['Category'] = $this->select('*')
               ->from(Model::CATEGORIE)
               ->where('ID', $send['Cells']['Category'])
               ->get()->first;

            $send['Cells']['State'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ID', $send['Cells']['State'])
               ->get()->first;

         }

         return $send;
      }

      public function add($in){
         $send = array();

         $send['LStates'] = $this->select('*')
            ->from(Model::STATE)
            ->where('ISD', '0', '=')
            ->where('Items', self::ITEM, 'LIKE', 'AND')
            ->get()->all;

         $send['LParents'] = $this->select('*')
            ->from(Model::CATEGORIE)
            ->where('ISD', '0', '=')
            ->get()->all;

         return $send;
      }

      public function insert($in){
         $send = array();

         $State = $this->select('*')
            ->from(Model::STATE)
            ->where('ID', $in['State'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($State === null){
            $send['Errors'][] = 'State';
         }

         $Category = $this->select('*')
            ->from(Model::CATEGORIE)
            ->where('ID', $in['Category'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($Category === null){
            unset($in['Category']);
         }

         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::CATEGORIE)->set($in)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::CATEGORIE)
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

            $send['LCategories'] = $this->select('*')
               ->from(Model::CATEGORIE)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['Category']['ID'] !== null ? $Cells['Category']['ID'] : '0', '<>', 'AND')
               ->get()->all;

            if($Cells['Category']['ID'] !== null){
               $send['LCategories'][] = $this->select('*')
                  ->from(Model::CATEGORIE)
                  ->where('ISD', '0', '=')
                  ->where('ID', $Cells['Category']['ID'], '=', 'AND')
                  ->get()->first;
            }

            $send['LStates'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['State']['ID'], '<>', 'AND')
               ->where('Items', self::ITEM, 'LIKE', 'AND')
               ->get()->all;
   
            $send['LStates'][] = $this->select('*')
               ->from(Model::STATE)
               ->where('ISD', '0', '=')
               ->where('ID', $Cells['State']['ID'], '=', 'AND')
               ->get()->first;
               
            $send['Cells'] = $Cells;
               
         }

         return $send;
      }

      public function update($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::CATEGORIE)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if(isset($in['Category'])){
            $Category = $this->select('*')
               ->from(Model::CATEGORIE)
               ->where('ID', $in['Category'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;
   
            if($Category === null){
               unset($in['Category']);
            }
         }else{
            $in['Category'] = '0';
         }

         if($in['State'] != $row['State']){
            $State = $this->select('*')
               ->from(Model::STATE)
               ->where('ID', $in['State'], '=')
               ->where('ISD', '0', '=', 'AND')
               ->get()->first;

            if($State === null){
               $send['Errors'][] = 'State';
            }
         }

         if(!isset($send['Errors'])){
            $send['Success'][] = $this->into(Model::CATEGORIE)->apt($in)->save();
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
            ->from(Model::CATEGORIE)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::CATEGORIE)->del($in)->save();
         }

         return $send;
      }

   }
