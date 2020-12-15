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
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Car_For_sale" onclick="property_requestCategories('Car_For_sale',1);">Car For sale<span class="badge badge-primary"><?php echo $this->property_requestcountPOSTS('Car_For_sale');?></span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Car_For_rent" onclick="property_requestCategories('Car_For_rent',1);">Car For rent<span class="badge badge-primary"><?php echo $this->property_requestcountPOSTS('Car_For_rent');?></span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Truck_For_sale" onclick="property_requestCategories('Truck_For_sale',1);">Truck For sale<span class="badge badge-primary"><?php echo $this->property_requestcountPOSTS('Truck_For_sale');?></span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Buses_For_sale" onclick="property_requestCategories('Buses_For_sale',1);">Buses For sale<span class="badge badge-primary"><?php echo $this->property_requestcountPOSTS('Buses_For_sale');?></span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Motorcycle_For_sale" onclick="property_requestCategories('Motorcycle_For_sale',1);">Motorcycle For sale<span class="badge badge-primary"><?php echo $this->property_requestcountPOSTS('Motorcycle_For_sale');?></span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Bicycle_For_sale" onclick="property_requestCategories('Bicycle_For_sale',1);">Bicycle For sale<span class="badge badge-primary"><?php echo $this->property_requestcountPOSTS('Bicycle_For_sale');?></span></a></li>

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
                VEHICLES REQUEST
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
        $result =$mysqli->query("SELECT * FROM business_request_car WHERE category_type ='$categories' ORDER BY datetime Desc ,rand()  Limit $showpages,10");
        
        if ($result->num_rows > 0) {
                    while ($user= $result->fetch_array()) { ?>
                        
                                <div class="col-12 px-0 border-bottom">
                                <div class="user-block mb-2 jobHover more"  href="javascript:void()" onclick="business_msg(<?php echo $user['business_request_id'];?>, 'business_request_car')" >
                                    <div class="user-jobImgBorder">
                                            <div class="user-jobImg">
                                                <img src="<?php echo BASE_URL;?>assets/image/users_profile_cover/empty-profile.png" id="house-readmore" data-house="<?php echo $user['house_id']; ?>">
                                            </div>
                                    </div>
                                    <span class="username">
                                    <!-- Job Title:  -->
                                        <a style="padding-right:3px;" href="#"><?php echo $user['name_client'];?></a> 
                                    </span>
                                    <div class="description"><span class="btn-sm btn-success">
                                    <?php echo $user['request_type'];?></span> <span class="btn-sm btn-primary"> 
                                    <?php echo $user['car_marque'];?></span></div>
                                    <div class="description"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $user['location'];?></div>
                                    <div class="description"><?php echo number_format($user['price']);?> <?php echo $user['currency'];?>
                                    Publish <?php echo $this->timeAgo($user['datetime']);?></div>
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

            $query1= $mysqli->query("SELECT COUNT(*) FROM business_request_car WHERE category_type ='$categories' ");
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
        $sql= $db->query("SELECT COUNT(*) FROM business_request_car WHERE category_type ='$categories' ");
        $row_post = $sql->fetch_array();
        $total_post= array_shift($row_post);
        $array= array(0,$total_post);
        $total_posts= array_sum($array);
        echo $total_posts;
     }

}
$property_request= new Property_request();
?>