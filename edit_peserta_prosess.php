<?php 
		include_once("function/koneksi.php");
		include_once("function/helper.php");

        $id = $_POST['id'];
		$name = $_POST['name'];
		$nomor_telpon = $_POST['nomor_telpon'];
		$email = $_POST['email'];
		$alamat = $_POST['alamat'];
        $update_datetime = date('Y-m-d H:i:s');

        $chek_query = mysqli_query($koneksi,"SELECT * FROM peserta WHERE (email = '$email' OR nomor_telpon = '$nomor_telpon') AND id <> '$id'");
        $chek_query = mysqli_fetch_assoc($chek_query);

        if(is_null($chek_query))
        {
            mysqli_query($koneksi,"UPDATE peserta SET name='$name',nomor_telpon='$nomor_telpon',email='$email',alamat='$alamat',modified_datetime='$update_datetime' WHERE id='$id'");
            
            echo json_encode(['success' => true]);
        }
        else
        {
            echo json_encode(['success' => false, 'msg' => 'email dan nomor telpon sudah terdaftar !']);
        }
?>