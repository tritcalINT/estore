<?php 
	include("../include/session.php");
	include("../include/constants.php");
        global $database,$session;
	$usrky = $database->sesUsrKy();
        $pcomky = $_GET['pcomky'];
        $pmode=$_POST['pmode'];
        $pmode = $_GET['pmode'];
	$pcomid  = $_POST['txtcomid'];
	$pcomnm = $_POST['txtcomnm'];
        $padd1 = $_POST['txtadd1'];
        $padd2 = $_POST['txtadd2'];
        $ptown = $_POST['txttown'];
        $pcity = $_POST['txtcity'];
        $ptp1 = $_POST['txttp1'];
        $ptp2 = $_POST['txttp2'];
        $pweb=$_POST['txtweb'];
        $pvatno=$_POST['txtvatno'];
        $pregno=$_POST['txtregno'];
        $pcountry=$_POST['s2'];  
        $pemail=$_POST['txtemail'];  
        $precid =$_POST['txtcomky'];
        $fileupload = $_POST['imagefile'];

        // payment elemints
        $pamt=$_GET["pamt"];
        $payamt=$_GET["payamt"];
        $apamt=$_GET["apamt"];
        $grsamt=$_GET["grsamt"];
        $vatamt=$_GET["vatamt"];
        $vatper=$_GET["vatper"];
        $nbtamt=$_GET["nbtamt"];
        $nbtper=$_GET["nbtper"];
        $cdate=$_GET["cdate"];
        
        
        
        if($pmode=="userinfo")
        {    
           
            $final_save_dir = '../photo/uploads/';
             move_uploaded_file($_FILES['imagefile']['tmp_name'], $final_save_dir . $_FILES['imagefile']['name']);
           
            $image_full_path = $final_save_dir . $_FILES['imagefile']['tmp_name'];
            //$image = file_get_contents ($_FILES['imagefile']['tmp_name']);
            //$image = addslashes(file_get_contents($_FILE['imagefile']['tmp_name']));
            //echo $image_full_path ;
            if($precid==0)
                {
                            $pEntDtm = date('y/m/d');

                            $sql1 = "INSERT INTO companytb(comcd,comnm,add1,add2,town,city,tp1,"
                                    . "tp2,country,email,web,vatno,regno,entdtm) VALUES('$pcomid','$pcomnm','$padd1','$padd2',"
                                    . "'$ptown','$pcity','$ptp1','$ptp2','$pcountry','$pemail','$pweb','$pvatno','$pregno','$pEntDtm')";
                            //echo $sql1;       
                            $result = $database->query($sql1);
                            $precid = $database->getRecID();
                            
                            //update the company key
                             $sqlsec="UPDATE userinfotb SET comky='$precid' Where usrky='$usrky'";
            
                             $result = $database->query($sqlsec);
                             
                             $message = '<html><head>
                            <title>Email Verification</title>
                            </head>
                            <body>';
                            $html .= '<h1>Hi ' . $pcomnm . '!</h1>';
                            $html .= '<p><a href="'.SITE_URL.'companyactivate.php?id=' . base64_encode($precid) . '">CLICK TO ACTIVATE YOUR ACCOUNT</a>';
                            $html .= "</body></html>";
                            
                            $subject = 'Email Verifcation - '.WEB_NAME;
                            
                            $database->sendEmail($pemail, $subject, "", $html);
                             
            }
            else
            {   
                            $sql="UPDATE companytb SET comcd='$pcomid',comnm='$pcomnm',add1='$padd1',add2='$padd2',
                                    town='$ptown',city='$pcity',tp1='$ptp1',tp2='$ptp2',country='$pcountry',email='$pemail',"
                                    . "web='$pweb',vatno='$pvatno',regno='$pregno' Where comky='$precid'";
                            
                            $result = $database->query($sql);                
                            
           
            }
            
            
            if($_FILES['imagefile']['name']=='') 
            {
//               /echo "no Files"; 
            }
            else
            {
                $imgData = addslashes(file_get_contents( '../photo/uploads/'.$_FILES['imagefile']['name']));
                // $imgData = file_get_contents ($_FILES['imagefile']['tmp_name']);
                $sqlimg="UPDATE companytb SET img='$imgData' Where comky='$precid'";

                $result = $database->query($sqlimg);
                //reomve temp file
               @unlink($image_full_path);
                //echo 'No upload';
            }
            header("Location:../form-company?pmode=editprofile&precid=".base64_encode($precid));
//            @unlink($image_full_path);
        }
        
        // retrive image details
        $pimgmode = $_GET['pimgmode'];
        $imgrecid = (($_GET['imgrecid']));
        
        if($pimgmode=="img")
        {
            $sqlimg = "SELECT img FROM companytb where comky ='$imgrecid'  ORDER BY comky"; 
            
            
            $result = $database->query($sqlimg);
            $rowimg =  $database->fetch_set($result);

            $contenttype = 'image/jpeg';//$row["image_type"];
            $image = $rowimg["img"];


            header("Content-type: $contenttype"); 

            echo $image;
        }    
        
        if($pmode=="notification")
        {    
            $precidnote = $_GET['precid'];
            $fsecemail = $_GET['fsecemail'];
            $fsysemail = $_GET['fsysemail'];
            $pnotemail = $_GET['pnotemail'];
           
            $sqlnote="UPDATE userinfotb SET fsecemail='$fsecemail',fsysemail='$fsysemail',notemail='$pnotemail' Where usrky='$precidnote'";
            
            $result = $database->query($sqlnote);
            
            echo 'ok';

       }
       // Update security details
       
        if($pmode=="security")
        {    
            $precidsec = $_GET['precid'];
            $paccess = $_GET['paccess'];
            $pdis = $_GET['pdisable'];
            date_default_timezone_set("Asia/Colombo");
            $updt =  date('y-m-d h:i:s ');
          
            $sqlsec="UPDATE userinfotb SET access='$paccess',disper='$pdis',disdt='$updt' Where usrky='$precidsec'";
            //echo $sqlsec;
            $result = $database->query($sqlsec);
            
            echo 'ok';

       }
       
       // delete a user
       if($pmode=="deleteuser")
        {    
            $preciddel = $_GET['precid'];
            
            $sqlsec="UPDATE companytb SET finact ='1' Where comky='$preciddel'";
       
            $result = $database->query($sqlsec);
            
            echo 'ok';

       }
     //updatecompany  
     if($pmode=="updatecompany")
    {    
        $precidcom = $_GET['precid'];
        $pcom = $_GET['pcom'];
        $pdis = $_GET['pdisable'];
        date_default_timezone_set("Asia/Colombo");
        $updt =  date('y-m-d h:i:s ');

        $sqlsec="UPDATE companytb SET pcomky='$pcom' Where comky='$precidcom'";

        $result = $database->query($sqlsec);

        echo 'ok';

   }
   // state
   if($pmode=='getStates') {
//       echo 'kdajflsdjflasdf';
//  	 if(!isset($_GET['countryId']) || empty($_GET['countryId'])) {
//  	 	throw new exception("Country Id is not set.");
//  	 }
  	 $countryId = $_GET['countryId'];
  	 $data = $database->getStates($countryId);
         echo $data;
  }
//city
   if($pmode=='getCities') {
  	 if(!isset($_GET['stateId']) || empty($_GET['stateId'])) {
  	 	throw new exception("State Id is not set.");
  	 }
     $stateId = $_GET['stateId'];
  	 $data = $database->getCities($stateId);
         echo $data;
  } 
?>