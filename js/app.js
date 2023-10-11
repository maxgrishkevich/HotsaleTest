window.addEventListener('DOMContentLoaded', function () {
    MenuModule.init();

    if (window.location.pathname === '/'){
        $('form').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '/services/validator.php',
                data: formData,
                success: function(response) {
                    var jsResponse = JSON.parse(response);
                    if (jsResponse.success) {
                        $el = $('#success-message');
                        $el.find("#success-text").text(jsResponse.message);
                        $('#registration-form').hide();

                    } else {
                        $el = $('#error-message');
                        $el.find("#error-text").text(jsResponse.message);
                    }
                    $el.removeClass("d-none");
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    }
});


var MenuModule = (function () {
    function setActiveMenuItem() {
        var currentLocation = window.location.pathname;
        var formLink = document.getElementById('formLink');
        var tableLink = document.getElementById('tableLink');
        if (currentLocation === '/') {
            formLink.classList.add('active');
        } else if (currentLocation === '/table') {
            tableLink.classList.add('active');
        }
    }

    return {
        init: function () {
            setActiveMenuItem();
        },
    };
})();



