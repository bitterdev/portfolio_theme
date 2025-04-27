<?php
defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Area\ContainerArea;

?>

<section id="contact" class="section contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <div class="contact-info">
                    <div class="ci-row">
                        <?php
                        $area = new ContainerArea($container, 'Column 1');
                        $area->display($c);
                        ?>
                    </div>

                    <div class="ci-row">
                        <?php
                        $area = new ContainerArea($container, 'Column 2');
                        $area->display($c);
                        ?>
                    </div>

                    <div class="ci-row">
                        <?php
                        $area = new ContainerArea($container, 'Column 3');
                        $area->display($c);
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-8">
                <div class="contact-form">
                    <?php
                    $area = new ContainerArea($container, 'Column 4');
                    $area->display($c);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>