<?php

// 1\. Panggil file jembatan koneksi 
// 2\. Cek apakah ada data yang dikirim dari form 
// 3\. Ambil data nama, email, dan pesan 
// 4\. Bikin surat perintah SQL dengan wadah titik dua 
// 5\. Siapkan jalurnya (prepare) 
// 6\. Masukkan datanya dan kirim (execute)


$host = "localhost";
$dbname = "bukutamu_db";
$username = "root";
$password = "";

try{

$koneksi = new PDO ("mysql:host=$host;dbname=$dbname" , $username, $password);

$koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//echo "koneksi ke database berhasil";


} catch (PDOException $e) {
    die("Koneksi gagal : " . $e->getMessage());
}