<?php
session_start();
include_once './check_out_top_header.php';
include_once 'data/functions.php';

if($_SESSION['login'] != ''){
    
    $userdetails = getUserDetails($_SESSION['login'], $conn);
}

?>

<header id="header">

    <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="#home" class="active">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div style="padding-left:16px">
  <h2>Responsive Topnav Example</h2>
  <p>Resize the browser window to see how it works.</p>
</div>


		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div class="logo">
                                            <a href="index.php"><img src="images/home_11/logo.png" alt="" /></a>
					</div>
				</div>
				<div class="col-sm-8 col-xs-12">
					<div class="top-search">
						<div class="search-cat">
							<a href="#" class="box-cat-toggle">
								<img src="images/home_11/icon-cat-toggle.png" alt="" />
							</a>
							<div class="wrap-scrollbar" style="display: none;">
								<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 200px; height: 200px;">
									<div class="scrollbar" style="overflow: hidden; width: 200px; height: 200px;">
										<ul>
                                                                                    <li class="level-0"><a href="products.php">All Categories</a></li>
											<li class="level-1"><a href="products.php?cat=dress">Dress</a></li>
											<li class="level-2"><a href="products.php?cat=beauty">Beauty &amp; Perfumes</a></li>
											<li class="level-2"><a href="products.php?cat=dress">Collection</a></li>
											<li class="level-2"><a href="products.php?cat=dress">Hugpo Dinp</a></li>
											<li class="level-2"><a href="products.php?cat=dress">Hat &amp; Cavar</a></li>
											<li class="level-2"><a href="products.php?cat=dress">Danlien Polosa</a></li>
											<li class="level-2"><a href="products.php?cat=slimFit">Chemise SLimFit</a></li>
										</ul>
									</div>
									<div class="slimScrollBar" style="background: none repeat scroll 0% 0% rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 68.9655px;"></div>
									<div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: none repeat scroll 0% 0% rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
								</div>
							</div>
						</div>
						<div class="search-form">
							<form id ="search" method="get">
								<input type="text" name="search" value="Search..." onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue"  />
								<input type="submit" value="search" />
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="top-nav" id="mobile">
					<div class="row">
						<div class="col-md-10 col-sm-12 col-xs-12">
							<div class="main-nav">
								<ul class="list-inline">
									<li class="menu-item-has-children">
                                                                            <a href="index.php" class="active">Home</a>
										<ul class="sub-menu">
											<li><a href="about_us.php" class="active">About us</a></li>
											<li><a href="#">Officer Team</a></li>
											<li><a href="#">Branch</a></li>
                                                                                        <li><a href="contact.php">Contact us</a></li>
										</ul>
									</li>
									<li class="has-mega-menu">
										<a href="products.php?cat=Corssbody">Corssbody</a>
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
									<li class="has-mega-menu">
                                                                            <a href="products.php">Satchel Totes</a>
										<ul class="sub-menu">
											<li>
												<div class="wrap-mega-menu">
													<div class="row">
														<div class="col-md-6 col-sm-6 col-xs-12">
															<div class="mega-menu-simple-banner text-outer">
																<div class="mega-menu-simple-thumb">
                                                                                                                                    <a href="products.php"><img src="images/home_11/mega-menu-women.png" alt="" /></a>
																</div>
																<div class="mega-menu-simple-text">
																	<p class="mega-menu-text-intro"><strong>Women fashion</strong>  <span>|  Lorem ipsum dolor sit amet</span></p>
																</div>
															</div>
															<!-- End Mega Menu Simple Banner -->
														</div>
														<div class="col-md-3 col-sm-3 col-xs-12">
															<div class="mega-menu-list-category">
																<h2>Categories
                                                                                                                                
                                                                                                                                </h2>
																<ul>
																	<li><a href="products.php?cat=tops">Tops</a></li>
																	<li><a href="products.php?cat=sweaters">Sweaters</a></li>
																	<li><a href="products.php?cat=bottoms">Bottoms</a></li>
																	<li><a href="products.php?cat=dresses">Dresses</a></li>
																	<li><a href="products.php?cat=coats">Coats &amp; Jackets</a></li>
																	<li><a href="products.php?cat=scarves">Scarves</a></li>
																	<li><a href="products.php?cat=pants">Pants</a></li>
                                                                                                                                        <li><a href="contact.php">Contact Us</a></li>
																</ul>
															</div>
														</div>
														<div class="col-md-3 col-sm-3 col-xs-12">
															<div class="mega-menu-slider-brand">
																<h2>Style-Brands</h2>
																<div class="wrap-item">
																	<div class="item">
																		<div class="inner-brand">
                                                                                                                                                    <a href="products.php"><img src="images/banner/logo-brand-01.png" alt=""/></a>
																			<a href="products.php"><img src="images/banner/logo-brand-02.png" alt=""/></a>
																			<a href="products.php"><img src="images/banner/logo-brand-03.png" alt=""/></a>
																		</div>
																	</div>
																	<div class="item">
																		<div class="inner-brand">
																			<a href="products.php"><img src="images/banner/logo-brand-01.png" alt=""/></a>
																			<a href="products.php"><img src="images/banner/logo-brand-03.png" alt=""/></a>
																			<a href="products.php"><img src="images/banner/logo-brand-02.png" alt=""/></a>
																		</div>
																	</div>
																	<div class="item">
																		<div class="inner-brand">
																			<a href="products.php"><img src="images/banner/logo-brand-02.png" alt=""/></a>
																			<a href="products.php"><img src="images/banner/logo-brand-03.png" alt=""/></a>
																			<a href="products.php"><img src="images/banner/logo-brand-01.png" alt=""/></a>
																		</div>
																	</div>
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
									</li>
									<li><a href="products.php">Ladies Wallets</a></li>
									<li><a href="products.php">Sweatshirts</a></li>
                                                                        
                                                                        
								</ul>
							</div>
							<!-- End Nav -->
						</div>
						<?php include_once './header-info.php';?>
					</div>
				</div>
			</div>
		</div>
	</header>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>