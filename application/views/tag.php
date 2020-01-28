<!DOCTYPE html>
<html>

<head>
    <style>
        table td {
            border-bottom: 1px solid #f1f1f1;
        }
    </style>
    <?php
    include('C:\xampp\htdocs\CodeIgniter\application\views\backend\includes\dbHandler.inc.php');
    $status = '';
    ?>
</head>

<body>
    <form name="form" method="post" action="">
        <label><strong>Select:</strong></label><br />
        <table border="0" width="60%">
            <tr>
                <td width="3%">
                    <input type="checkbox" name="kategori[]" value="Rumah"> Rumah
                </td>
                <td width="3%">
                    <input type="checkbox" name="kategori[]" value="Apartemen"> Apartemen
                </td>
            </tr>
            <tr>
                <td width="3%">
                    <input type="checkbox" name="jenis[]" value="Jual"> Jual
                </td>
                <td width="3%">
                    <input type="checkbox" name="jenis[]" value="Sewa"> Sewa
                </td>
                <td width="3%">
                    <input type="checkbox" name="jenis[]" value="Keduanya"> Keduanya
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Submit">
    </form>

    <br />

    <?php
    if (!empty($_POST['kategori'])) {
        // if (is_array($_POST['kategori'])) {
        foreach ($_POST['kategori'] as $kategori) {
            if ($kategori == 'Rumah') {
                $sql = "SELECT * FROM `posting_list` WHERE SUBSTRING(token, 1, 2) = 'RM' ;";
            } elseif ($kategori == 'Apartemen') {
                $sql = "SELECT * FROM `posting_list` WHERE SUBSTRING(token, 1, 2) = 'AP' ;";
            }
            $stmt = $this->db->call_function('stmt_init', $conn);
            if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                $register = base_url("index.php/backend/login?error=sqlerror");
                header("refresh:1;url=$register");
                exit();
            } else {
                $this->db->call_function('stmt_execute', $stmt);
                $result = $this->db->call_function('stmt_get_result', $stmt);
                foreach ($result as $a) {
                    echo $a['nama_property'] . " " . $a['token'];
                    echo '<br>';
                }
            }
        }
        // }
    }
    if (!empty($_POST['jenis'])) {
        foreach ($_POST['jenis'] as $jenis) {
            if ($jenis == 'Jual') {
                $sql = "SELECT * FROM `posting_list` WHERE SUBSTRING(token, -2) = 'JL' ;";
            } elseif ($jenis == 'Sewa') {
                $sql = "SELECT * FROM `posting_list` WHERE SUBSTRING(token, -2) = 'SW' ;";
            } elseif ($jenis == 'Keduanya') {
                $sql = "SELECT * FROM `posting_list` WHERE SUBSTRING(token, -2) = 'JS' ;";
            }
            $stmt = $this->db->call_function('stmt_init', $conn);
            if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                $register = base_url("index.php/backend/login?error=sqlerror");
                header("refresh:1;url=$register");
                exit();
            } else {
                $this->db->call_function('stmt_execute', $stmt);
                $result = $this->db->call_function('stmt_get_result', $stmt);
                foreach ($result as $a) {
                    echo $a['nama_property'] . " " . $a['jenis'] . " " . $a['token'];
                    echo '<br>';
                }
            }
        }
    }
    ?>
</body>

</html>