<?php
   class CobonLang extends Lang{

      const L = array(
         'Cobons' => array(
            'AR' => 'الكوبونات',
            'EN' => 'Cobons',
            'FR' => 'Cobons',
         ),
		   'Cobon' => array(
            'AR' => 'الكوبون',
            'EN' => 'Cobon',
            'FR' => 'Cobon',
         ),
         'Marketer' => array(
            'AR' => 'المسوق',
            'EN' => 'Marketer',
            'FR' => 'Commerçante',
         ),
         'Code' => array(
            'AR' => 'الرمز',
            'EN' => 'Code',
            'FR' => 'Code',
         ),
         'Name' => array(
            'AR' => 'الوصف',
            'EN' => 'Description',
            'FR' => 'Description',
         ),
         'Provider' => array(
            'AR' => 'المورد',
            'EN' => 'Fournisseur',
            'FR' => 'Provider',
         ),
         'Ratio' => array(
            'AR' => 'نسبة الخصم',
            'EN' => 'Percentage',
            'FR' => 'Pourcentage',
         ),
         'Ratios' => array(
            'AR' => 'نسبة الربح',
            'EN' => 'Percentage',
            'FR' => 'Pourcentage',
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
