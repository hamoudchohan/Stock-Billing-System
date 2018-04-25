$(document).ready(function () {

      $('#add_button').click(function () {
        $('#user_form')[0].reset();
        $('.modal-title').html("<i class='fa fa-plus'></i> Add User");
        $('#action').val("Add");
        $('#btn_action').val("Add");
      });

      var userdataTable = $('#user_data').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          url: "user_fetch.php",
          type: "POST"
        },
        "columnDefs": [{
          "target": [4, 5],
          "orderable": false
        }],
        "pageLength": 25
      });

      $(document).on('submit', '#user_form', function (event) {
        event.preventDefault();
        $('#action').attr('disabled', 'disabled');
        var form_data = $(this).serialize();
        $.ajax({
          url: "user_action.php",
          method: "POST",
          data: form_data,
          success: function (data) {
            $('#user_form')[0].reset();
            $('#userModal').modal('hide');
            $('#alert_action').fadeIn().html('<div class="alert alert-success">' + data + '</div>');
            $('#action').attr('disabled', false);
            userdataTable.ajax.reload();
          }
        })
      });

    });