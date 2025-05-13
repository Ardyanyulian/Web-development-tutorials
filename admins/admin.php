<?php
$name = $_POST['username'];
$password = $_POST['password'];
require "../database/functions.php";

$produk = queryProduk("SELECT * FROM produk");

if (isset($_POST["search"])) {
    $keyword = $_POST["keyword"];
    $produk = search($keyword);
    
}
$i = 1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 2px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Welcome admins</h1>
    <br>
    <a href="../admins/tambah.php">Tambah</a>
    <br><br>
    <form action="" method="POST">
        <input type="text" name="keyword" id="keyword" width="50">
        <button name="search" id="search" >Search</button>
    </form>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Pengaturan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($produk as $row):?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo  $row['kategori'];?></td>
                    <td><?php echo $row['jumlah']; ?></td>
                    <td>
                            <a href="../admins/hapus.php?id=<?php echo $row['id']; ?>">Hapus</a>
                            <a href="../admins/ubah.php?id=<?php echo $row['id'];?>">Ubah</a>
                    </td>
                </tr>
            <?php 
            endforeach;?>
        </tbody>
    </table>
    <br>
    <a href="../login.php">Log out</a>
</body>
</html>