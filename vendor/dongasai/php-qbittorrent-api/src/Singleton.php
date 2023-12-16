<?php

namespace Fatkulnurk\PHPQbittorrentApi;

class Singleton
{
    private static $instance = null;
    private static $baseURI = 'http://localhost';

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    private function __construct()
    {
    }


    public function setBaseURI(string $uri): void
    {
        self::$baseURI = $uri;
    }

    public function getBaseUri(): string
    {
        return self::$baseURI;
    }
}
