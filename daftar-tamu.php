<?php

require_once 'koneksidatabase.php';
$sql= "SELECT*FROM tamu ORDER BY id DESC";
$stmt =  $koneksi ->query($sql);
$semuatamu= $stmt->fetchAll(PDO::FETCH_ASSOC);

$no = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku Tamu</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan </th>
                <th>Alamat Email </th>
                <th>Nomor Telepon</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($semuatamu as $tamu) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?=  htmlspecialchars($tamu['nama_pelanggan']); ?></td>
                    <td><?= htmlspecialchars($tamu['email_pelanggan']); ?></td>
                    <td><?= htmlspecialchars($tamu['nomor_telepon']); ?></td>
                    <td><?= htmlspecialchars($tamu ['tanggal_masuk']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

