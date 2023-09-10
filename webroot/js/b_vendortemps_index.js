var currentchat, sender_id, table_pk;

$(document).on("click", "#add_comm", function () {
    // e.preventDefault();
    var formdata = new FormData($("#communiSubmit")[0]);
    formdata.append("table_name", "vendor_temps");
    resp = sendchat(postchaturl, formdata, $(this).data('modal_body'), $(this).data('sender_id'), getchaturl, "mt-2");
});

$(document).ready(function () {
    $(".chatload").each(function () { getbadge($(this).data('sender_id'), getchaturl, "vendor_temps", $(this).data('table_pk'), 'unread' + $(this).data('table_pk')) });
    // setTimeout(function () { $(".success").fadeOut("slow"); }, 2000);
    $("#example1").DataTable({
        responsive: false,
        lengthChange: false,
        autoWidth: true,
        searching: false,
        ordering: false,
    });
});

$("#example1").on("click", "td", function () { if ($(this).attr("redirect")) { window.location = $(this).attr("redirect"); } });

$(document).on("click", ".chatload", function () {
    chat($(this).data('modalbody'), $(this).data('sender_id'), getchaturl, $(this).data('table_name'), $(this).data('table_pk'), "mt-2");
    $("#id_sender_id").val($(this).data('sender_id'));
    $("#id_group_id").val($(this).data('sender_group_id'));
    $("#id_table_pk").val($(this).data('table_pk'));
    $("#add_comm").attr('data-modal_body', $(this).data('modalbody')).attr('data-sender_id', $(this).data('sender_id'));
});

$(document).on("click", ".sendcred", function () {
    var userid = $(this).data('id');
    $.ajax({
        type: "GET",
        url: sendmemail + "/" + userid,
        dataType: 'json',
        beforeSend: function () { $("#gif_loader").show(); },
        success: function (r) {
            if (r.status) {
                $("#sendcred" + userid).remove();
                $("#halfapproved" + userid).attr('class', 'badge lgreenbadge');
            } // else { Toast('warning', r.message); }
        },
        complete: function () { $("#gif_loader").hide(); }
    });
});

var csrfToken = $('meta[name="csrfToken"]').attr('content');

$(document).on("click", ".vcheckbox", function () {
    var allcheck = true;
    var checked = unchecked = 0;
    $(".vcheckbox").each(function () { if (!$(this).is(':checked')) { allcheck = false; unchecked++; } else { checked++; } });
    if (allcheck) { $('#vcheckbox').prop('checked', true); }
    else { $('#vcheckbox').prop('checked', false); }
    if (checked > 0 && unchecked > 0) { $("#actionfooter").show(); }
    else if (checked == 0) { $("#actionfooter").hide(); }
});

$(document).on("click", ".bulkaction", function () {
    var status_id, user_arr = [];
    status_id = $(this).data('status_id');
    $(".vcheckbox").each(function () { if ($(this).is(':checked')) { user_arr.push($(this).data("user_id")) } });
    $.ajax({
        type: "POST",
        url: postactionurl,
        dataType: 'json',
        headers: { 'X-CSRF-Token': csrfToken },
        data: { 'status_id': status_id, 'user_arr': user_arr },
        success: function (resp) { }
    });
});


