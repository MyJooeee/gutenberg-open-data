<?php

require_once('class/WordsStatisticsService.php');
require_once('class/DrawCellsService.php');
require_once('class/RandomWordsService.php');

$wordsStatsService = new WordsStatisticsService('file/full_data_words_FR.csv');

$drawCellsService = new DrawCellsService($wordsStatsService); // injection de dépendances

$randomWordsService = new RandomWordsService($drawCellsService); // injection de dépendances

require_once('page/template.php');