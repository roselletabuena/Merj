<?php
    include '../php/connection.php';

if(!empty($_POST)) {
    $output = '';
    $id = $_POST["id"];

    $query = "UPDATE product SET pro_removed = ? WHERE id = ?";
    $dbc->prepare($query)->execute(['0', $id]);
}
?>