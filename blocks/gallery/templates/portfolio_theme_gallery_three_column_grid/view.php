<?php /** @noinspection DuplicatedCode */

defined('C5_EXECUTE') or die('Access Denied.');

use Concrete\Block\Gallery\Controller;
use Concrete\Core\Entity\File\File;
use Concrete\Core\Entity\File\Version;

/** @var Controller $controller */
/** @var bool $includeDownloadLink */
/** @var int $bID */

$page = $controller->getCollectionObject();
$images = $images ?? [];

if (!$images && $page && $page->isEditMode()) { ?>
    <div class="ccm-edit-mode-disabled-item">
        <?php
        echo t('Empty Gallery Block.') ?>
    </div>
    <?php

    // Stop outputting
    return;
}
?>

<div class="three-column-grid-gallery">
    <div class="row">
        <?php foreach ($images as $image) { ?>
            <?php if (isset($image["file"]) && $image["file"] instanceof File) { ?>
                <?php $fv = $image["file"]->getApprovedVersion(); ?>

                <?php if ($fv instanceof Version) { ?>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <img src="<?php echo h($fv->getURL()) ?>" title="<?php echo h($fv->getTitle()); ?>"
                             class="img-fluid"/>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
</div>