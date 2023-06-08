$(document).on("click", ".switchcard", function () {
    $(".landing, .usermgm").hide();
    $(".setting, .sidecard").show();
});

$(document).on("click", ".usermgm", function () {
    $(".landing, .setting").hide();
    $(".usermgm, .sidecard").show();
});