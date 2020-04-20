<?php
session_start();
include_once './top_header_no_style.php';
include_once 'data/functions.php';


if($_SESSION['login'] != ''){
    $userdetails = getUserDetails($_SESSION['login'], $conn);
}

?>

<header id="header">
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
							<form method="get">
								<input type="text" name="s" value="Search..." onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue"  />
								<input type="submit" value="" />
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="top-nav">
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
                                                                                        <li><a href="contactus.php">Contact us</a></li>
										</ul>
									</li>
									<li class="has-mega-menu">
										<a href="#">Corssbody</a>
										<ul class="sub-menu">
											<li>
												<div class="wrap-mega-menu">
													<div class="mega-menu-list-product">
														<h2 class="title-mega-menu">Collection</h2>
														<div class="wrap-item">
															<div class="item">
																<div class="inner-item">
																	<div class="mega-slide-thumb">
																		<a href="#"><img src="images/product_home11/1.jpg" alt="" /></a>
																	</div>
																	<div class="mega-slide-text">
																		<span>$45.99</span>
																		<del>$69.71</del>
																	</div>
																</div>
															</div>
															<div class="item">
																<div class="inner-item">
																	<div class="mega-slide-thumb">
																		<a href="#"><img src="images/product_home11/3.jpg" alt="" /></a>
																	</div>
																	<div class="mega-slide-text">
																		<span>$45.99</span>
																	</div>
																</div>
															</div>
															<div class="item">
																<div class="inner-item">
																	<div class="mega-slide-thumb">
																		<a href="#"><img src="images/product_home11/8.jpg" alt="" /></a>
																	</div>
																	<div class="mega-slide-text">
																		<span>$45.99</span>
																		<del>$69.71</del>
																	</div>
																</div>
															</div>
															<div class="item">
																<div class="inner-item">
																	<div class="mega-slide-thumb">
																		<a href="#"><img src="images/product_home11/9.jpg" alt="" /></a>
																	</div>
																	<div class="mega-slide-text">
																		<span>$45.99</span>
																	</div>
																</div>
															</div>
															<div class="item">
																<div class="inner-item">
																	<div class="mega-slide-thumb">
																		<a href="#"><img src="images/product_home11/10.jpg" alt="" /></a>
																	</div>
																	<div class="mega-slide-text">
																		<span>$45.99</span>
																		<del>$69.71</del>
																	</div>
																</div>
															</div>
															<div class="item">
																<div class="inner-item">
																	<div class="mega-slide-thumb">
																		<a href="#"><img src="images/product_home11/11.jpg" alt="" /></a>
																	</div>
																	<div class="mega-slide-text">
																		<span>$45.99</span>
																	</div>
																</div>
															</div>
															<div class="item">
																<div class="inner-item">
																	<div class="mega-slide-thumb">
																		<a href="#"><img src="images/product_home11/12.jpg" alt="" /></a>
																	</div>
																	<div class="mega-slide-text">
																		<span>$45.99</span>
																	</div>
																</div>
															</div>
															<div class="item">
																<div class="inner-item">
																	<div class="mega-slide-thumb">
																		<a href="#"><img src="images/product_home11/14.jpg" alt="" /></a>
																	</div>
																	<div class="mega-slide-text">
																		<span>$45.99</span>
																		<del>$69.71</del>
																	</div>
																</div>
															</div>
															<div class="item">
																<div class="inner-item">
																	<div class="mega-slide-thumb">
																		<a href="#"><img src="images/product_home11/18.jpg" alt="" /></a>
																	</div>
																	<div class="mega-slide-text">
																		<span>$45.99</span>
																		<del>$69.71</del>
																	</div>
																</div>
															</div>
															<div class="item">
																<div class="inner-item">
																	<div class="mega-slide-thumb">
																		<a href="#"><img src="images/product_home11/21.jpg" alt="" /></a>
																	</div>
																	<div class="mega-slide-text">
																		<span>$45.99</span>
																	</div>
																</div>
															</div>
														</div>
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
															<p class="simple-text1">big sale on canifa shop</p>
															<p class="simple-text2">up to<br/>80% off</p>
														</div>
													</div>
													<!-- End Mega Menu Simple Banner -->
												</div>
											</li>
										</ul>
									</li>
									<li class="has-mega-menu">
										<a href="#">Satchel Totes</a>
										<ul class="sub-menu">
											<li>
												<div class="wrap-mega-menu">
													<div class="row">
														<div class="col-md-6 col-sm-6 col-xs-12">
															<div class="mega-menu-simple-banner text-outer">
																<div class="mega-menu-simple-thumb">
																	<a href="#"><img src="images/home_11/mega-menu-women.png" alt="" /></a>
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
																			<a href="#"><img src="images/banner/logo-brand-01.png" alt=""/></a>
																			<a href="#"><img src="images/banner/logo-brand-02.png" alt=""/></a>
																			<a href="#"><img src="images/banner/logo-brand-03.png" alt=""/></a>
																		</div>
																	</div>
																	<div class="item">
																		<div class="inner-brand">
																			<a href="#"><img src="images/banner/logo-brand-01.png" alt=""/></a>
																			<a href="#"><img src="images/banner/logo-brand-03.png" alt=""/></a>
																			<a href="#"><img src="images/banner/logo-brand-02.png" alt=""/></a>
																		</div>
																	</div>
																	<div class="item">
																		<div class="inner-brand">
																			<a href="#"><img src="images/banner/logo-brand-02.png" alt=""/></a>
																			<a href="#"><img src="images/banner/logo-brand-03.png" alt=""/></a>
																			<a href="#"><img src="images/banner/logo-brand-01.png" alt=""/></a>
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
									<li><a href="#">Ladies Wallets</a></li>
									<li><a href="#">Sweatshirts</a></li>
									<li><a href="#">Jackets &amp; Coats</a></li>
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