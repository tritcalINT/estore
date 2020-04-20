
<?php
include_once './header.php';

?>

<link href="style/css/fullpage.css" rel="stylesheet" type="text/css"/>
<html>
     <div class="box">
	<h1>Log In </h1>
        <form id="fmlogin" name="frmlogin" action="data/login_data.php" method="post">
		<div class="input-group">
                        <label for="username">Username Or Email address</label>
			<input type="text" required class="form-control input-lg" placeholder="Email or User Name" name="customer-id" id="customer-id" autocomplete="on" autofocus onblur="checkInput(this)" />
                         
			
		</div>
		<div class="input-group">
                        <label for="password">Password&#42;</label>
			<input required class="form-control input-lg" type="password" placeholder="Your Password" name="customer-pass" id="customer-pass" onblur="checkInput(this)" />
                         
			
		</div>
             <input type="submit" value="Login" /> 
              
            
            
		
	</form>
</div>
    
    
    	 	<script src="js_old/bootstrap.min.js"></script>
    <script src="js_old/smoothscroll.js"></script>
	<script src="js_old/jquery.debouncedresize.js"></script>
    <script src="js_old/retina.min.js"></script>
    <script src="js_old/jquery.placeholder.js"></script>
    <script src="js_old/jquery.hoverIntent.min.js"></script>
	<script src="js_old/twitter/jquery.tweet.min.js"></script>
	<script src="js_old/jquery.flexslider-min.js"></script>
    <script src="js_old/jquery.selectbox.min.js"></script>
    <script src="js_old/owl.carousel.min.js"></script>
	<script src="js_old/main.js"></script>
        
        <script>
    
</html>