import '@concretecms/bedrock/assets/bedrock/js/frontend';
import '@concretecms/bedrock/assets/forms/js/frontend';
import '@concretecms/bedrock/assets/imagery/js/frontend';

document.addEventListener("DOMContentLoaded", function () {
    if (CCM_EDIT_MODE) {
        return;
    }

    let $ul = $("<ul/>");

    $("#navbarNav a").each(function () {
        $ul.append($(this).clone().attr("class", "").wrap("<li/>").parent());
    });

    let $mobileNav = $ul.wrap($("<div/>").attr("id", "mobileNav"));

    $mobileNav.parent().appendTo(".ccm-page");

    if (typeof Tooltip !== "undefined") {
        document.querySelectorAll("div.certifications a").forEach((element) => {
            // noinspection JSCheckFunctionSignatures
            new Tooltip(element);
        });
    }

    // Burger-Button Animation
    $('.navbar-toggler').click(function () {
        $("#mobileNav").toggleClass("visible");
        $("body").toggleClass("navbar-open");
        $(this).toggleClass('open');
    });
});
