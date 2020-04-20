<?php
session_start();
require_once './head_detail.php';
require_once 'data/functions.php';

if ($_SESSION['login'] != '') {

    $userdetails = getUserDetails($_SESSION['login'], $conn);
}
?>

<body style="">
    <div class="wrap">
        <header id="header" class="header-page">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <div class="logo">
                            <!--<a href="index.php"><img src="images/home_11/black_logo.png" alt=""></a>-->
                        </div>
                    </div>
                    <div class="col-sm-8 col-xs-12">
                        <div class="top-search">
                            <div class="search-cat">
                                <a href="#" class="box-cat-toggle"></a>
                                <div class="wrap-scrollbar" style="display: none;">
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 200px; height: 200px;">
                                        <div class="scrollbar" style="overflow: hidden; width: 200px; height: 200px;">
                                            <ul>
                                                <li class="level-0"><a href="grid.php">All Categories</a></li>
                                                <li class="level-1"><a href="grid.php?cat=dress">Dress</a></li>
                                                <li class="level-2"><a href="grid.php?cat=beauty">Beauty &amp; Perfumes</a></li>
                                                <li class="level-2"><a href="grid.php?cat=dress">Collection</a></li>
                                                <li class="level-2"><a href="grid.php?cat=dress">Hugpo Dinp</a></li>
                                                <li class="level-2"><a href="grid.php?cat=dress">Hat &amp; Cavar</a></li>
                                                <li class="level-2"><a href="grid.php?cat=dress">Danlien Polosa</a></li>
                                                <li class="level-2"><a href="grid.php?cat=slimFit">Chemise SLimFit</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="search-form">
                                <form method="get">
                                    <input type="text" name="s" value="<?= $lang['Search..'] ?>" onfocus="if (this.value == this.defaultValue)
                                                                            this.value = ''" onblur="if (this.value == '')
                                                                                        this.value = this.defaultValue">
                                    <input type="submit" value="">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="top-nav">
                    <div class="row">
                        <div class="col-md-10 col-sm-12 col-xs-6">
                            <nav class="main-nav">
                                <ul class="list-inline">
                                    <li >
                                        <a href="index.php"><?= $lang['Home'] ?></a>
                                        <!--									<ul class="sub-menu">
                                                                                                                        <li><a href="about_us.php" class="active">About us</a></li>
                                                                                                                        <li><a href="#">Officer Team</a></li>
                                                                                                                        <li><a href="#">Branch</a></li>
                                                                                                                        <li><a href="contact.php">Contact us</a></li>
                                                                                                                </ul>-->
                                    </li>
                                    <li class="has-mega-menu">
                                        <a href="#"><?= $lang['CORSSBODY'] ?></a>
                                        <ul class="sub-menu">
                                            <li>
                                                <div class="wrap-mega-menu">
                                                    <div class="mega-menu-list-product">
                                                        <h2 class="title-mega-menu">Collection</h2>
                                                        <?php
                                                        require_once './mega_slide.php';
                                                        ?>
                                                        <div class="owl-direct-nav">
                                                            <a class="prev" href="#"><i class="fa fa-arrow-circle-left"></i></a>
                                                            <a class="next" href="#"><i class="fa fa-arrow-circle-right"></i></a>
                                                        </div>
                                                    </div>
                                                    <!-- End Sub Mega Menu Slide-->
                                                    <div class="mega-menu-simple-banner text-inner">
                                                        <div class="mega-menu-simple-thumb">
                                                            <a href="#"><img src="images/home_11/mega-menu-banner.png" alt="" /></a>
                                                        </div>
                                                        <div class="mega-menu-simple-text">
                                                            <p class="simple-text1">big sale </p>
                                                            <p class="simple-text2">up to<br/>80% off</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Mega Menu Simple Banner -->
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <!--								<li class="has-mega-menu">
                                                                                                            <a href="#">Satchel Totes</a>
                                                                                                            <ul class="sub-menu">
                                                                                                                    <li>
                                                                                                                            <div class="wrap-mega-menu">
                                                                                                                                    <div class="row">
                                                                                                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                                                                                    <div class="mega-menu-simple-banner text-outer">
                                                                                                                                                            <div class="mega-menu-simple-thumb">
                                                                                                                                                                    <a href="#"><img src="images/home_11/mega-menu-women.png" alt=""></a>
                                                                                                                                                            </div>
                                                                                                                                                            <div class="mega-menu-simple-text">
                                                                                                                                                                    <p class="mega-menu-text-intro"><strong>Women fashion</strong>  <span>|  Lorem ipsum dolor sit amet</span></p>
                                                                                                                                                            </div>
                                                                                                                                                    </div>
                                                                                                                                                     End Mega Menu Simple Banner 
                                                                                                                                            </div>
                                                                                                                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                                                                                                                    <div class="mega-menu-list-category">
                                                                                                                                                            <h2>Categories</h2>
                                                                                                                                                            <ul>
                                                                                                                                                                    <li><a href="grid.php?cat=tops">Tops</a></li>
                                                                                                                                                                            <li><a href="grid.php?cat=sweaters">Sweaters</a></li>
                                                                                                                                                                            <li><a href="grid.php?cat=bottoms">Bottoms</a></li>
                                                                                                                                                                            <li><a href="grid.php?cat=dresses">Dresses</a></li>
                                                                                                                                                                            <li><a href="grid.php?cat=coats">Coats &amp; Jackets</a></li>
                                                                                                                                                                            <li><a href="grid.php?cat=scarves">Scarves</a></li>
                                                                                                                                                                            <li><a href="grid.php?cat=pants">Pants</a></li>
                                                                                                                                                                            <li><a href="contact.php">Contact Us</a></li>
                                                                                                                                                            </ul>
                                                                                                                                                    </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                                                                                                                    <div class="mega-menu-slider-brand">
                                                                                                                                                            <h2>Style-Brands</h2>
                                                                                                                                                            <div class="wrap-item owl-carousel owl-theme" style="opacity: 1; display: block;">
                                                                                                                                                                    <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 1056px; left: 0px; display: block;"><div class="owl-item" style="width: 176px;"><div class="item">
                                                                                                                                                                            <div class="inner-brand">
                                                                                                                                                                                     <a href="grid.php"><img src="images/banner/logo-brand-01.png" alt=""/></a>
                                                                                                                                                                                            <a href="grid.php"><img src="images/banner/logo-brand-02.png" alt=""/></a>
                                                                                                                                                                                            <a href="grid.php"><img src="images/banner/logo-brand-03.png" alt=""/></a>
                                                                                                                                                                                    
                                                                                                                                                                            </div>
                                                                                                                                                                    </div></div><div class="owl-item" style="width: 176px;"><div class="item">
                                                                                                                                                                            <div class="inner-brand">
                                                                                                                                                                                    <a href="grid.php"><img src="images/banner/logo-brand-01.png" alt=""/></a>
                                                                                                                                                                                            <a href="grid.php"><img src="images/banner/logo-brand-03.png" alt=""/></a>
                                                                                                                                                                                            <a href="grid.php"><img src="images/banner/logo-brand-02.png" alt=""/></a>
                                                                                                                                                                            </div>
                                                                                                                                                                    </div></div><div class="owl-item" style="width: 176px;"><div class="item">
                                                                                                                                                                            <div class="inner-brand">
                                                                                                                                                                                    <a href="grid.php"><img src="images/banner/logo-brand-02.png" alt=""/></a>
                                                                                                                                                                                            <a href="grid.php"><img src="images/banner/logo-brand-03.png" alt=""/></a>
                                                                                                                                                                                            <a href="grid.php"><img src="images/banner/logo-brand-01.png" alt=""/></a>
                                                                                                                                                                            </div>
                                                                                                                                                                    </div></div></div></div>
                                                                                                                                                                    
                                                                                                                                                                    
                                                                                                                                                            </div>
                                                                                                                                                            <div class="owl-direct-nav">
                                                                                                                                                                    <a class="prev" href="#"><i class="fa fa-arrow-circle-left"></i></a>
                                                                                                                                                                    <a class="next" href="#"><i class="fa fa-arrow-circle-right"></i></a>
                                                                                                                                                            </div>
                                                                                                                                                    </div>
                                                                                                                                            </div>
                                                                                                                                    </div>
                                                                                                                            </div>
                                                                                                                    </li>
                                                                                                            </ul>
                                                                                                    </li>-->
                                    <li><a href="about_us.php"><?= $lang['About us'] ?></a></li>
                                    <li><a href="contact.php"><?= $lang['CONTACT  US'] ?></a></li>

                                </ul>
                                <a href="index.php" class="btn-mobile-menu"></a>
                            </nav>
                            <!-- End Nav -->
                        </div>
                        <?php include_once './header-info.php'; ?>
                    </div>
                </div>
            </div>
        </header>