<?php
class LayerModel extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	public function header($in)
	{
		$send = array();

		$send['HCells'] = $this->select('*')
			->from(Model::SETTING)
			->get()->first;

		if (L($send, 'HCells')) {
			$Cells = $send['HCells'];

			$Cells['AR'] = $this->select('*')
				->from(Model::STATE)
				->where('ISD', '0', '=')
				->where('ID', $Cells['AR'], '=', 'AND')
				->get()->first;

			$Cells['EN'] = $this->select('*')
				->from(Model::STATE)
				->where('ISD', '0', '=')
				->where('ID', $Cells['EN'], '=', 'AND')
				->get()->first;

			$Cells['FR'] = $this->select('*')
				->from(Model::STATE)
				->where('ISD', '0', '=')
				->where('ID', $Cells['FR'], '=', 'AND')
				->get()->first;

			$Cells['State'] = $this->select('*')
				->from(Model::STATE)
				->where('ISD', '0', '=')
				->where('ID', $Cells['State'], '=', 'AND')
				->get()->first;

			if ($Cells['Logo'] !== null and $Cells['Logo'] !== '' and file_exists(HPICTURES . $Cells['Logo'])) {
				$Cells['Logo'] = WPICTURES . $Cells['Logo'];
			} else {
				$Cells['Logo'] = IMG_DEFAULT;
			}

			$send['HCells'] = $Cells;
		}

		return $send;
	}
	public function footer($in)
	{
		$send = array();

		$send['FCells'] = $this->select('*')
			->from(Model::SETTING)
			->get()->first;

		if (L($send, 'FCells')) {
			$Cells = $send['FCells'];

			$Cells['AR'] = $this->select('*')
				->from(Model::STATE)
				->where('ISD', '0', '=')
				->where('ID', $Cells['AR'], '=', 'AND')
				->get()->first;

			$Cells['EN'] = $this->select('*')
				->from(Model::STATE)
				->where('ISD', '0', '=')
				->where('ID', $Cells['EN'], '=', 'AND')
				->get()->first;

			$Cells['FR'] = $this->select('*')
				->from(Model::STATE)
				->where('ISD', '0', '=')
				->where('ID', $Cells['FR'], '=', 'AND')
				->get()->first;

			$Cells['State'] = $this->select('*')
				->from(Model::STATE)
				->where('ISD', '0', '=')
				->where('ID', $Cells['State'], '=', 'AND')
				->get()->first;

			if ($Cells['Logo'] !== null and $Cells['Logo'] !== '' and file_exists(HPICTURES . $Cells['Logo'])) {
				$Cells['Logo'] = WPICTURES . $Cells['Logo'];
			} else {
				$Cells['Logo'] = IMG_DEFAULT;
			}

			$send['FCells'] = $Cells;
		}

		return $send;
	}

	public function sidebar($in)
	{
		$send = array();
		return $send;
	}
}
