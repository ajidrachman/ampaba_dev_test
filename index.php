<?php 
		include_once("function/helper.php");
		include_once("function/koneksi.php");

		//$page = isset($_GET['page']) ? $_GET['page'] : false;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Peserta</title>
	<!-- <link rel="stylesheet" type="text/css" href="<?php //echo URL."css/style.css"; ?>"> -->

	<!-- Custom fonts for this template-->
    <link href="<?php echo URL."sbadmin2_resources/vendor/fontawesome-free/css/all.min.css"; ?>" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo URL."sbadmin2_resources/css/sb-admin-2.min.css"; ?>" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo URL."ecm_toastr_js/toastr.css"; ?>">
</head>

<body>

	 <!-- Begin Page Content -->
	 <div class="container-fluid">
		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Data Peserta</h1>
		</div>

		<div class="card">
			<div class="card-header">
					<div class="p-1">
                            <a href="<?php echo URL."tambah_peserta.php"; ?>" class="btn btn-primary">+ Tambah Peserta</a>
                    </div>
			</div>
			<div class="card-body">

				<table id="data-users" class="table table-hover" style="width: 100%">
					<thead>
					<tr class="bg-primary text-white" style="border-top-left-radius: 10px;border-top-right-radius: 10px;">
						<th width="2%" class='text-center'>No</th>
						<th width="10%" class='text-center'>nama</th>
						<th width="10%" class='text-center'>nomor telpon</th>
						<th width="10%" class='text-center'>email</th>
						<th width="2%" class='text-center'>alamat</th>
						<th width="2%" class='text-center'>Aksi</th>
					</tr>
					</thead>
					<tbody>
							<?php $query = mysqli_query($koneksi, "SELECT * FROM peserta ORDER BY created_datetime DESC"); ?>
							<?php 
								$no=1;
								while ($row=mysqli_fetch_assoc($query)){
			  
									echo "<tr>
										<td align='center'>$no</td>
										<td align='center'>$row[name]</td>
										<td align='center'>$row[nomor_telpon]</td>
										<td align='center'>$row[email]</td>
										<td align='center'>$row[alamat]</td>
										<td align='center'> 
											<a class='edit' href='".URL."edit_peserta.php?id=$row[id]'>edit</a>
											<a class='hapus' data-id='$row[id]' href='javascript:;'>hapus</a>
										</td>
									</tr>";
		
									$no++;
								}
							?>
					</tbody>
					<tfoot>
					<?php $data_index = 0; ?>
						<tr>
							<!-- <td><?php //$data_index++; ?></td>
							<td><input type="text" id="departemen_search" class="form-control form-control-sm text-center data-users-tfoot-input-search" placeholder="search" data-index="<?php //echo $data_index; $data_index++; ?>"></td>
							<td><input type="text" id="departemen_search" class="form-control form-control-sm text-center data-users-tfoot-input-search" placeholder="search" data-index="<?php //echo $data_index; $data_index++; ?>"></td>
							<td><input type="text" id="lokasi_search" class="form-control form-control-sm text-center data-users-tfoot-input-search" placeholder="search" data-index="<?php //echo $data_index; $data_index++; ?>"></td>
							<td><input type="text" id="departemen_search" class="form-control form-control-sm text-center data-users-tfoot-input-search" placeholder="search" data-index="<?php //echo $data_index; $data_index++; ?>"></td>
							<td><input type="text" id="departemen_search" class="form-control form-control-sm text-center data-users-tfoot-input-search" placeholder="search" data-index="<?php //echo $data_index; $data_index++; ?>"></td> -->
						</tr>
					</tfoot>
				</table>

			</div>
		</div>
		
	</div>

	<!-- Bootstrap core JavaScript-->
    <script src="<?php echo URL."sbadmin2_resources/vendor/jquery/jquery.min.js"; ?>"></script>
    <script src="<?php echo URL."sbadmin2_resources/vendor/bootstrap/js/bootstrap.bundle.min.js"; ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo URL."sbadmin2_resources/vendor/jquery-easing/jquery.easing.min.js"; ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo URL."sbadmin2_resources/js/sb-admin-2.min.js"; ?>"></script>
	<script src="<?php echo URL."ecm_toastr_js/toastr.min.js"; ?>"></script>
	<script>
        var Index = (function () {
			var handleDeleteData = function(){
				$('.hapus').on('click', function(){
					var id = $(this).attr('data-id');
					$.ajax({
                            type: "post",
                            url: "<?php echo URL."delete_peserta.php"; ?>",
                            data: {
								'id': id
							},
                            success: function (response) {
                                obj = JSON.parse(response);
                                //console.log(obj);
                                // toastr.success("Data berhasil disimpan", "Success");
                                // setTimeout(function () {
                                //     window.location.href = "<?php //echo URL."index.php"; ?>";
                                // }, 3000);

                                if(obj.success){
                                    toastr.success("Data berhasil dihapus", "Success");
                                    setTimeout(function () {
                                        window.location.href = "<?php echo URL."index.php"; ?>";
                                    }, 3000);
                                }else{
                                    toastr.error("Data gagal dihapus");
									setTimeout(function () {
                                        window.location.href = "<?php echo URL."index.php"; ?>";
                                    }, 3000);
                                }
                            },
                        });
				});
			};

            return {
                init: function () {
                    handleDeleteData();
                },
            };
        })();

        $(document).ready(function () {
            Index.init();
        });

    </script>
</body>

</html>