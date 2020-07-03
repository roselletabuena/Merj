$(document).ready(function(){
    display_data();
    function display_data(){
        var action = "fetch";
        $.ajax({
            url: "../orders/displayOrders.php",
            method: "POST",
            data: {action:action},
            success: function(data){
                $("#order_table").html(data);
                $("#order_table").DataTable({
                    "columnDefs": [
                        { "orderable": false, "targets": [5,6] }
                    ]
                });
            }
        })
    }

    $("body").tooltip({ selector: '[data-toggle=tooltip]' });

    $(document).on('click', '.view', function(){
        var id = $(this).attr("id");
        var btn_action = "order_details";
        var status = $(this).attr("name");
        var date = $(this).val();
        $.ajax({
            url:"../orders/manageOrders.php",
            method:"POST",
            data:{ id:id, btn_action:btn_action, status:status, date:date},
            success:function(data){
                $('#viewOrderDetails').html(data);
                $("#viewOrder").modal("show");
            }
        });
    });

    $(document).on('click', '.accept', function(){
        var id = $(this).attr("id");
        var status = $(this).attr("name");
        var date = $(this).val();
        var btn_action = "update_accept";
        swal({
            title: "",
            text: "Are you sure you want to confirm this order?",
            type: "info",
            showCancelButton: true,
            confirmButtonClass: "btn-success",
            confirmButtonText: "Confirm",
            closeOnConfirm: false,
            allowOutsideClick: true
          },
          function(){
            $.ajax({
                url:"../orders/manageOrders.php",
                method:"POST",
                data:{ id:id, btn_action:btn_action,
                    status:status, date:date},
                success:function(data){
                    swal("", "The order is confirmed", "success");
                    $("#order_table").DataTable().destroy();
                    display_data();
                }
            });
        });
    });

    $(document).on('click', '.process-order', function(){
        var id = $(this).attr("id");
        var status = $(this).attr("name");
        var date = $(this).val();
        var btn_action = "process-ord";
        swal({
            title: "Process order",
            text: "Order has been entered and has been sent to the manufacturer.",
            type: "info",
            showCancelButton: true,
            confirmButtonClass: "btn-success",
            confirmButtonText: "Confirm",
            closeOnConfirm: false,
            allowOutsideClick: true
          },
          function(){
            $.ajax({
                url:"../orders/manageOrders.php",
                method:"POST",
                data:{ id:id, btn_action:btn_action,
                    status:status, date:date},
                success:function(data){
                    swal("", "Order status has been changed to completed", "success");
                    $("#order_table").DataTable().destroy();
                    display_data();
                }
            });
        });
    });

    $(document).on('click', '.shipped-order', function(){
        var id = $(this).attr("id");
        var status = $(this).attr("name");
        var date = $(this).val();
        var btn_action = "order_shipped";
        swal({
            title: "",
            text: "Is this order is ready to be shipped?",
            imageUrl: '../images/icons8-shipped-70.png',
            showCancelButton: true,
            confirmButtonClass: "btn-success",
            confirmButtonText: "Confirm",
            closeOnConfirm: false,
            allowOutsideClick: true
          },
          function(){
            $.ajax({
                url:"../orders/manageOrders.php",
                method:"POST",
                data:{ id:id, btn_action:btn_action,
                    status:status, date:date},
                success:function(data){
                    swal("", "Order status has been changed to ready to shipped", "success");
                    $("#order_table").DataTable().destroy();
                    display_data();
                }
            });
        });
    });
    
    $(document).on('click', '.arrived', function(){
        var id = $(this).attr("id");
        var status = $(this).attr("name");
        var date = $(this).val();
        var btn_action = "complete";
        swal({
            title: "",
            text: "The order has been arrived to it's destination.",
            imageUrl: '../images/truck1.gif',
            imageSize: '200x200',
            showCancelButton: true,
            confirmButtonClass: "btn-success",
            confirmButtonText: "Confirm",
            closeOnConfirm: false,
            allowOutsideClick: true
          },
          function(){
            $.ajax({
                url:"../orders/manageOrders.php",
                method:"POST",
                data:{ id:id, btn_action:btn_action,
                    status:status, date:date},
                success:function(data){
                    swal("", "Order status has been changed to completed", "success");
                    $("#order_table").DataTable().destroy();
                    display_data();
                }
            });
        });
    });

    $(document).on('click', '.cancel', function(){
        var id = $(this).attr("id");
        var status = $(this).attr("name");
        var date = $(this).val();
        var btn_action = "order_cancel";
        swal({
            title: "",
            text: "Do you really want to cancel this order?",
            type: "error",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Confirm",
            closeOnConfirm: false
          },
          function(){
            $.ajax({
                url:"../orders/manageOrders.php",
                method:"POST",
                data:{ id:id, btn_action:btn_action,
                    status:status, date:date},
                success:function(data){
                    swal("", "Order has been cancelled", "success");
                    $("#order_table").DataTable().destroy();
                    display_data();
                }
            });
          });
    });
})