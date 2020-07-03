<?php
    include '../php/connection.php';

    if(!empty($_POST)) {
        $output = '';
        $upd_id = $_POST["upd_id"];
        $updBrandName = $_POST["updBrandName"];
        $updBrandDesc = $_POST["updBrandDesc"];
   
        $query = "UPDATE brands SET brand_name = ?, brand_desc = ? WHERE id = ?";
             if ($dbc->prepare($query)->execute([$updBrandName, $updBrandDesc, $upd_id])) {}

        $date = date('Y-m-d'); 
        $time = date('H:i:s');
        $insertActionLog = "INSERT INTO action_logs (description, data_affected, on_table, date, time) VALUES (?,?,?,?,?)";
        $dbc->prepare($insertActionLog)->execute(['Updated', $updBrandName, 'Brand Table', $date, $time]);

   }
?>