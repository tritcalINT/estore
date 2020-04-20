<?php

if (!empty($_POST['search_value'])) {
	$search_value = $_POST['search_value'];
	$sql_search_value = " WHERE a2_title LIKE '%".$search_value."%'";
} else {
	$search_value = '';
	$sql_search_value = '';
}

$sql = "SELECT a2_id, a2_title, a2_status FROM announcement_2 ".$sql_search_value." ORDER BY a2_id DESC";

$result = mysqli_query($conn, $sql);


?>