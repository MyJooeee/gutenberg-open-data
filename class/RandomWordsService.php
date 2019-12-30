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
	protected $returnedNextLetter;

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
		// Tirage de la première lettre du mot
		// On récupère une clé au hasard
		$randKey = array_rand($this->getAlphabet(), 1);

		// On sélectionne la valeur correspondante : ici la lettre
		$newWord = '';
		$firstLetter = $this->getAlphabet()[$randKey];

		// Deuxième caractère basé sur le premier tiré au hasard
		$nextLetter = $this->getNextLetter($this->data[$firstLetter]);
		$newWord .= $nextLetter;

		// Génération mots de 7 lettres
		for($i=0; $i < 6; $i++) {

			// On envoie les probabilités de tirer la lettre consécutive pour la lettre courante
			// $this->returnedNextLetter sera altérée suite au précédent passage (visibilié toute la classe)
			$nextLetter = $this->getNextLetter($this->data[$this->returnedNextLetter]);
			$newWord .= $nextLetter;
		}

		return $newWord;

	}

	/**
	 * Get next character based on data statistics
	 * @return string
	 */
	public function getNextLetter($data)
	{
		asort($data);

		$max = 0;
		foreach ($data as $key => $value) {
			$max+= $value;
			$data[$key] = $max;
		}

		$min = current($data);
		$number = rand($min, $max);

		foreach ($data as $this->returnedNextLetter => $value) {

			if($number <= $value) {
				return  $this->returnedNextLetter;
			}
		}
	}
}