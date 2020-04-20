<?php
session_start();
include("include/session.php");
include("include/constants.php");
if (!$database->chkLogin()) {
    $database->usrLogOut(0);
}
$usrky = $database->sesUsrKy();
$database->lockuser($usrky); 

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title><?php echo PG_HEAD; ?> - Locked screen</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="css/themes.css">


	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	
	<!-- Nice Scroll -->
	<script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/eakroko.js"></script>

	<!--[if lte IE 9]>
		<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

</head>

<body class='locked'>
	<div class="wrapper">
		<div class="pull-left">
			<?php echo '<img src="user/usercontrol?pimgmode=img&imgrecid='.trim($_SESSION["usrky"]).'" alt="" width="200" height="200">';?>
                    <a href="index">Not <?php echo $_SESSION['usernm']; ?>?</a>
		</div>
		<div class="right">
                    <div id="errordiv" ><?php echo $_GET['msg'] ?></div>
			<div class="upper">
				<h2><?php echo $_SESSION['usernm']; ?></h2>
				<span>Locked</span>
			</div>
			<form action="validatelock" method='POST'>
                                
                            	<input type="hidden" name='txtuser' data-rule-required="true" data-rule-email="false" value="<?php echo $_SESSION['userid']; ?>">
				<input type="password" name="txtpassword" placeholder="Password">
				<div>
					<input type="submit" id="submit" name="submit"  value="Unlock" class='btn btn-inverse'>
				</div>
			</form>
		</div>
	</div>
	
</body>

</html>
