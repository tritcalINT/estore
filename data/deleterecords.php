<?php

$delete_id = $_POST['id'];
$table_name = $_POST['tbl'];

include_once '../../conn.php';

if($table_name == 'a'){
    $sql_delete = "UPDATE administrators SET a_status = '0' WHERE a_id = '".$delete_id."'";
} else if($table_name == 'm'){
	$sql_delete = "UPDATE members SET m_status = '0' WHERE m_id = '".$delete_id."'";
} else if($table_name == 'mp'){
	$sql_delete = "UPDATE member_package SET mp_status = '0' WHERE mp_id = '".$delete_id."'";
} else if($table_name == 'cu'){
	$sql_delete = "UPDATE currency SET cu_status = '0' WHERE cu_id = '".$delete_id."'";
} else if($table_name == 'ts'){
	$sql_delete = "UPDATE topup_settings SET ts_status = '0' WHERE ts_id = '".$delete_id."'";
} else if($table_name == 'tr'){
	$sql_delete = "UPDATE trade_settings SET tr_status = '0' WHERE tr_id = '".$delete_id."'";
} else if($table_name == 'ln'){
	$sql_delete = "UPDATE latest_news SET ln_status = '0' WHERE ln_id = '".$delete_id."'";
} else if($table_name == 'a1'){
	$sql_delete = "UPDATE announcement_1 SET a1_status = '0' WHERE 	a1_id = '".$delete_id."'";
} else if($table_name == 'a2'){
	$sql_delete = "UPDATE announcement_2 SET a2_status = '0' WHERE 	a2_id = '".$delete_id."'";
}

if (mysqli_query($conn, $sql_delete)){
    echo "1";
}

?>