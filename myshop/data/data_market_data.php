<?php
if (!empty($_POST['search_date'])) {
	$search_date = $_POST['search_date'];	
} else {
	$search_date = date('Y-m-d');
}
$sql_search_date = " AND DATE(cd_time) = '".$search_date."'";

if (!empty($_POST['search_amount'])) {
	$search_amount = $_POST['search_amount'];
	$sql_search_amount = " AND cd_value = '".$search_amount."'";
} else {
	$search_amount = '';
	$sql_search_amount = '';
}

$sqlmarket = "SELECT cd_value, DATE_FORMAT(cd_time, '%d/%m/%Y %h:%i %p') as market_time FROM chart_data WHERE 1=1 ".$sql_search_date.$sql_search_amount." ORDER BY cd_time DESC";
					
$resultmarket = mysqli_query($conn, $sqlmarket);
$num_rows = mysqli_num_rows($resultmarket);

?>