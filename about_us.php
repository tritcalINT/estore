
<?php
include_once './header.php';
?>

<html lang="en-US">

    <body>

        <!-- End Header -->
        <div id="content">
            <div class="content-top">
                <div class="container">
                    <div class="row">
                        <div class="banner-simple-text">
                            <h2><?= $lang['THE BUSINESS'] ?></h2>
                            <h3>OF FRESH DEAL</h3>
                            <div class="text-special">
                                <strong>70</strong>
                                <span>%<br/>OFF</span>
                                <label><?= $lang['save up to'] ?> </label>
                                <a href="grid.php">HURRY UP NOW!</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
            <div class="banner-box-adv">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="inner-box-banner-adv odd bottom-right">
                            <a href="grid.php?cat=men" class="banner-adv-thumb-link"><img src="images/home_11/2.jpg" alt="" /></a>
                            <div class="text-adv-intro">
                                <h2><?= $lang['Apples']; ?></h2>
                                <h3><?= $lang['& pears']; ?></h3>
                            </div>
                            <div class="box-search-adv">

                            </div>
                            <a href="grid.php?cat=men" class="box-search-adv-link"><i class="fa fa-search"></i></a>
                            <div class="text-adv-hidden">
                                <p><?= $lang['Find Fresh Fruits & Vegetables']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="inner-box-banner-adv even bottom-left">
                            <a href="grid.php?cat=women" class="banner-adv-thumb-link"><img src="images/home_11/1.jpg" alt="" /></a>
                            <div class="text-adv-intro">
                                <h2><?= $lang['Berries']; ?></h2>
                                <h3><?= $lang['& Melons']; ?></h3>
                            </div>
                            <div class="box-search-adv">

                            </div>
                            <a href="grid.php?cat=women" class="box-search-adv-link"><i class="fa fa-search"></i></a>
                            <div class="text-adv-hidden">
                                <p><?= $lang['Find Fresh Fruits & Vegetables']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="inner-box-banner-adv odd top-right">
                            <a href="grid.php?cat=shoes" class="banner-adv-thumb-link"><img src="images/home_11/3.jpg" alt="" /></a>
                            <div class="text-adv-intro">
                                <h2><?= $lang['Tropical']; ?></h2>
                                <h3><?= $lang['& exotic']; ?></h3>
                            </div>
                            <div class="box-search-adv">

                            </div>
                            <a href="grid.php?cat=shoes" class="box-search-adv-link"><i class="fa fa-search"></i></a>
                            <div class="text-adv-hidden">
                                <p><?= $lang['Find Fresh Fruits & Vegetables']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="inner-box-banner-adv even top-left">
                            <a href="grid.php?collection=women" class="banner-adv-thumb-link"><img src="images/home_11/4.jpg" alt="" /></a>
                            <div class="text-adv-intro">
                                <h2><?= $lang['Fresh']; ?></h2>
                                <h3><?= $lang['Vegetables']; ?></h3>
                            </div>
                            <div class="box-search-adv">

                            </div>
                            <a href="grid.php?collection=women" class="box-search-adv-link"><i class="fa fa-search"></i></a>
                            <div class="text-adv-hidden">
                                <p><?= $lang['Find Fresh Fruits & Vegetables']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
        <!-- End Content -->
        <?php
        include ("footer.php");
        include ("footerhtmlbottom.php");
        ?>
        <!-- End Footer -->
    </body>
</html>