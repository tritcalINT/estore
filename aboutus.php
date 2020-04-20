
<?php
include_once './header.php';

if (isset($_GET['error'])) {
    $error = $_GET['error'];
} else {
    $error = '';
}
?>


<!DOCTYPE html>

<html>
    <body>
        <div id="wrapper">
            <section id="content">
                <div id="breadcrumb-container">
                    <div class="container">
                        <ul class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="active">About US</li>
                        </ul>
                    </div>
                </div>

                <div id="page-header">
                    <h1>
                        About Us
                        <span class="small-bottom-border big"></span><!-- small-bottom-border -->
                    </h1>
                    <div class="md-margin"></div><!-- space -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <p class="page-header-desc">Duis sed diam eget dolor mollis convallis. Maecenas elementum tortor a ipsum dapibus tincidunt.</p>
                            </div><!-- End .col-md-8 -->
                        </div><!-- End .row -->
                    </div> <!-- End .container -->
                </div><!-- End #page-header -->

                <div class="md-margin2x"></div><!-- space -->

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="hero-unit">
                                <h2>Welcome to Venedor!</h2>
                                <p>Venedor a modern and laconic theme based on Bootstrap’s 12 column 1200px responsive grid system.</p>
                                <span class="small-bottom-border big"></span><!-- small-bottom-border -->
                            </div><!-- End .hero-unit -->
                            <div class="md-margin2x"></div><!-- End .md-margin2x -->


                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-6 service-box-container">
                                    <div class="services-box">
                                        <div class="service-icon service-icon-responsive"></div>  
                                        <h3>
                                            <a href="#">Responcive Design</a>
                                            <span class="small-bottom-border"></span>
                                        </h3>
                                        <p>Cras pellentesque, nisi ac tempus pellentesque, orci sem commodo urna,amet egestas ipsum orci sit amet tellus. Mauris eu ante felis.</p>
                                    </div><!-- End .services-box -->
                                </div><!-- End .col-md-3 -->
                                <div class="col-md-3 col-sm-3 col-xs-6 service-box-container">
                                    <div class="services-box">
                                        <div class="service-icon service-icon-panel"></div>
                                        <h3>
                                            <a href="#">Powerful Amin Panel</a>
                                            <span class="small-bottom-border"></span>
                                        </h3>
                                        <p>Etiam dapibus mattis sapien, blandit molestie nunc venenatis ut. Phasellus imperdiet lacinia est, nec convallis dolor aliquet ac.</p>
                                    </div><!-- End .services-box -->
                                </div><!-- End .col-md-3 -->
                                <div class="col-md-3 col-sm-3 col-xs-6 service-box-container">
                                    <div class="services-box">
                                        <div class="service-icon service-icon-sliders"></div>
                                        <h3>
                                            <a href="#">Awesome Sliders</a>
                                            <span class="small-bottom-border"></span>
                                        </h3>
                                        <p>Duis a dignissim nulla. Phasellus lacinia aliquam lorem, a consequat erat interdum nec. Aenean ut leo sem, id gravida tortor.</p>
                                    </div><!-- End .services-box -->
                                </div><!-- End .col-md-3 -->
                                <div class="col-md-3 col-sm-3 col-xs-6 service-box-container">
                                    <div class="services-box">
                                        <div class="service-icon service-icon-support"></div>
                                        <h3>
                                            <a href="#">Premium Support</a>
                                            <span class="small-bottom-border"></span>
                                        </h3>
                                        <p>Pellentesque ut libero in nibh aliquet pretium eget elementum felis. Integer dapibus auctor tincidunt. Suspendisse potenti.</p>
                                    </div><!-- End .services-box -->
                                </div><!-- End .col-md-3 -->
                            </div><!-- End .row -->

                            <div class="lg-margin2x"></div><!-- space -->

                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <header class="content-title">
                                        <h2 class="title">Who are we?</h2>
                                        <div class="xss-margin"></div><!-- space -->
                                    </header>
                                    <p>Venedor is a fully responsive PSD theme designed for all types of platforms: WooCommerce, Magento, OpenCart, PrestaShop and other. Based on Bootstrap’s 12 column 1200px responsive grid Template. Great looks on desktops, tablets and mobiles. Sed interdum magna sit amet orci tristique blandit. Etiam id justo consequ quam viverra elementum. </p>
                                    <div class="xs-margin"></div>
                                    <p>Sed ac magna sed massa rhoncus elementum et ac augue. Morbi non tellus nisi. Pellentesque habitant morbi tristique senectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempor dictum ornare.Ut tincidunt velit nec ligula ornare bibendum. Aliquam ac sagittis metus. Suspendise eu nunc pulvinar,varius libero, eleifend nunc pellentesque mauris. <a href="#">Buy Venedor Template!</a></p>
                                    <div class="visible-xs md-margin"></div>
                                </div><!-- End .col-md-6 -->

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <header class="content-title">
                                        <h2 class="title">Our Skills</h2>
                                        <div class="xss-margin"></div><!-- space -->
                                    </header>

                                    <div class="progress-container">
                                        <h4>Wordpress</h4>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-custom progress-animate" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" data-width="85">
                                                <span class="progress-text">85%</span>
                                            </div><!-- End .progress-bar -->
                                        </div><!-- End .progress -->
                                    </div><!-- End .progress-container -->

                                    <div class="progress-container">
                                        <h4>photoshop</h4>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-custom progress-animate" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" data-width="73">
                                                <span class="progress-text">73%</span>
                                            </div><!-- End .progress-bar -->
                                        </div><!-- End .progress -->
                                    </div><!-- End .progress-container -->

                                    <div class="progress-container">
                                        <h4>Html/css</h4>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-custom progress-animate" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100" data-width="92">
                                                <span class="progress-text">92%</span>
                                            </div><!-- End .progress-bar -->
                                        </div><!-- End .progress -->
                                    </div><!-- End .progress-container -->

                                    <div class="progress-container">
                                        <h4>Illustrator</h4>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-custom progress-animate" role="progressbar" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100" data-width="69">
                                                <span class="progress-text">69%</span>
                                            </div><!-- End .progress-bar -->
                                        </div><!-- End .progress -->
                                    </div><!-- End .progress-container -->

                                    <div class="progress-container">
                                        <h4>logo design</h4>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-custom progress-animate" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" data-width="87">
                                                <span class="progress-text">87%</span>
                                            </div><!-- End .progress-bar -->
                                        </div><!-- End .progress -->
                                    </div><!-- End .progress-container -->

                                </div><!-- End .col-md-6 -->
                            </div><!-- End.row -->

                            <div class="xlg-margin2x"></div><!-- space -->
                        </div><!-- End .col-md-12 -->
                    </div><!-- End.row -->
                </div><!-- End .container -->

                <div id="testimonials-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">                  
                                <h3>
                                    Testimonials
                                    <span class="small-bottom-border big"></span>
                                </h3>


                                <div class="about-us-testimonials flexslider">
                                    <ul class="slides">
                                        <li>
                                            <span class="testimonial-title">Best Service!</span>
                                            <p>Maecenas semper aliquam massa. Praesent pharetra sem vitae nisi eleifend molestie. Aliquam molestie scelerisque ultricies. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempor dictum ornare. Maecenas pellentesque nibh ac suscipit sodales. Integer quis mattis nibh. Maecenas et eleifend mauris.</p>
                                            <span class="testimonial-owner">
                                                Anna Retallick,
                                            </span><span class="testimonial-date">12.02.2014</span>
                                        </li>

                                        <li>
                                            <span class="testimonial-title">Fast Support!</span>
                                            <p>Maecenas semper aliquam massa. Praesent pharetra sem vitae nisi eleifend molestie. Aliquam molestie scelerisque ultricies. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempor dictum ornare.</p>
                                            <span class="testimonial-owner">
                                                Jake Retallick,
                                            </span><span class="testimonial-date">21.02.2014</span>
                                        </li>

                                        <li>
                                            <span class="testimonial-title">Quality Design!</span>
                                            <p>Maecenas semper aliquam massa. Praesent pharetra sem vitae nisi eleifend molestie. Aliquam molestie scelerisque ultricies. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempor dictum ornare. Maecenas pellentesque nibh ac suscipit sodales. Integer quis mattis nibh. Maecenas et eleifend mauris.</p>
                                            <span class="testimonial-owner">
                                                Jake Retallick,
                                            </span><span class="testimonial-date">26.02.2014</span>
                                        </li>


                                    </ul>
                                </div><!-- End about-us-testimonials -->
                            </div><!-- End .col-md-8 -->
                        </div><!-- End.row -->
                    </div><!-- End.container -->

                </div><!-- End #testimonials-section -->
                <div class="xlg-margin2x"></div><!-- space -->

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="team-members-slider-container" class="carousel-wrapper">
                                <header class="content-title">
                                    <div class="title-bg">
                                        <h2 class="title">Meet Our Team</h2>
                                    </div><!-- End .title-bg -->
                                    <div class="xs-margin"></div><!-- space -->
                                </header>
                                <div class="carousel-controls">
                                    <div id="team-members-slider-prev" class="carousel-btn carousel-btn-prev">
                                    </div><!-- End .carousel-prev -->
                                    <div id="team-members-slider-next" class="carousel-btn carousel-btn-next carousel-space">
                                    </div><!-- End .carousel-next -->
                                </div><!-- End .carousel-controllers -->

                                <div class="team-member-header clearfix">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <figure>
                                                <img src="images/team/bryant.jpg" alt="Dawe Bryant" class="img-responsive">
                                            </figure>
                                            <div class="md-margin visible-xs visible-sm"></div><!-- space for small devices -->
                                        </div><!-- End .col-md-4-->

                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <div class="team-member-header-meta">
                                                <div class="team-member-name">Courtney Bryant</div><!-- End .team-member-name -->
                                                <div class="team-member-title">SEO</div><!-- End team-member-title -->

                                                <p>Suspendisse potenti. In non tincidunt mauris. Sed accumsan augue a gravida posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempor dictum ornare. Maecenas pellentesque nibh ac suscipit sodales. Integer quis mattis nibh. Aliquam arcu velit, blandit sit amet neque vitae, eleifend feugiat lorem. Suspendisse potenti.</p>
                                                <blockquote><p>Maecenas semper aliquam massa. Praesent pharetra sem vitae nisi eleifend molestie. Aliquam molestie scelerisque ultricies. Suspendisse potenti. Phasellus interdum risus at mi ullamcorper lobortis. In et metus aliquet, suscipit leo.</p></blockquote>
                                                <p>Suspendisse potenti. In non tincidunt mauris. Sed accumsan augue a gravida posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempor dictum ornare. Maecenas pellentesque nibh ac suscipit sodales. Integer quis mattis nibh. Aliquam arcu velit, blandit sit amet. Nam pretium augue eget sem malesuada, ut gravida enim iaculis. Praesent sed nulla sed lectus blandit sodales sit amet nec lectus. </p>

                                                <div class="team-member-extra clearfix">
                                                    <ul class="social-links clearfix pull-left">
                                                        <li class="smaller-social-icons"><a href="#" class="social-icon icon-facebook-sm"></a></li>
                                                        <li class="smaller-social-icons"><a href="#" class="social-icon icon-twitter-sm"></a></li>
                                                        <li class="smaller-social-icons"><a href="#" class="social-icon icon-dribbble-sm"></a></li>
                                                        <li class="smaller-social-icons"><a href="#" class="social-icon icon-email-sm"></a></li>
                                                    </ul>
                                                    <ul class="team-member-contact pull-right">
                                                        <li>courtney_bryant@gmail.com</li>
                                                        <li>+(404) 548-26-78-56</li>
                                                    </ul>
                                                </div><!-- End .team-member-extra-->
                                            </div><!-- End .team-member-header-meta -->
                                        </div><!-- End .col-md-8--> 
                                    </div><!-- End .row -->
                                </div><!-- End .team-member-header -->

                                <div class="team-member-content">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-6 team-member">
                                            <figure>
                                                <img src="images/team/courtney.jpg" alt="Courtney Bryant">
                                            </figure>
                                            <div class="team-member-name">Courtney Bryant</div><!-- End .team-member-name -->
                                            <div class="team-member-title">SysAdmin</div><!-- End .team-member-title -->
                                        </div><!-- End .col-md-3.team-member -->
                                        <div class="col-md-3 col-sm-3 col-xs-6 team-member">
                                            <figure>
                                                <img src="images/team/walter.jpg" alt="Walter Allter">
                                            </figure>
                                            <div class="team-member-name">Walter Allter</div><!-- End .team-member-name -->
                                            <div class="team-member-title">Chief Executive Officer</div><!-- End .team-member-title -->
                                        </div><!-- End .col-md-3.team-member -->
                                        <div class="col-md-3 col-sm-3 col-xs-6 team-member">
                                            <figure>
                                                <img src="images/team/arron.jpg" alt="Arron Rivera">
                                            </figure>
                                            <div class="team-member-name">Arron Rivera</div><!-- End .team-member-name -->
                                            <div class="team-member-title">Sales Manager</div><!-- End .team-member-title -->
                                        </div><!-- End .col-md-3.team-member -->
                                        <div class="col-md-3 col-sm-3 col-xs-6 team-member">
                                            <figure>
                                                <img src="images/team/evan.jpg" alt="Evan Brooks">
                                            </figure>
                                            <div class="team-member-name">Evan Brooks</div><!-- End .team-member-name -->
                                            <div class="team-member-title">Project Manager</div><!-- End .team-member-title -->
                                        </div><!-- End .col-md-3.team-member -->

                                        <div class="col-md-3 col-sm-3 col-xs-6 team-member">
                                            <figure>
                                                <img src="images/team/susan.jpg" alt="Susan Brooks">
                                            </figure>
                                            <div class="team-member-name">Susan Brooks</div><!-- End .team-member-name -->
                                            <div class="team-member-title">Accounts Manager</div><!-- End .team-member-title -->
                                        </div><!-- End .col-md-3.team-member -->

                                        <div class="col-md-3 col-sm-3 col-xs-6 team-member">
                                            <figure>
                                                <img src="images/team/jake.jpg" alt="Jake Bryant">
                                            </figure>
                                            <div class="team-member-name">Jake Bryant</div><!-- End .team-member-name -->
                                            <div class="team-member-title">Office Manager</div><!-- End .team-member-title -->
                                        </div><!-- End .col-md-3.team-member -->

                                        <div class="col-md-3 col-sm-3 col-xs-6 team-member">
                                            <figure>
                                                <img src="images/team/jane.jpg" alt="Jane Bryant">
                                            </figure>
                                            <div class="team-member-name">Jane Bryant</div><!-- End .team-member-name -->
                                            <div class="team-member-title">PHP Developer</div><!-- End .team-member-title -->
                                        </div><!-- End .col-md-3.team-member -->

                                        <div class="col-md-3 col-sm-3 col-xs-6 team-member">
                                            <figure>
                                                <img src="images/team/diana.jpg" alt="Diana Rivera">
                                            </figure>
                                            <div class="team-member-name">Diana Rivera</div><!-- End .team-member-name -->
                                            <div class="team-member-title">JavaScript Developer</div><!-- End .team-member-title -->
                                        </div><!-- End .col-md-3.team-member -->

                                    </div><!-- End .row -->
                                </div><!-- End .team-member-content --> 
                            </div><!-- End #team-members-slider-contaiener -->

                            <div class="md-margin2x"></div><!-- space -->


                            <?php
                            require_once './brand_display.php';
                            ?>
                        </div><!-- End .col-md-12 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->

            </section><!-- End #content -->

            <footer id="footer">
                <div id="twitterfeed-container">
                    <div class="container">
                        <div class="row">

                            <div class="twitterfeed col-md-12">
                                <div class="twitter-icon"><i class="fa fa-twitter"></i></div><!-- End .twitter-icon -->
                                <div class="row">
                                    <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                                        <div class="twitter_feed flexslider"></div>
                                    </div>
                                </div>

                            </div><!-- End .twiitterfeed .col-md-12 -->

                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End #twitterfeed-container -->
                <div id="inner-footer">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-4 col-xs-12 widget">
                                <h3>MY ACCOUNT</h3>
                                <ul class="links">
                                    <li><a href="#">My account</a></li>
                                    <li><a href="#">Personal information</a></li>
                                    <li><a href="#">Addresses</a></li>
                                    <li><a href="#">Discount</a></li>
                                    <li><a href="#">Order History</a></li>
                                    <li><a href="#">Your Vouchers</a></li>
                                </ul>
                            </div><!-- End .widget -->

                            <div class="col-md-3 col-sm-4 col-xs-12 widget">
                                <h3>INFORMATION</h3>
                                <ul class="links">
                                    <li><a href="#">New products</a></li>
                                    <li><a href="#">Top sellers</a></li>
                                    <li><a href="#">Specials</a></li>
                                    <li><a href="#">Manufacturers</a></li>
                                    <li><a href="#">Suppliers</a></li>
                                    <li><a href="#">Our stores</a></li>
                                </ul>
                            </div><!-- End .widget -->

                            <div class="col-md-3 col-sm-4 col-xs-12 widget">
                                <h3>MY ACCOUNT</h3>

                                <ul class="contact-list">
                                    <li><strong>Venedor Ltd</strong></li>
                                    <li>United Kingdom</li>
                                    <li>Greater London</li>
                                    <li>London 02587</li>
                                    <li>Oxford Street 48/188</li>
                                    <li>Working Days: Mon. - Sun.</li>
                                    <li>Working Hours: 9.00AM - 8.00PM</li>
                                </ul>
                            </div><!-- End .widget -->

                            <div class="clearfix visible-sm"></div>

                            <div class="col-md-3 col-sm-12 col-xs-12 widget">
                                <h3>FACEBOOK LIKE BOX</h3>

                                <div class="facebook-likebox">
                                    <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fenvato&amp;colorscheme=dark&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false"></iframe>
                                </div>


                            </div><!-- End .widget -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->

                </div><!-- End #inner-footer -->

                <div id="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 col-sm-7 col-xs-12 footer-social-links-container">
                                <ul class="social-links clearfix">
                                    <li><a href="#" class="social-icon icon-facebook"></a></li>
                                    <li><a href="#" class="social-icon icon-twitter"></a></li>
                                    <li><a href="#" class="social-icon icon-rss"></a></li>
                                    <li><a href="#" class="social-icon icon-delicious"></a></li>
                                    <li><a href="#" class="social-icon icon-linkedin"></a></li>
                                    <li><a href="#" class="social-icon icon-flickr"></a></li>
                                    <li><a href="#" class="social-icon icon-skype"></a></li>
                                    <li><a href="#" class="social-icon icon-email"></a></li>
                                </ul>
                            </div><!-- End .col-md-7 -->

                            <div class="col-md-5 col-sm-5 col-xs-12 footer-text-container">
                                <p>&copy; 2014 Powered by Company&trade;. All Rights Reserved.</p>
                            </div><!-- End .col-md-5 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End #footer-bottom -->

            </footer><!-- End #footer -->
        </div><!-- End #wrapper -->
        <a href="#" id="scroll-top" title="Scroll to Top"><i class="fa fa-angle-up"></i></a><!-- End #scroll-top -->
        <!-- END -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/smoothscroll.js"></script>
        <script src="js/jquery.debouncedresize.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.placeholder.js"></script>
        <script src="js/jquery.hoverIntent.min.js"></script>
        <script src="js/twitter/jquery.tweet.min.js"></script>
        <script src="js/jquery.flexslider-min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jflickrfeed.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/jquery.appear.js"></script>
        <script src="js/jquery.parallax-1.1.3.js"></script>
        <script src="js/main.js"></script>

        <script>
            $(function () {

            });
        </script>
    </body>
</html>