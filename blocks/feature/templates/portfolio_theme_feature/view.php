<?php defined('C5_EXECUTE') or die("Access Denied.");

/** @var string|null $title */
/** @var string|null $titleFormat */
/** @var string|null $paragraph */
/** @var string|null $iconTag */

?>

<div class="feature-box">
    <div class="icon theme-bg">
        <?php echo $iconTag ?>
    </div>

    <div class="feature-content">
        <?php if ($title) {
            echo sprintf(
                "<%s>%s</%s>",
                $titleFormat,
                $title,
                $titleFormat);
        }

        if ($paragraph) {
            echo $paragraph;
        } ?>
    </div>
</div>