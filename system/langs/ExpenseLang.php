<?php
   class ExpenseLang extends Lang{

      const L = array(
         'Expenses' => array(
            'AR' => 'المصروفات',
            'EN' => 'Expenses',
            'FR' => 'Dépenses',
         ),
		   'Expense' => array(
            'AR' => 'المصروف',
            'EN' => 'Expense',
            'FR' => 'Dépense',
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
         'Employee' => array(
            'AR' => 'الموظف',
            'EN' => 'Employee',
            'FR' => 'Employée',
         ),
         'Marketer' => array(
            'AR' => 'المسوق',
            'EN' => 'Marketer',
            'FR' => 'Commerçante',
         ),
         'Tax' => array(
            'AR' => 'الضريبة المضافة',
            'EN' => 'Tax',
            'FR' => 'Tax',
         ),
         'Type' => array(
            'AR' => 'الجهة',
            'EN' => 'Type',
            'FR' => 'Type',
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
