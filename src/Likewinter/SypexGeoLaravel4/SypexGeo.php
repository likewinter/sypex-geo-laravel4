<?php namespace Likewinter\SypexGeoLaravel4;

use Likewinter\SypexGeoLaravel4\SxGeo;

class SypexGeo
{
    protected $sxGeoInstance;

    public function __construct($dbFileName)
    {
        if (!file_exists($dbFileName)) {
            throw new \Exception('Put database file in app\database\sypex');
        }
        $this->sxGeoInstance = new SxGeo($dbFileName);
    }

    protected function getIp()
    {
        $ip = '';
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        } elseif (getenv('REMOTE_ADDR')) {
            $ip = getenv('REMOTE_ADDR');
        }

        return $ip;
    }

    public function country()
    {
        return $this->full()['country'];
    }

    public function city()
    {
        return $this->full()['city'];
    }

    public function timezone()
    {
        return $this->full()['timezone'];
    }

    public function full()
    {
        return $this->sxGeoInstance->get($this->getIp());
    }
}
