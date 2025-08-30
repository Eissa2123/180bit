<?php
   class CategoryLang extends Lang{

      const L = array(
         'Categories' => array(
            'AR' => 'الأصناف',
            'EN' => 'Categories',
            'FR' => 'Categories',
         ),
         'Category' => array(
            'AR' => 'الصنف',
            'EN' => 'Category',
            'FR' => 'Catégorie',
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
         ),
         'Picture' => array(
            'AR' => 'الصورة',
            'EN' => 'Picture',
            'FR' => 'Photo',
         )
      );

      public static function Translate(){
         return self::Load(self::L);
      }

   }
