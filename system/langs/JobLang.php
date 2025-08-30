<?php
   class JobLang extends Lang{

      const L = array(
         'Jobs' => array(
            'AR' => 'المهام',
            'EN' => 'Jobs',
            'FR' => '',
         ),
         'Job' => array(
            'AR' => 'المهمة',
            'EN' => 'Job',
            'FR' => '',
         ),
         'Code' => array(
            'AR' => 'الرمز',
            'EN' => 'Code',
            'FR' => '',
         ),
         'NameFR' => array(
            'AR' => 'الإسم (فرنسي)',
            'EN' => 'Name (franche)',
            'FR' => '',
         ),
         'NameEN' => array(
            'AR' => 'الإسم (انجليزي)',
            'EN' => 'Name (english)',
            'FR' => '',
         ),
         'NameAR' => array(
            'AR' => 'الإسم (عربي)',
            'EN' => 'Name (arabic)',
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
