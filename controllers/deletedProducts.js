$(document).ready(function() {
    display_data();
    function display_data(){
        var action = "fetch";

        $.ajax({
            url: "../supplier/displaydeletedproducts.php",
            method: "POST",
            data: {action:action},
            success: function(data) {
                $("#deletedProd").html(data);
                $("#deletedProd").DataTable();
            }
        })
    }

})