<?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        setcookie('cat_id', $id, time() + 86400, '/');
        echo $id;
    }
?>