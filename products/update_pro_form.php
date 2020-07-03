<?php
include "../php/connection.php";

if (!empty($_POST)){

    $product_desc = $_POST["upd_product_desc"];
    $product_name = ucwords($_POST["upd_product_name"]);
    $supplier_name = $_POST["upd_supplier_name"];
    $product_category = $_POST["upd_product_category"];
    $product_brand = $_POST["upd_product_brand"];
    $product_quantity = $_POST["upd_product_quantity"];
    $product_price = $_POST["upd_product_price"];
    $product_note = $_POST["upd_product_note"];
    $upd_id = $_POST["upd_id"];


    if($product_quantity == 0){
        $query = "UPDATE product SET pro_name = ?, pro_desc = ?, product_supplier = ?, pro_cat = ?, pro_brand = ?,  pro_quan = ?, pro_note = ?, pro_status = ? WHERE id = ?";
        $dbc->prepare($query)->execute([$product_name, $product_desc, $supplier_name, $product_category, $product_brand, $product_quantity, $product_note, 'Out of stock' ,$upd_id]);
    } elseif($product_quantity <= 5) {
        $query = "UPDATE product SET pro_name = ?, pro_desc = ?, product_supplier = ?, pro_cat = ?, pro_brand = ?, pro_quan = ?, pro_note = ?, pro_status = ? WHERE id = ?";
        $dbc->prepare($query)->execute([$product_name, $product_desc, $supplier_name, $product_category, $product_brand, $product_quantity, $product_note, 'Danger' ,$upd_id]);
    } else {
        $query = "UPDATE product SET pro_name = ?, pro_desc = ?, product_supplier = ?, pro_cat = ?, pro_brand = ?, pro_quan = ?, pro_note = ?, pro_status = ? WHERE id = ?";
        $dbc->prepare($query)->execute([$product_name, $product_desc, $supplier_name, $product_category, $product_brand, $product_quantity, $product_note, 'Available' ,$upd_id]);
    }
}
?>