<?php
class LayerController extends Controller
{

	private $LayerView;
	private $LayerLang;
	private $LayerModel;

	private $title = '';
	private $icon = 'themes/default/images/icon.png';

	private $CSS = array();
	private $CSS_LGN = array();
	private $CSS_DSH = array();

	private $JS_HDR = array();
	private $JS_FTR = array();
	private $JS_LGN = array();
	private $JS_DSH = array();

	function __construct()
	{
		parent::__construct();
		$this->LayerModel = new LayerModel();
		$this->LayerLang = LayerLang::Translate();
		$this->LayerView = new LayerView();

		$this->JS_HDR[] = "packages/jquery/js/jquery-1.10.2.min.js";
		$this->JS_FTR[] = "packages/jquery/js/jquery-1.10.2.min.js";
		if (LNG === 'AR') {
			$this->CSS[] = 'packages/bootstrap-arabic/css/bootstrap-arabic.min.css';
			$this->CSS[] = 'themes/default/css/ar.css';
			$this->JS_HDR[] = "packages/bootstrap-arabic/js/bootstrap-arabic.min.js";
			//$this->JS_FTR[] = "packages/bootstrap-arabic/js/bootstrap-arabic.min.js";
		} else {
			$this->CSS[] = 'packages/bootstrap/css/bootstrap.min.css';
			$this->JS_HDR[] = "packages/bootstrap/js/bootstrap.min.js";
			//$this->JS_FTR[] = "packages/bootstrap/js/bootstrap.min.js";
		}
		$this->CSS[] = 'themes/default/css/normalize.css';
		$this->CSS[] = 'themes/default/css/colors.css?id=' . date('ymdGis');
		$this->CSS[] = 'themes/default/css/styles.css?id=' . date('ymdGis');
		$this->CSS[] = 'packages/bootstrap/css/bootstrap-multiselect.css';

		$this->JS_FTR[] = "themes/default/js/normalize.js?id=" . date('ymdGis');
		$this->JS_FTR[] = 'packages/bootstrap/js/bootstrap-multiselect.js';
		$this->JS_FTR[] = "packages/html2pdf-0.10.1/dist/html2pdf.bundle.js";
		$this->JS_FTR[] = "themes/default/js/fn.js?id=" . date('ymdGis');
		$this->JS_FTR[] = "themes/default/js/actions.js?id=" . date('ymdGis');

		//DASHBOARD CSS
		$this->CSS_DSH[] = 'packages/dashboard/css/bootstrap.min.css';
		$this->CSS_DSH[] = 'packages/dashboard/css/bootstrap-responsive.css';
		$this->CSS_DSH[] = 'packages/dashboard/css/style-responsive.css';
		$this->CSS_DSH[] = 'packages/dashboard/css/style.css';

		//DASHBOARD JS
		$this->JS_DSH[] = 'packages/dashboard/js/jquery-1.9.1.min.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery-migrate-1.0.0.min.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery-ui-1.10.0.custom.min.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.ui.touch-punch.js';
		$this->JS_DSH[] = 'packages/dashboard/js/modernizr.js';
		$this->JS_DSH[] = 'packages/bootstrap/js/bootstrap.min.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.cookie.js';
		$this->JS_DSH[] = 'packages/dashboard/js/fullcalendar.min.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.dataTables.min.js';
		$this->JS_DSH[] = 'packages/dashboard/js/excanvas.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.flot.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.flot.pie.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.flot.stack.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.flot.resize.min.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.chosen.min.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.uniform.min.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.cleditor.min.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.noty.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.elfinder.min.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.raty.min.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.iphone.toggle.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.uploadify-3.1.min.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.gritter.min.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.imagesloaded.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.masonry.min.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.knob.modified.js';
		$this->JS_DSH[] = 'packages/dashboard/js/jquery.sparkline.min.js';
		$this->JS_DSH[] = 'packages/dashboard/js/counter.js';
		$this->JS_DSH[] = 'packages/dashboard/js/retina.js';
		$this->JS_DSH[] = 'packages/dashboard/js/custom.js';
		$this->JS_DSH[] = 'packages/dashboard/js/fn.js';
	}

	public function styles($in)
	{
		$send = array();
		foreach ($this->CSS as $css) {
			$send[] = WASSETS . $css;
		}
		return $send;
	}

	public function stylesprint($in)
	{
		$send = array();
		$this->CSS = array();
		$this->CSS[] = 'themes/default/css/print.css';
		foreach ($this->CSS as $css) {
			$send[] = WASSETS . $css;
		}
		return $send;
	}

	public function styleslogin($in)
	{
		$send = array();
		$this->CSS[] = 'themes/default/css/login.css';
		foreach ($this->CSS as $css) {
			$send[] = WASSETS . $css;
		}
		return $send;
	}

	public function stylesdashboard($in)
	{
		$send = array();
		foreach ($this->CSS_DSH as $css) {
			$send[] = WASSETS . $css;
		}
		return $send;
	}

	public function scriptsheader()
	{
		$send = array();

		foreach ($this->JS_HDR as $js) {
			$send[] = WASSETS . $js;
		}

		$send[] = WASSETS . 'packages/canvasjs-1.9.10/canvasjs.min.js';

		return $send;
	}

	public function scriptsfooter()
	{
		$send = array();
		$this->JS_FTR[] = 'packages/canvasjs-1.9.10/canvasjs.min.js';
		foreach ($this->JS_FTR as $js) {
			$send[] = WASSETS . $js;
		}
		return $send;
	}

	public function scriptsdashboard($in)
	{
		$send = array();
		foreach ($this->JS_DSH as $js) {
			$send[] = WASSETS . $js;
		}
		return $send;
	}

	public function header($in, $top = true)
	{
		$send = array();

		$send = array_merge($send, $this->LayerModel->header(null));
		if (L($send, 'HCells')) {

			// قبل: if ($send['HCells']['AR'] != 2) unset($send['HCells']['AR']);
			if (!isset($send['HCells']['AR']['ID']) || (int)$send['HCells']['AR']['ID'] !== 2) {
				unset($send['HCells']['AR']);
			}
			if (!isset($send['HCells']['EN']['ID']) || (int)$send['HCells']['EN']['ID'] !== 2) {
				unset($send['HCells']['EN']);
			}
			if (!isset($send['HCells']['FR']['ID']) || (int)$send['HCells']['FR']['ID'] !== 2) {
				unset($send['HCells']['FR']);
			}
		}

		$send['Session'] = $_SESSION[SESSION_NAME];

		if (isset($_SESSION[SESSION_NAME]['ID'])) {
			define("SSNROLEID", $_SESSION[SESSION_NAME]['ID']);
		} else {
			define("SSNROLEID", NULL);
		}

		$send['Styles'] = $this->styles($in);
		$send['HScripts'] = $this->scriptsheader($in);

		$send['Icon'] = WASSETS . $this->icon;
		$send['Top'] = $top;

		$logoFromDb = (defined('COMPANY') && is_array(COMPANY) && !empty(COMPANY['Logo']))
			? WPICTURES . COMPANY['Logo']
			: HASSETS . 'themes/default/images/apps/logo-inline.png';
		$send['Logoinline'] = loadimage($logoFromDb);


		$send['LHeadTranslates'] = $this->LayerLang;
		$send['LLangues'] = array();

		if (defined('COMPANY') && is_array(COMPANY)) {
			if (!isset($send['HCells']) || !is_array($send['HCells'])) {
				$send['HCells'] = [];
			}
			$send['HCells']['NameAR'] = V(COMPANY, 'CompanynameAR');
			$send['HCells']['NameEN'] = V(COMPANY, 'CompanynameEN');
			$send['HCells']['NameFR'] = V(COMPANY, 'CompanynameFR');
		}


		$this->LayerView->header($send);
	}

	public function headerlogin($in, $top = true)
	{
		$send = array();

		$send['Styles'] = $this->styleslogin($in);
		$send['Icon'] = WASSETS . $this->icon;
		$send['Top'] = false;

		return $send;
	}

	public function headerprint($in)
	{
		$send = array();

		/*$send['Styles'] = $this->stylesprint($in);
			$send['Top'] = true;
			$send['Print'] = true;

			$this->LayerView->header($send);*/

		return $send;
	}

	public function headerdashboard($in, $top = true)
	{
		$send = array();

		$send = array_merge($send, $this->LayerModel->header(null));
		if (L($send, 'HCells')) {

			if ($send['HCells']['AR'] != 2) {
				unset($send['HCells']['AR']);
			}
			if ($send['HCells']['EN'] != 2) {
				unset($send['HCells']['EN']);
			}
			if ($send['HCells']['FR'] != 2) {
				unset($send['HCells']['FR']);
			}
		}

		$send['Session'] = $_SESSION[SESSION_NAME];
		$send['Styles'] = $this->stylesdashboard($in);
		$send['HScripts'] = $this->scriptsheader($in);
		$send['Icon'] = WASSETS . $this->icon;
		$send['Top'] = true;
		$send['Linkactive'] = V(V($in, 'UIO', 'in'), 'Controller');

		$logoFromDb = (defined('COMPANY') && is_array(COMPANY) && !empty(COMPANY['Logo']))
			? WPICTURES . COMPANY['Logo']
			: HASSETS . 'themes/default/images/apps/logo-inline.png'; // رجعة احتياطية
		$send['Logoinline'] = loadimage($logoFromDb);


		$send['LHeadTranslates'] = $this->LayerLang;

		$this->LayerView->header($send);
	}

	public function footer($in, $bottom = true)
	{
		$send = array();
		$send = array_merge($send, $this->LayerModel->footer(null));

		$send['FScripts'] = $this->scriptsfooter($in);
		$send['Bottom']   = $bottom;

		// استعمل URL على الويب
		$staticInline = WASSETS . 'themes/default/images/apps/180bit.png';
		$staticBlock  = WASSETS . 'themes/default/images/dlogo.png';

		// نمرر URLs واضحة
		$send['Logo']      = $staticInline;
		$send['Logoblock'] = $staticBlock;

		// نغلب الـ FCells اللي يقرأه القالب
		if (!isset($send['FCells']) || !is_array($send['FCells'])) {
			$send['FCells'] = [];
		}
		$send['FCells']['Logo']      = $send['Logo'];
		$send['FCells']['Logoblock'] = $send['Logoblock'];

		$send['LFooterTranslates'] = $this->LayerLang;

		$this->LayerView->footer($send);
	}


	public function footerlogin($in, $bottom = true)
	{
		$send = array();

		$send['FScripts'] = $this->scriptsfooter($in);
		$send['Bottom'] = false;

		return $send;
	}

	public function footerdashboard($in, $bottom = true)
	{
		$send = array();
		$send = array_merge($send, $this->LayerModel->footer(null));

		$send['Scripts'] = $this->scriptsdashboard($in);
		$send['Bottom']  = true;

		$staticInline = WASSETS . 'themes/default/images/apps/180bit.png';
		$staticBlock  = WASSETS . 'themes/default/images/dlogo.png';

		$send['Logo']      = $staticInline;
		$send['Logoblock'] = $staticBlock;

		if (!isset($send['FCells']) || !is_array($send['FCells'])) {
			$send['FCells'] = [];
		}
		$send['FCells']['Logo']      = $send['Logo'];
		$send['FCells']['Logoblock'] = $send['Logoblock'];

		$send['LFooterTranslates'] = $this->LayerLang;

		$this->LayerView->footer($send);
	}
}
