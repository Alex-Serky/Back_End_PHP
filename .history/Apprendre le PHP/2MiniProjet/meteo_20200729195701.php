<?php

require_once 'class/OpenWeather.php';
$meteo = new OpenWeather('439d4b804bc8187953eb36d2a8c26a02');
$meteo->getForecast('Nantes, fr');
var_dump($meteo);