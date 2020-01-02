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
	 * @var string
	 */
	protected $processedLetter;

	/**
	 * @param object $drawCellsService
	 */
	public function __construct($drawCellsService)
	{
		$this->drawCells = $drawCellsService;
		$this->data = $this->drawCells->wordsStatistics->getData();
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
		$this->processedLetter = $this->getAlphabet()[$randKey];

		// Génération mots de 7 lettres
		for($i=0; $i < $letters; $i++) {

			// On envoie les probabilités de tirer la lettre consécutive pour la lettre courante
			// $this->returnedNextLetter sera altérée suite au précédent passage, visibilité inter-méthodes
			$nextLetter = $this->getNextLetter($this->data[$this->processedLetter]);
			$newWord .= $nextLetter;
		}

		return $newWord;

	}

	/**
	 * Get next character based on data statistics
	 * @return string
	 */
	protected function getNextLetter($data)
	{
		asort($data);

		$max = 0;
		foreach ($data as $key => $value) {
			$max+= $value;
			$data[$key] = $max;
		}

		$min = current($data);
		$number = rand($min, $max);

		foreach ($data as $this->processedLetter => $value) {

			if($number <= $value) {
				return  $this->processedLetter;
			}
		}
	}
}