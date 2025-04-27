<?php
defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Area\ContainerArea;

?>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-4">
            <?php
            $area = new ContainerArea($container, 'Column 1');
            $area->display($c);
            ?>
        </div>

        <div class="col-md-12 col-lg-7 offset-lg-1">
            <?php
            $area = new ContainerArea($container, 'Column 2');
            $area->display($c);
            ?>
        </div>
    </div>
</div>