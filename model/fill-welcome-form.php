<?php

include '../php/connection.php';

$fetchData = array();

$query = 'SELECT * FROM welcome_note';
$stmt = $dbc->query($query);

if (isset($_POST)) {
    while($row = $stmt->fetch()) {
    array_push($fetchData, $row);
    }
}

echo json_encode($fetchData);

?>