<?php

require_once('class/AbstractData.php');

class RandomWordsService extends AbstractData
{

	/**
	 * @var array
	 */
	protected $data = [];

	/**
	 * @var service
	 */
	protected $drawCells;

	/**
	 * @param object $drawCellsService
	 */
	public function __construct($drawCellsService)
	{
		$this->drawCells = $drawCellsService;
		$this->data = $this->drawCells->wordsStatistics->getData();
	}

	/**
	 * @todo Data exploration to create new french words
	 * @return array
	 */
	public function exploreData()
	{

		// Process here, continue...

		$this->getNextLetter();
	}

	/**
	 * Get next character based on data statistics
	 * @return string
	 */
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