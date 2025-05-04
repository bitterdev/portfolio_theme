<?php

defined('C5_EXECUTE') or die('Access denied');

use Concrete\Core\Application\Service\FileManager;
use Concrete\Core\Form\Service\Form;
use Concrete\Core\Form\Service\Widget\PageSelector;
use Concrete\Core\Support\Facade\Application;
use Concrete\Core\Validation\CSRF\Token;
use Concrete\Core\View\View;

/** @var int $regularLogoFileId */

$app = Application::getFacadeApplication();
/** @var Form $form */
$form = $app->make(Form::class);
/** @var Token $token */
$token = $app->make(Token::class);
/** @var FileManager $fileManager */
$fileManager = $app->make(FileManager::class);
/** @var PageSelector $pageSelector */
$pageSelector = $app->make(PageSelector::class);

?>

<div class="ccm-dashboard-header-buttons">
    <?php \Concrete\Core\View\View::element("dashboard/help", [], "portfolio_theme"); ?>
</div>

<?php \Concrete\Core\View\View::element("dashboard/did_you_know", [], "portfolio_theme"); ?>

<form action="#" method="post">
    <?php echo $token->output("update_settings"); ?>

    <fieldset>
        <legend>
            <?php echo t("General"); ?>
        </legend>

        <div class="form-group">
            <?php echo $form->label("regularLogoFileId", t("Logo")); ?>
            <?php echo $fileManager->image("regularLogoFileId", "regularLogoFileId", t("Please select a file"), $regularLogoFileId); ?>
        </div>
    </fieldset>

    <div class="ccm-dashboard-form-actions-wrapper">
        <div class="ccm-dashboard-form-actions">
            <?php echo $form->submit('save', t('Save'), ['class' => 'btn btn-primary float-end']); ?>
        </div>
    </div>
</form>
