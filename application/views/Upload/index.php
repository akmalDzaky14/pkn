<!-- nyambung ke db.php -->
<!DOCTYPE html>
<html>

<head>
    <style>
        table td {
            border-bottom: 1px solid #f1f1f1;
        }
    </style>


<?php
include('db.php');
$status = '';
if (!empty($_POST['sports'])) {
    if (is_array($_POST['sports'])) {
        $status = "<strong>You selected the below sports:</strong><br />";
        foreach ($_POST['sports'] as $sport_id) {
            $query = mysqli_query(
                $con,
                "SELECT * FROM sports WHERE `sport_id`='$sport_id'"
            );
            $row = mysqli_fetch_assoc($query);
            $status .= $row['sport_name'] . "<br />";
        }
    }
}
?>
</head>

<body>
    <form name="form" method="post" action="">
        <label><strong>Select Sports:</strong></label><br />
        <table border="0" width="60%">
            <tr>
                <?php
                $count = 0;
                $query = mysqli_query($con,"SELECT * FROM sports");
                foreach ($query as $row) {
                    $count++;
                ?>
                    <td width="3%">
                        <input type="checkbox" name="sports[]" value="<?php echo $row["sport_id"]; ?>">
                    </td>
                    <td width="30%">
                        <?php echo $row["sport_name"]; ?>
                    </td>
                <?php
                    if ($count == 3) { // three items in a row
                        echo '</tr><tr>';
                        $count = 0;
                    }
                } ?>
            </tr>
        </table>
        <input type="submit" name="submit" value="Submit">
    </form>

    <br />
    <?php echo $status; ?>
</body>

</html>