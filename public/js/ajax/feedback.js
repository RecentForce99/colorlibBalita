
$(document).on('submit', '.send-feedback-form-ajax', function (e) {
    e.preventDefault();

    $.ajax({
        url: '/contacts/feedback/',
        type: "POST",
        dataType: "html",
        data: $(this).serialize(),
        success: function (response) {
            if (response == 1) {
                alert('Here could be a modal window, but it was not made up. Regardless, thanks')
            } else {
                alert('Mail cannot be send')
            }
        }
    })

})
