<?php
	class ErrorCore extends Core {

		private $_ID;
		private $_Sender;
		private $_Received;
		private $_SendDate;
		private $_SendTime;
		private $_ReceivedDate;
		private $_ReceivedTime;
		private $_Amount;
		private $_Status;

		function __construct() {
			parent::__construct();
		}

		public function ID($value = null) {
			if($value == null) {
				return $this->_ID;
			} else {
				$this->_ID = $value;
			}
		}

		public function Sender($value = null) {
			if($value == null) {
				return $this->_Sender;
			} else {
				$this->_Sender = $value;
			}
		}

		public function Received($value = null) {
			if($value == null) {
				return $this->_Received;
			} else {
				$this->_Received = $value;
			}
		}

		public function SendDate($value = null) {
			if($value == null) {
				return $this->_SendDate;
			} else {
				$this->_SendDate = $value;
			}
		}

		public function SendTime($value = null) {
			if($value == null) {
				return $this->_SendTime;
			} else {
				$this->_SendTime = $value;
			}
		}

		public function ReceivedDate($value = null) {
			if($value == null) {
				return $this->_ReceivedDate;
			} else {
				$this->_ReceivedDate = $value;
			}
		}

		public function ReceivedTime($value = null) {
			if($value == null) {
				return $this->_ReceivedTime;
			} else {
				$this->_ReceivedTime = $value;
			}
		}

		public function Amount($value = null) {
			if($value == null) {
				return $this->_Amount;
			} else {
				$this->_Amount = $value;
			}
		}

		public function Status($value = null) {
			if($value == null) {
				return $this->_Status;
			} else {
				$this->_Status = $value;
			}
		}

		public function Toarray() {
			return array(
				'ID' => $this->ID(),
				'Sender' => $this->Sender(),
				'Received' => $this->Received(),
				'SendDate' => $this->SendDate(),
				'SendTime' => $this->SendTime(),
				'ReceivedDate' => $this->ReceivedDate(),
				'ReceivedTime' => $this->ReceivedTime(),
				'Amount' => $this->Amount(),
				'Status' => $this->Status(),
			);
		}

	}
