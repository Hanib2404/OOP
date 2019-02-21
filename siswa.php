<?php 
	include "config/koneksi.php";
	include "library/oop.php";

	@$redirect = "siswa.php";
	$go = new oop();
	$table = "tb_siswa";
	$where = "nis";
	@$values = "'$_GET[nis]'";

	if(isset($_POST["simpan"])){
		@$values = "'$_POST[nis]','$_POST[nama]'";
			$go->simpan($conn,$table,$values);
	}
	if(isset($_GET["hapus"])){
		
		$go->hapus($conn,$table,$where,$values,$redirect);
	}

	if(isset($_GET['edit'])){
		$edit = $go->edit($conn, $table, $where, $redirect,$values);
	}

	if(isset($_POST['update'])){
		$set = "nis='$_POST[nis]',nama='$_POST[nama]'";
		$go->update($conn,$table,$set,$where,$values,$redirect);
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>SIMPLE OOP</title>
</head>
<body>

	<form method=post>
		<table align="center" border="1" cellspacing="5">
			<tr>	
				<td>NIS</td>
				
				<td><input type="text" name="nis" required="" placeholder="Nis Guys" autofocus="" autocomplete="off" value="<?= @$edit[0]; ?>"></td>
			</tr>
			<tr>
				<td>NAMA</td>
				
				<td><input type="text" name="nama" required="" placeholder="Nama Guys" autocomplete="off" value="<?= @$edit[1]; ?>" ></td>
			</tr>
			<tr >	
				<td><input type="submit" name="simpan" value="SIMPAN KUY"></td>
				<td><input type="submit" name="update" value="UPDATE KUY"></td>
			</tr>

		<table>
	</form>

	<br>
	
<table align="center" border="1" cellpadding="10" >

	<tr>
		<th>#</th>
		<th>NIS</th>
		<th>NAMA</th>
		<th colspan="2">AKSI</th>
	</tr>

		<?php 
			$no = 0;
			$u = $go->tampil($conn,$table);
			foreach ($u as $a) {
				$no++
			
		 ?>
		 <tr>
			<td><?= $no; ?></td>
			<td><?= $a["0"]; ?></td>
			<td><?= $a["1"]; ?></td>
			<td> 
				<a onclick="return confirm('YAKIN INGIN DI HAPUS')" href="siswa.php?hapus&nis= <?= $a[0]; ?>">HAPUS</a>
				<a href="siswa.php?edit&nis=<?= $a[0]; ?>">EDIT</a>
			</td>
		</tr>
		<?php  } ?>


</body>
</html>