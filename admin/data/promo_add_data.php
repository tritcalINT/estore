<?php

$post_id = '';
$p_id = '';
$p_title = '';
$p_date = '';
$p_description = '';
$p_pic = '';
$p_status = '';

if(isset($_GET['action'])) {
	if ($_GET['action'] == 'update') {
		if (!empty($_GET['ln'])) {
			$p_id = $_GET['ln'];
			
			$sql="SELECT * FROM promotion WHERE p_id='".$p_id."'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			
			$ln_id = $row['p_id'];
			$ln_title = $row['p_title'];
			$ln_date = $row['p_date'];
			$ln_description = $row['p_description'];
			$ln_pic = $row['p_pic'];
			$ln_status = $row['p_status'];
		}
	}
}

?>