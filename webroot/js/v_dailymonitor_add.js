function showConfirmationModal() {
  $('#modal-sm').modal('show');
}

$('#OpenImgUpload').click(function () { $('#vendorCodeInput').trigger('click'); });

$('#vendorCodeInput').change(function () {
  var file = $(this).prop('files')[0].name;
  $("#filessnames").append(file);
});