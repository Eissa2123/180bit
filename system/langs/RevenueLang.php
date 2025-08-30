<?php
   class RevenueLang extends Lang{

      const L = array(
         'Revenues' => array(
            'AR' => 'الأرصدة الإفتتاحية',
            'EN' => 'Revenues',
            'FR' => 'Revenus',
         ),
		   'Revenue' => array(
            'AR' => 'الرصيد الإفتتاحي',
            'EN' => 'Revenue',
            'FR' => 'Revenu',
         ),
         'Code' => array(
            'AR' => 'الرمز',
            'EN' => 'Code',
            'FR' => 'Code',
         ),
         'Name' => array(
            'AR' => 'الإسم',
            'EN' => 'Name',
            'FR' => 'Description',
         ),
         'AT' => array(
            'AR' => 'التاريخ',
            'EN' => 'Date',
            'FR' => 'Date',
         ),
         'Source' => array(
            'AR' => 'المصدر',
            'EN' => 'Source',
            'FR' => 'Source',
         ),
         'Amount' => array(
            'AR' => 'المبلغ',
            'EN' => 'Amount',
            'FR' => 'Montant',
         ),
         'Method' => array(
            'AR' => 'الطريقة',
            'EN' => 'Method',
            'FR' => 'Méthode',
         ),
         'State' => array(
            'AR' => 'الحالة',
            'EN' => 'State',
            'FR' => 'Etat',
         )
      );

      public static function Translate(){
         return self::Load(self::L);
      }

   }
