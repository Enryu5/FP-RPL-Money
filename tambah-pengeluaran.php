<?php
//include('dbconnected.php');
include('koneksi.php');

$id = (int) $_GET['id_pengeluaran'];
$tgl_pengeluaran = $_GET['tgl_pengeluaran'];
$jumlah = $_GET['jumlah'];
$transaksi = $_GET['transaksi'];

//query update
$query = mysqli_query($koneksi, "INSERT INTO `pengeluaran` (`id_pengeluaran`, `tgl_pengeluaran`, `jumlah`, `transaksi`) VALUES ('$id', '$tgl_pengeluaran', '$jumlah', '$transaksi')");

if ($query) {
 # credirect ke page index
 header("location:pengeluaran.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>