<?php

require_once('class/AbstractData.php');

class RandomWordsService extends AbstractData
{
	protected $data = [];

	public function __construct($data)
	{
		$this->data = $data;
	}

	public function getRandomStats()
	{
		$data = $this->data;

		asort($data);

		$max = 0;
		foreach ($data as $key => $value) {
			$max+= $value;
			$data[$key] = $max;
		}

		$min = $data['a'];
		$number = rand(1, $max);

		var_dump($data, $min, $max, $number);

		foreach ($data as $key => $value) {

			if($number <= $value) {
				return $key;
			}
		}

	}
}