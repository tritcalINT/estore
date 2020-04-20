<?php

$pd_id =0;
$pd_name = '';
$pd_short_description = '';
$pd_long_des ='';
$pd_category_id =0;
$pd_Main_img = '';
$pd_image1 ='';
$pd_image2  ='';
$pd_image3 = '';
$pd_image4 = '';
$pd_image5 = '';
$pd_Main_price = 0.00;
$pd_sales_price = 0.00;
$pd_item_cost =0.00;
$pd_video_description ='';
$pd_status ='';
$pd_start_date = '';
$pd_expire_date = '';
$pd_in_stock = 0;
$pd_product_code='';

if(isset($_GET['action'])) {
	if ($_GET['action'] == 'update') {
            if (!empty($_GET['pd'])) {
			$pd_id = $_GET['pd'];
			$sql="SELECT * FROM product WHERE product_id='".$pd_id."'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
                        $pd_id = $row['product_id'];
                        $pd_product_code=$row['code'];
			$pd_name = $row['name'];
			$pd_short_description = $row['short_description'];
			$pd_long_des = $row['long_des'];
			$pd_category_id = $row['category_id'];
			$pd_Main_img = $row['main_img'];
                        $pd_image1 = $row['image1'];
                        $pd_image2  = $row['image2'];
                        $pd_image3 = $row['image3'];
                        $pd_image4 = $row['image4'];
                        $pd_image5 = $row['image5'];
                        $pd_sales_price = $row['sales_price'];
                        $pd_discounted_price = $row['discounted_price'];
                        $pd_item_cost = $row['item_cost'];
                        $pd_video_description = $row['video_description'];
                        $pd_status = $row['status'];
                        $pd_start_date = $row['start_date'];
                        $pd_expire_date = $row['expire_date'];
                        $pd_in_stock = $row['in_stock'];
                        $pd_supplier_id=$row['supplier_id'];
                        $pd_collection=$row['collection'];
                        $pd_brand=$row['brand'];
                        $pd_qty=$row['stock_qty'];
                        $pd_related=$row['related'];
                        $pd_color=$row['color'];
                        $pd_size=$row['size'];
                 
                               
		}
	}
}

?>