<?php 
		include_once("function/koneksi.php");
		include_once("function/helper.php");

		$name = $_POST['name'];
		$nomor_telpon = $_POST['nomor_telpon'];
		$email = $_POST['email'];
		$alamat = $_POST['alamat'];
        $created_datetime = date('Y-m-d H:i:s');

        $chek_query = mysqli_query($koneksi,"SELECT * FROM peserta WHERE email = '$email' OR nomor_telpon = '$nomor_telpon'");
        $chek_query = mysqli_fetch_assoc($chek_query);

        if(is_null($chek_query))
        {
               mysqli_query($koneksi,"INSERT INTO peserta(name,nomor_telpon,email,alamat,created_datetime)
		 	   VALUES('$name','$nomor_telpon','$email','$alamat','$created_datetime')");

                echo json_encode(['success' => true]);
        }
        else
        {
            echo json_encode(['success' => false, 'msg' => 'email atau nomor telpon sudah terdaftar !']);
        }
?>