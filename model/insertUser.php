<?php
include '../php/connection.php';

if (!empty($_POST)) {
    $full_name = $_POST["full_name"];
    $username = $_POST["username"];
    $user_con = $_POST["user_con"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $query = "INSERT INTO admin_user (full_name, username, contact, password, status) VALUES(?, ?, ?, ?, ?)";
    try {
        if($dbc->prepare($query)->execute([$full_name, $username, $user_con, $password, 'Active']))
        {
            $data = true;
        }
    } catch (PDOException $ex) {
        $data = $ex->getMessage();
    }
    $date = date('Y-m-d'); 
    $time = date('H:i:s');
    $insertActionLog = "INSERT INTO action_logs (description, data_affected, on_table, date, time) VALUES (?,?,?,?,?)";
    $dbc->prepare($insertActionLog)->execute(['Added', $full_name, 'User Table', $date, $time]);
}
?>  