$().ready(function () {
  $("#login-form").validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5,
      },
    },
  });
});

// Sign up form validation
jQuery.validator.addMethod(
  "lettersonly",
  function (value, element) {
    return this.optional(element) || /^[a-z\s]+$/i.test(value);
  },
  "Only alphabetical characters"
);

$().ready(function () {
  $("#register-form").validate({
    rules: {
      name: {
        required: true,
        minlength: 4,
        lettersonly: true,
      },
      lastname: {
        required: true,
        minlength: 4,
        lettersonly: true,
      },
      birthdate: {
        required: true,
        date: true,
      },
      personalnumber: {
        required: true,
        digits: true,
      },
      phone: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5,
      },
    },
    messages: {
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long",
      },
    },
  });
});
