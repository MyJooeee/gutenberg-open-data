<?php

require_once('class/WordsStatisticsService.php');
require_once('class/DrawCellsService.php');
require_once('class/RandomWordsService.php');

// $wordsStatsService = new WordsStatisticsService('file/full_data_words_FR.csv');

// $drawCellsService = new DrawCellsService($wordsStatsService); // injection de dépendances


/* 
Pour une lettre donnée, probabilité de tirer la lettre consécutive
Jeu de donnée fictif :
*/
$data = [
	'a' => 2,
	'b' => 8,
	'c' => 4,
];

/* 
Ici $data équivalent à :
$data = ['a', 'a', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'c', 'c', 'c', 'c'];
Sur un tirage aléatoire avec équiprobabilité, de manière équivalente on a aussi :
$data = ['a', 'a', 'c', 'c', 'c', 'c', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b'];
Trié par ordre d'apparition croissant, c'est ce qui nous intèresse ici
Equivalent à un tirage équiprobable sur 22 :
$data = [
	'a' => 2,
	'c' => 6,
	'b' => 14,
]
*/

$randomWordsService = new RandomWordsService($data);
$letter = $randomWordsService->getRandomStats();
var_dump($letter);

require_once('page/template.php');