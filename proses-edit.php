<?php

require_once 'koneksidatabase.php';

if ($_SERVER ['REQUEST_METHOD'] === 'POST'){

$id             = htmlspecialchars($_POST['id']);
$namalengkap    = htmlspecialchars($_POST['nama']);
$alamatemail    = htmlspecialchars($_POST['email']);
$nomorhandphone = htmlspecialchars($_POST['phone']);
$tanggalmasuk   = htmlspecialchars($_POST['tanggal_masuk']);

$sql = "UPDATE tamu 
        SET nama_pelanggan = :nama,
            email_pelanggan = :email,
            nomor_telepon = :phone,
            tanggal_masuk = :tanggal_masuk
        WHERE
        id = :id";

$stmt = $koneksi-> prepare($sql);

$simpan = $stmt->execute([
    ':nama'    => $namalengkap,
    ':email'   => $alamatemail,
    ':phone'   => $nomorhandphone,
    ':tanggal_masuk'     => $tanggalmasuk,
    ':id'     => $id
]);


if ($simpan) { header("Location: daftar-tamu.php"); exit(); } else { echo "Gagal memperbarui data tamu."; }


}
