<?php
defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Area\ContainerArea;

?>

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <?php
            $area = new ContainerArea($container, 'Column 1');
            $area->display($c);
            ?>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <?php
            $area = new ContainerArea($container, 'Column 2');
            $area->display($c);
            ?>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <?php
            $area = new ContainerArea($container, 'Column 3');
            $area->display($c);
            ?>
        </div>
    </div>
</div>