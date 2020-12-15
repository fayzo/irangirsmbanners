<?php include "header_if_login.php"?>
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

                <div class="col-lg-6 col-sm-12">
                    <h4 class="display-5 mb-2 text-center">DASH-BOARD</h4>
                    <!-- Calendar -->

                    <!-- CARD -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="card-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                           Business Details
                        </div>
                        <div class="card-body">
                                <div class="row">
                                <?php 
                                $result =$db->query("SELECT * FROM business_contact WHERE business_id= 1");
                                $user= $result->fetch_array();
                                ?>
                                    <div class="col-12 col-md-4">
                                        business Name:
                                        <input type="hidden" name="id_career" id="id_career"
                                        value="<?php echo $user['business_id'];?>" style="display:none" />
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-home"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="business_name" id="business_name"
                                                aria-describedby="helpId" value="<?php echo $user['business_name'];?>" >
                                                <span id="response"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        Email:
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-envelope"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="email_business" id="email_business"
                                                aria-describedby="helpId" value="<?php echo $user['email_business'];?>" >
                                                <span id="response"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        Telephone:
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-phone"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="phone_business" id="phone_business"
                                                aria-describedby="helpId" value="<?php echo $user['phone_business'];?>" >
                                                <span id="response"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <label for="specialize">Twitter :</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-twitter"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="twitter" id="twitter"
                                                aria-describedby="helpId" value="<?php echo $user['twitter_business'];?>" >
                                                <span id="response"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="specialize">Facebook :</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-facebook"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="facebook" id="facebook"
                                                aria-describedby="helpId" value="<?php echo $user['facebook_business'];?>">
                                                <span id="response"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="specialize">Instagram :</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-instagram"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="instagram" id="instagram"
                                                aria-describedby="helpId" value="<?php echo $user['instagram_business'];?>">
                                                <span id="response"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="specialize">Google+ :</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-google"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="google" id="google"
                                                aria-describedby="helpId" value="<?php echo $user['google_plus_business'];?>" >
                                                <span id="response"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="specialize">Address :</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-map"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="map_businesss" id="map_businesss"
                                                aria-describedby="helpId" value="<?php echo $user['address_business'];?>" >
                                                <span id="response"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="specialize"> </label>
                                        <div id="respone-success mb-2"></div>
                                        <button type="button" onclick="business_details('business_details');" class="btn btn-primary btn-block"><b>Submit</b></button>
                                    </div>
                                </div>
                                <!-- row -->
                                <div class="row">
                                    <div class="col-12 col-md-4  widget-user">
                                        <label for="specialize mb-3">Business Logo :</label>
                                        <div class="img-relative">
                                            <div class="profile-upload">
                                                <!-- Hidden upload form -->
                                                <form method="post" action="<?php echo BASE_URL;?>core/ajax_db/profileEdit.php" enctype="multipart/form-data" id="picUploadForm" target="uploadTarget">

                                                    <input type="hidden" name="edit_profile" id="edit_profile" value="<?php echo $user['business_id'];?>" style="display:none">
                                                    <input type="file" name="pictureLogo" id="fileInput" style="display:none">
                                                </form>

                                                <iframe id="uploadTarget" name="uploadTarget" src="#" style="width:0;height:0;border:0px solid black;"></iframe>
                                                <!-- Profile image -->
                                                <div class="text-center img-placeholder">
                                                    <h4>Update image</h4>
                                                </div>
                                                <!-- Image update link -->
                                                <a href="javascript:void(0);" class="img-upload-iconLinks" id="edit_linkUpload">
                                                    <i class="fa fa-camera" aria-hidden="true"></i> </a>
                                                    <?php if (!empty($user['business_logo'] )) {?>
                                                        <img class="rounded-circle" id="imagePreview"
                                                            src='<?php echo BASE_URL_LINK."image/logo/".$user['business_logo'] ;?>'
                                                            alt="User profile picture">
                                                    <?php  }else{ ?>
                                                        <img class="rounded-circle" id="imagePreview"
                                                            src='assets/img/partner/partner-4.png'
                                                            alt="User profile picture">
                                                            <!-- src='< ?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>' -->
                                                    <?php } ?>
                                            </div>
                                        </div>
                                         <!-- img-relative -->
                                    </div>
                                    <!-- col -->
                                </div>
                                <!-- row -->
                        </div>
                        <div class="card-footer">
                            footer
                        </div>
                    </div>


                    <!-- CARD -->
                    <div class="card mb-3 ">
                        <div class="card-header">
                            <div class="card-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            Total members
                            <span class="badge badge-primary">  <?php echo $users->countUSERS() ;?></span>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table_adminLA table-hover ">
                                <thead class="main-active">
                                    <tr>
                                        <th>N0</th>
                                        <th class="text-center">
                                            <i class="icon-people"></i>
                                        </th>
                                        <th>User Usage</th>
                                        <th>Activity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $increment= 1;
                                        $result= $db->query("SELECT * FROM users");
                                    if ($result->num_rows > 0) {
                                        while($row= $result->fetch_array()){ ?>
                                    <tr>
                                        <td><?php echo  $increment++ ; ?></td>
                                        <td class="text-center">
                                            <div class="avatar">
                                                <?php 
                                                    if(!empty($row["profile_img"])){?>
                                                <img class="img-avatar"
                                                    src="assets/image/users_profile_cover/<?php echo $row["profile_img"] ;?>"
                                                    width="80px" alt="<?php echo $row["email"] ;?>">
                                                <?php }else{?>
                                                <img class="img-avatar" src="assets/image/users_profile_cover/defaultprofileimage.png"
                                                    width="80px" alt="<?php echo $row["email"] ;?>">
                                                <?php } ?>
                                                <span class="avatar-status badge-success"></span>
                                            </div>
                                        </td>
                                        <td id="firstname<?php echo $row["user_id"] ;?>">
                                            <div class="clearfix">
                                                <div class="text-left">
                                                    <span class="small text-muted">
                                                        <?php echo $users->lengths($users->timeAgo($row["date_registry"]));?>
                                                        </span>
                                                    <strong>
                                                        <?php echo $row["firstname"];?>
                                                        <?php echo $row["lastname"];?>
                                                         <?php echo $row["counts_login"] * 100 / 1000 ;?>%
                                                    </strong>
                                                    <span class="small text-muted">Approval</span>
                                                    <small id="approval<?php echo $row["user_id"] ;?>"><?php echo $row["approval"];?></small>
                                                </div>
                                                <div>
                                                    <small
                                                        class="text-muted"><?php echo date('M j, Y',strtotime($row["date_registry"]))." - ".date('M j, Y',strtotime($row["last_login"]));?></small>
                                                        <!-- Jun 11, 2015 - Jul 10, 2015 -->
                                                </div>
                                            </div>
                                            <div class="progress progress-xs mb-2">
                                                <?php echo $users->Users_usage_dashboard($row["counts_login"]) ;?>
                                            </div>
                                            <input type="button" onclick="viewORedits(<?php echo $row['user_id'];?>, 'edit')" value="Edit" class="btn btn-primary">
                                            <input type="button" onclick="viewORedits(<?php echo $row['user_id'];?>, 'view')" value="View" class="btn">
                                            <input type="button" onclick="deleteRow(<?php echo $row['user_id'];?>)" value="Delete" class="btn btn-danger">
                                            <button type="button" name="update_profile_id" id="<?php echo $row['user_id'];?>" class="btn btn-primary update_profile_id" role="button"><span class="fa fa-image"></button>
                                            <input type="button" onclick="approved(<?php echo $row['user_id'];?>, 'off')" value="off" class="btn btn-warning ">
                                            <input type="button" onclick="approved(<?php echo $row['user_id'];?>, 'on')" value="on" class="btn btn-success ">
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <small><?php echo $users->timeAgo($row["last_login"]);?></small>
                                        </td>
                                    </tr>
                                    <?php } }?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h4 class="display-5 mb-2 text-center">EDIT AND DELETE PROPERTIES</h4>

                     <!-- CARD -->
                    
                    <div class="card  mb-3">
                        <div class="card-header">
                            <div class="card-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link  active" href="#Car_For_sale"
                                    data-toggle="tab">Car For sale
                                    <span class="badge badge-primary"><?php echo $house->housecountPOSTS('Car_For_sale');?></span>
                                </a></li>
                                <li class="nav-item"><a class="nav-link" href="#Car_For_rent"
                                    data-toggle="tab">House For rent
                                    <span class="badge badge-primary"><?php echo $house->housecountPOSTS('House_For_rent');?></span>
                                </a></li>
                                <li class="nav-item"><a class="nav-link" href="#Truck_For_sale"
                                    data-toggle="tab">Truck For sale
                                    <span class="badge badge-primary"><?php echo $house->housecountPOSTS('Truck_For_sale');?></span>
                                </a></li>
                                <li class="nav-item"><a class="nav-link" href="#Buses_For_sale"
                                    data-toggle="tab">Buses_For_sale
                                    <span class="badge badge-primary"><?php echo $house->housecountPOSTS('Buses_For_sale');?></span>
                                </a></li>
                                <li class="nav-item"><a class="nav-link" href="#Motorcycle_For_sale"
                                    data-toggle="tab">Motorcycle For sale
                                    <span class="badge badge-primary"><?php echo $house->housecountPOSTS('Motorcycle_For_sale');?></span>
                                </a></li>
                                <li class="nav-item"><a class="nav-link" href="#Bicycle_For_sale"
                                    data-toggle="tab">Bicycle_For_sale
                                    <span class="badge badge-primary"><?php echo $house->housecountPOSTS('Bicycle_For_sale');?></span>
                                </a></li>
                            </ul>
                            <!-- </div> -->
                        </div>
                        <div class="card-body">
                            <div id="responseHouseD"></div>
                            <div class="tab-content">
                                <div class="tab-pane active " id="Car_For_sale">
                                    <?php echo $house->edit_delete_Adminproperty('Car_For_sale'); ?>
                                </div> 
                                <div class="tab-pane" id="Car_For_rent">
                                    <?php echo $house->edit_delete_Adminproperty('Car_For_rent'); ?>
                                </div>
                                <div class="tab-pane" id="Truck_For_sale">
                                <?php echo $house->edit_delete_Adminproperty('Truck_For_sale'); ?>
                                </div>
                                <div class="tab-pane" id="Buses_For_sale">
                                <?php echo $house->edit_delete_Adminproperty('Buses_For_sale'); ?>
                                </div>
                                <div class="tab-pane" id="Motorcycle_For_sale">
                                <?php echo $house->edit_delete_Adminproperty('Motorcycle_For_sale'); ?>
                                </div>
                                <div class="tab-pane" id="Bicycle_For_sale">
                                <?php echo $house->edit_delete_Adminproperty('Bicycle_For_sale'); ?>
                                </div>
                            </div> <!-- /.tab-content -->
                        </div>
                        <div class="card-footer text-muted">
                            <nav class="main-menu">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">Total Vehicle Sold
                                        <span class="badge badge-primary"> <?php echo $users->countPost_sold(); ?></span>
                                    </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Total Vehicle rent
                                        <span class="badge badge-primary"><?php echo $users->countPost_rent(); ?></span>
                                    </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Total Vehicle sale
                                        <span class="badge badge-primary"> <?php echo $users->countPost_sale(); ?></span>
                                    </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Total Vehicle
                                        <span class="badge badge-primary"> <?php echo $users->countPOSTS(); ?></span>
                                    </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                    <h4 class="display-5 mb-2 text-center">MESSAGE SENT BY CLIENT</h4>
                    
                    <div class="card  mb-3">
                        <div class="card-header">
                            <div class="card-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link  active" href="#Sale"
                                        data-toggle="tab">MESSAGE SENT BY CLIENT</a> </li>
                            </ul>
                             <!-- /.card-tools -->
                        </div>
                        <div class="card-body">
                        <div class="tab-content">
                                <div class="tab-pane active " id="Sale">
                                    <?php echo $house->Message_activities(); ?>
                                </div> 
                            </div> <!-- /.tab-content -->
                        </div>
                        <div class="card-footer text-muted">
                            Footer
                        </div>
                    </div>
                    
                    <h4 class="display-5 mb-2 text-center">MESSAGE SENT TO AGENT</h4>
                    
                    <div class="card  mb-3">
                        <div class="card-header">
                            <div class="card-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link  active" href="#Sale"
                                        data-toggle="tab">MESSAGE SENT TO AGENT</a> </li>
                            </ul>
                             <!-- /.card-tools -->
                        </div>
                        <div class="card-body">
                        <div class="tab-content">
                                <div class="tab-pane active " id="Sale">
                                    <?php echo $house->Message_sentToAgentAdmin(); ?>
                                </div> 
                            </div> <!-- /.tab-content -->
                        </div>
                        <div class="card-footer text-muted">
                            Footer
                        </div>
                    </div>

                    <h4 class="display-5 mb-2 text-center">REQUEST FOR ANYTYPE OF HOUSE From Contacts </h4>
                    
                    <div class="card  mb-3">
                        <div class="card-header">
                            <div class="card-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link  active" href="#Sale"
                                        data-toggle="tab">REQUEST FOR HOUSE</a> </li>
                            </ul>
                             <!-- /.card-tools -->
                        </div>
                        <div class="card-body">
                        <div class="tab-content">
                                <div class="tab-pane active " id="Sale">
                                    <?php echo $house->client_request_anyHouse(); ?>
                                </div> 
                            </div> <!-- /.tab-content -->
                        </div>
                        <div class="card-footer text-muted">
                            Footer
                        </div>
                    </div>

                    <h4 class="display-5 mb-2 text-center">Newsletter For Subscribe </h4>
                    
                    <div class="card  mb-3">
                        <div class="card-header">
                            <div class="card-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link  active" href="#newsletter"
                                        data-toggle="tab">EMAIL FOR SUBSCRIPTION</a> </li>
                            </ul>
                             <!-- /.card-tools -->
                        </div>
                        <div class="card-body">
                        <div class="tab-content">
                                <div class="tab-pane active " id="newsletter">
                                    <?php echo $house->newsletter_subscribe(); ?>
                                </div> 
                            </div> <!-- /.tab-content -->
                        </div>
                        <div class="card-footer text-muted">
                            Footer
                        </div>
                    </div>

                </div>

                
                <div class="col-lg-6 col-sm-12">
                <h4 class="display-5 mb-2 text-center">HOUSE ENQUIRE BY CLIENTS</h4>
                    <?php echo $house->propertyView_HomeAdmin('Car_For_sale',1,$user_id); ?>
                    <?php echo $house->carListAdmin('Car_For_sale',1,$user_id); ?>
                </div>

            </div>
        </div>
    </section>
    <!-- Property Section End -->

    <?php include "user_admin.php"?>
    <?php include "admin_message.php"?>
    <?php include "footer.php"?>
