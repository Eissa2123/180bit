<?php

use \Mpdf\Mpdf;
use \Mpdf\QrCode;

class Dispatcher
{
	public $DEBUG = array();
	public $debug = false;

	public $in = array();
	public $out = array();

	public $objects = array();
	public $url = '';
	public $lang = '';
	//public $country = '';
	public $sector = 'public';
	public $controller = '';
	public $controllerString = '';
	public $methode = '';
	public $params = array();
	public $datas = array();

	public $redirecting = false;

	public function __construct($debug = false)
	{
		$this->Init($debug);
		$this->ExplodeURL();

		$this->Configs();
		$this->GetLang();
		$this->SynchroniseSettings();

		$this->CheckController();
		$this->CheckMethode();
		$this->Allowed();
		$this->Prepare();
	}

	public function Init($debug = false)
	{
		$this->debug = $debug;

		$this->in = array(
			'Controller' => '',
			'Methode' => '',
			'Params' => array()
		);

		$this->out = array(
			'Controller' => '',
			'Methode' => '',
			'Params' => array()
		);
	}

	public function ExplodeURL()
	{
		if (isset($_GET['url']) && !empty($_GET['url'])) {
			$this->url = $_GET['url'];
		}
		$this->objects = explode('/', strtolower($this->url));
		foreach ($this->objects as $key => $value) {
			if ($value === '') {
				unset($this->objects[$key]);
			} else {
				$this->objects[$key] = strtolower($value);
			}
		}
		$this->objects = array_values($this->objects);
		$this->url = implode('/', $this->objects);
	}

	public function GetLang()
	{
		if (count($this->objects) > 0 and in_array($this->objects[0], array(LNG_AR, LNG_EN, LNG_FR))) {
			$this->lang = strtoupper($this->objects[0]);
			unset($this->objects[0]);
			$this->objects = array_values($this->objects);
		}
	}

	public function Configs($first = false)
	{
		define('URL', $this->url);

		require_once("configs/settings.config.php");
		require_once("configs/database.config.php");
		require_once("configs/autoload.config.php");
		require_once("configs/router.config.php");
		require_once(LIBS . 'composer/vendor/autoload.php');
	}

	public function SynchroniseSettings()
	{
		$send = array();

		$model = new SettingModel();
		$send = array_merge($send, $model->display(array()));

		$LNGs = array();

		if ($send['Cells']['AR']['ID'] == '2') {
			$LNGs[] = 'AR';
		}

		if ($send['Cells']['EN']['ID'] == '2') {
			$LNGs[] = 'EN';
		}

		if ($send['Cells']['FR']['ID'] == '2') {
			$LNGs[] = 'FR';
		}

		if (!in_array($this->lang, $LNGs)) {
			$this->lang = V($send, 'Cells', 'Langue');

			if (!in_array($this->lang, $LNGs)) {
				$this->lang = LNG_AR;
			}
		}

		define('LNG', strtoupper($this->lang));
	}

	public function CheckController()
	{

		if (isset($this->objects[0]) && $this->objects[0] !== '') {
			$this->controller = strtoupper(substr($this->objects[0], 0, 1)) . strtolower(substr($this->objects[0], 1, strlen($this->objects[0])));
			$this->in['Controller'] = strtolower($this->controller);
			$this->out['Controller'] = strtolower($this->controller);
			$this->controllerString = $this->controller;
			$this->controller = $this->controller . 'Controller';
			unset($this->objects[0]);
			$this->objects = array_values($this->objects);
		} else {
			$this->out['Controller'] = 'home';
			$this->controller = 'HomeController';
		}

		if (!class_exists($this->controller)) {
			$this->controller = "ErrorController";
			$this->ControllerString = "ErrorController";
			$this->datas['ControllerObject'] = "ErrorController";
			$this->datas['ControllerString'] = "Error";
			$this->out['Controller'] = 'error';
		}

		$this->controller = new $this->controller();
	}

	public function CheckMethode()
	{
		/*if($this->in['Methode'] === 'trace' and isset($this->objects[0]) and isset($this->objects[1])) {
			$this->methode = "index";
			$_POST[$this->objects[0]] = $this->objects[1];
		}*/
		if (isset($this->objects[0]) && $this->objects[0] !== '' && !is_numeric($this->objects[0])) {
			$this->methode = strtolower($this->objects[0]);
			$this->in['Methode'] = strtolower($this->methode);
			$this->out['Methode'] = strtolower($this->methode);
			unset($this->objects[0]);
			$this->objects = array_values($this->objects);
		} else {
			$this->methode = 'index';
			$this->out['Methode'] = 'index';
		}
		if (!method_exists($this->controller, $this->methode)) {
			$this->methode = (get_class($this->controller) != 'ErrorController' ? 'index' : 'e404');
			if (!method_exists($this->controller, $this->methode)) {
				$this->controller = new ErrorController();
				$this->methode = 'e404';
			}
			$this->datas['Methode'] = $this->methode;
			$this->out['Methode'] = $this->methode;
		}
	}

	public function Allowed()
	{
		$itemC = '';
		$itemM = '';

		switch (strtolower($this->out['Controller'])) {
			case 'dashboard':
				$itemC = 'Dashboard';
				break;
			case 'box':
				$itemC = 'Box';
				break;
			case 'report':
				$itemC = 'Reports';
				break;
			case 'provider':
				$itemC = 'Providers';
				break;
			case 'marketer':
				$itemC = 'Marketers';
				break;
			case 'expense':
				$itemC = 'Expenses';
				break;
			case 'purchase':
				$itemC = 'Purchases';
				break;
			case 'purchasequotation':
				$itemC = 'Purchasesquotations';
				break;
			case 'purchasepayment':
				$itemC = 'Purchasespayments';
				break;
			case 'purchasereturn':
				$itemC = 'Purchasesreturns';
				break;
			case 'customer':
				$itemC = 'Customers';
				break;
			case 'balance':
				$itemC = 'Revenues';
				break;
			case 'sale':
				$itemC = 'Sales';
				break;
			case 'salequotation':
				$itemC = 'Salesquotations';
				break;
			case 'salepayment':
				$itemC = 'Salespayments';
				break;
			case 'salereturn':
				$itemC = 'Salesreturns';
				break;
			case 'employee':
				$itemC = 'Employees';
				break;
			case 'product':
				$itemC = 'Products';
				break;
			case 'cobon':
				$itemC = 'Cobons';
				break;
			case 'term':
				$itemC = 'Terms';
				break;
			case 'setting':
				$itemC = 'Settings';
				break;
			case 'privilege':
				$itemC = 'Privileges';
				break;
			case 'historique':
				$itemC = 'Historiques';
				break;
			case 'tool':
				$itemC = 'Tools';
				break;
		}

		switch (strtolower($this->out['Methode'])) {
			case 'index':
			case 'print':
				$itemM = 'B';
				break;
			case 'display':
				$itemM = 'D';
				break;
			case 'add':
			case 'insert':
				$itemM = 'A';
				break;
			case 'edit':
			case 'update':
				$itemM = 'E';
				break;
			case 'remove':
			case 'delete':
				$itemM = 'R';
				break;
		}

		if ($itemC != '' and $itemM != '') {
			if (AuthentificationController::check($itemM, $itemC) != ALL) {
				$this->controller = "ErrorController";
				$this->ControllerString = "ErrorController";
				$this->datas['ControllerObject'] = "ErrorController";
				$this->datas['ControllerString'] = "Error";
				$this->out['Controller'] = 'error';

				$this->methode = 'e404';
				$this->datas['Methode'] = $this->methode;
				$this->out['Methode'] = $this->methode;

				$this->controller = new $this->controller();
			}
		}
	}

	public function Prepare()
	{
		if (isset($this->objects[0]) and strtolower($this->objects[0]) === 'admin') {
			$this->sector = 'private';
			unset($this->objects[0]);
			$this->objects = array_values($this->objects);
		}
		if (count($this->objects) > 0) {
			$this->params['ID'] = $this->objects[0];
		}

		$this->datas = array(
			'Lang' => $this->lang,
			'Controller' => $this->controller,
			'Methode' => $this->methode,
			'GETS' => $_GET,
			'POSTS' => $_POST,
			'FILES' => $_FILES,
			'Params' => $this->params,
			'AUTO' => array(),
			'UIO' => array(),
			'Errors' => array(),
			'Informations' => array(),
			'Warnings' => array()
		);
	}

	public function Start()
	{
		$this->datas['UIO']['in'] = $this->in;
		$this->datas['UIO']['out'] = $this->out;

		$this->DEBUG['DATAS'] = $this->datas;

		if ($this->out['Controller'] === 'home') {
			define('FOOTER_DISPLAY', true);
		} else {
			define('FOOTER_DISPLAY', false);
		}

		if ($this->out['Controller'] === 'dashboard' or $this->out['Methode'] == 'dashboard') {
			define('DASHBOARD_ON', true);
		} else {
			define('DASHBOARD_ON', false);
		}

		define('COMPANY', (new SettingModel())->index(null)['Cells']);

		if (isset($_SESSION[SESSION_NAME]) && $_SESSION[SESSION_NAME]['Job']['ID'] != 1) {
			if (COMPANY['State']['ID'] != 2) {
				$_SESSION[SESSION_NAME] = array();
				session_destroy();

				$ErrorController = new ErrorController();
				$ErrorController->construction(null);
				exit();
			}
		}

		if ($this->out['Controller'] == 'api') {
			$this->controller->{$this->methode}($this->datas);
		} else if (
			$this->out['Controller'] == 'authentification' && in_array($this->out['Methode'], array('login', 'logout'))
		) {
			if ($this->out['Methode'] === 'login' and isset($_SESSION[SESSION_NAME]) and $_SESSION[SESSION_NAME] !== null) {
				redirection(HOME_PAGE);
			} else {
				$this->controller->{$this->methode}($this->datas);
			}
		} else if (isset($_SESSION[SESSION_NAME]) and $_SESSION[SESSION_NAME] !== null) {
			$LayerController = new LayerController();

			if (in_array($this->out['Controller'], array('dashboard')) or in_array($this->out['Methode'], array('dashboard'))) {
				$this->controller->{$this->methode}($this->datas);
			} else {
				if (!in_array($this->out['Methode'], array('print', 'prints'))) {
					if (!in_array($this->out['Methode'], array('export', 'backup'))) {
						if (!in_array($this->out['Controller'], array('file')) and !in_array($this->out['Methode'], array('clear', 'uploaded', 'print', 'prints'))) {
							$LayerController->header($this->datas, true);
						} else {
							$LayerController->header($this->datas, false);
						}
					}
				} else {
					$LayerController->headerprint($this->datas);
				}

				$this->controller->{$this->methode}($this->datas);

				if (!in_array($this->out['Methode'], array('print', 'prints'))) {
					if (!in_array($this->out['Methode'], array('export', 'backup'))) {
						if (!in_array($this->out['Controller'], array('file')) and !in_array($this->out['Methode'], array('clear', 'uploaded'))) {
							$LayerController->footer($this->datas, true);
						} else {
							$LayerController->footer($this->datas, false);
						}
					}
				}
			}
			$this->debuging();
		} else {
			redirection(LOGIN_PAGE);
		}
	}

	private function debuging()
	{
		/*if($this->debug){
			global $DEBUG;
			$DEBUG = $this->DEBUG;
			require_once("configs/debug.config.php");
		}*/
	}

	public function Toarray()
	{
		$send = array();

		$send['HOST'] = HOST;
		$send['WEB'] = WEB;
		$send['URL'] = $this->url;
		$send['LNG'] = $this->lang;
		$send['controllerString'] = $this->controllerString;
		$send['Methode'] = $this->methode;
		$send['Params'] = $this->params;
		//$send['controller'] = $this->controller;

		D($send);
	}
}
