<?php
   class BalancecustomerLang extends Lang{

      const L = array(
         'Balances' => array(
            'AR' => 'الأرصدة الإفتتاحية',
            'EN' => 'Revenues',
            'FR' => 'Revenus',
         ),
		   'Balance' => array(
            'AR' => 'الرصيد الإفتتاحي',
            'EN' => 'Revenue',
            'FR' => 'Revenu',
         ),
         'BalanceCustomers' => array(
            'AR' => 'قسم العملاء',
            'EN' => 'Customers',
            'FR' => 'Clients',
         ),
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
         'Source' => array(
            'AR' => 'المصدر',
            'EN' => 'Source',
            'FR' => 'Source',
         ),
         'Amount' => array(
            'AR' => 'المبلغ',
            'EN' => 'Amount',
            'FR' => 'Montant',
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
         )
      );

      public static function Translate(){
         return self::Load(self::L);
      }

   }
