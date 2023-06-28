$("#profileUpdate").validate({
    rules: {
        address1: {
            required: true
        },
        contact_person: {
            required: true
        },
        contact_mobiles: {
            required: true
        },
        contact_email: {
            required: true,
            email: true
        },
        contact_department: {
            required: true
        },
        contact_designation: {
            required: true
        }
    },
    messages: {
        address1: {
            required: "Please enter an address"
        },
        contact_person: {
            required: "Please enter a contact person"
        },
        contact_mobiles: {
            required: "Please enter a contact mobile"
        },
        contact_email: {
            required: "Please enter a contact email",
            email: "Please enter a valid email address"
        },
        contact_department: {
            required: "Please enter a contact department"
        },
        contact_designation: {
            required: "Please enter a contact designation"
        }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    },
    submitHandler: function (form, event) {
        event.preventDefault();
        $('#profileUpdate')[0].submit();
        return false;
    }
});