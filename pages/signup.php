<?php 
require "../database/functions.php";

if (isset($_POST['signup'])) {

    if ($_POST['password'] !== $_POST['confirm']) {
        echo "passsowrd not match". "\n";
    } 

    if (signup($_POST) > 0){
        echo "Success sign up";
    } else {
        echo "Can't sing up";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h1>Silahkan Daftar</h1>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">Username</label><br>
                <input type="text" name="username" id="name">
            </li>
            <br>
            <li>
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password">
            </li>
            <br>
            <li>
                <label for="confirm">Confirm Password</label><br>
                <input type="password" name="confirm" id="confirm">
            </li>
            <li>
                <button name="signup" id="signup">Sign Up</button>
            </li>
        </ul>
    </form>
</body>
</html>