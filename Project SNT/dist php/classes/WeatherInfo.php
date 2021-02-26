<?php
namespace classes;

class WeatherInfo
{

    private $filename = '';
    private $expiry = 0;
    public $content = '';
    private $codedContent = '';

    public $temp = 0;
    public $humidity = 0;
    public $speed = 0;
    public $pressure = 0;
    public $icon = '';
    public $precProb = 0;
    public $windDir = '';

    public function __construct($filename, $expirySeconds)
    {
        $this->filename = $filename;
        $this->expiry = $expirySeconds;
    }

    public function readCache()
    {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/cache/' . $this->filename) && time() < (filemtime($_SERVER['DOCUMENT_ROOT'] . '/cache/' . $this->filename) + $this->expiry)) {
            $cache = file($_SERVER['DOCUMENT_ROOT'] . '/cache/' . $this->filename);
            $cache = implode('', $cache);
            $this->content = json_decode($cache);
            return $this->content;
        } else {
            $this->getWeather();
            $this->writeCache();
            return $this->content;
        }
    }

    public function getWeather()
    {
        $url = "https://api.weather.yandex.ru/v2/informers?lat=54.1961&lon=37.6182";
        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => "X-Yandex-API-Key: 04640705-85d4-4828-86c5-41cecbc7776f"
            )
        );
        $context = stream_context_create($opts);
        $this->codedContent = file_get_contents($url, false, $context);
        $this->content = json_decode($this->codedContent);
    }

    public function writeCache()
    {
        $fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/cache/' . $this->filename, 'w+');
        fwrite($fp, $this->codedContent);
        fclose($fp);
        chmod($fp, 0777);
    }

    public function  setWeatherValues() {
        $this->temp = $this->content->fact->temp;
        $this->humidity = $this->content->fact->humidity;
        $this->speed = $this->content->fact->wind_speed;
        $this->pressure = $this->content->fact->pressure_mm;
        $this->icon = $this->content->fact->icon . ".svg";
        $this->precProb = $this->content->forecast->parts[0]->prec_prob;
        $this->windDir = $this->content->forecast->parts[0]->wind_dir;
       switch ($this->windDir) {
           case 's':
               $this->windDir = " Ю.";
               break;
           case 'n':
               $this->windDir = " С.";
               break;
           case 'e':
               $this->windDir = " В.";
               break;
           case 'w':
               $this->windDir = " З.";
               break;
           case 'ne':
               $this->windDir = " СВ.";
               break;
           case 'nw':
               $this->windDir = " СЗ.";
               break;
           case 'se':
               $this->windDir = " ЮВ.";
               break;
           case 'sw':
               $this->windDir = " ЮЗ.";
               break;
       }
    }
}
