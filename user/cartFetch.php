<?php

session_start();

$total_price = 0;
$total_item = 0;

$output = '';

if (!empty($_SESSION['shopping_cart'])) {
    foreach ($_SESSION['shopping_cart'] as $keys => $values) {
            $output .= '
            <tr class="p-3">
                <td class="align-middle"><button class="btn btn-secondary remove" id="'.$values["id"].'"><i class="fa fa-trash"></i></button></td>
                <td class="align-middle"><img src="data:image/jpeg;base64,'.base64_encode($values["product_image"]).'" alt="image" height="160px" srcset=""></td>
                <td class="align-middle">'.$values["product_name"].'</td>
                <td class="align-middle">'.$values["product_quantity"].'</td>
                <td class="align-middle">'.$values["product_price"].'</td>
            </tr>
            ';
        $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
		$total_item = $total_item + 1;     
    } 
} else {
    $output = '<div class="container text-center">
        <p>Your Cart is Empty</p>
    </div>';
}
$data = array(
    'cart_details' => $output,
    'total_item'   =>	$total_item,
    'total_price'   => $total_price
);	
echo json_encode($data);
?>