<?php include "Get_usernameProfile.php"?>
<?php include "header.php"?>
    
<!-- <body> -->
<body >
<!-- <body class="chair"> -->
    <div class="content">
    <?php include "navbar.php"?>
    <!-- navbar -->
    
    <!-- Form for search House -->
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="form" id="form" class="filter-form" >
            <div class="form-row bg-getcell">
                <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id ;?>">
                <div class="col-sm-12 col-md-3">
                    <div class="form-group">
                        <label for="">Property</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-home mr-1" aria-hidden="true"></i></span>
                        </div>
                        <select class="form-control" name="type_Property_select" id="type_Property_select">
                            <option >Property For</option>
                            <option value="House_For_sale">House For sale</option>
                            <option value="House_For_rent">House For rent</option>
                            <option value="Land_For_sale">House Land</option>
                            <option value="Apartment_For_sale">Apartment For sale</option>
                            <option value="Apartment_For_rent">Apartment For rent</option>
                            <option value="room_For_rent">room For rent</option>
                            <option value="commerce_For_rent">commerce</option>
                            <option value="Offices_For_rent">Offices</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <label for="">Province</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                        </div>
                        <select name="provincecode"  id="provincecode" onchange="showResult();" class="form-control">
                            <option value="">Province</option>
                            <?php $get_province= $db->query("SELECT * FROM provinces");
                            while($show_province = mysqli_fetch_array($get_province)) { ?>
                            <option value="<?php echo $show_province['provincecode'] ?>"><?php echo $show_province['provincename'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <label for=""> District</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                        </div>
                        <select class="form-control" name="districtcode" id="districtcode" onchange="showResult2();" >
                            <option value="">District</option>
                            <!-- <option></option> -->
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 ">
                    <label for="Sector">Sector</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                        </div>
                        <select class="form-control" name="sectorcode" id="sectorcode"  onchange="showResult3_search();">
                            <option value="">Sector</option>
                            <!-- <option></option> -->
                        </select>
                    </div>
                </div>
                <!-- <div class="col-sm-12 col-md-3">
                    <label for="Cell">Cell</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                        </div>
                        <select name="codecell" id="codecell" class="form-control" onchange="showResultCell();">
                            <option value="">Cell</option>
                            < !-- <option></option> -- >
                        </select>
                    </div>
                </div> -->
            </div>
        </form>
    </div>

    <!-- Property Section Begin -->
    <section class="property-section spad">
        <div class="container">
            <div class="row">
                <!-- col -->
                <div class="col-lg-9" id="house_hidden">
                    <?php echo $house->property_navListHome('House_For_sale',1,$user_id); ?>
                    <?php echo $house->houseListHome('House_For_sale',1,$user_id); ?>
                </div>
                <div class="col-md-3">
                    <div class="row">

                        <div class="col-md-12">
                            <span id="responseSubmitfooditerm"> </span>
                            <div id="responseSubmitfooditermview">
                                <?php echo $house->houseshowCart_itemSale(); ?>
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
                        <span>Find Your Dream House</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-howit-works">
                        <img src="<?php echo BASE_URL; ?>assets/image/img/howit-works/howit-works-1.png" alt="">
                        <h4>Search & Find House</h4>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-howit-works">
                        <img src="<?php echo BASE_URL; ?>assets/image/img/howit-works/howit-works-2.png" alt="">
                        <h4>Find Your Property</h4>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-howit-works">
                        <img src="<?php echo BASE_URL; ?>assets/image/img/howit-works/howit-works-3.png" alt="">
                        <h4>Talk To Agent</h4>
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
                        <h2>Our Agents</h2>
                    </div>
                </div>
            </div>
            <?php echo $house->agent_profile_home($user_id); ?>
        </div>

</section>
<!-- Property Section End -->

<?php include "admin_message.php"?>
<?php include "footer.php"?>
