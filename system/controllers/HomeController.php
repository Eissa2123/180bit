<?php
class HomeController extends Controller
{

	private $HomeView;
	private $HomeLang;
	private $HomeModel;

	function __construct()
	{
		parent::__construct();
		$this->HomeModel = new HomeModel();
		$this->HomeLang = HomeLang::Translate();
		$this->HomeView = new HomeView();
	}

	public function index($in)
	{
		$send = array();
		$send['LTranslates'] = $this->HomeLang;
		$send['LogoContent'] = loadimage(HASSETS . 'themes/default/images/apps/logo-block.png');
		$send = array_merge($send, $this->HomeModel->index(null));
		$this->HomeView->index($send);
	}
}
