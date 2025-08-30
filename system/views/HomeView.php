<?php
class HomeView extends View
{

	const FOLDER = UI . 'home/';

	function __construct()
	{
		parent::__construct();
	}

	public function index($in)
	{
		$send = array();
		$send = $in;
		$this->render(self::FOLDER . '/' . __FUNCTION__ . TMP, $send);
	}
}
