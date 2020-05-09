<?php
include"config/koneksi.php";

if(isset($_GET['kode_soal'])){
$query = mysqli_query ($conn,"Select * FROM soal where kode_soal='$_GET[kode_soal]'") or die (mysqli_error());
$result_edit = mysqli_fetch_array($query);
}
?>
<body>
<div class="stambah">
<form action="index.php?pages=soal-proses" method="POST" enctype="multipart/form-data">
<?php
	if(isset($_GET['kode_soal'])){
		echo "<input type='hidden' name='status' value='edit'>";
	}else {
		echo "<input type='hidden' name='status' value='add'>";
	}
?>
<h2 align="center" style="border-bottom:2px solid#000;"><?php if(isset($_GET['kode_soal'])){ echo"Edit Data Soal";} else {echo"Tambah Data Soal";}  ?></h2>

<table align="center">
<input type="hidden" name="txtid" value="<?php if(isset($result_edit['kode_soal'])) echo $result_edit['kode_soal'] ?>">
	
	
	<tr>
		<td><label>Kode Soal</label></td>
		<td>:</td>
		<td ><input type="text" name="txtsoal" value="<?php if(isset($result_edit['kode_soal'])) echo $result_edit['kode_soal']; ?>" checked></td>
	</tr>
	<tr>
		<td><label>Isi Soal</label></td>
		<td>:</td>
		<td><input type="text" class="form-control" name="txtisi" placeholder="Isi Soal...." value="<?php if(isset($result_edit['isi_soal'])) echo $result_edit['isi_soal']; ?>"></td>
	</tr>
	
	<tr>
		<td colspan="2"><button class="btn-biru"> <?php if(isset($_GET['kode_soal'])){ echo"Edit ";} else {echo"Tambah";} ?> </button></td>
		<td ><a href="index.php?pages=soal"> kembali </button></td>
	</tr>
	</table>
</form>
</div>
</body>