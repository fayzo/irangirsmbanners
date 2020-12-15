<?php 
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['house_view']) && !empty($_POST['house_view'])) {
    $user_id= $_POST['house_view'];
    $get_province = mysqli_query($db,"SELECT * FROM provinces");   
     ?>
  <!-- <script src="< ?php echo BASE_URL_LINK ;?>dist/js/country_login_ajax-db.js"></script> -->
  <script src="<?php echo BASE_URL_LINK ;?>car_type/car_type.js"></script>

<div class="house-popup">
    
    <div class="wrap6" id="disabler">
        <div class="wrap6Pophide" onclick="togglePopup ( )" ></div>
        <span class="col-sm-12 col-md-3 colose">
        	<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="img-popup-wrap" id="popupEnd">
        	<div class="img-popup-body">

            <div class="card">
                <span id="responseSubmithouse"></span>
                <div class="card-header">
                    <button class="btn btn-success btn-sm  float-right d-md-block d-lg-none"  onclick="togglePopup ( )">close</button>
                    <h5>Add car </h5>
                    <p class="card-text">Fill details below ?</p>
                </div>
                <form method="post" id="form-house"  enctype="multipart/form-data" >
                <div class="card-body">
                      <input type="hidden" name="user_id" id="user_id_" value="<?php echo $user_id ;?>">
                      <input type="hidden" name="register" id="register_" value="<?php echo (isset($_SESSION['register_as']))? ''.$_SESSION['register_as'].'' :'Buyer' ;?>">
                           <!-- <div>Choose your location and categories </div> -->
                    <div class="form-row">
                      <input type="hidden" name="user_id" value="<?php echo $user_id ;?>">
                          <input type="hidden" name="country" id="country" value="Rwanda">
                          <div class="col-sm-12 col-md-3">
                                <label for="" class="text-dark">Province</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                    </div>
                                    <select name="provincecode"  id="provincecode" onchange="showResult();" class="form-control provincecode">
                                        <option value="">----Select province----</option>
                                        <?php while($show_province = mysqli_fetch_array($get_province)) { ?>
                                        <option value="<?php echo $show_province['provincecode'] ?>"><?php echo $show_province['provincename'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <label for="" class="text-dark"> District</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                    </div>
                                    <select class="form-control districtcode" name="districtcode" id="districtcode" onchange="showResult2();" >
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <label for="Sector" class="text-dark">Sector</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                    </div>
                                    <select class="form-control sectorcode" name="sectorcode" id="sectorcode" >
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                      
                        <div class="col-sm-12 col-md-3">
                            <label for="authors">Titre of car</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-car mr-1" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control" name="name_of_car"  id="name_of_car" placeholder="E.g : Toyota v3">
                            </div>
                          </div>
                    </div>

                    <div class="form-row mt-2">
                       <div class="col-sm-12 col-md-3">
                          <label for="authors">Seller name</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-user mr-1" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" class="form-control" name="authors"  id="authors" placeholder="Your name">
                          </div>
                      </div>

                      
                      <div class="col-sm-12 col-md-3">
                          <label for="authors">Phone</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-phone mr-1" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="phone number">
                          </div>
                      </div>

                        <div class="col-sm-12 col-md-3">
                            <label for="authors">Vehicles</label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-car mr-1" aria-hidden="true"></i></span>
                            </div>
                              <select class="form-control" name="categories_car" id="categories_car" >
                                <option  value="">- Category-</option>
                                <option value="Car_For_sale">Car For sale</option>
                                <option value="Car_For_rent">Car For rent</option>
                                <option value="Truck_For_sale">Truck For sale</option>
                                <option value="Buses_For_sale">Buses For sale</option>
                                <option value="Motorcycle_For_sale">Motorcycle For sale</option>
                                <option value="Bicycle_For_sale">Bicycle For sale</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label for="authors">Mark</label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-car mr-1" aria-hidden="true"></i></span>
                            </div>
                              <div id="myCar_type"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row mt-2">
                        <div class="col-sm-12 col-md-3">
                        <label for="authors">Price</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">Frw</span>
                            </div>
                            <input type="text" class="form-control" name="price" id="price" placeholder="Price ">
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                        <label for="authors">Price per</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">Frw</span>
                            </div>
                            <select class="form-control" name="price_per_day" id="price_per_day" onchange="getPropertyTypeHide(this)">
                                <option  value="">- Select -</option>
                                <option value="per day">day</option>
                                <option value="per week">week</option>
                                <option value="per month">month</option>
                              </select>
                            </div>
                          </div>
                        <div class="col-sm-12 col-md-3" id="carHide">
                        <label for="authors">year made</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="type" class="form-control" name="year_made" id="year_made" placeholder="1997">
                          </div>
                        </div>
                     </div>

                      <div class="form-group mt-2">
                        <textarea class="form-control" name="additioninformation" id="addition-information" placeholder="tell us your Vehicle" rows="3"></textarea>
                      </div>

                      <div class="form-row mt-2">
                        <div class="col-sm-12 col-md-6">
                          <div class="form-group">
                               <div class="btn btn-defaults btn-file" >
                                   <i class="fa fa-paperclip"></i> Attachment
                                   <input type="file"  onChange="displayImage0(this)" name="photo[]" id="photo" >
                                </div>
                                <span>Upload one photo to be on post </span><br>
                                <span class="progress progress-hidex mt-1">
                                        <span class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar"
                                            style="width:0%;" id="prox" aria-valuenow="" aria-valuemin="0"
                                            aria-valuemax="100"></span>
                                </span>
                               <small class="help-block">Max. 10MB</small>
                           </div> 
                        </div>

                        <div class="col-sm-12 col-md-6">
                             <div class="form-group">
                               <div class="btn btn-defaults btn-file" >
                                   <i class="fa fa-paperclip"></i> Attachment
                                   <input type="file" onChange="displayImage(this)" name="otherphoto[]" id="other-photo"  multiple>
                               </div>
                               <span>upload many photo</span>
                               <small class="help-block">(e.g show us many photo.) </small><br>
                                <span class="progress progress-hidec mt-1">
                                        <span class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar"
                                            style="width:0%;" id="proc" aria-valuenow="" aria-valuemin="0"
                                            aria-valuemax="100"></span>
                                </span>
                               <small class="help-block">Max. 10MB</small>
                           </div> 
                        </div>
                      </div>
                      <span onclick="fundAddmoreVideo()" id="add-more" class="btn btn-primary btn-md " style="display:none;">+ add more</span>

                    <div id="add-videohelp">
                    </div>
                    <div id="add-photo0" class="row">
                    </div>
                    <!-- col-sm-12 col-md-3lapse addmore-->

                 </div><!-- card-body end-->
                <div class="card-footer text-center">
                    <div id="responseSubmithouse"></div>
                    <!-- mtn-payment-btn -->
                    <!-- <button type="button" < ?php if(isset($_SESSION['key'])){ echo 'id="submit_form"  class="btn btn-primary btn-lg btn-block"'; }else{ echo 'class="btn btn-primary btn-lg btn-block " id="submit_form"'; } ?>  data-mtnuser="< ?php echo $user_id; ?>" >Submit</button> -->
                    <button type="button" id="submit_form" class="btn btn-primary btn-lg btn-block text-center">Submit</button>
                </div><!-- card-footer -->
               </form>
            </div><!-- card end-->

          </div><!-- img-popup-body -->
        </div><!-- tweet-show-popup-box -->
    </div> <!-- Wrp4 -->
</div> <!-- apply-popup" -->
<!-- <script src="< ?php echo BASE_URL_LINK ;?>dist/js/jquery.min.js"></script> -->
<script type="text/javascript">
    $('.progress-hidex').hide();
    $('.progress-hidec').hide();
    $('.progress-hidez').hide();
    $('#add-videohelp').hide();
</script>
<?php } 

if (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
    $user_id= $_POST['user_id'];
    $datetime= date('Y-m-d H-i-s');

    $photo= $_FILES['photo'];
    $other_photo= $_FILES['otherphoto'];

    if (!empty($_FILES['video']['name'][0])) {
      $video= $_FILES['video'];
      $video_ = $home->uploadHouseFile($video);
      $youtube=  $users->test_input($_POST['youtube']);
    }else{
      $video_= "";
      $youtube=  "";
    }

    $name_of_car = $users->test_input($_POST['name_of_car']);
    $year_made = $users->test_input($_POST['year_made']);
    $authors = $users->test_input($_POST['authors']);
    $additioninformation = $users->test_input($_POST['additioninformation']);
    $categories_house=  $users->test_input($_POST['categories_car']);
    $_rent_sale=(substr($categories_house,-4) == 'sale')? 'sale' : 'rent';
    $price = $users->test_input($_POST['price']);
    $price_per_day = $users->test_input($_POST['price_per_day']);
    $car_marque = $users->test_input($_POST['car_marque']);
    $phone = $users->test_input($_POST['phone']);
    $province =  $users->test_input($_POST['provincecode']);
    $districts =  $users->test_input($_POST['districtcode']);
    $sector =  $users->test_input($_POST['sectorcode']);
    $code = $districts;
    $codes = (strlen($code) > 10)? 
    strtolower(date('Y').'_'.rand(10,100).substr($code,0,4)):
    strtolower(date('Y').'_'.rand(10,100).$code);

    if (!empty($title) || !empty(array_filter($photo['name'])) || !empty(array_filter($other_photo['name'])) ) {
		if (!empty($photo['name'][0])) {
			# code...
			$photo_ = $home->uploadHouseFile($photo);
            $other_photo_ = $home->uploadHouseFile($other_photo);
		}

		if (strlen($additioninformation ) > 800) {
			exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>The text is too long !!!</strong> </div>');
		}

	$users->Postsjobscreates('house',array( 
	'name_of_car'=> $name_of_car,
	'year_made'=> $year_made,
	'authors'=> $authors,
	'photo'=> $photo_, 
	'other_photo'=> $other_photo_, 
	'video'=> $video_, 
    'youtube'=> $youtube, 
    'price'=> $price,
    'price_per_day'=> $price_per_day,
	'phone'=> $phone,
	'province'=> $province,
	'districts'=> $districts,
	'sector'=> $sector,
    'text'=> $additioninformation,
    'categories_car'=> $categories_house,
    'car_marque'=> $car_marque,
    'buy'=> $_rent_sale,
    'user_id3'=> $user_id,
    'code'=> $codes,
    'created_on3'=> $datetime 
        ));
    }
} ?> 