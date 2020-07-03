<?php
    include '../php/connection.php';

    if(!empty($_POST)) {
        $output = '';
        $upd_id = $_POST["upd_id"];
        $upd_unitName = $_POST["upd_unitName"];
        $upd_unitDesc = $_POST["upd_unitDesc"];
   
        $query = "UPDATE uom SET unit_name = ?, unit_desc = ? WHERE id = ?";
             if ($dbc->prepare($query)->execute([$upd_unitName, $upd_unitDesc, $upd_id])) {}

   }
?>