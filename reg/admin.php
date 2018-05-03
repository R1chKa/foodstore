<?php 
require('../db.php');

if ($_SESSION['logged_user']['role'] == 'admin') {
    echo $_SESSION['logged_user']['role'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
<a href="logout.php">Logout</a>
</body>
</html>