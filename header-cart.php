<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

?>



<div class="block-cart box">
<a href="cart.php" class="link-cart-top">
        <div id='cartdiv'>

        </div>	

    </a>


    <div class="block-content box-inner">
            <div class="inner" id="listcartmenu">

            </div>
    </div>
</div>