<?php
   class SalereturnLang extends Lang{

      const L = array(
         'Returns' => array(
            'AR' => 'مرتجعات',
            'EN' => 'Returns',
            'FR' => 'Routeurs',
         ),
         'Return' => array(
            'AR' => 'مرتجع',
            'EN' => 'Return',
            'FR' => 'Routeur',
         ),
         'Sales' => array(
            'AR' => 'فواتير المبيعات',
            'EN' => 'Invoices',
            'FR' => 'Factures',
         ),
         'Sale' => array(
            'AR' => 'فاتورة بيع',
            'EN' => 'Invoice',
            'FR' => 'Facture',
         ),
         'Code' => array(
            'AR' => 'الرمز',
            'EN' => 'Code',
            'FR' => 'Code',
         ),
         'Name' => array(
            'AR' => 'الاسم',
            'EN' => 'Name',
            'FR' => 'Description',
         ),
         'AT' => array(
            'AR' => 'التاريخ',
            'EN' => 'Invoice date',
            'FR' => 'Date de la facture',
         ),
         'Price' => array(
            'AR' => 'السعر',
            'EN' => 'Price',
            'FR' => 'Total HT',
         ),
         'HT' => array(
            'AR' => 'المجموع بدون ضريبة',
            'EN' => 'Total without tax',
            'FR' => 'Total HT',
         ),		
         'TTC' => array(
            'AR' => 'المجموع',
            'EN' => 'Total TTC',
            'FR' => 'Total TTC',
         ),
         'TVA' => array(
            'AR' => 'الضريبة',
            'EN' => 'TVA',
            'FR' => 'TVA',
         ),
         'Tax' => array(
            'AR' => 'قيمة الضريبة',
            'EN' => 'Tax',
            'FR' => 'Tax',
         ),
         'Cobon' => array(
            'AR' => 'الكوبون',
            'EN' => 'Cobon',
            'FR' => 'Cobon',
         ),
         'Gift' => array(
            'AR' => 'قيمة الكوبون',
            'EN' => 'Cobon',
            'FR' => 'Cobon',
         ),
         'Reduction' => array(
            'AR' => 'الخصم',
            'EN' => 'Reduction',
            'FR' => 'Réduction',
         ),
         'Expense' => array(
            'AR' => 'الزيادة',
            'EN' => 'Expense',
            'FR' => 'Frais',
         ),
         'Paid' => array(
            'AR' => 'المدفوع',
            'EN' => 'Paid',
            'FR' => 'Payé',
         ),
         'Rest' => array(
            'AR' => 'الباقي',
            'EN' => 'Rest',
            'FR' => 'Reste',
         ),
         'Provider' => array(
            'AR' => 'المورد',
            'EN' => 'Provider',
            'FR' => 'Fournisseuse',
         ),
         'Employee' => array(
            'AR' => 'الموظف',
            'EN' => 'Employee',
            'FR' => 'Employée',
         ),
         'State' => array(
            'AR' => 'الحالة',
            'EN' => 'State',
            'FR' => 'Etat',
         ),
         'Product' => array(
            'AR' => 'المنتج',
            'EN' => 'Product',
            'FR' => 'Produit',
         ),
         'Products' => array(
            'AR' => 'المنتجات',
            'EN' => 'Articles',
            'FR' => 'Articles',
         ),
         'Notes' => array(
            'AR' => 'ملاحظات',
            'EN' => 'Notes',
            'FR' => 'Remarques',
         ),
         'Categories' => array(
            'AR' => 'الأصناف',
            'EN' => 'Categories',
            'FR' => 'Categories',
         ),
		   'Quantity' => array(
            'AR' => 'الكمية',
            'EN' => 'Quantity',
            'FR' => 'Quantité',
         ),
         'Total' => array(
            'AR' => 'المجموع',
            'EN' => 'Total',
            'FR' => 'Total',
         )
      );

      public static function Translate(){
         return self::Load(self::L);
      }

   }
