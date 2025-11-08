<?php

use Market\Core\Infra\Http\Controllers\HomeController;
use Ivi\Http\JsonResponse;

/** @var \Ivi\Core\Router\Router $router */
$router->get('/market', [HomeController::class, 'index']);
$router->get('/market/ping', fn() => new JsonResponse(['ok' => true, 'module' => 'Market/Core']));
