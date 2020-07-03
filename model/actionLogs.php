<?php
include '../php/connection.php';

$query = 'SELECT * FROM action_logs';
$stmt = $dbc->query($query);

if (isset($_POST["action"])) {
    $output = '
    <thead>
        <tr>
            <th>description</th>
            <th>Data Affected</th>
            <th>On Table</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
    </thead>';
    while ($row = $stmt->fetch()) {
        $output .= '
        <tr>
            <td>'.$row["description"].'</td>
            <td>'.$row["data_affected"].'</td>
            <td>'.$row["on_table"].'</td>
            <td>'.$row["date"].'</td>
            <td>'.$row["time"].'</td>
        </tr>';
    }
    echo $output;
}

?>