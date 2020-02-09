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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body id="page-top">

  <!-- Header  -->
  <?php include 'C:\xampp\htdocs\CodeIgniter\application\views\backend\includes\backend-header.php'; ?>
  <!--x--- Header ---x-->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'C:\xampp\htdocs\CodeIgniter\application\views\backend\includes\backend-side-navbar.php'; ?>
    <!--x--- Sidebar ---x-->

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Tables</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header"> <i class="fas fa-table"></i>
            Data Table Example
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <?php
              include('C:\xampp\htdocs\CodeIgniter\application\views\backend\includes\dbHandler.inc.php');
              // cek jenis tabel dari url
              $ty = &$_GET['type'];
              if ($ty) {
                if ($_GET['type'] == "Plist") { ?>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Property</th>
                        <th>Luas Tanah</th>
                        <th>Luas Bangunan</th>
                        <th>Jumah K. Tidur</th>
                        <th>Jumah K. Mandi</th>
                        <th>Daya Listrik</th>
                        <th>Alamat</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Jenis</th>
                        <th>Token</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama Property</th>
                        <th>Luas Tanah</th>
                        <th>Luas Bangunan</th>
                        <th>Jumah K. Tidur</th>
                        <th>Jumah K. Mandi</th>
                        <th>Daya Listrik</th>
                        <th>Alamat</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Jenis</th>
                        <th>Token</th>
                        <th>Status</th>

                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
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
                          echo '<tr>';
                          echo '<td>' . $key['id'] . '</td>';
                          echo '<td>' . $key['nama_property'] . '</td>';
                          echo '<td>' . $key['luas_tanah'] . '</td>';
                          echo '<td>' . $key['luas_bangunan'] . '</td>';
                          echo '<td>' . $key['jk_tidur'] . '</td>';
                          echo '<td>' . $key['jk_mandi'] . '</td>';
                          echo '<td>' . $key['daya_listrik'] . '</td>';
                          echo '<td>' . $key['alamat'] . '</td>';
                          echo '<td>Rp. ' . $key['harga'] . '</td>';
                          echo '<td>' . $key['kategori'] . '</td>';
                          echo '<td>' . $key['jenis'] . '</td>';
                          echo '<td>' . $key['token'] . '</td>';
                          echo '<td>' . $key['status'] . '</td>';
                          echo '</tr>';
                        }
                      } ?>
                    </tbody>
                  </table>
                <?php } else if ($_GET['type'] == "Alist") { ?>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama depan</th>
                        <th>Nama belakang</th>
                        <th>Username</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Nama depan</th>
                        <th>Nama belakang</th>
                        <th>Username</th>
                        <th>Email</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM `admin_list`;";
                      $stmt = $this->db->call_function('stmt_init', $conn);
                      if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                        $register = base_url("index.php/backend/register?error=sqlerror1");
                        header("Location: $register");
                        exit();
                      } else {
                        $this->db->call_function('stmt_execute', $stmt);
                        $result = $this->db->call_function('stmt_get_result', $stmt);
                        foreach ($result as $key) {
                          echo '<tr>';
                          echo '<td>' . $key['id'] . '</td>';
                          echo '<td>' . $key['nama_depan'] . '</td>';
                          echo '<td>' . $key['nama_belakang'] . '</td>';
                          echo '<td>' . $key['uid'] . '</td>';
                          echo '<td>' . $key['email'] . '</td>';
                          echo '</tr>';
                        }
                      } ?>
                    </tbody>
                  </table>
                <?php } else if ($_GET['type'] == "Glist") { ?>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama depan</th>
                        <th>Nama belakang</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Token</th>
                        <th>Point</th>
                        <th>
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM `agent_list`;";
                      $stmt = $this->db->call_function('stmt_init', $conn);
                      if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                        $register = base_url("index.php/backend/register?error=sqlerror1");
                        header("Location: $register");
                        exit();
                      } else {
                        $this->db->call_function('stmt_execute', $stmt);
                        $result = $this->db->call_function('stmt_get_result', $stmt);
                        foreach ($result as $key) {
                          echo '<tr>';
                          echo '<td>' . $key['id'] . '</td>';
                          echo '<td>' . $key['nama_depan'] . '</td>';
                          echo '<td>' . $key['nama_belakang'] . '</td>';
                          echo '<td>' . $key['uid'] . '</td>';
                          echo '<td>' . $key['email'] . '</td>';
                          echo '<td>' . $key['token'] . '</td>';
                          echo '<td>' . $key['point'] . '</td>';
                          echo '<td>' . '<a href="' . base_url("backed/edit/") . '"><button class="btn btn-warning"><i class="fa fa-list"></i></button>' . '<button class="btn btn-warning"><i class="fa fa-list"></i></button>' . '</td>';
                          echo '</tr>';
                        }
                      } ?>
                    </tbody>
                  </table>
                <?php } else if ($_GET['type'] == "Ulist") { ?>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama depan</th>
                        <th>Nama belakang</th>
                        <th>Username</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Nama depan</th>
                        <th>Nama belakang</th>
                        <th>Username</th>
                        <th>Email</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM `user_list`;";
                      $stmt = $this->db->call_function('stmt_init', $conn);
                      if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                        $register = base_url("index.php/backend/register?error=sqlerror1");
                        header("Location: $register");
                        exit();
                      } else {
                        $this->db->call_function('stmt_execute', $stmt);
                        $result = $this->db->call_function('stmt_get_result', $stmt);
                        foreach ($result as $key) {
                          echo '<tr>';
                          echo '<td>' . $key['id'] . '</td>';
                          echo '<td>' . $key['nama_depan'] . '</td>';
                          echo '<td>' . $key['nama_belakang'] . '</td>';
                          echo '<td>' . $key['uid'] . '</td>';
                          echo '<td>' . $key['email'] . '</td>';

                          echo '</tr>';
                        }
                      } ?>
                    </tbody>
                  </table>
                <?php } else if ($_GET['type'] == "Klist") { ?>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Token Postingan</th>
                        <th>Nama User</th>
                        <th>Pesan User</th>
                        <th>Tanggal</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Token Postingan</th>
                        <th>Nama User</th>
                        <th>Pesan User</th>
                        <th>Tanggal</th>
                        <th>action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM `konfirmasi`;";
                      $stmt = $this->db->call_function('stmt_init', $conn);
                      if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                        $register = base_url("index.php/backend/register?error=sqlerror1");
                        header("Location: $register");
                        exit();
                      } else {
                        $this->db->call_function('stmt_execute', $stmt);
                        $result = $this->db->call_function('stmt_get_result', $stmt);
                        foreach ($result as $key) {
                          echo '<tr>';
                          echo '<td>' . $key['id'] . '</td>';
                          echo '<td>' . $key['token_postingan'] . '</td>';
                          echo '<td>' . $key['nama'] . '</td>';
                          echo '<td>' . $key['pesan_user'] . '</td>';
                          echo '<td>' . $key['tanggal'] . '</td>';
                          echo '<td>' . '<a href="' . base_url("index.php/backend/sendKonfirmasi2?admToken=" . $_SESSION['token'] . "&tokenPosting=" . $key['token_postingan']. "&nama=" . $key['nama'] . "&email=" . $key['email'] . "&phone=" . $key['phone'] . "&message=" . $key['pesan_user'] . "&date=" . $key['tanggal']) . '">
                          <button><i class="fa fa-check-square-o" style="font-size:24px;color:green"></i></button>';
                          echo '  <button><i class="fa fa-times-rectangle" style="font-size:24px;color:red;"></i></td>';
                          echo '</tr>';
                        }
                      } ?>
                    </tbody>
                  </table>
                <?php } else if ($_GET['type'] == "K2list") { ?>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Token Postingan</th>
                        <th>Nama User</th>
                        <th>Pesan User</th>
                        <th>Contact User</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Token Postingan</th>
                        <th>Nama User</th>
                        <th>Pesan User</th>
                        <th>Contact User</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM `konfirmasi2`;";
                      $stmt = $this->db->call_function('stmt_init', $conn);
                      if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                        $register = base_url("index.php/backend/register?error=sqlerror1");
                        header("Location: $register");
                        exit();
                      } else {
                        $this->db->call_function('stmt_execute', $stmt);
                        $result = $this->db->call_function('stmt_get_result', $stmt);
                        foreach ($result as $key) {
                          echo '<tr>';
                          echo '<td>' . $key['id'] . '</td>';
                          echo '<td>' . $key['token_postingan'] . '</td>';
                          echo '<td>' . $key['nama'] . '</td>';
                          echo '<td>' . $key['pesan_user'] . '</td>';
                          echo '<td>' . $key['phone'] . '</td>';
                          echo '<td>' . $key['date'] . '</td>';
                          echo '<td><a href="' . base_url("index.php/backend/sendTerjual?tp=" . $key['token_postingan'] . "&ta=" . $key['token_agent'] . "&nm=" . $key['nama'] . "&phone=" . $key['phone']) . '">
                           <button><i class="fa fa-check-square-o" style="font-size:24px;color:green"></i></button>';
                          echo '<a href="' . base_url("index.php/backend/sendTerjual?tp=" . $key['token_postingan'] . "&ta=" . $key['token_agent'] . "&nm=" . $key['nama'] . "&phone=" . $key['phone']) . '">
                          <button><i class="fa fa-times-rectangle" style="font-size:24px;color:red"></i></button></td>';
                          echo '</tr>';
                        }
                      } ?>
                    </tbody>
                  </table>
                <?php } else if ($_GET['type'] == "Sold") { ?>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Token Postingan</th>
                        <th>Token Agen</th>
                        <th>Nama User</th>
                        <th>Contact User</th>
                        <th>Tanggal Pembelian</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Token Postingan</th>
                        <th>Token Agen</th>
                        <th>Nama User</th>
                        <th>Contact User</th>
                        <th>Tanggal Pembelian</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM `terjual`;";
                      $stmt = $this->db->call_function('stmt_init', $conn);
                      if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                        $register = base_url("index.php/backend/register?error=sqlerror1");
                        header("Location: $register");
                        exit();
                      } else {
                        $this->db->call_function('stmt_execute', $stmt);
                        $result = $this->db->call_function('stmt_get_result', $stmt);
                        foreach ($result as $key) {
                          echo '<tr>';
                          echo '<td>' . $key['id'] . '</td>';
                          echo '<td>' . $key['token_postingan'] . '</td>';
                          echo '<td>' . $key['token_agen'] . '</td>';
                          echo '<td>' . $key['nama_pembeli'] . '</td>';
                          echo '<td>' . $key['contact_user'] . '</td>';
                          echo '<td>' . $key['tanggal terjual'] . '</td>';
                        }
                      } ?>
                    </tbody>
                  </table>
              <?php }
              } else {
                echo '<p>no data selected</p>';
              } ?>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include 'C:\xampp\htdocs\CodeIgniter\application\views\backend\includes\backend-logout-modal.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>/resources/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>/resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>/resources/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url(); ?>/resources/vendor/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url(); ?>/resources/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>/resources/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url(); ?>/resources/js/demo/datatables-demo.js"></script>

</body>

</html>