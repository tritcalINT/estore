<?php

$brand_id = '';
$brand_name = '';
$brand_cat = '';
$brand_description = '';
$brand_logo = '';
$brand_status = '';

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'update') {
        if (!empty($_GET['id'])) {
            $brand_id = $_GET['id'];

            $sql = "SELECT * FROM brands WHERE id='" . $brand_id . "'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $brand_name = $row['name'];
            $brand_cat = $row['category'];
            $brand_description = $row['des'];
            $brand_logo = $row['logo'];
            $brand_status = $row['status'];
        }
    }
}
?>