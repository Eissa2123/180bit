<?php
class LayerLang extends Lang
{

	const L = array(
		'AR' => array(
			'AR' => 'العربية',
			'EN' => 'العربية',
			'FR' => 'العربية',
		),
		'EN' => array(
			'AR' => 'English',
			'EN' => 'English',
			'FR' => 'English',
		),
		'FR' => array(
			'AR' => 'Français',
			'EN' => 'Français',
			'FR' => 'Français',
		),
		'Home' => array(
			'AR' => 'الرئيسية',
			'EN' => 'Home',
			'FR' => 'Accueil',
		),
		'Alerts' => array(
			'AR' => 'الإشعارات',
			'EN' => 'Alerts',
			'FR' => 'Alertes',
		),
		'Profile' => array(
			'AR' => 'البيانات',
			'EN' => 'Profile',
			'FR' => 'Profil',
		),
		'Exit' => array(
			'AR' => 'خروج',
			'EN' => 'Exit',
			'FR' => 'Quitter ',
		),
		'Address' => array(
			'AR' => 'العنوان',
			'EN' => 'Address',
			'FR' => 'Adresse ',
		),
		'Email' => array(
			'AR' => 'البريد الإلكتروني',
			'EN' => 'Email',
			'FR' => 'Email ',
		),
		'Phone' => array(
			'AR' => 'الهاتف',
			'EN' => 'Phone Number',
			'FR' => 'Téléphone ',
		),
		'Copyright' => array(
			'AR' => '© جميع الحقوق محفوظة 2022 ©',
			'EN' => '© All rights reserved 2022 ©',
			'FR' => '© Tous droits réservés 2022 ©',
		),
		'Design' => array(
			'AR' => 'تصميم',
			'EN' => 'Design',
			'FR' => 'Conception ',
		),
		'And' => array(
			'AR' => 'و',
			'EN' => 'And',
			'FR' => 'et  ',
		),
		'Programming' => array(
			'AR' => 'برمجة',
			'EN' => 'Programming',
			'FR' => 'Programmation ',
		),
		'ByFullname' => array(
			'AR' => 'إدريس خلاصة',
			'EN' => 'Driss Khoulassa',
			'FR' => 'Driss Khoulassa ',
		)
	);

	const X = array(
		'Home' => array(
			'AR' => 'الرئيسية',
			'EN' => 'Home',
			'FR' => 'Acceuill',
		),
		'Dashboard' => array(
			'AR' => 'القيادة',
			'EN' => 'Dashboard',
			'FR' => 'Tableau de bord',
		),
		'Employees' => array(
			'AR' => 'الموظفين',
			'EN' => 'Employees',
			'FR' => 'Employés',
		),
		'Customers' => array(
			'AR' => 'المزودون',
			'EN' => 'Providers',
			'FR' => 'Fournisseur',
		),
		'Clients' => array(
			'AR' => 'العملاء',
			'EN' => 'Clients',
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
		'About Us' => array(
			'AR' => 'من نحن',
			'EN' => 'About Us',
			'FR' => 'À propos de nous',
		),
		'Services' => array(
			'AR' => 'الخدمات',
			'EN' => 'Services',
			'FR' => 'Services',
		),
		'Pricing' => array(
			'AR' => 'التسعير',
			'EN' => 'Pricing',
			'FR' => 'Tarification',
		),
		'Support' => array(
			'AR' => 'الدعم',
			'EN' => 'Support',
			'FR' => 'Support',
		),
		'Privacy Policy' => array(
			'AR' => 'سياسة الخصوصية',
			'EN' => 'Privacy Policy',
			'FR' => 'Politique de confidentialité',
		),
		'Subscribe to our newsletter' => array(
			'AR' => 'اشترك في نشرتنا الإخبارية',
			'EN' => 'Subscribe to our newsletter',
			'FR' => 'Abonnez-vous à notre newsletter',
		),
		'Subscribe' => array(
			'AR' => 'اشترك',
			'EN' => 'Subscribe',
			'FR' => 'S\'abonner',
		),
		'Enter your email' => array(
			'AR' => 'أدخل بريدك الإلكتروني',
			'EN' => 'Enter your email',
			'FR' => 'Entrez votre e-mail',
		),
		'Cookies' => array(
			'AR' => 'ملفات تعريف الارتباط',
			'EN' => 'Cookies',
			'FR' => 'Cookies',
		),
		'Terms' => array(
			'AR' => 'الشروط',
			'EN' => 'Terms',
			'FR' => 'Conditions',
		),
		'AllRightsReserved' => array(
			'AR' => 'جميع الحقوق محفوظة',
			'EN' => 'All rights reserved',
			'FR' => 'Tous droits réservés'
		),
		'CompanyName' => array(
			'AR' => '180Bit',
			'EN' => '180Bit',
			'FR' => '180Bit'
		)


	);

	public static function Translate()
	{
		$send = array();

		$send = array_merge($send, self::Load(self::L, false));
		$send = array_merge($send, self::Load(self::X, false));

		return $send;
	}
}
