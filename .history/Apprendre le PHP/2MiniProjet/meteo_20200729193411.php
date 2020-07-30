<?php

require_once 'class/OpenWeather.php';
$meteo = new OpenWeather('1fbb198d4cf15d7d7106c08af2028e25');
$meteo->getForecast('La Roche-sur-Yon, fr');
var_dump($meteo);