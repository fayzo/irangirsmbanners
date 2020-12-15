<?php
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_REQUEST['sectorcode']) && !empty($_REQUEST['sectorcode'])) {

	$get_cell = mysqli_query($db,"SELECT * FROM  cells WHERE sectorcode ='".$_REQUEST['sectorcode']."'");

	echo "<select name=\"codecell\" id=\"codecell\" class=\"form-control\">" ;
	if(mysqli_fetch_array($get_cell)==0){
		echo "<option value=\"No Cell Available\">No Cell Available</option>";
	}else{
	
	    echo "<option value=\"\">------Select cell------</option>";
		while($row=mysqli_fetch_array($get_cell)){
			echo "<option value=\"".$row['codecell']."\">".$row['nameCell']."</option>";
		}
	}
	echo "</select><br>";

}

if (isset($_POST['car_marque']) && !empty($_POST['car_marque'])) {
	$categories = $_POST['categories'];
	$car_marque= $_POST['car_marque'];
	$pages = $_POST['pages'];
	$user_id = $_POST['user_id'];

	$mysqli= $db;
	$query= $mysqli->query("SELECT * FROM car 
	WHERE categories_car = '{$categories}' and car_marque= '{$car_marque}'");
	$houses = $query->fetch_array();
	
	echo $house->propertyView_SeachSectorNavbar($categories,$car_marque,$pages,$user_id);
	$subect = $houses['categories_car'];
	$replace = " ";
	$searching = "_";
	$category= str_replace($searching,$replace, $subect);
	echo "<div class='text-center h3 text-success'> $category / $houses[car_marque] </div>";
	echo $house->propertyView_SeachSectorList($categories,$car_marque,$pages,$user_id);
} 

if (isset($_POST['car_marque_list']) && !empty($_POST['car_marque_list'])) {

	$categories = $_POST['categories'];
	$car_marque= $_POST['car_marque_list'];
	$pages = $_POST['pages'];
	$user_id = $_POST['user_id'];

	echo $house->propertyView_SeachSectorList($categories,$car_marque,$pages,$user_id);
} 
// echo var_dump($_POST);
?>

	
