<?php

if (!empty($_POST['search_category'])) {
	$search_category = $_POST['search_category'];
	
} else {
	$search_category = '';
	$sql_search_categeory = '';
}


if (!empty($_POST['search_value'])) {
	$search_value = $_POST['search_value'];
	$sql_search_value = " AND ln_title LIKE '%".$search_value."%'";
} else {
	$search_value = '';
	$sql_search_value = '';
}

$sql = "SELECT * FROM categories";//.$sql_search_categeory.$sql_search_value." ORDER BY ln_id DESC";

$result = mysqli_query($conn, $sql);


?>
