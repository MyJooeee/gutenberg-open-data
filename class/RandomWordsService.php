<?php

require_once('class/AbstractData.php');

class RandomWordsService extends AbstractData
{
	protected $data = [];

	protected $drawCells;

	public function __construct($drawCellsService)
	{
		$this->drawCells = $drawCellsService;
	}

	public function exploreData()
	{
		return $this->drawCells->wordsStatistics->getData();
	}

	public function getNextLetter()
	{
		$data = $this->data;

		asort($data);

		$max = 0;
		foreach ($data as $key => $value) {
			$max+= $value;
			$data[$key] = $max;
		}

		$min = current($data);
		$number = rand($min, $max);

		var_dump($data, $min, $max, $number);

		foreach ($data as $key => $value) {

			if($number <= $value) {
				return $key;
			}
		}

	}
}