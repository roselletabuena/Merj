<?php
include '../php/connection.php';

if(!empty($_POST)) {
    $id = $_POST["id"];
    $query = "DELETE FROM brands WHERE id = ?";
    $dbc->prepare($query)->execute([$id]);

    $brand_name = $_POST["brand_name"];
    $date = date('Y-m-d'); 
    $time = date('H:i:s');
    $insertActionLog = "INSERT INTO action_logs (description, data_affected, on_table, date, time) VALUES (?,?,?,?,?)";
    $dbc->prepare($insertActionLog)->execute(['Deleted', $brand_name, 'Brand Table', $date, $time]);
} 
?>