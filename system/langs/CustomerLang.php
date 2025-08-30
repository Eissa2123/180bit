<?php
   class CustomerLang extends Lang{

      const L = array(
         'Customers' => array(
            'AR' => 'العملاء',
            'EN' => 'Customers',
            'FR' => 'Clientes',
         ),
         'Customer' => array(
            'AR' => 'العميل',
            'EN' => 'Customer',
            'FR' => 'Cliente',
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
            'EN' => 'Gender',
            'FR' => 'Genre',
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
