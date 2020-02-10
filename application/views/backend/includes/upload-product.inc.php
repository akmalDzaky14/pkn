<?php
if (isset($_POST['submit'])) {
    require 'dbHandler.inc.php'; //cek koneksi ke database

    $np = $_POST['namaProperty'];
    $lt = $_POST['luasTanah'];
    $lb = $_POST['luasBangunan'];
    $jkt = $_POST['JKT'];
    $jkm = $_POST['JKM'];
    $dl = $_POST['dayaListrik'];
    $al = $_POST['alamat'];
    $har = $_POST['harga'];
    $msg = $_POST['pesan'];
    $kt = $_POST['Kategori'];
    $jns = $_POST['Jenis'];
    $status = 'Tersedia';
    $imgPath = $upload_data['file_name'];

    if (empty($np) || empty($lt) || empty($lb) || empty($jkt) || empty($jkm) || empty($dl
        || empty($al) || empty($har) || empty($msg) || empty($kt) || empty($jns))) {
        $register = base_url("index.php/backend/uploadProduct?error=emptyFields&np=" . $np . "&lt=" . $lt .
            "&lb=" . $lb . "&jkt=" . $jkt . "&jkm=" . $jkm . "&dl=" . $dl . "&al=" . $al . "&har=" . $har . "&msg=" . $msg);
        header("Location: $register");
        exit();
    } else {
        if ($kt == "Rumah") {
            $id1 = "RM";
        } elseif ($kt == "Apartemen") {
            $id1 = "AP";
        } else {
            $register = base_url("index.php/backend/uploadProduct?error=dataerror&np=" . $np . "&lt=" . $lt .
                "&lb=" . $lb . "&jkt=" . $jkt . "&jkm=" . $jkm . "&dl=" . $dl . "&al=" . $al . "&har=" . $har . "&msg=" . $msg);
            header("Location: $register");
            exit();
        }
        if ($jns == "Jual") {
            $id2 = "JL";
        } elseif ($jns == "Sewa") {
            $id2 = "SW";
        } elseif ($jns == "Keduanya") {
            $id2 = "JS";
        } else {
            $register = base_url("index.php/backend/uploadProduct?error=dataerror&np=" . $np . "&lt=" . $lt .
                "&lb=" . $lb . "&jkt=" . $jkt . "&jkm=" . $jkm . "&dl=" . $dl . "&al=" . $al . "&har=" . $har . "&msg=" . $msg);
            header("Location: $register");
            exit();
        }
        $Token = $id1 . random_int(100, 999) . $id2;
        //upload form register ke database
        $sql = "INSERT INTO posting_list (nama_property,luas_tanah, luas_bangunan ,jk_tidur , jk_mandi, daya_listrik, alamat, harga, pesan, kategori, jenis, token,imgPath, status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->db->call_function('stmt_init', $conn);
        if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
            $register = base_url("index.php/backend/uploadProduct?upload=failed1");
            header("Location: $register");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 'siiiiisissssss', $np, $lt, $lb, $jkt, $jkm, $dl, $al, $har, $msg, $kt, $jns, $Token, $imgPath, $status);
            $this->db->call_function('stmt_execute', $stmt);
            // echo ("Error description: <br>" . $conn->error);
            $register = base_url("index.php/backend/uploadProduct?upload=success");
            header("Location: $register");
            exit();
        }
    }
}
