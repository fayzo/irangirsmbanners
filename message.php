<?php include "header_if_login.php"?>
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
                <h4>MESSAGE ENQUIRE FOR PROPERTY</h4>
            </div>
            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo HOME; ?>">Home</a></li>
                  <li class="breadcrumb-item active"><a href="<?php echo BASE_URL.$user['username']; ?>">Profile</a></li>
                </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->

        <div class="container">
        <div class="row">
        
          <div class="col-md-9">
                    
                    
                    <div class="card  mb-3">
                        <div class="card-header">
                            <div class="card-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link  active" href="#Sale"
                                        data-toggle="tab"><i class="fa fa-envelope-o"></i> Inbox Message</a> </li>
                            </ul>
                             <!-- /.card-tools -->
                        </div>
                        <div class="card-body">
                        <div class="tab-content">
                                <div class="tab-pane active " id="Sale">
                                <?php  
                                $house->MessageSentToAgent($user_id);
                                ?>
                                </div> 
                            </div> <!-- /.tab-content -->
                        </div>
                        <div class="card-footer text-muted">
                            Footer
                        </div>
                    </div>
        </div>
        <!-- /.col -->
        <!-- col -->
        <div class="col-md-3 mb-3">
            <?php echo $house->request_property();?>
        </div> 
        <!-- col -->

        </div>
        <!-- /.row -->
      </div>
      
    </section>
    <!-- Property Section End -->

<?php include "admin_message.php"?>
<?php include "footer.php"?>
