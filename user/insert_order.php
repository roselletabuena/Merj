<?php

include '../php/connection.php';

session_start();
$total_price = 0;
$total_item = 0;


if (isset($_GET['mode'])){
    $mode = $_GET['mode'];

    if (isset($_COOKIE['client_id'])) {
        $cust_id = $_COOKIE['client_id'];
    }
    $count = 0;
    $data = '';
    date_default_timezone_set('Asia/Manila');
    if (!empty($_SESSION['shopping_cart'])) {
             
        foreach ($_SESSION['shopping_cart'] as $keys => $values) {
            $count++;
            $pro_id = $values["id"];
            $price = $values["product_price"];
            $pro_quan  = $values["product_quantity"];
            $total_price = $values["product_quantity"] * $price;
            $query = "INSERT INTO orders(product_id, orderId ,customer_id, price, quantity ,total_price, payment_mode, order_date, order_status) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query_update = "UPDATE product AS p SET p.pro_quan = p.pro_quan - ? WHERE id = ? ";
            $dbc->prepare($query_update)->execute([$pro_quan, $values["id"]]);
            try {
                if($dbc->prepare($query)->execute([$values["id"],date('jsgi'),$cust_id, $values["product_price"], $values["product_quantity"], $total_price ,$mode, date('F j, Y'), 'pending']))
                {
                    $data = true;                    
                }
            } catch (PDOException $ex) {
                    $data = $ex->getMessage;
            }  
        }   
    }
}
?>

