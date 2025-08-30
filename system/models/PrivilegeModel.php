<?php
   class PrivilegeModel extends Model{

		const ITEM = ',jobs,';
		public function __construct(){
			parent::__construct();
		}

      public function index($in){
         $send = array();
		 
		 $send['LStates'] = $this->select('*')
		   ->from(Model::STATE)
		   ->where('ISD', '0', '=')
		   ->where('Items', self::ITEM, 'LIKE', 'AND')
		   ->get()->all;

         $send['LJobs'] = $this->select('*')
            ->from(Model::JOB)
			->where('ISD', '0', '=')
            ->where('State', $in['Job']['State'], '=', 'AND')
            ->limit($in['Page'], $in['Length'])
            ->get()->all;

         $send['Count'] = $this->limit()->get()->count;
		if(is_array($send['LJobs']) and count($send['LJobs']) > 0){

            foreach($send['LJobs'] as $KJob => $VJob){

               $VJob['State'] = $this->select('*')
                  ->from(Model::STATE)
                  ->where('ID', $VJob['State'])
                  ->get()->first;

               $send['LJobs'][$KJob] = $VJob;
            }
         }
         return $send;
      }

      public function display($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::JOB)
            ->where('ID', $in['ID'], '=')
			->where('ISD', '0', '=', 'AND')
            ->get()->first;
			
		if(L($send, 'Cells')){
			$send['Cells']['Privalages'] = $this->select('*')
               ->from(Model::PRIVILEGE)
               ->where('Job', $send['Cells']['ID'])
               ->get()->all;
			   
			   if(is_array($send['Cells']['Privalages']) and count($send['Cells']['Privalages']) > 0){
				   foreach($send['Cells']['Privalages'] as $KPrivalage => $VPrivalage){
					   $VPrivalage['Browse'] = $this->select('*')
						   ->from(Model::ROLE)
						   ->where('ID', $VPrivalage['Browse'])
						   ->get()->first;
					   $VPrivalage['Search'] = $this->select('*')
						   ->from(Model::ROLE)
						   ->where('ID', $VPrivalage['Search'])
						   ->get()->first;
					  $VPrivalage['Display'] = $this->select('*')
						   ->from(Model::ROLE)
						   ->where('ID', $VPrivalage['Display'])
						   ->get()->first;
					   $VPrivalage['Add'] = $this->select('*')
						   ->from(Model::ROLE)
						   ->where('ID', $VPrivalage['Add'])
						   ->get()->first; 
					  $VPrivalage['Edit'] = $this->select('*')
						   ->from(Model::ROLE)
						   ->where('ID', $VPrivalage['Edit'])
						   ->get()->first;
					   $VPrivalage['Remove'] = $this->select('*')
						   ->from(Model::ROLE)
						   ->where('ID', $VPrivalage['Remove'])
						   ->get()->first; 
						   
					   $send['Cells']['Privalages'][$KPrivalage] = $VPrivalage;
				   }
			   }
			   
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
				
			return $send;
		}

		public function insert($in){
			$send = array();
			
			$job = '';
			 
			foreach($in['Privileges'] as $kin => $vin){
				
				$job = $vin['Job'];
				$privilege = $this->select('*')
					->from(Model::PRIVILEGE)
					->where('Job', $vin['Job'], '=')
					->where('Item', $vin['Item'], '=', 'AND')
					->get()->first;
					
				if($privilege === null){
					$this->into(Model::PRIVILEGE)->set($vin)->save();
				}
				
			}
				
			$send['Cells'] =  $this->select('*')
				->from(Model::PRIVILEGE)
				->where('Job', $job, '=')
				->get()->all;

			return $send;
		}

      	public function edit($in){
		  	$send = array();

			$send['Cells'] = $this->select('*')
				->from(Model::JOB)
				->where('ID', $in['ID'], '=')
				->where('ISD', '0', '=', 'AND')
				->get()->first;
			
			if(L($send, 'Cells')){
				$send['Cells']['Privalages'] = $this->select('*')
					->from(Model::PRIVILEGE)
					->where('Job', $send['Cells']['ID'])
					->get()->all;
				
				$send['Cells']['State'] = $this->select('*')
					->from(Model::STATE)
					->where('ID', $send['Cells']['State'])
					->get()->first;
				
				$send['LStates'] = $this->select('*')
					->from(Model::STATE)
					->where('ISD', '0', '=')
					->where('ID', $send['Cells']['State']['ID'], '<>', 'AND')
					->where('Items', self::ITEM, 'LIKE', 'AND')
					->get()->all;
				
				$send['LStates'][] = $this->select('*')
					->from(Model::STATE)
					->where('ISD', '0', '=')
					->where('ID', $send['Cells']['State']['ID'], '=', 'AND')
					->get()->first;
			} 

         	return $send;
      }

      public function update($in){

			$send = array();
			foreach($in as $kin => $vin){
				$privilege = $this->select('*')
					->from(Model::PRIVILEGE)
					->where('Job', $vin['Job'], '=')
					->where('Item', $vin['Item'], '=', 'AND')
					->get()->first;
				if($privilege === null){
					$this->into(Model::PRIVILEGE)->set($vin)->save();
				}else{
					$this->into(Model::PRIVILEGE)->apt($vin, 
						array(
							'Job' => $vin['Job'],
							'Item' => $vin['Item']
						)
					)->save();
				}
			}

			return $send;
      }

      public function remove($in){
         $send = array();

         $send['Cells'] = $this->select('*')
            ->from(Model::JOB)
            ->where('ID', $in['ID'], '=')
			->where('ISD', '0', '=', 'AND')
            ->get()->first;
			
		if(L($send, 'Cells')){
			$send['Cells']['Privalages'] = $this->select('*')
               ->from(Model::PRIVILEGE)
               ->where('Job', $send['Cells']['ID'])
               ->get()->all;
			   
			   if(is_array($send['Cells']['Privalages']) and count($send['Cells']['Privalages']) > 0){
				   foreach($send['Cells']['Privalages'] as $KPrivalage => $VPrivalage){
					   $VPrivalage['Browse'] = $this->select('*')
						   ->from(Model::ROLE)
						   ->where('ID', $VPrivalage['Browse'])
						   ->get()->first;
					   $VPrivalage['Search'] = $this->select('*')
						   ->from(Model::ROLE)
						   ->where('ID', $VPrivalage['Search'])
						   ->get()->first;
					  $VPrivalage['Display'] = $this->select('*')
						   ->from(Model::ROLE)
						   ->where('ID', $VPrivalage['Display'])
						   ->get()->first;
					   $VPrivalage['Add'] = $this->select('*')
						   ->from(Model::ROLE)
						   ->where('ID', $VPrivalage['Add'])
						   ->get()->first; 
					  $VPrivalage['Edit'] = $this->select('*')
						   ->from(Model::ROLE)
						   ->where('ID', $VPrivalage['Edit'])
						   ->get()->first;
					   $VPrivalage['Remove'] = $this->select('*')
						   ->from(Model::ROLE)
						   ->where('ID', $VPrivalage['Remove'])
						   ->get()->first; 
						   
					   $send['Cells']['Privalages'][$KPrivalage] = $VPrivalage;
				   }
			   }
			   
            $send['Cells']['State'] = $this->select('*')
               ->from(Model::STATE)
               ->where('ID', $send['Cells']['State'])
               ->get()->first;

         }
         return $send;
      }

      public function delete($in){
         $send = array();

         $row = $this->select('*')
            ->from(Model::PRIVILEGE)
            ->where('ID', $in['ID'])
            ->where('State', '1', '<>', 'AND')
            ->get()->first;

         if($row === null){
            $send['Success'][] = 'ID';
         }

         if(!isset($send['Errors'])){
            $send['Success'] = $this->into(Model::PRIVILEGE)->del($in)->save();
         }

         return $send;
      }
	  
      public function setting($in){
		$send = array();

		/*$send['Cells'] = $this->select('*')
		   ->from(Model::SETTING)
		   ->get()->first;*/

		return $send;
	 }

	 public function saving($in){
		$send = array();

		// ..

		return $send;
	 }

   }

