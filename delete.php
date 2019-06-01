<?php
include 'koneksi.php';
$key = $_POST['id'];

$sql = "DELETE FROM artikel WHERE id_artikel = '$key'";
mysqli_query($conn, $sql);
 
// header("Location: index.php");
mysqli_close($conn);
