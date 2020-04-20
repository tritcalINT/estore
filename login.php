
<?php

include_once './header.php';

if (isset($_GET['error'])) {
    $error = $_GET['error']; 
} else {
   $error = ''; 
}


?>

<link href="style/css/pages/login.css" rel="stylesheet" type="text/css"/>

<div>
    <br>
    <hr>
</div>

      <div class="boxA">
	<h1><?= $lang['Log In']?> </h1>
            <?php
            if($error == '1'){
                //echo '<div class="alert alert-danger" role="alert">Username is already taken</div>';
                 echo '<div class="box"> <div class=" alert alert-danger " role="alert">User Not found or not Activate</div ></div>';
                 
            }
            else if($error == '2'){
               // echo '<div class="alert alert-danger" role="alert">Email is already registered with another user</div>';
                     echo '<div class="box"> <div class=" alert alert-danger " role="alert" >Wrong password Try Agin... </div ></div>';
                     echo ' <div class="box"><a href="pass_reset.php" class="btn  btn-danger">Click here to Reset Password</a></div >';
                 
            }
          

            ?>
        <form id="fmlogin" name="frmlogin" action="data/login_data.php" method="post">
		<div class="input-group">
                        <label for="username"><?= $lang['Username']?></label>
			<input type="text" required class="form-control input-lg" placeholder="<?= $lang['Email or User Name']?>" name="customer-id" id="customer-id" autocomplete="on" autofocus  />
                         
			
		</div>
		<div class="input-group">
                        <label for="password"><?= $lang['Password']?>&#42;</label>
			<input required class="form-control input-lg" type="password" placeholder="<?= $lang['Password']?>" name="customer-pass" id="customer-pass"  />
                         
			
		</div>
             <input type="submit" value="<?= $lang['Log In']?>" /> 
              
            
            
		
	</form>
        <div class="margintop20px">
        <br>
        <br>
    </div>
</div>
    <div class="margintop20px">
        <br>
        <br>
    </div>
    
 <div class="boxA" style="height: 50px">
	 
     <form action="register-account.php">
 
            <div>
                <input type="submit"  value="<?= $lang['New User Register ?']?>" onclick=""/> 
            </div>
            
		
	</form>
    
    </div>
    
      <div class="margintop20px">
        <br>
        <br>
    </div>

</body>
<?php

       
        
          require_once './footer.php';
          require_once './footerhtmlbottom.php';
       
?>
 


<script>
            $(function() {
            // Slider Revolution
       
        });
        
         refrehCart();
         
         
        

            </script>
            
            
            
    </body>
</html>