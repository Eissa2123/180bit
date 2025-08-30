<?php
   class HomeLang extends Lang{

      const L = array(
         'Dashboard' => array(
            'AR' => 'القيادة',
            'EN' => 'Dashboard',
            'FR' => 'Tableau de bord',
         ),
         'Box' => array(
            'AR' => 'الصندوق',
            'EN' => 'Box',
            'FR' => 'Coffre',
         ),
         'Reports' => array(
            'AR' => 'التقارير',
            'EN' => 'Reports',
            'FR' => 'Rapports',
         ),
         'Employees' => array(
            'AR' => 'الموظفين',
            'EN' => 'Employees',
            'FR' => 'Employés',
         ),
         'Providers' => array(
            'AR' => 'الموردين',
            'EN' => 'Providers',
            'FR' => 'Fournisseur',
         ),
         'Marketers' => array(
            'AR' => 'المسوقين',
            'EN' => 'Marketers',
            'FR' => 'Commerçantes',
         ),
         'Customers' => array(
            'AR' => 'العملاء',
            'EN' => 'Customers',
            'FR' => 'Clients',
         ),
         'Expenses' => array(
            'AR' => 'الإشتراكات',
            'EN' => 'Expenses',
            'FR' => 'Abonnements'
         ),
         'Debts' => array(
            'AR' => 'القروض',
            'EN' => 'Debts',
            'FR' => 'Crédit'
         ),
         'Invoices' => array(
            'AR' => 'الفواتير',
            'EN' => 'Invoices',
            'FR' => 'Factures',
         ),
         'Payments' => array(
            'AR' => 'الدفعات',
            'EN' => 'Payments',
            'FR' => 'Paiements',
         ),
         'Jobs' => array(
            'AR' => 'الصلاحيات',
            'EN' => 'Privileges',
            'FR' => 'Privilèges',
         ),
         'Settings' => array(
            'AR' => 'الإعدادات',
            'EN' => 'Settings',
            'FR' => 'Paramètres',
         ),
         'Tools' => array(
            'AR' => 'الأدوات',
            'EN' => 'Tools',
            'FR' => 'Outils',
         ),
         'Historiques' => array(
            'AR' => 'الأحداث',
            'EN' => 'Historiques',
            'FR' => 'Historiques',
         ),
         'PurchasesQuotations' => array(
            'AR' => 'عروض المشتريات',
            'EN' => 'Purchases Quotations',
            'FR' => 'Offres d\'achats',
         ),
         'PurchasesInvoices' => array(
            'AR' => 'فواتير المشتريات',
            'EN' => 'Purchases Invoices',
            'FR' => 'Factures d\'achats',
         ),
         'PurchasesPayments' => array(
            'AR' => 'دفعات المشتريات',
            'EN' => 'Purchases Payments',
            'FR' => 'Payements d\'achats',
         ),
         'PurchasesReturns' => array(
            'AR' => 'مرتجعات المشتريات',
            'EN' => 'Purchases Returns',
            'FR' => 'Retours d\'achats',
         ),
         'SalesQuotations' => array(
            'AR' => 'عروض المبيعات',
            'EN' => 'Sales Quotations',
            'FR' => 'Offres de ventes',
         ),
         'SalesInvoices' => array(
            'AR' => 'فواتير المبيعات',
            'EN' => 'Sales Invoices',
            'FR' => 'Factures des ventes',
         ),
         'SalesPayments' => array(
            'AR' => 'دفعات المبيعات',
            'EN' => 'Sales Payments',
            'FR' => 'Factures des ventes',
         ),
         'SalesReturns' => array(
            'AR' => 'مرتجعات المبيعات',
            'EN' => 'Sales Returns',
            'FR' => 'Retours des ventes',
         ),
         'PurchasesBills' => array(
            'AR' => 'سندات المشتريات',
            'EN' => 'Bill',
            'FR' => 'Bill',
         ),
         'SalesBills' => array(
            'AR' => 'سندات المبيعات',
            'EN' => 'Bill',
            'FR' => 'Bill',
         ),
         'Expenses' => array(
            'AR' => 'المصروفات',
            'EN' => 'Expenses',
            'FR' => 'Dépenses',
         ),
         'Revenues' => array(
            'AR' => 'الارصدة الافتتاحية',
            'EN' => 'Revenues',
            'FR' => 'Revenus',
         ),
         'Products' => array(
            'AR' => 'المنتجات',
            'EN' => 'Products',
            'FR' => 'Produits',
         ),
         'Categories' => array(
            'AR' => 'الأصناف',
            'EN' => 'Categories',
            'FR' => 'Categories',
         ),
         'Cobons' => array(
            'AR' => 'الكوبونات',
            'EN' => 'Cobons',
            'FR' => 'Bons de réduction',
         ),
         'Restrictions' => array(
            'AR' => 'القيود اليومية',
            'EN' => 'Restrictions',
            'FR' => 'Restrictions',
         ),
         'Terms' => array(
            'AR' => 'الشروط والأحكام',
            'EN' => 'Terms and Conditions',
            'FR' => 'Termes et conditions',
         ),
         'Home' => array(
            'AR' => 'الصفحة الرئيسية',
            'EN' => 'Home Page',
            'FR' => 'Home Page',
         )
      );

      public static function Translate(){
         return self::Load(self::L);
      }

   }
