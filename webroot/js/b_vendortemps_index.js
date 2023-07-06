var currentchat;

function communication(id = null) {
    
    $.ajax({
        type: "GET",
        url: userComm + "/index/vendor_temps/" + id,
        dataType: "json",
        success: function (response) {
            var count = 0;
            $("#id_oldmsg").empty();
            $.each(response, function (index, row) {
                var ndiv = "";
                ndiv =
                    `<div class="card card-widget">
                <div class="card-header">
                    <div class="user-block">
                        <img class="img-circle" src="..\\img\\U.png" alt="User Image" style="width: 40px; height: auto;">
                        <span class="username">` +
                    row["fullname"] +
                    `</span>
                        <span class="description">` +
                    row["updateddate"] +
                    `</span>
                    </div>
              
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" id="minimise` +
                    row["id"] +
                    `" data-card-widget="collapse">
                        <i class="fas fa-minus mt-4"></i>
                    </button> 
                    </div>
                </div>
                <div class="card-body" style="display: block;margin: 6px 24px;">
                <p>` +
                    row["message"] +
                    `</p>
            </div>
            </div>`;

                $("#id_oldmsg").append(ndiv);
                count++;
                if (count != 1) {
                    $("#minimise" + row["id"]).trigger("click");
                }
            });
        },
    });
}

$(document).ready(function () {
    setTimeout(function () {
        $(".success").fadeOut("slow");
    }, 2000); // <-- time in milliseconds

    $("#example1").DataTable({
        responsive: false,
        lengthChange: false,
        autoWidth: true,
        searching: false,
        ordering: false,
    });
});

$("#example1").on("click", "td", function () {
    if ($(this).attr("redirect")) {
        window.location = $(this).attr("redirect");
    }
});

$("#add_comm").click(function (e) {
    e.preventDefault(); // Prevent the default form submission

    var formdata = new FormData($("#communiSubmit")[0]);

    var table_name = "vendor_temps";
    formdata.append("table_name", table_name);
    formdata.append("app_id", currentchat);
    formdata.append("group_id", "2");

    $.ajax({
        type: "POST",
        url: userCommadd,
        data: formdata,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            if (response.status == "1") {
                $("#id_oldmsg").empty();
                communication(currentchat);
                // $("#summernote").text('');
                $('#summernote').summernote('reset');
            } else {
            }
        },
    });
});

$(document).on("click", ".chatload", function () {
//    var name =  $('.tableName').text();
//    var email = $('.tableEmail').text();

   $("#id_chatuser").html($(this).data('name'));

//    $(".nameView").text(name);
//    $(".emailView").text(email);
    
    currentchat = $(this).data("value");
    communication(currentchat);
});
