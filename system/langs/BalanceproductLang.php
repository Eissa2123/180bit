<?php
   class BalanceproductLang extends Lang{

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
         'BalanceProducts' => array(
            'AR' => 'قسم المنتجات',
            'EN' => 'Balance Products',
            'FR' => 'Produit',
         ),
         'BalanceProducts' => array(
            'AR' => 'قسم المنتجات',
            'EN' => 'Balance Products',
            'FR' => 'Produit',
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
         'Payments' => array(
            'AR' => 'الدفعات',
            'EN' => 'Payments',
            'FR' => 'Payements',
         ),
         'Return' => array(
            'AR' => 'المرتجع',
            'EN' => 'Return',
            'FR' => 'Retoure',
         ),
         'Returns' => array(
            'AR' => 'المرتجعات',
            'EN' => 'Returns',
            'FR' => 'Retoures',
         ),
         'Terms' => array(
            'AR' => 'الشروط والأحكام',
            'EN' => 'Terms and Conditions',
            'FR' => 'Termes et conditions',
         ),
		   'Term' => array(
            'AR' => 'الشروط والأحكام',
            'EN' => 'Term and Condition',
            'FR' => 'Terme et condition',
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
         'Amount' => array(
            'AR' => 'المبلغ',
            'EN' => 'Amount',
            'FR' => 'Montant',
         ),
         'Method' => array(
            'AR' => 'الطريقة',
            'EN' => 'Method',
            'FR' => 'Mode',
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
         'Paid' => array(
            'AR' => 'المدفوع',
            'EN' => 'Paid',
            'FR' => 'Payé',
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
         ),'Rest' => array(
            'AR' => 'الباقي',
            'EN' => 'Rest',
            'FR' => 'Reste',
         ),'SDate' => array(
            'AR' => 'تاريخ البداية',
            'EN' => 'Start Date',
            'FR' => 'Date de début',
         ),
         'EDate' => array(
            'AR' => 'تاريخ النهاية',
            'EN' => 'Expiry Date',
            'FR' => 'Date d\'expiration',
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
         'PDate' => array(
            'AR' => 'تاريخ الأداء',
            'EN' => 'Date Payment',
            'FR' => 'Date de payement',
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
         ),
         'AddProduct' => array(
            'AR' => 'إضافة منتجات',
            'EN' => 'Add Products',
            'FR' => 'Ajoute des produits',
         )
      );

      public static function Translate(){
         return self::Load(self::L);
      }

   }
