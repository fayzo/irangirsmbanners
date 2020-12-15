<?php include "Get_usernameProfile.php"?>

<?php include "header.php"?>
    
<!-- <body> -->
<body >
<!-- <body class="chair"> -->
    <div class="content">
    <?php include "navbar.php"?>
    <!-- navbar -->
    
    <!-- Property Section Begin -->
    <section class="property-section spad">

        <div class="container">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>VEHICLES REQUEST</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo (isset($_SESSION['key']))? HOME:F_INDEX; ?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?php echo (isset($_SESSION['key']))? PROPERTY_REQUEST : F_PROPERTY_REQUEST; ?>">Car Request</a></li>
                </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->

        <div class="container">
            <div class="row">
               <!-- col -->
               <div class="col-md-9 mb-3">
                    <?php echo $property_request->property_request_pageNavbar('Car_For_sale',1);?>
                    <?php echo $property_request->property_request_page('Car_For_sale',1);?>
                </div> 
                <!-- col -->
               <!-- col -->
               <div class="col-md-3 mb-3">
                    <?php echo $house->agent_profile_viewProfile($user_id);?>
                </div> 
                <!-- col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
      
    </section>
    <!-- Property Section End -->

<?php include "admin_message.php"?>
<?php include "footer.php"?>
