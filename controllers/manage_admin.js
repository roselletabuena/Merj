$(document).ready(function(){
    display_data();
    function display_data(){
    var action = "fetch";
    $.ajax({
        url: "../model/displayUser.php",
        method: "POST",
        data: {action:action},
        success: function(data) {
            $("#user_table").html(data);
            $("#user_table").DataTable();
        }
    })
    }

   

    $("#regAdmin").submit(function() {
        var full_name = $("#full_name").val();
        var username = $("#username").val();
        var user_con = $("#user_con").val();
        var password = $("#password").val();

        if (!isValid()) {
            event.preventDefault();
            $.ajax({
                url: "../model/insertUser.php",
                method: "POST",
                data: {
                    full_name : full_name,
                    username : username,
                    user_con : user_con,
                    password : password
                },
                success: function(data) {
                    $("#user_table").DataTable().destroy();
                    display_data();
                    $("#regAdmin")[0].reset();
                }
            });
        }
    })

    $(document).on('click', '.delete_user', function(){
    var id = $(this).attr("id");;
        $.ajax({
            url:"../model/select_delete_user.php",
            method:"POST",
            data:{id:id},
            success:function(data){
                $('#remove').html(data);
                $('#delete').modal('show');
            }
            });
    });


    function isValid() {
        checkIfValid = false;
        if($("#full_name").val() == 0 || $("#username").val() == 0 || $("#user_con").val() == 0 || $("#password").val() == 0 
        || $("#con_pass").val() == 0){
            checkIfValid = true;
        } else {
            if ($("#password").val() != $("#con_pass").val()) {
                alert("Missmatch Password");
                $checkForm = true;
                event.preventDefault();
            } else if ($("#password").val().length <= 5){
                alert("password must be above 6 characters");
                $checkForm = true;
                event.preventDefault();
            } 
        } 
        return checkIfValid;
    }
})
