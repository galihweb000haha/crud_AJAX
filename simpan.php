<?php
include 'koneksi.php';

if(isset($_POST['judul_artikel'])){
    $judul_artikel = $_POST['judul_artikel'];    
    $id_kategori = 14;
    $id_user = 4;
    $isi_artikel = $_POST['isi_artikel'];
    $gambar_artikel = 'askdjalskdj.jpg';
    $hits = 10;

}
mysqli_query($conn, "INSERT INTO artikel VALUES ('','$judul_artikel',NOW(),14,4,'$isi_artikel','$gambar_artikel',10)");

mysqli_close($conn);