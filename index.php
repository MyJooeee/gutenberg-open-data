<?php

require_once('class/WordsStatistics.php');
require_once('class/ColorCharacters.php');

$wordsStatistics = new WordsStatistics('file/mots_FR.csv');

$colorCharacters = new ColorCharacters($wordsStatistics); // injection de dépendances

require_once('page/template.php');