<?php

require_once('class/WordsStatistics.php');
require_once('class/ColorCharacters.php');

$wordsStatistics = new WordsStatistics('file/partialData.csv');

$colorCharacters = new ColorCharacters($wordsStatistics); // injection de dépendances

$data = $colorCharacters->drawCells();

var_dump($data);

// require_once('page/template.php');