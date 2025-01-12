var dtable;

// $(".chosen").multiselect({
//     enableClickableOptGroups: false,
//     enableCollapsibleOptGroups: false,
//     enableFiltering: true,
//     includeSelectAllOption: false,
//     buttonText: function (options, select) {
//         if (options.length === 0) {
//             return 'Select';
//         }
//         // else if (options.length > 1) {
//         //     return options.length + 'Filter';
//         // }
//         else {
//             var labels = [];
//             options.each(function () {
//                 if ($(this).attr('data-select') !== undefined) {
//                     labels.push($(this).attr('data-select'));
//                 }
//                 else {
//                     labels.push($(this).html());
//                 }
//             });
//             return labels.join(', ');
//         }
//     }

// });

$('.chosen').select2({
    closeOnSelect : false,
    placeholder: 'Select',
    allowClear: true,
    tags: false,
    tokenSeparators: [','],
    templateSelection: function(selection) {
        if (selection.element && $(selection.element).attr('data-select') !== undefined) {
            return $(selection.element).attr('data-select');
        } else {
            return selection.text;
        }
    }
});

$(document).on("click", "#reload_stocks", function () {
    $.ajax({
        type: "get",
        url: "<?php echo \Cake\Routing\Router::url(array('prefix' => false, 'controller' => 'api/sync', 'action' => 'get-material-min-stock')); ?> ",
        dataType: 'json',
        beforeSend: function () { $("#gif_loader").show(); },
        success: function (response) {
            console.log(response);
            if (response.status == '1') {
                Toast.fire({
                    icon: 'success',
                    title: response.message
                });

                table.clear().rows.add(response.data).draw();
            } else {
                Toast.fire({
                    icon: 'error',
                    title: response.message
                });
            }

        },
        complete: function () { $("#gif_loader").hide(); }
    });
});

$(function () {
    dtable = $("#example1").DataTable({
        "paging": true,
        "responsive": false,
        "lengthChange": false,
        "autoWidth": false,
        "searching": true,
        "ordering": true,
        "destroy": true,
        dom: 'Blfrtip',
        buttons: [{ extend: 'copy' }, { extend: 'excelHtml5', text: 'Export', title:'' }]
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
                url: materiallist_url,
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

    $("#id_sub").trigger("click");
});