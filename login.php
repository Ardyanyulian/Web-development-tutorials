<?php
    $Pengguna = [
            "nama" => "Iyan",
            "nomor" => "038",
            "gender" => "laki-laki"
    ];
?>
<?php 
if ( isset($_POST['submit'])) { 
    if ($_POST['username'] == 'iyan' && $_POST['password'] == '123'){
        header("Location: admins/admin.php");
        exit;
    } else {
        $error = True;
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>GET</title>
</head>
<body>
    <!-- <h1>Pengguna Profile</h1>
    <ul>        
        <li><a href="database/user.php?nama=<?php echo $Pengguna['nama'] ?>&nomor=<?php echo $Pengguna['nomor'] ?>&gender=<?php echo $Pengguna['gender']?>"><?php echo $Pengguna['nama'] ?></a></li>
    </ul>
    <br> -->
    <h2>REGISTER</h2>
    <?php if (isset($error)): ?>
        <p>Wrong username and password</p>
    <?php endif?>
    <form action="" method="POST">
        <ul>
            <li><p>Username: <input type="text" name="username"></p></li>
            <li><p>Password: <input type="password" name="password"></p></li>
            <li><button type="submit" name="submit">Submit</button>  </li>    
        </ul>
    </form>

</body>
</html>
