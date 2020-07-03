$(document).ready(function(){
    display_data();
    function display_data(){
    var action = "fetch";
    $.ajax({
        url: "../supplier/displaydeleteduser.php",
        method: "POST",
        data: {action:action},
        success: function(data) {
            $("#deletedUserTable").html(data);
            $("#deletedUserTable").DataTable();
        }
    })
    }



})
