<?php

session_start();

$total_price = 0;
$total_item = 0;

$output = '';

if (!empty($_SESSION['shopping_cart'])) {
    foreach ($_SESSION['shopping_cart'] as $keys => $values) {

        if ($total_item < 4) {
            $output .= '
            <li class="container mt-2">
                    <div class="row">
                    <div class="col-md-2">
                        <img src="data:image/jpeg;base64,'.base64_encode($values["product_image"]).'" alt="image" height="60px" srcset="">
                    </div>
                    <div class="col-md-8 ml-3" >
                        <p style="margin-bottom: 2px !important;"  style="font-size: 16px">'.$values["product_name"].'</p>
                        <p style="font-size: 13px; color: grey;">'.$values["product_quantity"].' &times; '.$values["product_price"].'</p>
                    </div> 
                    <div align="right" >
                        <a style="cursor: pointer;"  class="remove" id="'.$values["id"].'">&times;</a>
                    </div> 
                </div>
            </li>
            ';
        }
        $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
		$total_item = $total_item + 1;     
    }
    $output .= '
    <div align="right" class="mr-3">
        <p>Total: ₱'.number_format($total_price, 2).'</p>
    </div>
    <div class="text-center p-3">
        <button class="btn btn-dark btn-sm" id="viewCart" >VIEW CART</button>
        <button class="btn btn-dark btn-sm" id="checkOut">CHECK OUT</button>
    </div>';
} else {
    $output = '<div class="container mt-3 text-center">
        <p>Your Cart is Empty</p>
    </div>';
}
$data = array(
    'cart_details' => $output,
	'total_item'    =>	$total_item
);	
echo json_encode($data);
?>