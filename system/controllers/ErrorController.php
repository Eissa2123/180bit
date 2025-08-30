<?php
	class ErrorController extends Controller{

		private $ErrorView;
		private $ErrorModel;

		function __construct() {
			$this->ErrorView = new ErrorView();
			$this->ErrorModel = new ErrorModel();
		}

		public function e404($in = null) {
			$send = array();
			$this->ErrorView->e404($in);
		}

		public function construction($in = null){
			$send = array();
			$this->ErrorView->construction($in);
		}

	}
