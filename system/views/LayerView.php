<?php
class LayerView extends View
{

	const FOLDER = UI . 'layer/';

	function __construct()
	{
		parent::__construct();
	}

	public function header($in)
	{
		extract($in);
		require_once(self::FOLDER . 'header' . TMP);
	}

	public function footer($in)
	{
		extract($in);
		require_once(self::FOLDER . 'footer' . TMP);
	}
}
