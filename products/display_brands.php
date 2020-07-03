<?php
include '../php/connection.php';

$query = 'SELECT * FROM brands';
$stmt = $dbc->query($query);

if (isset($_POST["action"])) {
    $output = '
    <thead>
        <tr>
            <th>Brand name</th>
            <th>Brand Description</th>
            <th width ="10%">Action</th>
        </tr>
    </thead>';
    while ($row = $stmt->fetch()) {
        $output .= '
        <tr>
            <td>'.$row["brand_name"].'</td>
            <td>'.$row["brand_desc"].'</td>
            <td>
                <center>
                    <button class="btn btn-sm btn-success update_brand update" id="'.$row["ID"].'"><span class="glyphicon glyphicon-edit"></span></button>
                    <button class="btn btn-sm btn-danger delete_brand delete" id="'.$row["ID"].'"><span class="glyphicon glyphicon-trash"></span></button>
                </center>
            </td>
        </tr>';
    }
    echo $output;
}

?>