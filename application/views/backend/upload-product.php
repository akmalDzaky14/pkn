<!DOCTYPE html>
<html lang="en">

<style>
    input[id=in] {
        width: 150%;
        border-width: 10px solid #aaa;
        border-radius: 4px;
        margin: 8px 0;
        outline: none;
        padding: 8px;
        box-sizing: border-box;
        transition: .2s;
    }

    select[id="pilih"] {
        width: 150%;
        border-width: 10px solid #aaa;
        border-radius: 4px;
        margin: 8px 0;
        outline: none;
        padding: 8px;
        box-sizing: border-box;
        transition: .2s;
    }

    select[id="pilih"]:focus {
        border-color: dodgerblue;
        box-shadow: 0 0 8px dodgerblue;
    }

    input[id=in]:focus {
        border-color: dodgerblue;
        box-shadow: 0 0 8px dodgerblue;
    }

    textarea {
        width: 150%;
        border-width: 10px solid #aaa;
        border-radius: 4px;
        margin: 8px 0;
        outline: none;
        padding: 8px;
        box-sizing: border-box;
        transition: .2s;
    }

    textarea:focus {
        border-color: dodgerblue;
        box-shadow: 0 0 8px dodgerblue;
    }

    .inputWithIcon input[id=in] {
        padding-left: 40px;
    }

    .inputWithIcon {
        position: relative;
    }

    .inputWithIcon i {
        position: absolute;
        left: 0;
        top: 8px;
        padding: 15px 15px;
        color: #aaa;
        transition: .2s
    }

    .inputWithIcon input[id=in]:focus+i {
        color: dodgerblue;
    }

    .image-upload-wrap {
        text-align: center;
        height: 200px;
        width: 150%;
        margin-top: 10px;
        border: 3px dashed;
        position: relative;
        transition: .2s
    }

    .image-dropping,
    .image-upload-wrap:hover {
        background-color: #fff;
        border: 3px dashed dodgerblue;
    }

    .file-upload-content {
        text-align: left;
        margin-top: 10px;
        position: relative;
        transition: .2s
    }
</style>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Tables</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>/resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url(); ?>/resources/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>/resources/css/sb-admin.css" rel="stylesheet">
    <!-- font awsome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/font-awesome.min.css">

    <script src="<?php echo base_url(); ?>/resources/js/upload3.js"></script>
</head>


<body id="page-top">

    <!------ Header ------>
    <?php include 'C:\xampp\htdocs\CodeIgniter\application\views\backend\includes\backend-header.php'; ?>
    <!--x---- Header ----x-->

    <!----- Wrapper ----->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include 'C:\xampp\htdocs\CodeIgniter\application\views\backend\includes\backend-side-navbar.php'; ?>
        <!--x-- Sidebar --x--->

        <!------------- content -------------->
        <div id="content-wrapper">
            <!---------------  Body ------------>
            <div class="container-fluid">
                <!-- Area Chart Example-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-chart-area"></i>Upload Product</div>
                    <div class="card-body">
                        <h3 class="mb-10">Form</h3>
                        <div class="section-top-border">
                            <div class="col-lg-8 col-md-8">
                                <p class="mb-10">Isi form dengan lengkap!</p>
                                <form action="#">
                                    <div class="inputWithIcon mt-10">
                                        <input id="in" type="text" placeholder="Judul Property">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"></i>
                                    </div>
                                    <div class="inputWithIcon mt-10">
                                        <input id="in" type="text" placeholder="Nama Property">
                                        <i class="fas fa-font fa-lg fa-fw" aria-hidden="true"></i>
                                    </div>
                                    <div class="inputWithIcon mt-10">
                                        <input id="in" type="number" placeholder="Luas Tanah">
                                        <i class="fas fa-ruler-combined fa-lg fa-fw" aria-hidden="true"></i>
                                    </div>
                                    <div class="inputWithIcon mt-10">
                                        <input id="in" type="number" placeholder="Luas Bangunan">
                                        <i class="fas fa-ruler-horizontal fa-lg fa-fw" aria-hidden="true"></i>
                                    </div>
                                    <div class="inputWithIcon mt-10">
                                        <input id="in" type="number" placeholder="Jumlah Kamar Tidur">
                                        <i class="fas fa-bed fa-lg fa-fw" aria-hidden="true"></i>
                                    </div>
                                    <div class="inputWithIcon mt-10">
                                        <input id="in" type="number" placeholder="Jumlah Kamar Mandi">
                                        <i class="fas fa-bath fa-lg fa-fw" aria-hidden="true"></i>
                                    </div>
                                    <div class="inputWithIcon mt-10">
                                        <input id="in" type="number" placeholder="Daya Listrik">
                                        <i class="far fa-lightbulb fa-lg fa-fw" aria-hidden="true"></i>
                                    </div>
                                    <div class="inputWithIcon mt-10">
                                        <input id="in" type="text" placeholder="Alamat">
                                        <i class="fa fa-thumb-tack fa-lg fa-fw" aria-hidden="true"></i>
                                    </div>
                                    <div class="input-group-icon mt-10">
                                        <div class="form-select" id="default-select">
                                            <select id="pilih">
                                                <option selected disabled>Pilih kota</option>
                                                <option value="1">Malang</option>
                                                <option value="1">Bogor</option>
                                                <option value="1">Surabaya</option>n>
                                                <option value="1">Jakarta</option>
                                                <option value="1">Lainya </option>
                                            </select>
                                            <select id="pilih">
                                                <option selected disabled>Pilih kota</option>
                                                <option value="1">Country</option>
                                                <option value="1">Bangladesh</option>
                                                <option value="1">India</option>
                                                <option value="1">England</option>
                                                <option value="1">Srilanka</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-10">
                                        <textarea class="single-textarea" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required></textarea>
                                    </div>
                                    <div class="image-upload-wrap">
                                        <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                        <div class="drag-text">
                                            <h3>Drag and drop a file or select add Image</h3>
                                        </div>
                                    </div>
                                    <div class="file-upload-content">
                                        <img class="file-upload-image" src="#" alt="your image" />
                                        <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload()" class="remove-image">Remove</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!---------x------  Body ------x------>
            <!-- /.container-fluid -->

        </div>
        <!--------x----- content ----x---------->

    </div>
    <!---x-- Wrapper ---x-->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include 'C:\xampp\htdocs\CodeIgniter\application\views\backend\includes\backend-logout-modal.php'; ?>
    <!--x-- Logout Modal--x-->

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>/resources/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>/resources/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url(); ?>/resources/vendor/chart.js/Chart.min.js"></script>

    <script src="<?php echo base_url(); ?>/resources/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>/resources/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>/resources/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo base_url(); ?>/resources/js/demo/datatables-demo.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/demo/chart-area-demo.js"></script>

</body>

</html>