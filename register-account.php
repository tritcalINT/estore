<?php
 
 include_once './header.php';

 if (isset($_GET['error'])) {
    $error = $_GET['error']; 
} else {
   $error = ''; 
}
 
if (isset($_GET['registered'])) {
    $error = $_GET['error'];
} else if(isset($_GET['registered'])){
    $status = $_GET['registered'];
}

if (isset($_GET['ref'])) {
    $ref_id = $_GET['ref'];
} else{
    
    $ref_id='0';
    
    
}

?>



<link href="style/css/pages/register-account.css" rel="stylesheet" type="text/css"/>

<div class="margin10px">
    
    <br>
</div>

<div class="wrapper bob">


        <div class="main-agileinfo">
            <?php
            if($status == 'registered'){
               // echo '<div class="alert alert-danger" role="alert">Please fil-in the Username and Password</div>';
                echo '<div class="boxA"> <div class=" alert alert-danger " role="alert" style="width: 500px">Please fil-in the Username and Password</div ></div>';
                 
            }
            else if($error == '1'){
                //echo '<div class="alert alert-danger" role="alert">Username is already taken</div>';
                 echo '<div class="boxA"> <div class=" alert alert-danger " role="alert" style="width: 500px">Username is already taken</div ></div>';
                 
            }
            else if($error == '2'){
               // echo '<div class="alert alert-danger" role="alert">Email is already registered with another user</div>';
                     echo '<div class="boxA"> <div class=" alert alert-danger " role="alert" style="width: 500px">Email is already registered with another user</div ></div>';
                 
            }
            else if($error == '3'){
                //echo '<div class="alert alert-danger" role="alert">Something went wrong please try again later</div>';
                
                 echo '<div class="boxA"> <div class=" alert alert-danger " role="alert" style="width: 500px">Something went wrong please try again later</div ></div>';
                 
            }
            
             else if($error == '4'){
                  echo '<div class="boxA"> <div class=" alert alert-danger " role="alert" style="width: 500px">Pass word Not match </div ></div>';
                 
            }
            
             else if($error == '5'){
                  echo '<div class="boxA"> <div class=" alert alert-danger " role="alert" style="width: 500px">Please Enter Valid Email Account</div ></div>';
                 
            }
            
             else if($error == '6'){
                  echo '<div class="boxA"> <div class=" alert alert-danger " role="alert" style="width: 500px">Member Reference Not valid  </div ></div>';
                 
            }

            ?>
            
    <div class="boxA">
                <h1><?= $lang['Register Account']?></h1>
                
                <form action="data/user_add_data.php" id="register" method="post" enctype="multipart/form-data" >
                    <input name="action" value="register" type="hidden">
                     <div class="row" >
                        <div class="col-md-3" style="padding: 0px 0px 5px 15px">
                            <img src="uploads/profiles/avt.png" name="user_image" id="profile_image" class="img-circle profile_image" style="height:100px;width: 100px;background-color: #ccc;border: 3px solid white;align-content: center">
                        </div>
                        <div class="col-md-9" style="padding: 25px 49px 25px 15px">
                            <input type="file" name="user_image" id="user_profile_image" class="form-control"  placeholder="Username" aria-describedby="inputGroupPrepend" style="display: none;align-content: center" />
                            <input type="button" style="width: 100px" value="<?= $lang['browse']?>" id="browse_image" class="btn btn-success btn-block form-control"/>
                        </div>
                     </div>
                    
                    <div class="input-group">
                        <label for="username"><?= $lang['Username']?></label>
                        <br>
                        <input type="text" id="username" name="username" placeholder="<?= $lang['Username']?>" style="width: 500px; color: black" autocomplete="on" onblur="checkInput(this)"  required/>
                        
                    </div>
                    
                      <div class="input-group">
                        <label for="email"><?= $lang['email']?></label>
                        <br>
                        <input type="text" id="email" name="email" placeholder="<?= $lang['email']?>" style="width: 500px;color: black" autocomplete="on" onblur="checkInput(this)"  required/>
			 
                      </div>
                    
                    <div class="input-group">
                    
                        <label for="password"><?= $lang['Password'] ?></label>
                        <br>
                        <input type="password" id="password" name="password" style="width: 500px;color: black" onblur="checkInput(this)" required  />
			
                    </div>
                    
                     <div class="input-group" >
                    
                        <label for="confirm_password"><?= $lang['Confirm Password'] ?></label>
                        <br>
                        <input type="password" id="confirm_password" name="confirm_password"style="width: 500px;color: black" onblur="checkInput(this)" required />
			
                    </div>
                     <div class="input-group" >
                        
                        
                        
                         <input type="checkbox" id="scg_ref_status" name="scg_ref_status" onclick="scg_ref_enable()"/>
                        <label for="scg_ref"><?= $lang['Click here if you already SCG Member'] ?> </label>
			<br>
                        <input type="text" id="scg_ref" name="scg_ref"style="width: 500px;color: black; display:none" placeholder="Please Enter your Scg user Id " />
			
                    </div>

                     <?php if ($ref_id=='0'){
                         
                 
                            ?>
                    
                    <div class="input-group" >
                          
                          <label for="user_role" style="color: white"><?= $lang['Click here if you want Select The role'] ?></label>
                      <br>
                      <select id="user_role"  name="user_role"  class="form-control" style="width: 500px;color: black" >
                            <?php
                               $database->loadAllUsersType('0');
                             ?>
                           
                    </select>
                      
                      <?php     }else{?>    
                    
                    <input id="user_role" type="hidden" name="user_role"  value="User"/>
                    
                     <?php     }?>    
                    
                    </div>
  
                            
                    <div class="boxA"> 
                    <div class="wthree-text">
                        <label class="anim">
                            <input id="agreement" type="checkbox" class="checkbox" style="color: black" required>
                            <span style="color: white"><?= $lang['I Agree To The Terms & Conditions']?></span>
                        </label>
                        <input type="hidden" id="member_refernce" name="member_refernce" value="<?php echo $ref_id; ?>"/> 
                        <input type="submit" value="<?= $lang['sign up'] ?>" />
                
                    </div>
                        </div>
                       </form>
                   
		</div>
                    
                    
                
                   

                </div>
                    
               
                
                
                
        </div>

 

</body> 
 
 <?php   
                    
                    include ("footer.php");    
                    include ("footerhtmlbottom.php");
                ?>
 

<script>
function scg_ref_enable() {
  var checkBox = document.getElementById("scg_ref_status");
  var text = document.getElementById("scg_ref");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>
      
<script>
        
    function getMemberShip(){
         
         var txt="";
         var val = document.getElementById("user_role").value;
         
         //alert(val);
         if(val=="member")
         {
         var ref = prompt("Please enter your Refernce Number", "Please Enter valid membership No");
         
         
            if (ref == null || ref == "") {
              txt = "Not Valid Input";
              
               ref = prompt("Input Is not valid", "Please Enter valid membership No");
              
            } else {
              txt = ref;
               document.getElementById("member_refernce").value = txt;
             alert(txt);
            }
            
           
        }       
        }
                 

        
</script>  
    
<script>
    function checkInput(input) {
	if (input.value.length > 0) {
		input.className = 'active';
	} else {
		input.className = '';
	}
}
    </script>
    
    
<script>
    $('#browse_image').on('click', function(e){
        $('#user_profile_image').click();
    })
    $('#user_profile_image').on('change', function(e){
        var fileInput = this;
        if(fileInput.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#profile_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    })

</script>





</body>
</html>