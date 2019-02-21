<?php 

	/**
	* 
	*/
	class oop
	{
		
		function simpan($conn,$table,$values)
		{
			$sql= mysqli_query($conn,"INSERT INTO $table VALUES($values)");
			if($sql){
				echo "<script>alert('Yogs Data berhasil Disimpan');
					document.location.href ='siswa.php'
				</script>";
			}
		}
		function hapus($conn,$table,$values, $where, $redirect)
		{
			$sql = mysqli_query($conn,"DELETE FROM $table WHERE $where = $values");
			if($sql){
				echo "<script>alert('YOGS DATA BERHASIL DI HAPUS');document.location.href = '$redirect'</script>";
			}else{
				echo printf("Error: %s\n", mysqli_error($conn));
				exit();
			}
		}
		function tampil($conn, $table){
			$sql = mysqli_query($conn,"SELECT * FROM $table");
			$isi = [];
			while ($data = mysqli_fetch_array($sql)) {
			$isi[] = $data;
			}return $isi;
		}
		function edit($conn, $table, $where, $redirect, $values)
		{
			$sql = mysqli_query($conn, "SELECT * FROM $table WHERE $where = $values");
			$tampil = mysqli_fetch_array($sql);
			return $tampil;
		}
		function update($conn, $table, $set, $where, $values,$redirect)
		{
			$sql = mysqli_query($conn, "UPDATE $table SET $set WHERE $where = $values");
			if($sql){
				echo"<script>alert('YOGS DATA BERHASIL DI UPDATE');document.location.href='$redirect'</script>";
			}else{
				echo printf("ERROR: %s\n", mysqli_error($conn));
			}
		}
	}



 ?>