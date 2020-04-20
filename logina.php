
<?php

include_once './header.php';

if (isset($_GET['error'])) {
    $error = $_GET['error']; 
} else {
   $error = ''; 
}


?>


 
<style>
  
*, *:before, *:after {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body {
	color: white;
	display: flex;
	padding: 20px;
	min-height: 100vh;
	position: relative;
	flex-direction: column;
	justify-content: center;
	font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
	background-color: transparent;
	 
}

.box {
	width: 100%;
	margin: auto;
	padding: 10px;
	max-width: 400px;
	border-radius: 2px;
	 
	background-color: rgba(0,0,0,0.2);
}

h1 {
	font-weight: 100;
	letter-spacing: 1px;
	margin: 10px 0 20px 10px;
}

.input-group {
	font-size: 22px;
	padding: 5px 10px;
	padding-top: 30px;
	position: relative;
	border-radius: 2px;
	margin-bottom: 10px;
	 
	background-color: rgba(0,0,0,0.1);
	
	input {
		width: 100%;
		border: none;
		outline: none;
		display: block;
		font-weight: 300;
		letter-spacing: 1px;
		background-color: transparent;
		
		&:focus,
		&.active {
			+ label {
				top: 5px;
				left: 5px;
				font-size: 16px;
			}
		}
	}
	
	label {
		top: 30px;
		left: 10px;
		opacity: 0.7;
		font-weight: 100;
		position: absolute;
		letter-spacing: 2px;
		pointer-events: none;
		transition: all 0.2s ease-in;
	}
}

input[type="submit"] {
	border: none;
	float: right;
	outline: none;
	padding: 10px;
	font-weight: 300;
	border-radius: 2px;
	letter-spacing: 1px;
	 
	text-transform: uppercase;
	background-color: rgba(255,255,255,0.2);
	transition: all 0.2s ease-in;
	
	&:hover,
	&:focus {
		 
	}
        
input[type="button"] {
	border: none;
	float: right;
	outline: none;
	padding: 10px;
	font-weight: 300;
	border-radius: 2px;
	letter-spacing: 1px;
	 
	text-transform: uppercase;
	background-color: rgba(255,255,255,0.2);
	transition: all 0.2s ease-in;
	
	&:hover,
	&:focus {
		 
	}
}
</style>
<html> 

  <div class="box">
	<h1>Log In </h1>
        <form action="data/login_data.php">
		<div class="input-group">
                        <label for="username">Username Or Email</label>
			<input type="text" required class="form-control input-lg" placeholder="Email or User Name" name="customer-id" id="customer-id" autocomplete="on" autofocus onblur="checkInput(this)" />
                         
			
		</div>
		<div class="input-group">
                        <label for="password">Password&#42;</label>
			<input required class="form-control input-lg" type="password" placeholder="Your Password" name="customer-pass" id="customer-pass" onblur="checkInput(this)" />
                         
			
		</div>
             <input type="submit" value="Login" /> 
              
            
            
		
	</form>
</div>
    
 <div class="box">
	 
     <form action="register-account.php">
 
            <div>
                <input type="submit"  value="New User Register ?" onclick=""/> 
            </div>
            
		
	</form>
</div>
    
 <div id="error_display">
                                                            <?php

                                                            if($error == '0'){
                                                                echo "Please fill-in the Username and Password";
                                                            } else if($error == '1'){
                                                               echo "Invalid Username /Password or Account not Active. Please contact the Administrator"; 
                                                            } 

                                                            ?>
</div>

</html>

<script>
    function checkInput(input) {
	if (input.value.length > 0) {
		input.className = 'active';
	} else {
		input.className = '';
	}
}
    </script>
       <?php   
    //   Include footer and bootom javascript files
    include ("footer.php");    
    include ("footerhtmlbottom.php");    
 ?>
    </div><!-- End #wrapper -->
        <a href="#" id="scroll-top" title="Scroll to Top"><i class="fa fa-angle-up"></i></a><!-- End #scroll-top -->
    <!-- END -->
	<script src="js/bootstrap.min.js"></script>
    <script src="js/smoothscroll.js"></script>
	<script src="js/jquery.debouncedresize.js"></script>
    <script src="js/retina.min.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/jquery.hoverIntent.min.js"></script>
	<script src="js/twitter/jquery.tweet.min.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
<script>
            $(function() {
            // Slider Revolution
       
        });
        
         refrehCart();
            </script>
    </body>
</html>