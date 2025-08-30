<?php
	class Controller {

		protected $ErrorController;

		function __construct () {
			$this->ErrorController = new ErrorController();

			if(isset($_SESSION[SESSION_NAME]['SESSION_START'])){
				$_SESSION[SESSION_NAME]['SESSION_NOW'] = time();
				$activity = $_SESSION[SESSION_NAME]['SESSION_NOW'] - $_SESSION[SESSION_NAME]['SESSION_START'];
				$_SESSION[SESSION_NAME]['SESSION_ACTIVITY'] = $activity;

				if($activity >= TIMEOUT){
					$_SESSION[SESSION_NAME] = array();
					session_destroy(); 
					redirection(LOGIN_PAGE);
				}
			}
		}
		
		public function Lengths(){
			$send = array();
			
			$send['LLengths'] = LENGTHS;
			
			return $send;
		}
		
		public function Pager($in){
			$send = array();
			
			$send['Current'] = $in['LPosts']['Page'];
			$send['Length'] = $in['LPosts']['Length'];
			$send['Count'] = $in['Count'];
			$send['Max'] = ceil( $send['Count'] / $send['Length']);
			$send['Previous'] = ((int) $send['Current']) - 1;
			$send['Next'] = ((int) $send['Current']) + 1;
			
			if(!($send['Next'] <= ($send['Max']) and $send['Next'] >= 1)){
				unset($send['Next']);
			}
			
			if(!($send['Previous'] <= $send['Max'] and $send['Previous'] >= 1)){
				unset($send['Previous']);
			}
			
			return $send;
		}

		public function Formats($Datas, $Columns = ['HT', 'TVA', 'Tax', 'Cobon', 'Gift', 'Reduction', 'Expense', 'Paid', 'Rest', 'TTC', 'Paiments', 'Return']){
			if(is_array($Datas)){
				foreach($Datas as $key => $value){
					if(is_array($value) or (!is_array($value) and in_array($key, $Columns))){
						$value = $this->Formats($value);
						$Datas[$key] = $value;
					}
				}
			}else if(is_numeric($Datas)){
				$Datas = $this->Format($Datas);
			}
			return $Datas;
		}

		public function Format($Datas, $format = NBR_FORMAT){
			$Datas = (double) $Datas;
			$Datas = '0' + $Datas;
			$Datas = round((double) $Datas, NBR_FORMAT);
			$Datas = explode('.', $Datas);

			if(count($Datas) == 1){
				$Datas[1] = '';
			}
			while(strlen($Datas[1]) < NBR_FORMAT){
				$Datas[1] .= '0';
			}
			if(NBR_FORMAT == 0){
				$Datas = $Datas[0];
			}else{
				$Datas = implode('.', $Datas);
			}

			return $Datas;
		}

		public function Tochart($datas, $legendText1, $legendText2, $topText = '', $leftText = ''){
			$send = array();

			$send['title'] = array(
				'text' => $topText
			);

			$send['axisY'] = array(
				'title' => $leftText,
				'valueFormatString' => "#0.#,."
			);

			$send['data'][] = array(
				'type' => "stackedColumn",
				'legendText' => $legendText1,
				'showInLegend' => "true",
				'dataPoints' => $datas[0]
			); 

			$send['data'][] = array(
				'type' => "stackedColumn",
				'legendText' => $legendText2,
				'showInLegend' => "true",
				'indexLabel' => "#total",
				'indexLabelPlacement' => "outside",
				'dataPoints' => $datas[1]
			);
			
			return json_encode($send);
		}

		public function Tochart2($datas, $title) {
			$send = array();
			$items = array();
			foreach ($datas as $kdata => $vdata) {
				$item = array();
				
				$item['type'] = 'line';
				$item['lineThickness'] = 1;
				$item['showInLegend'] = true;
				$item['name'] = "$kdata";
				
				$item['dataPoints'] = array();
				foreach($vdata as $value){
					$item['dataPoints'][] = $value;
				}

				$items[] = $item;
			}

			$send['theme'] = "theme2";
            $send['title'] = array(
               'text' => $title
			);
			$send['animationEnabled'] = true;
            $send['axisX'] = array(
               'interval' =>  1
			);
            $send['axisY'] = array(
               'includeZero' =>  false
			);
            $send['data'] = $items;

			return json_encode($send);
		}
		
		public function CountPages($count, $Length){
			return ceil($count / $Length);
		}
	}
