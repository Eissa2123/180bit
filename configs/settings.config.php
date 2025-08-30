<?php

	/* PATHS */
	define('CONTROLLERS', 	HOST.'system/controllers/');
	define('CORES', 		HOST.'system/cores/');
	define('VIEWS', 		HOST.'system/views/');
	define('MODELS', 		HOST.'system/models/');
	define('LANGS', 		HOST.'system/langs/');
	define('LIBS', 			HOST.'system/libs/');
	define('BACKUPS', 		HOST.'backups/');
	define('UI', 			HOST.'public/ui/');
	define('WASSETS', 		WEB.'public/assets/');
	define('HASSETS', 		HOST.'public/assets/');
	define('WUPLOADS', 		WEB.'public/uploads/');
	define('HUPLOADS', 		HOST.'public/uploads/');
	define('HPICTURES', 	HUPLOADS.'pictures/');
	define('WPICTURES', 	WUPLOADS.'pictures/');
	define('HFILES', 		HUPLOADS.'files/');
	define('WFILES', 		WUPLOADS.'files/');
	define('WTEMPS', 		WUPLOADS.'temps/');
	define('HTEMPS', 		HUPLOADS.'temps/');
	define('THEMES', 		WASSETS.'themes/');
	define('THEME', 		THEMES.'default/');
	define('IMGS', 			THEME.'images/');
	define('CSS', 			THEME.'css/');
	define('JS', 			THEME.'js/');
	define('FONTS', 		THEME.'fonts/');
	
	/* FILE EXTENTIONS */
	define('TMP', '.ui.php');
	define('PNG', '.png');
	define('SQL', '.sql');
	define('ZIP', '.zip');
	define('TXT', '.txt');
	define('LOG', '.log');
	define('PDF', '.pdf');

	/* FILES NAMES */
	define('BACKUP', 	'backup');
	define('LOGS', 		'logs');
	define('PICTURE', 	'Pictures');
	define('FILE', 		'Files');

	/* DATETIME */
	define('CURRENT_DATETIME', 	date("Y-m-d H:i:s"));
	define('TIMEOUT', 			1800); //(30 * 60 = 3600 seconds) 30 minutes

	/* PERMISSIONS TYPES */
	//define('PUBLIC', 		'public');
	//define('PRIVATE', 	'private');
	//define('SHARED', 		'shared');
	
	/* ARRAY OF LENGHTS IN INDEX PAGE */
	define('LENGTHS', [10, 25, 50, 75, 100, 200, 250, 500]);

	/* DEFAULT VALUES */
	define('CNF_NPG', 1);
	define('CNF_ZER', 0);
	define('CNF_RPP', 25);//NUMBER OF ROWS PEER INDEX PAGE
	define('CNF_EMP', '');//EMPTY
	define('CNF_NUL', NULL);//NULL

	/* TOKEN */
	define('TOKEN_LENGHT', 64);//TOKEN_LENGHT
	
	/* LANGS */
	define('LNG_AR', 'ar');
	define('LNG_EN', 'en');
	define('LNG_FR', 'fr');

	/* Privalages */
	define('ALL',  '3');
	define('SOME', '2');
	define('NONE', '1');

	//define('ISD', true);
	
	/* NUMERIC */
	define('NBR_FORMAT', 2);

	/* DEFAULT PAGES */
	define('HOME_PAGE', 	'home');
	define('TOOL_PAGE', 	'tool');
	define('LOGIN_PAGE', 	'authentification/login');
	define('SESSION_NAME', 	'dkwbap180bit');

	/* DEFAULT IMAGES */
	define('IMG_DEFAULT', IMGS.'default'.PNG);
	

	/* DATE & TIME */
	define('DT', date('Y-m-d'));
	define('TM', date('H:i:s'));

	/* DEFAULT CODES */
	define('SLASH','/');
	define('BACKSLASH','\\');
	
	
