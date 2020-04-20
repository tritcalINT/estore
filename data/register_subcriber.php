<?php
	include_once 'functions.php';
        include_once './../conn.php';

	//Fetching Values from URL
	$subcribe = $_POST['newsletter'];
        
         $email_availability_check = "SELECT * FROM newsletter WHERE email = '" . $subcribe . "'";
        $data_2 = mysqli_query($conn, $email_availability_check);
	 
	 
		if($subcribe != '' && mysqli_num_rows($data_2)==0 ){
			
			$sql = "INSERT INTO newsletter (email) VALUES ('".$subcribe."')";
		
			mysqli_query($conn, $sql);
			
			 
			header('Location: ../subcribe.php');
				
		} else {
			header('Location: ../subcribe.php?error=1');
		}
	 

?>