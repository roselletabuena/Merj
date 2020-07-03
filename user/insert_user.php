<?php
include "../php/connection.php";

if (!empty($_POST)) {
    $data = '';
    $phone = $_POST["phone"];
    $fullname = ucwords($_POST["fullname"]);
    $username = $_POST["username"];
    $email = $_POST["emailAdd"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $query = "INSERT INTO client_info(phoneno, fullname, username, emailAdd, password) VALUES(?, ?, ?, ?, ?)";
    
    try {
        if($dbc->prepare($query)->execute([$phone, $fullname, $username, $email, $password]))
        {
            $data = true;
        }
    } catch (PDOException $ex) {
        $data = $ex->getMessage();
    }

    echo $data;
}
?>