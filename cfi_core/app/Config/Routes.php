<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

service('auth')->routes($routes);

$routes->group('api', ['filter' => 'session'], function($routes) {
    $routes->resource('tractocamiones', ['controller' => 'Api\Tractocamiones', 'filter' => 'group:admin,trafico,mantenimiento']);
    $routes->resource('choferes', ['controller' => 'Api\Choferes', 'filter' => 'group:admin,trafico']);
    $routes->resource('cajas_remolques', ['controller' => 'Api\CajasRemolques', 'filter' => 'group:admin,trafico,mantenimiento']);
    $routes->resource('viajes', ['controller' => 'Api\Viajes']);
    $routes->resource('evidencias', ['controller' => 'Api\Evidencias']);
    $routes->resource('ordenes_trabajo', ['controller' => 'Api\OrdenesTrabajo', 'filter' => 'group:admin,trafico,mantenimiento']);
});
