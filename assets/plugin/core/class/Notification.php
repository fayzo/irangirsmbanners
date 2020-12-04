<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
       header('Location: ../../404.html');
 }

class Notification extends House
{
    public function getNotificationCount($user_id)
    {
       $mysqli= $this->database;
       $query="SELECT COUNT(message_id) AS total_agentmessage, (SELECT COUNT(house_id_list) FROM house_watchlist WHERE user_id3_list = $user_id AND status_house ='0' ) AS total_watchlist_house , (SELECT COUNT(message_id) FROM business_message WHERE status=0 ) AS total_business_msg FROM agent_message WHERE user_id3= $user_id AND status= '0' ";
       $result=$mysqli->query($query);
       $data=array();
       while ($row = $result->fetch_assoc()) {
                $data[]= $row;
       }
    //    var_dump($data);
       foreach ($data as $notifiCount) {
           # code...
           return $notifiCount;
       }
    }

    public function getTotal_msgCountExit($user_id)
    {
       $mysqli= $this->database;
       $query="SELECT COUNT(message_id) AS total_agentExitmessage, (SELECT COUNT(house_id_list) FROM house_watchlist WHERE user_id3_list = $user_id ) AS total_watchlist_house_Exit FROM agent_message WHERE user_id3= $user_id ";
       $result=$mysqli->query($query);
       $data=array();
       while ($row = $result->fetch_assoc()) {
                $data[]= $row;
       }
    //    var_dump($data);
       foreach ($data as $notifiCount) {
           # code...
           return $notifiCount;
       }
    }

    public function agent_messagesView($user_id,$message_id)
    {
       $mysqli= $this->database;
       $query="UPDATE agent_message SET status = '1' WHERE user_id3 = $user_id AND status= '0' AND message_id='$message_id' ";
       $result=$mysqli->query($query);
      //  var_dump($result);
    }

    public function business_messageView($message_id)
    {
       $mysqli= $this->database;
       $query="UPDATE business_message SET status = '1' WHERE status= '0' AND message_id='$message_id' ";
       $result=$mysqli->query($query);
    }

    public function house_watchlist($user_id,$house_id)
    {
       $mysqli= $this->database;
       $query="UPDATE house_watchlist SET status_house = '1' WHERE user_id3_list_id = $user_id AND status_house= '0' AND house_id_list = $house_id ";
       $result=$mysqli->query($query);
    }

    public function notifications($user_id)
    {
       $mysqli= $this->database;
       $query="SELECT * FROM notification N 
                        LEFT JOIN users U ON N. notification_from = U. user_id 
                        LEFT JOIN tweets T ON N. target = T. tweet_id
                        LEFT JOIN likes L ON N. target = L. like_on
                        LEFT JOIN follow F ON N. notification_from = F. sender AND N. notification_for = F. receiver 
                        WHERE N. notification_for = $user_id AND N. notification_from != $user_id AND DATE_SUB(CURDATE(),INTERVAL 30 WEEK) <= N. time ORDER BY time Desc";
       $result=$mysqli->query($query);
       $data=array();
        while ($row = $result->fetch_assoc()) {
                 $data[]= $row;
               }
       return $data;
    }

    public function notificationsUnread($user_id)
    {
       $mysqli= $this->database;
       $query="SELECT * FROM notification N 
                        LEFT JOIN users U ON N. notification_from = U. user_id 
                        LEFT JOIN tweets T ON N. target = T. tweet_id
                        LEFT JOIN likes L ON N. target = L. like_on
                        LEFT JOIN follow F ON N. notification_from = F. sender AND N. notification_for = F. receiver 
                        WHERE N. notification_for = $user_id AND N. notification_from != $user_id AND N. status = 0 AND DATE_SUB(CURDATE(),INTERVAL 30 WEEK) <= N. time ORDER BY time Desc";
       $result=$mysqli->query($query);
       $data=array();
        while ($row = $result->fetch_assoc()) {
                 $data[]= $row;
               }
       return $data;
    }

    static public function SendNotifications($get_id,$user_id,$target,$type)
    {
       $mysqli= self::$databases;
       self::createss('notification',array('notification_for' => $get_id, 'notification_from' => $user_id, 'target' => $target, 'type' => $type ,'time' => date('Y-m-d H-i-s')));
    }


}

$notification = new Notification();

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