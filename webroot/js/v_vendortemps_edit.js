$(function () {
    bsCustomFileInput.init();
});

$("#addressButton").click(function () {
    $("#modal-lg").modal("show");
});

$("#editAdress").click(function () {
    $("#modal-lg").modal("show");
});

// ================================same as adreess ================================

$("#checkboxPrimary1").on("change", function () {
    if ($(this).is(":checked")) {
        $("#register-office-country").val($("#id_country").val());
        $("#register-office-state").val($("#id_state").val());
        $("input[name='register_office[address1]']").val(
            $("input[name='address[address]']").val()
        );
        $("input[name='register_office[address2]']").val(
            $("input[name='address[address_2]']").val()
        );
        $("input[name='register_office[pincode]']").val(
            $("input[name='address[pincode]']").val()
        );
        $("input[name='register_office[city]']").val(
            $("input[name='address[city]']").val()
        );

        // $("#register-office-country").selectpicker("refresh");
        // $("#register-office-state").selectpicker("refresh");
    }
});

$('.fully_manufactured_radio').on("change", function () {
    if ($(this).val() === "no") {
        $(".sub-contractors-info").show();
    } else {
        $(".sub-contractors-info").hide();
    }
});

// ============================ Production facility js =========================

$('input[name="productionFacility[lab_facilities]"]').on("change", function () {
    if ($(this).val() === "yes") {
        $(".lab_facilities-info").show();
    } else {
        $(".lab_facilities-info").hide();
    }
});
