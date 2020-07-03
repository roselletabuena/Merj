<?php 
include '../php/connection.php';

if (isset($_POST['id'])) {
    $query = 'SELECT address FROM client_info WHERE id = "'.$_POST['id'].'"';
    $stmt = $dbc->query($query);
    $check = true;
    $row = $stmt->fetch();
    
    if ($row['address'] == '') {
        $check = false;
    }
    echo $check;
}

?>