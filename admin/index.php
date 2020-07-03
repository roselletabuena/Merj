<?php
if (isset($_COOKIE['user_id'])) {
    header("Location: nav_bar.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../vendors/package/dist/sweetalert2.min.css">
    <title>Login</title>
</head>
<body>
    <form id="login" class="box">
        <input type="text" name="username" id="username" placeholder="Username" required>
        <input type="password" name="userpass" id="userpass" placeholder="Password" required>
        <input type="submit"  value="Login">
    </form>
</body>
    <script src="../vendors/js/jquery.min.js"></script>
    <script src="../vendors/package/dist/sweetalert2.min.js"></script>
    <script src="../vendors/package/dist/sweetalert2.js"></script>
    <script src="../controllers/log_in.js"></script>
</html>