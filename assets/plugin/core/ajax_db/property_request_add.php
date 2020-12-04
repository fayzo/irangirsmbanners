<?php 
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['house_view']) && !empty($_POST['house_view'])) {
    $user_id= $_SESSION['key'];
    $get_province = mysqli_query($db,"SELECT * FROM provinces");   
     ?>
  <!-- <script src="< ?php echo BASE_URL_LINK ;?>dist/js/country_login_ajax-db.js"></script> -->

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
                    <h5>Request a Property </h5>
                    <p class="card-text">Fill details below ?</p>
                </div>

                <form method="post" enctype="multipart/form-data" >
                    <div class="card-body">
                           <div id="responses"></div>
                        <div class="form-row">

                            <div class="col-12 col-md-3">
                                <label for="" class="text-dark"> Request Type</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-home mr-1" aria-hidden="true"></i></span>
                                    </div>
                                    <select class="form-control" name="Request_Type" id="Request_Type">
                                        <option value="">-Select-</option>
                                        <option value="Rent">Rent</option>
                                        <option value="Buy">Buy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="Sector" class="text-dark">Property Type</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-home mr-1" aria-hidden="true"></i></span>
                                    </div>
                                    <select class="form-control" name="property_type" id="property_type">
                                        <option value="">Select what types of categories</option>
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
                      
                            <div class="col-12 col-md-3">
                                <label for="authors">Equipment</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-chair mr-1" aria-hidden="true"></i></span>
                                    </div>
                                    <select name="equipment" id="equipment" class="form-control">
                                        <option>-Select-</option>
                                        <option value="FURNISHED">Full furnished</option>
                                        <option value="UNFURNISHED">Unfurnished</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-3">
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

                            <div class="col-12 col-md-3">
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
                        </div>
                        <!-- form-row -->
                        <div class="form-group">
                                <label for="authors">Give us more details about the property you are looking for</label>
                                <br>
                               <textarea  class="form-control" name="details_of_property_request" id="details_of_property_request"  rows="5"></textarea>
                        </div>
                        <div class="form-row">
                                <label for="Village">In which area/city are you interested in?</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" name="location_client" id="location_client" class="form-control" >
                                </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12">
                                <label for="authors">Give us more details about the neighborhood you are looking for</label>

                               <textarea name="details_about_neighborhood" class="form-control"  id="details_about_neighborhood" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="panel-title">What's your budget and how soon do you need the property? </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">

                                        <div class="col-12 col-md-3">
                                            <label for="">Currency</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2">#</span>
                                                </div>
                                                  <select class="form-control" name="currency" id="currency">
                                                    <option>-Select-</option>
                                                    <option value="FRW">FRW</option>
                                                    <option value="USD">USD</option>
                                                    <option value="EURO">EURO</option>
                                                  </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                            <label for="">Price</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2">#</span>
                                                </div>
                                               <input type="text" class="form-control" name="price_" id="price_">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                            <label for="">Payable</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar mr-1" aria-hidden="true"></i></span>
                                                </div>
                                                <select class="form-control" name="Payable" id="Payable">
                                                    <option>-Select-</option>
                                                    <option value="Monthly">Monthly</option>
                                                    <option value="Weekly">Weekly</option>
                                                    <option value="Daily">Daily</option>
                                                    <option value="Nightly">Nightly</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                            <label for="">How soon do you need?</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar mr-1" aria-hidden="true"></i></span>
                                                </div>
                                                <select class="form-control" name="urgent" id="urgent">
                                                    <option>-Select-</option>
                                                    <option value="Very Ugernt">Very Ugernt</option>
                                                    <option value="Within a day">Within a day</option>
                                                    <option value="Within a Week">Within a Week</option>
                                                    <option value="Within a Month">Within a Month</option>
                                                </select>
                                            </div>
                                        </div>
                                        </div>

                                    </div>
                                    <!-- card-body -->
                                </div>
                                <!-- card- -->
                            </div>
                            <!-- col- -->
                        </div>
                            <!-- form-row- -->
                        <div class="form-row mt-3">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="panel-title">
                                        Provide your contact details 
                                        </div>
                                    </div>
                                    <div class="card-body">
                                    <div class="form-row">

                                        <div class="col-12 col-md-3">

                                        <label for="firstname">Firstname :</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="firstname" id="firstname"
                                                aria-describedby="helpId" placeholder="Firstname">
                                                <span id="response"></span>
                                        </div>
                                        </div>

                                        <div class="col-12 col-md-3">

                                        <label for="lastname">Lastname :</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="lastname" id="lastname"
                                                aria-describedby="helpId" placeholder="Lastname">
                                                <span id="response"></span>
                                        </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                        <label for="specialize">email :</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-envelope"></i>
                                                </span>
                                            </div>
                                            <input type="email" class="form-control" name="email" id="email"
                                                aria-describedby="helpId" placeholder="@email">
                                                <span id="response"></span>
                                        </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                        <label for="specialize">Telephone :</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-phone"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="telephone" id="telephone"
                                                aria-describedby="helpId" placeholder="Your phone number">
                                                <span id="response"></span>
                                        </div>
                                        </div>
                                        </div>
                                        <!-- form-row -->

                                    </div>
                                    <!-- card-body -->
                                </div>
                                <!-- card- -->
                            </div>
                            <!-- col- -->
                        </div>
                            <!-- form-row- -->

                    </div><!-- card-body end-->
                    <div class="card-footer text-center">
                        <button  onclick="javascript:property_request('property_request')" type="button" class="btn btn-primary btn-lg btn-block text-center">Submit</button>
                    </div><!-- card-footer -->
                </form>
            </div><!-- card end-->

          </div><!-- img-popup-body -->
        </div><!-- tweet-show-popup-box -->
    </div> <!-- Wrp4 -->
</div> <!-- apply-popup" -->
<!-- <script src="< ?php echo BASE_URL_LINK ;?>dist/js/jquery.min.js"></script> -->

<?php } 
if(isset($_POST['key'])){

    if ($_POST['key'] == 'property_request') {
        
        $datetime= date('Y-m-d H-i-s'); // last_login 
        $Request_Type =   $users->test_input($_POST['Request_Type']);
        $property_type =   $users->test_input($_POST['property_type']);
        $equipment =   $users->test_input($_POST['equipment']);
        $Minimum_bedrooms =   $users->test_input($_POST['Minimum_bedrooms']);
        $Minimum_bathrooms =   $users->test_input($_POST['Minimum_bathrooms']);
        $details_of_property_request =   $users->test_input($_POST['details_of_property_request']);
        $location_client =   $users->test_input($_POST['location_client']);
        $details_about_neighborhood =   $users->test_input($_POST['details_about_neighborhood']);
        $currency =   $users->test_input($_POST['currency']);
        $price =   $users->test_input($_POST['price']);
        $Payable =   $users->test_input($_POST['Payable']);
        $urgent =   $users->test_input($_POST['urgent']);
        $firstname =   $users->test_input($_POST['firstname']);
        $lastname =   $users->test_input($_POST['lastname']);
        $email =   $users->test_input($_POST['email']);
        $telephone =   $users->test_input($_POST['telephone']);
    
        if(!preg_match("/^[a-zA-Z ]*$/",  $firstname)){
           exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                       <button class="close" data-dismiss="alert" type="button">
                           <span>&times;</span>
                       </button>
                       <strong>Only letters and white space allowed</strong> </div>');
       }else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
               exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                       <button class="close" data-dismiss="alert" type="button">
                           <span>&times;</span>
                       </button>
                       <strong>Email invalid format</strong> </div>');
       }else {
     $users->Postsjobscreates('client_request_property', array(
            'firstname_client' => $firstname,
            'lastname_client' => $lastname,	
            'email_client' => $email,	
            'phone_client' => $telephone,	
            'request_type' => $Request_Type,	
            'property_type' => $property_type,	
            'equipment' => $equipment,	
            'bedroom' => $Minimum_bedrooms,	
            'bathroom' => $Minimum_bathrooms,	
            'property_details_request' => $details_of_property_request,	
            'location_request' => $location_client,	
            'neighborhood_request' => $details_about_neighborhood,	
            'currency' => $currency,	
            'price' => $price,	
            'payable' => $Payable,	
            'urgent_property' => $urgent,
            'datetime' =>  $datetime,
    
         ));
    
        } 
    
    } 
    
} ?> 