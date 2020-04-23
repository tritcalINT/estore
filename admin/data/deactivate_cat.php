<?php

$delete_id = $_GET['id'];


include_once '../../conn.php';



if ($delete_id != '') {

    $sql_delete = "UPDATE categories SET status = '0' WHERE cat_id = '" . $delete_id . "'";

    if (mysqli_query($conn, $sql_delete)) {
        echo "1";
    }
}

header('Location: ../category_list.php');
?>