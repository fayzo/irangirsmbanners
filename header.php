<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iragiro House</title>
    <!-- favicon must be with index website to compress it is /favicon.io/favicon.cc-->
	<!-- <link rel="icon"  type="image/png" href="< ?php echo BASE_URL;?>assets/image/img/partner/partner-4.png" size"32x32" > -->
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png"> -->
     <!-- Google Font -->
     <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

	<!-- Css Styles -->
	<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/login.css" >
    <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/plugin/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/dataTables.bootstrap4.min.css" type="text/css" >
    <!-- <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/responsive.bootstrap4.min.css" type="text/css" > -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/timeline.css" type="text/css">
	<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/imagePopup.css" type="text/css">
	<!-- <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/jquery.range.css" type="text/css"> -->
    <link rel="stylesheet" href="<?php echo BASE_URL_LINK ;?>css/ui.totop.css" >
	<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/profile.css" type="text/css">

    <script type="text/javascript">
    
    function showResult(){
		var provincecode=document.getElementById('provincecode').value;
		var params = "&provincecode="+provincecode+"";
		http=new XMLHttpRequest();
		http.open("POST","core/ajax_db/getdistrict.php",true);
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		http.send(params);
		http.onreadystatechange = function() 
		{//Call a function when the province changes.
			
		document.getElementById("districtcode").innerHTML= http.responseText;
				
		if(document.getElementById('districtcode').value!=="No District Available")
		document.form.name.disabled=false;
		
		}		
	}
	    
		
	    //Get sectors list
		function showResult2(){
		var districtcode=document.getElementById('districtcode').value;
		var params = "&districtcode="+districtcode+"";
		http=new XMLHttpRequest();
		http.open("POST","core/ajax_db/getsector.php",true);
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		http.send(params);
		http.onreadystatechange = function() 
		{//Call a function when the district changes.
			
		document.getElementById("sectorcode").innerHTML=http.responseText;
				
		if(document.getElementById('sectorcode').value!=="No Sector Available")
		document.form.name.disabled=false;
		
		}		
	}
	
    // //Get cell list
    // function showResult3(){
	// 	var sectorcode=document.getElementById('sectorcode').value;
	// 	var params = "&sectorcode="+sectorcode+"";
	// 	http=new XMLHttpRequest();
	// 	http.open("POST","core/ajax_db/getcell.php",true);
	// 	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	// 	http.send(params);
	// 	http.onreadystatechange = function() 
	// 	{//Call a function when the sector changes.
			
	// 	document.getElementById("codecell").innerHTML=http.responseText;
				
	// 	if(document.getElementById('codecell').value!=="No Cell Available")
	// 	document.form.name.disabled=false;
		
	// 	}		
    // }

    //Get cell list
    function showResult3_search(){
        $('#loader').show();
        var pages = 1;
        var user_id = document.getElementById('user_id').value;
        var province = document.getElementById('provincecode').value;
        var district = document.getElementById('districtcode').value;
        var sector = document.getElementById('sectorcode').value;
        var categories = document.getElementById('type_Property_select').value;
        var params = '&pages='+pages+'&categories='+categories+'&province='+province+'&district='+district+'&sector='+sector+'&user_id='+user_id;
		http=new XMLHttpRequest();
		http.open("POST","core/ajax_db/getcell.php",true);
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		http.send(params);
		http.onreadystatechange = function() 
		{//Call a function when the sector changes.
		// document.getElementById("codecell").innerHTML=http.responseText;
		// if(document.getElementById('codecell').value!=="No Cell Available")
                setTimeout(() => {
                    $('#loader').fadeOut();
                }, 1000);
                // $(window).scrollTop(0);
                $('html,body').animate({scrollTop:100},'slow');
                var pagination = document.getElementById('house_hidden');
                pagination.innerHTML = http.responseText;
		        document.form.name.disabled=false;
		
		}		
	}
  
    // THIS IS FOR PAGINATION PAGES

    function houseCategoriesHomeSearch(categories,car_marque,pages,user_id) {
        $('#loader').show();
        var params = '&pages=' + pages +'&categories='+categories+'&car_marque='+car_marque+'&user_id='+user_id;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'core/ajax_db/getcell.php',true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send(params);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                setTimeout(() => {
                    $('#loader').fadeOut();
                }, 1000);
                // $(window).scrollTop(0);
                $('html,body').animate({scrollTop:100},'slow');
                var pagination = document.getElementById('house-hide');
                pagination.innerHTML = xhr.responseText;
            }
        };
    }
	
    // THIS IS FOR CATEGORIES PROPERTY SEARCH SECTOR
	
    function houseCategories_SeachSector(categories,car_marque,user_id,pages) {
        $('#loader').show();
        var params = '&pages=' + pages +'&categories='+categories+'&car_marque_list='+car_marque+'&user_id='+user_id;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'core/ajax_db/getcell.php',true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send(params);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                setTimeout(() => {
                    $('#loader').fadeOut();
                }, 1000);
                // $(window).scrollTop(0);
                $('html,body').animate({scrollTop:100},'slow');
                var pagination = document.getElementById('house-hide');
                pagination.innerHTML = xhr.responseText;
            }
        };
    }

    
    // THIS IS FOR FOOTER SEARCH SECTOR HOUSE

    function houseCategoriesFooter_SeachSector(categories,car_marque,pages,user_id){
        $('#loader').show();
        var params = '&pages='+pages+'&categories='+categories+'&car_marque='+car_marque+'&user_id='+user_id;
		http=new XMLHttpRequest();
		http.open("POST","core/ajax_db/getcell.php",true);
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		http.send(params);
		http.onreadystatechange = function() {
            //Call a function when the sector changes.
		// document.getElementById("codecell").innerHTML=http.responseText;
		// if(document.getElementById('codecell').value!=="No Cell Available")
        // $('html,body').animate({scrollTop:0},0);
        // $('html,body').animate({scrollTop:0},'slow');
                setTimeout(() => {
                    $('#loader').fadeOut();
                }, 1000);
                // $(window).scrollTop(0);
                $('html,body').animate({scrollTop:100},'slow');
                var pagination = document.getElementById('house_hidden');
                pagination.innerHTML = http.responseText;
		        // document.form.name.disabled=false;
		
		}		
	}
  
	
		
	// Get Villages list
    function showResult4(){
		var codecell=document.getElementById('codecell').value;
		var params = "&codecell="+codecell+"";
		http=new XMLHttpRequest();
		http.open("POST","core/ajax_db/getvillage.php",true);
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		http.send(params);
		http.onreadystatechange = function() 
		{
            // Call a function when the cell changes.
			
		document.getElementById("CodeVillage").innerHTML=http.responseText;
				
		if(document.getElementById('CodeVillage').value!=="No village Available")
		document.form.name.disabled=false;
		
		}		
	}
	
    function houseCategories(categories,id,user_id) {
        $('#loader').show();
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'core/ajax_db/houseView_FecthPaginat.php?pages=' + id + '&categories=' + categories + '&user_id=' + user_id, true);
        xhr.send();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                 // $('html,body').animate({scrollTop:0},0);
                // $('html,body').animate({scrollTop:0},'slow');
                setTimeout(() => {
                    $('#loader').fadeOut();
                }, 1000);
                // $(window).scrollTop(0);
                $('html,body').animate({scrollTop:0},'slow');
                var pagination = document.getElementById('house-hide');
                pagination.innerHTML = xhr.responseText;

            }
        };
          xhr.addEventListener('progress',function(e){
             var progress= Math.round((e.loaded/e.total)*100);
             $('.progress-navbar').show();
             $('#progress_width').css('width',progress +'%');
             $('#progress_width').html(progress +'%');
         }, false);

        xhr.addEventListener('load', function (e) { 
            $('.progress-bar').removeClass('bg-info').addClass('bg-danger').html('<span> completed  <span class="fa fa-check"></span></span>');
            setInterval(function () {
                $(".progress-navbar").fadeOut();
            }, 2000);
        }, false);
    }
	
	
    function houseCategoriesHome(categories,id,user_id) {
        $('#loader').show();
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'core/ajax_db/propertyView_FecthPaginat.php?pages=' + id + '&categories=' + categories + '&user_id=' + user_id, true);
        xhr.send();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                // $('html,body').animate({scrollTop:0},0);
                // $('html,body').animate({scrollTop:0},'slow');
                setTimeout(() => {
                    $('#loader').fadeOut();
                }, 1000);
                // $(window).scrollTop(0);
                $('html,body').animate({scrollTop:0},'slow');
                var pagination = document.getElementById('house-hide');
                pagination.innerHTML = xhr.responseText;
              
            }
        };
    }
  
    function houseWatch_ListCategories(categories,id,user_id) {
        $('#loader').show();
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'core/ajax_db/watch_list_Fecth.php?pages=' + id + '&categories=' + categories + '&user_id=' + user_id, true);
        xhr.send();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                // $('html,body').animate({scrollTop:0},0);
                // $('html,body').animate({scrollTop:0},'slow');
                setTimeout(() => {
                    $('#loader').fadeOut();
                }, 1000);
                // $(window).scrollTop(0);
                $('html,body').animate({scrollTop:100},'slow');
                var pagination = document.getElementById('house-hide');
                pagination.innerHTML = xhr.responseText;
            }
        };
    }

    function property_requestCategories(categories,id) {
        $('#loader').show();
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'core/ajax_db/property_request_Fecth.php?pages=' + id + '&categories=' + categories, true);
        xhr.send();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                // $('html,body').animate({scrollTop:0},0);
                // $('html,body').animate({scrollTop:0},'slow');
                setTimeout(() => {
                    $('#loader').fadeOut();
                }, 1000);
                // $(window).scrollTop(0);
                $('html,body').animate({scrollTop:100},'slow');
                var pagination = document.getElementById('request-hide');
                pagination.innerHTML = xhr.responseText;
            }
        };
    }

    function house_agentCategories(categories,id,user_id) {
        $('#loader').show();
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'core/ajax_db/house_agent_Fecth.php?pages=' + id + '&categories=' + categories + '&user_id=' + user_id, true);
        xhr.send();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

             
                // $('html,body').animate({scrollTop:0},0);
                // $('html,body').animate({scrollTop:0},'slow');
                setTimeout(() => {
                    $('#loader').fadeOut();
                }, 1000);
                // $(window).scrollTop(0);
                $('html,body').animate({scrollTop:100},'slow');
                var pagination = document.getElementById('house-hide');
                pagination.innerHTML = xhr.responseText;
            }
        };
    }
  
    function houseRange(range,id,user_id) {
        $('#loader').show();
        var xhr = new XMLHttpRequest();
        var params = '&pages=' + id + '&price_range=' + range + '&user_id=' + user_id;
		xhr.open("POST","core/ajax_db/house_add.php",true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send(params);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                 // $('html,body').animate({scrollTop:0},0);
                // $('html,body').animate({scrollTop:0},'slow');
                setTimeout(() => {
                    $('#loader').fadeOut();
                }, 1000);
                // $(window).scrollTop(0);
                $('html,body').animate({scrollTop:100},'slow');
                var pagination = document.getElementById('property-list');
                pagination.innerHTML = xhr.responseText;

            }
        };
    }
	
    function houseRangeLayout(range,id,user_id) {
        $('#loader').show();
        var xhr = new XMLHttpRequest();
        var params ='&pages=' + id + '&price_range=' + range + '&user_id=' + user_id;
		xhr.open("POST","core/ajax_db/propertyView_range.php",true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send(params);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                  // $('html,body').animate({scrollTop:0},0);
                // $('html,body').animate({scrollTop:0},'slow');
                setTimeout(() => {
                    $('#loader').fadeOut();
                }, 1000);
                // $(window).scrollTop(0);
                $('html,body').animate({scrollTop:100},'slow');
                var pagination = document.getElementById('house-hide');
                pagination.innerHTML = xhr.responseText;
            }
        };
    }

    
    function xxda(requests,formx, id) {
        var xhr = new XMLHttpRequest();
        var form = document.getElementById(formx);
        var formData = new FormData(form);
        // Add any event handlers here...
        xhr.open('POST', 'index.php?actions=' + requests + '&code=' + id , true);
        xhr.open('POST', 'view_all_property.php?actions=' + requests + '&code=' + id , true);
        xhr.send(formData);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                $("#responseSubmitfooditerm").html('<div class="alert alert-success alert-dismissible fade show text-center">'+
                     '<button class="close" data-dismiss="alert" type="button">'+
                         '<span>&times;</span>'+
                     '</button> <strong>SUCCESS</strong>'+' </div>');
                var forms = document.getElementById('responseSubmitfooditermview');
                 setInterval(function () {
                    $("#responseSubmitfooditerm").fadeOut();
                            }, 2000);
                forms.innerHTML = xhr.responseText;
            }
        };
    }
    
    function xxda_watch_list_delete(requests,formx, id) {
        var xhr = new XMLHttpRequest();
        var form = document.getElementById(formx);
        var formData = new FormData(form);
        // Add any event handlers here...
        xhr.open('POST', 'core/ajax_db/watch_list_Fecth.php?actions=' + requests + '&code=' + id , true);
        xhr.send(formData);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                $("#response_msg_watchlist").html('<div class="alert alert-success alert-dismissible fade show text-center">'+
                     '<button class="close" data-dismiss="alert" type="button">'+
                         '<span>&times;</span>'+
                     '</button> <strong>SUCCESS</strong>'+' </div>');
                 $('#response_hide_watchlist'+ id).hide();
                 setInterval(function () {
                    $("#response_msg_watchlist").fadeOut();
                            }, 2000);
            }
        };
    }
    
    function xxda_prof_house_agent_delete(requests,formx, id) {
        var xhr = new XMLHttpRequest();
        var form = document.getElementById(formx);
        var formData = new FormData(form);
        // Add any event handlers here...
        xhr.open('POST', 'core/ajax_db/house_agent_Fecth.php?actions=' + requests + '&code=' + id , true);
        xhr.send(formData);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                $("#response_msg_watchlist").html( xhr.responseText);
                 $('#response_hide_watchlist'+ id).hide();
                 setInterval(function () {
                    $("#response_msg_watchlist").fadeOut();
                            }, 2000);
            }
        };
    }
// END OF HOUSE JAVASCRIPT

// CAR FOR BUY AND SELLING FOR DEALER


    </script>
</head>