<?php 
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));


if (isset($_POST['car_id']) && !empty($_POST['car_id'])) {
    if (isset($_SESSION['key'])) {
        # code...
        $user_id= $_SESSION['key'];
        $businessDetails= $home->businessData('1');

    }else {
        # code...
        // $username= $users->test_input('jojo');
        // $uprofileId= $home->usersNameId($username);
        // $profileData= $home->userData($uprofileId['user_id']);
        // $user_id= $profileData['user_id'];
        $businessDetails= $home->businessData('1');

    }
    
    $car_id = $_POST['car_id'];
    // $user= $house->houseReadmore($car_id);
    $mysqli= $db;
    $query= $mysqli->query("SELECT * FROM car H
        Left JOIN provinces P ON H. province = P. provincecode
        Left JOIN districts M ON H. districts = M. districtcode
        Left JOIN sectors T ON H. sector = T. sectorcode
        Left JOIN users U ON H. user_id3 = U. user_id 
    WHERE H. car_id = $car_id ");
    $row = $query->fetch_array();
    ?>

    <div class="house-popup">
        
        <div class="wrap6" id="disabler">
            <div class="wrap6Pophide" onclick="togglePopup ( )" ></div>
            <span class="col-12 col-md-3  colose">
                <button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
            </span>
            <div class="img-popup-wrap" id="popupEnd">
                <div class="img-popup-body">

                <div class="card">
                    <span id="responseSubmithouse"></span>
                    <div class="card-header">
                        <button class="btn btn-success btn-sm  float-right d-md-block d-lg-none"  onclick="togglePopup ( )">close</button>
                        <div class="header-nav">
                            <a href="<?php echo HOME;?>"> 
                                <img src="<?php echo BASE_URL;?>assets/image/img/partner/partner-4.png" alt="">
                            </a>
                            <ul class="d-none d-lg-inline-block">
                                <li>
                                    <i class="icon_phone"></i>
                                    <div class="info-text">
                                        <span>Phone:</span>
                                        <p>(+250)  <?php echo substr($businessDetails['phone_business'],1); ?></p>
                                    </div>
                                </li>
                                <li>
                                    <i class="icon_map"></i>
                                    <div class="info-text">
                                        <span>Address:</span>
                                        <p><?php echo $businessDetails['address_business']; ?>, <span>RW</span></p>
                                    </div>
                                </li>
                                <li>
                                    <i class="icon_mail"></i>
                                    <div class="info-text">
                                        <span>Email:</span>
                                       <p>
                                        <a href="javascript:void(0)" id="contacts_business" data-contacts="contacts_business"><?php echo $businessDetails['email_business']; ?></a>
                                       </p> 
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body" style="background: #e0dedc;">

    <!-- Property Details Section Begin -->
            <div class="row">
                <div class="col-lg-8">
                <h5 class="text-center black-bg h4 mb-2">
                <?php 
                    $subect = $row['categories_car'];
                    $replace = " ";
                    $searching = "_";
                    echo str_replace($searching,$replace, $subect)." | <span class='text-success'>".$row['car_marque']."</span> <div>".$row['namedistrict']."/".$row['namesector']." at ".number_format($row['price'])." Frw"; ?></div></h5>

                    <div class="pd-details-text">
                        <div class="property-more-pic">
                            <div class="product-pic-zoom">
                            <?php 
                                        $file = $row['photo']."=".$row['other_photo'];
                                        $expode = explode("=",$file);
                                        // $splice = array_expode ($expode,0,10); ?>

                                <img class="product-big-img" src="<?php echo BASE_URL.'uploads/car/'.$expode[0]; ?>" alt="">
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">

                                        <div class="pt active" data-imgbigurl="<?php echo BASE_URL.'uploads/car/'.$expode[0]; ?>" >
                                            <img src="<?php echo BASE_URL.'uploads/car/'.$expode[0]; ?>"  alt="">
                                        </div>

                                        <?php  for ($i=1; $i < count($expode); ++$i) { 
                                                ?>
                                                <div class="pt" data-imgbigurl="<?php echo BASE_URL.'uploads/car/'.$expode[$i]; ?>">
                                                    <img src="<?php echo BASE_URL.'uploads/car/'.$expode[$i]; ?>" alt="">
                                                </div>
                                        <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="pd-details-tab">
                            <div class="tab-item">
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#tab-1" role="tab">Overview</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab-2" role="tab">Description</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-item-content">
                                <div class="tab-content">
                                    <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                        <div class="property-more-table">
                                            <table class="left-table">
                                                <tbody>
                                                    <tr>
                                                        <td class="pt-name">name</td>
                                                        <td class="p-value"><?php echo $row['name_of_car']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-name">Price</td>
                                                        <td class="p-value"><?php echo number_format($row['price']); ?> Frw</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-name">Marque</td>
                                                        <td class="p-value"><?php echo $row['car_marque']; ?></td>
                                                    </tr>
                                                   
                                                    <tr>
                                                        <td class="pt-name">Year</td>
                                                        <td class="p-value"><?php echo $row['year_made']; ?></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td class="pt-name">Garages</td>
                                                        <td class="p-value">< ?php echo $row['car_in_garage']; ?></td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                            <table class="right-table">
                                                <tbody>
                                                    <tr>
                                                        <td class="pt-name">Agent</td>
                                                        <td class="p-value"><?php echo $row['authors']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-name">Phone</td>
                                                        <td class="p-value"> (+250) <?php echo substr($row['phone'],1); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-name">Type</td>
                                                        <td class="p-value"><?php 
                                                                $subect = $row['categories_car'];
                                                                $replace = " ";
                                                                $searching = "_";
                                                                echo str_replace($searching,$replace, $subect) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-name">District</td>
                                                        <td class="p-value"><?php echo $row['namedistrict']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-name">Sector</td>
                                                        <td class="p-value"><?php echo $row['namesector']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                        <div class="pd-table-desc">
                                            <p><?php echo $row['text']; ?>.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
               <!-- column-3 -->
               <div class="col-lg-4">
                   <div class="property-contactus">
                            <div class="agent-desc">
                            <div class="user-block">
                                <div class="user-blockImgBorder">
                                    <div class="user-blockImg">
                                        <?php if (!empty($row['profile_img'])) { ?>
                                            <img src="<?php echo BASE_URL_LINK."image/users_profile_cover/".$row['profile_img']; ?>" alt="User Image">
                                        <?php  }else{ ?>
                                            <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE;?>" alt="User Image">
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- <span class="username tooltips">
                                    <a href="http://localhost:80/Blog_nyarwanda_CMS/fayzo">faysal shema</a>
                                </span>
                                <span class="description">Publish <i class="fa fa-clock-o" style="color: #2cbdb8;margin-right: 4px;" aria-hidden="true"></i>- Sep 17, 2019</span> -->
                            </div>
                                <div class="agent-title">
                                    <h5><a href="<?php echo BASE_URL.$row['username']; ?>">Contact <?php echo $row['lastname']; ?></a></h5>
                                    <!-- <span>Saler Marketing </span> -->
                                    <span>Agent </span>
                                </div>
                                <div class="agent-social">
                                    <!-- <a href="< ?php echo $businessDetails['facebook_business']; ?>"><i class="fa fa-facebook"></i></a>
                                    <a href="< ?php echo $businessDetails['twitter_business']; ?>"><i class="fa fa-twitter"></i></a>
                                    <a href="< ?php echo $businessDetails['google_plus_business']; ?>"><i class="fa fa-google-plus"></i></a>
                                    <a href="< ?php echo $businessDetails['instagram_business']; ?>"><i class="fa fa-instagram"></i></a>
                                    <a href="< ?php echo $businessDetails['email_business']; ?>>"><i class="fa fa-envelope"></i></a> -->
                                    <?php  if(!empty($row['facebook'])){ ?>
                                    <a href="<?php echo FACEBOOK.$row['facebook']; ?>"><i class="fa fa-facebook"></i></a>
                                    <?php }else { ?>
                                        <a href="<?php echo FACEBOOK.$businessDetails['facebook_business']; ?>"><i class="fa fa-facebook"></i></a>
                                    <?php } ?>
                                    <?php  if(!empty($row['twitter'])){ ?>
                                        <a href="<?php echo TWITTER.$row['twitter']; ?>"><i class="fa fa-twitter"></i></a>
                                    <?php }else { ?>
                                        <a href="<?php echo TWITTER.$businessDetails['twitter_business']; ?>"><i class="fa fa-twitter"></i></a>
                                    <?php } ?>
                                    <?php  if(!empty($row['instagram'])){ ?>
                                        <a href="<?php echo INSTAGRAM.$row['instagram']; ?>"><i class="fa fa-instagram"></i></a>
                                    <?php }else { ?>
                                        <a href="<?php echo INSTAGRAM.$businessDetails['instagram_business']; ?>"><i class="fa fa-instagram"></i></a>
                                    <?php } ?>
                                    <?php  if(!empty($row['email'])){ ?>
                                        <a href="<?php echo MAIL.$row['email']; ?>"><i class="fa fa-envelope"></i></a>
                                    <?php }else { ?>
                                        <a href="<?php echo MAIL.$businessDetails['email_business']; ?>>"><i class="fa fa-envelope"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <form action="#" method="post" id="form_agentMessage" class="agent-contact-form">
                                <input type="hidden" name="user_id" value="<?php echo $row['user_id3']; ?>">
                                <input type="hidden" name="car_id" value="<?php echo $row['car_id']; ?>">
                                <input type="text" name="name_clientToAgent" id="name_clientToAgent" placeholder="Name*">
                                <input type="text" name="email_clientToAgent" id="email_clientToAgent" placeholder="Email">
                                <input type="text" name="phone_clientToAgent" id="phone_clientToAgent" placeholder="Phone">
                                <textarea id="message_clientToAgent"  name="message_clientToAgent"  placeholder="Messages"></textarea>
                                <div id="responseAgentMessage"></div>
                                <button type="button" id="submit_clientToAgent"  class="site-btn">Send Message</button>
                            </form>
                    </div>
                </div>
               <!-- column-3 -->

            </div>
        </div>
    </section>
    <!-- Property Details Section End -->


                </div><!-- /.card-body -->
                <div class="card-footer text-muted">
                    Footer
                </div><!-- /.card-footer -->
            </div>


           </div><!-- img-popup-body -->
        </div><!-- user-show-popup-box -->
    </div> <!-- Wrp4 -->
</div> <!-- apply-popup" -->


    <script>
    	 $(document).ready(function() {
			// $("#content-slider").lightSlider({
            //     loop:true,
            //     keyPress:true
            // });
            // $('#image-gallery').lightSlider({
            //     gallery:true,
            //     item:1,
            //     thumbItem:9,
            //     slideMargin: 0,
            //     speed:1500,
            //     auto:true,
            //     loop:true,
            //     onSliderLoad: function() {
            //         $('#image-gallery').removeClass('cS-hidden');
            //     }  
            // });

            /*-------------------
                    Propery Short Slider
                --------------------- */
                $(".ps-slider").owlCarousel({
                items: 5,
                dots: false,
                autoplay: false,
                margin: 10,
                loop: true,
                smartSpeed: 1200
            });

                /*------------------
                    Single Product
                --------------------*/
            $('.product-thumbs-track .pt').on('click', function () {
                $('.product-thumbs-track .pt').removeClass('active');
                $(this).addClass('active');
                var imgurl = $(this).data('imgbigurl');
                var bigImg = $('.product-big-img').attr('src');
                if (imgurl != bigImg) {
                    $('.product-big-img').attr({
                        src: imgurl
                    });
                }
            });

		});
    </script>

<?php } 


if(isset($_POST['contacts_agent'])){ 
    
    # code...
    $businessDetails= $home->businessData('1');
    $user_id = $_POST['user_id_agent'];

    $mysqli= $db;
    $query= $mysqli->query("SELECT * FROM users WHERE user_id = $user_id ");
    $row = $query->fetch_array();
    ?>

    <div class="house-popup">
        
    <div class="wrap6" id="disabler">
        <div class="wrap6Pophide" onclick="togglePopup ( )" ></div>
        <span class="col-sm-12 col-md-3  colose">
            <button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="img-popup-wrap" id="popupEnd" style="max-width: 409px;">
            <div class="img-popup-body" >
    
            <div class="card">
                <div class="card-header">
                        <button class="btn btn-success btn-sm  float-right d-md-block d-lg-none" onclick="togglePopup( )">close</button>
                        <div class="property-contactus">
                            <div class="agent-desc">
                            <div class="user-block">
                                <div class="user-blockImgBorder">
                                    <div class="user-blockImg">
                                        <?php if (!empty($row['profile_img'])) { ?>
                                            <img src="<?php echo BASE_URL_LINK."image/users_profile_cover/".$row['profile_img']; ?>" alt="User Image">
                                        <?php  }else{ ?>
                                            <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE;?>" alt="User Image">
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- <span class="username tooltips">
                                    <a href="http://localhost:80/Blog_nyarwanda_CMS/fayzo">faysal shema</a>
                                </span>
                                <span class="description">Publish <i class="fa fa-clock-o" style="color: #2cbdb8;margin-right: 4px;" aria-hidden="true"></i>- Sep 17, 2019</span> -->
                            </div>
                                <div class="agent-title">
                                    <h5><a href="<?php echo BASE_URL.$row['username']; ?>"> Contact <?php echo $row['lastname']; ?></a></h5>
                                    <!-- <span>Saler Marketing </span> -->
                                    <span class="mr-2"> Agent </span>
                                    <span class="agent-social">
                                        <!-- <a href="< ?php echo $businessDetails['facebook_business']; ?>"><i class="fa fa-facebook"></i></a>
                                        <a href="< ?php echo $businessDetails['twitter_business']; ?>"><i class="fa fa-twitter"></i></a>
                                        <a href="< ?php echo $businessDetails['google_plus_business']; ?>"><i class="fa fa-google-plus"></i></a>
                                        <a href="< ?php echo $businessDetails['instagram_business']; ?>"><i class="fa fa-instagram"></i></a>
                                        <a href="< ?php echo $businessDetails['email_business']; ?>>"><i class="fa fa-envelope"></i></a> -->
                                        <?php  if(!empty($row['facebook'])){ ?>
                                        <a target="_blank" href="<?php echo $row['facebook']; ?>"><i class="fa fa-facebook"></i></a>
                                        <?php }else { ?>
                                            <a target="_blank" href="<?php echo $businessDetails['facebook_business']; ?>"><i class="fa fa-facebook"></i></a>
                                        <?php } ?>
                                        <?php  if(!empty($row['twitter'])){ ?>
                                            <a href="<?php echo $row['twitter']; ?>"><i class="fa fa-twitter"></i></a>
                                        <?php }else { ?>
                                            <a target="_blank" href="<?php echo $businessDetails['twitter_business']; ?>"><i class="fa fa-twitter"></i></a>
                                        <?php } ?>
                                        <?php  if(!empty($row['instagram'])){ ?>
                                            <a target="_blank" href="<?php echo $row['instagram']; ?>"><i class="fa fa-instagram"></i></a>
                                        <?php }else { ?>
                                            <a target="_blank" href="<?php echo $businessDetails['instagram_business']; ?>"><i class="fa fa-instagram"></i></a>
                                        <?php } ?>
                                        <?php  if(!empty($row['email'])){ ?>
                                            <a target="_blank" href="<?php echo $row['email']; ?>"><i class="fa fa-envelope"></i></a>
                                        <?php }else { ?>
                                            <a target="_blank" href="<?php echo $businessDetails['email_business']; ?>>"><i class="fa fa-envelope"></i></a>
                                        <?php } ?>
                                    </span>
                                </div>

                            </div>
                        </div>
                </div>
                <form action="#" method="post" id="form_agentMessage" class="agent-contact-form">
                <div class="card-body">
                    <div id="responses"></div> 
                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                    <input type="hidden" name="car_id" value="0">
                            <div class="form-row">
                                <div class="col-12">
                                <label for="lastname">Name :</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="name_clientToAgent" id="name_clientToAgent"
                                        aria-describedby="helpId" placeholder="name">
                                        <span id="response"></span>
                                </div>
                                </div>
                                <div class="col-12">
                                <label for="specialize">email :</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-envelope"></i>
                                        </span>
                                    </div> 
                                    <input type="email" class="form-control" name="email_clientToAgent" id="email_clientToAgent"
                                        aria-describedby="helpId" placeholder="@email">
                                        <span id="response"></span>
                                </div>
                                </div>
                                <div class="col-12">
                                <label for="specialize">Telephone :</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-phone"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="phone_clientToAgent" id="phone_clientToAgent" 
                                        aria-describedby="helpId" placeholder="Telephone">
                                        <span id="response"></span>
                                </div>
                                </div>
                            </div>
                               
                            <textarea class="form-control mt-2" id="message_clientToAgent"  name="message_clientToAgent"  placeholder="Messages"></textarea>
                                <div id="responseAgentMessage"></div>
                        </div>  <!-- card-body -->
                        <div class="card-footer">
                            <button id="submit_clientToAgent"  class="btn btn-block btn-primary m-2"  type="button" >Send Message</button>
                        </div>
                         <!-- card-footer -->
                        </form>
                      </div>
                           <!-- card -->
    
            </div><!-- img-popup-body -->
            </div><!-- tweet-show-popup-box -->
        </div> <!-- Wrp4 -->
    </div> <!-- apply-popup" -->
    
    <?php } 

if (isset($_POST['name_clientToAgent']) && !empty($_POST['name_clientToAgent'])) {
    $user_id= $_POST['user_id'];
    $car_id= $_POST['car_id'];
    $datetime= date('Y-m-d H-i-s');

    $name = $users->test_input($_POST['name_clientToAgent']);
    $email = $users->test_input($_POST['email_clientToAgent']);
    $phone = $users->test_input($_POST['phone_clientToAgent']);
    $message = $users->test_input($_POST['message_clientToAgent']);
    // echo var_dump($_POST);

	$users->Postsjobscreates('agent_message',array( 
	'name_client'=> $name,
	'email_client'=> $email, 
	'phone_client'=> $phone, 
	'message_client'=> $message, 
    'user_id3'=> $user_id,
    'car_id_msg'=> $car_id,
    'datetime'=> $datetime 
        ));
} 


if (isset($_POST['newslatter_email_client']) && !empty($_POST['newslatter_email_client'])) {
    $email = $users->test_input($_POST['newslatter_email_client']);

    require '../../newsletters_thank_.php';
    $datetime= date('Y-m-d H-i-s');

	$users->Postsjobscreates('client_subscribe_email',array( 
	'email_subscribe'=> $email, 
    'datetime'=> $datetime 
        ));
} ?>

