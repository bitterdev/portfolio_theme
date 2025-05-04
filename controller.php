<?php

namespace Concrete\Package\PortfolioTheme;

use Bitter\PortfolioTheme\Provider\ServiceProvider;
use Concrete\Core\Package\Package;
use Concrete\Core\Entity\Package as PackageEntity;

class Controller extends Package
{
    protected string $pkgHandle = 'portfolio_theme';
    protected string $pkgVersion = '0.1.2';
    protected $appVersionRequired = '9.0.0';
    protected $pkgAllowsFullContentSwap = true;
    protected $pkgAutoloaderRegistries = [
        'src/Bitter/PortfolioTheme' => 'Bitter\PortfolioTheme',
    ];

    public function getPackageDescription(): string
    {
        return t('A sleek Concrete CMS theme built for business portfolios, developed for version 9 and based on Bedrock.');
    }

    public function getPackageName(): string
    {
        return t('Portfolio Theme');
    }

    public function on_start()
    {
        /** @var ServiceProvider $serviceProvider */
        $serviceProvider = $this->app->make(ServiceProvider::class);
        $serviceProvider->register();
    }

    public function install(): PackageEntity
    {
        $pkg = parent::install();
        $this->installContentFile("data.xml");
        return $pkg;
    }

    public function upgrade()
    {
        parent::upgrade();
        $this->installContentFile("data.xml");
    }
}
