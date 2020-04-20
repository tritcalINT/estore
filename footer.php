<footer id="footer">
    <div class="footer-newsletter">
        <div class="container">
            <div class="newsletter-intro">
                <span class="envalope-icon"><i class="fa fa-envelope-o"></i></span>
                <p><?= $lang['SUBSCRIBE TO OUR NEWSLETTER TO RECEIVE NEWS,'] ?> <br><?= $lang['UPDATES, AND ANOTHER STUFF BY EMAIL.'] ?></p>
            </div>
            <div class="newsletter-form">
                <form action="data/register_subcriber.php" id="register" method="post">
                    <input type="text" id="newsletter" name="newsletter" value="<?= $lang['ENTER YOUR EMAIL...'] ?>">
                    <input type="submit" value="<?= $lang['SUBSCRIBE'] ?>">
                </form>
            </div>
        </div>
    </div>

    <!-- End Newsletter -->
    <div class="footer-quick-search">
        <div class="container">
        </div>
    </div>
    <!-- End Quick Search -->
    <div class="footer">

        <div class="container">

            <div class="row">
                <div class="col-md-6">

                    <div class="row">

                        <div class="col-md-6 ">


                            <!--<div class="logo-footer"><a href="index"><img src="images/home_11/logo.png" alt=""></a></div>-->
                        </div>

                        <div class="col-md-6 ">

                            <div class="copy-right">
                                <p>© 2020  DRAGON   <a href="about_us.php" class="privacy-policy"><?= $lang['Privacy Policy'] ?></a></p>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="contact-footer">
                            <hr><p><?= $lang['VC- Delux As Asia’s Online exclusive Store, we create endless style possibilities through an ever-expanding range of products form the most coveted international and local brands, putting you at the centre of it all. With VC- Delux, You Own Now.'] ?></p>
                        </div>

                    </div>




                </div>

                <div class="col-md-3">

                    <div class="contact-footer">
                        <h3><?= $lang['Contact Us'] ?></h3>
                        <p><i class="fa fa-map-marker"></i><?= $lang['No: 207 Sendayan , Bandar Sri Sendayan, 70300 Malaysia'] ?></p>
                        <p><i class="fa fa-phone"></i> (031) 2345678</p>
                        <p>
                            <i class="fa fa-envelope"></i> <a href="mailto:admin@vcdeluke.com">admin@vcdeluke.com</a>
                        </p>
                    </div>

                </div>

                <div class="col-md-3">

                    <div class="social-footer">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-rss"></i></a>
                    </div>

                </div>


            </div>
        </div>


    </div>


</footer>