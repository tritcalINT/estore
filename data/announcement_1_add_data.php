<?php

$announcement_id = '';
$a1_id = '';
$a1_title = '';
$a1_description = '';
$a1_pic = '';
$a1_status = '';

if(isset($_GET['action'])) {
	if ($_GET['action'] == 'update') {
		if (!empty($_GET['a1'])) {
			$announcement_id = $_GET['a1'];
			
			$sql="SELECT * FROM announcement_1 WHERE a1_id='".$announcement_id."'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			
			$a1_id = $row['a1_id'];
			$a1_title = $row['a1_title'];
			$a1_description = $row['a1_description'];
			$a1_pic = $row['a1_pic'];
			$a1_status = $row['a1_status'];
		}
	}
}

?>