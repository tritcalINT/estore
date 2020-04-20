

<?php
// By Amila 
//include top header with nav and login and the cart

require_once './head_detail_botom.php';
if (isset($_GET['cat'])) {
    $cat_id = $_GET['cat'];
} else {
    $cat_id = '';
}

if (isset($_GET['collection'])) {
    $collection = $_GET['collection'];
} else {
    $collection = '';
}

if (isset($_GET['error'])) {

    $error = $_GET['error'];
} else {

    $error = '';
}
?>

<!-- End Header -->
<div id="content">
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-left sidebar col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="inner-left">
                        <div class="block block-layered-nav">
                            <div class="block-title">
                                <strong><span><?= $lang['Shop By'] ?></span></strong>
                            </div>
                            <dl id="narrow-by-list">
                                <dt class="first"><?= $lang['Category'] ?></dt>
                                <dd>
                                    <ol>
                                        <li><a href="grid.php?cat=apple">Apples & pears</a></li>
                                        <li><a href="grid.php?cat=stone">Stone fruit</a></li>
                                        <li><a href="grid.php?cat=melon">Melons</a></li>
                                        <li><a href="grid.php?cat=berry">Berries</a></li>
                                        <li><a href="grid.php?cat=exotic">Tropical & exotic</a></li>
                                        <li><a href="grid.php?cat=vege">Fresh Vegetables</a></li>
                                    </ol>
                                </dd>
                            </dl>
                        </div>
                        <?php //require_once './vt-slider.php'; ?>
                        <!--block-special-->										
                    </div>
                </div>
                <div class="col-main col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    <div class="box-breadcrumbs">
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home">
                                    <a href="index.php" title="Go to Home Page"><?= $lang['Home'] ?></a>
                                    <span>|</span>
                                </li>
                                <li>
                                    <?php
                                    if ($cat_id != '') {
                                        echo '<a href="grid.php"> CATEGORY</a>
										<span>|</span>
									</li>
									<li class="category4">
										<strong>' . $cat_id . '</strong>
									</li>';
                                    } elseif ($collection != '') {

                                        echo '<a href="grid.php">Collection</a>
										<span>|</span>
									</li>
									<li class="category4">
										<strong>' . $collection . '</strong>
									</li>';
                                    }
                                    ?>

                            </ul>
                        </div>
                    </div>
                    <div class="block-tag">
                        <label><?= $lang['Hot Tag'] ?></label>
                        <a href="grid.php?collection=Sexy"><span> </span></a>
                        <a href="grid.php?collection=Casual"><span> </span></a>
                        <a href="grid.php?collection=Slim"><span> </span></a>
                        <a href="grid.php?collection=Sleeveless"><span> </span></a>
                        <a href="grid.php?collection=Lace"><span> </span></a>
                        <a href="grid.php?collection=Chiffon"><span> </span></a>
                        <a href="grid.php?collection=Black"><span> </span></a>
                        <a href="grid.php?collection=Girl"><span> </span></a>
                        <a href="grid.php?collection=Boy"><span> </span></a>

<!--							<span class="open-item closetag">open</span>-->
                    </div>
                    <div id="catalog-listing">
                        <div class="category-products">
                            <div class="toolbar-top">
                                <div class="toolbar col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="box-top col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="sort-by col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                            <ul class="select-order">
                                                <li><a href="#auto-accessories.php?dir=asc&amp;order=position" class="selected"><?= $lang['Position'] ?></a></li>
                                                <li><a href="#auto-accessories.php?dir=asc&amp;order=name"><?= $lang['Name'] ?></a></li>
                                                <li><a href="#auto-accessories.php?dir=asc&amp;order=price"><?= $lang['Price'] ?></a></li>
                                                <li><a class="desc" href="#auto-accessories.php?dir=desc&amp;order=position" title="Set Descending Direction"></a></li>
                                            </ul>
                                        </div>
                                        <div class="view-mode col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <div class="inner">
                                                <label>View as</label>
                                                <span class="btn-view-mode">
                                                    <a href="grid.php" title="List" class="grid"><?= $lang['List'] ?></a>
                                                    <a href="list.php" class="list">Grid</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-bottom col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="limiter col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <div class="limiter-inner">
                                                <span><?= $lang['Show'] ?></span>
                                                <div class="wrap-show">
                                                    <div class="selected-limiter">12</div>
                                                    <ul class="select-limiter">
                                                        <li><a href="#auto-accessories.php?limit=12" class="selected">12</a></li>
                                                        <li><a href="#auto-accessories.php?limit=24">24</a></li>
                                                        <li><a href="#auto-accessories.php?limit=36">36</a></li>
                                                    </ul>
                                                </div>
                                                <label class="stylepp">per page</label>
                                            </div>
                                        </div>
                                        <div class="pager col-lg-6 col-md-6 col-sm-5 col-xs-6">
                                            <p class="amount">
                                                Items 1 to 12 of 16 total                    
                                            </p>
                                            <div class="pages">
                                                <strong><?= $lang['Pages'] ?> </strong>
                                                <ol>
                                                    <li class="current">1</li>
                                                    <li><a href="#auto-accessories.php?p=2">2</a></li>
                                                    <li>
                                                        <a class="next i-next" href="#auto-accessories.php?p=2" title="Next">Next</a>
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                        <!--end pages-->
                                        <div class="go-to-page col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                            <div class="inner">
                                                <label><?= $lang['Go to page'] ?></label>
                                                <form action="#">
                                                    <input type="text" id="gotopage" name="p" value="1">
                                                    <input type="submit" class="button" id="btnpage" value="<?= $lang['Go'] ?>" name="subpage">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            require_once './products_grid.php';
                            ?>
                            <div class="toolbar-bottom">
                                <div class="toolbar col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="box-top col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="sort-by col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                            <ul class="select-order">
                                                <li><a href="#auto-accessories.php?dir=asc&amp;order=position" class="selected"><?= $lang['Position'] ?></a></li>
                                                <li><a href="#auto-accessories.php?dir=asc&amp;order=name"><?= $lang['Name'] ?></a></li>
                                                <li><a href="#auto-accessories.php?dir=asc&amp;order=price"><?= $lang['Price'] ?></a></li>
                                                <li><a class="desc" href="#auto-accessories.php?dir=desc&amp;order=position" title="Set Descending Direction"></a></li>
                                            </ul>
                                        </div>
                                        <div class="view-mode col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <div class="inner">
                                                <label>View as</label>
                                                <!--<p class="view-mode">
                                                        <strong class="grid" title="Grid">Grid</strong>
                                                        <a class="list" title="List" href="#auto-accessories.php?mode=list">List</a>&nbsp;
                                                        </p>-->
                                                <span class="btn-view-mode">
                                                    <a href="grid.php" title="List" class="grid">List</a>
                                                    <a href="list.php" class="list">Grid</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-bottom col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="limiter col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <div class="limiter-inner">
                                                <span><?= $lang['Show'] ?></span>
                                                <div class="wrap-show">
                                                    <div class="selected-limiter">12</div>
                                                    <ul class="select-limiter">
                                                        <li><a href="#auto-accessories.php?limit=12" class="selected">12</a></li>
                                                        <li><a href="#auto-accessories.php?limit=24">24</a></li>
                                                        <li><a href="#auto-accessories.php?limit=36">36</a></li>
                                                    </ul>
                                                </div>
                                                <label class="stylepp">per page</label>
                                            </div>
                                        </div>
                                        <div class="pager col-lg-6 col-md-6 col-sm-5 col-xs-6">
                                            <p class="amount">
                                                Items 1 to 12 of 16 total                    
                                            </p>
                                            <div class="pages">
                                                <strong><?= $lang['Pages'] ?></strong>
                                                <ol>
                                                    <li class="current">1</li>
                                                    <li><a href="#auto-accessories.php?p=2">2</a></li>
                                                    <li>
                                                        <a class="next i-next" href="#auto-accessories.php?p=2" title="Next">Next</a>
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                        <!--end pages-->
                                        <div class="go-to-page col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                            <div class="inner">
                                                <label><?= $lang['Go to page'] ?>:</label>
                                                <form action="#">
                                                    <input type="text" id="gotopage" name="p" value="1">
                                                    <input type="submit" class="button" id="btnpage" value="<?= $lang['Go'] ?>" name="subpage">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-buyer-protec col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="inner">
                                    <a class="icart" href="#">cart</a>
                                    <h2><?= $lang['Buyer Protection'] ?></h2>
                                    <ul>
                                        <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <span class="text-style"><?= $lang['Full Refund'] ?></span><span><?= $lang['if you dont receive your order'] ?></span>
                                        </li>
                                        <li class="last col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <span class="text-style"><?= $lang['Refund or Keep'] ?></span><span><?= $lang['items not as described'] ?></span><br>
                                            <!--												<a href="#" class="link-more">Learn More</a>-->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once './footer.php';
include ("footerhtmlbottom.php");
?>
</div>	
</body>
<script>
    $(document).ready(function () {

        refrehCart();
    });


</script>
</html>