<?php

session_start();

include('koneksi.php');

$id = $_GET['id_pengeluaran'];
$tgl =  $_GET['tgl_pengeluaran'];
$jumlah =  $_GET['jumlah'];
$transaksi = $_GET['transaksi'];

//query update
$query = mysqli_query($koneksi,"UPDATE pengeluaran SET tgl_pengeluaran='$tgl' , jumlah='$jumlah', transaksi='$transaksi' WHERE id_pengeluaran='$id' ");

define('LOG','log.txt');
function write_log($log){  
 $time = @date('[Y-d-m:H:i:s]');
 $op=$time.' '.$log."\n".PHP_EOL;
 $fp = @fopen(LOG, 'a');
 $write = @fwrite($fp, $op);
 @fclose($fp);
}

$namaadmin = $_SESSION['nama'];
if ($query) {
write_log("Nama Admin : ".$namaadmin." => Edit pengeluaran => ".$id." => Sukses Edit");
 # credirect ke page index
 header("location:pengeluaran.php"); 
}
else{
write_log("Nama Admin : ".$namaadmin." => Edit pengeluaran => ".$id." => Gagal Edit");
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>