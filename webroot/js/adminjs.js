$(document).on("click", "#settings", function () {
    $(".landing, .usermgm").hide();
    if($(this).data('prd') == 1){
        $(".prd_menu_setting, .prd_label").show();
        $(".dev_menu_setting, .dev_label").hide();
        $(".user-panel").html(`<div class="info"><a class="d-block">PRODUCTION</a></div>`);
    } else {
        $(".dev_menu_setting, .dev_label").show();
        $(".prd_menu_setting, .prd_label").hide();
        $(".user-panel").html(`<div class="info"><a class="d-block">DEVELOPMENT</a></div>`);
    }
    $(".setting, .sidecard").show();
});

$(document).on("click", ".usermgm", function () {
    $(".landing, .setting").hide();

    $(".usermgm, .sidecard").show();
});