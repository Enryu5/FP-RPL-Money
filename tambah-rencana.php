<?php
//include('dbconnected.php');
include('koneksi.php');

$tanggal = $_GET['tanggal'];
$jenis_rencana = $_GET['jenis_rencana'];
$nominal = $_GET['nominal'];
$deskripsi = $_GET['deskripsi'];

//query update
$query = mysqli_query($koneksi,"INSERT INTO `rencana` (`id_rencana`, `tanggal`, `jenis_rencana`, `nominal`, `deskripsi`) VALUES (null, '$tanggal', '$jenis_rencana', '$nominal', '$deskripsi')");

if ($query) {
 # credirect ke page index
 header("location:rencana.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>