<?php

$delete_id = $_GET['id'];


include_once '../../conn.php';



if ($delete_id != '') {

    $sql_delete = "UPDATE user SET user_status = '0' WHERE user_id = '" . $delete_id . "'";

    if (mysqli_query($conn, $sql_delete)) {
        echo "1";
    }
}

header('Location: ../user_list.php');
?>