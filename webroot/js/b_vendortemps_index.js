var currentchat, sender_id, table_pk;

// function communication(id = null) {
//     $.ajax({
//         type: "GET",
//         url: userComm + "/index/vendor_temps/" + id,
//         dataType: "json",
//         success: function (response) {
//             $("#id_oldmsg").empty();
//             chatdata = response;
//             var counts = 0;
//             $.each(response, function (index, row) {
//                 table_pk = row['table_pk'];
//                 var ndiv = `<div class="card card-widget">
//                         <div class="card-header">
//                             <div class="user-block">
//                                 <img class="img-circle" src="..\\..\\..\\img\\U.png" alt="User Image">
//                                 <span class="username">` + row['fullname'] + `</span>
//                                 <span class="description">` + row['updateddate'] + `</span>
//                             </div><div class="card-tools">
//                                 <button type="button" class="btn btn-tool" id="minimise` + row['id'] + `" data-card-widget="collapse">
//                                     <i class="fas fa-minus"></i>
//                                 </button>         
//                             </div>
//                         </div>
//                         <div class="card-body" style="display: block;margin: 6px 24px;"><p>` + row['message'] + `</p></div>
//                     </div>`;
//                 $("#id_oldmsg").append(ndiv);
//                 if (index != 0 && row['seen'] == "1") { $("#minimise" + row["id"]).trigger("click"); }
//                 if (row['seen'] == 0 && row['sender_id'] != user_id) {
//                     counts++; sender_id = row["sender_id"]; table_pk = row["table_pk"];
//                 }
//             });
//             $('#count-badge').text(counts);
//         },
//     });
// }

// $(document).on("click", ".chatload", function () {
//     //    var name =  $('.tableName').text();
//     //    var email = $('.tableEmail').text();

//     $("#id_chatuser").html($(this).data('name'));

//     //    $(".nameView").text(name);
//     //    $(".emailView").text(email);

//     currentchat = $(this).data("value");
//     communication(currentchat);
// });

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
