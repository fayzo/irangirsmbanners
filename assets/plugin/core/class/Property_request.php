<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
       header('Location: ../../404.html');
 }

class Property_request extends House { 


    public function property_request_pageNavbar($categories,$pages){ ?>

            
        <div class="property-navs border rounded" style="text-align: center;background:#f7f7f7;padding:10px 0 0;margin-bottom: 25px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="main-menus">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#House_For_sale" onclick="property_requestCategories('House_For_sale',1);">House For sale<span class="badge badge-primary"><?php echo $this->property_requestcountPOSTS('House_For_sale');?></span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#House_For_rent" onclick="property_requestCategories('House_For_rent',1);">House For rent<span class="badge badge-primary"><?php echo $this->property_requestcountPOSTS('House_For_rent');?></span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Land_For_sale" onclick="property_requestCategories('Land_For_sale',1);">Land & Plots<span class="badge badge-primary"><?php echo $this->property_requestcountPOSTS('Land_For_sale');?></span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Apartment_For_sale" onclick="property_requestCategories('Apartment_For_sale',1);">Apartment For sale<span class="badge badge-primary"><?php echo $this->property_requestcountPOSTS('Apartment_For_sale');?></span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Apartment_For_rent" onclick="property_requestCategories('Apartment_For_rent',1);">Apartment For rent<span class="badge badge-primary"><?php echo $this->property_requestcountPOSTS('Apartment_For_rent');?></span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#room_For_rent" onclick="property_requestCategories('room_For_rent',1);">Room<span class="badge badge-primary"><?php echo $this->property_requestcountPOSTS('room_For_rent');?></span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Commerce_For_rent" onclick="property_requestCategories('commerce_For_rent',1);">Commerce<span class="badge badge-primary"><?php echo $this->property_requestcountPOSTS('Commerce_For_rent');?></span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Offices_For_rent" onclick="property_requestCategories('Offices_For_rent',1);">Offices<span class="badge badge-primary"><?php echo $this->property_requestcountPOSTS('Offices_For_rent');?></span></a></li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>

    <?php }



    public function property_request_page($categories,$pages){  ?>
    
    <div id="request-hide"> 

        <div class="card card-primary mb-3 ">
                <div class="card-header">
                PROPERTY REQUEST
                </div> <!-- /.card-header -->
                <div class="card-body message-color" style="padding-top: 2px;padding-bottom: 2px;">
                

                    <div class="row">
        <?php 
        $pages= $pages;
        
        if($pages === 0 || $pages < 1){
            $showpages = 0 ;
        }else{
            $showpages = ($pages*10)-10;
        }
        
        $mysqli= $this->database;
        $result =$mysqli->query("SELECT * FROM business_request_home WHERE property_type ='$categories' ORDER BY datetime Desc ,rand()  Limit $showpages,10");
        
        if ($result->num_rows > 0) {
                    while ($user= $result->fetch_array()) { ?>
                        
                                <div class="col-12 px-0 border-bottom">
                                <div class="user-block mb-2 jobHover more"  href="javascript:void()" onclick="business_msg(<?php echo $user['business_request_id'];?>, 'business_request_home')" >
                                    <div class="user-jobImgBorder">
                                            <div class="user-jobImg">
                                                <img src="<?php echo BASE_URL;?>assets/image/users_profile_cover/empty-profile.png" id="house-readmore" data-house="<?php echo $user['house_id']; ?>">
                                            </div>
                                    </div>
                                    <span class="username">
                                    <!-- Job Title:  -->
                                        <a style="padding-right:3px;" href="#"><?php echo $user['name_client'];?></a> 
                                    </span>
                                    <div class="description"><span class="btn-sm btn-success"><?php echo $user['request_type'];?></span> <span class="btn-sm btn-primary"> <?php echo $user['equipment'];?></span></div>
                                    <div class="description"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $user['location'];?></div>
                                    <div class="description"><?php echo $user['bedroom']." ";?><i class="fa fa-bed" aria-hidden="true"></i>  <?php echo $user['bathroom']." ";?><i class="fa fa-bath" aria-hidden="true"></i>
                                        | <?php echo number_format($user['price']);?> <?php echo $user['currency'];?>
                                    </div>
                                    <div class="description">Publish <?php echo $this->timeAgo($user['datetime']);?></div>
                                </div>
                                </div>
                                <hr>
        <?php  } }else{
                     echo ' <div class="col-md-12 col-lg-12"><div class="alert alert-danger alert-dismissible fade show text-center">
                                <button class="close" data-dismiss="alert" type="button">
                                    <span>&times;</span>
                                </button>
                                <strong>No Record</strong>
                            </div></div>'; 
                } ?>

                </div><!-- /.row -->
            </div> <!-- /.card-body -->
        </div><!-- /.card -->

    <?php

            $query1= $mysqli->query("SELECT COUNT(*) FROM business_request_home WHERE property_type ='$categories' ");
            $row_Paginaion = $query1->fetch_array();
            $total_Paginaion = array_shift($row_Paginaion);
            $post_Perpages = $total_Paginaion/10;
            $post_Perpage = ceil($post_Perpages);
            
            
            if($post_Perpage > 1){ ?>
        <nav>
            <ul class="pagination justify-content-center mt-3">
                <?php if ($pages > 1) { ?>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="property_requestCategories('<?php echo $categories; ?>',<?php echo $pages-1; ?>)">Previous</a></li>
                <?php } ?>
                <?php for ($i=1; $i <= $post_Perpage; $i++) { 
                        if ($i == $pages) { ?>
                    <li class="page-item active"><a href="javascript:void(0)"  class="page-link" onclick="property_requestCategories('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                    <?php }else{ ?>
                    <li class="page-item"><a href="javascript:void(0)"  class="page-link" onclick="property_requestCategories('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                <?php } } ?>
                <?php if ($pages+1 <= $post_Perpage) { ?>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="property_requestCategories('<?php echo $categories; ?>',<?php echo $pages+1; ?>)">Next</a></li>
                <?php } ?>
            </ul>
        </nav>
       
        <?php }  ?>
        
    </div><!-- /.house-hide -->
<?php

     }

     public function property_requestcountPOSTS($categories){

        $db =$this->database;
        $sql= $db->query("SELECT COUNT(*) FROM business_request_home WHERE property_type ='$categories' ");
        $row_post = $sql->fetch_array();
        $total_post= array_shift($row_post);
        $array= array(0,$total_post);
        $total_posts= array_sum($array);
        echo $total_posts;
     }

}
$property_request= new Property_request();
?>