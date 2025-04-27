<?php

defined('C5_EXECUTE') or die('Access denied');

use Concrete\Core\Application\Service\UserInterface;
use Concrete\Core\Support\Facade\Application;
use Concrete\Core\Form\Service\Form;
use Concrete\Core\View\View;

/** @var array $items */

$app = Application::getFacadeApplication();
/** @var Form $form */
$form = $app->make(Form::class);
/** @var UserInterface $ui */
$ui = $app->make(UserInterface::class);

View::element("dashboard/help_blocktypes", [], "portfolio_theme");
?>

<div id="items-container"></div>

<a href="javascript:void(0);" class="btn btn-primary" id="ccm-add-item">
    <?php echo t("Add Item"); ?>
</a>

<script id="item-template" type="text/template">
    <div class="testimonial-item">
        <div class="form-group">
            <label for="yearFrom-<%=id%>">
                <?php echo t("Year From"); ?>
            </label>

            <input type="number" value="<%=yearFrom%>" id="yearFrom-<%=id%>" name="items[<%=id%>][yearFrom]"
                   class="form-control" min="0" step="1"/>
        </div>

        <div class="form-group">
            <label for="yearTo-<%=id%>">
                <?php echo t("Year To"); ?>
            </label>

            <input type="number" value="<%=yearTo%>" id="yearTo-<%=id%>" name="items[<%=id%>][yearTo]"
                   class="form-control" min="0" step="1"/>
        </div>

        <div class="form-group">
            <label for="company-<%=id%>">
                <?php echo t("Company"); ?>
            </label>

            <input type="text" value="<%=company%>" id="company-<%=id%>" name="items[<%=id%>][company]"
                   class="form-control" maxlength="255"/>
        </div>

        <div class="form-group">
            <label for="description-<%=id%>">
                <?php echo t("Description"); ?>
            </label>

            <textarea id="description-<%=id%>" name="items[<%=id%>][description]"
                      class="form-control"><%=description%></textarea>
        </div>

        <a href="javascript:void(0);" class="btn btn-danger">
            <?php echo t("Remove Item"); ?>
        </a>
    </div>
</script>

<style type="text/css">
    .testimonial-item {
        border: 1px solid #dadada;
        background: #f9f9f9;
        padding: 15px;
        margin-bottom: 15px;
    }
</style>

<script type="text/javascript">
    (function ($) {
        var nextInsertId = 0;
        var items = <?php echo json_encode($items);?>;

        var addItem = function (data) {
            var defaults = {
                id: nextInsertId
            };

            var combinedData = {...defaults, ...data};

            var $item = $(_.template($("#item-template").html())(combinedData));

            nextInsertId++;

            $item.find(".btn-danger").click(function () {
                $(this).parent().remove();
            });

            $("#items-container").append($item);
        };

        for (var item of items) {
            addItem(item);
        }

        $("#ccm-add-item").click(function (e) {
            e.preventDefault();
            addItem({
                yearFrom: "",
                yearTo: "",
                company: "",
                description: ""
            });
            return true;
        });
    })(jQuery);
</script>