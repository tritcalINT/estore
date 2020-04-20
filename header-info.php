<div class="col-md-2 col-sm-12 col-xs-12">
							<div class="header-info">
								<div class="box-account-lc box">
									<a href="#" class="link-user-top"><img src="images/home_11/icon-user.png" alt="" /></a>
									<div class="box-inner">
										<ul class="links">
                                                                                    <li class="first"><a href="myaccount.php" title="My Account" class="top-link-myaccount"><?= $lang['My Account']?></a></li>
                                                                                    <li><a href="wishlist.php" title="My Wishlist" class="top-link-wishlist"><?= $lang['My Wishlist']?></a></li>
                                                                                        <li><a href="checkout.php" title="Checkout" class="top-link-checkout"><?= $lang['Checkout']?></a></li>
                                                                                        <?php if($_SESSION['login']!=''){?>
                                                                                            
                                                                                            
                                                                                        <li ><a href="logout.php" title="Log In" class="top-link-checkout"><?= $lang['Log Out']?></a></li>
                                                                                            
                                                                                        <?php    
                                                                                        }
                                                                                        else{
                                                                                            echo '<li ><a href="login.php" title="Log In" class="top-link-login"> ';?> <?= $lang['Log In']?> <?php echo '</a></li>';
                                                                                        }
                                                                                        ?>
                                                                                        
										</ul>   
										<div class="block block-language">
											<div class="lg-cur">
												<span>Language</span>
											</div>
											<ul>
												<li>
													<a class="selected" href="<?= $current_file ?>?lang=en">                    
													<img src="images/flags/flag-default.jpg" alt="flag">
													<span>English</span>
													</a>
												</li>
												<li>
													<a href="<?= $current_file ?>?lang=th">                    
													<img src="images/flags/th.png" alt="flag">
													<span>Thailand</span>
													</a>
												</li>
<!--												<li>
													<a href="#">                    
													<img src="images/flags/flag-german.jpg" alt="flag">
													<span>German</span>
													</a>
												</li>-->
<!--												<li>
													<a href="#">                    
													<img src="images/flags/flag-brazil.jpg" alt="flag">
													<span>Brazil</span>
													</a>
												</li>-->
											</ul>
										</div>
										<div class="block block-currency">
											<div class="item-cur">
												<span><?= $lang['Currency']?></span>           
											</div>
											<ul>
<!--												<li>
													<a href="#"><span class="cur_icon">$</span> EUR</a>
												</li>
												<li>
													<a href="#"><span class="cur_icon">$</span> JPY</a>
												</li>-->
												<li>
													<a class="selected" href="#"><span class="cur_icon">$</span> USD</a>
												</li>
											</ul>
										</div>
                                                                           
									</div>
                                                                        
								</div>
                                                            
                                                                
                                                                <?php require_once './header-cart.php';?>
                                                         
								 
                                                            
                                                        
							</div>
							<!-- End Header Info -->
						</div>