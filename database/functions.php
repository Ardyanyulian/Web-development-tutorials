<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function queryProduk($query){
    $db = new PDO("sqlite:../database/database.db");    
    $query_modified = $db->query($query);
    $rows = [];
    while ($row = $query_modified->fetch(PDO::FETCH_ASSOC)) {
        $rows[] = $row;
    }

    return $rows;
}


function tambah($data) {
    $db = new PDO("sqlite:../database/database.db");
    $name = htmlspecialchars($data['name']);
    $kategori = htmlspecialchars($data['kategori']);
    $jumlah = htmlspecialchars($data['jumlah']);
    $gambar = upload();

    if (!$gambar){
        return false;
    }

    $query = "INSERT INTO produk (name, kategori, jumlah, foto) VALUES (:name , :kategori, :jumlah, :foto)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':kategori', $kategori);
    $stmt->bindParam(':jumlah', $jumlah);
    $stmt->bindParam(':foto', $gambar); 

    $stmt->execute();
    return $stmt->rowCount();
}

function signup($user) {
    $db = new PDO('sqlite:../database/database.db');

    $username = htmlspecialchars($user['username']);
    $password = htmlspecialchars($user['password']);
    $confirm = htmlspecialchars($user['confirm']);

    if ($password !== $confirm){
        return false;
    }

    $query = "SELECT username FROM users";
    $search = $db->query($query);
    $check_username = $search->fetchALL(PDO::FETCH_COLUMN, 0);
    foreach ($check_username as $row) {
        if ($row === $username) {
            echo "Username already exist". "\n";
            return false;
        }
    }
    
    $password = password_hash($password, PASSWORD_DEFAULT);
    $add = "INSERT INTO users (username , password ) VALUES (:username , :password)";
    $stmts = $db->prepare($add);
    $stmts->bindParam(':username', $username);
    $stmts->bindParam(':password', $password);

    $stmts->execute();
    return $stmts->rowCount();
}

function hapus($id){
    $db = new PDO("sqlite:../database/database.db");
    $query = "DELETE FROM produk WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}



function ubah($data){
    $db = new PDO("sqlite:../database/database.db");
    $id = $data['id'];
    $name = $data['name'];
    $kategori = $data['kategori'];
    $jumlah = $data['jumlah'];

    $query = "UPDATE produk SET 
                name = '$name',
                kategori = '$kategori', 
                jumlah = '$jumlah'
                Where id = $id";
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->rowCount();   
}





function search($keyword) {
    $search = "SELECT * FROM produk
            WHERE name LIKE '%$keyword%' OR
            kategori LIKE '%$keyword%' ";

    return queryProduk($search);
}


function upload() {
    $name = $_FILES['gambar']['name'];
    $type = $_FILES['gambar']['type'];
    $tmpNama = $_FILES['gambar']['tmp_name'];
    $error = $_FILES['gambar']['error'];
    $size = $_FILES['gambar']['size'];

    if ($error == 4){
        echo "File tidak boleh kosong";
        return false;
        exit;
    }
    $validations = ['image/jpg', 'image/png' , 'image/jpeg'];
    if ( !in_array($type, $validations)){
        echo "Format gambar tidak diterima";
        return false;
        exit;
    }

    $name_validation = ['jpg', 'png', 'jpeg'];
    $pisah_gambar = explode('.', $name);
    $sesuaikan_gambar = strtolower(end($pisah_gambar));
    if (!in_array($sesuaikan_gambar, $name_validation)){
        echo  "Format tidak sesuai";
        return false;
        exit;
    }

    if ($size > 7000000) {
        echo "Ukuran gambar terlalu besar";
        return false;
        exit;
    }

    $rand_name = uniqid();
    $rand_name .= ".";
    $rand_name .= $sesuaikan_gambar;


    move_uploaded_file($tmpNama, '../images/' . $rand_name);
    return "../images/". $rand_name;

} 



?> 
