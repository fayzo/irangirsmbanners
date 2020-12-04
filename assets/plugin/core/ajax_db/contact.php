<style>
.section-titles {
    text-align: left;
    margin-bottom: 10px;
}
</style>              

<?php
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));
if(isset($_POST['key'])){

if ($_POST['key'] == 'client_request_home') {
    
    $datetime= date('Y-m-d H-i-s'); // last_login 
    $name_client_  =  $users->test_input($_POST['name_client_']);
    $email_client_  =  $users->test_input($_POST['email_client_']);
    $Request_Type_client_  =  $users->test_input($_POST['Request_Type_client_']);
    $property_type_client_  =  $users->test_input($_POST['property_type_client_']);
    $equipment_client_  =  $users->test_input($_POST['equipment_client_']);
    $Minimum_bedrooms_client_  =  $users->test_input($_POST['Minimum_bedrooms_client_']);
    $Minimum_bathrooms_client_  =  $users->test_input($_POST['Minimum_bathrooms_client_']);
    $phone_client_  =  $users->test_input($_POST['phone_client_']);
    $location_client  =  $users->test_input($_POST['location']);
    $currency  =  $users->test_input($_POST['currency']);
    $price  =  $users->test_input($_POST['price']);
    $message_client_  =  $users->test_input($_POST['messages_client_']);

    if(!preg_match("/^[a-zA-Z ]*$/",  $name_client_)){
       exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                   <button class="close" data-dismiss="alert" type="button">
                       <span>&times;</span>
                   </button>
                   <strong>Only letters and white space allowed</strong> </div>');
   }else if (!filter_var($email_client_,FILTER_VALIDATE_EMAIL)) {
           exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                   <button class="close" data-dismiss="alert" type="button">
                       <span>&times;</span>
                   </button>
                   <strong>Email invalid format</strong> </div>');
   }else {
     $users->Postsjobscreates('business_request_home', array(
        'name_client' => $name_client_,
        'email_client' => $email_client_,
        'request_type' => $Request_Type_client_,
        'property_type' => $property_type_client_,
        'equipment' => $equipment_client_,
        'bedroom' => $Minimum_bedrooms_client_,
        'bathroom' => $Minimum_bathrooms_client_,
        'message_request' => $message_client_,
        'phone' => $phone_client_,
        'location' => $location_client,
        'price' => $price,
        'currency' => $currency,
        'datetime' => $datetime

     ));

    } 

} 

if ($_POST['key'] == 'contact_business') {
    
    $datetime= date('Y-m-d H-i-s'); // last_login 
    $name_client_  =  $users->test_input($_POST['name_client_']);
    $email_client_  =  $users->test_input($_POST['email_client_']);
    $phone_client_  =  $users->test_input($_POST['phone_client_']);
    $message_client_  =  $users->test_input($_POST['messages_client_']);

    if(!preg_match("/^[a-zA-Z ]*$/",  $name_client_)){
       exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                   <button class="close" data-dismiss="alert" type="button">
                       <span>&times;</span>
                   </button>
                   <strong>Only letters and white space allowed</strong> </div>');
   }else if (!filter_var($email_client_,FILTER_VALIDATE_EMAIL)) {
           exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                   <button class="close" data-dismiss="alert" type="button">
                       <span>&times;</span>
                   </button>
                   <strong>Email invalid format</strong> </div>');
   }else {
     $users->Postsjobscreates('business_message', array(

        'name_client' => $name_client_,
        'email_client' => $email_client_,
        'message_client' => $message_client_,
        'phone_client' => $phone_client_,
        'datetime' => $datetime

     ));

    } 

    } 
} 

if(isset($_POST['contacts_us'])){
$user_id = $_POST['user_id'];

?>
<div class="house-popup">
    
<div class="wrap6" id="disabler">
    <div class="wrap6Pophide" onclick="togglePopup ( )" ></div>
    <span class="col-sm-12 col-md-3  colose">
        <button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
    </span>
    <div class="img-popup-wrap" id="popupEnd">
        <div class="img-popup-body">

        <div class="card">
            <div class="card-header">
                <button class="btn btn-success btn-sm  float-right d-md-block d-lg-none" onclick="togglePopup( )">close</button>
                <div class="section-titles">
                    <h2>Request a Property</h2>
                    <!-- <h2>Contact Us For Enquire House</h2> -->
                </div>
            </div>
            <form method="post" class="contact-form" id="form-house-request-client">
            <div class="card-body">
                <div id="responses"></div>
                        <input type="hidden" name="user_id" id="user_id_" value="<?php echo $user_id ;?>">
                        <input type="hidden" name="register" id="register_" value="<?php echo (isset($_SESSION['register_as']))? ''.$_SESSION['register_as'].'' :'Buyer' ;?>">
         
                        <div class="form-row">
                            <div class="col-12 col-md-3">
                            <label for="lastname">Name :</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="name_client_" id="name_client_"
                                    aria-describedby="helpId" placeholder="name">
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
                                <input type="email" class="form-control" name="email_client_" id="email_client_"
                                    aria-describedby="helpId" placeholder="@email">
                                    <span id="response"></span>
                            </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="" class="text-dark"> Request Type</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                    </div>
                                    <select class="form-control" name="Request_Type_client_" id="Request_Type_client_">
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
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                    </div>
                                    <select class="form-control" name="property_type_client_" id="property_type_client_" onchange="getPropertyTypeHide(this)">
                                        <option value="">Types of Property</option>
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
                    </div>
                    <div class="form-row">
                      
                            <div class="col-12 col-md-3 " id="EquipmentHide">
                                <label for="authors">Equipment</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                    </div>
                                    <select name="equipment_client_" id="equipment_client_" class="form-control">
                                        <option value="">-select-</option>
                                        <option value="furnished">Full furnished</option>
                                        <option value="unfurnished">Unfurnished</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-3" id="bedroomsHide">
                                <label for="authors">Minimum bedrooms</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                    </div>
                                    <select name="Minimum_bedrooms_client_" id="Minimum_bedrooms_client_" class="form-control">
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
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                    </div>
                                    <select name="Minimum_bathrooms_client_" id="Minimum_bathrooms_client_" class="form-control">
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
                            <div class="col-12  col-md-3">
                                <label for="Village">In which area/city are you interested in?</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" name="location_client" id="location_client" class="form-control" placeholder="../.../..." >
                                </div>
                            </div>
                            <div class="col-12  col-md-3">
                            <label for="specialize">Telephone :</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-phone"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="phone_client_" id="phone_client_"
                                    aria-describedby="helpId" placeholder="Telephone">
                                    <span id="response"></span>
                            </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="">Currency</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">#</span>
                                    </div>
                                        <select class="form-control" name="currency" id="currency">
                                        <option value="">-Select-</option>
                                        <option value="FRW">FRW</option>
                                        <option value="USD">USD</option>
                                        <option value="EURO">EURO</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                            <label for="authors">Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2">#</span>
                                </div>
                                <input type="text" class="form-control" name="price" id="price" placeholder="Price ">
                            </div>
                            </div>
                        </div>
                        <label for="authors"> Give us more details about the property you are looking for</label>
                         <textarea class="form-control mt-2" id="messages_client_" name="messages_client_" ></textarea>
                    </div><!-- card-body -->
                    <div class="card-footer">
                        <button onclick="javascript:client_business('client_request_home')" type="button" class="btn btn-block btn-primary m-2">Submit</button>
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

if(isset($_POST['contacts_business'])){ ?>
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
                    <div class="section-titles">
                        <h2>Get In Touch</h2>
                    </div>
            </div>
            <form action="#" class="contact-form">
            <div class="card-body">
          
                <div id="responses"></div> 
                        <div class="form-row">
                            <div class="col-12">
                            <label for="lastname">Name :</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="name_client_0" id="name_client_0"
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
                                <input type="email" class="form-control" name="email_client_0" id="email_client_0"
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
                                <input type="text" class="form-control" name="phone_client_0" id="phone_client_0"
                                    aria-describedby="helpId" placeholder="Telephone">
                                    <span id="response"></span>
                            </div>
                            </div>
                        </div>
                           
                        <textarea class="form-control mt-2" id="messages_client_0" name="messages_client_0"  placeholder="Messages"></textarea>
                    </div>  <!-- card-body -->
                    <div class="card-footer">
                        <button onclick="javascript:contact_business('contact_business')" type="button" class="btn btn-block btn-primary m-2">Send Message</button>
                    </div>
                     <!-- card-footer -->
                    </form>
                  </div>
                       <!-- card -->

        </div><!-- img-popup-body -->
        </div><!-- tweet-show-popup-box -->
    </div> <!-- Wrp4 -->
</div> <!-- apply-popup" -->

<?php } ?>