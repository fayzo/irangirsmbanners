<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
       header('Location: ../../404.html');
 }

class Profile_house_agent extends House {

    // THIS IS ONE FOR THE ADMIN AND AGENT IT HAS NO BLACK IN IT

    public function house_Profile_house_agentNavbar($categories,$pages,$user_id){ ?>

            
        <div class="property-navs border rounded" style="text-align: center;background:#f7f7f7;padding:10px 0 0;margin-bottom: 25px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="main-menus">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Car_For_sale" onclick="house_agentCategories('Car_For_sale',1,<?php echo $user_id ; ?>);">Car For sale<span class="badge badge-primary"><?php echo $this->house_Profile_house_agentcountPOSTS('Car_For_sale',$user_id);?></span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Car_For_rent" onclick="house_agentCategories('Car_For_rent',1,<?php echo $user_id ; ?>);">Car For rent<span class="badge badge-primary"><?php echo $this->house_Profile_house_agentcountPOSTS('Car_For_rent',$user_id);?></span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Truck_For_sale" onclick="house_agentCategories('Truck_For_sale',1,<?php echo $user_id ; ?>);">Truck For sale<span class="badge badge-primary"><?php echo $this->house_Profile_house_agentcountPOSTS('Truck_For_sale',$user_id);?></span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Buses_For_sale" onclick="house_agentCategories('Buses_For_sale',1,<?php echo $user_id ; ?>);">Buses For sale<span class="badge badge-primary"><?php echo $this->house_Profile_house_agentcountPOSTS('Buses_For_sale',$user_id);?></span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Motorcycle_For_sale" onclick="house_agentCategories('Motorcycle_For_sale',1,<?php echo $user_id ; ?>);">Motorcycle For sale<span class="badge badge-primary"><?php echo $this->house_Profile_house_agentcountPOSTS('Motorcycle_For_sale',$user_id);?></span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Bicycle_For_sale" onclick="house_agentCategories('Bicycle_For_sale',1,<?php echo $user_id ; ?>);">Bicycle For sale<span class="badge badge-primary"><?php echo $this->house_Profile_house_agentcountPOSTS('Bicycle_For_sale',$user_id);?></span></a></li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>

    <?php }


                    
    // THIS IS ONE FOR HOME IT HAVE BEST LAYOUT FOR HOUSE IT DOESN'T HAVE BANNER AND PRICE DISCOUNT

    public function house_Profile_house_agentHome($categories,$pages,$user_id)
    {
        $pages= $pages;
        $categories= $categories;
        
        if($pages === 0 || $pages < 1){
            $showpages = 0 ;
        }else{
            $showpages = ($pages*9)-9;
        }
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM car H
            Left JOIN provinces P ON H. province = P. provincecode
            Left JOIN districts M ON H. districts = M. districtcode
            Left JOIN sectors T ON H. sector = T. sectorcode
            Left JOIN cells C ON H. cell = C. codecell
            Left JOIN vilages V ON H. village = V. CodeVillage 
            Left JOIN car_watchlist W ON H. car_id= W. car_id_list 
        WHERE H. categories_car ='$categories' AND H. user_id3 = '$user_id' ORDER BY rand(),created_on3 Desc Limit $showpages,10");
        ?>
    
        <div id="house-hide" class="property-list"> 
        
        <div class="tab-content">
        <div class="active tab-pane" id="<?php echo $categories; ?>">

        <div class="row">
        
        <?php 
            if ($query->num_rows > 0) {

                while ($car = $query->fetch_array()) {   ?>

        <div class="col-md-4 col-lg-4">
        <span id="response_msg_watchlist" ></span>
        <div class="single_property bg-light" id="response_hide_watchlist<?php echo $car['code']; ?>">
            <div class="property_thumb">
                <?php if ($car['buy'] == "sale") { ?>
                    <div class="property_tag">
                            For Sale
                    </div>
                    <?php }else if ($car['buy'] == "rent") { ?>
                        <div class="property_tag bg-success">
                                For Rent
                        </div>
                    <?php }else {  ?>
                        <div class="property_tag red">
                                Sold
                        </div>
                <?php } ?>
                <?php 
                // echo $this->banner($car['banner']) ;
                        $file = $car['photo']."=".$car['other_photo'];
                                        $expode = explode("=",$file);  ?>
                <img src="<?php echo BASE_URL.'uploads/car/'.$expode[0]; ?>" id="car-readmore" data-car="<?php echo $car['car_id']; ?>">
            </div>
            <div class="property_content">
                <div id="response<?php echo $car['car_id']; ?>"></div>
                <div class="main_pro">
                        <?php echo $this->edit_delete_car($user_id,$car['user_id3'],$car['car_id']); ?>
                        <h3><a href="javascript:void(0)" id="car-readmore" data-car="<?php echo $car['car_id']; ?>">
                                <?php 
                                    $subect = $car['categories_car'];
                                    $replace = " ";
                                    $searching = "_";
                                    echo str_replace($searching,$replace, $subect);
                                    ?>
                        </a>
                        <span class="h6 text-success text-uppercase ml-2"><?php echo $car['car_marque']; ?></span>
                        </h3>
                        <div class="mark_pro">
                            <!-- <img src="<?php echo BASE_URL; ?>assets/icon/svg_icon/location.svg" alt=""> -->
                            <span>
                            <a class="properties-location" href="javascript:void(0)" id="car-readmore" data-car="<?php echo $car['car_id']; ?>" ><i class="icon_pin"></i>
                            <?php echo $car['namedistrict']; ?> / 
                            <?php echo $car['namesector']; ?>
                            </a></span>
                        </div>
                        <span class="amount">
                            From:<span class="room-price price-change"> <?php echo $this->nice_number(number_format($car['price'])); ?> Frw
                            <?php  echo (substr($car['categories_car'],-4) == 'sale')? '':'/month';?>
                            </span>
                            <?php if($car['price_discount'] != 0){ ?>
                                
                            <div class="text-danger price-change" style="text-decoration: line-through;">
                            <?php echo number_format($car['price_discount']); ?> Frw </div><?php } ?>
                        </span>
                        <?php if(isset($_SESSION['key'])){ 
                            
                            if($car['user_id3_list'] != $user_id && $car['car_id_list'] != $car['car_id']  ){ 
                                
                                    if($_SESSION['key'] == $car['user_id3']   ){ ;?>
                                    <div class="text-muted clear-right" style="padding-bottom: 10px;">
                                        <form method="post" id="form-housecartitem<?php echo $car['code']; ?>remove"  class="float-right" >
                                                <input type="hidden" style="width:30px;" name="user_id" value="<?php echo $car['user_id3_list']; ?>" />
                                                <input type="hidden" style="width:30px;" name="car_id" value="<?php echo $car['car_id']; ?>" />
                                                <input type="hidden" style="width:30px;" name="code" value="<?php echo $car['code']; ?>" />
                                                <input type="hidden" style="width:30px;" name="actions" value="remove" />
                                                <button type="button"  onclick="xxda_prof_house_agent_delete('remove','<?php echo 'form-housecartitem'.$car['code'].'remove'; ?>','<?php echo $car['code']; ?>');"  class="btn btn-outline-danger btn-sm " ><img src="<?php echo BASE_URL_LINK ;?>image/img/icon-delete.png" alt="Remove Item" /> Remove</button> 
                                                <!-- onclick="xxda_prof_house_agent_delete -->
                                        </form>
                                    </div>
                                <?php }else{ ?>
                                    <div class="text-muted clear-right" style="padding-bottom: 10px;">
                                        <form method="post" id="form-housecartitem<?php echo $car['code']; ?>add" class="float-right">
                                            <div style="display:inline-flex;" >
                                                <input type="hidden" style="width:30px;" name="user_id" value="<?php echo $_SESSION['key']; ?>" />
                                                <input type="hidden" style="width:30px;" name="actions" value="add" />
                                                <input type="hidden" style="width:30px;" name="code" value="<?php echo $car['code']; ?>" />
                                                <input type="hidden" class="form-control form-control-sm text-center mr-2" style="width:30px;" name="quantitys" value="1" size="2" readonly/>
                                                <input type="button" onclick="xxda('add','<?php echo 'form-housecartitem'.$car['code'].'add'; ?>','<?php echo $car['code']; ?>');" value="Add to WatchList" class="btn btn-outline-success btn-sm " />
                                            </div>
                                        </form>
                                    </div>
                                <?php } ?>
                        <?php }else{ ?>
                        <div class="text-muted clear-right" style="padding-bottom: 10px;">
                                <form method="post" id="form-housecartitem<?php echo $car['code']; ?>remove"  class="float-right" >
                                        <input type="hidden" style="width:30px;" name="user_id" value="<?php echo $car['user_id3_list']; ?>" />
                                        <input type="hidden" style="width:30px;" name="car_id" value="<?php echo $car['car_id']; ?>" />
                                        <input type="hidden" style="width:30px;" name="code" value="<?php echo $car['code']; ?>" />
                                        <input type="hidden" style="width:30px;" name="actions" value="remove" />
                                        <button type="button"  onclick="xxda_watch_list_delete('remove','<?php echo 'form-housecartitem'.$car['code'].'remove'; ?>','<?php echo $car['code']; ?>');"  class="btn btn-outline-danger btn-sm " ><img src="<?php echo BASE_URL_LINK ;?>image/img/icon-delete.png" alt="Remove Item" /> Remove on <br> Watch-list</button> 
                                        <!-- onclick="xxda_prof_house_agent_delete -->
                                </form>
                        </div>
                        <?php } } ;?>

                </div>
            <div> Publish <?php echo $this->timeAgo($car['created_on3']); ?></div>
            </div>
            <div class="footer_pro">
                <!-- <ul>
                    <li>
                        <div class="single_info_doc">
                            <img src="< ?php echo BASE_URL; ?>assets/icon/svg_icon/bed.svg" alt="">
                            <span>< ?php echo $car['bedroom']; ?> Bed</span>
                        </div>
                    </li>
                    <li>
                        <div class="single_info_doc">
                            <img src="< ?php echo BASE_URL; ?>assets/icon/svg_icon/bath.svg" alt="">
                            <span>< ?php echo $car['bathroom']; ?>  Bath</span>
                        </div>
                    </li>
                    <li>
                        <div class="single_info_doc">
                        <i class="fa fa-car"></i>
                            <img src="< ?php echo BASE_URL; ?>assets/icon/svg_icon/car.png" alt=""> 
                            <span>< ?php echo $car['car_in_garage']; ?>  car</span>
                        </div>
                    </li>
                </ul> -->
            </div>
        </div>
        <!-- single_property -->
        </div>
    <!-- col -->

    <?php } }else{
                     echo ' <div class="col-md-12 col-lg-12"><div class="alert alert-danger alert-dismissible fade show text-center">
                                <button class="close" data-dismiss="alert" type="button">
                                    <span>&times;</span>
                                </button>
                                <strong>No Record</strong>
                            </div></div>'; 
                }
                    $query1= $mysqli->query("SELECT COUNT(*) FROM car WHERE categories_car ='$categories'and user_id3= $user_id ");
                    $row_Paginaion = $query1->fetch_array();
                    $total_Paginaion = array_shift($row_Paginaion);
                    $post_Perpages = $total_Paginaion/10;
                    $post_Perpage = ceil($post_Perpages); ?> 
    </div>
    </div>
    </div>

        <?php if($post_Perpage > 1){ ?>
        <nav>
            <ul class="pagination justify-content-center mt-3">
                <?php if ($pages > 1) { ?>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="house_agentCategories('<?php echo $categories; ?>',<?php echo $pages-1; ?>,<?php echo $user_id ; ?>)">Previous</a></li>
                <?php } ?>
                <?php for ($i=1; $i <= $post_Perpage; $i++) { 
                        if ($i == $pages) { ?>
                    <li class="page-item active"><a href="javascript:void(0)"  class="page-link" onclick="house_agentCategories('<?php echo $categories; ?>',<?php echo $i; ?>,<?php echo $user_id ; ?>)" ><?php echo $i; ?> </a></li>
                    <?php }else{ ?>
                    <li class="page-item"><a href="javascript:void(0)"  class="page-link" onclick="house_agentCategories('<?php echo $categories; ?>',<?php echo $i; ?>,<?php echo $user_id ; ?>)" ><?php echo $i; ?> </a></li>
                <?php } } ?>
                <?php if ($pages+1 <= $post_Perpage) { ?>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="house_agentCategories('<?php echo $categories; ?>',<?php echo $pages+1; ?>,<?php echo $user_id ; ?>)">Next</a></li>
                <?php } ?>
            </ul>
        </nav>
        <?php } 
  
    echo '  </div>';
    }
    
    public function house_Profile_house_agentcountPOSTS($categories,$user_id)
    {
        $db =$this->database;
        $sql= $db->query("SELECT COUNT(*) FROM car WHERE categories_car ='$categories' and user_id3 = '$user_id' ");
        $row_post = $sql->fetch_array();
        $total_post= array_shift($row_post);
        $array= array(0,$total_post);
        $total_posts= array_sum($array);
        echo $total_posts;
    }

} 

$profile_house_agent = new Profile_house_agent();

/*
===========================================
         Notice
===========================================
# You are free to run the software as you wish
# You are free to help yourself study the source code and change to do what you wish
# You are free to help your neighbor copy and distribute the software
# You are free to help community create and distribute modified version as you wish

We promote Open Source Software by educating developers (Beginners)
use PHP Version 5.6.1 > 7.3.20  
===========================================
         For more information contact
=========================================== 
Kigali - Rwanda
Tel : (250)787384312 / (250)787384312
E-mail : shemafaysal@gmail.com

*/

?>