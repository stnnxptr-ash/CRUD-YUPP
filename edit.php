<?php

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
}