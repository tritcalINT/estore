<?php

include_once('../conn.php');
include_once ('../include/constants.php');
function getSliders(){
    
    $get_all_sliders = "SELECT * FROM sliders WHERE sl_status = 1";
    $result = mysqli_query($conn, $get_all_sliders);

    return $result;

}
