<?php
include_once 'common.php';
include_once 'conn.php';
include_once 'include/constants.php';
include_once 'include/session.php';
include_once 'classes/sessionCtrl.php';
include_once 'include/database.php';
include_once 'data/functions.php';
?>



<div class="new-arrival-product">
    <div class="container">
        <div class="title-box-default">
            <a href="#" class="prev-new-arrival"><i class="fa fa-arrow-circle-left"></i></a>
            <span class="title-tab"><?= $lang['New Arrivals']; ?></span>
            <a href="#" class="next-new-arrival"><i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <!-- End Title Slider -->
        <div class="content-product-slider">
            <div class="wrap-item owl-carousel owl-theme" style="opacity: 1; display: block;">
                <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 4132px; left: 0px; display: block;"><div class="owl-item" style="width: 1033px;"><div class="item">
                                <div class="row">

                                    <?php
                                    $colectionName = "New";
                                    $data = $database->listCollections($colectionName);

                                    $i = 0;

                                    $cnt = 1;

                                    while ($row = $database->fetch_set($data)) {

                                        $qtyid = 'qty' . $i;

                                        $hqtyid = 'hqty' . $i;

                                        $strdet = "detail.php?pitmky=" . base64_encode($row['product_id']) . "&pele=" . base64_decode($i);
                                        ?>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="item-product">
                                                <div class="item-thumb-product">
                                                    <img <?php echo ' src="' . $row['main_img'] . '"'; ?> alt=""  class="product-thumb-front imageresize" />
                                                    <img <?php echo ' src="' . $row['image1'] . '"'; ?> alt=""   class="product-thumb-behind" />
                                                    <div class="info-product-cart">
                                                        <div class="inner-info-product-cart">
                                                            <ul>
                                                                <li><a href="#" class="link-wishlist"><i class="fa fa-heart"></i></a></li>
                                                                <li><a href="<?php echo $strdet; ?>" class="link-quick-view"><i class="fa fa-search"></i></a></li>
                                                                <li><a href="#" class="link-compare"><i class="fa fa-external-link-square"></i></a></li>
                                                            </ul>
                                                            <a onclick="addToCart(<?php echo $row['product_id']; ?>, 1)" class="link-product-add-cart">Add to cart</a>
                                                        </div>
                                                    </div>
                                                    <span class="status-product-new"><?php echo $row['category_id']; ?></span>
                                                    <?php
                                                    $sale = round(((((int) $row['discounted_price'] - (int) $row['sales_price']) / (int) $row['discounted_price'])) * 100);

                                                    if ($sale > 5) {

                                                        echo'<span class="status-product-sale">' . $sale . '%</span>';
                                                    }
                                                    ?>
                                                </div>
                                                <div class="item-info-product">
                                                    <h3><a href="grid.php?collection=<?php echo $row['collection']; ?>"><?php echo $row['collection']; ?></a></h3>
                                                    <div class="info-product-price">
                                                        <span>$<?php echo $row['sales_price']; ?></span>
                                                        <del>$<?php echo $row['discounted_price']; ?></del>
                                                    </div>
                                                    <div class="product-rating-star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>

                        <div class="owl-item" style="width: 1033px;"><div class="item">
                            </div></div></div></div>
                <!-- End Item -->

            </div>
        </div>
        <!-- End Content Slider Product -->
    </div>
</div>