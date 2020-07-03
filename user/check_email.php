<?php
include "../php/connection.php";

    $query = "SELECT user_email FROM user";
    $stmt = $dbc->query($query);
    if(!empty($_POST)) {
        $isTaken = false;
        $checkEmail = $_POST["user_email"];

        while ($row = $stmt->fetch()) {
            if (!empty($row)) {
                if ($row["user_email"] == $checkEmail) {
                    $isTaken = true;
                    break;
                }
            }
        }
    echo $isTaken;
    }
?>