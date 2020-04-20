<?php

$usr_cat_id = '';
$usr_cat_name = '';
$usr_ref_per = '';
$usr_ref_link = '';
$usr_cat_level = '';
$usr_p_cat = '';
$usr_status = '';

if(isset($_GET['action'])) {
	if ($_GET['action'] == 'update') {
		if (!empty($_GET['user_cat_id'])) {
			$brand_id = $_GET['user_cat_id'];
			
			$sql="SELECT * FROM  user_cat WHERE id='".$usr_cat_id."'";
			 
                      
                        $usr_cat_name =$row['cat_name'];
                        $usr_ref_per =$row['ref_per'];
                        $usr_cat_level = $row['cat_level'];
                        $usr_cat_main = $row['main_cat'];
                        $user_cat_status = $row['status'];
                        
		}
	}
}

 