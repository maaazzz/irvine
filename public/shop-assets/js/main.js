$(document).ready(function () {
    /** Toggle Product Filter **/
    $("#show-filter").click(function () {
        $(".product-filter").toggleClass("show");
    });

    /** Cart Step **/
    var current_tab, next_tab, previous_tab;
    $(".next-step").click(function (e) {
        e.preventDefault();

        current_tab = $(".step-card:visible");
        next_tab = $(".step-card:visible").next();

        $("#step-progress span").eq($("fieldset").index(next_tab)).addClass("on");
        // $("#step-progress span").eq($("fieldset").index(current_tab)).removeClass("on");

        next_tab.show();
        current_tab.hide();

    });

    $(".previous-step").click(function (e) {
        e.preventDefault();

        current_tab = $(".step-card:visible");
        previous_tab = $(".step-card:visible").prev();

        $("#step-progress span").eq($("fieldset").index(current_tab)).removeClass("on");
        // $("#step-progress span").eq($("fieldset").index(previous_tab)).addClass("on");

        previous_tab.show();
        current_tab.hide();

    });


});