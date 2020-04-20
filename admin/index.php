<?php
include_once 'top_header.php';

if (isset($_GET['error'])) {
    $error = $_GET['error']; 
} else {
   $error = ''; 
}
?>

<body style="margin-top: 0px; background:url(../img/scgbg.jpg) center">
<div id="page-wrapper" style="height: 100vh;">

    <div class="container-fluid">
    
    
    <div class="row">
<div class="col-lg-4 col-md-4">
</div>
        <div class="col-lg-4 col-md-4">
        <?php if($error != '') { ?>
        <div class="container">
            <div class="row">
                <div id="error_display">
                    <?php
                    
                    if($error == '0'){
                        echo "Please fill-in the Username and Password";
                    } else if($error == '1'){
                       echo "Invalid Username /Password or Account not Active. Please contact the Administrator"; 
                    } 
                    
                    ?>
                </div>
            </div>
        </div>
        <?php } ?>
    
            <br><br><div class="login-box" align="center"><img src="../img/scgbg1.png" width="310" height="auto"><br><hr><br>
              <!-- /.login-logo -->
              <div class="login-panel panel panel-default" style="border: 0px; background: none;">
              
            
                        <form role="form" action="data/login.php" method="post" name="login_form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Sign in User to start your Official session" name="admin_id" type="admin_id" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Official Password" name="password" type="password">
                                </div>
                                <input type="submit" class="btn btn-lg btn-warning btn-block" value="Official Login" />
                            </fieldset>
                        </form>
            
                <!-- /.social-auth-links -->
            
              </div>
                
                
              <!-- /.login-box-body can put image up -->
            </div>
        </div>
<div class="col-lg-4 col-md-4">
</div>
</div>
 
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
        

