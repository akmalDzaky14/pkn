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
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <?php
              include('C:\xampp\htdocs\CodeIgniter\application\views\backend\includes\dbHandler.inc.php');
              // cek jenis tabel dari url
              $ty = &$_GET['type'];
              if ($ty) {
                if ($_GET['type'] == "Plist") {
              ?>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Property</th>
                        <th>Luas Tanah</th>
                        <th>Luas Bangunan</th>
                        <th>Jumah Kamar Tidur</th>
                        <th>Jumah Kamar Mandi</th>
                        <th>Daya Listrik</th>
                        <th>Alamat</th>
                        <th>Harga</th>
                        <th>Token</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama Property</th>
                        <th>Luas Tanah</th>
                        <th>Luas Bangunan</th>
                        <th>Jumah Kamar Tidur</th>
                        <th>Jumah Kamar Mandi</th>
                        <th>Daya Listrik</th>
                        <th>Alamat</th>
                        <th>Harga</th>
                        <th>Token</th>
                        <th>Action</th>
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
                          echo '<td>' . $key['token'] . '</td>';
                          echo '<td>' . '<a href="' . base_url() . "index.php/backend/uploadProduct?np=" . $key['nama_property'] . "&lt=" . $key['luas_tanah'] .
                            "&lb=" . $key['luas_bangunan'] . "&jkt=" . $key['jk_tidur'] . "&jkm=" . $key['jk_mandi'] . "&dl=" . $key['daya_listrik'] .
                            "&alm=" . $key['alamat'] . "&kt=" . $key['kategori'] . "&jn=" . $key['jenis'] . "&msg=" . $key['pesan'] . "&prc=" . $key['harga'] . "&token=" . $key['token'] .
                            '"><button class="btn btn-warning"><i class="fa fa-list"></i></button>';
                          echo '<a onclick="confirmDelete()"><button class="btn btn-warning"><i class="fa fa-trash"></i></button> </td></a>';
                          echo '</tr>';
                        }
                      }
                    } else if ($_GET['type'] == "Alist") {
                      ?>
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
                          }
                        } else if ($_GET['type'] == "Glist") {
                          ?>
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
                                  echo '</tr>';
                                }
                              }
                            } else if ($_GET['type'] == "Ulist") {
                              ?>
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
                              }
                            }
                          }
                              ?>
                                </tbody>
                              </table>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url(); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- script konfirmasi hapus postingan -->
  <script type="text/javascript">
    function confirmDelete() {
      var a = confirm("Are you sure want to delete the post?")
      if (a == true) {
        window.location.href = "<?php echo base_url("index.php/backend/deleteProduct?token=") . $key['token'] ?>";
      }
    }
  </script>
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