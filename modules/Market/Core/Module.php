<?php

use Softadastra\Modules\ModuleContract;
use Ivi\Core\Router\Router;

return new class implements ModuleContract {
    public function name(): string
    {
        return 'Market/Core';
    }

    public function register(): void
    {
        // Merge de config "safe" (aucun appel sur objet null)
        $path = __DIR__ . '/config/market.php';
        if (is_file($path)) {
            $cfg = require $path;

            $current = function_exists('config')
                ? (array) config('market', [])
                : (array) ($GLOBALS['__ivi_config']['market'] ?? []);

            $merged = array_replace_recursive($current, (array) $cfg);

            // Si tu as un helper config_set(), on l’utilise ; sinon fallback global.
            if (function_exists('config_set')) {
                config_set('market', $merged);
            } else {
                $GLOBALS['__ivi_config']['market'] = $merged;
            }
        }
    }

    public function boot(Router $router): void
    {
        // Namespace de vues pour "market::..."
        \App\Controllers\Controller::addViewNamespace('market', __DIR__ . '/views');

        // Routes du module (le $router du paramètre est visible dans le require)
        $routes = __DIR__ . '/routes/web.php';
        if (is_file($routes)) {
            require $routes;
        }

        // Migrations (safe: ne plante pas si migrations() est absent ou retourne null)
        $mig = __DIR__ . '/database/migrations';
        if (is_dir($mig)) {
            if (function_exists('migrations')) {
                $mgr = migrations();
                if (is_object($mgr) && method_exists($mgr, 'addPath')) {
                    $mgr->addPath($mig);
                } else {
                    // Fallback: stocker le chemin pour une CLI ultérieure
                    $GLOBALS['__ivi_migration_paths'] ??= [];
                    if (!in_array($mig, $GLOBALS['__ivi_migration_paths'], true)) {
                        $GLOBALS['__ivi_migration_paths'][] = $mig;
                    }
                }
            } else {
                // Fallback si aucun helper migrations()
                $GLOBALS['__ivi_migration_paths'] ??= [];
                if (!in_array($mig, $GLOBALS['__ivi_migration_paths'], true)) {
                    $GLOBALS['__ivi_migration_paths'][] = $mig;
                }
            }
        }
    }
};
