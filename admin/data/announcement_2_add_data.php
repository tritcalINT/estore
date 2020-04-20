<?php

$announcement_id = '';
$a2_id = '';
$a2_title = '';
$a2_description = '';
$a2_pic = '';
$a2_status = '';

if(isset($_GET['action'])) {
	if ($_GET['action'] == 'update') {
		if (!empty($_GET['a2'])) {
			$announcement_id = $_GET['a2'];
			
			$sql="SELECT * FROM announcement_2 WHERE a2_id='".$announcement_id."'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			
			$a2_id = $row['a2_id'];
			$a2_title = $row['a2_title'];
			$a2_description = $row['a2_description'];
			$a2_pic = $row['a2_pic'];
			$a2_status = $row['a2_status'];
		}
	}
}

?>