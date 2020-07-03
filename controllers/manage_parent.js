$(document).ready(function() {
    
    display_data();

    function display_data(){
        var action = "fetch";

        $.ajax({
            url: "products/display_parent.php",
            method: "POST",
            data: {action:action},
            success: function(data) {
                $("#parent_table").html(data);
                $("#parent_table").DataTable();
            }
        })
    }

    $("#parent_form").submit(function() {
        var parent_name = $("#parent_name").val();
        var parent_desc = $("#parent_desc").val();
      
        if ($("#parent_name").val() != "" && $("#parent_desc").val() != "") {
            event.preventDefault();
            $.ajax({
                url: "products/insert_parent.php",
                type: "POST",
                data: {
                    parent_name : parent_name,
                    parent_desc : parent_desc },
                success: function(data) {
                    $("#parent_table").DataTable().destroy();
                    display_data();
                    $("#parent_form")[0].reset();
                }
            })
        }
    })

    $(document).on('click', '.update_parent', function(){
        var parent_id = $(this).attr("id");
        $.ajax({
            url:"products/select_parent.php",
            method:"POST",
            data:{parent_id:parent_id},
            success:function(data){
                $('#update_parent').html(data);
                $('#update').modal('show');
            }
        });
    });

    $(document).on('click', '.delete_parent', function(){
        var parent_id = $(this).attr("id");
        $.ajax({
            url:"products/select_delete_parent.php",
            method:"POST",
            data:{parent_id:parent_id},
            success:function(data){
                $('#delete').modal('show');
                $('#delete_parent').html(data);
            }
        });
    });
    
});