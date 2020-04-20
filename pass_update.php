
<?php

include_once './header.php';

if (isset($_GET['error'])) {
    $error = $_GET['error']; 
} else {
   $error = ''; 
}


if( $_SESSION['login']!='')
{  
    $user = getUserDetails($_SESSION['login'],$conn);
    $user_id=$user['user_id'];
}

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id']; 

} 



?>

<link href="style/css/pages/login.css" rel="stylesheet" type="text/css"/>


      <div class="boxA">
	<h1>Update Password </h1>
            <?php
            if($error == '1'){
                 
                 echo '<div class="box"> <div class=" alert alert-danger " role="alert">Password Not Match</div ></div>';
                 
            }
            else if($error == '2'){
               
                     echo '<div class="box"> <div class=" alert alert-danger " role="alert" >User Not Found or Not Activate</div ></div>';
                     
                 
            }
          

            ?>
       
        <form id="fmlogin" name="frmlogin" action="data/pass_update_data.php" method="post">
              <input type="hidden" id="user_id"  name="user_id" value="<?php echo $user_id; ?>">
		<div class="input-group">
                        <label for="username">New Password</label>
                        <input style="width: 300px"type="password" required autocomplete="off" class="form-control input-lg"  name="new_pass" id="new_pass" placeholder="New Password" />
                         
			
		</div>
		<div class="input-group">
                        <label for="password">Confirm Password</label>
			<input style="width: 300px" required class="form-control input-lg" type="password" name="new_confoirm_pass" id="new_confoirm_pass"   placeholder="Confoirm Password" />
                         
			
		</div>
              <div class="margin">
                  <br>
              </div>
             <input type="submit" value="Update" /> 
              
            
            
		
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