<?php
include '../php/connection.php';

$stmt = $dbc->prepare("SELECT DISTINCT c.cat_name, c.id FROM category AS c INNER JOIN product AS p ON p.pro_cat = c.id WHERE p.pro_quan > 0");
$stmt->execute(['Active']); 

if (isset($_POST["action"])) {
    $output = '<li class="pad active"><a href="shop.php" class="text-secondary">All</a></li>';
    while ($row = $stmt->fetch()) { 
        $output .= '<li class="pad"><a href="#"class="category-get" id="'.$row['id'].'" class="text-secondary">'.$row['cat_name'].'</a></li>'; }
}
    echo $output;
?>