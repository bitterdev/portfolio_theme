<?php

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Area\GlobalArea;
use Concrete\Core\Entity\File\Version;
use Concrete\Core\File\File;
use Concrete\Core\Package\PackageService;
use Concrete\Core\Page\Page;
use Concrete\Core\Site\Service;
use Concrete\Core\Support\Facade\Application;
use Concrete\Core\Support\Facade\Url;
use Concrete\Core\View\View;
use Concrete\Package\PortfolioTheme\Controller;
use Concrete\Core\Entity\File\File as FileEntity;

/** @var Page $c */
/** @var View $this */

$app = Application::getFacadeApplication();
/** @var PackageService $pkgService */
/** @noinspection PhpUnhandledExceptionInspection */
$pkgService = $app->make(PackageService::class);
/** @var Service $siteService */
/** @noinspection PhpUnhandledExceptionInspection */
$siteService = $app->make(Service::class);
$site = $siteService->getActiveSiteForEditing();
$siteConfig = $site->getConfigRepository();
$pkgEntity = $pkgService->getByHandle("portfolio_theme");
/** @var Controller $pkg */
$pkg = $pkgEntity->getController();

$logoUrl = $pkg->getRelativePath() . "/images/logo.svg";

$f = File::getByID($siteConfig->get("portfolio_theme.footer_logo_file_id"));

if ($f instanceof FileEntity) {
    $fv = $f->getApprovedVersion();

    if ($fv instanceof Version) {
        $logoUrl = $fv->getURL();
    }
}

$homePage = Page::getByID(Page::getHomePageID($c::getCurrentPage()));
/** @noinspection PhpUnhandledExceptionInspection */
$this->inc("elements/header_top.php"); ?>

<header>
    <nav class="navbar navbar-expand-lg">
        <div class="language-switcher">
            <div class="container">
                <?php
                $a = new GlobalArea("Language Switcher");
                $a->display();
                ?>
            </div>
        </div>

        <div class="mainnav">
            <div class="container">
                <a href="<?php echo Url::to($homePage) ?>" class="navbar-brand">
                    <img src="<?php echo $logoUrl; ?>"
                         alt="<?php echo h($homePage->getCollectionName()) ?>">
                </a>

                <button class="navbar-toggler" type="button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    $a = new GlobalArea("Header Navigation");
                    $a->display();
                    ?>
                </div>
            </div>
        </div>
    </nav>
</header>

