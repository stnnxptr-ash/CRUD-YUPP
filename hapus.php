<?php

require_once 'koneksidatabase.php';

if (isset($GET['id'])) {
    $id = $GET['id'];

    $sql = "DELETE FROM tamu WHERE id = :id";

    $stmt = $koneksi->prepare($sql);

    $stmt->execute([':id' => $id]);

    header("Location:daftar-tamu.php");
    exit();

} else {
    header("Location:daftar-tamu.php");
    exit();
}