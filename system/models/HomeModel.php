<?php
	class HomeModel extends Model {

		function __construct() {
			parent::__construct();
		}

		public function index($in) {
			$send = array();

			$send['Historiques']['Count'] = $this->select('*')
				->from(Model::HISTORIQUE)
				->get()->count;
				
			$send['Reports']['Count'] = 13;
			$send['Boxs']['Count'] = 140;
			$send['Settings']['Count'] = 4;
			$send['Tools']['Count'] = 3;

			$send['PurchasesQuotations']['Count'] = $this->select('*')
				->from(Model::PURCHASE_QUOTATION)
				->where('State', '1', '<>')
				->get()->count;
			$send['PurchasesInvoices']['Count'] = $this->select('*')
				->from(Model::PURCHASE)
				->where('State', '1', '<>')
				->get()->count;
			$send['PurchasesPayments']['Count'] = $this->select('*')
				->from(Model::PURCHASE_PAYMENT)
				->where('State', '1', '<>')
				->get()->count;
			$send['PurchasesReturns']['Count'] = $this->select('*')
				->from(Model::PURCHASE_RETURN)
				->where('State', '1', '<>')
				->get()->count;

			$send['SalesQuotations']['Count'] = $this->select('*')
				->from(Model::SALE_QUOTATION)
				->where('State', '1', '<>')
				->get()->count;
			$send['SalesInvoices']['Count'] = $this->select('*')
				->from(Model::SALE)
				->where('State', '1', '<>')
				->get()->count;
			$send['SalesPayments']['Count'] = $this->select('*')
				->from(Model::SALE_PAYMENT)
				->where('State', '1', '<>')
				->get()->count;
			$send['SalesReturns']['Count'] = $this->select('*')
				->from(Model::SALE_RETURN)
				->where('State', '1', '<>')
				->get()->count;

			$send['Expenses']['Count'] =  $this->select('*')
				->from(Model::EXPENSE)
				->where('State', '1', '<>')
				->get()->count;
			$send['Revenues']['Count'] =  $this->select('*')
				->from(Model::REVENUE)
				->where('State', '1', '<>')
				->get()->count;
			$send['Products']['Count'] = $this->select('*')
				->from(Model::PRODUCT)
				->where('State', '1', '<>')
				->get()->count;
			$send['Categories']['Count'] = $this->select('*')
				->from(Model::CATEGORIE)
				->where('State', '1', '<>')
				->get()->count;
			$send['Cobons']['Count'] =  $this->select('*')
				->from(Model::COBON)
				->where('State', '1', '<>')
				->get()->count;
			$send['Restrictions']['Count'] =  0;
			$send['Terms']['Count'] = $this->select('*')
				->from(Model::TERM)
				->where('State', '1', '<>')
				->get()->count;

			$send['Jobs']['Count'] = $this->select('*')
				->from(Model::JOB)
				->where('State', '1', '<>')
				->get()->count;
			$send['Employees']['Count'] = $this->select('*')
				->from(Model::EMPLOYEE)
				->where('State', '1', '<>')
				->get()->count;
			$send['Customers']['Count'] = $this->select('*')
				->from(Model::CUSTOMER)
				->where('State', '1', '<>') 
				->get()->count;
			$send['Providers']['Count'] = $this->select('*')
				->from(Model::PROVIDER)
				->where('State', '1', '<>')
				->get()->count;
			$send['Marketers']['Count'] = $this->select('*')
				->from(Model::CUSTOMER)
				->where('State', '1', '<>')
				->get()->count;

			return $send;
		}

	}
