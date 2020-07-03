<?php
include '../php/connection.php';

// $query = 'SELECT * FROM supplier';
// $stmt = $dbc->query($query);

$stmt = $dbc->prepare("SELECT * FROM supplier WHERE supplier_status=?");
$stmt->execute(['Active']); 

if (isset($_POST["action"])) {
    $output = '
    <thead>
        <tr>
            <th width ="10%" >Supplier Code</th>
            <th>Company name</th>
            <th width ="40%">Company address</th>
            <th>Contact number</th>
            <th width ="15%">Action</th>
        </tr>
    </thead>';
    while ($row = $stmt->fetch()) {
        $output .= '
            <tr>
            <td>'.$row["supplier_code"].'</td>
            <td>'.$row["company_name"].'</td>
            <td>'.$row["company_add"].'</td>
            <td>'.$row["company_contact"].'</td>
            <td align="center">
                <button class="btn btn-sm btn-info view" id="'.$row["id"].'"><span class="glyphicon glyphicon-eye-open"></span></button>
                <button class="btn btn-sm btn-success update" id="'.$row["id"].'"><span class="glyphicon glyphicon-edit"></span></button>
                <button class="btn btn-sm btn-danger remove delete" id="'.$row["id"].'"><span class="glyphicon glyphicon-trash"></span></button>
            </td>
            </tr>';
    }
    echo $output;
}

?>