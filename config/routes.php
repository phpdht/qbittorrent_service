<?php

declare(strict_types=1);

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use Hyperf\HttpServer\Router\Router;

Router::addRoute([ 'GET', 'POST', 'HEAD' ], '/', 'App\Controller\Api\IndexController@index');

Router::get('/favicon.ico', function () {
    return '';
});

include_once "router/admin.php";
include_once "router/api.php";

Router::addServer('ws', function () {
    Router::get('/ws', 'App\Controller\WebSocket\WebSocketController');
});


Router::addServer('grpc', function () {
    Router::addGroup('/Grpc.PHPdhtQbittorrentService.Hello.Hello', function () {
        Router::post('/sayHello', [ \App\Controller\Grpc\HiController::class, 'sayHello' ]);
    });
    Router::addGroup('/Grpc.PHPdhtQbittorrentService.Application.Application', function () {
        Router::post('/version', [ \App\Controller\Grpc\ApplicationController::class, 'version' ]);
    });
});
