
  $(document).ready(function () {
    $('#edit_profile_form').on('submit', function (event) {
      event.preventDefault();
      if ($('#user_new_password').val() != '') {
        if ($('#user_new_password').val() != $('#user_re_enter_password').val()) {
          $('#error_password').html('<label class="text-danger">Password Not Match</label>');
          return false;
        } else {
          $('#error_password').html('');
        }
      }
      $('#edit_prfile').attr('disabled', 'disabled');
      var form_data = $(this).serialize();
      $('#user_re_enter_password').attr('required', false);
      $.ajax({
        url: "edit_profile.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#edit_prfile').attr('disabled', false);
          $('#user_new_password').val('');
          $('#user_re_enter_password').val('');
          $('#message').html(data);
        }
      })
    });
  }); 

