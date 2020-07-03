$(document).ready(function(){
    display_data();
    function display_data(){
    var action = "fetch";
    $.ajax({
        url: "../supplier/displaydeletedsupplier.php",
        method: "POST",
        data: {action:action},
        success: function(data) {
            $("#deletedSupplierTable").html(data);
            $("#deletedSupplierTable").DataTable();
        }
    })
    }



})
