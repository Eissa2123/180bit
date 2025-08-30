<?php
	class Lang {
		const M = array(
			'ASuccess' => array(
				'AR' => 'تم حفظ البيانات بنجاح', 
				'EN' => 'Datas saved successfully',
				'FR' => 'Données sauvegardées avec succès'
			),'ADanger' => array(
				'AR' => 'لم يتم حفظ البيانات بنجاح',
				'EN' => 'Datas not saved successfully',
				'FR' => 'Données non enregistrées avec succès'
			),'ESuccess' => array(
				'AR' => 'تم حفظ التعديلات بنجاح', 
				'EN' => 'Datas edited successfully',
				'FR' => 'Données édités avec succès'
			),'EDanger' => array(
				'AR' => 'لم يتم التعديل بنجاح',
				'EN' => 'Datas not edited successfully',
				'FR' => 'Données non supprimer avec succès'
			),'RSuccess' => array(
				'AR' => 'تم حذف البيانات بنجاح',
				'EN' => 'Datas removed successfully ',
				'FR' => 'Données suppremer avec succès'
			),'RDanger' => array(
				'AR' => 'لم يتم حذف البيانات بنجاح',
				'EN' => 'Successfully removed',
				'FR' => 'Supprimer avec succès'
			),'ECore' => array(
				'AR' => 'الحقول التالية فارغة او تحتوي على أخطاء',
				'EN' => 'The following fields are empty or contains errors',
				'FR' => 'Les champes suivantes sont vides ou contiennent des erreurs'
			),'EEmpty' => array(
				'AR' => 'البيانات التالية غير موجودة',
				'EN' => 'The following datas are empties',
				'FR' => 'Les données suivantes sont des vides'
			),'EExists' => array(
				'AR' => 'البيانات التالية موجودة سابقا',
				'EN' => 'The following data already exist',
				'FR' => 'Les données suivantes existent déjà'
			),'EResults' => array(
				'AR' => 'لا توجد نتائج',
				'EN' => 'No results found',
				'FR' => 'Aucun résultat trouvé'
			), 'Confirmation' => array(
				'AR' => 'هل ترغب حقا بحذف بيانات السجل الظاهر امامك؟',
				'EN' => 'Do you really want to delete the history data appearing in front of you?',
				'FR' => 'Voulez-vous vraiment supprimer les données d\'historique apparaissant devant vous?'
			), 'MRecovery' => array(
				'AR' => 'هل ترغب حقا باسترجاع بيانات السجل الظاهر امامك قبل العملية ام بعد العملية؟',
				'EN' => 'Do you really want to recover the history data appearing in front of you before of after action?',
				'FR' => 'Voulez-vous vraiment recupere les données d\'historique apparaissant devant vous avant ou apres?'
			)
		);
		
		const D = array(
			'Panel' => array(
				'AR' => 'لوحة التحكم',
				'EN' => 'Control panel',
				'FR' => 'Panneau de contrôle'
			),'Page' =>array(
				'AR' => 'الصفحة',
				'EN' => 'Page',
				'FR' => 'Page'
			),'From' =>array(
				'AR' => 'من',
				'EN' => 'From',
				'FR' => 'Sur'
			),'To' =>array(
				'AR' => 'الى',
				'EN' => 'To',
				'FR' => 'À'
			),'Length' =>array(
				'AR' => 'السجلات',
				'EN' => 'Rows',
				'FR' => 'Lignes'
			),'ID' =>array(
				'AR' => 'الرقم',
				'EN' => 'ID',
				'FR' => 'Numero'
			),'AND' =>array(
				'AR' => 'و',
				'EN' => 'and',
				'FR' => 'et'
			),'Currencycode' =>array(
				'AR' => 'ر.س.',
				'EN' => 'SAR',
				'FR' => 'SAR'
			),'Currency' =>array(
				'AR' => 'ر.س.',
				'EN' => 'SAR',
				'FR' => 'SAR'
			),'CAT' =>array(
				'AR' => 'تاريخ الإضافة',
				'EN' => 'Creaded date',
				'FR' => 'Date de création'
			),'UAT' =>array(
				'AR' => 'تاريخ التعديل',
				'EN' => 'UAT',
				'FR' => 'Date de modification'
			),'DAT' =>array(
				'AR' => 'تاريخ الجذف',
				'EN' => 'Deleted date',
				'FR' => 'Date de suppression'
			),'Bank' =>array(
				'AR' => 'البنك',
				'EN' => 'Bank',
				'FR' => 'Bank'
			),'Cashbox' =>array(
				'AR' => 'الخزنة',
				'EN' => 'Cashbox',
				'FR' => 'Caisse'
			)
		);

		const A = array(
			'List' =>array(
				'AR' => 'القائمة',
				'EN' => 'To',
				'FR' => 'À'
			),
			'Listof' =>array(
				'AR' => 'لائحة',
				'EN' => 'List',
				'FR' => 'Liste'
			),'Details' =>array(
				'AR' => 'التصفح',
				'EN' => 'Details',
				'FR' => 'Détails'
			), 'Next' =>array(
				'AR' => 'التالي',
				'EN' => 'Next',
				'FR' => 'Suivant'
			),'Previous' =>array(
				'AR' => 'السابق',
				'EN' => 'Previous',
				'FR' => 'Précédent'
			), 'Add' =>array(
				'AR' => 'إضافة',
				'EN' => 'Add',
				'FR' => 'Ajouter'
			), 'Search' =>array(
				'AR' => 'بحث',
				'EN' => 'Search',
				'FR' => 'Recherche'
			), 'Clean' =>array(
				'AR' => 'تنظيف',
				'EN' => 'Reset',
				'FR' => 'Réinitialiser'
			),'Display' =>array(
				'AR' => 'تصفح',
				'EN' => 'Display',
				'FR' => 'Afficher'
			),'Edit' =>array(
				'AR' => 'تعديل',
				'EN' => 'Edit',
				'FR' => 'Modifier'
			),'Remove' =>array(
				'AR' => 'حذف',
				'EN' => 'Remove',
				'FR' => 'Supprimer'
			),'Print' =>array(
				'AR' => 'حذف',
				'EN' => 'Remove',
				'FR' => 'Supprimer'
			),'Print' =>array(
				'AR' => 'طباعة',
				'EN' => 'Print',
				'FR' => 'Imprimer'
			),'Recovery' =>array(
				'AR' => 'استرجاع',
				'EN' => 'Recover',
				'FR' => 'Récupérer'
			),'Save' =>array(
				'AR' => 'حفظ',
				'EN' => 'Save',
				'FR' => 'Enregistrer'
			),'Back' => array(
				'AR' => 'رجوع',
				'EN' => 'Back',
				'FR' => 'Retour'
			),'Confirm' =>array(
				'AR' => 'تأكيد',
				'EN' => 'confirmation',
				'FR' => 'confirmation'
			),'Cancel' => array(
				'AR' => 'الغاء',
				'EN' => 'Cancel',
				'FR' => 'Annuler'
			)
		);

		const J = array(
			'NSelectedText' => array(
			   'AR' => 'تم تحديد',
			   'EN' => 'Selected',
			   'FR' => 'Sélectionnés',
			),
			'AllSelectedText' => array(
			   'AR' => 'الكل محدد',
			   'EN' => 'All Selected',
			   'FR' => 'Tous Sélectionnés',
			),
			'SelectAll' => array(
			   'AR' => 'حدد الكل',
			   'EN' => 'Select All',
			   'FR' => 'Sélectionnés Tous',
			),
			'Receipt' => array(
			   'AR' => 'سند',
			   'EN' => 'Receipt',
			   'FR' => 'Reçu',
			),
			'ReceiptIN' => array(
			   'AR' => 'سند قبض',
			   'EN' => 'Receipt in',
			   'FR' => 'Reçu in',
			),
			'ReceiptOUT' => array(
			   'AR' => 'سند صرف',
			   'EN' => 'Receipt out',
			   'FR' => 'Reçu out',
			)
		);
		
		public static function Load($in, $state = true){
			$send = array();
			
			foreach($in as $key => $value){
				if(isset($value[strtoupper(LNG)])){
					$send[$key] = $value[strtoupper(LNG)];
				}
			}
			
			if($state and is_array(self::D) and count(self::D) > 0){
				foreach(self::D as $key => $value){
					if(isset($value[strtoupper(LNG)])){
						$send[$key] = $value[strtoupper(LNG)];
					}
				}
			}
			
			if($state and is_array(self::M) and count(self::M) > 0){
				foreach(self::M as $key => $value){
					if(isset($value[strtoupper(LNG)])){
						$send[$key] = $value[strtoupper(LNG)];
					}
				}
			}
			
			if($state and is_array(self::A) and count(self::A) > 0){
				foreach(self::A as $key => $value){
					if(isset($value[strtoupper(LNG)])){
						$send[$key] = $value[strtoupper(LNG)];
					}
				}
			}
			
			if($state and is_array(self::J) and count(self::J) > 0){
				foreach(self::J as $key => $value){
					if(isset($value[strtoupper(LNG)])){
						$send[$key] = $value[strtoupper(LNG)];
					}
				}
			}
			
			return $send;
		}
	}
