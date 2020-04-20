<?php
session_start();	
    include_once '../../conn.php';

	//Fetching Values from URL
	$login_pass = $_POST['password'];
	$hash = password_hash($login_pass, PASSWORD_DEFAULT);
	$login_user = $_POST['admin_id'];
	
	if($login_pass != '' && $login_user != ''){
	   
        $sqlcheck="SELECT * FROM administrators WHERE a_username='".$login_user."' AND a_status = 1 ";
        $result = mysqli_query($conn, $sqlcheck);
        
        if (mysqli_num_rows($result) > 0) {
            $res = mysqli_fetch_assoc($result);
			if (password_verify($login_pass, $res['a_password'])) {
					$_SESSION['login'] = $res['a_username'];
				if($res['a_type'] == '1'){
					$_SESSION['master'] = $res['a_username'];
					$_SESSION['admin'] = '';
					$_SESSION['reseller'] = '';
					$_SESSION['supermaster'] = '';
				} else if($res['a_type'] == '2') {
					$_SESSION['master'] = '';
					$_SESSION['admin'] = $res['a_username'];
					$_SESSION['reseller'] = '';
					$_SESSION['supermaster'] = '';
				} else if($res['a_type'] == '3') {
					$_SESSION['master'] = '';
					$_SESSION['admin'] = '';
					$_SESSION['reseller'] = $res['a_username'];
					$_SESSION['supermaster'] = '';
				} else if($res['a_type'] == '4') {
					$_SESSION['master'] = '';
					$_SESSION['admin'] = '';
					$_SESSION['reseller'] = '';
					$_SESSION['supermaster'] = $res['a_username'];
				}
				header('Location: ../admin.php');
			} else {
				header('Location: ../index.php?error=1');
			}
        } else {
            header('Location: ../index.php?error=1');
        }
	
	} else {
		header('Location: ../index.php?error=0');
	}

?>