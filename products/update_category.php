<?php
include '../php/connection.php';

if(!empty($_POST)) {
    $output = '';
    $upd_id = $_POST["upd_id"];
    $upd_cat_name = $_POST["upd_cat_name"];
    $upd_cat_desc = $_POST["upd_cat_desc"];

    $query = "UPDATE category SET cat_name = ?, cat_desc = ? WHERE id = ?";
    $dbc->prepare($query)->execute([$upd_cat_name, $upd_cat_desc, $upd_id]);

    $date = date('Y-m-d'); 
    $time = date('H:i:s');
    $insertActionLog = "INSERT INTO action_logs (description, data_affected, on_table, date, time) VALUES (?,?,?,?,?)";
    $dbc->prepare($insertActionLog)->execute(['Updated', $upd_cat_name, 'Category Table', $date, $time]);
}
?>