<?php 
		include_once("function/koneksi.php");
		include_once("function/helper.php");
		
		$nim = $_POST['nim'];
		$namaLengkap = $_POST['namaLengkap'];
		$jenisKelamin = $_POST['j_kelamin'];
		$ttl = $_POST['ttl'];
		$jurusan = $_POST['jurusan'];
		
		$button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
		$idmhs = isset($_GET['idmhs']) ? $_GET['idmhs'] : false;

		if($button == "INPUT"){
		mysqli_query($koneksi,"INSERT INTO datamahasiswa(nim,namaLengkap,jenisKelamin,ttl,jurusan)
			                               VALUES('$nim','$namaLengkap','$jenisKelamin','$ttl','$jurusan')");
		}else if($button=="update"){
			
			mysqli_query($koneksi,"UPDATE datamahasiswa SET nim='$nim',namaLengkap='$namaLengkap',jenisKelamin='$jenisKelamin',ttl='$ttl',jurusan='$jurusan' WHERE id_mhs='$idmhs'");
		}elseif ($button == "hapus") {
			
			mysqli_query($koneksi,"DELETE FROM datamahasiswa WHERE id_mhs='$idmhs'");
		}
		header("location:".URL."index.php?page=lihat");
?>