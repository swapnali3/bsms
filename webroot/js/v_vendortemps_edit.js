var branch_office = [0];
var today = new Date();
var year3 = today.getFullYear();
var year2 = year3 - 1;
var year1 = year2 - 1;
var year0 = year1 - 1;

$(function () {
    $("#productionyear3").text(year2 + '-' + year3);
    $("#productionyear2").text(year1 + '-' + year2);
    $("#productionyear1").text(year0 + '-' + year1);
    $(".placeholder3").attr('placeholder', year2 + ' - ' + year3);
    $(".placeholder2").attr('placeholder', year1 + ' - ' + year2);
    $(".placeholder1").attr('placeholder', year0 + ' - ' + year1);
    $(".year3").val(year2 + ' - ' + year3);
    $(".year2").val(year1 + ' - ' + year2);
    $(".year1").val(year0 + ' - ' + year1);
    bsCustomFileInput.init();
});

$(document).on("change", "#copypermanant", function () {
    if ($(this).is(":checked")) {
        $("#register_office_address1").val($("#id_permanent_address_address1").val());
        $("#register_office_address2").val($("#id_permanent_address_address2").val());
        $("#register_office_pincode").val($("#id_permanent_address_pincode").val());
        $("#register_office_city").val($("#id_permanent_address_city").val());
        $("#register_office_country").val($("#id_permanent_address_country").val());
        $("#register_office_state").val($("#id_permanent_address_state").val());
        $("#register_office_telephone").val($("#id_permanent_address_telephone").val());
        $("#register_office_faxno").val($("#id_permanent_address_faxno").val());
    } else {
        $("#register_office_address1").val('');
        $("#register_office_address2").val('');
        $("#register_office_pincode").val('');
        $("#register_office_city").val('');
        $("#register_office_country").val('');
        $("#register_office_state").val('');
        $("#register_office_telno").val('');
        $("#register_office_faxno").val('');
    }
});

$(document).on("click", ".fully_manufactured_radio", function () {
    if ($(this).val() === "no") {
        $(".sub-contractors-info").show();
    } else {
        $(".sub-contractors-info").hide();
        $("#other_manufacturer").val('');
    }
});

$(document).on("click", ".add", function () {
    var clas = $(this).data('class');
    var getarray = [];
    var lastid;
    $('.' + clas).each(function (i, obj) {
        lastid = $(obj).data('id');
        getarray.push(lastid);
    });
    var str = $("#" + clas + "_" + lastid).html();
    nextid = lastid + 1;
    str = str.replaceAll(clas + "_" + lastid + "_", clas + "_" + nextid + "_");
    str = str.replaceAll(" hide", "");
    str = str.replaceAll("[" + clas + "]" + "[" + lastid + "]", "[" + clas + "]" + "[" + nextid + "]");
    str = str.replaceAll('data-id="' + lastid + '"', 'data-id="' + nextid + '"');
    var delte = `<div class="col-sm-12 col-md-3 mt-4 pt-4">
        <span class="badge redbadge delete" data-toggle="tooltip"  data-id="0" data-placement="right" data-class="`+ clas + `" data-original-title="Delete Address">
            <i class="fas fa-trash"></i>
        </span>
    </div>`;
    $("." + clas + "_card_body").append('<div class="row ' + clas + ' ' + clas + '_' + nextid + '" data-id="' + nextid + '" id="' + clas + '_' + nextid + '">' + str + '</div><hr class="' + clas + '_' + nextid + '" style="border: revert;">');
});


$(document).on("click", ".showme", function () {
    var trigger = $(this).data('trigger');
    if ($(this).val() == trigger) {
        $("#" + $(this).data('show')).show();
    } else {
        $("#" + $(this).data('show')).hide();
    }
});

$(document).on("click", ".delete", function () {
    var nextid = $(this).data('id');
    var clas = $(this).data('class');
    var getarray = [];
    var lastid;
    $('.' + clas).each(function (i, obj) {
        lastid = $(obj).data('id');
        getarray.push(lastid);
    });
    if (getarray.length != 1) { $("." + clas + '_' + nextid).remove(); }
});
// $('input[name="productionFacility[lab_facilities]"]').on("change", function () {
//     if ($(this).val() === "yes") {
//         $(".lab_facilities-info").show();
//     } else {
//         $(".lab_facilities-info").hide();
//     }
// });
