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
    $car_marque  =  $users->test_input($_POST['car_marque']);
    $phone_client_  =  $users->test_input($_POST['phone_client_']);
    $location_client  =  $users->test_input($_POST['location']);
    $currency  =  $users->test_input($_POST['currency']);
    $price  =  $users->test_input($_POST['price']);
    $price_per_day  =  $users->test_input($_POST['price_per_day']);
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
     $users->Postsjobscreates('business_request_car', array(
        'name_client' => $name_client_,
        'email_client' => $email_client_,
        'request_type' => $Request_Type_client_,
        'category_type' => $property_type_client_,
        'car_marque' => $car_marque,
        'message_request' => $message_client_,
        'phone' => $phone_client_,
        'location' => $location_client,
        'price' => $price,
        'price_per_day' => $price_per_day,
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
<script src="<?php echo BASE_URL_LINK ;?>car_type/car_type.js"></script>

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
                    <h2>Request a Vehicle</h2>
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
                                <label for="Sector" class="text-dark">Category Type</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                    </div>
                                    <select class="form-control" name="property_type_client_" id="property_type_client_" >
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
                    </div>
                    <div class="form-row">
                      
                            <div class="col-12 col-md-3"  id="EquipmentHide">
                                <label for="authors">Mark</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-car mr-1" aria-hidden="true"></i></span>
                                </div>
                                <div id="myCar_type"></div>
                                </div>
                            </div>

                            <div class="col-12  col-md-3">
                                <label for="Village">In which location are you in?</label>
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
                            <div class="col-12 col-md-3">
                                <label for="authors">Price</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">#</span>
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
                                    <select class="form-control" name="price_per_day" id="price_per_day" >
                                        <option  value="">- Select -</option>
                                        <option value="per day">day</option>
                                        <option value="per week">week</option>
                                        <option value="per month">month</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label for="authors"> Give us more details about the vehicle you are looking for</label>
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