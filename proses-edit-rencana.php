<?php
//include('dbconnected.php');
include('koneksi.php');

$id = $_GET['id_rencana'];
$tanggal = $_GET['tanggal'];
$jenis_rencana = $_GET['jenis_rencana'];
$nominal = $_GET['nominal'];
$deskripsi = $_GET['deskripsi'];

//query update
$query = mysqli_query($koneksi,"UPDATE rencana SET tanggal='$tanggal' , jenis_rencana='$jenis_rencana', nominal='$nominal', deskripsi='$deskripsi' WHERE id_rencana='$id' ");

if ($query) {
 # credirect ke page index
 header("location:rencana.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysql_error();
}

//mysql_close($host);
?>