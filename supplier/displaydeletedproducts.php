<?php
include '../php/connection.php';

$stmt = $dbc->prepare("SELECT * FROM product WHERE pro_removed=?");
$stmt->execute(['Removed']); 

if (isset($_POST["action"])) {
    $output = '
    <thead>
    <tr>
    <th width ="10%">SKU</th>
    <th>Image</th>
    <th>Product Name</th>
    <th>Category</th>
    <th>Brand</th>
    <th>Quantity</th>
    <th>Status</th>
    <th width ="5%">Actions</th>
</tr>
    </thead>';
    while ($row = $stmt->fetch()) {
        $output .= '
            <tr>
            <td>'.$row["id"].'</td>
            <td>
            <center>';
            if (isset($row["pro_image"]) && !empty($row["pro_image"])) {
              $output .= '<img src="data:image/jpeg;base64,'.base64_encode($row["pro_image"]).'" class="image-cover" alt="image" height="100">';
            } else {
                $output .= '<img src="../images/noimage.png" alt="image" class="image-cover">';
            }
            $output .='

            <td>'.$row["pro_name"].'</td>
            <td>'.$row["pro_cat"].'</td>
            <td>'.$row["pro_brand"].'</td>
            <td>'.$row["pro_quan"].'</td>
            <td><span style="color:rgb(27, 161, 56)"><strong>Deleted</strong></span></td>
            <td align="center">
                <button class="btn btn-xs btn-info remove" id="'.$row["id"].'">Retrieve</button>
            </td>
            </tr>';
    }
    echo $output;
}

?>
