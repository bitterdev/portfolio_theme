<?php

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Area\Area;
use Concrete\Core\Page\Page;
use Concrete\Core\View\View;

/** @var Page $c */
/** @var View $view */

?>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="float-start">
                        <p class="copyright">
                            <?php
                            $a = new Area('Footer Copyright');
                            $a->display();
                            ?>
                        </p>
                    </div>

                    <div class="float-end">
                        <?php
                        $a = new Area('Footer Navigation');
                        $a->display();
                        ?>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </footer>

<?php $this->inc("elements/footer_bottom.php"); ?>