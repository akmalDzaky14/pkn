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
    <li class="nav-item <?php echo $main; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>index.php/backend/main?tab=main">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
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
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/uploadProduct">Upload Product</a>
            <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/notFound">404 Page</a>
            <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/backend/blank">Blank Page</a>
        </div>
    </li>
    <li class="nav-item <?php echo $chart; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>index.php/backend/charts?tab=chart">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>
    <li class="nav-item <?php echo $table; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>index.php/backend/tables?tab=table">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>
</ul>