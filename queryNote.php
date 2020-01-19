<?php
// -----------------upload query---------------------
$er = "INSERT INTO userlist (id, nama_depan, nama_belakang, email, password) VALUES (?,?, ?, ?, ?)";
$i = $this->db->query($er, array(4, 'dzai', 'rfefd', 'hgffhfh', 'enbvbnvnsdf'));
if ($i) {
    echo 'berhasil';
} else {
    echo "Query failed!";
}
?>
<!-- ----------x-------upload query---------x----------- -->
<!-- -------------------tampil data---------------------- -->
<?php
$query = $this->db->query('SELECT id, nama_depan, nama_belakang, email FROM userlist');

foreach ($query->result() as $row) {
    echo $row->id, '. ';
    echo $row->nama_depan, ' ';
    echo $row->nama_belakang, ' ';
    echo $row->email;
?>
    <br>
<?php }
echo 'Total Results: ' . $query->num_rows();
?>
<!-- -------------x------tampil data--------x-------------- -->