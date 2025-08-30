<?php
   class HistoriqueModel extends Model{

      public function __construct(){
         parent::__construct();
      }

      public function index($in){
         $send = array();

         $send['LHistoriques'] = $this->select('*')
            ->from(Model::HISTORIQUE)
            ->where('Tablename', $in['Tablename'], '=')
            ->where('Action', $in['Action'], '=', 'AND')
            ->where('Member', $in['Member'], '=', 'AND')
            ->between('AT', $in['ATFrom'], $in['ATTo'], 'AND')
            ->orderby('ID', true)
            ->limit($in['Page'], $in['Length'])
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;

         if(is_array($send['LHistoriques']) and count($send['LHistoriques']) > 0){

            foreach($send['LHistoriques'] as $KHistorique => $VHistorique){

               $VHistorique['Action'] = $this->select('*')
                  ->from(Model::ACTION)
                  ->where('ID', $VHistorique['Action'])
                  ->get()->first;

               $VHistorique['Member'] = $this->select('*')
                  ->from(Model::EMPLOYEE)
                  ->where('ID', $VHistorique['Member'])
                  ->get()->first;

               $send['LHistoriques'][$KHistorique] = $VHistorique;
            }
         }

         $tables = array(
            Model::PURCHASE,  
            Model::PURCHASE_DETAIL,  
            Model::PURCHASE_PAYMENT,   
            Model::PURCHASE_QUOTATION, 
            Model::PURCHASE_QUOTATION_DETAIL,   
            Model::PURCHASE_RETURN,
            Model::PURCHASE_RETURN_DETAIL,
            Model::SALE,
            Model::SALE_DETAIL,
            Model::SALE_PAYMENT,
            Model::SALE_QUOTATION,
            Model::SALE_QUOTATION_DETAIL,
            Model::SALE_RETURN,
            Model::SALE_RETURN_DETAIL,
            Model::EXPENSE,
            Model::REVENUE,
            Model::PRODUCT,
            Model::EMPLOYEE,
            Model::CUSTOMER,
            Model::PROVIDER,
            Model::CATEGORIE,
            Model::COBON,
            Model::UNITE,
            Model::TERM,
         );
         
         if(is_array(Model::PRF) and count(Model::PRF) > 0){
            foreach (Model::PRF as $key => $value) {
               if(in_array($key, $tables)){
                  $send['LTables'][] = array(
                     'Name' => $key
                  );
               }
            }
         }

         $send['LActions'] = $this->select('*')
            ->from(Model::ACTION)
            ->get()->all;

         $send['LEmployees'] = $this->select('*')
            ->from(Model::EMPLOYEE)
            ->where('ISD', '0', '=')
            ->where('State', '2', '=', 'AND')
            ->get()->all;

         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::HISTORIQUE)
            ->where('ID', $in['ID'], '=')
            ->get()->first;

         if(is_array($send['Cells']) and count($send['Cells']) > 0){
            
            $send['Cells']['Action'] = $this->select('*')
               ->from(Model::ACTION)
               ->where('ID', $send['Cells']['Action'])
               ->get()->first;

            $send['Cells']['Member'] = $this->select('*')
               ->from(Model::EMPLOYEE)
               ->where('ID', $send['Cells']['Member'])
               ->get()->first;

            $send['Cells']['After'] = json_decode($send['Cells']['After'], true);
            $send['Cells']['Before'] = json_decode($send['Cells']['Before'], true);
         }

         return $send;
      }

      public function add($in){
         $send = array();

         return $send;
      }

      public function insert($in){
         $send = array();

         return $send;
      }

      public function edit($in){
         $send = array();

         $send = array_merge($send, $this->display($in));

         return $send;
      }

      public function update($in){
         $send = array();

         $send = array_merge($send, $this->display($in));

         $datas = array();
         if($in['Before'] === '1'){
            $datas = $send['Cells']['Before'];
         }else{
            $datas = $send['Cells']['After'];
         }
         
         $send['Success'] = $this->into($send['Cells']['Tablename'])->apt($datas)->save();

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
            ->from(Model::HISTORIQUE)
            ->where('ID', $in['ID'])
            ->get()->first;

         if($row === null){
            $send['Success'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::HISTORIQUE)->del($in, true)->save(false);
         }

         return $send;
      }

   }

