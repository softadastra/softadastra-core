<?php

namespace Softadastra\Modules;

use Ivi\Core\Router\Router;

interface ModuleContract
{
    public function name(): string;
    public function register(): void;          // bind services, merge config
    public function boot(Router $router): void; // routes, views, migrations
}
