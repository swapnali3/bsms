// $(document).on("click", ".save", function () {
//     var id = $(this).data('id');
//     var confirmprd = $("#confirmprd" + id).val();
//     $.ajax({
//         type: "GET",
//         url: getConfirmedProductionUrl + "/" + id + "/" + confirmprd,
//         contentType: "application/x-www-form-urlencoded; charset=utf-8",
//         dataType: "json",
//         async: false,
//         beforeSend: function () { $("#gif_loader").show(); },
//         success: function (resp) {
//             if(resp.status){
//                 $("#confirmprd"+id).attr('disabled', true);
//                 $("#confirmsave"+id).remove();
//                 Toast.fire({
//                     icon: 'success',
//                     title: resp.message
//                 });
//             }
//         },
//         complete: function () { $("#gif_loader").hide(); }
//     });
// });

$(document).on("click", ".save", function () {
    var id = $(this).data('id');
    var confirmprd = $("#confirmprd" + id).val();

    if (!/^\d+$/.test(confirmprd)) {
        $("#validationMessage" + id).text("Enter valid numeric value.").show();

        $("#confirmprd" + id).addClass('is-invalid');
    } else {
        $("#validationMessage" + id).hide();

        $("#confirmprd" + id).removeClass('is-invalid');

        $('#modal-sm').modal('show');
    }
});

$('#confirmOkButton').on('click', function () {
    var id = $(".save").data('id');
    var confirmprd = $("#confirmprd" + id).val();

    $.ajax({
        type: "GET",
        url: getConfirmedProductionUrl + "/" + id + "/" + confirmprd,
        contentType: "application/x-www-form-urlencoded; charset=utf-8",
        dataType: "json",
        async: false,
        beforeSend: function () { $("#gif_loader").show(); },
        success: function (resp) {
            if (resp.status) {
                $("#confirmprd" + id).attr('disabled', true);
                $("#confirmsave" + id).remove();

                $("#confirmprd" + id).removeClass('is-invalid');

                Toast.fire({
                    icon: 'success',
                    title: resp.message
                });
            }
        },
        complete: function () {
            $("#gif_loader").hide();
            $('#modal-sm').modal('hide');
        }
    });
});


const fileInput = document.getElementById("bulk_file");
    const uploadButton = document.getElementById("OpenImgUpload");

    fileInput.addEventListener("change", function () {
        if (this.files.length > 0) {
            const fileName = this.files[0].name;
            uploadButton.innerText = `${fileName}`;
        } else {
            uploadButton.innerText = "Upload File";
            fileNameDisplay.innerText = "";
        }
});