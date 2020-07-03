<?php
include '../php/connection.php';

$stmt = $dbc->prepare("SELECT * FROM admin_user WHERE status=?");
$stmt->execute(['1']); 

if (isset($_POST["action"])) {
    $output = '
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Username</th>
            <th>Contact</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>';
    while ($row = $stmt->fetch()) {
        $output .= '
        <tr>
            <td>'.$row["full_name"].'</td>
            <td>'.$row["username"].'</td>
            <td>'.$row["contact"].'</td>';

            if ($row['status'] == 1) {
                $output .= '<td>Active</td>';
            } else {
                $output .= '<td>Inactive</td>';
            }

        $output .= '
            <td>
                <center>
                    <button class="btn btn-sm btn-danger delete delete_user" id="'.$row["id"].'"><span class="glyphicon glyphicon-trash"></span> Remove</button>
                </center>
            </td>
        </tr>';
    }
    echo $output;
}

?>