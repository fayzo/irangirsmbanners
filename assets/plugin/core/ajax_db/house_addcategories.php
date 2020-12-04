<?php 
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['house_view']) && !empty($_POST['house_view'])) {
    $user_id= $_POST['house_view'];
    $get_province = mysqli_query($db,"SELECT * FROM provinces");   
     ?>
  <!-- <script src="< ?php echo BASE_URL_LINK ;?>dist/js/country_login_ajax-db.js"></script> -->

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
                    <h5>Add house </h5>
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
                                    <select class="form-control sectorcode" name="sectorcode" id="sectorcode"  onchange="showResult3();">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                      
                            <div class="col-sm-12 col-md-3">
                                <label for="Cell" class="text-dark">Cell</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                    </div>
                                    <select name="codecell" id="codecell" class="form-control codecell" onchange="showResult4();">
                                        <option></option>
                                    </select>
                                </div>
                            </div>

                        </div>

                         <div class="form-row mt-2">

                          <div class="col-sm-12 col-md-3">
                            <label for="Village">Village</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                </div>
                                  <select name="CodeVillage" id="CodeVillage" class="form-control CodeVillage">
                                      <option> </option>
                                  </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-3">
                            <label for="authors">Street number of house</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control" name="name_of_house"  id="name_of_house" placeholder="Villa 9721 Glen Creek">
                            </div>
                          </div>

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

                  </div>

                  <div class="form-row mt-2">

                        <div class="col-sm-12 col-md-3">
                            <label for="authors">Property</label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-home mr-1" aria-hidden="true"></i></span>
                            </div>
                              <select class="form-control" name="categories_house_" id="categories_house_" onchange="getPropertyTypeHide(this)">
                                <option  value="">-types of Property-</option>
                                <option value="House_For_sale">House For sale</option>
                                <option value="House_For_rent">House For rent</option>
                                <option value="Land_For_sale">Land & Plot</option>
                                <option value="Apartment_For_sale">Apartment For sale</option>
                                <option value="Apartment_For_rent">Apartment For rent</option>
                                <option value="room_For_rent">room</option>
                                <option value="commerce_For_rent">commerce</option>
                                <option value="Offices_For_rent">Offices</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3" id="EquipmentHide">
                           <label for="authors">Equipment</label>
                           <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-chair mr-1" aria-hidden="true"></i></span>
                            </div>
                           <select class="form-control" name="equipment_" id="equipment_">
                             <option value="">-Select-</option>
                             <option value="FURNISHED">Full furnished</option>
                             <option value="UNFURNISHED">Unfurnished</option>
                           </select>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                        <label for="authors">Price</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">Frw</span>
                            </div>
                            <input type="text" class="form-control" name="price" id="price" placeholder="Price ">
                          </div>
                        </div>
                        <div class="col-12 col-md-3" id="bedroomsHide">
                            <label for="authors">Minimum bedrooms</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-bed mr-1" aria-hidden="true"></i></span>
                                </div>
                                <select name="Minimum_bedrooms" id="Minimum_bedrooms" class="form-control">
                                    <option value="">N* of bedrooms </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-3" id="bathroomsHide">
                            <label for="authors">Minimum bathrooms</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-bath mr-1" aria-hidden="true"></i></span>
                                </div>
                                <select name="Minimum_bathrooms" id="Minimum_bathrooms" class="form-control">
                                    <option value="">N* of bathrooms </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3" id="carHide">
                        <label for="authors">Minimum number of car</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-car"></i></span>
                            </div>
                            <select name="car_in_garage" id="car_in_garage" class="form-control">
                                <option value="">N* of car </option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group mt-2">
                        <textarea class="form-control" name="additioninformation" id="addition-information" placeholder="tell us your property" rows="3"></textarea>
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

    $car_in_garage = $users->test_input($_POST['car_in_garage']);
    $name_of_house = $users->test_input($_POST['name_of_house']);
    $authors = $users->test_input($_POST['authors']);
    $additioninformation = $users->test_input($_POST['additioninformation']);
    $categories_house=  $users->test_input($_POST['categories_house_']);
    $_rent_sale=(substr($categories_house,-4) == 'sale')? 'sale' : 'rent';
    $price = $users->test_input($_POST['price']);
    $bathroom = $users->test_input($_POST['Minimum_bedrooms']);
    $bedroom = $users->test_input($_POST['Minimum_bathrooms']);
    $equipment = $users->test_input($_POST['equipment_']);
    $phone = $users->test_input($_POST['phone']);
    $country = $users->test_input($_POST['country']);
    $province =  $users->test_input($_POST['provincecode']);
    $districts =  $users->test_input($_POST['districtcode']);
    $cell=  $users->test_input($_POST['codecell']);
    $sector =  $users->test_input($_POST['sectorcode']);
    $village =  $users->test_input($_POST['CodeVillage']);
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
	'name_of_house'=> $name_of_house,
	'authors'=> $authors,
	'bathroom'=> $bathroom, 
	'bedroom'=> $bedroom, 
	'equipment'=> $equipment, 
	'car_in_garage'=> $car_in_garage, 
	'photo'=> $photo_, 
	'other_photo'=> $other_photo_, 
	'video'=> $video_, 
    'youtube'=> $youtube, 
    'price'=> $price,
	'phone'=> $phone,
    'country01'=> $country,
	'province'=> $province,
	'districts'=> $districts,
	'sector'=> $sector,
	'cell'=> $cell,
	'village'=> $village,
    'text'=> $additioninformation,
    'categories_house'=> $categories_house,
    'buy'=> $_rent_sale,
    'user_id3'=> $user_id,
    'code'=> $codes,
    'created_on3'=> $datetime 
        ));
    }
} ?> 