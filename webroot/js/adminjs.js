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

$("#adminuserview").DataTable({
    ajax: {
        url: "http://localhost/bsms/admin/dashboard/userView",
        dataSrc: "",
    },
    columns: [
        { data: "first_name" },
        { data: "last_name" },
        { data: "username" },
        { data: "mobile" },
        { data: "group_id" },
    ],
});

$(document).ready(function () {
    $("#userForm").validate({
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            username: {
                required: true,
                email: true,
            },
            mobile: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 10
            },
            group_id: {
                required: true,
            },
        },
        messages: {
            first_name: {
                required: "Please enter a first name",
            },
            last_name: {
                required: "Please enter a last name",
            },
            username: {
                required: "Please enter an email",
                email: "Please enter a valid email address",
            },
            mobile: {
                required: "Please enter a mobile number",
                number: "Please enter a valid mobile number",
            },
            group_id: {
                required: "Please select a user group",
            },
        },
        errorElement: "span",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
        },
        submitHandler: function (form, event) {
            event.preventDefault();
            //$("#userForm")[0].submit();

            return false;
        },
    });

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

    $("#userForm").submit(function (e) {
        e.preventDefault();
    //   $.validator.setDefaults({
    //         submitHandler: function () {
        var formdatas = new FormData($("#userForm")[0]);

        $.ajax({
            type: "POST",
            url: "http://localhost/bsms/admin/dashboard/userAdd",
            data: $("#userForm").serialize(),
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response.status == "1") {


                    Toast.fire({
                        icon: "success",
                        title: response.message,
                    });
                } else {
                    Toast.fire({
                        icon: "error",
                        title: response.message,
                    });
                }
            },
        });
   
    //      },
    //  });
    });
});
