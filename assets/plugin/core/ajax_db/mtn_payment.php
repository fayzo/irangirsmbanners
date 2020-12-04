<?php
include('../init.php');
// $users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if(isset($_POST['key'])){

 if ($_POST['key'] == 'mtn_payment') {
    
     $datetime= date('Y-m-d H-i-s'); // last_login 
     $name =  $users->test_input($_POST['name']);
     $phone = $users->test_input($_POST['phone']);
     $payment =  $users->test_input($_POST['payment']);
     $register =  $users->test_input($_POST['register']);

     if(!preg_match("/^[a-zA-Z ]*$/", $name)){
        exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>Only letters and white space allowed</strong> </div>');
    }else if(!preg_match("/^[0-9]*$/", $phone)){
        exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>Only number</strong> </div>');
    }else {

      $users->Postsjobscreates('mtn_payment',
      array(
            'name' => $name, 
            'phone' => $phone, 
            'payment' => $payment, 
            'datetime' => $datetime,
            'register' => $register,
      ));

     } 
  }
}

if (isset($_REQUEST['user_id']) && !empty($_REQUEST['user_id'])) {
    // $user_id = $_REQUEST['user_id'];
    // $user = $home->userData($user_id);
    // $user0 = $home->userData($sentby_user_id);
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
                        <div class="card-header text-center">
                            <button class="btn btn-success btn-sm  float-right d-md-block d-lg-none"  onclick="togglePopup ( )">close</button>
                            <h4 class="card-title">Payment from Mr(s) <?php echo $_REQUEST['name'] ?> To irangiro house</h4>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <span id="responseSubmitpayment"></span>
                                <div class="form-row mt-2">
                                    <div class="col">
                                        <label for="firstname">Name as same as Your post :</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="name" id="name"
                                                aria-describedby="helpId" value="<?php echo $_REQUEST['name'] ?>" placeholder="name">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="lastname">Your Phone number :</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="phone" id="phone"
                                                aria-describedby="helpId" value="<?php echo $_REQUEST['phone'] ?>"  placeholder="Phone number">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row mt-2">
                                    <input type="hidden" name="payment" id="payment" value="5000">
                                    <input type="hidden" name="register" id="register" value="<?php echo $_REQUEST['register'] ?>">
                                    <div class="col">
                                        <label >Amount to be paid</label>
                                        <ul class="list-group">
                                            <li class="list-group-item py-2"  style="background-color: #e9ecef;">Price : 5000 Frw  Per/post</li>
                                        </ul>
                                    </div>

                                    <div class="col">
                                        <label for="lastname">Send Mobile money to This number :</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-money"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="number" id="number"
                                                aria-describedby="helpId" value="MTN:(+250) 782822402" readonly>
                                        </div>
                                    </div>
                                </div>
                                    <div class="form-row mt-2 mb-2">
                                        <div class="col">
                                            <label for="lastname"><i class="fas fa-warning"></i> Warning :</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-pencil"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="Comment" id="Comment" maxlength="200"
                                                    aria-describedby="helpId" value=""  placeholder="If u don't pay ur post it will last one day pay as soon as it can last forever in our system" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="response"></div>
                                    <!-- onclick="donateCrowfund('donation');" -->
                                    <button type="button"  class="btn main-active btn-block mtn-payment-btn"><b>SUBMIT IF YOUR ALREADY PAID</b></button>
                                    <div class="mb-2" id="respone-success"></div>
                            </form>
                        </div><!-- card-body -->
                    </div><!-- card -->

            </div><!-- img-popup-body -->
        </div><!-- user-show-popup-box -->
    </div> <!-- Wrp4 -->
</div> <!-- apply-popup" -->
<?php } 

if (isset($_REQUEST['register_as']) && !empty($_REQUEST['register_as'])) {
     $_REQUEST['phone'] = '';
    // $user = $home->userData($user_id);
    // $user0 = $home->userData($sentby_user_id);
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
                        <div class="card-header text-center">
                            <button class="btn btn-success btn-sm  float-right d-md-block d-lg-none"  onclick="togglePopup ( )">close</button>
                            <h4 class="card-title">Payment from Mr(s) <?php echo $_REQUEST['name'] ?> To irangiro house</h4>
                        </div>
                        <div class="card-body">
                            <form method="post">
                            <span id="responseSubmitpayment"></span>
                                <div class="form-row mt-2">
                                    <div class="col">
                                        <label for="firstname">Name as you already register :</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="name" id="name"
                                                aria-describedby="helpId" value="<?php echo $_REQUEST['name'] ?>" placeholder="name">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="lastname">Your Phone number :</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="phone" id="phone"
                                                aria-describedby="helpId" value="<?php echo $_REQUEST['phone'] ;?>"  placeholder="Phone number">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row mt-2">
                                    <div class="col">
                                    <input type="hidden" name="register" id="register" value="<?php echo $_REQUEST['register'] ?>">
                                    <input type="hidden" name="payment" id="payment" value="15000">
                                        <label >Amount to be paid in month</label>
                                        <ul class="list-group">
                                            <li class="list-group-item py-2"  style="background-color: #e9ecef;">Price : 15000 Frw  Per/month post many as you want</li>
                                        </ul>
                                    </div>

                                    <div class="col">
                                        <label for="lastname">Send Mobile money to This number :</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-money"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="number" id="number"
                                                aria-describedby="helpId" value="MTN:(+250) 782822402" readonly>
                                        </div>
                                    </div>
                                </div>
                                    <div class="form-row mt-2 mb-2">
                                        <div class="col">
                                            <label for="lastname"><i class="fas fa-warning"></i> Warning :</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-pencil"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="Comment" id="Comment" maxlength="200"
                                                    aria-describedby="helpId" value=""  placeholder="If u don't pay ur post it will last one day pay as soon as it can last forever in our system" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="response"></div>
                                    <!-- onclick="donateCrowfund('donation');" -->
                                    <button type="button"  class="btn main-active btn-block mtn-payment-btn"><b>SUBMIT IF YOUR ALREADY PAID</b></button>
                                    <div class="mb-2" id="respone-success"></div>
                            </form>
                        </div><!-- card-body -->
                    </div><!-- card -->

            </div><!-- img-popup-body -->
        </div><!-- user-show-popup-box -->
    </div> <!-- Wrp4 -->
</div> <!-- apply-popup" -->
<?php } ?>

<script>

    $(document).on('click', '.mtn-payment-btn', function (e) {
        e.stopPropagation();
        // e.preventDefault();
        var name = $('#name');
        var phone = $('#phone');
        var paymeny = $('#payment');
        var register = $('#register');

        if (isEmpty(name) && isEmpty(phone) ){

        $.ajax({
            url: 'core/ajax_db/mtn_payment.php',
            method: 'POST',
            dataType: 'text',
            data: {
                key: 'mtn_payment',
                name : name.val(),
                phone : phone.val(),
                payment : paymeny.val(),
                register : register.val(),
            }, success: function (response) {
                $("#responseSubmitpayment").html(response).fadeIn();
                setInterval(function () {
                    $("#responseSubmitpayment").fadeOut();
                }, 4000);
                // clearInterval(this);
                setInterval(function () {
                    window.location.reload();
                }, 2000);
                // location.reload();
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".house-popup").hide();
                });
                console.log(response);
            }
        });

        }else {
            isEmptys(name) || isEmptys(phone) 
        }

    });

    
    function thankFordonation() { 
          $.ajax({
            url: "core/ajax_db/crowfund_thankFordonation.php",
            method: "POST",
            dataType: "text",
            data: {
                login_id: '1',
            },
            success: function(response) {
                    $(".popupTweet").html(response);
                    $(".close-imagePopup").click(function () {
                        $(".login-popup").hide();
                    });
                }
        });
    }
</script>


