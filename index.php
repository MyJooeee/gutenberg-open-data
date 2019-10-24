<?php

require_once('class/WordsStatisticsService.php');
require_once('class/DrawCellsService.php');

$wordsStatsService = new WordsStatisticsService('file/full_data_words_FR.csv');

$drawCellsService = new DrawCellsService($wordsStatsService); // injection de dépendances

require_once('page/template.php');