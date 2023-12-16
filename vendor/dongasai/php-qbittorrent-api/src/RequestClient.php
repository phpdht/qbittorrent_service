<?php

namespace Fatkulnurk\PHPQbittorrentApi;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use Psr\Http\Message\RequestInterface;

class RequestClient
{

    static $client;


    public static function make(): ClientInterface
    {
        if (self::$client) {
            return self::$client;
        }



        $client       = new Client(
            [
                // Base URI is used with relative requests
                'base_uri' => Singleton::getInstance()->getBaseUri(),
                // You can set any number of default request options.
                'timeout'  => 20.0,
                'headers'  => [
                    'Referer' => Singleton::getInstance()->getBaseUri()
                ],
                'cookies'  => true
            ]
        );
        self::$client = $client;

        return $client;
    }

}

function add_header($header, $value)
{
    return function (callable $handler) use ($header, $value) {
        return function (
            RequestInterface $request,
            array            $options
        ) use (
            $handler,
            $header,
            $value
        ) {
            $request = $request->withHeader($header, $value);

            return $handler($request, $options);
        };
    };
}
