<?php


require_once 'koneksidatabase.php';

if (!isset($_GET['id'])) {
 header("Location : daftar-tamu.php");
 exit();
}

$id= $_GET['id'];

$sql = "SELECT*FROM tamu WHERE id = :id";
$stmt = $koneksi-> prepare($sql);
$stmt->execute(['id' => $id ]);

$tamu = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$tamu) {
 header("Location : daftar-tamu.php");
 exit();
} ?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Tamu</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f0f2f5; display: flex; justify-content: center; padding: 40px; }
        .container { background: #fff; padding: 30px; border-radius: 12px; width: 100%; max-width: 500px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; display: flex; flex-direction: column; }
        label { margin-bottom: 5px; font-weight: bold; }
        input { padding: 10px; border: 1px solid #ccc; border-radius: 6px; }
        button { background: #0284c7; color: white; border: none; padding: 12px; border-radius: 6px; font-weight: bold; cursor: pointer; }
        a { text-align: center; display: block; margin-top: 10px; color: #666; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Data Tamu</h2>

        <form action="proses-edit.php" method="post">
            <!-- Input Hidden: Menyimpan ID tanpa terlihat di layar -->
            <input type="hidden" name="id" value="<?= $tamu['id']; ?>">

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" 
                       value="<?= htmlspecialchars($tamu['nama_pelanggan']); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" 
                       value="<?= htmlspecialchars($tamu['email_pelanggan']); ?>" required>
            </div>

            <div class="form-group">
                <label for="phone">Nomor HP</label>
                <input type="tel" id="phone" name="phone" 
                       value="<?= htmlspecialchars($tamu['nomor_telepon']); ?>" required>
            </div>

            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk</label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk" 
                       value="<?= htmlspecialchars($tamu['tanggal_masuk']); ?>" required>
            </div>

            <button type="submit">Simpan Perubahan</button>
            <a href="daftar-tamu.php">Batal</a>
        </form>
    </div>
</body>
</html>



