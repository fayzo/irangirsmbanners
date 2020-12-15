<?php 
include "core/init.php";

if (isset($_GET['username']) == true && empty($_GET['username']) == false) {
    # code...
    $username= $users->test_input($_GET['username']);
    $uprofileId= $home->usersNameId($username);
	$profileData= $home->userData($uprofileId['user_id']);

   	if ($users->loggedin() == true) {
        $user_id= $_SESSION['key'];
        $user= $home->userData($_SESSION['key']);
        $businessDetails= $home->businessData('1');
        $notific= $notification->getNotificationCount($user_id);
        $Exit_msg= $notification->getTotal_msgCountExit($user_id);

        // $jobs= $home->jobsData($_SESSION['key']);
        // $fundraisingV= $home->fundraisingData($_SESSION['key']);

    }else{
        $user_id= $profileData['user_id'];
        $businessDetails= $home->businessData('1');
	}

	$user= $home->userData($user_id);
	
    if (!isset($profileData['user_id'])) {
        # code...
        header('Location: '.LOGIN.'');
    }
}else{

     if (isset($_SERVER['REQUEST_URI']) == '/twitter_ex/property.index' ||
         isset($_SERVER['REQUEST_URI']) == '/twitter_ex/property.view_all_property' ||
         isset($_SERVER['REQUEST_URI']) == '/twitter_ex/property.property_request'
    ){
        # code...
        $username= $users->test_input('property');
        $uprofileId= $home->usersNameId($username);
        $profileData= $home->userData($uprofileId['user_id']);

        if ($users->loggedin() == true) {
            $user_id= $_SESSION['key'];
            $user= $home->userData($_SESSION['key']);
            $businessDetails= $home->businessData('1');
            $Exit_msg= $notification->getTotal_msgCountExit($user_id);
            $notific= $notification->getNotificationCount($user_id);

            // $jobs= $home->jobsData($_SESSION['key']);
            // $fundraisingV= $home->fundraisingData($_SESSION['key']);

        }else{
            $user_id= $profileData['user_id'];
            $businessDetails= $home->businessData('1');
        }

        $user= $home->userData($user_id);
        
        if (!isset($profileData['user_id'])) {
            # code...
            header('Location: '.LOGIN.'');
        }

    }else{
         header('Location: '.LOGIN.'');
    }

}

echo $house->car_cart_item(); 
?>
