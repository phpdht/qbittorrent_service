<?php

use Hyperf\HttpServer\Router\Router;

Router::addGroup('/api', function () {
    Router::addRoute(['GET'], '/', 'App\Controller\Api\IndexController@index');
    Router::addRoute(['GET'], '/index/fileget/{path:.+}', 'App\Controller\Api\IndexController@fileget');

});

