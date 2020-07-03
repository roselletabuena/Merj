$(document).ready(function() {
    loadCart();
    function loadCart(){
        $.ajax({
            url: "user/cartFetch.php",
            method: "POST",
            dataType: "json",
            success: function(data) {
                $('#cart_content').html(data.cart_details); 
                $('#items').text(data.total_item); 
                $('#total').text(data.total_price); 
            }
        })
    }
    $('#proceed').click(function(){
        window.location.href = "../merj/payment.php"
    })

    $('#placeorder').click(function() {
        var id = $("#c_id").val();
        var mode =  $('input[name=mode]:checked').val();
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to place this Order",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: 'user/insert_order.php',
                    data:  "mode="+mode,
                    success: function(data) {
                        Swal.fire(
                            'success!',
                            'Your Order has been placed',
                            'success'
                        )
                    }
                })
            }
          })
    })

    $(document).on('click', '.remove', function(event){
        var id = $(this).attr("id");
        var action = 'remove';
        event.preventDefault();
        if(confirm("Are you sure you want to remove this product?"))
		{
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
		else
		{
			return false;
		}
    });
})
