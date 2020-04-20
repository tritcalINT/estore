<?php
    include_once '../../conn.php';

	//Fetching Values from URL
	$id = $_POST['id'];
	$val = $_POST['val'];
	$rid = $_POST['rid'];
	
	if($val == 'admin'){
		if($id != ''){
			$sql="select a_id, a_username FROM administrators WHERE a_type = 2 AND a_master_by = '".$id."'";
			$result = mysqli_query($conn, $sql);
			echo '<option value="">Select Admin</option>';
			while($row = mysqli_fetch_assoc($result)) { 
			if($row['a_id'] == $rid){
				echo '<option selected="selected" value="'. $row['a_id'].'">'. $row['a_username'].'</option>';
			} else {
				echo '<option value="'. $row['a_id'].'">'. $row['a_username'].'</option>';
			}
				
			}
		}
	}
	
	if($val == 'reseller'){
		if($id != ''){
			$sql="select a_id, a_username FROM administrators WHERE a_type = 3 AND a_admin_by = '".$id."'";
			$result = mysqli_query($conn, $sql);
			echo '<option value="">Select Reseller</option>';
			while($row = mysqli_fetch_assoc($result)) { 
			if($row['a_id'] == $rid){
				echo '<option selected="selected" value="'. $row['a_id'].'">'. $row['a_username'].'</option>';
			} else {
				echo '<option value="'. $row['a_id'].'">'. $row['a_username'].'</option>';
			}
				
			}
		}
	}
	
	if($val == 'upline'){
		if($id != ''){
			$sql="SELECT m_id, m_username FROM members WHERE m_reseller_by = '".$id."'";
			$result = mysqli_query($conn, $sql);
			
			echo '<option value="">Select Upline</option>';
			while($row = mysqli_fetch_assoc($result)) { 
			if($row['m_id'] == $rid){
				echo '<option selected="selected" value="'. $row['m_id'].'">'. $row['m_username'].'</option>';
			} else {
				echo '<option value="'. $row['m_id'].'">'. $row['m_username'].'</option>';
			}
			}

		}
	}
?>