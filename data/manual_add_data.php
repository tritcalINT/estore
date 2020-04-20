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

			$sql="SELECT * FROM member_manual WHERE m_id='".$p_id."'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);

			$ln_id = $row['m_id'];
			$ln_title = $row['m_title'];
			$ln_date = $row['m_date'];
			$ln_description = $row['m_description'];
			$ln_pic = $row['m_pic'];
			$ln_status = $row['m_status'];
		}
	}
}

?>
