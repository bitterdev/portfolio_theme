<?php

namespace Bitter\PortfolioTheme\Routing;

use Bitter\PortfolioTheme\API\V1\Middleware\FractalNegotiatorMiddleware;
use Bitter\PortfolioTheme\API\V1\Configurator;
use Concrete\Core\Routing\RouteListInterface;
use Concrete\Core\Routing\Router;

class RouteList implements RouteListInterface
{
    public function loadRoutes(Router $router)
    {
        $router
            ->buildGroup()
            ->setNamespace('Concrete\Package\PortfolioTheme\Controller\Dialog\Support')
            ->setPrefix('/ccm/system/dialogs/portfolio_theme')
            ->routes('dialogs/support.php', 'portfolio_theme');
    }
}