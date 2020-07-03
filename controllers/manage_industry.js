$(document).ready(function() {
    
display_data();

function display_data(){
    var action = "fetch";
    $.ajax({
        url: "supplier/display_industry.php",
        method: "POST",
        data: {action:action},
        success: function(data) {
            $("#industry_table").html(data);
            $("#industry_table").DataTable();
        }
    })
}

$("#industry_form").submit(function() {
    var industry_name = $("#industry_name").val();
    var industry_desc = $("#industry_desc").val();
    
    if ($("#industry_name").val() != "") {
        event.preventDefault();
        $.ajax({
            url: "supplier/insert_industry.php",
            type: "POST",
            data: {
                industry_name : industry_name,
                industry_desc : industry_desc,},
            success: function(data) {
                $("#industry_table").DataTable().destroy();
                display_data();
                $("#industry_form")[0].reset();
            }
        })
    }
})

    $(document).on('click', '.update', function(){
        var id = $(this).attr("id");
        $.ajax({
            url:"supplier/select_industry.php",
            method:"POST",
            data:{id:id},
            success:function(data){
                $("#updateForm").html(data);
                $('#update').modal('show');
            }
        });
    });

    $(document).on('click', '.delete', function(){
        var brand_id = $(this).attr("id");
        $.ajax({
            url:"products/select_delete_brand.php",
            method:"POST",
            data:{brand_id:brand_id},
            success:function(data){
                $('#delete_brand').html(data);
                $('#delete').modal('show');
            }
        });
    });
    
});