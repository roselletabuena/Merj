<?php
include '../php/connection.php';

$query = 'SELECT p.pro_sku, p.pro_image, p.pro_name, c.cat_name, b.brand_name, p.pro_status, p.pro_quan, p.id FROM product AS p LEFT JOIN category AS c ON c.id = p.pro_cat LEFT JOIN brands AS b ON b.id = p.pro_brand WHERE p.pro_removed = 1';
$stmt = $dbc->query($query);

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
                <td>'.$row["pro_sku"].'</td>
                <td>
                <center>';
                    if (isset($row["pro_image"]) && !empty($row["pro_image"])) {
                      $output .= '<img src="data:image/jpeg;base64,'.base64_encode($row["pro_image"]).'" class="image-cover" alt="image" height="100">';
                    } else {
                        $output .= '<img src="../images/noimage.png" alt="image" class="image-cover">';
                    }
                $output .='
                </center>
                </td>
                <td>'.$row["pro_name"].'</td>
                <td>'.$row["cat_name"].'</td>
                <td>'.$row["brand_name"].'</td>
                <td>'.$row["pro_quan"].'</td>
                <td><p class="';

                if ($row["pro_quan"] == 0) {
                    $query = 'UPDATE product SET  pro_status = ? WHERE id = "'.$row["id"].'"';
                    $dbc->prepare($query)->execute(['Out of stock']);
                    $output .= 'text-center cancelled">';
                } else if ($row["pro_quan"] <= 5) {
                    $query = 'UPDATE product SET  pro_status = ? WHERE id = "'.$row["id"].'"';
                    $dbc->prepare($query)->execute(['Danger']);
                    $output .= 'text-center cancelled">';
                } else {
                    $query = 'UPDATE product SET  pro_status = ? WHERE id = "'.$row["id"].'"';
                    $dbc->prepare($query)->execute(['Available']);
                    $output .= 'text-center complete">';
                }
                $output .= '
                '.$row["pro_status"].'
                </p></td>
                <td align="center">
                <select class="form-control action input-sm" id="'.$row["id"].'" name="action">
                    <option value="" style="display:none" disabled selected>Action</option>
                    <option value="view">View</option>
                    <option value="update">Update</option>
                    <option value="remove">Remove</option>
                </select>
                </td>
            </tr>';

            

    }
    
echo $output;
}


?>

