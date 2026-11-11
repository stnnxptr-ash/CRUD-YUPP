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
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f0f2f5;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }

        .container {
            background-color: #ffffff;
            width: 100%;
            max-width: 900px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .header h2 {
            color: #1a1a1a;
        }

        .btn-tambah {
            background-color: #0284c7;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            transition: background-color 0.2s;
        }

        .btn-tambah:hover {
            background-color: #0369a1;
        }

        /* Styling Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 14px 16px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
        }

        th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 600;
        }

        /* Efek hover lembut saat baris disorot kursor */
        tr:hover {
            background-color: #f8fafc;
        }

        .empty-state {
            text-align: center;
            padding: 30px;
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>DAFTAR KUNJUNGAN TAMU</h2>
            <a href="index.html" class="btn-tambah">+ isi Buku Tamu</a>
        </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan </th>
                <th>Alamat Email </th>
                <th>Nomor Telepon</th>
                <th>Tanggal Masuk</th>
                <th>Aksi</th>
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
                    <td>
                        <a href="hapus.php?id=<?= $tamu['id'];?>" 
                        onclick="return confirm('Apakah kamu yakin akan menghapus data tamu ini?');"
                        style="color: #ef4444; text-decoration: none; font-weight : 600;">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

