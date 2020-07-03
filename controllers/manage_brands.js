$(document).ready(function() {
    
    display_data();

    function display_data(){
        var action = "fetch";

        $.ajax({
            url: "../products/display_brands.php",
            method: "POST",
            data: {action:action},
            success: function(data) {
                $("#brand_table").html(data);
                $("#brand_table").DataTable();
            }
        })
    }

    $("#brand_form").submit(function() {
        var brand_name = $("#brand_name").val();
        var brand_desc = $("#brand_desc").val();
      
        if ($("#brand_name").val() != "" && $("#brand_desc").val() != "") {
            event.preventDefault();
            $.ajax({
                url: "../products/insert_brands.php",
                type: "POST",
                data: {
                    brand_name : brand_name,
                    brand_desc : brand_desc },
                success: function(data) {
                    $("#brand_table").DataTable().destroy();
                    display_data();
                    $("#brand_form")[0].reset();
                }
            })
        }
    })

    $(document).on('click', '.update_brand', function(){
        var brand_id = $(this).attr("id");
        $('#update').modal('show');
        $.ajax({
            url:"../products/select_brands.php",
            method:"POST",
            data:{brand_id:brand_id},
            success:function(data){
                $('#update_brand').html(data);
                $('#update').modal('show');
            }
        });
    });

    $(document).on('click', '.delete_brand', function(){
        var brand_id = $(this).attr("id");
        $.ajax({
            url:"../products/select_delete_brand.php",
            method:"POST",
            data:{brand_id:brand_id},
            success:function(data){
                $('#delete_brand').html(data);
                $('#delete').modal('show');
            }
        });
    });
    
});