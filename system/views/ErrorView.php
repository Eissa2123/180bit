<?php
	class ErrorView extends View {
	
		const FOLDER = UI.'error/';
		
		function __construct() {
			parent::__construct();
		}

		public function e404($in = null) {
			$send = array();
			require_once(self::FOLDER.'e404'.TMP);
		}

		public function construction($in = null) {
			$send = array();
			require_once(self::FOLDER.'construction'.TMP);
		}

	}
