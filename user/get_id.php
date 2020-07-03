<?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        setcookie('prod_id', $id, time() + 86400, '/');
        echo $id;
    }
?>