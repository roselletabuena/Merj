(function() {
    'use strict';
    window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();
            var w_title = jQuery('#w_title').val();
            var w_note = jQuery('#w_note').val();

            jQuery.ajax({
                url:'../model/update-welcome-note.php',
                type:'POST',
                data: {
                    w_title:w_title,
                    w_note:w_note,
                },
                success:function(data) {

                    if (data == "Updated") { 
                        alert("Welcome note updated successfully.");
                        location.reload();
                    }
                    else { alert("Something went wrong."); }
                }
            });
        }
        form.classList.add('was-validated');
        }, false);
    });
    }, false);

    var app = {
        loadWelcomeNote: function() {
            if ($('body').hasClass('welcome-main-wrap')) {	
                $.ajax({
                    url:'../model/fill-welcome-form.php',
                    type:'POST',
                    data: { },
                    
                    success:function(data) {
                        var welcomeData = JSON.parse(data);
                        var welcomeTitle = welcomeData[0]['welcome_title'];
                        var welcomeContent = welcomeData[0]['welcome_note'];

                        $('#w_title').val(welcomeTitle);
                        $('#w_note').val(welcomeContent);
                    }
                });
            }
        }
    }

    

    $(document).ready( function() {
        app.loadWelcomeNote();
	});
})();