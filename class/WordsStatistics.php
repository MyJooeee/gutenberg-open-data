<?php

class WordsStatistics
{
	protected $file;
	protected $arrayStats = [];

	public function __construct($file)
	{
		$this->file = $file;
	}

	public function readCSVFile()
	{
		if (($handle = fopen($this->file, "r")) !== FALSE) {
    		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

	        $this->analyzeWord($data[0]);

	    	}

    	fclose($handle);

		}

		return $this->sortArray();

	}

	protected function analyzeWord($word)
	{
		$splitedWord = str_split($word);
		$length = strlen($word);

		for($i=0; $i < $length; $i++) {


			// Si le caractère suivant n'est pas défini
			if(!isset($splitedWord[$i+1])) {
				continue;
			}

			$currentCharact = mb_strtolower(htmlspecialchars($splitedWord[$i]));
			$nextCharact = mb_strtolower(htmlspecialchars($splitedWord[$i+1]));


			// Si le caractère courant ou le suivant n'a pas un bon format
			if(empty($currentCharact) || empty($nextCharact) || in_array('-', [$currentCharact, $nextCharact])) {
				continue;
			}

			// Entrée lettre vue pour la première fois
			if(!isset($this->arrayStats[$currentCharact])) {

				$this->arrayStats[$currentCharact] = [];
			}

			// Si binôme de lettres jamais encore était rencontré
			if(!isset($this->arrayStats[$currentCharact][$nextCharact])) {

				$this->arrayStats[$currentCharact][$nextCharact] = 0;
			}

			$this->arrayStats[$currentCharact][$nextCharact] += 1;
		}
	}

	public function sortArray($data = null) 
	{

		if(is_null($data)) {
			$data = $this->arrayStats;
		}

		ksort($data);
	
		foreach ($data as &$subData) {
			ksort($subData);
		}

		var_dump($data);

		return $data;
	}

}