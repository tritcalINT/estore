<?php

$delete_id = $_GET['id'];


include_once '../../conn.php';



if ($delete_id != '') {

    $sql_delete = "UPDATE latest_news SET ln_status = '0' WHERE ln_id = '" . $delete_id . "'";

    if (mysqli_query($conn, $sql_delete)) {
        echo "1";
    }
}

header('Location: ../news_list.php');
?>