<?php
include '../php/connection.php';

$stmt = $dbc->prepare("SELECT * FROM admin_user WHERE status=?");
$stmt->execute(['Removed']);  

if (isset($_POST["action"])) {
    $output = '
    <thead>
        <tr>
            <th width ="10%" >Supplier Code</th>
            <th>Company name</th>
            <th width ="40%">Company address</th>
            <th>Contact number</th>
            <th width ="10%">Action</th>
        </tr>
    </thead>';
    while ($row = $stmt->fetch()) {
        $output .= '
            <tr>
            <td>'.$row["id"].'</td>
            <td>'.$row["full_name"].'</td>
            <td>'.$row["username"].'</td>
            <td>'.$row["contact"].'</td>

            <td align="center">
                <button class="btn btn-xs btn-info remove" id="'.$row["id"].'">Retrieve</button>
            </td>
            </tr>';
    }
    echo $output;
}

?>
