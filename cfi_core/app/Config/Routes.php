<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

service('auth')->routes($routes);

$routes->group('api', function($routes) {
    $routes->resource('tractocamiones', ['controller' => 'Api\Tractocamiones']);
    $routes->resource('choferes', ['controller' => 'Api\Choferes']);
    $routes->resource('cajas', ['controller' => 'Api\CajasRemolques']);
    $routes->resource('viajes', ['controller' => 'Api\Viajes']);
    $routes->resource('evidencias', ['controller' => 'Api\Evidencias']);
});
