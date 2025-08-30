<?php
   class ProductLang extends Lang{

      const L = array(
         'Products' => array(
            'AR' => 'المنتجات',
            'EN' => 'Products',
            'FR' => 'Produits',
         ),
		   'Product' => array(
            'AR' => 'المنتج',
            'EN' => 'Product',
            'FR' => 'Produit',
         ),
         'Category' => array(
            'AR' => 'الصنف',
            'EN' => 'Category',
            'FR' => 'Catégorie',
         ),
         'Nature' => array(
            'AR' => 'الطبيعة',
            'EN' => 'Nature',
            'FR' => 'Nature',
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
         'Cost' => array(
            'AR' => 'الثكلفة',
            'EN' => 'Cost',
            'FR' => 'Coût',
         ),
         'Price' => array(
            'AR' => 'السعر',
            'EN' => 'Price',
            'FR' => 'Prix',
         ),
         'Unite' => array(
            'AR' => 'الوحدة',
            'EN' => 'Unite',
            'FR' => 'Unité',
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
