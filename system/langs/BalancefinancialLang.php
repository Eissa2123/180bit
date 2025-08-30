<?php
   class BalancefinancialLang extends Lang{

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
         'BalanceFinancials' => array(
            'AR' => 'قسم الحسابات',
            'EN' => 'Financials',
            'FR' => 'Comptes',
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
         'Notes' => array(
            'AR' => 'البيان',
            'EN' => 'Note',
            'FR' => 'Note',
         ),
         'Employee' => array(
            'AR' => 'للموظف',
            'EN' => 'Employee',
            'FR' => 'Employée',
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
