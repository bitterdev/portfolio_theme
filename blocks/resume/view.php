<?php

use Concrete\Core\Page\Page;
use Concrete\Core\Support\Facade\Url;

defined('C5_EXECUTE') or die('Access denied');

/** @var string|null $title */
/** @var string|null $description */
/** @var int|null $targetPage */
/** @var string|null $buttonText */
/** @var array $items */

?>

<div class="resume-row">
    <?php foreach ($items as $item) { ?>
        <div class="resume-box">
            <i class="theme-bg fa fa-briefcase"></i>

            <label class="theme-bg theme-color">
                <?php echo $item["yearFrom"]; ?> - <?php echo $item["yearTo"]; ?>
            </label>

            <span><?php echo $item["company"]; ?></span>

            <p>
                <?php echo nl2br($item["description"]); ?>
            </p>
        </div>
    <?php } ?>
</div>
