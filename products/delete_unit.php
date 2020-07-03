<?php
include '../php/connection.php';

if(!empty($_POST)) {
    $id = $_POST["id"];
    $query = "DELETE FROM uom WHERE id = ?";
    $dbc->prepare($query)->execute([$id]);
} 
?>