<?php

namespace App\Router;

use InvalidArgumentException;
use function array_values;
use function explode;
use function in_array;
use function ob_get_clean;
use function ob_start;
use function var_dump;

class Router
{
    /**
     * @var array|string
     */
    protected array $authorizedRoutes;
    /**
     * @var array|string
     */
    private array $authorizedRoutesPaths;

    public function __construct(array $authorizedRoutes = [])
    {
        $this->authorizedRoutes = $authorizedRoutes;
        $this->authorizedRoutesPaths = array_values($this->authorizedRoutes);
    }

    public function handleRequest()
    {

        if (in_array($this->requestUri(), $this->authorizedRoutesPaths, true)) {
            ob_start();
            if ($this->requestUri() === '/') {
                require __DIR__ . '/../../views/home.php';
            } else {
                require __DIR__ . '/../../views' . $this->resolveView($this->requestUri());
            }
            $content = ob_get_clean();
            ob_start();
            require __DIR__ . '/../../views/_partials/base.php';
            return ob_get_clean();
        }

        throw new InvalidArgumentException("Aucun chemin ne correspond à la page demandée");
    }

    private function requestUri()
    {
        return requestUri();
    }

    private function resolveView(string $requestUri): string
    {
        return $requestUri . '/index.php';
    }
}