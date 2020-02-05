<html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Travelo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>/resources/<?php echo base_url(); ?>/resources/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/gijgo.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/slicknav.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <title>tampilan Desain</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/postingstyle.css">
</head>

<body>
    <?php
    include "header.php";
    include('C:\xampp\htdocs\CodeIgniter\application\views\backend\includes\dbHandler.inc.php');
    if (($_GET['token'])) {
        //cek token
        $tokenSite = $_GET['token'];
        $sql = "SELECT * FROM `posting_list` WHERE token = ? ;";
        $stmt = $this->db->call_function('stmt_init', $conn);
        if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
            $register = base_url("index.php/backend/register?error=sqlerror1");
            header("Location: $register");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 's', $tokenSite);
            $this->db->call_function('stmt_execute', $stmt);
            $result = $this->db->call_function('stmt_get_result', $stmt);
        }
    }
    ?>
    <div class="table-box">
        <div class="table-row table-head">
            <div class="table-cell first-cell">
                <p></p>
            </div>
            <div class="table-cell">
                <p></p>
            </div>
        </div>

        <div class="table-row">
            <div class="table-cell first-cell">
                <p>Nama properti</p>
            </div>
            <div class="table-cell">
                <p><?php
                    foreach ($result as $key) {
                        echo $key['nama_property'];
                    ?>
                </p>
            </div>
            <div class="table-cell last-cell">
                <a href=""><?php echo $key['luas_tanah'];
                        } ?></a>
            </div>
        </div>

        <div class="table-row">
            <div class="table-cell first-cell">
                <p>Luas rumah</p>
            </div>
            <div class="table-cell">
                <p>120 x 90</p>
            </div>
        </div>

        <div class="table-row">
            <div class="table-cell first-cell">
                <p>harga</p>
            </div>
            <div class="table-cell">
                <p>1.5m</p>
            </div>
        </div>

        <div class="table-row">
            <div class="table-cell first-cell">
                <p>IG</p>
            </div>
            <div class="table-cell">
                <p>nani</p>
            </div>
        </div>

        <div class="table-row">
            <div class="table-cell first-cell">
                <p>nomer kontak</p>
            </div>
            <div class="table-cell">
                <p>08xxxxxxxxxx</p>
            </div>
        </div>


        <div class="table-row">
            <div class="table-cell first-cell">
                <p>Detail</p>
            </div>
            <div class="table-cell">
                <p></p>
            </div>
        </div>

        <div class="table-row">
            <div class="table-cell first-cell">
                <p>Registartion Form </p>
            </div>
            <div class="table-cell">
                <p></p>
            </div>
        </div>

        <div class="table-row">
            <div class="table-cell first-cell">
                <p>area</p>
            </div>
            <div class="table-cell">
                <p></p>
            </div>
        </div>
    </div>

    <?php
    //  if (($_GET['token'])) {
    //     //cek token
    //     $tokenSite = $_GET['token'];
    //     $sql = "SELECT * FROM `user_list` WHERE token = ? ;";
    //     $stmt = $this->db->call_function('stmt_init', $conn);
    //     if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
    //         $register = base_url("index.php/backend/register?error=sqlerror1");
    //         header("Location: $register");
    //         exit();
    //     } else {
    //         mysqli_stmt_bind_param($stmt, 's', $tokenSite);
    //         $this->db->call_function('stmt_execute', $stmt);
    //         $result = $this->db->call_function('stmt_get_result', $stmt);
    //     }
    // }
    ?>


    <div class="table-box">
        <div class="table-row table-head">
            <div class="table-cell first-cell">
                <p style-color="#000">Data User</p>
            </div>
        </div>

        <div class="table-row">
            <div class="table-cell first-cell">
                <p>No</p>
            </div>
            <div class="table-cell">
                <p><?php
                    foreach ($result as $key) {
                        echo $key['id'];

                    ?>
                </p>
            </div>
            <div class="table-cell last-cell">
                <a href=""><?php echo $key['luas_tanah'];
                        } ?></a>
            </div>
        </div>

        <div class="table-row">
            <div class="table-cell first-cell">
                <p>first Name</p>
            </div>
            <div class="table-cell">
                <p>120 x 90</p>
            </div>
        </div>

        <div class="table-row">
            <div class="table-cell first-cell">
                <p>Last_Name</p>
            </div>
            <div class="table-cell">
                <p>1.5m</p>
            </div>
        </div>

        <div class="table-row">
            <div class="table-cell first-cell">
                <p>User_name</p>
            </div>
            <div class="table-cell">
                <p>nani</p>
            </div>
        </div>

        <div class="table-row">
            <div class="table-cell first-cell">
                <p>Email</p>
            </div>
            <div class="table-cell">
                <p>08xxxxxxxxxx</p>
            </div>
        </div>
        <div class="table-row">
            <div class="table-cell first-cell">
                <p>tanggal</p>
                <input type="date" name="fromDate" id="fromDate">
                <p>Pesan</p>
                <input class="table-row"></input>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="more_place_btn text-center">
                <a class="boxed-btn4" href="<?php echo base_url() ?>index.php/home/PPlace">Beli</a>
            </div>
        </div>
    </div>


    <?php include "footer.php" ?>
    <!-- Modal -->
    <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="serch_form">
                    <input type="text" placeholder="Search">
                    <button type="submit">search</button>
                </div>
            </div>
        </div>
    </div>
    <!-- link that opens popup -->
    <!--     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script> -->
    <!-- JS here -->
    <script src="<?php echo base_url(); ?>/resources/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/ajax-form.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/scrollIt.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/nice-select.min.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/jquery.slicknav.min.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/plugins.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/gijgo.min.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/slick.min.js"></script>



    <!--contact js-->
    <script src="<?php echo base_url(); ?>/resources/js/contact.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/jquery.form.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>/resources/js/mail-script.js"></script>


    <script src="<?php echo base_url(); ?>/resources/js/main.js"></script>
</body>

</html>