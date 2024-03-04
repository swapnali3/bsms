// function showConfirmationModal() {
//   $('#modal-sm').modal('show');
// }

function validateForm() {
  var isValid = true;

  $('.form-field').each(function () {
      var input = $(this);
      var errorContainer = input.next('.text-danger');
      var errorMessage = '';

      if (input.attr('type') === 'date' && !input.val()) {
          errorMessage = 'Please enter a date.';
          isValid = false;
      } else if (input.val() === '') {
          errorMessage = 'This field is required.';
          isValid = false;
      }

      errorContainer.text(errorMessage).toggle(!!errorMessage);
  });

  return isValid;
}

function showConfirmationModal() {
  if (validateForm()) {
      $('#modal-sm').modal('show');
  }
}

// $('#OpenImgUpload').click(function () { $('#vendorCodeInput').trigger('click'); });

// $('#vendorCodeInput').change(function () {
//   var file = $(this).prop('files')[0].name;
//   $("#filessnames").append(file);
// });

$('#OpenImgUpload').click(function() {
  $('#vendorCodeInput').trigger('click');
});
$('#vendorCodeInput').change(function () {
  var file = $(this).prop('files')[0];
  var fileName = file ? file.name : '';

  $('#OpenImgUpload').text(fileName ?  fileName : 'Choose File');
});

setTimeout(function() {
  $('.success').fadeOut('slow');
}, 2000);

$('#sapvendorcodeform').on('submit', function() {
  $('#sapvendorcode').trigger('reset');
});


$('#sapvendorInputForm').on('submit', function() {
  $('#sapvendorInput').trigger('reset');
});
