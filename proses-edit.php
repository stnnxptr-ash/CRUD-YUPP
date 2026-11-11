<?php

require_once 'koneksidatabase.php';

$_SERVER ['REQUEST_METHOD'] === '$_POST';

$namalengkap = htmlspecialchars($_POST['nama']);
$alamatemail = htmlspecialchars($_POST['email']);
$nomorhandphone = htmlspecialchars($_POST['phone']);
$tanggalmasuk = htmlspecialchars($_POST['tanggal_masuk']);

$sql = "UPDATE tamu 
        SET
        'nama_lengkap' = :nama,
        'email_pelanggan' = :email,
        'nomor_telepon' = :phone,
        'tangal_masuk' = :tanggal_masuk
        WHERE
        id = :id";

$stmt=$koneksi-> prepare($sql);

$simpan = $stmt->execute([
    'nama_lengkap' => $namalengkap,
    'email_pelanggan' => $alamatemail,
    'nomor_pelanggan' => $nomorhandphone,
    'tanggal_masuk' => $tanggalmasuk
]);


if ($simpan) { 
    echo "<div>"; echo "<h2>Terima kasih, data tamu berhasil diedit!</h2>";
    echo "<a href='daftar-tamu.php'>← Lihat Daftar Tamu</a> | ";
    echo "<a href='index.html'>Isi Form Lagi</a>"; 
    echo "</div>"; 
} else { 
        echo "<div>";
        echo "<h3>Silakan isi formulir pendaftaran terlebih dahulu.</h3>";
        echo "<a href='index.html'>← Ke Formulir</a>";
        echo "</div>";
         } 




