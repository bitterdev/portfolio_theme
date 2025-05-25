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
    <?php foreach ($images as $image) { ?>
        <?php if (isset($image["file"]) && $image["file"] instanceof File) { ?>
            <?php $fv = $image["file"]->getApprovedVersion(); ?>

            <?php if ($fv instanceof Version) { ?>
                <?php $link = $fv->getAttribute("link"); ?>

                <?php if (strlen($link) > 0) { ?>
                    <a href="<?php echo h($link) ?>"
                       target="_blank" title="<?php echo h($fv->getTitle()); ?>">
                        <img src="<?php echo h($fv->getURL()) ?>" title="<?php echo h($fv->getTitle()); ?>"/>
                    </a>
                <?php } else { ?>
                    <img src="<?php echo h($fv->getURL()) ?>" title="<?php echo h($fv->getTitle()); ?>"/>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    <?php } ?>
</div>