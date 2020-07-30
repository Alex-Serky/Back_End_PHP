<?php

require_once 'class/OpenWeather.php';
$weather = new OpenWeather('94c6cf0868fa5cb930a5e2d71baf0dbf');
$forecast = $meteo->getForecast('La Roche-sur-Yon, fr');
var_dump($meteo);