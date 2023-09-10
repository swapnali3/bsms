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
    $("#example1").on("click", "tbody tr", function () {
        window.location = $(this).closest("tr").attr("redirect");
    });

    var Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
    });

    $(".notify").click(function (e) {
        e.preventDefault();

        var $id = $(this).attr("data-id");

        // alert($username);

        $.ajax({
            type: "GET",
            url: userView +"/"+$id,
            dataType: "json",
            beforeSend: function () { $("#gif_loader").show(); },
            success: function (response) {
                if (response.status == "1") {
                    Toast.fire({
                        icon: "success",
                        title: response.message,
                    });

                    //$(".statusVendor span").text("Approved");
                    $(".notify").hide();
                    $(".sapImport").text("Approved")
                      
                } else {
                    Toast.fire({
                        icon: "error",
                        title: response.message,
                    });
                }
            },
            complete: function () { $("#gif_loader").hide(); },
            error: function (xhr, status, error) {
                // Handle error case if needed
            },
        });
    });
    // $('.row').attr('style','width:110vw;')
});
