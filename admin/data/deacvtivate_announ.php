<?php

$delete_id = $_GET['id'];
$type = $_GET['type'];

include_once '../../conn.php';



if ($delete_id != '') {
    if ($type == 1) {
        $sql_delete = "UPDATE announcement_1 SET a1_status = '0' WHERE a1_id = '" . $delete_id . "'";
    } else {
        $sql_delete = "UPDATE announcement_2 SET a2_status = '0' WHERE a2_id = '" . $delete_id . "'";
    }

    if (mysqli_query($conn, $sql_delete)) {
        echo "1";
    }
}
if ($type == 1) {
    header('Location: ../announcement_1.php');
} else {
    header('Location: ../announcement_2.php');
}
?>