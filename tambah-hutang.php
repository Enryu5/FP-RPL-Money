<?php
//include('dbconnected.php');
include('koneksi.php');

$jumlah = $_GET['jumlah'];
$tgl_pinjam = $_GET['tgl_pinjam'];
$tenggat = $_GET['tenggat'];
$sumber_hutang = $_GET['sumber_hutang'];


//query update
$query = mysqli_query($koneksi,"INSERT INTO `hutang` (`jumlah`, `tgl_pinjam`, `tenggat`, `sumber_hutang`) VALUES ('$jumlah', '$tgl_pinjam', '$tenggat', '$sumber_hutang')");

if ($query) {
 # credirect ke page index
 header("location:hutang.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>