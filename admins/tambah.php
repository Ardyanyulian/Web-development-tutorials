<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "../database/functions.php";


if (isset($_POST['submit']))
{
    $Error = [];
    if (empty($_POST['name'])){
        $Error['name'] = 'Wajib Diisi';
    }
    if (empty($_POST['kategori'])) {
        $Error['kategori'] = 'Wajib Disisi';
    }
    if (empty($_POST['jumlah'])) {
        $Error['jumlah'] = 'Wajib Disisi';
    }
    if(empty($Error)){
        if (tambah($_POST) > 0){
            echo 'Data Berhasil Ditambahkan';
        } else { 
            echo  'Data Tidak berhasil ditambahkan';   
        }
    } else {
        foreach ($Error as $value => $key){
            echo "- ". $key;
        }
    }  
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Tambah Produk</title>
</head>
<body>
    <h1>Add Products</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="name">Name :</label>
                <input type="text" name='name' id="name" required>
            </li>
            <li>
                <label for="kategori">Kategori :</label>
                <input type="text"  name='kategori' id="kategori" required>
            </li>
            <li>
                <label for="jumlah">Jumlah :</label>
                <input type="text" name='jumlah' id="jumlah" required>
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" id="gambar" required>
            </li>
            <li>
                <button type="submit" name="submit">Submit !</button>
            </li>
        </ul>     
    </form>
    <?php ?>
    
</body>
</html>