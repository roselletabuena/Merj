<?php
    include '../php/connection.php';

    if(!empty($_POST)) {
        $output = '';
        $id = $_POST["id"];
   
        $query = "UPDATE supplier SET supplier_status = ? WHERE id = ?";
        $dbc->prepare($query)->execute(['Removed', $id]);
   }
?>