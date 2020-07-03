<?php
    include '../php/connection.php';

    if (!empty($_POST)) {
        $unitName = $_POST["unitName"];
        $unitDesc = $_POST["unitDesc"];

        $query = "INSERT INTO uom(unit_name, unit_desc) VALUES(?, ?)";
        try {
            if($dbc->prepare($query)->execute([$unitName, $unitDesc]))
            {
                $data = true;
            }
        } catch (PDOException $ex) {
            $data = $ex->getMessage();
        }
    }
?>