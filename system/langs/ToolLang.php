<?php
   class ToolLang extends Lang{

      const L = array(
         'Tools' => array(
            'AR' => 'الأدوات',
            'EN' => 'Tools',
            'FR' => 'Outils',
         ),'Tool' => array(
            'AR' => 'ادوات',
            'EN' => 'Tool',
            'FR' => 'Outil',
         ),'Server' => array(
            'AR' => 'السيرفر',
            'EN' => 'Server',
            'FR' => 'Serveur',
         ),'DBName' => array(
            'AR' => 'الإسم',
            'EN' => 'Name',
            'FR' => 'Nom',
         ),'Database' => array(
            'AR' => 'قاعدة البيانات',
            'EN' => 'Database',
            'FR' => 'Base de données',
         ),'Website' => array(
            'AR' => 'الموقع الإلكتروني',
            'EN' => 'Website',
            'FR' => 'Siteweb',
         ),'WSName' => array(
            'AR' => 'الإسم',
            'EN' => 'Name',
            'FR' => 'Nom',
         ),'Export' => array(
            'AR' => 'تصدير',
            'EN' => 'Export',
            'FR' => 'Exporter',
         ),'Backup' => array(
            'AR' => 'نسخ احتياطية',
            'EN' => 'Backup',
            'FR' => 'Sauvegarde',
         ),'Clear' => array(
            'AR' => 'تنظيف',
            'EN' => 'Clear',
            'FR' => 'Nettoyer',
         ),'Attachments' => array(
            'AR' => 'المرفقات',
            'EN' => 'Attachments',
            'FR' => 'Pièces Jointes',
         )
      );

      public static function Translate(){
         return self::Load(self::L);
      }

   }
