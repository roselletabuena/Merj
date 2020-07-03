<?php
include '../php/connection.php';

$query = 'SELECT * FROM category';
$stmt = $dbc->query($query);

if (isset($_POST["action"])) {
    $output = '
    <thead>
        <tr>
            <th><center>Category Name</center></th>
            <th width ="50%"><center>Category Description</center></th>
            <th width ="10%"><center>Action</center></th>
        </tr>
    </thead>';
    while ($row = $stmt->fetch()) {
        $output .= '
        <tr>
            <td><center>'.$row["cat_name"].'</center></td>
            <td><center>'.$row["cat_desc"].'</center></td>
            <td>
            <center>
                <button class="btn btn-sm btn-success update_cat update" id="'.$row["id"].'"><i class="fas fa-edit"></i></button>
                <button class="btn btn-sm btn-danger delete_cat delete" id="'.$row["id"].'"><i class="fas fa-trash-alt"></i></button>
            </center>
            </td>
        </tr>';
    }
    echo $output;
}

?>