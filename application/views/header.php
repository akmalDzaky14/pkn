<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="<?php echo base_url(); ?>">
                                    <img src="<?php echo base_url('/resources/img/logo.png'); ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="<?php echo base_url(); ?>">home</a></li>
                                        <li><a href="<?php echo base_url('index.php/home/about'); ?>">About</a></li>
                                        <li><a href="<?php echo base_url('index.php/home/destination'); ?>">Destination</a></li>
                                        <li>
                                            <a> pages
                                                <i class="ti-angle-down">
                                                </i>
                                            </a>
                                            <ul class="submenu">
                                                <li><a id="destination_details" href="<?php echo base_url('index.php/home/destination_details'); ?>">Destinations details</a></li>
                                                <li><a href="<?php echo base_url('index.php/home/elements'); ?>">elements</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="<?php echo base_url('index.php/home/blog'); ?>">blog</a></li>
                                                <li><a href="<?php echo base_url('index.php/home/singleblog'); ?>">single-blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?php echo base_url('index.php/home/contact'); ?>">Contact</a></li>
                                        <li>
                                            <?php
                                            if (isset($_SESSION['userID'])) {
                                                echo '<a href="'.base_url("index.php/backend/logout").'">Logout</a>';
                                            } else {
                                                echo '<a href="'.base_url("index.php/backend/login").'">Login</a>';
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                            <div class="social_wrap d-flex align-items-center justify-content-end">
                                <div class="number">
                                    <p>
                                        <?php
                                        if (isset($_SESSION['userID'])) {
                                            echo "HI " . $_SESSION['username'];
                                        }
                                        ?>
                                    </p>
                                    <!-- <p> <i class="fa fa-phone"></i> 10(256)-928 256</p> -->
                                </div>
                                <div class="social_links d-none d-xl-block">
                                    <ul>
                                        <li><a href="#"> <i class="fa fa-instagram"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-linkedin"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-google-plus"></i> </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="seach_icon">
                            <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>