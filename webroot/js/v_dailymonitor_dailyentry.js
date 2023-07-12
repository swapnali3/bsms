$(document).on("click", ".save", function () {
    var id = $(this).data('id');
    var confirmprd = $("#confirmprd" + id).val();
    $.ajax({
        type: "GET",
        url: getConfirmedProductionUrl + "/" + id + "/" + confirmprd,
        contentType: "application/x-www-form-urlencoded; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (resp) {
            if(resp.status){
                $("#confirmprd"+id).attr('disabled', true);
                $("#confirmsave"+id).remove();
            }
        }
    });
});
