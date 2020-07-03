$(document).ready(function(){
    display_data();
    function display_data(){
    var action = "fetch";
    $.ajax({
        url: "../supplier/display_supplier.php",
        method: "POST",
        data: {action:action},
        success: function(data) {
            $("#supplier_table").html(data);
            $("#supplier_table").DataTable();
        }
    })
    }

    $("#add_data").click(function() {
        $("#supplier_code").val("S"+ new Date().getFullYear() +new Date().getDay() + new Date().getSeconds());
    });


    $("#regSupplier").submit(function() {
        var supplier_code = $("#supplier_code").val();
        var company_name = $("#company_name").val();
        var company_add = $("#company_add").val();
        var company_con = $("#company_con").val();
        var company_email = $("#company_email").val();
        var main_name = $("#main_name").val();
        var main_email = $("#main_email").val();
        var main_position = $("#main_position").val();
        var main_contact = $("#main_contact").val();
        var add_info = $("#add_info").val();

    if (!isValid()) {
        event.preventDefault();
        $.ajax({
            url: "../supplier/insert_supplier.php",
            method: "POST",
            data: {
                supplier_code : supplier_code,
                company_name : company_name,
                company_add : company_add,
                company_con : company_con,
                company_email : company_email,
                main_name : main_name,
                main_email : main_email,
                main_position : main_position,
                main_contact : main_contact,
                add_info : add_info
            },
            success: function(data) {
                alert(data);
                // $("#supplier_table").DataTable().destroy();
                // display_data();
                // $("#regSupplier")[0].reset();
                
            }
        });
    }
    })

    $(document).on('click', '.view', function(){
    var id = $(this).attr("id");
    $.ajax({
        url:"../supplier/view_supplier.php",
        method:"POST",
        data:{id:id},
        success:function(data){
            $('#view_supplier').html(data);
            $('#view').modal('show');
        }
        });
    });

    $(document).on('click', '.update', function(){
    var id = $(this).attr("id");
    $.ajax({
        url:"../supplier/select_supplier.php",
        method:"POST",
        data:{id:id},
        success:function(data){
            $('#update_supplier').html(data);
            $('#update').modal('show');
        }
        });
    });

    $(document).on('click', '.remove', function(){
    var id = $(this).attr("id");
    $.ajax({
        url:"../supplier/select_delete_supplier.php",
        method:"POST",
        data:{id:id},
        success:function(data){
            $('#remove').html(data);
            $('#delete').modal('show');
        }
        });
    });


    function isValid() {
        checkIfValid = false;
        if($("#company_name").val() == 0 || $("#company_add").val() == 0 || $("#company_con").val() == 0 || $("#company_email").val() == 0 
        || $("#main_name").val() == 0 || $("#main_email").val() == 0 || $("#main_position").val() == 0 || $("#main_contact").val() == 0 ||  $("#company_indus").val() == 0){
            checkIfValid = true;
        } else {
            checkIfValid = false;
        }
        return checkIfValid;
    }
})
