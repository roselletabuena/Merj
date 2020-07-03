<?php
include '../php/connection.php';

if(!empty($_POST)) {
    $id = $_POST["id"];
    $query = "DELETE FROM category WHERE id = ?";
    $dbc->prepare($query)->execute([$id]);

    $cat_name = $_POST["cat_name"];
    $date = date('Y-m-d'); 
    $time = date('H:i:s');
    $insertActionLog = "INSERT INTO action_logs (description, data_affected, on_table, date, time) VALUES (?,?,?,?,?)";
    $dbc->prepare($insertActionLog)->execute(['Deleted', $cat_name, 'Category Table', $date, $time]);
} 
?>