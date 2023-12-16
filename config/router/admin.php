<?php

use Hyperf\HttpServer\Router\Router;

Router::addGroup('/admin', function () {
    Router::addRoute(['GET'], '/', 'App\Controller\Admin\HomeController@index');
    Router::addRoute(['GET'], '/index', App\Controller\Admin\HomeController::class . '@index');
    Router::addRoute(['GET'], '/index/chart', App\Controller\Admin\IndexController::class . '@chart');
    Router::addRoute(['GET'], '/index/chart_data', App\Controller\Admin\IndexController::class . '@chart_data');

    Router::addRoute(['GET'], '/acc/index', App\Controller\Admin\AccController::class . '@index');
    Router::addRoute(['GET'], '/acc/list_data', App\Controller\Admin\AccController::class . '@list_data');

    Router::addRoute(['GET'], '/user/index', App\Controller\Admin\UserController::class . '@index');
    Router::addRoute(['GET'], '/user/list_data', App\Controller\Admin\UserController::class . '@list_data');


});
