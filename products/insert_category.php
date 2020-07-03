<?php
include '../php/connection.php';

if (!empty($_POST)) {
    $cat_name = $_POST["cat_name"];
    $cat_desc = $_POST["cat_desc"];

    $query = "INSERT INTO category(cat_name, cat_desc) VALUES(?, ?)";
    try {
        if($dbc->prepare($query)->execute([$cat_name, $cat_desc]))
        {
            $data = true;
        }
    } catch (PDOException $ex) {
        $data = $ex->getMessage();
    }

    $date = date('Y-m-d'); 
    $time = date('H:i:s');
    $insertActionLog = "INSERT INTO action_logs (description, data_affected, on_table, date, time) VALUES (?,?,?,?,?)";
    $dbc->prepare($insertActionLog)->execute(['Added', $cat_name, 'Category Table', $date, $time]);
}
?>