<?php
   class PrivilegeLang extends Lang{

      const L1 = array(
         'Privileges' => array(
            'AR' => 'الصلاحيات',
            'EN' => 'Privileges',
            'FR' => 'Privilèges'
         ),
         'Privilege' => array(
            'AR' => 'الصلاحية',
            'EN' => 'Privilege',
            'FR' => 'Privilège'
         ),
         'Item' => array(
            'AR' => 'العناصر',
            'EN' => 'Item',
            'FR' => 'Elements'
         ),
         'Browses' => array(
            'AR' => 'التصفح',
            'EN' => 'Browse',
            'FR' => 'Consultaion',
         ),
         'Searchs' => array(
            'AR' => 'البحث',
            'EN' => 'Search',
            'FR' => 'Recherch',
         ),
         'Adds' => array(
            'AR' => 'الإضافة',
            'EN' => 'Add',
            'FR' => 'Ajouter',
         ),
         'Detail' => array(
            'AR' => 'التفاصل',
            'EN' => 'Details',
            'FR' => 'Détails',
         ),
         'Edits' => array(
            'AR' => 'التعديل',
            'EN' => 'Edit',
            'FR' => 'Modifier',
         ),
         'Removes' => array(
            'AR' => 'الحذف',
            'EN' => 'Remove',
            'FR' => 'Supprimer',
         )
      );
	  
	  const L2 = array(
         'Jobs' => array(
            'AR' => '',
            'EN' => 'Jobs',
            'FR' => '',
         ),
         'Job' => array(
            'AR' => 'المهمة',
            'EN' => 'Job',
            'FR' => ''
         ),
         'Code' => array(
            'AR' => 'الرمز',
            'EN' => 'Code',
            'FR' => '',
         ),
         'NameFR' => array(
            'AR' => 'الإسم (فرنسي)',
            'EN' => 'French Name',
            'FR' => '',
         ),
         'NameEN' => array(
            'AR' => 'الإسم (اتجليزي)',
            'EN' => 'English Name',
            'FR' => '',
         ),
         'NameAR' => array(
            'AR' => 'الإسم (عربي)',
            'EN' => 'Arabic Name',
            'FR' => '',
         ),
         'State' => array(
            'AR' => 'الحالة',
            'EN' => 'State',
            'FR' => 'Etat',
         )
      );

      public static function Translate(){
		  $send = array();
		  $send = self::Load(self::L1);
         $send = array_merge($send, self::Load(self::L2));
         return $send;
      }

   }
