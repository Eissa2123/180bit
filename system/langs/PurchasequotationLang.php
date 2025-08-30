<?php
   class PurchasequotationLang extends Lang{

      const L = array(
         'Purchasequotations' => array(
            'AR' => 'عروض الشراء',
            'EN' => 'Invoices',
            'FR' => 'Factures',
         ),
         'Purchasequotation' => array(
            'AR' => 'عرض شراء',
            'EN' => 'Invoice',
            'FR' => 'Facture',
         ),
         'Purchases' => array(
            'AR' => 'فواتير المشتريات',
            'EN' => 'Invoices',
            'FR' => 'Factures',
         ),
         'Purchase' => array(
            'AR' => 'فاتورة شراء',
            'EN' => 'Invoice',
            'FR' => 'Facture',
         ),
         'Terms' => array(
            'AR' => 'الشروط والأحكام',
            'EN' => 'Terms and Conditions',
            'FR' => 'Termes et conditions',
         ),
         'Code' => array(
            'AR' => 'الرمز',
            'EN' => 'Code',
            'FR' => 'Code',
         ),
         'Barcode' => array(
            'AR' => 'الباركود',
            'EN' => 'Barcode',
            'FR' => 'Codebare',
         ),
         'Name' => array(
            'AR' => 'الاسم',
            'EN' => 'Name',
            'FR' => 'Description',
         ),
         'Provider' => array(
            'AR' => 'المورد',
            'EN' => 'Provider',
            'FR' => 'Provider',
         ),
         'Customer' => array(
            'AR' => 'العميل',
            'EN' => 'Customer',
            'FR' => 'Cliente',
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
            'AR' => 'الصافي',
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
