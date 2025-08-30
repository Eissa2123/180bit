<?php
   class EmployeeLang extends Lang{

      const L = array(
         'Employees' => array(
            'AR' => 'الموظفين',
            'EN' => 'Employees',
            'FR' => 'Employées',
         ),
         'Employee' => array(
            'AR' => 'الموظف',
            'EN' => 'Employee',
            'FR' => 'Employée',
         ),
         'Code' => array(
            'AR' => 'الرمز',
            'EN' => 'Code',
            'FR' => 'Code',
         ),
         'NCID' => array(
            'AR' => 'رقم الهوية',
            'EN' => 'NCID',
            'FR' => 'NCID',
         ),
         'Firstname' => array(
            'AR' => 'الإسم',
            'EN' => 'Firstname',
            'FR' => 'Prénom',
         ),
         'Lastname' => array(
            'AR' => 'النسب',
            'EN' => 'Lastname',
            'FR' => 'Nom',
         ),
         'Gender' => array(
            'AR' => 'النوع',
            'EN' => 'Gender',
            'FR' => 'Sexe',
         ),
         'Username' => array(
            'AR' => 'اسم المستخدم',
            'EN' => 'Username',
            'FR' => 'Login',
         ),
         'Password' => array(
            'AR' => 'كلمة السر',
            'EN' => 'Password',
            'FR' => 'Mot de passe',
         ),
         'Job' => array(
            'AR' => 'المهمة',
            'EN' => 'Job',
            'FR' => 'Role',
         ),
         'SWork' => array(
            'AR' => 'تاريخ التوظيف',
            'EN' => 'Start Date',
            'FR' => 'Date de debut',
         ),
         'EWork' => array(
            'AR' => 'تاريخ المغادرة',
            'EN' => 'End Date',
            'FR' => 'Date de départ',
         ),
         'SBilive' => array(
            'AR' => 'تاريخ إصدار الإقامة',
            'EN' => 'Start Date',
            'FR' => 'Date de debut',
         ),
         'EBilive' => array(
            'AR' => 'تاريخ إنتهاء الإقامة',
            'EN' => 'End Date',
            'FR' => 'Date de départ',
         ),
         'Address' => array(
            'AR' => 'العنوان',
            'EN' => 'Address',
            'FR' => 'Adresse',
         ),
         'Salary' => array(
            'AR' => 'الاجرة',
            'EN' => 'Salary',
            'FR' => 'Salaire',
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
            'AR' => 'الهاتف',
            'EN' => 'Phonenumber',
            'FR' => 'Numéro de téléphone',
         ),
         'Email' => array(
            'AR' => 'البريد الإلكتروني',
            'EN' => 'Email',
            'FR' => 'Email',
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
