<?php
include '../php/connection.php';

session_start();

if (isset($_POST['action'])) {
    $query = 'SELECT pro_image FROM product WHERE id = '.$_POST["id"].'';
    $stmt = $dbc->query($query);
    $image = '';

    while ($row = $stmt->fetch()) {
        echo $image = $row['pro_image'];
    }
    
    if ($_POST['action'] == 'add') {

        if (isset($_SESSION['shopping_cart'])) {

            $is_available = 0;
            foreach ($_SESSION['shopping_cart'] as $keys => $values)
            {
                if($_SESSION['shopping_cart'][$keys]['id'] == $_POST['id']) {

                    $is_available++;
                    $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];
                
                }
            }
            
            if($is_available == 0){
                $item_array = array(
                    'id'                  =>     $_POST["id"], 
                    'product_image'       =>     $image,
                    'product_name'        =>     $_POST["product_name"],  
                    'product_price'       =>     $_POST["product_price"],  
                    'product_quantity'    =>     $_POST["product_quantity"]
                );
                $_SESSION["shopping_cart"][] = $item_array;
            }
        } else {
            $item_array = array(
                'id'                  =>     $_POST["id"],  
                'product_image'       =>     $image,
                'product_name'        =>     $_POST["product_name"],  
                'product_price'       =>     $_POST["product_price"],  
                'product_quantity'    =>     $_POST["product_quantity"]
            );
            $_SESSION["shopping_cart"][] = $item_array;
        }
    }

    if($_POST["action"] == 'remove')
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["id"] == $_POST["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
			}
		}
	}
}

?>