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
		$this->dictionary = $this->drawCells->wordsStatistics->getDictionary();
	}

	/**
	 * Generate n words with m letters
	 * @param  integer $words
	 * @param  integer $letters
	 * @return string
	 */
	public function numberOfWordsGenerated($words=500, $letters=7)
	{
		$newWords = '';
		for ($i=0; $i < $words; $i++) {
			$newWords .= ' '.$this->generateWord($letters);
		}

		return $newWords;
	}

	/**
	 * @todo Data exploration to create new french words
	 * @return array
	 */
	protected function generateWord($letters)
	{
		// Tirage de la première lettre du mot
		// On récupère une clé au hasard
		$randKey = array_rand($this->getAlphabet(), 1);

		// On sélectionne la valeur correspondante : ici la lettre
		$newWord = '';
		// Récupération de la première lettre
		$firstLetter = $this->getAlphabet()[$randKey];

		// Génération mots de 7 lettres
		$newWord = $this->getNewWord($firstLetter, $letters);

		if(array_search($newWord, $this->dictionary, true) !== false) {
			return '<span class="red">'.$newWord.'</span>';
		}

		return $newWord;

	}

	/**
		 * Recursive function which creates the new word
		 * based on statistic passed
		 * @param $character char
		 * @param $maxIteration int : word length
		 * @return string
	 */
	protected function getNewWord($character, $maxIteration)
	{
		$data = $this->data[$character];

		asort($data);

		$max = 0;
		foreach ($data as $key => $value) {
			$max+= $value;
			$data[$key] = $max;
		}

		$min = current($data);
		$number = rand($min, $max);

		foreach ($data as $charac => $value) {

			if($number <= $value) {
				if ($maxIteration === 0) return '';
				$maxIteration --;
				return ($charac . $this->getNewWord($charac, $maxIteration));
			}
		}
	}
}
