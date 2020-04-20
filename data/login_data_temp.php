<?php
session_start();	
    include_once '../conn.php';

	//Fetching Values from URL
	$login_pass = $_POST['password'];
	$hash = password_hash($login_pass, PASSWORD_DEFAULT);
	$login_user = $_POST['customer-id'];
	
if($login_pass != '' && $login_user != ''){
	   
        $sqlcheck="SELECT * FROM user WHERE user_name='".$login_user."' AND  user_status = 1 ";
        $result = mysqli_query($conn, $sqlcheck);
        
        if(mysqli_num_rows($result) > 0) {

            $res = mysqli_fetch_assoc($result);

            if (password_verify($login_pass, $res['user_pass'])) {
                $_SESSION['login'] = $res['user_name'];
            }

            if ($res['user_type'] == 'member') {
                $_SESSION['vmember'] = $res['user_name'];
                $_SESSION['nonmember'] = '';

                header('Location: ../index.php');

            }
            else if ($res['user_type'] == 'nonemember') {
                $_SESSION['nonmember'] = $res['user_name'];
                $_SESSION['vmember'] = '';

                header('Location: ../index.php');
            }
            else {
                header('Location: ../userLogin.php?error1');

            }

        }


} else {
    
    header('Location: ../userLogin.php?error=4');
}

?>