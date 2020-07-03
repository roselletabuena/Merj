$(document).ready(function() {
    display_data();

    function display_data(){
        var action = "fetch";

        $.ajax({
            url: "../model/actionLogs.php",
            method: "POST",
            data: {action:action},
            success: function(data) {
                $("#action_logs").html(data);
                $("#action_logs").DataTable();
            }
        })
    }
})
