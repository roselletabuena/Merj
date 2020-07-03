<?php
include '../php/connection.php';

$stmt = $dbc->prepare("SELECT * FROM supplier WHERE supplier_status=?");
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
            <td>'.$row["supplier_code"].'</td>
            <td>'.$row["company_name"].'</td>
            <td>'.$row["company_add"].'</td>
            <td>'.$row["company_contact"].'</td>
            <td align="center">
                <button class="btn btn-xs btn-info remove" id="'.$row["id"].'">Retrieve</button>
            </td>
            </tr>';
    }
    echo $output;
}

?>
