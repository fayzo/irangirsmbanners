<?php
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

     if(isset($_REQUEST['categories'])) {  
        echo $watch_list->houseWatch_ListHome($_REQUEST['categories'],$_REQUEST['pages'],$_REQUEST['user_id']); 
      }

     if(isset($_POST["actions"]) && !empty($_POST["actions"])){
       if ($_POST["actions"] == 'remove') {
          $productByCode = $users->runQuery("SELECT * FROM house_watchlist WHERE code_house_list='" . $_POST["code"] . "' AND user_id3_list='" . $_POST["user_id"] . "'");
          $itemArray = array($productByCode[0]["code_house_list"]=>array('house_watchlist_id'=>$productByCode[0]["house_watchlist_id"], 'code_house_list'=>$productByCode[0]["code_house_list"]));
        
          // THIS IS TO UPDATE AS 1 TO EDICATE AS HOUSE REMOVE
          $users->delete('house_watchlist',array(
              'house_watchlist_id' =>  $productByCode[0]["house_watchlist_id"], 
          ));
          
              foreach( $itemArray as $k => $v) {
                if($_POST["code"] == $k)
                    unset($_SESSION["housecart_item"][$k]);
                    
                if(empty($_SESSION["housecart_item"]))
                    unset($_SESSION["housecart_item"]);
        			}

        }
    }
?>