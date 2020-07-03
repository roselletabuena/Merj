<?php
include "../php/connection.php";

if (!empty($_POST)) {
    $data = '';
    $product_sku = $_POST["product_sku"];
    $product_desc = $_POST["product_desc"];
    $product_name = ucwords($_POST["product_name"]);
    $supplier_name = $_POST["supplier_name"];
    $product_category = $_POST["product_category"];
    $product_brand = $_POST["product_brand"];
    $product_quantity = $_POST["product_quantity"];
    $product_price = $_POST["product_price"];
    $product_note = $_POST["product_note"];
    $purchase_date = $_POST["purchase_date"];
    
    $file = file_get_contents($_FILES["display_pic"]["tmp_name"]);

    $query = "INSERT INTO product(pro_image, pro_sku, pro_name, pro_desc, product_supplier, pro_cat, pro_brand, pro_quan, pro_price, pro_note, product_date, pro_status, pro_removed) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
     
    try {
        if ($product_quantity == 0) {
            if($dbc->prepare($query)->execute([$file, $product_sku, $product_name, $product_desc,  $supplier_name, $product_category, $product_brand, $product_quantity, $product_price, $product_note, $purchase_date, 'Out of stock', '1']));
            {
                $data = true;
            }
        } elseif ($product_quantity <= 5) {
            if($dbc->prepare($query)->execute([$file, $product_sku, $product_name, $product_desc,  $supplier_name, $product_category, $product_brand, $product_quantity, $product_price, $product_note, $purchase_date, 'Danger', '1']));
            {
                $data = true;
            }
        } else {
            if($dbc->prepare($query)->execute([$file, $product_sku, $product_name, $product_desc,  $supplier_name, $product_category, $product_brand, $product_quantity, $product_price, $product_note, $purchase_date, 'Available', '1']));
            {
                $data = true;
            }
        }
        
    } catch (PDOException $ex) {
        $data = $ex->getMessage();
    }

    $date = date('Y-m-d'); 
    $time = date('H:i:s');
    $insertActionLog = "INSERT INTO action_logs (description, data_affected, on_table, date, time) VALUES (?,?,?,?,?)";
    $dbc->prepare($insertActionLog)->execute(['Added', $product_name, 'Product Table', $date, $time]);
}
?>