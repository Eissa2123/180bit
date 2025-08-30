<?php
   class HistoriqueLang extends Lang{

      const L = array(
         'Historiques' => array(
            'AR' => 'الاحداث',
            'EN' => 'Historiques',
            'FR' => 'Historiques',
         ),
         'Historique' => array(
            'AR' => 'الحدث',
            'EN' => 'Historique',
            'FR' => 'Historique',
         ),
         'Tablealias' => array(
            'AR' => 'الاختصار',
            'EN' => 'Tablealias',
            'FR' => 'Tablealias',
         ),
         'Tablename' => array(
            'AR' => 'الجدول',
            'EN' => 'Tablename',
            'FR' => 'Tablename',
         ),
         'Action' => array(
            'AR' => 'العملية',
            'EN' => 'Action',
            'FR' => 'Action',
         ),
         'Before' => array(
            'AR' => 'قبل',
            'EN' => 'Before',
            'FR' => 'Avant',
         ),
         'After' => array(
            'AR' => 'بعد',
            'EN' => 'After',
            'FR' => 'Apres',
         ),
         'Member' => array(
            'AR' => 'الموظف',
            'EN' => 'Member',
            'FR' => 'Member',
         ),
         'AT' => array(
            'AR' => 'التاريخ و الوقت',
            'EN' => 'AT',
            'FR' => 'AT',
         ),
         'ATFrom' => array(
            'AR' => 'من',
            'EN' => 'ATFrom',
            'FR' => 'ATFrom',
         ),
         'ATTo' => array(
            'AR' => 'الى',
            'EN' => 'ATTo',
            'FR' => 'ATTo',
         )
      );

      public static function Translate(){
         return self::Load(self::L);
      }

   }
