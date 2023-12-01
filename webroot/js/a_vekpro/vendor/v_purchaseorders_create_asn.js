$('#OpenImgUpload').click(function () { $('#imgupload').trigger('click'); });

$(document).on('click', '#continueSub', function () {
    $('.checkBoxClass').each(function () { if ($(this).is(':checked')) { $("#qty" + $(this).data("id")).attr("name", "footer_id_qty[]") } });
    $('#asnForm').submit();
});

$(document).on("click", ".flu", function () {
    if ($(this).data('alt') == '+') { $(this).data('alt', '-').empty().append('Remove'); }
    else { $(this).data('alt', '+').empty().append('add'); }
});

$(document).on('click', 'div.details-control', function () {
    $('div.details-control').removeClass('active');
    $(this).addClass('active');
    $(".continue_btn").removeClass('btn-success').attr('disabled', 'disabled');
    $("#po_header_id").val($(this).attr('header-id'));
    format($(this).attr('header-id'));
});

$(document).on("click", "#ckbCheckAll", function () {
    if (this.checked) {
        $('.checkBoxClass').each(function (key, val) {
            if ($("#qty" + $(val).data("id")).val() == 0) { $("#qty" + $(val).data("id")).val($(val).data("pendingqty")); }
            this.checked = true;
            $("#select" + $(this).data("id")).trigger("change");
            $("#qty" + $(this).data("id")).removeAttr("disabled"); 
        });
    } else {
        $('.checkBoxClass').each(function () {
            $("#qty" + $(this).data("id")).val('0');
            this.checked = false;
            $("#select" + $(this).data("id")).trigger("change");
            $("#qty" + $(this).data("id")).attr("disabled", "disabled"); 
        });
    }
    if ($('.checkBoxClass:checked').length) { $(".continue_btn").addClass('btn-success').removeAttr('disabled').removeClass('btn-secondary'); }
    else { $(".continue_btn").addClass('btn-secondary ').removeClass('btn-success').attr('disabled', 'disabled'); }
});

$(document).on("change", ".checkBoxClass", function () {
    if ($(this).is(':checked')) { if ($("#qty" + $(this).data("id")).val() == "0" || $("#qty" + $(this).data("id")).val() == "") { 
        $("#qty" + $(this).data("id")).removeAttr("disabled"); 
        $("#qty" + $(this).data("id")).val($(this).data("pendingqty")); } }
    else { $("#qty" + $(this).data("id")).attr("disabled", "disabled");  $("#qty" + $(this).data("id")).val(''); }
});

$(document).on("change", ".checkBoxClass", function () {
    if ($('.checkBoxClass:checked').length == $('.checkBoxClass').length) { $('#ckbCheckAll').prop('checked', true); }
    else { $('#ckbCheckAll').prop('checked', false); }
    if ($('.checkBoxClass:checked').length) { $(".continue_btn").addClass('btn-success').removeAttr('disabled').removeClass('btn-secondary'); }
    else { $(".continue_btn").addClass('btn-secondary ').removeClass('btn-success').attr('disabled', 'disabled'); }
});

$(document).on("change focusout", ".check_qty", function () { if ($(this).val() > $(this).data('max')) { $(this).val($(this).data('max')) } });



$('.search-box').on('keyup', function (event) {
    //if (event.which === 13) {
      var searchName = $(this).val();
      $(".related tbody").empty().append(`<tr>
          <td colspan="7" class="text-center">
            <p>No data found !</p>
          </td>
        </tr>`);
        searchPo(searchName);
      //return false;
    //}
  });



function format(rowData) {
    $.ajax({
        type: "GET",
        url: get_po_data + "/" + rowData,
        contentType: "application/x-www-form-urlencoded; charset=utf-8",
        dataType: "json",
        async: false,
        beforeSend: function () { $("#gif_loader").show(); },
        success: function (response) {
            if (response.status == 1) {
                $(".card-header").html(`
                <table class="table table-bordered material-list">
                    <thead>
                        <tr>   
                        <th>Sap Vendor Code</th>
                        <th>Po No</th>
                        <th>Document Type</th>
                        <th>Created By</th>
                        <th>Created On</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>`+ response.data[0].sap_vendor_code + `</td>
                        <td>`+ response.data[0].po_no + `</td>
                        <td>`+ response.data[0].document_type + `</td>
                        <td>`+ response.data[0].created_by + `</td>
                        <td>`+ response.data[0].created_date + `</td>
                    </tr></tbody>
                </table>`);

                var tbody = ``;
                $.each(response.data, function (key, val) {
                    var curr = (val.current_stock == null ? 0 : parseFloat(val.current_stock));
                    var mins = (val.minimum_stock == null ? 0 : parseFloat(val.minimum_stock));
                    var isExpired = (val.is_expired == null ? 0 : val.is_expired);
                    var actQty = parseFloat(val.actual_qty);
                    maxQty = actQty + actQty * 0.05;
                    if (maxQty > curr || curr == 0) { maxQty = curr; }
                    var chekbox = ``;
                    var style="";
                    if(isExpired == "1") {
                        var style="style='background-color:#f44336;'";
                    }else if (curr != 0) {
                        chekbox = `<input type="checkbox" name="footer_id[]" value="` + val['PoFooters'].id + `" style="max-width: 20px;" class="form-control form-control-sm checkBoxClass"  data-pendingqty="` + val.actual_qty + `" data-id="` + val['PoItemSchedules'].id + `">`;
                    }
                    if (val.minimum_stock == null) { mins = `<i class="text-danger fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Define Minimum Stock"></i>` }
                    if (val.current_stock == null) { curr = `<i class="text-danger fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Define Current Stock"></i>` }
                    else if (curr < mins) { curr = `<i class="text-warning fas fa-exclamation-triangle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Maintain Minimum Stock"></i> &nbsp; ` + curr }
                    tbody += `<tr `+style+`><td>` + chekbox + `</td>
                     <td>`+ val['PoFooters'].item + `</td>
                     <td>`+ val['PoFooters'].material + `</td>
                     <td>` + val.delivery_date + `</td>
                     <td>`+ val['PoFooters'].short_text + `</td>
                     <td>`+ actQty + ` ` + val['PoFooters'].order_unit + `</td>
                     <td>`+ curr + `</td>
                     <td>`+ mins + `</td>
                     <td><input type="number" name="footer_id_qty[]" disabled class="form-control form-control-sm check_qty" data-max="` + maxQty + `" max="` + maxQty + `" required="required" data-item="` + val['PoFooters'].item + `" id="qty` + val['PoItemSchedules'].id + `" value="0"></td>
                    </tr>`;
                });

                var thead = `<table class="table table-bordered material-list" id="example2">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="form-control form-control-sm" style="max-width: 20px;" id="ckbCheckAll">
                        </th>
                        <th>Item</th>
                        <th>Material</th>
                        <th>Delivery Date</th>
                        <th>Short Text</th>
                        <th>Pending Qty</th>
                        <th>Current Stock</th>
                        <th>Minimum Stock</th>
                        <th>Set Delivery Qty</th>
                    </tr>
                </thead>
                <tbody>`+ tbody + `</tbody>
                </table>`;
                $(".right-side").html(thead);
                $('[data-toggle="tooltip"]').tooltip();
            }
        },
        complete: function () { $("#gif_loader").hide(); }
    });
}

function poform(search = "", createAsn = "as") {
    $("#poItemss").empty();
    $(".right-side tbody:first").show();
    if (search != "") { get_po_for_asn += "/" + search }
    $.ajax({
        type: "GET",
        url: get_po_for_asn,
        dataType: 'json',
        beforeSend: function () { $("#gif_loader").show(); },
        success: function (response) {
            if (response.status) {
                $.each(response.data, function (key, val) {
                    $("#poItemss").append(`<div class="po-box details-control  ponum" header-id="` + val.id + `">
                                            <p class="po-no mb-0">PO No.</p>
                                            <b class="text-info">` + val.po_no + `</b>
                                        </div>`);
                });
                $('div.details-control:first').click();
            }
        },
        complete: function () { $("#gif_loader").hide(); }
    });
}

function searchPo(search = "") {
    $("#poItemss").html('');
    $(".right-side tbody:first").show();
    $.ajax({
        type: "GET",
        url: get_po_for_asn + "/" +search,
        dataType: 'json',
        beforeSend: function () { $("#gif_loader").show(); },
        success: function (response) {
            if (response.status) {
                $.each(response.data, function (key, val) {
                    $("#poItemss").append(`<div class="po-box details-control  ponum" header-id="` + val.id + `">
                                            <p class="po-no mb-0">PO No.</p>
                                            <b class="text-info">` + val.po_no + `</b>
                                        </div>`);
                });
                $('div.details-control:first').click();
            }
        },
        complete: function () { $("#gif_loader").hide(); }
    });
}

$(document).ready(function () {
    poform();
    $('div.details-control:first').click();
});
