<?php
   class BoxLang extends Lang{

      const L = array(
         'Boxs' => array(
            'AR' => 'الصناديق',
            'EN' => 'Boxs',
            'FR' => 'Boxs',
         ),
		   'Box' => array(
            'AR' => 'الصندوق',
            'EN' => 'Box',
            'FR' => 'Box',
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
         'AT' => array(
            'AR' => 'التاريخ',
            'EN' => 'Date',
            'FR' => 'Date',
         ),
         'SRC' => array(
            'AR' => 'الجهة',
            'EN' => 'Source',
            'FR' => 'Source',
         ),
         'IN' => array(
            'AR' => 'ادخال',
            'EN' => 'CREADIT',
            'FR' => 'Crédit',
         ),
         'OUT' => array(
            'AR' => 'اخراج',
            'EN' => 'Debit',
            'FR' => 'Debit',
         ),
         'Method' => array(
            'AR' => 'الطريقة',
            'EN' => 'Method',
            'FR' => 'Méthode',
         ),
         'State' => array(
            'AR' => 'الحالة',
            'EN' => 'State',
            'FR' => 'Etat',
         ),
         'Purchase' => array(
            'AR' => 'مشتريات',
            'EN' => 'Purchases',
            'FR' => 'Achats',
         ),
         'Purchasereturn' => array(
            'AR' => 'مرتجعات المشتريات',
            'EN' => 'Purchases Returns',
            'FR' => 'Retoures des achats',
         ),
         'Expense' => array(
            'AR' => 'مصاريف',
            'EN' => 'Expenses',
            'FR' => 'Déponses',
         ),
         'Salesereturn' => array(
            'AR' => 'مرتجعات المبيعات',
            'EN' => 'Sales Returns',
            'FR' => 'Sales des achats',
         ),
         'Sale' => array(
            'AR' => 'مبيعات',
            'EN' => 'Sales',
            'FR' => 'Ventes',
         ),
         'Revenue' => array(
            'AR' => 'الإيرادات',
            'EN' => 'Revenues',
            'FR' => 'Revenues',
         ),
      );

      public static function Translate(){
         return self::Load(self::L);
      }

   }
