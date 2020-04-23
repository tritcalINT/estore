

<?php
include_once './conn.php';
include_once './dbcontroller.php';
include_once './include/database.php';
?>




<ol class="products-list">
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

        <li class="item">
            <div class="inner">
                <div class="item-image">
                    <div class="item-image-inner">
                        <a class="product-image" href="detail.php">
                            <img src="<?= $row['main_img'] ?>" alt="">
                        </a>                             
                        <div class="item-btn">
                            <div class="btn-wqc">
                                <a href="#" class="link-wishlist"></a>
                                <a class="vt_quickview_handler" href="<?= $strdet; ?>"><span>Quick View</span></a>
                                <a href="#" class="link-compare"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-name">
                        <a href="detail.php">Cotton Lycra Leggings</a>
                    </div>
                    <div class="cate-name">
                        <a href="#"><?php echo $row['collection']; ?></a>
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
                    <div class="desc">
                        <?php echo htmlspecialchars_decode(stripslashes($row['short_description'])); ?>
                    </div>
                    <a class="button" href="#">Shop now</a>
                    <div class="box-qty-btncart">
                        <button onclick="addToCart(<?php echo $itemKey; ?>, $('#qty').val())" class="btn-cart"><span>Add To Cart</span></button>
                        <div class="box-qty" >
                            <div class="flycart_qty_edit">
                                <a class="flycart-qty-btn left --remove js_spin-remove " data-dir="dwn">down</a>
                                <input type="text" class="input-text qty flycart-qty"  value="1"  id="qty" name="qty">
                                <a class="flycart-qty-btn right --add  js_spin-add" data-dir="up">up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end inner -->                 
        </li>
        <?php
    }
    ?>

</ol>