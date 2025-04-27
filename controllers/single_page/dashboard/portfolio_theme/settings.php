<?php

namespace Concrete\Package\PortfolioTheme\Controller\SinglePage\Dashboard\PortfolioTheme;

use Concrete\Core\Config\Repository\Repository;
use Concrete\Core\Error\ErrorList\ErrorList;
use Concrete\Core\Form\Service\Validation;
use Concrete\Core\Page\Controller\DashboardSitePageController;

class Settings extends DashboardSitePageController
{
    /** @var Repository */
    protected $config;
    /** @var Validation */
    protected $formValidator;

    public function on_start()
    {
        parent::on_start();
        $this->config = $this->getSite()->getConfigRepository();
        $this->formValidator = $this->app->make(Validation::class);
    }

    public function view()
    {
        if ($this->request->getMethod() === "POST") {
            $this->formValidator->setData($this->request->request->all());
            $this->formValidator->addRequiredToken("update_settings");

            if ($this->formValidator->test()) {
                $this->config->save("portfolio_theme.regular_logo_file_id", (int)$this->request->request->get("regularLogoFileId"));

                if (!$this->error->has()) {
                    $this->set("success", t("The settings has been successfully updated."));
                }
            } else {
                /** @var ErrorList $errorList */
                $errorList = $this->formValidator->getError();

                foreach ($errorList->getList() as $error) {
                    $this->error->add($error);
                }
            }
        }

        $this->set("regularLogoFileId", (int)$this->config->get("portfolio_theme.regular_logo_file_id"));
    }
}