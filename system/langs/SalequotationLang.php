<?php
   class SalequotationLang extends Lang{

      const L = array(
         'Salequotations' => array(
            'AR' => 'عروض المبيعات',
            'EN' => 'Invoices',
            'FR' => 'Factures',
         ),
         'Salequotation' => array(
            'AR' => 'عرض بيع',
            'EN' => 'Invoice',
            'FR' => 'Facture',
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
         'Terms' => array(
            'AR' => 'الشروط والأحكام',
            'EN' => 'Terms and Conditions',
            'FR' => 'Termes et conditions',
         ),
         'Name' => array(
            'AR' => 'الاسم',
            'EN' => 'Name',
            'FR' => 'Description',
         ),
         'Customer' => array(
            'AR' => 'العميل',
            'EN' => 'Customer',
            'FR' => 'Client',
         ),
         'Companyname' => array(
            'AR' => 'اسم الشركة',
            'EN' => 'Companyname',
            'FR' => 'Companyname',
         ),
         'Boss' => array(
            'AR' => 'اسم المسؤول',
            'EN' => 'Boss',
            'FR' => 'Boss',
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
         'SDate' => array(
            'AR' => 'تاريخ البداية',
            'EN' => 'Start Date',
            'FR' => 'Date de début',
         ),
         'EDate' => array(
            'AR' => 'تاريخ النهاية',
            'EN' => 'Expiry Date',
            'FR' => 'Date d\'expiration',
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
         'Description' => array(
            'AR' => 'الوصف',
            'EN' => 'Description',
            'FR' => 'Description',
         ),
         'Products' => array(
            'AR' => 'المنتجات',
            'EN' => 'Articles',
            'FR' => 'Articles',
         ),
         'Barcode' => array(
            'AR' => 'الباركود',
            'EN' => 'Barcode',
            'FR' => 'Codebare',
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
