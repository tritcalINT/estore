<?php

$news_id = '';
$ln_id = '';
$ln_title = '';
$ln_date = '';
$ln_description = '';
$ln_pic = '';
$ln_status = '';

if(isset($_GET['action'])) {
	if ($_GET['action'] == 'update') {
		if (!empty($_GET['ln'])) {
			$news_id = $_GET['ln'];
			
			$sql="SELECT * FROM latest_news WHERE ln_id='".$news_id."'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			
			$ln_id = $row['ln_id'];
			$ln_title = $row['ln_title'];
			$ln_date = $row['ln_date'];
			$ln_description = $row['ln_description'];
			$ln_pic = $row['ln_pic'];
			$ln_status = $row['ln_status'];
		}
	}
}

?>