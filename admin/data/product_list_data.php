<?php




if (!empty($_POST['search_date'])) {
	$search_date = $_POST['search_date'];	
	$sql_search_date = " AND DATE(ln_date) = '".$search_date."'";
} else {
	$search_date = '';
	$sql_search_date = '';
}


if (!empty($_POST['search_value'])) {
	$search_value = $_POST['search_value'];
	$sql_search_value = " AND ln_title LIKE '%".$search_value."%'";
} else {
	$search_value = '';
	$sql_search_value = '';
}

$sql = "SELECT `product_id`,`name`,`main_img`,`category_id`,`start_date`,`expire_date`,`created_by`,status from product";

$result = mysqli_query($conn, $sql);



/*INSERT INTO `product` (`product_id`, `name`, `short_description`, `long_des`, `category_id`, `Main_img`, `image1`, `image2`, `image3`, `image4`, `image5`, `Main_price`, `price1`, `itemcost`, `video_description`, `status`, `start_date`, `expire_date`, `in_stock`) VALUES ('2', 'aXASDASDAS', 'ASDASDSAD', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '') */


?>