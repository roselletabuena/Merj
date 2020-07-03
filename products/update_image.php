<?php 

include '../php/connection.php';

if (isset($_FILES['upd_display_pic']['name'])){
    $id = $_POST['upd_id'];
    $file = file_get_contents($_FILES['upd_display_pic']['tmp_name']);

    $query = "UPDATE product SET pro_image = ? WHERE id = ?";
    $dbc->prepare($query)->execute([$file, $id]);
}

?>