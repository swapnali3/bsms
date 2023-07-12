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
        success: function (r) {
            if (r.status) {
                $("#sendcred" + userid).remove();
                $("#halfapproved" + userid).attr('class', 'badge lgreenbadge');
            } // else { Toast('warning', r.message); }
        }
    });
});
