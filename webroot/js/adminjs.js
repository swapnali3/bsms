$(document).on("click", ".settings", function () {
    hideframes();
    if ($(this).data("prd") == 1) {
        $(".prd_menu_setting, .prd_label").show();
        $(".dev_menu_setting, .dev_label").hide();
        $(".user-panel").html(
            `<div class="hello"></div><div class="info"><a class="d-block">PRODUCTION</a></div>`
        );
    } else {
        $(".dev_menu_setting, .dev_label").show();
        $(".prd_menu_setting, .prd_label").hide();
        $(".user-panel").html(
            `<div class="world"></div><div class="info"><a class="d-block">DEVELOPMENT</a></div>`
        );
    }
    $(".setting, .sidecard").show();
});

$(document).on("click", ".usermgm", function () {
    hideframes();
    $(".usermgm, .sidecard").show();
});

$(document).on("click", ".prd_user_view", function () {
    hideframes();
    $(".usermgm, .sidecard").show();
});

$(document).on("click", ".prd_user_add", function () {
    hideframes();
    $(".useradd, .sidecard").show();
});

$(document).on("click", ".menu_dashboard", function () {
    hideframes();
    $(".landing").show();
});

function hideframes() {
    $(".landing, .setting, .usermgm, .useradd, .sidecard").hide();
}

// $('#example').DataTable({
//     ajax: 'http://localhost/bsms/admin/dashboard/userView',
//     columns: [
//         { data: 'first_name' },
//         { data: 'last_name' },
//         { data: 'username' },
//         { data: 'mobile' },
//         { data: 'group_id' },
//     ],
// });


$(document).ready(function () {


    // $("#userForm").submit(function (e) {
    //     e.preventDefault();
    //     $.validator.setDefaults({
    //         submitHandler: function () {
    //             var formdatas = new FormData($("#userForm")[0]);


    //         },
    //     });
    // });
});
