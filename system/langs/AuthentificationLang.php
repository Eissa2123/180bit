<?php
class AuthentificationLang extends Lang
{
	const L = array(
		'Authentification' => array(
			'AR' => 'مرحباً بك في 180BIT',
			'EN' => 'Welcome to 180BIT',
			'FR' => 'Welcome to 180BIT',
		),

		'Authentification2' => array(
			'AR' => 'الرجاء تسجيل الدخول لحسابك',
			'EN' => 'Please login to your account',
			'FR' => 'Please login to your account',
		),
		'Profile' => array(
			'AR' => 'الحساب الشخصي',
			'EN' => 'Profile',
			'FR' => 'Profil'
		),
		'Username' => array(
			'AR' => 'اسم المستخدم',
			'EN' => 'Username',
			'FR' => 'Username'
		),
		'Password' => array(
			'AR' => 'كلمة السر',
			'EN' => 'Password',
			'FR' => 'Mot de passe'
		),
		'OPassword' => array(
			'AR' => 'كلمة السر السابقة',
			'EN' => 'Old Password',
			'FR' => 'Ancien mot de passe',
		),
		'NPassword' => array(
			'AR' => 'كلمة السر الجديدة',
			'EN' => 'New Password',
			'FR' => 'Nouveau mot de passe',
		),
		'NPConfirm' => array(
			'AR' => 'تأكيد كلمة السر الجديدة',
			'EN' => 'Confirm the new password',
			'FR' => 'Confirmez le nouveau mot de passe',
		),
		'Employees' => array(
			'AR' => 'الموظفين',
			'EN' => 'Employees',
			'FR' => 'Employées',
		),
		'Login' => array(
			'AR' => 'دخول',
			'EN' => 'Login',
			'FR' => 'Login'
		),
		'Code' => array(
			'AR' => 'الرمز',
			'EN' => 'Code',
			'FR' => 'Code',
		),
		'Firstname' => array(
			'AR' => 'الإسم',
			'EN' => 'Firstname',
			'FR' => 'Prénom',
		),
		'Lastname' => array(
			'AR' => 'النسب',
			'EN' => 'Lastname',
			'FR' => 'Nom',
		),
		'Gender' => array(
			'AR' => 'الجنس',
			'EN' => 'Gender',
			'FR' => 'Sexe',
		),
		'Job' => array(
			'AR' => 'المهمة',
			'EN' => 'Job',
			'FR' => 'Role',
		),
		'Address' => array(
			'AR' => 'العنوان',
			'EN' => 'Address',
			'FR' => 'Adresse',
		),
		'City' => array(
			'AR' => 'المدينة',
			'EN' => 'City',
			'FR' => 'Ville',
		),
		'Country' => array(
			'AR' => 'البلد',
			'EN' => 'Country',
			'FR' => 'Pays',
		),
		'Phonenumber' => array(
			'AR' => 'رقم الهاتف',
			'EN' => 'Phonenumber',
			'FR' => 'Numéro de téléphone',
		),
		'Email' => array(
			'AR' => 'البريد الإلكتروني',
			'EN' => 'Email',
			'FR' => 'Email',
		),
		'Picture' => array(
			'AR' => 'الصورة',
			'EN' => 'Picture',
			'FR' => 'Photo',
		),
		'State' => array(
			'AR' => 'الحالة',
			'EN' => 'State',
			'FR' => 'Etat',
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
		return self::Load(self::L);
	}
}
