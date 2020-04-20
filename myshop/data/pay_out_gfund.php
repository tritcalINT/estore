<?php
    include_once '../session.php';
    include_once '../../conn.php';
    include_once 'functions.php';
    include_once 'admin_setting_data.php';
	
	if($_SESSION['master'] != ''){
		$approved_by = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$approved_by = $_SESSION['supermaster'];
	} else if($_SESSION['admin'] != '') {
		$approved_by = $_SESSION['admin'];
	} else {
		$approved_by = $_SESSION['reseller'];
	}
	
	$approve_by_id = getUseridbyUsername($approved_by, $conn);

	//Fetching Values from URL
        $mt_percent = $as_fund_payout_per ;//$_POST['tpercent'];
	$mt_status = "FUND PAY OUT";//$_POST['tstatus'];
        $expiry_days = $as_gp_expiry_date;
        $today = date('Y-m-d H:i:s');
        $expiry_date = date('Y-m-d', strtotime($today. ' + '.$expiry_days.' days'));
  
       
	if($mt_percent != ''){
                //$sqltrade = "SELECT * FROM member_deposit WHERE md_fund_amount >0 and md_expiry<'".$expiry_date."'";
                $sqltrade = "SELECT * FROM member_deposit WHERE md_fund_amount >0 ";
                  
                $resulttrade = mysqli_query($conn, $sqltrade);
              
                while($row = mysqli_fetch_assoc($resulttrade)) {
                  
                    $md_data = $row['md_date'];
                    $expiry_date = date('Y-m-d', strtotime($md_data. ' + '.$expiry_days.' days'));
                    $today = date('Y-m-d');
                   // echo $expiry_date;
                    
                    if($today <=$expiry_date )
                    {    
                       $md_fund_amount = $row['md_fund_amount'];
                        $md_id = $row['md_member'];
                        $sqllast = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(mgft_id) as id FROM member_gf_transfer"))['id'];
                        $ref_no = "FP".sprintf('%06d', ($sqllast+1));


                        $mt_interest_amount = ($md_fund_amount * $mt_percent)/100;

                        $sqlinterest = "INSERT INTO member_gf_transfer (mgft_reference, mgft_member_id, mgft_type, mgft_amount, "
                                . "mgft_status, mgft_created_date,mgtf_percentage) VALUES ('".$ref_no."', '".$md_id."', '1',"
                                . " '".$mt_interest_amount."', '1', '".$today."','".$mt_percent."')";
                        mysqli_query($conn, $sqlinterest);
                    }
                }
            
        header('Location: ../g-fundpay_out.php?success=1');	    

    }
?>