<?php
class View
{

	function __construct() {}

	function output($datas)
	{
		$type = PDF;
		if (isset($datas['type']) and in_array($datas['type'], array(PDF))) {
			$type = strtoupper($datas['type']);
		}
		switch ($type) {
			case PDF:
				$this->pdf($datas);
				break;
		}
	}

	function pdf($datas)
	{
		$filename = UID() . PDF;

		$orientation = '';
		$format = 'A4';
		$title = '';
		$body = '';
		$header = null;
		$footer = null;

		if (isset($datas['format']) and $datas['format'] != '') {
			$format = $datas['format'];
		}

		if (isset($datas['orientation']) and $datas['orientation'] != '') {
			$orientation = $datas['orientation'];
		}

		if (isset($datas['title']) and $datas['title'] != '') {
			$title = $datas['title'];
		}

		if (isset($datas['body']) and $datas['body'] != '') {
			$body = $datas['body'];
		}

		if (isset($datas['header']) and $datas['header'] != '') {
			$header = $datas['header'];
		}

		if (isset($datas['footer']) and $datas['footer'] != '') {
			$footer = $datas['footer'];
		}

		$options = [
			'orientation' => $orientation,
			'mode' => 'utf-8',
			'format' => $format,
			'margin_left' => 0,
			'margin_right' => 0,
			'margin_top' => 0,
			'margin_bottom' => 10,
			'margin_header' => 0,
			'margin_footer' => 0,
			'default_font_size' => 10
		];

		$mpdf  = new \Mpdf\Mpdf($options);

		$mpdf->showImageErrors = true;
		$mpdf->autoScriptToLang = true;
		$mpdf->autoLangToFont = true;
		$mpdf->mirrorMargins = 1;
		$mpdf->SetDisplayMode('fullpage');

		if (LNG == 'AR' && !isset($datas['rtl'])) {
			$mpdf->SetDirectionality('rtl');
		}

		$mpdf->SetTitle($title);
		if ($header != null) {
			//$mpdf->SetHTMLHeader("<div style='width:100%;text-align:center;'>".$header."</div>");
		}
		//if($footer != null){
		//$mpdf->SetHTMLFooter("<div style='width:100%;text-align:center;'>{nb} / {nbpg}</div>");

		/*$adress = V(COMPANY, 'Address'.LNG) . '&nbsp;';
				$adress .= V(COMPANY, 'City'.LNG) . '&nbsp;';
				$adress .= V(COMPANY, 'Country'.LNG) . '&nbsp;';
				$mpdf->SetHTMLFooter("<div style='width:100%;text-align:center;'>".$adress."</div>");*/

		//}

		//$mpdf->SetProtection(array(), '1111', '0000');

		$css1 = file_get_contents(WASSETS . 'themes/default/css/colors.css');
		$css2 = file_get_contents(WASSETS . 'themes/default/css/print.css');

		$mpdf->WriteHTML($css1, 1);
		$mpdf->WriteHTML($css2, 1);

		$mpdf->WriteHTML($body, 2);

		//preg_match_all('/<page (.*?)>(.*?)<\/page>/s', $body, $matchs);

		/*if(isset($matchs[0])){
				$n = count($matchs[0]);
				$i = 0;
				foreach($matchs[0] as $match){
					$i++;
					$mpdf->WriteHTML($match, 2);

					if($i < $n){
						$mpdf->AddPage();
					}
				}
			}*/


		$mpdf->Output($filename, 'I');
		exit;
	}

	function render($tempalate, $in, $out = false)
	{
		global  $DEBUG;

		$send = $in;

		if (file_exists($tempalate)) {
			$DEBUG['LOADED']['RENDER']['UI'][] = $tempalate;
			extract($send);
			if (isset($Errors)) {
				if (count($Errors) === 0) {
					unset($Errors);
				} else {
					$Errors = true;
				}
			}
			if (isset($Success) and $Success === false) {
				$Errors = true;
				unset($Success);
			}
			require_once($tempalate);
		} else {
			$tempalate = UI . 'error/e404' . TMP;
			require_once($tempalate);
		}
	}



	function renderWithLayout($template, $data = [])
	{
		global $DEBUG;

		$send = $data;

		if (file_exists($template)) {
			$DEBUG['LOADED']['RENDER']['UI'][] = $template;
			extract($send);

			ob_start();
			require($template);
			$content = ob_get_clean();

			require_once(UI . 'layer/layout.ui.php');
		} else {
			require_once(UI . 'error/e404' . TMP);
		}
	}
}
