$(document).ready(function(){
    display_data();
    display_cat();
    loadCart();
    
    function display_data(){
        var action = "fetch";
        $.ajax({
            url: "user/displayAllProducts.php",
            method: "POST",
            data: {action:action},
            success: function(data) {
                $("#content-shop").html(data);
            }
        })
    }

    function loadCart(){
        $.ajax({
            url: "user/fetch_cart.php",
            method: "POST",
            dataType: "json",
            success: function(data) {
                $('#cart').html(data.cart_details); 
                $('.badge').text(data.total_item);
            }
        })
    }
    
    $("#logout").click(function(){
        delete_cookie("client_id");
		document.location.href = "../merj/homepage.php";
    })

    function delete_cookie(name){
        document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
    }

    $('.add-quan').click(function () {
      var val =  $("#danger").text();
      if (val != '') {
        if ($(".input-quan").val() < parseInt(val)) {
            var newQuan = parseInt($(".input-quan").val()) + 1;
            $(".input-quan").val(newQuan)
          }
      } else {
        if ($(".input-quan").val() < 10) {
            var newQuan = parseInt($(".input-quan").val()) + 1;
            $(".input-quan").val(newQuan)
        }
      }
    });

    $('.sub').click(function () {
        if ($(".input-quan").val() > 1) {
            var newQuan = parseInt($(".input-quan").val()) - 1;
            $(".input-quan").val(newQuan)
        }
    });
    
    function display_cat(){
        var action = "fetch";
        $.ajax({
            url: "user/displayCategory.php",
            method: "POST",
            data: {action:action},
            success: function(data){
                $(".category").html(data);
            }
        })
    }
    
    $(document).on('click', '#track_order', function(event) {
        document.location.href = "../merj/track_order.php";
    })
    
    $(document).on('click', '.category-get', function(event){
        var id = $(this).attr("id");
        event.preventDefault();
        $.ajax({
            url: "user/get_cat.php",
            data: "id="+id,
            success: function(data) {
                window.location.href = '../merj/category.php'
            }
        })
    });


    $(document).on('click', '#viewCart', function(event){
        event.preventDefault();
        var cookie = getCookie("client_id");
        var id = getCookie("client_id");
        if (cookie != "") {
            $.ajax({
                url: "model/checkAddress.php",
                method: "POST",
                data: {id:id},
                success: function(data){
                    if (data == false) {
                        $("#editAddress").modal('show');
                    } else {
                        window.location.href = 'view_cart.php';
                    }
                }
            })
        } else {
            Swal.fire(
                '',
                'Please login first to view your cart',
                'error'
            )
        }
    })

    $(document).on("submit","#editAddressForm_1", function(event) {
        event.preventDefault();
        if ($("#updAddress").val() != "") {
            var id = getCookie("client_id");
            var btn_action = "update_add";
            var updAdd = $("#updAddress").val();
            $.ajax({
                url:"user/upd_user.php",
                method:"POST",
                data:{id:id,
                    btn_action:btn_action,
                    updAdd, updAdd},
                success:function(data)
                {
                    $("#editAddress").modal('hide');
                    $("#address").val(data);
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Updated successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                   window.location.href = 'view_cart.php';
                }
            });
        } else {
            Swal.fire({
                position: 'top-end',
                type: 'error',
                title: 'Please provide a address',
                showConfirmButton: false,
                timer: 1500
              })
        }
    })

    $(document).on('click', '#checkOut', function(event){
        event.preventDefault();
        var cookie = getCookie("client_id");
        if (cookie != "") {
            alert("success");
        } else {
            Swal.fire(
                '',
                'You need to login first to proceed to check out',
                'error'
            )
        }
    })

   
    $(document).on('click', '.view', function(event){
        var id = $(this).attr("id");
        event.preventDefault();
        $.ajax({
            url: "user/get_id.php",
            data: "id="+id,
            success: function(data) {
                window.location.href = '../merj/product_details.php'
            }
        })
    });

    $(document).on('click', '.add', function(event){
        var id = $(this).attr("id");
        var product_name = $('#name'+id).val();
		var product_price = $('#price'+id).val();
		var product_quantity = $('#quantity'+id).val();
        var action = "add";
        event.preventDefault();
        $.ajax({
            url:"user/shopAction.php",
            method:"POST",
            data:{
                id:id, 
                product_name:product_name, 
                product_price:product_price, 
                product_quantity:product_quantity, 
                action:action
            },
            success:function(data)
            {
                $("#name").text(product_name);
                $("#myModal").modal('show');
                setTimeout(hide_success, 2000);
                $('.badge').text(data.total_item);
                loadCart();
            }
        });
    });

    $(document).on('click', '.dropdown-menu', function(e) {
        e.stopPropagation();
     });

     $(document).on('click', '.remove', function(event){
        var id = $(this).attr("id");
        var action = 'remove';
        event.preventDefault();
        if ($('#confirm').val() == 1) {
            $.ajax({
            url:"user/shopAction.php",
            method:"POST",
            data:{ id : id, 
                action : action },
            success:function()
            {
                loadCart();
            }
        })
        }
    });


})

function hide_success(){
    $("#myModal").modal('hide');
}


function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}