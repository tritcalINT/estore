<?php
$master_id = '';
$a_id = '';
$a_name = '';
$a_username = '';
$a_status = '';

if(isset($_GET['action'])) {
	if ($_GET['action'] == 'update') {
		if (!empty($_GET['a'])) {
			$master_id = $_GET['a'];

			$sql="SELECT * FROM administrators WHERE a_id='".$master_id."' AND a_type = '1'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);

			$a_id = $row['a_id'];
			$a_name = $row['a_name'];
			$a_username = $row['a_username'];
			$a_status = $row['a_status'];
		}
	}
}

?>
