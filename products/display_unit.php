<?php
include '../php/connection.php';

$query = 'SELECT * FROM uom';
$stmt = $dbc->query($query);

if (isset($_POST["action"])) {
    $output = '
    <thead>
        <tr>
            <th>ID</th>
            <th>Unit of Measurement</th>
            <th width ="50%">Description</th>
            <th>Action</th>
        </tr>
    </thead>';
    while ($row = $stmt->fetch()) {
        $output .= '
        <tr>
            <td>'.$row["id"].'</td>
            <td>'.$row["unit_name"].'</td>
            <td>'.$row["unit_desc"].'</td>
            <td>
                <center>
                    <button class="btn btn-xs btn-success update_unit update" id="'.$row["id"].'"><span class="glyphicon glyphicon-edit"></span></button> &nbsp;
                    <button class="btn btn-xs btn-danger delete_unit delete" id="'.$row["id"].'"><span class="glyphicon glyphicon-trash"></span></button>
                </center>
            </td>
        </tr>';
    }
    echo $output;
}

?>