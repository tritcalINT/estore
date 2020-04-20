


<div class="wrap-item">

    <?php
    $data = $database->listTop10Items();

    $i = 0;

    $cnt = 1;

    while ($row = $database->fetch_set($data)) {

        $qtyid = 'qty' . $i;

        $hqtyid = 'hqty' . $i;

        $strdet = "detail.php?pitmky=" . base64_encode($row['product_id']) . "&pele=" . base64_decode($i);
        ?>

        <div class="item">
            <div class="inner-item">
                <div class="mega-slide-thumb">
                    <a href="<?php echo $strdet; ?>"><img <?php echo ' src="' . $row['main_img'] . '"'; ?> alt="" /></a>
                </div>
                <div class="mega-slide-text">
                    <span>$<?php echo $row['discounted_price'] ?></span>
                    <del>$<?php echo $row['sales_price'] ?></del>
                </div>
            </div>
        </div>


    <?php
}
?>    

</div>