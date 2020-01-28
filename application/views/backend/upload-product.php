<!DOCTYPE html>
<html lang="en">

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
    <!-- css used -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/upload-product.css">
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
                        <?php
                        if (isset($_GET['upload'])) {
                            if ($_GET['upload'] == "success") {
                                echo '<p style="color: green; text-align: center;">Upload Success!</p>';
                            }elseif ($_GET['upload'] == "failed1") {
                                echo '<p style="color: red; text-align: center;">Upload failed!</p>';
                            }
                        } ?>
                        <h3 class="mb-10">Form</h3>
                        <div class="section-top-border">
                            <div class="col-lg-8 col-md-8">
                                <p class="mb-10">Isi form dengan lengkap!</p>
                                <form action="<?php echo base_url(); ?>index.php/backend/uploadProductReq" method="POST" enctype="backend/aksi_upload">
                                    <div class="inputWithIcon mt-10">
                                        <input id="in" name="namaProperty" type="text" placeholder="Nama Property" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Property'" required>
                                        <i class="fas fa-font fa-lg fa-fw" aria-hidden="true"></i>
                                    </div>
                                    <div class="inputWithIcon mt-10">
                                        <input id="in" name="luasTanah" type="number" placeholder="Luas Tanah" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Luas Tanah'" required>
                                        <i class="fas fa-ruler-combined fa-lg fa-fw" aria-hidden="true"></i>
                                    </div>
                                    <div class="inputWithIcon mt-10">
                                        <input id="in" name="luasBangunan" type="number" placeholder="Luas Bangunan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Luas Bangunan'" required>
                                        <i class="fas fa-ruler-horizontal fa-lg fa-fw" aria-hidden="true"></i>
                                    </div>
                                    <div class="inputWithIcon mt-10">
                                        <input id="in" name="JKT" type="number" placeholder="Jumlah Kamar Tidur" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Jumlah Kamar Tidur'" required>
                                        <i class="fas fa-bed fa-lg fa-fw" aria-hidden="true"></i>
                                    </div>
                                    <div class="inputWithIcon mt-10">
                                        <input id="in" name="JKM" type="number" placeholder="Jumlah Kamar Mandi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'MJumlah Kamar Mandiessage'" required>
                                        <i class="fas fa-bath fa-lg fa-fw" aria-hidden="true"></i>
                                    </div>
                                    <div class="inputWithIcon mt-10">
                                        <input id="in" name="dayaListrik" type="number" placeholder="Daya Listrik" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Daya Listrik'" required>
                                        <i class="far fa-lightbulb fa-lg fa-fw" aria-hidden="true"></i>
                                    </div>
                                    <div class="inputWithIcon mt-10">
                                        <input id="in" name="alamat" type="text" placeholder="Alamat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat'" required>
                                        <i class="fa fa-thumb-tack fa-lg fa-fw" aria-hidden="true"></i>
                                    </div>
                                    <div class="input-group-icon mt-10">
                                        <div class="form-select" id="default-select">
                                            <select id="pilih" name="Kategori">
                                                <option selected disabled>Kategori</option>
                                                <option value="Rumah">Rumah</option>
                                                <option value="Apartemen">Apartemen</option>
                                            </select>
                                            <select id="pilih" name="Jenis">
                                                <option selected disabled>Jenis</option>
                                                <option value="Jual">Jual</option>
                                                <option value="Sewa">Sewa</option>
                                                <option value="Keduanya">Keduanya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="inputWithIcon mt-10">
                                        <input id="in" name="harga" type="number" placeholder="Harga" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Harga'" required>
                                        <i class="fas fa-money-bill-wave" aria-hidden="true"></i>
                                    </div>
                                    <div class="mt-10">
                                        <textarea name="pesan" class="single-textarea" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required></textarea>
                                    </div>
                                    <div class="mt-10">
                                        <?php echo $error; ?>
                                        <?php echo form_open_multipart('upload/uploadProductReq');?>
                                        <input type="file" name="berkas" />
                                        <br></br>
                                    </div>

                                    <div class="">
                                        <input class="btn btn-primary btn-block" style="width: 150%;" type="submit" name="submit" value="submit">
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

    <!-- jQuery File Upload Dependencies -->
    <!-- <script src="<?php //echo base_url(); 
                        ?>/resources/js/jquery.ui.widget.js"></script> -->
    <!-- <script src="<?php //echo base_url(); 
                        ?>/resources/js/jquery.iframe-transport.js"></script> -->
    <!-- <script src="<?php //echo base_url(); 
                        ?>/resources/js/jquery.fileupload.js"></script> -->

    <!-- Our main JS file -->
    <!-- <script src="<?php //echo base_url(); 
                        ?>/resources/js/script.js"></script> -->

</body>

</html>