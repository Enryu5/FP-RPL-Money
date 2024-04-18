<?php
//include('dbconnected.php');
session_start();
include('koneksi.php');

$id = $_GET['id_hutang'];
$jumlah = $_GET['jumlah'];
$tgl = $_GET['tgl_pinjam'];
$tenggat = $_GET['tenggat'];
$sumber_hutang = $_GET['sumber_hutang'];

//query update
$query = mysqli_query($koneksi,"UPDATE hutang SET jumlah='$jumlah' , tgl_pinjam='$tgl', tenggat='$tenggat', sumber_hutang='$sumber_hutang' WHERE id_hutang='$id' ");

define('LOG','log.txt');
function write_log($log){  
 $time = @date('[Y-d-m:H:i:s]');
 $op=$time.' '.$log."\n".PHP_EOL;
 $fp = @fopen(LOG, 'a');
 $write = @fwrite($fp, $op);
 @fclose($fp);
}
//jika benar

$namaadmin = $_SESSION['nama'];


if ($query) {
write_log("Nama Admin : ".$namaadmin." => Edit Hutang => ".$id." => Sukses ");
 # credirect ke page index
 header("location:hutang.php?pesan=berhasil_update"); 
}
else{
	write_log("Nama Admin : ".$namaadmin." => Edit hutang => ".$id." => Gagal");
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>