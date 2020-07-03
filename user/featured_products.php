<?php
include '../php/connection.php';

// $query = 'SELECT o.product_id, p.pro_name, p.pro_image, p,pro_price SUM(o.quantity) as total FROM orders AS o LEFT JOIN product as p ON o.product_id = p.id  GROUP BY o.product_id ORDER BY total DESC LIMIT 10';
// $stmt = $dbc->prepare($query);

$stmt = $dbc->prepare('SELECT p.id, p.pro_name, p.pro_image, p.pro_price ,b.brand_name, c.cat_name, p.pro_desc, p.pro_note FROM product AS p LEFT JOIN category AS c ON c.id = p.pro_cat LEFT JOIN brands AS b ON b.id = p.pro_brand WHERE p.pro_quan > "0" && p.pro_removed = "1"');
$stmt->execute(['Active']); 


if (isset($_POST["action"])) {
    $output = '<div class="your-class" id="content">';
    while ($row = $stmt->fetch()) {
        $output .= '
        <div class="card-view" style="width: 18rem;">';
            if (isset($row["pro_image"]) && !empty($row["pro_image"])) {
                $output .= '<img class="card-img-top img-fluid" width="400px" src="data:image/jpeg;base64,'.base64_encode($row["pro_image"]).'" alt="Card image cap">';
            } else {
                $output .= ' <img class="card-img-top" src="images/noimage.png" alt="Card image cap">';
            }
            $output .= '
                <div class="card-body text-center">
                    <h5 class="card-title">'.$row['pro_name'].'</h5>
                    <p class="card-text">'.$row['pro_price'].'</p>
                    <a href="#" class="btn  addtocart">Add to cart</a>
                </div>
        </div> ';

    }
    $output .= '</div>';
    $output .= '
    <script> 
    $(document).ready(function() {
        $(".your-class").slick({
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
                {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: false
                }
                },
                {
                    breakpoint: 680,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                    },
                {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
                },
                {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
                }
            ]
        });

    )}
    </script>
    ';

    echo $output;
}

?>