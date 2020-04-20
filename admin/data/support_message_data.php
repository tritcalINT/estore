<?php

$ms_subject = '';
$ms_message = '';
$ms_date = '';
$ms_reference = '';
$m_username = '';
$m_name = '';

if(isset($_GET['action'])) {
	if ($_GET['action'] == 'view') {
		if (!empty($_GET['m'])) {
			$message_id = $_GET['m'];
			
			if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
	
				$sql = "SELECT ms.ms_id, ms.ms_subject, ms.ms_message, DATE_FORMAT(ms.ms_date, '%d/%m/%Y') as ms_date, ms.ms_reference, m.m_username, m.m_name, ms.ms_reply FROM member_support ms
						INNER JOIN members m ON m.m_id = ms.ms_member_id
						WHERE ms.ms_id = '".$message_id."' ORDER BY ms.ms_id DESC";
					
			} else if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
				
				$master_by = getUseridbyUsername($_SESSION['master'], $conn);
				
				$sql = "SELECT ms.ms_id, ms.ms_subject, ms.ms_message, DATE_FORMAT(ms.ms_date, '%d/%m/%Y') as ms_date, ms.ms_reference, m.m_username, m.m_name, ms.ms_reply FROM member_support ms
						INNER JOIN members m ON m.m_id = ms.ms_member_id
						WHERE ms.ms_id = '".$message_id."' AND m.m_master_by = '".$master_by."' ORDER BY ms.ms_id DESC";
					
			} else if(isset($_SESSION['admin']) && $_SESSION['admin'] != ''){
				
				$admin_by = getUseridbyUsername($_SESSION['admin'], $conn);
				
				$sql = "SELECT ms.ms_id, ms.ms_subject, ms.ms_message, DATE_FORMAT(ms.ms_date, '%d/%m/%Y') as ms_date, ms.ms_reference, m.m_username, m.m_name, ms.ms_reply FROM member_support ms
						INNER JOIN members m ON m.m_id = ms.ms_member_id
						WHERE ms.ms_id = '".$message_id."' AND m.m_admin_by = '".$admin_by."' ORDER BY ms.ms_id DESC";
					
			} else if(isset($_SESSION['reseller']) && $_SESSION['reseller'] != ''){
				
				$reseller_id = getUseridbyUsername($_SESSION['reseller'], $conn);
				
				$sql = "SELECT ms.ms_id, ms.ms_subject, ms.ms_message, DATE_FORMAT(ms.ms_date, '%d/%m/%Y') as ms_date, ms.ms_reference, m.m_username, m.m_name, ms.ms_reply FROM member_support ms
						INNER JOIN members m ON m.m_id = ms.ms_member_id
						 WHERE ms.ms_id = '".$message_id."' AND m.m_reseller_by = '".$reseller_id."' ORDER BY ms.ms_id DESC";
					
			}

			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			
			$ms_id = $row['ms_id'];
			$ms_subject = $row['ms_subject'];
			$ms_message = $row['ms_message'];
			$ms_date = $row['ms_date'];
			$ms_reference = $row['ms_reference'];
			$m_username = $row['m_username'];
			$m_name = $row['m_name'];
			$ms_reply = $row['ms_reply'];
		}
	}
}

?>