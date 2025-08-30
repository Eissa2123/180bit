<?php
	
	//$result = $this->DB->query("ALTER TABLE `balancesfinancials` ADD `RVF_Method` char(1) NOT NULL DEFAULT 'C' AFTER `RVF_Amount`;");
	//exist();
	
	class Model {
		
		#region attributs    

		const PURCHASE                  = 'purchases';  
		const PURCHASE_DETAIL           = 'purchasesdetails';  
		const PURCHASE_PAYMENT          = 'purchasespayments';  
		const PURCHASE_QUOTATION        = 'purchasesquotations';  
		const PURCHASE_QUOTATION_DETAIL = 'purchasesquotationsdetails';  
		const PURCHASE_RETURN           = 'purchasesreturns'; 
		const PURCHASE_RETURN_DETAIL    = 'purchasesreturnsdetails'; 
		const PURCHASE_RETURN_PAYMENT   = 'purchasesreturnspayments'; 
		const SALE                      = 'sales'; 
		const SALE_DETAIL               = 'salesdetails'; 
		const SALE_PAYMENT              = 'salespayments'; 
		const SALE_QUOTATION            = 'salesquotations'; 
		const SALE_QUOTATION_DETAIL     = 'salesquotationsdetails'; 
		const SALE_RETURN               = 'salesreturns'; 
		const SALE_RETURN_DETAIL        = 'salesreturnsdetails'; 
		const SALE_RETURN_PAYMENT       = 'salesreturnspayments'; 
		const EXPENSE                   = 'expenses'; 
		const BALANCES_CUSTOMERS        = 'balancescustomers'; 
		const BALANCES_PROVIDERS        = 'balancesproviders'; 
		const BALANCES_FINANCIALS       = 'balancesfinancials'; 
		const BALANCES_PRODUCTS         = 'balanceproducts'; 
		const REVENUE                   = 'revenues'; 
		const PRODUCT                   = 'products'; 
		const EMPLOYEE                  = 'employees'; 
		const CUSTOMER                  = 'customers'; 
		const PROVIDER                  = 'providers'; 
		const MARKETER                  = 'marketers'; 
		const CATEGORIE                 = 'categories'; 
		const COBON                     = 'cobons'; 
		const UNITE                     = 'unites'; 
		const TERM                      = 'terms'; 

		const METHOD     = '_methods'; 
		const PRIVILEGE  = '_privileges';
		const GENDER     = '_genders';      
		const NATURE     = '_natures';      
		const ITEM       = '_items';      
		const JOB        = '_jobs';      
		const ROLE       = '_roles';      
		const SETTING    = '_settings';      
		const STATE      = '_states';      
		const TYPE       = '_types';      
		const HISTORIQUE = '_historiques';      
		const ACTION     = '_actions';      

		const PRF = array(
		
			self::PURCHASE_QUOTATION        => 'PQF_',  
			self::PURCHASE_QUOTATION_DETAIL => 'PQD_',  
			self::PURCHASE                  => 'PRF_',  
			self::PURCHASE_DETAIL           => 'PRD_',  
			self::PURCHASE_PAYMENT          => 'PRP_',  
			self::PURCHASE_RETURN           => 'PRF_', 
			self::PURCHASE_RETURN_DETAIL    => 'PRD_', 
			self::SALE_QUOTATION            => 'SQF_', 
			self::SALE_QUOTATION_DETAIL     => 'SQD_',
			self::PURCHASE_RETURN_PAYMENT   => 'PRP_',
			self::SALE                      => 'SLF_', 
			self::SALE_DETAIL               => 'SLD_', 
			self::SALE_PAYMENT              => 'SLP_', 
			self::SALE_RETURN               => 'SFR_', 
			self::SALE_RETURN_DETAIL        => 'SRD_', 
			self::SALE_RETURN_PAYMENT       => 'SRP_',
			self::EXPENSE                   => 'EXP_', 
			self::REVENUE                   => 'RVN_', 
			self::BALANCES_CUSTOMERS        => 'RVC_', 
			self::BALANCES_PROVIDERS        => 'RVP_', 
			self::BALANCES_FINANCIALS		=> 'RVF_', 
			self::BALANCES_PRODUCTS			=> 'BPR_', 
			self::PRODUCT                   => 'PRD_', 
			self::EMPLOYEE                  => 'EMP_', 
			self::CUSTOMER                  => 'CST_', 
			self::PROVIDER                  => 'PRV_', 
			self::MARKETER                  => 'MRK_', 
			self::CATEGORIE                 => 'CTG_', 
			self::COBON                     => 'CBN_', 
			self::UNITE                     => 'UNT_', 
			self::TERM                      => 'TRM_', 
            
			self::METHOD     => 'MTD_', 
			self::PRIVILEGE  => 'PRV_',
			self::GENDER     => 'GEN_',
			self::NATURE	 => 'NTR_',
			self::ITEM       => 'ITM_',
			self::JOB        => 'JOB_',
			self::ROLE       => 'ROL_',     
			self::SETTING    => 'STN_', 
			self::STATE      => 'STA_',
			self::TYPE       => 'TYP_',
			self::HISTORIQUE => 'LOG_',  
			self::ACTION     => 'ACT_'  

		);
		
		public $DB;
		
		private $query      = '';
		private $args       = array();
		private $columns    = array();
		private $keys       = array();
		private $join       = '';
		private $tablename  = '';
		private $alias      = '';
		private $conditions = '';
		private $orderby    = '';
		private $groupby    = '';
		private $limit      = '';

		private $action     = '';

		public $all   = array();
		public $some  = array();
		public $first = array();
		public $last  = array();
		public $count = 0;

		private $logs = array();
		
		public $errors = array();
		#endregion

		#region constructors
		function __construct () {
			try{
				$this->DB = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';', DB_USERNAME, DB_PASSWORD);
				$this->DB->exec("set names utf8");
			}catch(Exception $e){
				$this->errors['Connexion'] = false;
			}

			//$this->DB->query("");
		}
		#endregion
		
		#region methods select
		public function from ($tablename) {
			$this->tablename = $tablename;
			$this->alias = self::PRF[$tablename];
			return $this;
		}

		public function select ($columns) {
			$this->clear();
			$this->columns = $columns;
			return $this;
		}

		public function leftjoin($tablename1, $tablename2, $column1, $column2 = 'ID'){
			
			$alias1 = Model::PRF[$tablename1];
			$alias2 = Model::PRF[$tablename2];

			$this->join .= ' LEFT JOIN `'.$tablename2.'` ON `'.$tablename1.'`.`'.$alias1.$column1.'` = `'.$tablename2.'`.`'.$alias2.$column2.'`';

			return $this;
		}

		public function rightjoin($tablename1, $tablename2, $column1, $column2 = 'ID'){
			
			$alias1 = Model::PRF[$tablename1];
			$alias2 = Model::PRF[$tablename2];

			$this->join .= ' RIGHT JOIN `'.$tablename2.'` ON `'.$tablename1.'`.`'.$alias1.$column1.'` = `'.$tablename2.'`.`'.$alias2.$column2.'`';

			return $this;
		}

		public function between($key, $value1, $value2, $option = '', $tablename = ''){
			if($value1 !== '' and $value1 !== null) {
				$option = ($this->conditions === '') ? '' : $option;
				$alias = Model::PRF[$this->tablename];
				$name = $this->tablename;
				if($tablename !== ''){
					$alias = Model::PRF[$tablename];
					$name = $tablename;
				}
				if($value2 !== '' and $value2 != null) {
					$this->args[$alias.$key.'1'] = $value1;
					$this->args[$alias.$key.'2'] = $value2;
					$this->conditions .= $option;
					$this->conditions .= ' DATE(`'.$name.'`.`'.$alias.$key.'`) >=  :'.$alias.$key.'1 AND DATE(`'.$name.'`.`'.$alias.$key.'`) <=  :'.$alias.$key.'2 ';
				}else {
					$this->args[$alias.$key] = $value1;
					$this->conditions .= $option.' DATE(`'.$name.'`.`'.$alias.$key.'`) = :'.$alias.$key.' ';
				}
			}
			return $this;
		}

		public function orderby ($column, $asc = true) {
			$this->orderby = " ORDER BY `".$this->alias.$column."` ".($asc ? "ASC" : "DESC")." ";
			return $this;
		}

		public function limit ($page = 0, $lenght = 0) {
			if($page == '0' or $lenght == 0){
				$this->limit = '';
			}else{
				$this->limit = ' LIMIT '.(($page - 1) * $lenght).','.$lenght;
			}
			return $this;
		}
		
		public function get ($columns =  '') {
			$this->selects($this->columns);

			$this->query = 'SELECT '.$this->columns.' FROM `'.$this->tablename.'`';
			$this->query .= $this->join;
			if($this->conditions !== ''){
				$this->query .= " WHERE ".$this->conditions;
			}
			$this->query .= $this->groupby;
			$this->query .= $this->orderby;
			$this->query .= $this->limit;
			$statement = $this->DB->prepare($this->query);
			if(is_array($this->args) and count($this->args) > 0){
				foreach($this->args as $key => $value){
					if(is_int($value)){
						$statement->bindValue($key, $value, PDO::PARAM_INT);
					}else{
						$statement->bindValue($key, $value, PDO::PARAM_STR);
					}
				}
			}
			
			$statement->execute();
			$datas = $statement->fetchAll(PDO::FETCH_ASSOC);

			//D(array($this->query,$this->args, $datas));

			$this->all = array();
			$this->count = $statement->rowCount();
			if(is_array($datas) and count($datas) > 0){
				foreach($datas as $index => $item){
					foreach($item as $key => $value){
						$key = explode('_', $key);
						/*if(isset($key[1]) and isset($this->all[$index][$key[1]])){
							
						}*/
						$this->all[$index][$key[1]] = $value;
					}
				}
			}

			if(!is_array($this->all) or count($this->all) == 0){
				$this->all = null;
			}

			$this->first = null;
			$this->last = null;
			if($this->all != null && isset($this->all[0])){
				$n = count($this->all);
				$this->first = $this->all[0];
				$this->last = $this->all[$n - 1];
			}

			$this->some = array();
			if($columns !== '' and $this->all != null){
				foreach ($this->all as $row) {
					if(isset($row[$columns])){
						$this->some[] = $row[$columns];
					}
				}
			}

			if(!is_array($this->some) or count($this->some) == 0){
				$this->some = array('0');
			}

			return $this;
		}

		public function sum ($column) {
			$ColumnSum = (double) 0.0;

			if($this->all != null && count($this->all) > 0){
				foreach($this->all as $key => $value){
					if(isset($value[$column])){
						$ColumnSum += (double) $value[$column];
					}
				}
			}

			return $ColumnSum;
		}

		#endregion
		
		#region methods insert
		public function into ($tablename) {
			$this->clear();
			$this->tablename = $tablename;
			$this->alias = self::PRF[$tablename];
			return $this;
		}

		public function set ($columns) {
			$this->action = 'INSERT';
			$this->args = $columns;
			foreach($this->args as $key => $value){
				$this->args[$key] = ($value === null ? "" : $value);
			}
			foreach($columns as $key => $value) {
				$this->columns .= '`'.$this->alias.$key.'`, ';
				$this->keys .= ':'.$key.', ';
			}
			$this->columns = substr($this->columns, 0, strlen($this->columns) - 2);
			$this->keys = substr($this->keys, 0, strlen($this->keys) - 2);
			$this->query = "INSERT INTO `".$this->tablename."` (".$this->columns.") VALUES (".$this->keys.")";

			return $this;
		}

		public function apt ($columns, $conditions = null) {
			$this->action = 'UPDATE';
			$this->args = $columns;
			foreach($this->args as $key => $value){
				$this->args[$key] = ($value === null ? "" : $value);
			}
			foreach($columns as $key => $value) {
				if($key !== 'ID' and !in_keys($key, $conditions)){
					$this->columns .= '`'.$this->alias.$key.'` =  :'.$key.', ';
				}
			}
			$this->columns = substr($this->columns, 0, strlen($this->columns) - 2);
			$this->keys = substr($this->keys, 0, strlen($this->keys) - 2);
			$this->query = "UPDATE `".$this->tablename."` SET ".$this->columns.", `".$this->alias."UAT` = CURRENT_TIMESTAMP";
			
			if($conditions === null){
				$this->query .= " WHERE `".$this->alias."ID` = :ID";
			}else if(is_array($conditions) and count($conditions) > 0){
				$this->query .= " WHERE ";
				foreach ($conditions as $key => $value){
					$this->query .= " `".$this->alias.$key."` = :".$key." AND ";
				}
				$this->query = substr($this->query, 0, strlen($this->keys) - 5);
			}

			$query = $this->query;
			foreach($this->args as $key => $value){
				$query = str_replace(':'.$key, '\''.$value.'\'', $query);
			}

			return $this;
		}

		public function del($columns, $drop = false, $key = null){
			if(!$drop){
				if($key !== null){
					$this->args['ISD'] = '1';
					$this->args[$key] = $columns;
					$this->query = "UPDATE `".$this->tablename."` SET `".$this->alias."ISD` = :ISD, `".$this->alias."DAT` = CURRENT_TIMESTAMP WHERE `".$this->alias.$key."` = :".$key;
				}else{
					$this->action = 'UPDATE';
					$this->args = $columns;
					$this->args['ISD'] = '1';
					$this->query = "UPDATE `".$this->tablename."` SET `".$this->alias."ISD` = :ISD, `".$this->alias."DAT` = CURRENT_TIMESTAMP WHERE `".$this->alias."ID` = :ID";
				}
				
			}else{
				$this->action = 'DELETE';
				if($key !== null){
					$this->args = array(
						$key => $columns
					);
					$this->query = "DELETE FROM `".$this->tablename."` WHERE `".$this->alias.$key."` = :".$key;
				}else{
					$this->args = $columns;
					$this->query = "DELETE FROM `".$this->tablename."` WHERE `".$this->alias."ID` = :ID";
				}
			}
			//D(array($this->args, $this->query));
			return $this;
		}

		public function save ($log = true) {
			switch($this->action){
				case 'INSERT':
				case 'UPDATE':
				case 'DELETE':
					$statement = $this->DB->prepare($this->query);
					foreach($this->args as $key => $value){
						if(is_int($value)){
							$statement->bindValue($key, (int) $value, PDO::PARAM_INT);
						}else if(is_float($value)){
							$statement->bindValue($key, (float) $value);
						}else if(is_double($value)){
							$statement->bindValue($key, (double) $value);
						}else if(is_string($value)){
							$statement->bindValue($key, $value, PDO::PARAM_STR);
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
						Model::PROVIDER,
						Model::PROVIDER,
						Model::CATEGORIE,
						Model::COBON,
						Model::UNITE,
						Model::TERM,
					);

					//$this->logsfile($this->query, $this->args);
					if($log && in_array($this->tablename, $tables)){
						//$this->before();
					}
					$r = $statement->execute();

					/*if($log && in_array($this->tablename, $tables)){
						//$this->after();
						//$this->logs($r);
					}*/

					return $r;
				break;
			}
			return false;
		}

		#endregion

		#region methods update
		public function update ($columns) {
			$this->clear();
			$this->columns = $columns;
			$this->query = "SELECT `".$this->columns."` FROM `".$this->tablename."`";
			return $this;
		}
		#endregion

		#region methods delete
		public function delete($columns) {
			$this->clear();
			$this->columns = $columns;
			$this->query = "SELECT `".$this->columns."` FROM `".$this->tablename."`";
			return $this;
		}
		#endregion

		#region methods shared
		public function where ($key, $value, $operation = '=', $option = '', $tablename = '') { 
			if($value != null or $key === 'ID' ) {
				if($this->conditions == ''){
					$option = '';
				}

				$key = trim($key, ' ');
				$key = rtrim($key, ')');
				$keys = explode('(', $key);
				
				$alias = '';
				$name = '';
				$nake = '';
				if($tablename !== ''){
					$alias = Model::PRF[$tablename];
					if(is_array($keys) and count($keys) == 2){
						$name = strtoupper($keys[0]).'(`'.$tablename.'`.`'.$alias.$keys[1].'`)';
						$nake = $alias.$keys[1];
					}else{
						$name =  '`'.$tablename.'`.`'.$alias.$keys[0].'`';
						$nake = $alias.$keys[0];
					}
				}else{
					$alias = Model::PRF[$this->tablename];
					$nake = $alias.$keys[0];
					if(is_array($keys) and count($keys) == 2){
						$name = strtoupper($keys[0]).'(`'.$this->tablename.'`.`'.$alias.$keys[1].'`)';
						$nake = $alias.$keys[1];
					}else{
						$name =  '`'.$this->tablename.'`.`'.$alias.$keys[0].'`';
						$nake = $alias.$keys[0];
					}
				}

				if(strtoupper($operation) == 'LIKE'){
					$value = '%'.$value.'%';
				}

				if(strtoupper($operation) == 'IN'){
					if(is_array($value) and count($value) > 0){
						$i = 1;
						if(count($this->args) > 0){
							foreach($this->args as $k => $v){
								if($k == $alias.$i){
									$i++;
								}
							}
						}
						$values = array();
						foreach ($value as $VK => $VV) {
							$this->args[$nake.$i] = $VV;
							$values[] = ':'.$nake.$i;
							$i++;
						}
	
						$values = implode(',', $values);
						$values = '('.$values.')';
	
						$this->conditions .= $option.' '.$name.' '.$operation.' '.$values.' ';
					}
				}else{
					
					$i = 1;
					if(count($this->args) > 0){
						foreach($this->args as $k => $v){
							if($k == $nake.$i){
								$i++;
							}
						}
					}
					
					$this->args[$nake.$i] = $value;
					$this->conditions .= $option.' '.$name.' '.$operation.' :'.$nake.$i.' ';
				}
			}
			return $this;
		}
		
		public function wheres($values) { 
			try{
				if(is_array($values)) {
					foreach($values as $value){
						$this->where($value[0], $value[1], $value[2], $value[3]);
					}
				}
			}catch(Exception $e){

			}
			return $this;
		}
		
		public function in($tablename1, $tablename2, $column, $key, $value, $option){
			if($value != null or $key === 'ID' ) {
				$alias = Model::PRF[$tablename1];
				$alias2 = Model::PRF[$tablename2];
				
				$i = 1;
				if(count($this->args) > 0){
					foreach($this->args as $k => $v){
						if($k == $alias2.$key.$i){
							$i++;
						}
					}
				}

				$this->args[$alias2.$key.$i] = $value;
				$this->conditions .= $option.' '.$alias.$column. ' IN (SELECT '.$alias2.'ID FROM '.$tablename2.' WHERE '.$alias2.$key.' = :'.$alias2.$key.$i.')';
			}
			return $this;
		}

		public function lastid(){
			return $this->DB->lastInsertId();
		}

		public function clear () {
			$this->query = "";
			$this->join = '';
			$this->columns = "";
			$this->keys = "";
			$this->tablename = "";
			$this->conditions = "";
			$this->limit = "";
			$this->orderby = "";
			$this->groupby = "";
			$this->args = array();
			$this->all = array();
			$this->first = array();
			$this->last = array();
			$this->errors = array();
		}

		public function DBG(){
			$query = $this->query;

			foreach($this->args as $key => $value){
				$query = str_replace(":$key,", "'$value',", $query);
				$query = str_replace(":$key)", "'$value')", $query);
			}

			R(array(
				$query, 
				$this->query,
				$this->args
			));

			D(array(
				$query, 
				$this->query,
				$this->args
			));
		}
		#endregion

		#region join

		public function selects ($columns) {
			$this->columns = '';
			if($columns === '*'){
				$this->columns = '*';
			}else{
				$alias = Model::PRF[$this->tablename];
				$columns = explode(',', $columns);
				foreach($columns as $value){
					if($value === '*'){
						$this->columns .= $$alias.'.*,';
					}else{
						$value = trim($value, ' ');
						$value = rtrim($value, ')');
						$values = explode('(', $value);
						if(count($values) == 2){
							$as = $alias.ucfirst(strtolower($values[0])).$values[1];
							$this->columns .= strtoupper($values[0]).'('.$this->tablename.'.'.$alias.$values[1].') AS '.$as.', ';
						}else{
							$this->columns .= $this->tablename.'.'.$alias.$value.', ';
						}
					}
				}
				$this->columns = rtrim($this->columns, ', ');
			}
		}

		public function groupby ($columns) {
			$this->groupby = '';
			if($columns !== ''){
				$alias = Model::PRF[$this->tablename];
				$columns = explode(',', $columns);
				foreach($columns as $value){
					$value = trim($value, ' ');
					$value = rtrim($value, ')');
					$values = explode('(', $value);
					if(count($values) == 2){
						$this->groupby .= strtoupper($values[0]).'('.$this->tablename.'.'.$alias.$values[1].'),';
					}else{
						$this->groupby .= $this->tablename.'.'.$alias.$value.',';
					}
				}
				$this->groupby = 'GROUP BY '.rtrim($this->groupby, ',');
			}
			return $this;
		}

		public function join ($type, $lefttable, $righttable, $columns){
			$this->tablename .= ' '.$type.' JOIN '.$righttable;
			$this->tablename .= ' ON '.$lefttable.'.'.Model::PRF[$lefttable].$columns[0];
			$this->tablename .= ' = '.$righttable.'.'.Model::PRF[$righttable].$columns[1];

			return $this;
		}

		public function gets () {
			$this->query = 'SELECT '.$this->columns.' FROM '.$this->tablename;
			$this->query .= $this->join;
			if($this->conditions !== ''){
				$this->query .= " WHERE ".$this->conditions;
			}
			$this->query .= $this->orderby.$this->limit;
			$statement = $this->DB->prepare($this->query);
			if(is_array($this->args) and count($this->args) > 0){
				foreach($this->args as $key => $value){
					if(is_int($value)){
						$statement->bindValue($key, $value, PDO::PARAM_INT);
					}else{
						$statement->bindValue($key, $value, PDO::PARAM_STR);
					}
				}
			}
			
			$statement->execute();
			$datas = $statement->fetchAll(PDO::FETCH_ASSOC);

			//D(array($this->query,$this->args, $datas));

			$this->all = array();
			$this->count = $statement->rowCount();
			if(is_array($datas) and count($datas) > 0){
				foreach($datas as $index => $item){
					foreach($item as $key => $value){
						$key = explode('_', $key);
						$this->all[$index][$key[1]] = $value;
					}
				}
			}

			if(!is_array($this->all) or count($this->all) == 0){
				$this->all = null;
			}

			$this->first = null;
			$this->last = null;
			if($this->all != null && isset($this->all[0])){
				$n = count($this->all);
				$this->first = $this->all[0];
				$this->last = $this->all[$n - 1];
			}

			return $this;
		}
		#endregion

		public function backup($tables = '*'){
			$output = "-- `".DB_NAME."` database backup - ".date('Y-m-d H:i:s').PHP_EOL;
			$output .= "SET NAMES utf8;".PHP_EOL;
			$output .= "SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';".PHP_EOL;
			$output .= "SET foreign_key_checks = 0;".PHP_EOL;
			$output .= "SET AUTOCOMMIT = 0;".PHP_EOL;
			$output .= "START TRANSACTION;".PHP_EOL;
			//get all table names
			if($tables == '*') {
				$tables = [];
				$query = $this->DB->prepare('SHOW TABLES');
				$query->execute();
				while($row = $query->fetch(PDO::FETCH_NUM)) {
					$tables[] = $row[0];
				}
				$query->closeCursor();
			} else {
				$tables = is_array($tables) ? $tables : explode(',',$tables);
			}
		 
			foreach($tables as $table) {
				$query = $this->DB->prepare("SELECT * FROM `$table`");
				$query->execute();
				$output .= "DROP TABLE IF EXISTS `$table`;".PHP_EOL;

				$query2 = $this->DB->prepare("SHOW CREATE TABLE `$table`");
				$query2->execute();
				$row2 = $query2->fetch(PDO::FETCH_NUM);
				$query2->closeCursor();
				$output .= PHP_EOL.$row2[1].";".PHP_EOL;
		 
				while($row = $query->fetch(PDO::FETCH_NUM)) {
					$output .= "INSERT INTO `$table` VALUES(";
					for($j=0; $j<count($row); $j++) {
						$row[$j] = addslashes($row[$j]);
						$row[$j] = str_replace("\n","\\n",$row[$j]);
						if (isset($row[$j]))
							$output .= "'".$row[$j]."'";
						else $output .= "''";
						if ($j<(count($row)-1))
							$output .= ',';
					}
					$output .= ");".PHP_EOL;
				}
			}
			$output .= PHP_EOL.PHP_EOL;
		
			$output .= "COMMIT;";
			
			return $output;
		}

		/* historiques */
		private function before(){
			$this->id = '';
			$action = '0';
			switch($this->action){
				case 'INSERT':
					$action = '1';
					break;
				case 'UPDATE':
					$action = '2';
					$this->id = V($this->args, 'ID');
					break;
				case 'DELETE':
					$action = '3';
					$this->id = V($this->args, 'ID');
					break;
			}

			$this->logs = array();
			$this->logs['LOG_Action'] = $action;
			$this->logs['LOG_Tablename'] = $this->tablename;
			$this->logs['LOG_Tablealias'] = Model::PRF[$this->tablename];

			$d = $this->select('*')
				->from($this->logs['LOG_Tablename'])
				->where('ID', $this->id, '=')
				->get()
				->first;
			$this->logs['LOG_Before'] = json_encode($d);
		}

		private function after(){
			switch($this->action){
				case 'INSERT':
					$this->id = $this->lastid();
					break;
				case 'UPDATE':

					break;
				case 'DELETE':
				
				break;
			}
			$d = $this->select('*')
				->from($this->logs['LOG_Tablename'])
				->where('ID', $this->id, '=')
				->get()
				->first;

			if(V($d, 'ISD') == '1'){
				$this->logs['LOG_Action'] = 3;
			}

			$this->logs['LOG_After'] = json_encode($d);
			$this->logs['LOG_Member'] = V($d, 'Member');
		}

		private function logs($r){
			if($r === true){
				$columns = array();
				$values = array(); 
				$args = $this->logs;

				foreach($args as $key => $value){
					$columns[] = '`'.$key.'`';
					$values[] = ':'.$key;
				}

				$columns = implode($columns, ',');
				$values = implode($values, ',');

				$query = "INSERT INTO `".Model::HISTORIQUE."` ($columns) VALUES ($values)";

				$statement = $this->DB->prepare($query);
				$r = $statement->execute($args);

				/*foreach($args as $key => $value){
					$query = str_replace(':'.$key, '\''.$value.'\'', $query);
				}

				D(array($query, $args, $r));*/
			}
		}

		private function logsfile($query, $args){
			foreach($args as $key => $value){
				$query = str_replace(':'.$key, '\''.$value.'\'', $query);
			}
			/*D(
				array(
					$query,
					$args
				)
			);*/
			$data = '-- '.date('Y-m-d H.i.s').PHP_EOL.$query.';'.PHP_EOL.PHP_EOL;

			$filename = LOGS.'_'.date('Y-m').SQL;
			$fullname = BACKUPS.$filename;
			
			Updatefile($fullname, $data);
		}

	}
