<?php

$cat_id = '';
$cat_title = '';
$cat_brand = '';
$cat_description = '';
$cat_logo = '';
$cat_status = '';

if(isset($_GET['action'])) {
	if ($_GET['action'] == 'update') {
		if (!empty($_GET['id'])) {
			$cat_id = $_GET['id'];
			
			$sql="SELECT * FROM  categories WHERE cat_id='".$cat_id."'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
                        $cat_title = $row['name'];
                        $cat_sku=$row['sku'];
                        $cat_level=$row['level'];
                        $cat_main=$row['main_cat'];
                        $cat_brand = $row['brand'];
                        $cat_description = $row['description'];
                        $cat_logo = $row['logo'];
                        $cat_status = $row['status'];
		}
	}
}

?>