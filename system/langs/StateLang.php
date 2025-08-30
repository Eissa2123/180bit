<?php
   class StateLang extends Lang{

      const L = array(
         'States' => array(
            'AR' => '',
            'EN' => 'States',
            'FR' => '',
         ),
         'State' => array(
            'AR' => '',
            'EN' => 'State',
            'FR' => '',
         ),
         'NameFR' => array(
            'AR' => 'الرمز',
            'EN' => 'NameFR',
            'FR' => '',
         ),
         'NameEN' => array(
            'AR' => '',
            'EN' => 'NameEN',
            'FR' => '',
         ),
         'NameEN' => array(
            'AR' => '',
            'EN' => 'NameEN',
            'FR' => '',
         ),
         'Class' => array(
            'AR' => '',
            'EN' => 'Class',
            'FR' => '',
         ),
         'State' => array(
            'AR' => '',
            'EN' => 'State',
            'FR' => '',
         )
      );

      public static function Translate(){
         return self::Load(self::L);
      }

   }
