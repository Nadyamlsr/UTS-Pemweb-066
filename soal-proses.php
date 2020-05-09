<?php
include "config/koneksi.php";

$status = @$_POST['status'];

$id		= @$_POST['txtsoal'];
$isi	= @$_POST['txtisi'];
	
switch($status) {
	case 'add':
		$tambah	= mysqli_query ($conn,"INSERT INTO soal VALUES ('$id','$isi')")or die (mysqli_error());
		if ($tambah=true){
			echo"<script>alert('Tambah Data Berhasil');</script>";
		}else {
			echo"<script>alert('Tambah Data Tidak Berhasil');</script>";
		}
	break;
	
	case 'edit':
		$edit	= "UPDATE soal SET nama_soal='$nama'";
		$edit .="WHERE id_soal='$id'";
		$edit	= mysqli_query($conn,$edit) or die (mysqli_error());
		if ($edit=true){
			echo"<script>alert('Update Data Berhasil');</script>";
		}else {
			echo"<script>alert('Update Data Tidak Berhasil');</script>";
		}
	break;
	
	default:
	$id =$_GET['kode_soal'];
	$tambah	= mysqli_query ($conn,"DELETE FROM soal WHERE kode_soal ='$id'")or die (mysql_error());
		if ($tambah=true){
			echo"<script>alert('Delete Data Berhasil');</script>";
		}else {
			echo"<script>alert('Delete Data Tidak Berhasil');</script>";
		}
	break;
}
?>
<meta http-equiv="refresh" content="0; url=index.php?pages=soal">