<?php
    include '../php/connection.php';

    if (!empty($_POST)) {
        $brand_name = $_POST["brand_name"];
        $brand_desc = $_POST["brand_desc"];

        $query = "INSERT INTO brands (brand_name, brand_desc) VALUES(?, ?)";
        try {
            if($dbc->prepare($query)->execute([$brand_name, $brand_desc]))
            {
                $data = true;
            }
        } catch (PDOException $ex) {
            $data = $ex->getMessage();
        }

        $date = date('Y-m-d'); 
        $time = date('H:i:s');
        $insertActionLog = "INSERT INTO action_logs (description, data_affected, on_table, date, time) VALUES (?,?,?,?,?)";
        $dbc->prepare($insertActionLog)->execute(['Added', $brand_name, 'Brand Table', $date, $time]);
    }
?>