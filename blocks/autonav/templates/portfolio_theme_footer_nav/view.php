<?php

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Block\Autonav\Controller;
use Concrete\Core\Entity\Package;
use Concrete\Core\Html\Service\Navigation;
use Concrete\Core\Package\PackageService;
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
/** @var PackageService $pkgService */
$pkgService = $app->make(PackageService::class);

$pkgEntity = $pkgService->getByHandle("simple_cookie_banner");
$isCookieBannerExtensionInstalled = $pkgEntity instanceof Package && $pkgEntity->isPackageInstalled();

$navItems = $controller->getNavItems();

foreach ($navItems as $ni) {
    $classes = [];

    if ($ni->isCurrent) {
        $classes[] = 'nav-selected';
    }
    if ($ni->hasSubmenu) {
        $classes[] = 'has-suvnav';
    }

    if ($ni->inPath) {
        $classes[] = 'nav-path-selected';
    }

    $ni->classes = implode(" ", $classes);
}

echo '<ul class="links">';

foreach ($navItems as $ni) {
    echo '<li class="' . $ni->classes . '">';
    echo '<a href="' . $ni->url . '" target="' . $ni->target . '" class="' . $ni->classes . '" title="' . h($ni->name) . '">' . $ni->name . '</a>';

    if ($ni->hasSubmenu) {
        echo '<ul>';
    } else {
        echo '</li>';

        echo str_repeat('</ul></li>', $ni->subDepth);
    }
}

if ($isCookieBannerExtensionInstalled) {
    echo '<li>'; //opens a nav item
    echo '<a href="#" data-cc="c-settings">' . t("Manage cookie settings") . '</a>';
    echo '</li>';
}

echo '</ul>';
