<?php

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Block\Autonav\Controller;
use Concrete\Core\Html\Service\Navigation;
use Concrete\Core\Page\Page;
use Concrete\Core\Support\Facade\Application;
use Concrete\Core\Validation\CSRF\Token;

/** @var Controller $controller */

$c = Page::getCurrentPage();
$app = Application::getFacadeApplication();
/** @var Token $token */
$token = $app->make(Token::class);
/** @var Navigation $navigation */
$navigation = $app->make(Navigation::class);

$navItems = $controller->getNavItems();

foreach ($navItems as $ni) {
    $classes = [];

    if ($ni->isCurrent || $ni->inPath) {
        $classes[] = 'active';
    }
    if ($ni->hasSubmenu) {
        $classes[] = 'has-suvnav';
    }

    $ni->classes = implode(" ", $classes);
}

echo '<ul class="navbar-nav ms-auto">';

foreach ($navItems as $ni) {
    echo '<li class="nav-item ' . $ni->classes . '">';
    echo '<a href="' . $ni->url . '" target="' . $ni->target . '" class="nav-link ' . $ni->classes . '" title="' . h($ni->name) . '">' . $ni->name . '</a>';

    if ($ni->hasSubmenu) {
        echo '<ul>';
    } else {
        echo '</li>';

        echo str_repeat('</ul></li>', $ni->subDepth);
    }
}

echo '</ul>';
