var dtable;

$('.chosen').select2({
    closeOnSelect: false,
    placeholder: 'Select',
    allowClear: true,
    tags: false,
    tokenSeparators: [','],
    templateSelection: function (selection) {
        if (selection.element && $(selection.element).attr('data-select') !== undefined) {
            return $(selection.element).attr('data-select');
        } else {
            return selection.text;
        }
    }
});

dtable = $("#example1").DataTable({
    "paging": true,
    "responsive": false,
    "lengthChange": false,
    "autoWidth": false,
    "searching": true,
    "ordering": true,
    "destroy": true,
    dom: 'Blfrtip',
    buttons: [
        { extend: 'copy' },
        {
            extend: 'excel',
            text: 'Export',
            title : '',
            customize: function (xlsx) {
                // Modify the exported data here
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c[r^="G"]', sheet).each(function () {
                    // Convert date cells to text
                    if ($(this).attr('t') === 'd') {
                        $(this).attr('t', 's');
                    }
                });
            }
        }
    ],
});

$("#addvendorform").validate({
    rules: { vendor_code: { required: false, }, },
    messages: { vendor_code: { required: "Please enter a first name", }, },
    errorElement: "span",
    errorPlacement: function (error, element) {
        error.addClass("invalid-feedback");
        element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) { $(element).addClass("is-invalid"); },
    unhighlight: function (element, errorClass, validClass) { $(element).removeClass("is-invalid"); },
    submitHandler: function (form) {
        $.ajax({
            type: "POST",
            url: url_list,
            data: $("#addvendorform").serialize(),
            dataType: "json",
            beforeSend: function () { $("#gif_loader").show(); },
            success: function (response) {
                console.log(response);
                if (response.status) {
                    dtable.clear().draw();
                    dtable.rows.add(response.data).draw(); // Add new data
                    dtable.columns.adjust().draw();
                } else { dtable.clear().draw(); }
            },
            complete: function () { $("#gif_loader").hide(); }
        });
    },
});

$(document).on("click", ".cancel", function () {
    var value = $(this).attr('data-value');
    var action = $(this).attr('data-key');
    if (value != "") {
        $.ajax({
            type: "get",
            url: url_cancel + action + "/" + value,
            dataType: "json",
            beforeSend: function (xhr) {
                $("#gif_loader").show();
                xhr.setRequestHeader(
                    "Content-type",
                    "application/x-www-form-urlencoded"
                );
            },
            success: function (response) {
                if (response.status == "1") {
                    table.draw();
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: response.message
                    });
                }
            },
            error: function (e) {
                alert("An error occurred: " + e.responseText.message);
                console.log(e);
            },
            complete: function () { $("#gif_loader").hide(); }
        });
    }
});

$("#id_sub").trigger("click");
