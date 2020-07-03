<?php

include "../php/connection.php";

$query = "SELECT * FROM admin";
$stmt = $dbc->query($query);

if (!empty($_POST)) {
    $return_value = false;
    $username = $_POST["username"];
    $password = $_POST["password"];

    while ($row = $stmt->fetch()) {
        if (!empty($row)) {
            if($username == $row["admin_username"] && $password == $row["admin_password"]){
                $return_value = true;
                break;
            }
        }
    }
echo $return_value;
}
?>