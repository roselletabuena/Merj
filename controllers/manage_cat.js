$(document).ready(function() {
display_data();

function display_data(){
    var action = "fetch";
    $.ajax({
        url: "../products/display_category.php",
        method: "POST",
        data: {action:action},
        success: function(data) {
            $("#cat_table").html(data);
            $("#cat_table").DataTable({
                "columnDefs": [
                    { "orderable": false, "targets": 2 }
                ]
            });
        }
    })
}

$("#cat_form").submit(function() {
    var cat_name = $("#cat_name").val();
    var parent_name = $("#parent_name").val();
    var cat_desc = $("#cat_desc").val();
    
    if ($("#cat_name").val() != "") {
        event.preventDefault();
        $.ajax({
            url: "../products/insert_category.php",
            type: "POST",
            data: {
                cat_name : cat_name,
                parent_name : parent_name,
                cat_desc : cat_desc },
            success: function(data) {
                $("#cat_table").DataTable().destroy();
                display_data();
                $("#cat_form")[0].reset();
            }
        })
    }
})

    $(document).on('click', '.update_cat', function(){
        var cat_id = $(this).attr("id");
        $('#update').modal('show');
        $.ajax({
            url:"../products/select_cat.php",
            method:"POST",
            data:{cat_id:cat_id},
            success:function(data){
                $('#update_cat').html(data);
                $('#update').modal('show');
            }
        });
    });

    $(document).on('click', '.delete_cat', function(){
        var cat_id = $(this).attr("id");
        $.ajax({
            url:"../products/select_delete_cat.php",
            method:"POST",
            data:{cat_id:cat_id},
            success:function(data){
                $('#delete_cat').html(data);
                $('#delete').modal('show');
            }
        });
    });
    
});