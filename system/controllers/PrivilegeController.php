<?php
   class PrivilegeController extends Controller{

      private $JobModel;
      private $PrivilegeModel;
      private $ItemModel;
      private $PrivilegeLang;
      private $PrivilegeView;

      public function __construct(){
         parent::__construct();
         $this->JobModel = new JobModel();
         $this->PrivilegeModel = new PrivilegeModel();
         $this->ItemModel = new ItemModel();
         $this->PrivilegeLang = PrivilegeLang::Translate();
         $this->PrivilegeView = new PrivilegeView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->PrivilegeLang;
		 
         $JobCore = new JobCore();
         $JobCore->LoadForm($in);
		 
         $PrivilegeCore = new PrivilegeCore();
         $PrivilegeCore->LoadForm($in);
		 $PrivilegeCore->Job($JobCore->Preper(Core::FINDEX));
		 
         $send['LPosts'] = $PrivilegeCore->Preper(Core::FINDEX);
		 
         $send = array_merge($send, $this->PrivilegeModel->index($send['LPosts']));
         if(L($send, 'LPrivileges')){
            foreach($send['LPrivileges'] as $KPrivilege => $VPrivilege){
               $send['LPrivileges'][$KPrivilege] = $VPrivilege;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		 $send = array_merge($send, $this->Lengths());
         $this->PrivilegeView->index($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->PrivilegeLang;
         $PrivilegeCore = new PrivilegeCore();
         $PrivilegeCore->LoadParams($in);
         $send['Errors'] = $PrivilegeCore->Check(CORE::FDISPLAY);
		 
		 $send = array_merge($send, $this->ItemModel->index($in));
		 
		 $in['AUTO']['LItems'] = $send['LItems'];
		 
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $PrivilegeCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->PrivilegeModel->display($send['LPosts']));
         }
		 
         if(L($send,'Cells')) {
            $Cells = $send['Cells'];
			
			$Cells['Browse'] = array();
			$Cells['Search'] = array();
			$Cells['Display'] = array();
			$Cells['Add'] = array();
			$Cells['Edit'] = array();
			$Cells['Remove'] = array();
			
			if(L($send,'LItems')) {
				foreach($send['LItems'] as $item){
					if(L($Cells,'Privalages')) {
						foreach($Cells['Privalages'] as $privalage){
							if($item['ID'] === $privalage['Item']){
		
								$Cells['Browse'][] = array(
									'ID' => $item['ID'],
									'NameFR' => $item['NameFR'],
									'NameEN' => $item['NameEN'],
									'NameAR' => $item['NameAR'],
									'Item' => $privalage['Item'],
									'State' => $privalage['Browse']
								);
								
								$Cells['Search'][] = array(
									'ID' => $item['ID'],
									'NameFR' => $item['NameFR'],
									'NameEN' => $item['NameEN'],
									'NameAR' => $item['NameAR'],
									'Item' => $privalage['Item'],
									'State' => $privalage['Search']
								);
								
								$Cells['Display'][] = array(
									'ID' => $item['ID'],
									'NameFR' => $item['NameFR'],
									'NameEN' => $item['NameEN'],
									'NameAR' => $item['NameAR'],
									'Item' => $privalage['Item'],
									'State' => $privalage['Display']
								);
								
								$Cells['Add'][] = array(
									'ID' => $item['ID'],
									'NameFR' => $item['NameFR'],
									'NameEN' => $item['NameEN'],
									'NameAR' => $item['NameAR'],
									'Item' => $privalage['Item'],
									'State' => $privalage['Add']
								);
								
								$Cells['Edit'][] = array(
									'ID' => $item['ID'],
									'NameFR' => $item['NameFR'],
									'NameEN' => $item['NameEN'],
									'NameAR' => $item['NameAR'],
									'Item' => $privalage['Item'],
									'State' => $privalage['Edit']
								);
								
								$Cells['Remove'][] = array(
									'ID' => $item['ID'],
									'NameFR' => $item['NameFR'],
									'NameEN' => $item['NameEN'],
									'NameAR' => $item['NameAR'],
									'Item' => $privalage['Item'],
									'State' => $privalage['Remove']
								);
							}
						}
					}
				}
			}
				
            $send['Cells'] = $Cells;
            $this->PrivilegeView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->PrivilegeLang;
         $JobCore = new JobCore();
         $PrivilegeCore = new PrivilegeCore();
		 $send = array_merge($send, $this->ItemModel->index($in));
		 
		 $in['AUTO']['LItems'] = $send['LItems'];
		 
        if(clicked($in, 'btn_add')){ 
            $JobCore->LoadForm($in);
            $send['LPosts'] = $JobCore->Preper(Core::FADD);
			$send['Errors'] = $JobCore->Check(CORE::FADD);
            if(count($send['Errors']) === 0){
				$send = array_merge($send, $this->JobModel->insert($send['LPosts']));
			    if(isset($send['Cells'])){
					$in['AUTO']['Job'] = V($send, 'Cells', 'ID');
					$PrivilegeCore->LoadForm($in);
					$send['Errors'] = $PrivilegeCore->Check(CORE::FADD);
					if(count($send['Errors']) === 0){
						$send['LPosts'] = $PrivilegeCore->Preper(Core::FADD);
						$send = array_merge($send, $this->PrivilegeModel->insert($send['LPosts']));
						$send['LPosts'] = array();
					}else{
						$PrivilegeCore->LoadForm($in);
						$send['LPosts'] = array_merge($send['LPosts'], $PrivilegeCore->Preper(Core::FADD));
					}
			    }else{
					$PrivilegeCore->LoadForm($in);
					$send['LPosts'] = array_merge($send['LPosts'], $PrivilegeCore->Preper(Core::FADD));
				}
            }else{
				$PrivilegeCore->LoadForm($in);
				$send['LPosts'] = array_merge($send['LPosts'], $PrivilegeCore->Preper(Core::FADD));
			}
		}else{
			$send['LPosts'] = array();
		}
		$send = array_merge($send, $this->PrivilegeModel->add($in));
		$this->PrivilegeView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->PrivilegeLang;
         $PrivilegeCore = new PrivilegeCore();
		 $send = array_merge($send, $this->ItemModel->index($in));
		 
		 $in['AUTO']['LItems'] = $send['LItems'];
		 
         if(clicked($in, 'btn_edit')){ 
			$JobCore = new JobCore();
            $JobCore->LoadForm($in);
			$send['Errors'] = $JobCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
				$send['LPosts'] = $JobCore->Preper(Core::FEDIT);
				$send = array_merge($send, $this->JobModel->update($send['LPosts']));
				$PrivilegeCore->LoadForm($in);
				$send['Errors'] = $PrivilegeCore->Check(CORE::FEDIT);
				if(count($send['Errors']) === 0){
				   $send['LPosts'] = $PrivilegeCore->Preper(Core::FEDIT);
				   $send = array_merge($send, $this->PrivilegeModel->update($send['LPosts']));
				   if(isset($send['Success']) and $send['Success']){
					  //$PrivilegeCore->Savefiles();
				   }
				}
            }
         }
         $PrivilegeCore->LoadParams($in);
         $send = array_merge($send, $this->PrivilegeModel->edit($PrivilegeCore->Preper(Core::FDISPLAY)));
		 
         if(L($send, 'Cells')){
            $Cells = $send['Cells'];
            $this->PrivilegeView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->PrivilegeLang;
         $PrivilegeCore = new PrivilegeCore();
         if(clicked($in, 'btn_remove')){ 
            $PrivilegeCore->LoadForm($in);
            $send['Errors'] = $PrivilegeCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $PrivilegeCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->JobModel->delete($send['LPosts']));
            }
         }
         $PrivilegeCore->LoadParams($in);
         $send['Errors'] = $PrivilegeCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $PrivilegeCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->PrivilegeModel->remove($send['LPosts']));
         }
		 
		 $send = array_merge($send, $this->ItemModel->index($in));
		 $in['AUTO']['LItems'] = $send['LItems'];
		 
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
			 
			 if(L($send, 'Cells')){
				$Cells = $send['Cells'];
				
				$Cells['Browse'] = array();
				$Cells['Search'] = array();
				$Cells['Display'] = array();
				$Cells['Add'] = array();
				$Cells['Edit'] = array();
				$Cells['Remove'] = array();
				
				foreach($send['LItems'] as $item){
					$Cells['Browse'][$item['ID']] = array(
						'ID' => $item['ID'],
						'NameFR' => $item['NameFR'],
						'NameEN' => $item['NameEN'],
						'NameAR' => $item['NameAR'],
						'State' => '1'
					);
					
					$Cells['Search'][$item['ID']] = array(
						'ID' => $item['ID'],
						'NameFR' => $item['NameFR'],
						'NameEN' => $item['NameEN'],
						'NameAR' => $item['NameAR'],
						'State' => '1'
					);
					
					$Cells['Display'][$item['ID']] = array(
						'ID' => $item['ID'],
						'NameFR' => $item['NameFR'],
						'NameEN' => $item['NameEN'],
						'NameAR' => $item['NameAR'],
						'State' => '1'
					);
					
					$Cells['Add'][$item['ID']] = array(
						'ID' => $item['ID'],
						'NameFR' => $item['NameFR'],
						'NameEN' => $item['NameEN'],
						'NameAR' => $item['NameAR'],
						'State' => '1'
					);
					
					$Cells['Edit'][$item['ID']] = array(
						'ID' => $item['ID'],
						'NameFR' => $item['NameFR'],
						'NameEN' => $item['NameEN'],
						'NameAR' => $item['NameAR'],
						'State' => '1'
					);
					
					$Cells['Remove'][$item['ID']] = array(
						'ID' => $item['ID'],
						'NameFR' => $item['NameFR'],
						'NameEN' => $item['NameEN'],
						'NameAR' => $item['NameAR'],
						'State' => '1'
					);
				}
				
				if(isset($Cells['Privalages'])){
					foreach($send['LItems'] as $item){
						foreach($Cells['Privalages'] as $privalage){
							if($item['ID'] === $privalage['Item']){
								$Cells['Browse'][$item['ID']] = array(
									'ID' => $item['ID'],
									'NameFR' => $item['NameFR'],
									'NameEN' => $item['NameEN'],
									'NameAR' => $item['NameAR'],
									'Item' => $privalage['Item'],
									'State' => $privalage['Browse']
								);
								
								$Cells['Search'][$item['ID']] = array(
									'ID' => $item['ID'],
									'NameFR' => $item['NameFR'],
									'NameEN' => $item['NameEN'],
									'NameAR' => $item['NameAR'],
									'Item' => $privalage['Item'],
									'State' => $privalage['Search']
								);
								
								$Cells['Display'][$item['ID']] = array(
									'ID' => $item['ID'],
									'NameFR' => $item['NameFR'],
									'NameEN' => $item['NameEN'],
									'NameAR' => $item['NameAR'],
									'Item' => $privalage['Item'],
									'State' => $privalage['Display']
								);
								
								$Cells['Add'][$item['ID']] = array(
									'ID' => $item['ID'],
									'NameFR' => $item['NameFR'],
									'NameEN' => $item['NameEN'],
									'NameAR' => $item['NameAR'],
									'Item' => $privalage['Item'],
									'State' => $privalage['Add']
								);
								
								$Cells['Edit'][$item['ID']] = array(
									'ID' => $item['ID'],
									'NameFR' => $item['NameFR'],
									'NameEN' => $item['NameEN'],
									'NameAR' => $item['NameAR'],
									'Item' => $privalage['Item'],
									'State' => $privalage['Edit']
								);
								
								$Cells['Remove'][$item['ID']] = array(
									'ID' => $item['ID'],
									'NameFR' => $item['NameFR'],
									'NameEN' => $item['NameEN'],
									'NameAR' => $item['NameAR'],
									'Item' => $privalage['Item'],
									'State' => $privalage['Remove']
								);
							}
						}
					}
				}
					
				$send['Cells'] = $Cells;
			 }
            $this->PrivilegeView->remove($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function setting($in){
         $send = array();
         //$send['LTranslates'] = $this->PrivilegeLang;
         //$PrivilegeCore = new PrivilegeCore();
         //$this->PrivilegeView->setting($send);
      }
	  
   }

