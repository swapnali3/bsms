var chatdata;
function chat(modalBody, sender_id, url, table_name = null, table_pk = null, mt3 = null) {
    $.ajax({
        type: "GET",
        url: url + "/index/" + table_name + "/" + table_pk,
        dataType: "json",
        success: function (resp) {
            if (resp.length > 0) {
                chatdata = resp;
                $("#" + modalBody).empty();
                $.each(resp, function (index, row) {
                    $("#" + modalBody).html(`<div class="card card-widget">
                                                <div class="card-header">
                                                    <div class="user-block">
                                                        <img class="img-circle" src="`+ baseurl + `/img/` + Array.from(row['fullname'])[0] + `.png" alt="User Image">
                                                        <span class="username">` + row['fullname'] + `</span>
                                                        <span class="description">` + row['updateddate'] + `</span>
                                                    </div>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool `+ mt3 + `" id="minimise` + row['id'] + `" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>         
                                                </div>
                                            </div>
                                            <div class="card-body" style="display: block;margin: 6px 24px;"><p>` + row['message'] + `</p></div>
                                            </div>`);
                    if (index != 0 && (row['seen'] == "1" || row['sender_id'] != sender_id)) { $("#minimise" + row["id"]).trigger("click"); }
                });
            }
            return resp;
        },
    });
}

function sendchat(posturl, formdata, modalBody, sender_id, geturl, mt3 = null, editor_id = "summernote") {
    $.ajax({
        type: "POST",
        url: posturl,
        data: formdata,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (resp) {
            if (resp.status == "1") {
                chat(modalBody, sender_id, geturl, resp.data[0].table_name, resp.data[0].table_pk, mt3);
                $('#' + editor_id).summernote('reset');
            }
        },
    });
}

function getbadge(sender_id, url, table_name, table_pk, badge = null) {
    $.ajax({
        type: "GET",
        url: url + "/index/" + table_name + "/" + table_pk,
        dataType: "json",
        async: false,
        success: function (resp) {
            var unread = 0;
            if (resp.length > 0) {
                $.each(resp, function (index, row) { if (row['seen'] == 0 && row['sender_id'] == sender_id) { unread++; } });
            }
            if (badge != null) { $("#" + badge).prepend(unread + " "); }
            // return unread;
        },
    });
}