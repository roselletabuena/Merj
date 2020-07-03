<?php

include "../php/connection.php";

$query = "SELECT * FROM admin_user";
$stmt = $dbc->query($query);

if (!empty($_POST)) {
    $return_value = false;
    $username = $_POST["username"];
    $userpass = $_POST["userpass"];

    while ($row = $stmt->fetch()) {
        if (!empty($row)) {
            if($username == $row["username"] && password_verify($userpass, $row["password"])){
                
                setcookie('user_id', $row['id'], time() + 86400, '/');
                setcookie('username', $row['username'], time() + 86400, '/');
                
                $return_value = true;
                break;
            }
        }
    }
echo $return_value;
}
?>