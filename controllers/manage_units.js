$(document).ready(function() {
    
    display_data();

    function display_data(){
        var action = "fetch";

        $.ajax({
            url: "products/display_unit.php",
            method: "POST",
            data: {action:action},
            success: function(data) {
                $("#unit_table").html(data);
                $("#unit_table").DataTable();
            }
        })
    }

    $("#unit_form").submit(function() {
        var unitName = $("#unitName").val();
        var unitDesc = $("#unitDesc").val();
      
        if ($("#unitName").val() != "" && $("#unitDesc").val() != "") {
            event.preventDefault();
            $.ajax({
                url: "products/insert_unit.php",
                type: "POST",
                data: {
                    unitName : unitName,
                    unitDesc : unitDesc },
                success: function(data) {
                    $("#unit_table").DataTable().destroy();
                    display_data();
                    $("#unit_form")[0].reset();
                }
            })
        }
    })

    $(document).on('click', '.update_unit', function(){
        var unit_id = $(this).attr("id");
        $('#update').modal('show');
        $.ajax({
            url:"products/select_unit.php",
            method:"POST",
            data:{unit_id:unit_id},
            success:function(data){
                $('#update_unit').html(data);
                $('#update').modal('show');
            }
        });
    });

    $(document).on('click', '.delete_unit', function(){
        var unit_id = $(this).attr("id");
        $.ajax({
            url:"products/select_delete_unit.php",
            method:"POST",
            data:{unit_id:unit_id},
            success:function(data){
                $('#delete_unit').html(data);
                $('#delete').modal('show');
            }
        });
    });
    
});