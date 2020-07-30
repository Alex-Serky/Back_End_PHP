<?php

$curl = curl_init('https://samples.openweathermap.org/data/2.5/weather?q=London,uk&appid=439d4b804bc8187953eb36d2a8c26a02');
$data = curl_exec($curl);
if ($data === false) {
    var_dump($curl_error($curl));
} else {
    # code...
}
curl_close($curl);
