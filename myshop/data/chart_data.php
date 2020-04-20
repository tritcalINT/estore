<?php
//setting header to json
header('Content-Type: application/json');

include_once '../../conn.php';

$today = date('Y-m-d');

$sql="SELECT ROUND(cd_value, 5) as ch_val, DATE_FORMAT(cd_time, '%d/%m') as ch_time FROM chart_data WHERE DATE(cd_time) = '".$today."' ORDER BY cd_time";
$result = mysqli_query($conn, $sql);
$data = array();
while($row = mysqli_fetch_assoc($result)) { 
	$data[] = $row;
}

print json_encode($data);

?>