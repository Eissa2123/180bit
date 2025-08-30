<?php
   class TermLang extends Lang{

      const L = array(
         'Terms' => array(
            'AR' => 'الشروط والأحكام',
            'EN' => 'Terms and Conditions',
            'FR' => 'Termes et conditions',
         ),
		   'Term' => array(
            'AR' => 'الشروط والأحكام',
            'EN' => 'Term and Condition',
            'FR' => 'Terme et condition',
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
