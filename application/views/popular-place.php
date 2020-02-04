<!doctype html>
<html class="no-js" lang="zxx">

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
</head>

<body>

    <!-- header-start -->
    <?php include "header.php" ?>
    <!-- header-end -->

    <div class="popular_places_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Popular Places</h3>
                        <p>Suffered alteration in some form, by injected humour or good day randomised booth anim 8-bit hella wolf moon beard words.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="contentRow">
                <!-- menambahkan konten tak terbatas -->
                <?php
                include('C:\xampp\htdocs\CodeIgniter\application\views\backend\includes\dbHandler.inc.php');
                $sql = "SELECT * FROM `posting_list`;";
                $stmt = $this->db->call_function('stmt_init', $conn);
                if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                    $register = base_url("index.php/backend/register?error=sqlerror1");
                    header("Location: $register");
                    exit();
                } else {
                    $this->db->call_function('stmt_execute', $stmt);
                    $result = $this->db->call_function('stmt_get_result', $stmt);
                    foreach ($result as $key) {
                ?>
                        <div class='col-lg-4 col-md-6'>
                            <div class='single_place'>
                                <div class='thumb'><img src='<?php echo base_url(); ?>/resources/img/place/6.png' alt=''><a href='<?php echo base_url('index.php/home/input?token=') . $key['token']; ?>' class='prise'>Rp. <?php echo $key['harga']; ?></a></div>
                                <div class='place_info'><a href='<?php echo base_url('index.php/home/input?token=') . $key['token']; ?>'>
                                        <h3><?php echo $key['nama_property']; ?></h3>
                                    </a>
                                    <p><?php echo $key['kategori'] . '- ' . $key['jenis']; ?></p>
                                    <div class='rating_days d-flex justify-content-between'><span class='d-flex justify-content-center align-items-center'><i class='fa fa-star'></i><a href='#'>(20 Review)</a></span>
                                        <div class='days'><i class='fa fa-clock-o'></i><a href='#'>5 Days</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <!--/------- menambahkan konten tak terbatas --------/-->
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
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
        });
    </script>
</body>

</html>