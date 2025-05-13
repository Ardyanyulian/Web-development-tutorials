<?php
require "../database/functions.php";
$id = $_GET['id']; 

if(hapus($id) > 0){
    echo "Data Berhasil dihapus";
} else {
    echo "Data tidak berhasil dihapus";
}

?>