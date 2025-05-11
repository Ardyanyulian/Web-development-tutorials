<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Profile User with GET</h2>
    <ul>
        <li><?php echo $_GET['nama']; ?></li>
        <li><?php echo $_GET['nomor']; ?></li>
        <li><?php echo $_GET['gender']; ?></li>
    </ul>
    
    <a href="../index.php">Back</a>
</body>
</html>