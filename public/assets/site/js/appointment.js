var base_url = $('body').data('baseurl');


$("#bookAppointment").on('submit', function () {


    var img = base_url + "/spinner.gif";

    $('#bookmsz').html('<img class="im" src="' + img + '"  />');

    $.post($(this).prop('action'), {

            "_token": $(this).find('input[name=_token]').val(),
            "node_id": $('#node_id').val(),
            "booking_date": $('#booking_date').val(),
            "booking_time": $('#booking_time').val(),
            "patient_name": $('#patient_name').val(),
            "patient_email": $('#patient_email').val(),
            "patient_contact": $('#patient_contact').val(),
            "patient_zipcode": $('#patient_zipcode').val(),
        },

        function (data) {

            //response after the process.
            var status = data.status;

            if (status == 'Fail') {
                $('#bookmsz').html('');
                $("#bookmsz").html(data.message).fadeIn('slow');
            } else {
                $('#bookmsz').html('');
                $("#bookmsz").html(data.message).fadeIn('slow');
                $('#btnbook').attr('disabled', 'disabled');
            }
        }, 'json');
    return false
});
