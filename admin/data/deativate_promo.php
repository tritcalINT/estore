<?php

$delete_id = $_GET['id'];


include_once '../../conn.php';



if ($delete_id != '') {

    $sql_delete = "UPDATE promotion SET p_status = '0' WHERE p_id = '" . $delete_id . "'";

    if (mysqli_query($conn, $sql_delete)) {
        echo "1";
    }
}

header('Location: ../promo_list.php');
?>