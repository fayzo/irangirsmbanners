<?php 
session_start();

include('database/db.php');
include('class/Users.php');
include('class/Home.php');
include('class/House.php');
include('class/Notification.php');
include('class/Watchlist.php');
include('class/Profile_house_agent.php');
include('class/Property_request.php');

// define('BASE_URL','https://iragiro.com/');
define('BASE_URL','http://localhost/car_sm_banner/');
define('HOME', BASE_URL.'index.php');
define('BASE_URL_LINK', BASE_URL.'assets/');
define('LOGIN', BASE_URL.'includes/login.php');
define('LOGOUT', BASE_URL.'includes/logout.php');
define('ADMIN', BASE_URL.'admin.php');

// UPLOAD PHOTO
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'].'/car_sm_banner');
// UPLOAD PHOTO
// (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off')? 'https' : 'http';
// echo  $_SERVER['SERVER_NAME'];
// echo  $_SERVER['REQUEST_URI'];

// THIS IS HOUSE LINK
define('F_INDEX', BASE_URL.'property.home');
define('F_PROPERTY_REQUEST', BASE_URL.'property.property_request');
define('F_VIEW_ALL_PROPERTY', BASE_URL.'property.view_all_property');

// THIS IS HOUSE LINK
// define('PROFILE', BASE_URL.'profile');
define('PROFILE_EDIT', BASE_URL.'profile_edit');
define('VIEW_MESSAGE', BASE_URL.'message');
define('WATCH_LIST', BASE_URL.'watchlist');
define('PROPERTY_REQUEST', BASE_URL.'property_request');
define('VIEW_ALL_PROPERTY', BASE_URL.'view_all_property');
define('SETTING', BASE_URL.'settings.php');
// END HOUSE LINK

// TWITTER SOCIAL MEDIA 
define('TWITTER', 'https://twitter.com/');
define('INSTAGRAM', 'https://www.instagram.com/');
define('FACEBOOK', 'https://www.facebook.com/');
define('GOOGLE_PLUS', 'https://www.google.com/');
define('MAIL', 'https://www.mail.com/');

// TWITTER SOCIAL MEDIA 

// DEFAULT IMAGE USERS 
define( 'NO_PROFILE_IMAGE', 'image/users_profile_cover/empty-profile.png');
define( 'NO_PROFILE_IMAGE_URL', 'assets/image/user_default_image/defaultprofileimage.png');
define( 'NO_COVER_IMAGE_URL', 'assets/image/user_default_image/defaultCoverImage.png');
define( 'COVER_IMAGE_URL', 'image/img/vision-city-rwanda.jpg');







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