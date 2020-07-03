$(document).ready(function() {
    $userTaken = false;
    $(".data-error").hide();
    $("#username").keyup(function(){
        var checkUser = $("#username").val();
        $.ajax({
            url: "user/check_user.php",
            type: "POST",
            data: { username : checkUser },
            success: function(data) {
                if (data == true) {
                    $(".data-error").show();
                    $userTaken = true;       
                } else {
                    $(".data-error").hide();
                    $userTaken = false;     
                }
            }
        });
    })
    
    $emailTaken = false;
    $(".data-email").hide();
    $("#email").keyup(function(){
        var checkEmail = $("#email").val();
        $.ajax({
            url: "user/check_email.php",
            type: "POST",
            data: { user_email : checkEmail },
            success: function(data) {
                if (data == true) {
                    $(".data-email").show();
                    $emailTaken = true;       
                } else {
                    $(".data-email").hide();
                    $emailTaken = false;     
                }
            }
        });
    })

    $("#reg_form").submit(function(event) {
     event.preventDefault();
        if ($userTaken == true) { 
            //do nothing
        } else if ($emailTaken == true){
            //do nothing
        } else {
            if(!isValid()) {
                event.preventDefault();
                var extension = $("#display_pic").val().split('.').pop().toLowerCase();
                if ($.inArray(extension, ["gif","png","jpg","jpeg"]) == 1) {
                    alert("Invalid Image File");
                } else {
                    $.ajax({
                        url: "user/insert_user.php",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success:function() {
                            $("#reg_form")[0].reset();
                            $("#image_prev").attr("src","images/dp-icon.png");
                        }
                    });
                }
            }
        }
    })
})


//validation for reg_form
function isValid() {
    $checkForm = false;
    if ($("#fname").val() == "" || $("#lname").val() == "" 
        || $("#username").val() == "" || $("#contact_no").val() == ""
        || $("#email").val() == "" || $("#password").val() == "" || $("#con_pass").val() == "" ) {
            alert("Please complete the form");
        $checkForm = true;
    } else {
        if ($("#password").val() != $("#con_pass").val()) {
            alert("Missmatch Password");
            $checkForm = true;
        } else if ($("#password").val().length <= 5){
            alert("password must be above 6 characters");
            $checkForm = true;
        } 
    } 
    return $checkForm;
}

//preview image
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image_prev')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}