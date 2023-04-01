<?php 
		include_once("function/koneksi.php");
		include_once("function/helper.php");

	    $id = $_POST['id'];

        $chek_query = mysqli_query($koneksi,"SELECT * FROM peserta WHERE id = '$id'");
        $chek_query = mysqli_fetch_assoc($chek_query);

        if(!is_null($chek_query))
        {
                mysqli_query($koneksi,"DELETE FROM peserta WHERE id='$id'");

                echo json_encode(['success' => true]);
        }
        else
        {
            echo json_encode(['success' => false]);
        }
?>