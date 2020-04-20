<?php
session_start();
include("../include/session.php");

include("../include/constants.php");
$a = $_POST['submit'];
if (isset($_POST['submit']) && $_POST['submit'] == 'Sign in') {
    $user=$_POST['txtuser'];
    $password=sha1($database->generaterandom('128404').$_POST['txtpassword']);
    $_SESSION['USER']=$user; 


    $arruser = $database->query("select usrky,usrid,usrnm,pw,psword,flock,disper,access,comky from userinfotb where finact = 0 and usrid='$user'");
   // echo $arruser;
    $flock = 0;
    if (1 == $database->num_rows($arruser)) {
		if($row=$database->fetch_row($arruser))
		{
//                       $userid=$row['usrid'];
//                	   $_SESSION['userid']=$userid;
//			   $_SESSION['usernm']=$row['usrnm'];
//			   $_SESSION['usrky']=$row['usrky'];
//			   $_SESSION['flock']=$row['flock'];
//			   $_SESSION['access']=$row['access']; 
//                           
                           
			  $today = date("y/m/d"); 
			  date_default_timezone_set("Asia/Colombo");
			  $tdt =  date('y-m-d h:i:s '); 
			  $sqlusr= "Update userinfotb SET lstdtm = '$tdt' where finact = 0 and  usrid='$user' ";
				
			  $resulusrt=$database->query($sqlusr);
			    
                          if($row['flock']==1)
                          {    
                                header("Location:../more-locked");
                                return false;
                          }  
                }      
    } 
    if($flock==0)
    {    
        $arruser = $database->query("select usrky,usrid,usrnm,pw,psword,disper,disdt,comky from userinfotb where finact = 0 and  usrid='$user' and psword='$password'");

        if (1 == $database->num_rows($arruser)) {

                    if($row=$database->fetch_row($arruser))
                    {
//                           $userid=$row['usrid'];
//                               $_SESSION['userid']=$userid;
//                               $_SESSION['usernm']=$row['usrnm'];
//                               $_SESSION['usrky']=$row['usrky'];
//                               $_SESSION['got_hris']=$row['got_hris'];
//                               $_SESSION['access']=$row['access'];
//                               $_SESSION['comky']=$row['comky']; 
                           
                               $disper = $row['disper'];
                               $disdt = $row['disdt']+7;
                               
                               $next_date= date('d-m-Y', strtotime($disdt. ' + '.$disper.' weeks'));
                              //echo $next_date;
                              $today = date("y/m/d"); 
                              date_default_timezone_set("Asia/Colombo");
                              $tdt =  date('y-m-d h:i:s '); 
                              
                              if($disper<>0)
                              {
                                  if($next_date>$tdt)
                                  {    
                                      header("Location:../index?msg=Your Account is Disabled. Please Contact Admin !");
                                  } 
                                  else
                                  {
                                      
                                      $_SESSION['userid']=$userid;
                                        $_SESSION['usernm']=$row['usrnm'];
                                        $_SESSION['usrky']=$row['usrky'];
                                        $_SESSION['got_hris']=$row['got_hris'];
                                        $_SESSION['access']=$row['access'];
                                        $_SESSION['comky']=$row['comky']; 
                                          // check for the remember cookies
                                        if(!empty($_POST["remember"])) {
                                               
                                                setcookie ("member_login",$_POST["txtuser"],time()+ (10 * 365 * 24 * 60 * 60));
                                                setcookie ("member_password",$_POST["txtpassword"],time()+ (10 * 365 * 24 * 60 * 60));
                                        } else {
                                                if(isset($_COOKIE["member_login"])) {
                                                        setcookie ("member_login","");
                                                }
                                                if(isset($_COOKIE["member_password"])) {
                                                        setcookie ("member_password","");
                                                }
                                        }
                                        
                                      $sqlsec="UPDATE userinfotb SET disper='0',disdt='$tdt' Where usrid='$user'";
                                      
                                      $resulusrt=$database->query($sqlsec); 
                                      header("Location:index");
                                  }    
                              }
                              else    
                              {
                                  $_SESSION['userid']=$userid;
                                        $_SESSION['usernm']=$row['usrnm'];
                                        $_SESSION['usrky']=$row['usrky'];
                                        $_SESSION['got_hris']=$row['got_hris'];
                                        $_SESSION['access']=$row['access'];
                                        $_SESSION['comky']=$row['comky'];   
                                  $sqlusr= "Update userinfotb SET lstdtm = '$tdt' where usrid='$user' ";

                                    $resulusrt=$database->query($sqlusr);

                                    // check for the remember cookies
                                    if(!empty($_POST["remember"])) {
                                            setcookie ("member_login",$_POST["txtuser"],time()+ (10 * 365 * 24 * 60 * 60));
                                            setcookie ("member_password",$_POST["txtpassword"],time()+ (10 * 365 * 24 * 60 * 60));
                                    } else {
                                            if(isset($_COOKIE["member_login"])) {
                                                    setcookie ("member_login","");
                                            }
                                            if(isset($_COOKIE["member_password"])) {
                                                    setcookie ("member_password","");
                                            }
                                    }
                                    
                                    header("Location:../index");
                              }  

                    }      
        } 
        else 
        {

            // CHECK USER LOGIN COUNT ATTEMPS
            $attempt = $_SESSION['attempt'];
            $attempt = $attempt == '' ? 0 : $attempt;
            $_SESSION['attempt'] = ++$attempt;

            if (3 <= $attempt) {
                date_default_timezone_set("Asia/Colombo");
                $bltdt =  date('y-m-d h:i:s ');
                $sqlsec="UPDATE userinfotb SET disper='1',disdt='$bltdt' Where usrid='$user'";
                $resulusrt=$database->query($sqlsec);
                $_SESSION['attempt'] =0;
                header("Location:../index?msg=Your Account Blocked. Please Contact Admin !");
            } else {
                header("Location:../index?msg=User ID  Or Password Incorrect !");
            }
        }
    }    
} 
else {
header("Location:../index?msg=Error In login to the system");
}
?>
