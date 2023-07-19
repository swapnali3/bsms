$("#newrfqlist").DataTable({
    "responsive": false, "lengthChange": false, "autoWidth": false,
    "ordering": false,
    "searching": false,
    "paging": false

  });

  $("#respondedrfqlist").DataTable({
    "responsive": false, "lengthChange": false, "autoWidth": false,
    "ordering": false,
    "searching": false,
    "paging": false

  });

  $('#newrfqlist, #respondedrfqlist').on('click', 'tbody tr', function () {
    window.location = $(this).closest('tr').attr('redirect');
  });