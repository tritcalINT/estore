<?php

if (!empty($_POST['search_date'])) {
	$search_date = $_POST['search_date'];	
	$sql_search_date = " AND DATE(ln_date) = '".$search_date."'";
} else {
	$search_date = '';
	$sql_search_date = '';
}


if (!empty($_POST['search_value'])) {
	$search_value = $_POST['search_value'];
	$sql_search_value = " AND ln_title LIKE '%".$search_value."%'";
} else {
	$search_value = '';
	$sql_search_value = '';
}

$sql = "SELECT p_id, p_title, DATE_FORMAT(p_date, '%d/%m/%y %h:%i %p') as p_date, p_status FROM promotion WHERE 1=1 ".$sql_search_date.$sql_search_value." ORDER BY p_id DESC";

$result = mysqli_query($conn, $sql);


?>