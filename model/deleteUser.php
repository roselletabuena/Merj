<?php
    include '../php/connection.php';

    if(!empty($_POST)) {
        $output = '';
        $id = $_POST["id"];
   
        $query = "UPDATE admin_user SET status = ? WHERE id = ?";
        $dbc->prepare($query)->execute(['Removed', $id]);

        $full_name = $_POST["full_name"];
        $date = date('Y-m-d'); 
        $time = date('H:i:s');
        $insertActionLog = "INSERT INTO action_logs (description, data_affected, on_table, date, time) VALUES (?,?,?,?,?)";
        $dbc->prepare($insertActionLog)->execute(['Deleted', $full_name, 'User Table', $date, $time]);
   }
?>