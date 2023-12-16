<?php

namespace App\Logic;

use Fatkulnurk\PHPQbittorrentApi\Singleton;
use http\Env;

class Qbittorrent
{

    static $qbt;

    static public function init()
    {
        if (!self::$qbt) {
            Singleton::getInstance()->setBaseURI(\Hyperf\Support\env('QB_URL','http://127.0.0.1:8080'));
            $qbt = new \Fatkulnurk\PHPQbittorrentApi\Qbittorrent();
            $qbt->authentication()->login(\Hyperf\Support\env('QB_USERNAME','admin'), \Hyperf\Support\env('QB_PASSWORD','123456'));

            self::$qbt = $qbt;
        }

        return self::$qbt;
    }

}