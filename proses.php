<?php

require_once 'koneksidatabase.php';


$_SERVER['REQUEST_METHOD'] === 'POST';


$namalengkap = htmlspecialchars($_POST ['nama']);
$alamatemail = htmlspecialchars($_POST ['email']);
$nomorhandphone = htmlspecialchars($_POST ['phone']);
$tanggalmasuk = htmlspecialchars($_POST ['tanggal_masuk']);



$sql = "INSERT INTO tamu (nama_pelanggan, email_pelanggan, nomor_telepon, tanggal_masuk)
VALUES (:nama_pelanggan, :email_pelanggan, :nomor_telepon, :tanggal_masuk)";


$stmt = $koneksi->prepare($sql);

$simpan = $stmt->execute([
    ':nama_pelanggan' => $namalengkap,
    ':email_pelanggan'=> $alamatemail,
    ':nomor_telepon' => $nomorhandphone,
    ':tanggal_masuk' => $tanggalmasuk
]);


if ($simpan) {

echo "<div style='font-family: sans-serif; text-align: center; margin-top: 50px;'>";
echo "<h2> Terimakasih, data tamu berhasil disimpan!</h2>";
echo "<a href='index.html'>← Kembali ke Formulir</a>";


} else {
    echo "silahkan isi formulir ini dahulu";
}