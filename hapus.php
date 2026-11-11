<?php

require_once 'koneksidatabase.php';

//ini tuh kaya ngecek apakah di ada id nah kalo ada kode akn di ekssekusi 
//dan dihapus table dari kode kita yangotomatis terhubng itu ke database
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tamu WHERE id = :id";

    $stmt = $koneksi->prepare($sql);

    $stmt->execute([':id' => $id]);

    header("Location:daftar-tamu.php");
    exit();

} else {
    header("Location:daftar-tamu.php");
    exit();
}