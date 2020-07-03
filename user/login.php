<?php

include "../php/connection.php";

$query = "SELECT * FROM client_info";
$stmt = $dbc->query($query);

if (!empty($_POST)) {
    $return_value = false;
    $loginname = $_POST["loginname"];
    $loginpass = $_POST["loginpass"];

    while ($row = $stmt->fetch()) {
        if (!empty($row)) {
            if($loginname == $row["username"] || $loginname == $row["emailAdd"] || $loginname == $row["phoneno"] && password_verify($loginpass, $row["password"])){
                setcookie('client_id', $row['id'], time() + 86400, '/');
                $return_value = true;
                break;
            }
        }
    }
echo $return_value;
}
?>