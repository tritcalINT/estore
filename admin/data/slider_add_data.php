<?php


/**
 * Created by PhpStorm.
 * User: amila Shanaka 
 * Date: 5/7/2019
 * Time: 9:08 PM
 */

// Table Structure 

/* CREATE TABLE shopdb.sliders (
  sl_id INT(11) NOT NULL AUTO_INCREMENT,
  sl_title VARCHAR(255) DEFAULT NULL,
  sl_1_image_back VARCHAR(255) DEFAULT NULL,
  sl_1_image_prmo VARCHAR(100) DEFAULT NULL,
  sl_1_slag VARCHAR(255) DEFAULT NULL,
  sl_2_image_back VARCHAR(100) DEFAULT NULL,
  sl_2_image_promo_1 VARCHAR(255) DEFAULT NULL,
  sl_2_image_promo_2 VARCHAR(255) DEFAULT NULL,
  sl_2_slag VARCHAR(255) DEFAULT NULL,
  sl_3_imge_back VARCHAR(255) DEFAULT NULL,
  sl_3_imge_promo_1 VARCHAR(255) DEFAULT NULL,
  sl_3_img_promo_2 VARCHAR(255) DEFAULT NULL,
  sl_3_img_promo_3 VARCHAR(255) DEFAULT NULL,
  sl_3_slag VARCHAR(255) DEFAULT NULL,
  sl_updated_by INT(11) DEFAULT NULL,
  sl_created_by INT(11) DEFAULT NULL,
  sl_status INT(11) DEFAULT NULL,
  sl_date DATETIME DEFAULT NULL,
  PRIMARY KEY (sl_id)
)
ENGINE = INNODB,
CHARACTER SET latin1,
COLLATE latin1_swedish_ci; */
//==============================================================================

// Variable Declare 
$sl_id = '';
$sl_title = '';
// Images And Information 
$sl_1_image_back = '';
$sl_1_image_prmo = '';
$sl_1_slag = '';
$sl_2_image_back  = '';
$sl_2_image_promo_1 = '';
$sl_2_image_promo_2= '';
$sl_3_imge_back = '';
$sl_3_imge_promo_1 = '';
$sl_3_imge_promo_2 = '';
$sl_3_image_promo_3='';
// andmin parameters 
$sl_updated_by  = '';
$sl_created_by = '';
$sl_date = '';
$sl_status = '';
$action = '';
//==============================================================================

if(isset($_GET['action'])) {
    if ($_GET['action'] == 'update') {
        if (!empty($_GET['sl'])) {
            $sl_id_find = $_GET['sl'];

            $sql="SELECT * FROM sliders WHERE sl_id='".$sl_id_find."'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $sl_id = $row['sl_id'];
            $sl_title =$row['sl_title'];
            $sl_1_image_back =$row['sl_1_image_back'];
            $sl_1_image_prmo = $row['sl_1_image_prmo'];
            $sl_1_slag = $row['sl_1_slag'];
            $sl_2_image_back  = $row['sl_2_image_back'];
            $sl_2_image_promo_1 = $row['sl_title'];
            $sl_2_image_promo_2= $row['sl_title'];
            $sl_3_imge_back = $row['sl_title'];
            $sl_3_imge_promo_1 = $row['sl_title'];
            $sl_3_imge_promo_2 = $row['sl_title'];
            $sl_3_image_promo_3=$row['sl_3_image_promo_3'];
            $sl_updated_by  = $row['sl_title'];
            $sl_created_by = $row['sl_title'];
            $sl_date = $row['sl_title'];
            $sl_status = $row['sl_title'];
            $action = $_GET['action'];
        }
    }
}

?>