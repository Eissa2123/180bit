<?php
   class SalepaymentLang extends Lang{

      const L = array(
         'Payments' => array(
            'AR' => 'السندات',
            'EN' => 'Payments',
            'FR' => 'Paiements',
         ),
         'Payment' => array(
            'AR' => 'السند',
            'EN' => 'Payment',
            'FR' => 'Paiement',
         ),
         'Payment' => array(
            'AR' => 'الدفعة',
            'EN' => 'Payment',
            'FR' => 'Paiement',
         ),
         'Customer' => array(
            'AR' => 'العميل',
            'EN' => 'Customer',
            'FR' => 'Client',
         ),
         'Sales' => array(
            'AR' => 'فواتير المبيعات',
            'EN' => 'Invoices',
            'FR' => 'Factures',
         ),
         'Sale' => array(
            'AR' => 'فاتورة البيع',
            'EN' => 'Invoice',
            'FR' => 'Facture',
         ),
         'Code' => array(
            'AR' => 'الرمز',
            'EN' => 'Code',
            'FR' => '',
         ),
         'AT' => array(
            'AR' => 'التاريخ',
            'EN' => 'Date',
            'FR' => 'Date',
         ),
         'Debts' => array(
            'AR' => 'القروض',
            'EN' => 'Debts',
            'FR' => 'Debts',
         ),
         'Expense' => array(
            'AR' => 'الإشتراك',
            'EN' => 'Expense',
            'FR' => 'Expense',
         ),
         'Expenses' => array(
            'AR' => 'الإشتراكات',
            'EN' => 'Expenses',
            'FR' => 'Expenses',
         ),
         'AT' => array(
            'AR' => 'تاريخ الأداء',
            'EN' => 'Date Payment',
            'FR' => 'Date de payement',
         ),
         'Amount' => array(
            'AR' => 'المبلغ',
            'EN' => 'Amount',
            'FR' => 'Montant',
         ),
         'Facture' => array(
            'AR' => 'الفاتورة',
            'EN' => 'Facture',
            'FR' => 'Facture',
         ),
         'Factures' => array(
            'AR' => 'الفواتير',
            'EN' => 'Factures',
            'FR' => 'Factures',
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
