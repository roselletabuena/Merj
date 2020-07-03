<?php
include '../php/connection.php';

$stmt = $dbc->prepare('SELECT p.id, p.pro_name, p.pro_image, p.pro_price ,b.brand_name, c.cat_name, p.pro_desc, p.pro_note FROM product AS p LEFT JOIN category AS c ON c.id = p.pro_cat LEFT JOIN brands AS b ON b.id = p.pro_brand WHERE p.pro_quan > "0" && p.pro_removed = "1"');
$stmt->execute(['Active']); 

if (isset($_POST["action"])) {
    $output = '';
    while ($row = $stmt->fetch()) {

        $output .= '
        <div class="col-lg-3 mb-3">
            <div class="content">
                <a href="#">
                    <div class="card">';
                    if (isset($row["pro_image"]) && !empty($row["pro_image"])) {
                        $output .= '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($row["pro_image"]).'" alt="Card image cap">';
                    } else {
                        $output .= '<img src="../images/noimage.png" alt="image" class="image-cover">';
                    }

        $output .= '
                        <div class="card-body">
                            <p><strong>'.$row["pro_name"].'</strong></p>
                            <p class="card-text">&#8369; '.$row["pro_price"].'</p>

                            <input type="hidden" name="quantity" id="quantity'.$row["id"] .'" class="form-control" value="1" />
                            <input type="hidden" name="hidden_name" id="name'.$row["id"].'" value="'.$row["pro_name"].'" />
                            <input type="hidden" name="hidden_price" id="price'.$row["id"].'" value="'.$row["pro_price"].'" />
                        </div>
                    </div>
                    <div class="content-overlay"></div>
                    <div class="content-details fadeIn-bottom">
                        <button class="btn btn-outline-light btn-sm add" id="'.$row["id"].'">Add to Cart</button>
                        <button class="btn btn-outline-light btn-sm view" id="'.$row["id"].'">View Product</button>
                    </div>
                </a>
            </div>
        </div>
        ';
    }
    echo $output;
}
?>