
$(document).on('submit', '.send-feedback-form-ajax', function (e) {
    e.preventDefault();

    $.ajax({
        url: '/feedback/',
        type: "POST",
        dataType: "html",
        data: $(this).serialize(),
        success: function (response) {
            console.log(response)
        }
    })

})
