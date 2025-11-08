<?php

namespace Softadastra\Modules;

use Ivi\Core\Router\Router;

final class ModuleRegistry
{
    /** @var ModuleContract[] */
    private array $modules = [];

    public function add(ModuleContract $m): void
    {
        $this->modules[] = $m;
    }

    public function registerAll(): void
    {
        foreach ($this->modules as $m) {
            $m->register();
        }
    }

    public function bootAll(Router $router): void
    {
        foreach ($this->modules as $m) {
            $m->boot($router);
        }
    }
}
