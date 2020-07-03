<?php
    include 'php/connection.php';


    $query = 'SELECT address FROM client_info WHERE id = 1';
    $stmt = $dbc->query($query);

    $row = $stmt->fetch();
    echo $row['address'];
   
?>

