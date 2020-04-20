<?php 
	include("../include/session.php");
	include("../include/constants.php");
        global $database,$session;
	$usrky = $database->sesUsrKy();
        $pcomky = $_GET['pcomky'];
        $pmode=$_POST['pmode'];
        $pmode = $_GET['pmode'];
	$pitmcd  = $_POST['txtitmcd'];
	$pitmnm = $_POST['txtitmnm'];
        $pshortdesc = $_POST['txtshortdesc'];
        $prem = $_POST['txtrem'];
        $pmrg = $_POST['txtmrg'];
        $pvaldt = $_POST['txtvaldt'];
        $pvalrem = $_POST['txtvalrem'];
        $pbalstk = $_POST['txtbalstk'];
        $pstno=$_POST['txtstno'];
        $plstno=$_POST['txtlstno'];
        $precid =$_POST['txtitmky'];
        $pcatid =$_POST['selcat'];
        $pprotype =$_POST['seltype'];
        $pcomky =$_POST['selcom'];
        $aprice = $_POST['txtprice'];
        $cprice = $_POST['txtchprice'];
        $sprice = $_POST['txtscprice'];
        $state = $_POST['selprodstate'];
        $days = $_POST['txtdays'];
        $agegrp = $_POST['selagegrp'];
        
        
        if($pmode=="product")
        {    
           
            $final_save_dir = '../photo/products/';
            move_uploaded_file($_FILES['imagefile1']['tmp_name'], $final_save_dir . $_FILES['imagefile1']['name']);
            move_uploaded_file($_FILES['imagefile2']['tmp_name'], $final_save_dir . $_FILES['imagefile2']['name']);
            move_uploaded_file($_FILES['imagefile3']['tmp_name'], $final_save_dir . $_FILES['imagefile3']['name']);
            move_uploaded_file($_FILES['imagefile4']['tmp_name'], $final_save_dir . $_FILES['imagefile4']['name']);
           
            //$image_full_path = $final_save_dir . $_FILES['imagefile']['tmp_name'];
            //$image = file_get_contents ($_FILES['imagefile']['tmp_name']);
            //$image = addslashes(file_get_contents($_FILE['imagefile']['tmp_name']));
            //echo $image_full_path ;
            if($precid==0)
                {
                            $pEntDtm = date('y/m/d');

                            $sql1 = "INSERT INTO itmmastbl(itmcd,itmnm,description,shortdesc,catid,comky,"
                                    . "promrg,unit,balqty,validdt,validrem,stno,lstno,entdtm,itmpric,itmcpric,itmspric,state,agegrp,days) VALUES('$pitmcd','$pitmnm','$prem','$pshortdesc',"
                                    . "'$pcatid','$pcomky','$pmrg','$pprotype','$pbalstk','$pvaldt','$pvalrem','$pstno','$plstno','$pEntDtm','$aprice','$cprice','$sprice','$state','$agegrp','$days')";
                            //echo $sql1;       
                            $result = $database->query($sql1);
                            $precid = $database->getRecID();
            }
            else
            {   
                            $sql="UPDATE itmmastbl SET itmcd='$pitmid',itmnm='$pitmnm',description='$prem',shortdesc='$pshortdesc',days,'$days',
                                    catid='$pcatid',promrg='$pmrg',unit='$pprotype',balqty='$pbalstk',validdt='$pvaldt',validrem='$pvalrem',"
                                    . "stno='$pstno',lstno='$plstno',comky='$pcomky',itmpric='$aprice',itmcpric='$cprice',itmspric='$sprice',state='$state',agegrp='$agegrp' Where itmky='$precid'";
                            
                            $result = $database->query($sql);                
                            
           
            }
            
            $postimg = 0;
            $imgData ="finact = 0";
            if($_FILES['imagefile1']['name']=='') 
            {
            }
            else
            {
                $imgData = $imgData.",img1='".$_FILES['imagefile1']['name']."'";
                $postimg = 1;
            }
            if($_FILES['imagefile2']['name']=='') 
            {
            }
            else
            {
                $imgData = $imgData.",img2='".$_FILES['imagefile2']['name']."'";
                $postimg = 1;
            }
            if($_FILES['imagefile3']['name']=='') 
            {
            }
            else
            {
                $imgData = $imgData.",img3='".$_FILES['imagefile3']['name']."'";
                $postimg = 1;
            }
            if($_FILES['imagefile4']['name']=='') 
            {
            }
            else
            {
                $imgData = $imgData.",img4='".$_FILES['imagefile4']['name']."'";
                $postimg = 1;
            }
            
            if($postimg==1)
            {
                // Saving the image details
//                echo $imgData;
                $sqlimg="UPDATE itmmastbl SET ".$imgData." Where itmky='$precid'";
//                echo $sqlimg;
                $result = $database->query($sqlimg);
                
            }    
            header("Location:../form-company?precid==".base64_encode($pcomky));
//            header("Location:../form-company?precid=editproduct&precid=");
            
            @unlink($image_full_path);
        }
        
        // retrive image details
        $pimgmode = $_GET['pimgmode'];
        $imgrecid = (($_GET['imgrecid']));
        
        if($pimgmode=="img")
        {
            $sqlimg = "SELECT img FROM itmmastbl where itmky ='$imgrecid'  ORDER BY itmky"; 
            
            
            $result = $database->query($sqlimg);
            $rowimg =  $database->fetch_set($result);

            $contenttype = 'image/jpeg';//$row["image_type"];
            $image = $rowimg["img"];


            header("Content-type: $contenttype"); 

            echo $image;
        }    
        
       
       
       // delete a user
       if($pmode=="deleteuser")
       {    
            $preciddel = $_GET['precid'];
            
            $sqlsec="UPDATE itmmastbl SET finact ='1' Where itmky='$preciddel'";
       
            $result = $database->query($sqlsec);
            
            echo 'ok';

       }
    
?>