<?php

namespace App;

use DateTime;
use App\Exceptions\CurlException;
use App\Exceptions\HTTPException;
use App\Exceptions\UnauthorizedHTTPException;



/**
 * Gère l'API d'OpenWeather.
 *
 * @author  Alex Serky <aserky@gmail.com>
 *
 */
class OpenWeather {

    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Récupère les informations météorologiques du jour
     *
     * @param  string $city Ville (ex: "La Rochr-sur-Yon, FR")
     * @return array
     */
    public function getToday(string $city): ?array
    {
        $data = $this->callAPI("weather?q={$city}");
        return [
            'temp' => $data['main']['temp'],
            'description' => $data['weather'][0]['description'],
            'date' => new DateTime()
        ];
    }

    /**
     * Récupérer les prévisions sur plusieurs jours
     *
     * @param string $city
     * @return array|null
     */
    public function getForecast(string $city): ?array
    {
        $data = $this->callAPI("forecast/daily?q={$city}");
        foreach($data['list'] as $day) {
            $results[] = [
                'temp' => $day['temp']['day'],
                'description' => $day['weather'][0]['description'],
                'date' => new DateTime('@' . $day['dt'])
            ];
        }
        return $results;
    }

    /**
     * Appelle l'API Open weather
     *
     * @param string $endpoint Action à appeler (weather, weather/forecast)
     * @throws CurlException Curl a rencontré une erreur
     * @throws UnauthorizedHTTPException
     * @throws HTTPException
     * @return array|null
     */
    private function callAPI(string $endpoint): ?array
    {
        $curl = curl_init("http://api.openweathermap.org/data/2.5/{$endpoint}&units=metric&lang=fr&APPID={$this->apiKey}&units=metric&lang=fr");
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CAINFO => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'cert.cer',
            CURLOPT_TIMEOUT => 1
        ]);
        $data = curl_exec($curl);
        if ($data === false) {
            throw new CurlException($curl);
        }
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($code !== 200) {
            curl_close($curl);
            if ($code === 401) {
                $data = json_decode($data, true); // True pour avoir un tableau associatif
                throw new UnauthorizedHTTPException($data['message'], 401);
            }
            throw new HTTPException($data, $code);
        }
        curl_close($curl);
        return json_decode($data, true);
    }

}