$(document).ready(function() {
    display_data();
    function display_data(){
        var action = "fetch";
        $.ajax({
            url: "../products/display_products.php",
            method: "POST",
            data: {action:action},
            success: function(data){
                $("#product_table").html(data);
                $("#product_table").DataTable({
                    "columnDefs": [
                        { "orderable": false, "targets": [1,7,6] }
                    ]
                });
            }
        })
    }


    $(".reset_image").click(function() {
        $("#upd_image_prev").attr("src","../images/noimage.png");
        $("#update_image")[0].reset();
    })


    $("#product_form")[0].reset();
    $("#product_sku").val("SKU"+ new Date().getFullYear() + new Date().getMinutes() + new Date().getDay() + new Date().getSeconds());
    $("#image_prev").attr("src","../images/noimage.png");

    // $("#add_data").click(function() {
      
    // });

    $(document).on('submit','#product_form', function(event){ 
        event.preventDefault();
        $("#purchase_date").val(new Date().getMonth()+1 +"/"+ new Date().getDate()+"/"+ new Date().getFullYear());
        if($("#product_sku").val() != "" && $("#product_desc").val() != "" && $("#product_name").val() != "" && $("#supplier_name").val() != ""&& $("#product_cat").val() != "" && $("#product_brand").val() != "" && $("#product_quan").val() != "" && $("#product_price").val() != "") {
            event.preventDefault();
            var extension = $("#display_pic").val().split('.').pop().toLowerCase();
            if ($.inArray(extension, ["gif","png","jpg","jpeg"]) == 1) {
                alert("Invalid Image File");
            } else {
                $.ajax({
                    url: "../products/insert_products.php",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success:function(data) {
                        $("#product_form")[0].reset();
                        $("#image_prev").attr("src","../images/noimage.png");
                        location.reload();
                    }
                });
            }
        }else{
           event.returnValue = false;
        }
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href") // activated tab
    });
    
    $(document).on('change', '.action', function(){
        var action = $(this).val();
        if(action == "view"){ 
            var product_id = $(this).attr("id");
            var btn_action = "product_details";
            $.ajax({
                url:"../products/manage_products.php",
                method:"POST",
                data:{product_id:product_id,
                    btn_action:btn_action},
                success:function(data){
                    $('#product_details').html(data);
                    $('#view').modal('show');
                }
            });
        } else if(action == "stockin"){
            var product_id = $(this).attr("id");
            var btn_action = "stock_in";
            $('#stockin').modal('show');
            
            $(document).on('submit','#product_form', function(event){ 
                var stock_num = $("#stock_num").val();
                if (stock_num != "") {
                    $.ajax({
                        url:"../products/manage_products.php",
                        method:"POST",
                        data:{product_id:product_id, btn_action:btn_action, stock_num:stock_num},
                        success:function(data){
                            display_data();
                            alert("successfully added");
                            $('#stockin').modal('hide');
                        }
                    });
                }
            });  
        } else if (action == "update") {
            $(".upd_image_prev").attr("src","../images/noimage.png");
            var product_id = $(this).attr("id");
            var btn_action = "update_pro";
            // $("#update_image")[0].reset();        
            $.ajax({
                url:"../products/manage_products.php",
                method:"POST",
                data:{product_id:product_id, btn_action:btn_action},
                success:function(data){
                    $('#update').modal('show');
                    $('#update_products').html(data);
                }
            });
        } else if (action == "remove") {
            var product_id = $(this).attr("id");
            var btn_action = "delete_pro";
            $.ajax({
                url:"../products/manage_products.php",
                method:"POST",
                data:{product_id:product_id, btn_action:btn_action},
                success:function(data){
                    $('#delete').modal('show');
                    $('#remove_product').html(data);
                }
            });
        }
    });

    $(document).on('focusout', '.action', function(){
        $(".action").prop('selectedIndex', 0);
    });

})

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image_prev')
                .attr('src', e.target.result);

            $('#upd_image_prev')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    } 
}
