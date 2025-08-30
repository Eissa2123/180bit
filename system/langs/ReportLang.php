<?php
   class ReportLang extends Lang{

      const L = array(
         'Reports' => array(
            'AR' => 'التقارير',
            'EN' => 'Reports',
            'FR' => 'Rapports',
         ),
         'Report' => array(
            'AR' => 'التقرير',
            'EN' => 'Report',
            'FR' => 'Rapport',
         ),'Provider' => array(
            'AR' => 'الموردين',
            'EN' => 'Provider',
            'FR' => 'Provider',
         ),'WSName' => array(
            'AR' => 'اسم الموقع',
            'EN' => 'Name of website',
            'FR' => 'Nom du website',
         ),'AR' => array(
            'AR' => 'العربية',
            'EN' => 'Arabic',
            'FR' => 'Arabe',
         ),'EN' => array(
            'AR' => 'الإنجليزية',
            'EN' => 'English',
            'FR' => 'Anglais',
         ),'FR' => array(
            'AR' => 'الفرنسية',
            'EN' => 'French',
            'FR' => 'Français',
         ),'WSLanguges' => array(
            'AR' => 'لغات الموقع',
            'EN' => 'Website languages',
            'FR' => 'Langues du site Web',
         ),'LangDefault' => array(
            'AR' => 'اللغة الإفتراضية للموقع ',
            'EN' => 'Website Default Langues',
            'FR' => 'Langues par default du site Web',
         ),'Address' => array(
            'AR' => 'العنوان',
            'EN' => 'Address',
            'FR' => 'Adresse',
         ),'Region' => array(
            'AR' => 'المنطقة',
            'EN' => 'Region',
            'FR' => 'Region',
         ), 'City' => array(
            'AR' => 'المدينة',
            'EN' => 'City',
            'FR' => 'Ville',
         ), 'Country' => array(
            'AR' => 'البلد',
            'EN' => 'Country',
            'FR' => 'Pays',
         ),'Phonenumber' => array(
            'AR' => 'رقم الهاتف',
            'EN' => 'Phonenumber',
            'FR' => 'Numéro de téléphone',
         ),'Email' => array(
            'AR' => 'البريد الإلكتروني',
            'EN' => 'Email',
            'FR' => 'Email',
         ),'WSState' => array(
            'AR' => 'حالة الموقع',
            'EN' => 'Website Status',
            'FR' => 'Website Etat',
         ),'WSTheme' => array(
            'AR' => 'النمط',
            'EN' => 'Theme',
            'FR' => 'Thème',
         ),'WSApp' => array(
            'AR' => 'التطبيق',
            'EN' => 'Application',
            'FR' => 'Application',
         ),'WSID' => array(
            'AR' => 'الإسم',
            'EN' => 'Name',
            'FR' => 'Nom',
         ),'WSVersion' => array(
            'AR' => 'الإصدار',
            'EN' => 'Version',
            'FR' => 'Version',
         ),'ThemeDefault' => array(
            'AR' => 'إفتراضي',
            'EN' => 'default',
            'FR' => 'default',
         ),'StateEnabled' => array(
            'AR' => 'مفعل',
            'EN' => 'Enable',
            'FR' => 'Active',
         ),'StateDisabled' => array(
            'AR' => 'مقفل',
            'EN' => 'Disable',
            'FR' => 'Désactive',
         )
      );

      public static function Translate(){
         return self::Load(self::L);
      }

   }
