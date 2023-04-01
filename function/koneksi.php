<?php 
		
		$server = "retdev.test";
		$user = "root";
		$password = "mysql";
		$database = "tabel_peserta";

		$koneksi = mysqli_connect($server,$user,$password,$database)or die("koneksi gagal");
?>