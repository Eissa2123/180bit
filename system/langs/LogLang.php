<?php
   class LogLang extends Lang{

      const L = array(
         'Logs' => array(
            'AR' => 'Log',
            'EN' => 'Log',
            'FR' => 'Log',
         ),
         'Log' => array(
            'AR' => 'Log',
            'EN' => 'Log',
            'FR' => 'Log',
         ),
         'Tablealias' => array(
            'AR' => 'Tablealias',
            'EN' => 'Tablealias',
            'FR' => 'Tablealias',
         ),
         'Tablename' => array(
            'AR' => 'Tablename',
            'EN' => 'Tablename',
            'FR' => 'Tablename',
         ),
         'Action' => array(
            'AR' => 'Action',
            'EN' => 'Action',
            'FR' => 'Action',
         ),
         'Before' => array(
            'AR' => 'Before',
            'EN' => 'Before',
            'FR' => 'Before',
         ),
         'After' => array(
            'AR' => 'After',
            'EN' => 'After',
            'FR' => 'After',
         ),
         'Member' => array(
            'AR' => 'Member',
            'EN' => 'Member',
            'FR' => 'Member',
         ),
         'AT' => array(
            'AR' => 'AT',
            'EN' => 'AT',
            'FR' => 'AT',
         )
      );

      public static function Translate(){
         return self::Load(self::L);
      }

   }
