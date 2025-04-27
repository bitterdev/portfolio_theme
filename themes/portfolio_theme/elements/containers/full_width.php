<?php
defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Area\ContainerArea;

?>

<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                $area = new ContainerArea($container, 'Column 1');
                $area->display($c);
                ?>
            </div>
        </div>
    </div>
</section>