<?php 
	include("../include/session.php");
	include("../include/constants.php");
        global $database,$session;
	$usrky = $database->sesUsrKy();
        
        $pmode=$_POST['pmode'];
        $pmode = $_GET['pmode'];
	$pusrid  = $_POST['txtemail'];
	$pusrnm = $_POST['txtusrnm'];
	$pcat = $_POST['txtaccess'];
	$ppw=sha1($database->generaterandom('128404').$_POST['pw']);//sha1($_GET['ppass'])
	$pskills='';//$_POST['txtskills']; 
        $pcountry='MY';//$_POST['s2'];  
        $pemail=$_POST['txtemail'];  
        //$chkProbation = $_GET['chkProbation'];
	$precid =$_POST['txtusrky'];
        $fileupload = $_POST['imagefile'];

        
        if($pmode=="userinfo")
        {    
           
            $final_save_dir = '../photo/uploads/';
            move_uploaded_file($_FILES['imagefile']['tmp_name'], $final_save_dir . $_FILES['imagefile']['name']);
           
            $image_full_path = $final_save_dir . $_FILES['imagefile']['name'];
           
             ///echo $final_save_dir ;
            if($precid==0)
                {
                            $pEntDtm = date('y/m/d');

                            $sql1 = "INSERT INTO userinfotb(usrid,usrnm,pw,psword,got_hris,access,skills,"
                                    . "country,email,entdtm,disper) VALUES('$pusrid','$pusrnm','$ppw','$ppw',"
                                    . "'0','$pcat','$pskills','$pcountry','$pemail','$pEntDtm','0')";
           
                            $result = $database->query($sql1);
                            $precid = $database->getRecID();
            }
            else
            {   
                            $sql="UPDATE userinfotb SET usrid='$pusrid',usrnm='$pusrnm',access='$pcat',pw='$ppw',
                                    skills='$pskills',country='$pcountry',email='$pemail',psword='$ppw' Where usrky='$precid'";
                            
                            $result = $database->query($sql);                
                            
           
            }
            
            
            if($_FILES['imagefile']['name']=='') 
            {
//               /echo "no Files"; 
            }
            else
            {
                $imgData = addslashes(file_get_contents( '../photo/uploads/'.$_FILES['imagefile']['name']));
                $sqlimg="UPDATE userinfotb SET img='$imgData' Where usrky='$precid'";

                $result = $database->query($sqlimg);
                //reomve temp file
               @unlink($image_full_path);
                //echo 'No upload';
            }
//            header("Location:../register?pmode=editprofile&precid=".base64_encode($precid));
            header("Location:../index");
//            @unlink($image_full_path);
        }
        
        // retrive image details
        $pimgmode = $_GET['pimgmode'];
        $imgrecid = $_GET['imgrecid'];
        
        if($pimgmode=="img")
        {
            $sqlimg = "SELECT img FROM userinfotb where usrky ='$imgrecid'  ORDER BY usrky"; 
            
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
            date_default_timezone_set("Asia/Colombo");
            $updt =  date('y-m-d h:i:s ');
          
            $sqlsec="UPDATE userinfotb SET finact ='1' Where usrky='$preciddel'";
       
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
          
            $sqlsec="UPDATE userinfotb SET comky='$pcom' Where usrky='$precidcom'";
            
            $result = $database->query($sqlsec);
            
            echo 'ok';

       }   
?>