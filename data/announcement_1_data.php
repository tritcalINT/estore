<?php

	if (!empty($_POST['search_value'])) {
		$search_value = $_POST['search_value'];
		$sql_search_value = " WHERE a1_title LIKE '%".$search_value."%'";
	} else {
		$search_value = '';
		$sql_search_value = '';
	}

$sql = "SELECT a1_id, a1_title, a1_status FROM announcement_1 ".$sql_search_value." ORDER BY a1_id DESC";

$result = mysqli_query($conn, $sql);


?>