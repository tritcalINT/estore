 
<?php
include_once './conn.php';
include_once './dbcontroller.php';
include_once './include/database.php';
?>


<ul class="products-grid">

    <?php
    if ($collection != '') {
        $data = $database->listCollections($collection);
    } else if ($cat_id != '') {

        $data = $database->listItemByCat($cat_id);
    } else {

        $data = $database->listAllItems(0, 0, '');
    }


    $i = 0;

    $cnt = 1;

    while ($row = $database->fetch_set($data)) {
        $qtyid = 'qty' . $i;
        $hqtyid = 'hqty' . $i;
        $strdet = "detail.php?pitmky=" . base64_encode($row['product_id']) . "&pele=" . base64_decode($i);
        ?>
        <li class="col-lg-4 col-md-4 col-sm-4 col-xs-6 item">
            <div class="margin-bottom">
                <br>
                <br>
            </div>
            <div class="inner">
                <div class="item-image">
                    <div class="item-image-inner">
                        <a class="product-image" href="#">
                            <img <?php echo ' src="' . $row['main_img'] . '"'; ?> alt="item1">
                        </a>                             
                        <div class="item-btn">
                            <div class="btn-wqc">
                                <a href="#" class="link-wishlist"></a>
                                <a class="vt_quickview_handler" href="<?php echo $strdet; ?>"><span>Quick View</span></a>
                                <a href="#" class="link-compare"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-name">
                        <a href="detail.php"><?php echo $row['name']; ?></a>
                    </div>
                    <div class="rating">
                        <div class="ratings">
                            <div class="rating-box">
                                <div class="rating" style="width:80%"></div>
                            </div>
                        </div>
                        <p class="rating-links">
                            <a href="#">1 (vote)</a>
                            <span class="separator">|</span>
                            <a class="re-temp" href="">Add Review</a>
                        </p>
                    </div>
                    <div class="wrap-ns-price">
                        <div class="price-box">
                            <p class="special-price">
                                <span class="price">$<?php echo $row['sales_price']; ?></span>
                            </p>
                            <p class="old-price">
                                <span class="price">$<?php echo $row['discounted_price']; ?></span>
                            </p>
                        </div>
                        <div class="wrap-new-sale">
                            <div class="sale-item">60%</div>
                            <div class="new-item">new</div>
                        </div>
                    </div>
                </div>
                <div class="wrap-btn-cart">
                    <div class="inner-wrap-btn-cart">
                        <button onclick="addToCart(<?php echo $row['product_id']; ?>, 1)" class="btn-cart"><span>Add to cart</span></button>
                    </div>
                </div>
            </div>

            <div class="margin10px">
                <br>
                <br><br>


            </div>

            <div class="margin10px">
                <br>
                <br>
                <hr>
            </div>
        </li>


        <?php
    }
    ?>

</ul>