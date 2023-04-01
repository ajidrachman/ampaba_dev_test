<?php 
		include_once("function/helper.php");
		include_once("function/koneksi.php");

		//$page = isset($_GET['page']) ? $_GET['page'] : false;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Peserta</title>
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
			<h1 class="h3 mb-0 text-gray-800">Tambah Peserta</h1>
		</div>

		<div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="mb-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo URL; ?>"><i class="fa fa-home" aria-hidden="true"> </i>
                                    Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Data Peserta</li>
                        </ol>
                    </nav>
                </div>
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div class="d-block">
                            <a href="<?php echo URL; ?>" class="mr-2 text-white text-decoration-none"><i
                                    class="fas fa-backspace"> </i> Kembali</a>
                            <hr class="bg-white">
                            <p>Formulir Tambah Peserta</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="data_peserta" action="javascript:;" method="post">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="nama">
                            </div>

                            <div class="form-group">
                                <label for="nomor_telpon">Nomor Telpon</label>
                                <input type="text" class="form-control" id="nomor_telpon" name="nomor_telpon" placeholder="Nomor Telpon">
                            </div>

                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="email">
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat">
                            </div>
                            <div class="form-group">
                                <button type="submit" id="btn-submit" class="btn btn-primary">save</button>
                            </div>

                        </form>
                    </div>
                </div>
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

    <script src="<?php echo URL."ecm_jquery_validation/jquery.validate.min.js"; ?>"></script>
    <script src="<?php echo URL."ecm_jquery_validation/additional-methods.min.js"; ?>"></script>
    <script src="<?php echo URL."ecm_toastr_js/toastr.min.js"; ?>"></script>
    <script>
        var Index = (function () {
            var handleFormSubmit = function () {
                var rules = {};
                var messages = {};

                rules["name"] = { required: true };
                messages["name"] = { required: "wajib di isi !" };

                rules["nomor_telpon"] = { required: true, number: true };
                messages["nomor_telpon"] = {
                    required: "wajib di isi !",
                    number: "masukan angka yang valid!",
                };

                rules["email"] = { required: true };
                messages["email"] = { required: "wajib di isi !" };

                rules["alamat"] = { required: true };
                messages["alamat"] = {
                    required: "wajib di isi !",
                };

                $("#data_peserta").validate({
                    onsubmit: false,
                    rules: rules,
                    messages: messages,
                    ignore: "",
                    errorClass: "invalid",
                    validClass: "success",
                    invalidHandler: function (event, validator) {
                        toastr.error(
                            "Periksa Setiap Isian Yang Ada !",
                            "Form Tidak Valid !"
                        );
                    },
                    errorPlacement: function (error, element) {
                        $(element).attr("data-toggle", "tooltip");
                        $(element).attr("data-placement", "top");
                        $(element).attr("title", error[0].innerText);
                        $(element).tooltip("show");
                    },
                    highlight: function (element, errorClass, validClass) {
                        $(element).addClass(errorClass);
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).attr("data-toggle", "");
                        $(element).attr("data-placement", "");
                        $(element).attr("title", "");
                        $(element).tooltip("dispose");

                        $(element).removeClass(errorClass);
                    },
                    success: function (label) {
                        label.remove();
                    },
                });

                $("#data_peserta").submit(function (e) {
                    e.preventDefault();

                    var form = $(this);
                    var formData = new FormData(form[0]);

                    if ($(this).valid()) {
                        $.ajax({
                            type: "post",
                            url: "<?php echo URL."add_data_peserta.php"; ?>",
                            data: formData,
                            processData: false,
                            contentType: false,
                            // success: function (responses) {
                            //     obj = JSON.parse(responses);

                            //     if (obj.success) {
                            //         $("#btn-submit").remove();
                            //         toastr.success(
                            //             "Data berhasil di simpan",
                            //             "Success"
                            //         );
                            //         setTimeout(function () {
                            //             window.location.href =
                            //                 ThisUrl + "/data_barang_keluar";
                            //         }, 3000);
                            //     } else {
                            //         toastr.error(obj.message, "Form Tidak Valid !");
                            //     }
                            // },
                            success: function (response) {
                                obj = JSON.parse(response);
                                //console.log(obj);
                                // toastr.success("Data berhasil disimpan", "Success");
                                // setTimeout(function () {
                                //     window.location.href = "<?php //echo URL."index.php"; ?>";
                                // }, 3000);

                                if(obj.success){
                                    toastr.success("Data berhasil disimpan", "Success");
                                    setTimeout(function () {
                                        window.location.href = "<?php echo URL."index.php"; ?>";
                                    }, 3000);
                                }else{
                                    toastr.error(obj.msg);
                                }
                            },
                        });
                    }
                });
            };

            return {
                init: function () {
                    handleFormSubmit();
                },
            };
        })();

        $(document).ready(function () {
            Index.init();
        });

    </script>
</body>

</html>