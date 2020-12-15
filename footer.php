

   
    <!-- Partner Carousel Section End -->
    <div class="popupTweet"></div>

    <!-- Footer Section Begin -->
    <footer class="footer-section set-bg" data-setbg="<?php echo BASE_URL;?>assets/image/img/footer-bg.jpg">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-logo">
                            <div class="logo">
                                <a href="<?php (isset($_SESSION['key'])? HOME:F_INDEX ); ?>"> 
                                    <!-- <img src="< ?php echo BASE_URL;?>assets/image/img/partner/irangiro_House.png" alt=""> -->
                                    <img width="118px" src="<?php echo BASE_URL;?>assets/image/logo/<?php echo $businessDetails['business_logo'] ;?>" alt="">
                                </a>
                            </div>
                            <p>Subscribe our newsletter to get notification about new updates.</p>
                            <form action="#" id="newslatter_form" method ="post" class="newslatter-form">
                                <div id="responseNewslatter"></div>
                                <input type="text" name="newslatter_email_client" id="newslatter_email_client" placeholder="Enter your email...">
                                <button type="button" id="newslatter_form_submit"><i class="fa fa-location-arrow"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="footer-widget">
                            <h4>Vehicle</h4>
                            <ul>
                                <li><i class="fa fa-caret-right"></i> <a  href="javascript:void(0)" >Mercedes</a></li>
                                <li><i class="fa fa-caret-right"></i> <a  href="javascript:void(0)" >Toyota</a></li>
                                <li><i class="fa fa-caret-right"></i> <a  href="javascript:void(0)" >Volkswagen</a></li>
                                <li><i class="fa fa-caret-right"></i> <a  href="javascript:void(0)" >Audi</a></li>
                            </ul>
                            <ul>
                                <li><i class="fa fa-caret-right"></i> <a href="javascript:void(0)" >Jeep</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="javascript:void(0)" >Rover</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="javascript:void(0)" >Suzuki</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="javascript:void(0)" >Hyundai</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-widget" >
                        <!-- style="float:left; margin-right:70px;" -->
                            <h4>Social</h4>
                            <ul class="social">
                                <li><i class="ti-facebook"></i> <a href="<?php echo FACEBOOK.$businessDetails['facebook_business']; ?>">Facebook</a></li>
                                <li><i class="ti-instagram"></i> <a href="<?php echo INSTAGRAM.$businessDetails['instagram_business']; ?>">Instagram</a></li>
                                <li><i class="ti-twitter-alt"></i> <a href="<?php echo TWITTER.$businessDetails['twitter_business']; ?>">Twitter</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-widget">
                            <h4>Contact Us</h4>
                            <ul class="contact-option">
                                <li><i class="fa fa-map-marker"></i>  <?php echo $businessDetails['address_business']; ?>, RW</li>
                                <li><i class="fa fa-phone"></i> (+250) <?php echo substr($businessDetails['phone_business'],1); ?></li>
                                <li><i class="fa fa-envelope"></i> <?php echo $businessDetails['email_business']; ?></li>
                                <!-- <a href = "mailto:abc@example.com?subject = Feedback&body = Message">
                                Send Feedback
                                </a> -->
                                <li><i class="fa fa-clock-o"></i> Mon - Sat, 08 AM - 06 PM</li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-lg-2">
                        <div class="footer-widget">
                            <h4>Link</h4>
                            <ul class="contact-option">
                                <li><i class="fa fa-car" aria-hidden="true"></i> Car</li>
                                <li><i class="fa fa-shopping-basket" aria-hidden="true"></i> Cyamunara</li>
                                <li><i class="fa fa-cutlery" aria-hidden="true"></i> Foodzana</li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="copyright-text">
                <p><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="ti-heart" aria-hidden="true"></i> by <a href="<?php echo (isset($_SESSION['key']))? HOME:F_INDEX; ?>" >The Real Dealers in Rwanda</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></p>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="<?php echo BASE_URL;?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/popper.min.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/bootstrap4.min.js"></script>
    <!-- <script src="< ?php echo BASE_URL;?>assets/js/jquery.range.js"></script> -->
    <script src="<?php echo BASE_URL;?>assets/js/house_addcategories.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/profileEdit.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/siderbarResponsive.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/manage_admin_db.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/main.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/house_delete.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/home_scroll.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/login_please.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/settings.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/jquery.ui.totop.js"></script>
    <!-- Starting the plugin -->
    <script type="text/javascript">
        $(document).ready(function() {
            $().UItoTop({ easingType: 'easeOutQuart' });

        });
    </script>
</div>
</body>
</html>