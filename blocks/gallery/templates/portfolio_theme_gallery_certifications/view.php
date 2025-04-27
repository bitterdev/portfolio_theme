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

<div class="certifications">
    <a href="https://skillshop.credential.net/72ce3882-6acd-4769-a1a2-8eecacbd666a#acc.OYKvbkIA"
       target="_blank" title="Google Ads Creative">
        <?php foreach ($images as $image) { ?>
            <?php if (isset($image["file"]) && $image["file"] instanceof File) { ?>
                <?php $fv = $image["file"]->getApprovedVersion(); ?>

                <?php if ($fv instanceof Version) { ?>
                    <img src="<?php echo h($fv->getURL()) ?>" title="<?php echo h($fv->getTitle()); ?>"/>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </a>
</div>