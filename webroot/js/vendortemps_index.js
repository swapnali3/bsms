$(document).ready(function () {
    setTimeout(function () {
        $('.success').fadeOut('slow');
    }, 2000); // <-- time in milliseconds
    $("#example1").DataTable({
        "responsive": false, "lengthChange": false, "autoWidth": true,
        "ordering": false,
        'order': [[10, 'desc']],
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search..."
        },
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });
    $('#example1').on('click', 'tbody tr', function () {
        window.location = $(this).closest('tr').attr('redirect');
    });
    // $('.row').attr('style','width:110vw;')
});