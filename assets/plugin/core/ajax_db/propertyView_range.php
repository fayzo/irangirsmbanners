<?php
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if(isset($_POST['price_range'])){
    $user_id= $_POST['user_id'];
    $pages = $_POST['pages'];
    // var_dump($_POST['price_range']);
    // $vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
    // $vowels = array("[", "]", "$");
    // $priceRange= str_replace($vowels,"", $_POST['price_range']);
    // var_dump(explode('-',$priceRange));
    if($pages === 0 || $pages < 1){
        $showpages = 0 ;
    }else{
        $showpages = ($pages*10)-10;
    }
    
    //Include database configuration file
    $priceRange= $_POST['price_range'];
    //set conditions for filter by price range
    $whereSQL = $orderSQL = '';
    if(!empty($priceRange)){
        $vowels = array("[", "]",",","Frw");
        // $vowels = array("[", "]","Frw");
        $priceRangeArr_= str_replace($vowels,"", $priceRange);
        $priceRangeArr= explode('-',$priceRangeArr_);
        $whereSQL = "WHERE price BETWEEN '".$priceRangeArr[0]."' AND '".$priceRangeArr[1]."'";
        $orderSQL = " ORDER BY price ASC ,rand() Desc Limit $showpages,10";
    }else{
        $orderSQL = " ORDER BY created DESC ,rand() Desc Limit $showpages,10";
    }
    
    //get product rows
    $query = $db->query("SELECT * FROM car H
            Left JOIN provinces P ON H. province = P. provincecode
            Left JOIN districts M ON H. districts = M. districtcode
            Left JOIN sectors T ON H. sector = T. sectorcode
            Left JOIN cells C ON H. cell = C. codecell
            Left JOIN vilages V ON H. village = V. CodeVillage 
            Left JOIN users U ON H. user_id3 = U. user_id 
            Left JOIN car_watchlist W ON H. car_id = W. car_id_list 
            $whereSQL $orderSQL"); 
            
    
    if($query->num_rows > 0){
        $priceRangeArr_= number_format($priceRangeArr[0]);
        $priceRangeArrs= number_format($priceRangeArr[1]);
        echo "<h4 style='padding: 0px 10px;text-align:center;'>FROM <span style='color:black;'> $priceRangeArr_ Frw </span> TO <span style='color:black;'> $priceRangeArrs Frw</span> </h4> "; 
        ?>
         <?php  if ($query->num_rows > 0 ) {  ?>
                <div class="timeline row">

            <?php 
                while ($car = $query->fetch_array()) { ?>
                <div class="single-property-item col-md-6"  id="response_hide_watchlist<?php echo $car['code']; ?>">

                <?php echo $house->buychangesColor($car['buy']); ?>
                <!-- <i class="bg-success text-light require" >Sale </i> -->
                <i class="fa fa-user"></i>

                <?php if($car['discount'] != 0){ ?>
                <?php echo $house->PercentageDiscount($car['discount']); ?>
                <?php }else { echo ''; ?>
                    <!-- <span class="bg-info text-light" > 0% </span>  -->
                <?php } ?>

                <div class="row timeline-item">

                    <div class="col-md-12 px-0">
                        <div class="property-pic">
                            <?php echo $house->banner($car['banner']) ;
                                        $file = $car['photo']."=".$car['other_photo'];
                                        $expode = explode("=",$file);  ?>
                            <img class="propertyPicture" id="car-readmore" data-car="<?php echo $car['car_id']; ?>" src="<?php echo BASE_URL.'uploads/car/'.$expode[0]; ?>" alt="">
                        </div>

                        <?php if ($car['buy'] == 'sold') { ?>
                            <div class="property-text photo_word"
                                style="background: url('<?php echo BASE_URL.'assets/image/background_image/sold.png'; ?>')no-repeat center center;
                                    background-size:cover;height:100%;width:100%">
                        <?php }else {
                            # code...
                            echo ' 
                            <div class="property-text photo_word" >
                            ';
                        } ?>

                            <?php echo $house->edit_delete_car($user_id,$car['user_id3'],$car['car_id']); ?>
                            <h5 class="r-title" style="display: inline-block;">
                            <i class="fa fa-home" aria-hidden="true"></i>
                                <?php 
                                $subect = $car['categories_car'];
                                $replace = " ";
                                $searching = "_";
                                echo str_replace($searching,$replace, $subect);
                                ?>
                            </h5> |

                            <span class="h6 text-success text-uppercase ml-2"><?php echo $car['car_marque']; ?></span>
                        
                            <div> From:<span class="room-price price-change"> <?php echo $house->nice_number(number_format($car['price'])); ?> Frw
                                <?php  echo (substr($car['categories_car'],-4) == 'sale')? '':'/month';?>
                                </span>
                                <?php if($car['price_discount'] != 0){ ?>
                                    
                                <span class="text-danger price-change" style="text-decoration: line-through;">
                                <?php echo number_format($car['price_discount']); ?> Frw </span> <?php } ?>
                            </div>

                            <!-- <div class="s-text">For Sale</div> -->
                        
                            <?php if(isset($_SESSION['key'])){ if($car['user_id3_list'] != $user_id && $car['car_id_list'] != $car['car_id']  ){ ;?>
                            <div class="text-muted clear-right" >
                                    <form method="post" id="form-housecartitem<?php echo $car['code']; ?>add" class="float-right">
                                        <div style="display:inline-flex;" >
                                            <input type="hidden" style="width:30px;" name="user_id" value="<?php echo $user_id; ?>" />
                                            <input type="hidden" style="width:30px;" name="actions" value="add" />
                                            <input type="hidden" style="width:30px;" name="code" value="<?php echo $car['code']; ?>" />
                                            <input type="hidden" class="form-control form-control-sm text-center mr-2" style="width:30px;" name="quantitys" value="1" size="2" readonly/>
                                            <input type="button" onclick="xxda('add','<?php echo 'form-housecartitem'.$car['code'].'add'; ?>','<?php echo $car['code']; ?>');" value="Add to WatchList" class="btn btn-outline-success btn-sm " />
                                        </div>
                                    </form>
                                </div>
                            <?php }else{ ;?>
                            <div class="text-muted clear-right" >
                                    <form method="post" id="form-housecartitem<?php echo $car['code']; ?>remove"  class="float-right" >
                                            <input type="hidden" style="width:30px;" name="user_id" value="<?php echo $car['user_id3_list']; ?>" />
                                            <input type="hidden" style="width:30px;" name="car_id" value="<?php echo $car['car_id']; ?>" />
                                            <input type="hidden" style="width:30px;" name="code" value="<?php echo $car['code']; ?>" />
                                            <input type="hidden" style="width:30px;" name="actions" value="remove" />
                                            <button type="button"  onclick="xxda_watch_list_delete('remove','<?php echo 'form-housecartitem'.$car['code'].'remove'; ?>','<?php echo $car['code']; ?>');"  class="btn btn-outline-danger btn-sm " ><img src="<?php echo BASE_URL_LINK ;?>image/img/icon-delete.png" alt="Remove Item" /> Remove on <br> Watch-list</button> 
                                    </form>
                            </div>
                            <?php } } ;?>
                        
                            <a class="properties-location"  href="javascript:void(0)" id="car-readmore" data-car="<?php echo $car['car_id']; ?>" ><i class="icon_pin"></i>
                            <!-- < ?php echo $car['provincename']; ?> /  -->
                            <?php echo $car['namedistrict']; ?> District/ 
                            <?php echo $car['namesector']; ?> Sector
                            <!-- < ?php echo $car['nameCell']; ?> Cell  -->
                            </a>
                        </div>   

                    </div>
                    <!-- col- -->
                    <div class="col-md-12">
                    <div id="response<?php echo $car['car_id']; ?>"></div>
                    </div>
                </div>

                <div class="row  timeline-item">
                    <div class="col-lg-12 p-0">
                        <div class="card  collapsed-box">
                            <div class="card-header" style="padding: 5px 10px;">
                                <div class="card-tools pull-right">

                                <?php if ($car['user_id3'] == isset($_SESSION['key'])) { ?>

                                    <!-- <button type="button"  class="btn btn-box-tool" data-widget="collapse">
                                        <i class="fa fa-plus"></i>
                                    </button> -->
                                    <button type="button"  data-target="#a<?php echo $car['car_id'];?>" data-toggle="collapse" class="btn btn-box-tool" >
                                        <i class="fa fa-plus"></i>
                                    </button>
                                <?php } ?>

                                </div>
                                <div class="user-block">
                                    <div class="user-blockImgBorder">
                                        <div class="user-blockImg">
                                            <?php if (!empty($car['profile_img'])) { ?>
                                                <img src="<?php echo BASE_URL_LINK."image/users_profile_cover/".$car['profile_img']; ?>" alt="User Image">
                                            <?php  }else{ ?>
                                                <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE;?>" alt="User Image">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <span class="username tooltips">
                                        <a href="<?php  echo BASE_URL.$car['username'] ;?>"> <?php echo $car['lastname']; ?></a>
                                    </span>
                                    <span class="description">Shared public - <?php echo $house->timeAgo($car['created_on3']); ?></span>
                                </div>
                                <?php if ($car['user_id3'] != isset($_SESSION['key'])) { ?>
                                    <a href="javascript:void(0)" 
                                        id="contacts_agent" data-user="<?php echo $car['user_id'];?>"
                                        class="btn btn-sm bg-teal">
                                            <i class="fas fa-comments"></i> Message  
                                    </a>
                                <?php }else { ?>
                                    <a href="<?php echo VIEW_MESSAGE; ?>" class="btn btn-sm bg-teal">
                                    <i class="fas fa-eye"></i>  Message  
                                        <?php  if($user_id == $car['user_id3']){  
                                            echo $house->CountsCommentToAgent($car['car_id']);
                                        } ?>
                                    </a>
                                <?php } ?>
                                For Request this vehicle
                            </div>
                            <!-- <div class="card-body p-0" > -->
                                <!-- this is for collapse use body javascript -->
                            <div class="card collapse" id="a<?php echo $car['car_id'];?>" >
                                <?php  
                                if($user_id == $car['user_id3']){  
                                    $house->commentsToAgent($car['car_id']);
                                } ?>
                            </div>
                            <!-- </div> -->
                        </div>
                        
                    </div>
                </div>
                </div>

                        <!-- END timeline item -->
                <?php } ?>

                <!-- END timeline item -->
                <div class="single-property-item col-md-6">
                    <i class="fa fa-clock-o bg-info text-light"></i>
                </div>
                <div class="single-property-item col-md-6">
                    <i class="fa fa-clock-o bg-info text-light"></i>
                </div>
            </div>

                    <!-- END timeline item -->
            <?php }
                    
                    $query1= $db->query("SELECT COUNT(*) FROM car $whereSQL");
                    $row_Paginaion = $query1->fetch_array();
                    $total_Paginaion = array_shift($row_Paginaion);
                    $post_Perpages = $total_Paginaion/10;
                    $post_Perpage = ceil($post_Perpages); ?> 
        
        <?php if($post_Perpage > 1){ ?>
         <nav>
             <ul class="pagination justify-content-center mt-3">
                 <?php if ($pages > 1) { ?>
                     <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="houseRangeLayout('<?php echo $priceRange; ?>',<?php echo $pages-1; ?>,<?php echo $user_id; ?>)">Previous</a></li>
                 <?php } ?>
                 <?php for ($i=1; $i <= $post_Perpage; $i++) { 
                         if ($i == $pages) { ?>
                      <li class="page-item active"><a href="javascript:void(0)"  class="page-link" onclick="houseRangeLayout('<?php echo $priceRange; ?>',<?php echo $i; ?>,<?php echo $user_id; ?>)" ><?php echo $i; ?> </a></li>
                      <?php }else{ ?>
                     <li class="page-item"><a href="javascript:void(0)"  class="page-link" onclick="houseRangeLayout('<?php echo $priceRange; ?>',<?php echo $i; ?>,<?php echo $user_id; ?>)" ><?php echo $i; ?> </a></li>
                 <?php } } ?>
                 <?php if ($pages+1 <= $post_Perpage) { ?>
                     <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="houseRangeLayout('<?php echo $priceRange; ?>',<?php echo $pages+1; ?>,<?php echo $user_id; ?>)">Next</a></li>
                 <?php } ?>
             </ul>
         </nav>
        <?php } 

    }else{
        $priceRangeArr_= number_format($priceRangeArr[0]);
        $priceRangeArrs= number_format($priceRangeArr[1]);
        echo "<h4 style='padding: 0px 10px;text-align:center;'>FROM <span style='color:black;'> $priceRangeArr_ Frw </span> TO <span style='color:black;'> $priceRangeArrs Frw</span> </h4> "; 
        echo 'House(s) not found';
        // echo 'Product(s) not found';
    }

}


?>