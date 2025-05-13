<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../database/functions.php';

$id = $_GET['id'];
$produk = "SELECT * FROM produk WHERE id = $id";
$stmt = queryProduk($produk);
$stmt_modified = $stmt[0]; 


if (isset($_POST['submit'])) {
    if (ubah($_POST) > 0){
        echo "data berhasil diubah";
    } else  {
        echo "data tidak berhasil diubah";
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Page</title>
</head>
<body>
    <h1>Menu Pengubahan</h1>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $stmt_modified['id']?>">
        <ul>
            <li>
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" required value="<?php echo $stmt_modified['name']; ?>">
            </li>
            <li>
                <label for="kategori">Kategori: </label>
                <input type="text" name="kategori" id="kategori" value="<?php  echo $stmt_modified['kategori'];?>">
            </li>
            <li>
                <label for="jumlah">Jumlah: </label>
                <input type="text" name="jumlah" id="jumlah" value="<?php echo $stmt_modified['jumlah']; ?>">
            </li>
            <li>
                <button name="submit" id="submit">Submit</button>
            </li>
        </ul>
    </form>
</body>
</html>
