<?php
session_start();	
if($_SESSION['master'] == '' && $_SESSION['supermaster'] == ''){
	header('Location: index.php');
}
    include_once '../../conn.php';

	//Fetching Values from URL
	$login_user = $_POST['user_name'];
	
	if($login_user != ''){
	   
        $sqlcheck="SELECT * FROM members WHERE m_username='".$login_user."' AND m_status = 1 ";
        $result = mysqli_query($conn, $sqlcheck);
        
        if (mysqli_num_rows($result) > 0) {
            $res = mysqli_fetch_assoc($result);
				$_SESSION['member'] = $res['m_username'];
				header('Location: ../../member/member.php');
        }
	
	}

?>