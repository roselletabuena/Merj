<?php
include '../php/connection.php';

if (!empty($_POST)) {
    $parent_name = $_POST["parent_name"];
    $parent_desc = $_POST["parent_desc"];

    $query = "INSERT INTO parent_category (parent_name, parent_desc) VALUES(?, ?)";
    try {
        if($dbc->prepare($query)->execute([$parent_name, $parent_desc]))
        {
            $data = true;
        }
    } catch (PDOException $ex) {
        $data = $ex->getMessage();
    }
}
?>