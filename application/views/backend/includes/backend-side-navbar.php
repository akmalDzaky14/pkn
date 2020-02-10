<?php
// session_start();
?>
<ul class="sidebar navbar-nav">
    <?php
    $table = $main = $chart = "";
    if (isset($_GET['tab'])) {
        if ($_GET['tab'] == "main") {
            $main = "active";
        } elseif ($_GET['tab'] == "chart") {
            $chart = "active";
        } elseif ($_GET['tab'] == "table") {
            $table = "active";
        }
    }
    ?>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Index</span>
        </a>
    </li>
    <li class="nav-item <?php echo $main; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>index.php/backend/main?tab=main">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <?php
    if (isset($_SESSION['userID'])) {
        if ($_SESSION['status'] == 'admin') {
    ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <h6 class="dropdown-header">Login Screens:</h6>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/login">Login</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/register">Register User</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/adminReg">Register Admin</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/agentReg">Register Agent</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/forgot">Forgot Password</a>
                    <!-- <div class="dropdown-divider"></div> -->
                    <!-- <h6 class="dropdown-header">Other Pages:</h6> -->
                </div>
            </li>
        <?php
        }
        if ($_SESSION['status'] == 'admin') { ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <h6 class="dropdown-header">List:</h6>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/tables?type=Plist">Posting List</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/tables?type=Alist">Admin List</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/tables?type=Glist">Agent List</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/tables?type=Ulist">User List</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/tables?type=Klist">konfirmasi List</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/tables?type=K2list">konfirmasi2 List</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/tables?type=Sold">Terjual</a>
                </div>
            </li>
            <li class="nav-item <?php echo $chart; ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>index.php/backend/charts?tab=chart">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>;[p'3-p[0]]
            </li>
        <?php } elseif ($_SESSION['status'] == 'agent') { ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <h6 class="dropdown-header">List:</h6>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/tables?type=Plist">Posting List</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/tables?type=Klist">Tersedia</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/tables?type=K2list">Diterima</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/tables?type=Sold">Terjual</a>
                </div>
            </li>
            <li class="nav-item <?php echo $chart; ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>index.php/backend/charts?tab=chart">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>
    <?php }
    }
    ?>
</ul>