
<?php

/**
 * Created by PhpStorm.
 * User: pasin
 * Date: 5/7/2019
 * Time: 4:14 PM
 */

if (!empty($_POST['search_date'])) {
    $search_date = $_POST['search_date'];
    $sql_search_date = " AND DATE(sl_updated_at) = '".$search_date."'";
} else {
    $search_date = '';
    $sql_search_date = '';
}


if (!empty($_POST['search_value'])) {
    $search_value = $_POST['search_value'];
    $sql_search_value = " AND sl_title LIKE '%".$search_value."%'";
} else {
    $search_value = '';
    $sql_search_value = '';
}

$sql = "SELECT sl_id, sl_title, DATE_FORMAT(sl_updated_at, '%d/%m/%y %h:%i %p') as sl_updated_at, sl_status FROM sliders WHERE 1=1 ".$sql_search_date.$sql_search_value." ORDER BY sl_id DESC";

$results = mysqli_query($conn, $sql);


?>