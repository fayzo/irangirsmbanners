<?php include "Get_usernameProfile.php"?>
<?php include "header.php"?>
    
<!-- <body> -->
<body >
<!-- <body class="chair"> -->
    <div class="content">
    <?php include "navbar.php"?>
    <!-- navbar -->

    <!-- Property Section Begin -->
    <section class="property-section spad">
        <div class="container">
            <div class="row">
                <!-- col -->
                <div class="col-lg-9" id="house_hidden">
                    <?php echo $house->car_navListHome('Car_For_sale',1,$user_id); ?>
                    <?php echo $house->carListHome('Car_For_sale',1,$user_id); ?>
                </div>
                <div class="col-md-3">
                    <div class="row">

                        <div class="col-md-12">
                            <span id="responseSubmitfooditerm"> </span>
                            <div id="responseSubmitfooditermview">
                                <?php echo $house->car_showCart_itemSale(); ?>
                            </div>
                        </div> 
                        <!-- col -->
                        <div class="col-md-12 mb-3">
                            <?php echo $house->Property_City_search($user_id);?>
                            <?php echo $house->request_property();?>
                            <!-- < ?php echo $watch_list->agent_profile_viewProfile();?> -->
                        </div> 
                        <!-- col -->
                    </div> 
                    <!-- row -->
                </div> 
                <!-- col -->
            </div>
             <!-- row -->

        </div>
    </section>
    <!-- Property Section End -->

    <!-- How It Works Section Begin -->
    <section class="howit-works spad"  style="background: #f8f9fa;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Find Your Dream Car</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-howit-works">
                        <img src="<?php echo BASE_URL; ?>assets/image/img/howit-works/howit-works-1.png" alt="">
                        <h4>Search & Find Car</h4>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-howit-works">
                        <i class="fa fa-car" style="font-size: 70px;color: #6dd0ce;" aria-hidden="true"></i>
                        <!-- <img src="< ?php echo BASE_URL; ?>assets/image/img/howit-works/howit-works-2.png" alt=""> -->
                        <h4>Find Your Car</h4>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-howit-works">
                        <img src="<?php echo BASE_URL; ?>assets/image/img/howit-works/howit-works-3.png" alt="">
                        <h4>Talk To Dealer</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How It Works Section End -->
    
<section class="agent-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>We Are Here To Help You</span>
                        <h2>Our Dealers</h2>
                    </div>
                </div>
            </div>
            <?php echo $house->agent_profile_home($user_id); ?>
        </div>

</section>
<!-- Property Section End -->

<?php include "admin_message.php"?>
<?php include "footer.php"?>
