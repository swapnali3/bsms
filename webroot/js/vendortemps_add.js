$('#OpenImgUpload').click(function () { $('#vendorCodeInput').trigger('click'); });

var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

$.validator.setDefaults({
    submitHandler: function() {
      $.ajax({
        type: "POST",
        url: addurl,
        data: $("#addvendorform").serialize(),
        dataType: 'json',
        success: function(response) {
          console.log(response);
          if (response.status == 'success') {
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

        }
      });
      return false;
    }
  });

$('#addvendorform').validate({
    rules: {
        name: { required: true },
        mobile: { required: true, number: true },
        email: { required: true },
        payment_term: { required: true },
        purchasing_organization_id: { required: true },
        account_group_id: { required: true },
        schema_group_id: { required: true }
    },
    messages: {
        name: { required: "Please provide name" },
        mobile: { required: "Please provide mobile", number: "Please enter a valid number" },
        email: { required: "Please provide email" },
        payment_term: { required: "Please select payment_term" },
        purchasing_organization_id: { required: "Please select Purchasing Organization" },
        account_group_id: { required: "Please select Account Group" },
        schema_group_id: { required: "Please select Schema Group" }
    },

    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) { $(element).addClass('is-invalid'); },
    unhighlight: function (element, errorClass, validClass) { $(element).removeClass('is-invalid'); },
});
