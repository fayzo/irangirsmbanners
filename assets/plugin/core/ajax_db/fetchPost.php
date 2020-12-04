<?php 
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['fetchPost']) && !empty($_POST['fetchPost'])) {
    $limit= (int) trim($_POST['fetchPost']);
    // echo  $limit;
    // $posts->tweets($user_id,$limit);
    // $posts_copy->tweets($user_id,$limit);
    // $Posts_copyDraft->tweets($user_id,$limit);
}
?>