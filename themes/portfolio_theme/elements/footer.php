<?php

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Area\Area;
use Concrete\Core\Page\Page;
use Concrete\Core\View\View;

/** @var Page $c */
/** @var View $view */

?>

    <footer>
        <?php
        $a = new Area('Footer Navigation');
        $a->display();
        ?>
    </footer>

<?php $this->inc("elements/footer_bottom.php"); ?>