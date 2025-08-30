<?php
   class ProviderModel extends Model{

      const ITEM = ',providers,';

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LProviders'] = $this->select('*')
            ->from(Model::PROVIDER)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('RC', $in['RC'], 'LIKE', 'AND')
            ->where('Taxnumber', $in['Taxnumber'], 'LIKE', 'AND')
            ->where('Companyname', $in['Companyname'], 'LIKE', 'AND')
            ->where('Type', $in['Type'], '=', 'AND')
            ->where('State', $in['State'], '=', 'AND')
            ->where('Category', $in['Category'], '=', 'AND')
            ->where('State', $in['States'], 'IN', 'AND')
            ->where('Type', $in['Types'], 'IN', 'AND')
            ->where('Category', $in['Categories'], 'IN', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LProviders']) and count($send['LProviders']) > 0){

            foreach($send['LProviders'] as $KProvider => $VProvider){
               
               $VProvider['Type'] = $this->select('*')
                  ->from(Model::GENDER)
                  ->where('ID', $VProvider['Type'])
                  ->get()->first;

               $VProvider['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VProvider['State'])
                  ->get()->first;

               $send['LProviders'][$KProvider] = $VProvider;
            }
         }

         $send['LTypes'] = $this->select('*')
            ->from(Model::GENDER)
            ->where('ISD', '0', '=')
            ->get()->all;
            
         $send['LCategories'] = $this->select('*')
            ->from(Model::CATEGORIE)
            ->where('ISD', '0', '=')
            ->where('State', '2', '=', 'AND')
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

         $send['LProviders'] = $this->select('*')
            ->from(Model::PROVIDER)
            ->where('ISD', '0', '=')
            ->where('Code', $in['Code'], 'LIKE', 'AND')
            ->where('RC', $in['RC'], 'LIKE', 'AND')
            ->where('Taxnumber', $in['Taxnumber'], 'LIKE', 'AND')
            ->where('Companyname', $in['Companyname'], 'LIKE', 'AND')
            ->where('Type', $in['Type'], '=', 'AND')
            ->where('State', $in['State'], '=', 'AND')
            ->where('Category', $in['Category'], '=', 'AND')
            ->where('State', $in['States'], 'IN', 'AND')
            ->where('Type', $in['Types'], 'IN', 'AND')
            ->where('Category', $in['Categories'], 'IN', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LProviders']) and count($send['LProviders']) > 0){

            foreach($send['LProviders'] as $KProvider => $VProvider){
               
               $VProvider['Type'] = $this->select('*')
                  ->from(Model::GENDER)
                  ->where('ID', $VProvider['Type'])
                  ->get()->first;

               $VProvider['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VProvider['State'])
                  ->get()->first;

               $send['LProviders'][$KProvider] = $VProvider;
            }
         }

         return $send;
      }
      
      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::PROVIDER)
            ->where('ID', $in['ID'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if(L($send,'Cells')){
            $send['Cells']['Type'] = $this->select('*')
               ->from(Model::GENDER)
               ->where('ID', $send['Cells']['Type'])
               ->get()->first;

            $send['Cells']['Categories'] = explode(',', $send['Cells']['Categories']);

            $send['Cells']['LCategories'] =  $this->select('*')
               ->from(Model::CATEGORIE)
               ->where('ISD', '0', '=')
               ->get()->all;
               
            $send['Cells']['State'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ID', $send['Cells']['State'])
               ->get()->first;

         }

         return $send;
      }

      public function add($in){
         $send = array();

         $send['LTypes'] = $this->select('*')
            ->from(Model::GENDER)
            ->where('ISD', '0', '=')
            ->get()->all;

         $send['LCategories'] = $this->select('*')
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

         $Provider = $this->select('*')
            ->from(Model::PROVIDER)
            ->where('Code', $in['Code'], '=')
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($in['Code'] != '' and $Provider !== null){
            $send['Errors'][] = 'Provider';
         }
         
         if(is_array($in['Categories']) and count($in['Categories']) > 0){
            foreach($in['Categories'] as $category){
               $category = $this->select('*')
                  ->from(Model::CATEGORIE)
                  ->where('ID', $category, '=')
                  ->where('ISD', '0', '=', 'AND')
                  ->where('State', '2', '=', 'AND')
                  ->get()->first;
      
               if($category === null){
                  $send['Errors'][] = 'Categories';
                  break;
               }
            }
            $in['Categories'] = implode(',', $in['Categories']);
         }else{
            $in['Categories'] = '';
         }

         if(!L($send, 'Errors')){
            $send['Success'] = $this->into(Model::PROVIDER)->set($in)->save();
            if($send['Success'] === true){
               $send['Cells'] =  $this->select('*')
                  ->from(Model::PROVIDER)
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

            $send['LTypes'] = $this->select('*')
               ->from(Model::GENDER)
               ->where('ISD', '0', '=')
               ->get()->all;

            $send['LCategories'] = $this->select('*')
               ->from(Model::CATEGORIE)
               ->where('ISD', '0', '=')
               ->where('State', '2', '=', 'AND')
               ->get()->all;

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
         }

         return $send;
      }

      public function update($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::PROVIDER)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
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

         if(is_array($in['Categories']) and count($in['Categories']) > 0){
            foreach($in['Categories'] as $category){
               $category = $this->select('*')
                  ->from(Model::CATEGORIE)
                  ->where('ID', $category, '=')
                  ->where('ISD', '0', '=', 'AND')
                  ->where('State', '2', '=', 'AND')
                  ->get()->first;
      
               if($category === null){
                  $send['Errors'][] = 'Categories';
                  break;
               }
            }
            $in['Categories'] = implode(',', $in['Categories']);
         }else{
            $in['Categories'] = '';
         }
         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::PROVIDER)->apt($in)->save();
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
            ->from(Model::PROVIDER)
            ->where('ID', $in['ID'])
            ->where('ISD', '0', '=', 'AND')
            ->get()->first;

         if($row === null){
            $send['Errors'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::PROVIDER)->del($in)->save();
         }

         return $send;
      }

   }
