<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <h1>Welcome admins</h1>
<?php
$name = $_POST['username'];
$password = $_POST['password'];
echo $name. PHP_EOL;
echo $password
?>
    <a href="../login.php">Log out</a>
</body>
</html>