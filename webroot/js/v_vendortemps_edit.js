$('#addressButton').click(function(){
    $('#modal-lg').modal('show');

});

$('#editAdress').click(function(){
    $('#modal-lg').modal('show');

});


$('input[name="fully_manufactured"]').on('change', function() {
    if ($(this).val() === '0') {
        $('.sub-contractors-info').show();
    } else {
        $('.sub-contractors-info').hide();
    }
});

// ============================ Production facility js =========================

$('input[name="lab_facilities"]').on('change', function() {
    if ($(this).val() === 'yes') {
        $('.lab_facilities-info').show();
    } else {
        $('.lab_facilities-info').hide();
    }
});
