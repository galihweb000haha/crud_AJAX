<?php
include 'koneksi.php';
$judul = $_POST['judul_artikel'];
$isi = $_POST['isi_artikel'];
$id = $_GET['id'];

$sql = "UPDATE artikel SET judul_artikel='$judul', isi_artikel='$isi' WHERE id_artikel=$id";
mysqli_query($conn, $sql);


mysqli_close($conn);
