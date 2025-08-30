<?php
   class ProviderLang extends Lang{

      const L = array(
         'Providers' => array(
            'AR' => 'الموردين',
            'EN' => 'Providers',
            'FR' => 'Fournisseuses',
         ),
         'Provider' => array(
            'AR' => 'المورد',
            'EN' => 'Provider',
            'FR' => 'Fournisseuse',
         ),
         'Categories' => array(
            'AR' => 'الأصناف',
            'EN' => 'Categories',
            'FR' => 'Categories',
         ),
         'RC' => array(
            'AR' => 'الرقم التجاري',
            'EN' => 'RC',
            'FR' => 'RC',
         ),
         'Taxnumber' => array(
            'AR' => 'الرقم الضريبي',
            'EN' => 'Tax Number',
            'FR' => 'Tax Number',
         ),
         'Code' => array(
            'AR' => 'الرمز',
            'EN' => 'Code',
            'FR' => 'Code',
         ),
         'Companyname' => array(
            'AR' => 'اسم الشركة',
            'EN' => 'Company Name',
            'FR' => 'Nom',
         ),
         'Name' => array(
            'AR' => 'اسم المسؤول',
            'EN' => 'Name of manager',
            'FR' => 'Nom du gérant',
         ),
         'Type' => array(
            'AR' => 'الجنس',
            'EN' => 'Type',
            'FR' => 'Type',
         ),
         'Category' => array(
            'AR' => 'الصنف',
            'EN' => 'Category',
            'FR' => 'Categorier',
         ),
         'Address' => array(
            'AR' => 'العنوان',
            'EN' => 'Address',
            'FR' => 'Adresse',
         ),
         'City' => array(
            'AR' => 'المدينة',
            'EN' => 'City',
            'FR' => 'Ville',
         ),
         'Country' => array(
            'AR' => 'البلد',
            'EN' => 'Country',
            'FR' => 'Pays',
         ),
         'Phonenumber' => array(
            'AR' => 'رقم الهاتف',
            'EN' => 'Phonenumber',
            'FR' => 'Numéro de téléphone',
         ),
         'Email' => array(
            'AR' => 'البريد الإلكتروني',
            'EN' => 'Email',
            'FR' => 'Email',
         ),
         'Job' => array(
            'AR' => 'الوظيفة',
            'EN' => 'Job',
            'FR' => 'Role',
         ),
         'Picture' => array(
            'AR' => 'الصورة',
            'EN' => 'Picture',
            'FR' => 'Photo',
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
