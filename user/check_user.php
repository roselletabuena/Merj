<?php
include "../php/connection.php";

    $query = "SELECT username FROM user";
    $stmt = $dbc->query($query);
    if(!empty($_POST)) {
        $isTaken = false;
        $checkUser = $_POST["username"];

        while ($row = $stmt->fetch()) {
            if (!empty($row)) {
                if ($row["username"] == $checkUser) {
                    $isTaken = true;
                    break;
                }
            }
        }
    echo $isTaken;
    }
?>