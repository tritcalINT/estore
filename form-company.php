<?php
//session_start();

include("include/session.php");
include("include/constants.php");
if (!$database->chkLogin()) {
 //   $database->usrLogOut(0);
}

$pmode = $_GET["pmode"];
$usrky = $database->sesUsrKy();
$access = $database->getusrmenuper($usrky, "access");
$precid = intval(base64_decode($_GET['precid']));

if($access==2)
{
    $heading = 'Supplier.';
        
} 
else if ($access==1)
{
    $heading = "Agent";
    
}
else if ($access==-1)
{
    $heading = "Company";
    
}    
//echo $usrky;
//echo $pmode;
if($pmode=="editprofile")
{    
    if($precid==0 || $precid=="")
    {    
        $precid = $database->getusrmenuper($usrky, "comky");
    }    
}    
else
{    
   $precid = intval(base64_decode($_GET['precid']));
}    

if($pmode=="editprofileitem")
{    
   $recitmid = intval(base64_decode($_GET['precid']));
} 

//echo "jkkasjdkfljasldkjflkajsdklfjkasdljfklasdjfkljasdklfjlk".$precid;
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo PG_HEAD; ?>  | Home : Suppliers Information</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" href="build/css/intlTelInput.css">
  <!--<link rel="stylesheet" href="build/css/demo.css">-->
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!--Scroll Top-->
<link rel="stylesheet" href="scrolltop/style.css">
 
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!--<script src="js/simpleCart.min.js"> </script>-->
<script src="js/amcharts.js"></script>	
<script src="js/serial.js"></script>	
<script src="js/light.js"></script>	
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<!--pie-chart--->
<script src="js/pie-chart.js" type="text/javascript"></script>
<!-- common my friendholiday -->
<script src="js/common-mfh.js" type="text/javascript"></script>
<script src="js/modernizr.custom.63321.js"></script>   
 <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->



  <script src="build/js/intlTelInput.js"></script>
 <script type="text/javascript">
        $(document).ready(function () {
            refrehCart();
            initScroll() ;
            if($('#txtcomky').val()!=0)
            {
                loadprofilepic();
            }
             //load state   
                        getstateonly("MY");
         code = $('#simg').val();
      
         $("#txttp1").intlTelInput({
       allowDropdown: false,
       autoPlaceholder: true,
       dropdownContainer: "body",
       formatOnDisplay: true,
       initialCountry: "auto",
       onlyCountries: [code],
       placeholderNumberType: "MOBILE",
       separateDialCode: true,
      utilsScript: "build/js/utils.js"
    });

$("#txttp2").intlTelInput({
       allowDropdown: false,
       autoPlaceholder: true,
       dropdownContainer: "body",
       formatOnDisplay: true,
       initialCountry: "auto",
       onlyCountries: [code],
       placeholderNumberType: "MOBILE",
       separateDialCode: true,
      utilsScript: "build/js/utils.js"
    });

$("#txttp1").intlTelInput("setCountry", code);
$("#txttp2").intlTelInput("setCountry", code);


       
        });
        
        
        //    Close companyuser profile 
function refreshpass()
{
       if($('#txtcomky').val()!=0)
       {
            //$("#imgprofile").attr("src", "controllers/company_control.php?pimgmode=img&imgrecid="+$('#txtcomky').val());
        }     
}
        
    </script>
</head> 
<body onload="refreshpass()">
    
    <?php
{ 
	global $session,$database;
        $recid= $precid;
        if(!$recid)
        {
                $recid= 0; 
                $cat= 1;
                $dis=0;
                $country="MY";
                $recitmid = 0;

        }
        else
        {
                   
                    $sql = 'Select comky,comcd,comnm,add1,add2,town,city,country,tp1,tp2,email,pcomky,web,vatno,regno,img,amt,apamt,payamt,vatamt,nbtamt,vatper,nbtper,grsamt,cdate FROM companytb  where comky ='.$precid;

                    $resulthd = $database->query($sql);
                    $rowhd =  $database->fetch_set($resulthd);

                    $comcd= $rowhd['comcd']; 
                    $comnm= $rowhd['comnm']; 
                    $add1= $rowhd['add1'];
                    $add2= $rowhd['add2'];
                    $town= $rowhd['town'];
                    $city= $rowhd['city'];
                    $country= $rowhd['country'];
                    $tp1= $rowhd['tp1'];
                    $tp2= $rowhd['tp2'];
                    $email= $rowhd['email'];
                    $web= $rowhd['web'];
                    $vatno= $rowhd['vatno'];
                    $regno= $rowhd['regno'];
                    $pcompky=$rowhd['pcomky'];
                    $grsamt = $rowhd['grsamt'];
                    $vatamt = $rowhd['vatamt'];
                    $vatper = $rowhd['vatper'];
                    $nbtper = $rowhd['nbtper'];
                    $nbtamt = $rowhd['nbtamt'];
                    $payamt = $rowhd['payamt'];
                    $apamt = $rowhd['apamt'];
                    $amt = $rowhd['amt'];
                    $cdate = $rowhd['cdate'];
                  
                    
                    
        }			

}

							
	/*$resultsubdep = $database->query('SELECT CdMasTb.Code AS Code,CdMasTb.CdNm AS CdNm,CdMasTb.CdKy AS CdKy,CdMasTb.ConCd AS 		               ConCd,BUMas.BuKy AS BuKy FROM BUMas INNER JOIN
               CdMasTb ON BUMas.SubBuKy = CdMasTb.CdKy
			   WHERE BUMas.BuKy ="'.$depcode.'" AND CdMasTb.ConCd = "BU" ');*/

?>
   <div class="page-container">
   <!--/content-inner-->
   
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">
			<!-- top_bg -->
                        <?php $database->menutopbr();?>	
                        <!-- /top_bg -->
                        </div>
				<div class="header_bg">
							<div class="header">
                                                        <?php $database->funhearder();?>
						</div>
				</div>
					<!-- //header-ends -->
				<!--content-->
			<div class="content">
				<div class="women_main">
						<!-- start content -->
                                <div class="tab-main">
                                        <!--/tabs-inner-->
                                                <div class="tab-inner">
                                                        <div id="tabs" class="tabs">
                                                                <h2 class="inner-tittle"><?php echo $heading.' Details' ;?> </h2>
                                                                        <div class="graph">
                                                                                <nav>
                                                                                        <ul>
                                                                                            <?php $database->loadcompanytab($usrky,$pmode) ?>   
                                                                                        </ul>
                                                                                </nav>

                                                                            <div class="content tab">
                                                                               
    <section id="section-1" class="content-current">
        
        <div class="graph-2">
            
            <div class="panel panel-primary">
                            <!--<div class="panel-body ont"><p>Panel Content Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd.radish garlic brussels Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. earthnut pea radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd.tomato spring onion azuki bean gourd.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>-->

                        <div class="grids">
                            <div class="panel panel-widget forms-panel">
                                <div class="forms">
                                    <div class="form-grids " data-example-id="basic-forms"> 
                                        <div class="form-title">
                                                <h4><?php echo $heading.' Registration Form ' ?> :</h4>
                                        </div>
                                        <div class="form-body">
                                            <form id="formapplication"  name="formapplication"  enctype="multipart/form-data" method="POST" action="controllers/company_control.php?pmode=userinfo"   class="validation-grids-right" onsubmit="funcUploadImg(this);return false;">
                                                     <input type="hidden" readonly="true" name="txtcomky" id="txtcomky" value ="<?php echo $recid  ?> ">
                                                     <input type="hidden" readonly="true" name="txthcomky" id="txthcomky" value ="<?php echo $_GET['precid']  ?> ">
                                                     
                                                    <div class="form-group"> 
                                                        <label for="txtcomid">Company Id:</label> 
                                                        <!--<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">--> 
                                                        <input type="text" name="txtcomid" id="txtcomid" placeholder="Company Id" class='form-control' required="true"  value="<?php echo $comcd ?>">
                                                    </div> 
                                                    
                                                    
                                                     <div class="form-group">
                                                                            <label for="name" class="">Company Name:</label>
                                                                            <div class="controls">
                                                                                <input type="text" required="true" name="txtcomnm" placeholder="Company Name" id="txtcomnm" class='form-control'  value="<?php echo $comnm ?>">
                                                                            </div>
                                                                    </div>
                                                     
                                                                    <div class="form-group">
                                                                            <label for="country" class="">Country:</label>
                                                                            <div class="controls">
                                                                                <select name="s2" id="simg" class='select2-me form-control' onChange="getstate(this.value)">
                                                                                    <?php $database->getCountries($country);?>
                                                                                </select>
                                                                                
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label for="name" class="">State:</label>
                                                                            <div class="controls">
                                                                                <!--<input type="text" required="true" name="txttown" placeholder="Town" id="txttown" class='form-control'  value="<?php echo $town ?>">-->
                                                                                <select name="txttown" id="txttown" class='select2-me form-control' onChange="getcities(this.value)">
                                                                                    
                                                                                </select>
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label for="name" class="">City:</label>
                                                                            <div class="controls">
                                                                                <!--<input type="text" required="true" name="txtcity" placeholder="City" id="txtcity" class='form-control'  value="<?php echo $city ?>">-->
                                                                                <select name="txtcity" id="txtcity" class='select2-me form-control'>
                                                                                    
                                                                                </select>
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label for="name" class="">Address Line 1:</label>
                                                                            <div class="controls">
                                                                                <input type="text" required="true" name="txtadd1" placeholder="Address Line 1" id="txtadd1" class='form-control'  value="<?php echo $add1 ?>">
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label for="name" class="">Address Line 2:</label>
                                                                            <div class="controls">
                                                                                <input type="text" required="true" name="txtadd2" placeholder="Address Line 2" id="txtadd2" class='form-control'  value="<?php echo $add2 ?>">
                                                                            </div>
                                                                    </div>
                                                                   

                                                                    <div class="form-group">
                                                                            <label for="name" class="">Telephone:</label>
                                                                            <div class="controls">
                                                                                
                                                                                <input type="text" required="true" name="txttp1" placeholder="Telephone" id="txttp1" class='form-control'  value="<?php echo $tp1 ?>">
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label for="name" class="">Fax / Tele:</label>
                                                                            <div class="controls">
                                                                                <input type="text" required="true" name="txttp2" placeholder="Fax / Tele" id="txttp2" class='form-control'  value="<?php echo $tp2 ?>">
                                                                            </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                            <label for="name" class=""> Web Address:</label>
                                                                            <div class="controls">
                                                                                <input type="text" required="true" name="txtweb" placeholder="Web Address" id="txtweb" class='form-control'  value="<?php echo $web ?>">
                                                                            </div>
                                                                    </div>


                                                                    <div class="form-group">
                                                                            <label for="email" class="">Email:</label>
                                                                            <div class="controls">
                                                                                    <input type="email" name="txtemail" id='txtemail' data-rule-email="true" placeholder="Email Address" class='form-control email' value="<?php echo $email ?>">
                                                                                   
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label for="name" class=""> Com. Registration No:</label>
                                                                            <div class="controls">
                                                                                <input type="text" required="true" name="txtregno" placeholder="Com. Registration No:" id="txtregno" class='form-control'  value="<?php echo $regno ?>">
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label for="name" class=""> VAT No:</label>
                                                                            <div class="controls">
                                                                                <input type="text" required="true" name="txtvatno" placeholder="VAT N0" id="txtvatno" class='form-control'  value="<?php echo $vatno ?>">
                                                                        </div>
                                                                    </div>
                                                     
                                                    <div class="form-group"> 
                                                        <label for="exampleInputFile">Company Logo</label> 
                                                        <input type="file" name='imagefile' id='imagefile'> 
                                                        <p class="help-block">Select the company logo.</p> 
                                                        <div class="fileupload-new thumbnail" style="max-width: 110px; max-height: 118px;">
                                                            <img id="imgprofile" src="img/demo/noimage.png" height="100" width="100"/>
                                                        </div>
                                                    </div> 
                                                    <div class="checkbox"> 
                                                        <label> <input type="checkbox" required="true" > I agree that all the above details are true and accurate </label> 
                                                    </div> 
                                                   <div class="form-actions">
                                                        <button type="submit" id="submitprofile" class="btn btn-primary" onclick="" >Save Company Information</button>
                                                        <button type="button" class="btn" onclick="closeapplication();">Close Company Profile</button>
                                                    </div>
                                                </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                </div>
            </div>
        </div>
        
    </section>
                                                                                
    <section id="section-2" >
                                                                                                                    <!--Section Items-->
 
        <div class="graph-2">
            
            <div class="panel panel-primary">
                            <!--<div class="panel-body ont"><p>Panel Content Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd.radish garlic brussels Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. earthnut pea radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd.tomato spring onion azuki bean gourd.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>-->

                        <div class="grids">
                            <div class="panel panel-widget forms-panel">
                                <div class="forms">
                                    <div class="form-grids " data-example-id="basic-forms"> 
                                        <div class="form-title">
                                                <h4>Product Form :</h4>
                                        </div>
                                        <div class="form-body">
                                            <form id="formproduct"  name="formproduct"  enctype="multipart/form-data" method="POST"  action="controllers/product_control.php?pmode=product"   class="validation-grids-right" onsubmit="funsaveproducts(this);return false;">
                                                     <input type="hidden" readonly="true" name="txtitmky" id="txtitmky" value ="<?php echo $recitmid  ?> ">
                                                    <div class="form-group"> 
                                                        <label for="txtitmcd">Product Id:</label> 
                                                        <!--<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">--> 
                                                        <input type="text" name="txtitmcd" id="txtitmcd" placeholder="Product Id" class='form-control' required="true"  size="20" value="<?php echo $itmcd ?>">
                                                    </div> 
                                                    
                                                    
                                                     <div class="form-group">
                                                                            <label for="txtitmnm" class="">Product Name:</label>
                                                                            <div class="controls">
                                                                                <input type="text" required="true" name="txtitmnm" placeholder="Product Name" id="txtitmnm" class='form-control'  value="<?php echo $itmnm ?>">
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label for="txtshortdesc" class="">Short Description:</label>
                                                                            <div class="controls">
                                                                                <input type="text" required="true" name="txtshortdesc" placeholder="Short Description" id="txtshortdesc" class='form-control'  value="<?php echo $shortdesc ?>">
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label for="txtrem" class="">Detail Description</label>
                                                                            <div class="controls">
                                                                                <textarea name="txtrem" id="txtrem" rows="10" class="form-control textarea " placeholder="Details Description"><?php echo $rem ?></textarea>
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label for="selcat" class="">Product Category:</label>
                                                                            <div class="controls">
                                                                                <select name="selcat" id="selcat">
                                                                                                        <?php
                                                                                                          $database->loadprodcat($catky);
                                                                                                        ?>
                                                                                                        
                                                                                </select>
                                                                            </div>
                                                                    </div>
                                                     
                                                                    <div class="form-group">
                                                                            <label for="seltype" class="">Product Category:</label>
                                                                            <div class="controls">
                                                                                <select name="seltype" id="seltype">
                                                                                                        <?php
                                                                                                          $database->loadprodtype($unit);
                                                                                                        ?>
                                                                                                        
                                                                                </select>
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <div class="form-group col-lg-3">
                                                                            <label for="txtprice" class="">Price (Qty/Adult)</label>
                                                                            <div class="controls">
                                                                                <input type="number" required="true" name="txtprice" placeholder="Price" id="txtprice" class='form-control'  value="<?php echo $price ?>">
                                                                              
                                                                            </div>
                                                                    </div>
                                                     
                                                                    <div class="form-group col-lg-3">
                                                                            <label for="txtprice" class="">Child</label>
                                                                            <div class="controls">
                                                                                <input type="number" required="true" name="txtchprice" placeholder="Child Price" id="txtchprice" class='form-control'  value="<?php echo $price ?>">
                                                                                
                                                                            </div>
                                                                    </div>
                                                     
                                                                    <div class="form-group col-lg-3">
                                                                            <label for="txtprice" class="">Snr.Citizen</label>
                                                                            <div class="controls">
                                                                                <input type="number" required="true" name="txtscprice" placeholder="Snr.Citizen" id="txtscprice" class='form-control'  value="<?php echo $price ?>">
                                                                                
                                                                            </div>
                                                                    </div>
                                                                                       
                                                                    <div class="form-group col-lg-3">
                                                                            <label for="txtmrg" class="">Profit Margin</label>
                                                                            <div class="controls">
                                                                                <input type="number" required="true" name="txtmrg" placeholder="Profit Margin" id="txtmrg" class='form-control'  value="<?php echo $mrg ?>">
                                                                                
                                                                            </div>
                                                                    </div>
                                                                   
                                                                        </div>
                                                                    <div class="form-group">
                                                                            <label for="txtvaldt" class="">Product Valid Date</label>
                                                                            <div class="controls">
                                                                                <input type="date" required="true" name="txtvaldt" placeholder="Validity of the Product/Offier" id="txtvaldt" class='form-control'  value="<?php echo $valdt ?>">
                                                                            </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                            <label for="txtvalrem" class="">Validity Remark</label>
                                                                            <div class="controls">
                                                                                <input type="text" required="true" name="txtvalrem" placeholder="Validity remark" id="txtvalrem" class='form-control'  value="<?php echo $valrem ?>">
                                                                            </div>
                                                                    </div>

                                                                    <div class="form-group col-lg-3">
                                                                            <label for="txtbalstk" class="">Balance Qty:</label>
                                                                            <div class="controls">
                                                                                <input type="text" required="true" name="txtbalstk" placeholder="Balance Stock" id="txtbalstk" class='form-control'  value="<?php echo $balstk ?>">
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group col-lg-3">
                                                                            <label for="txtstno" class="">Starting Serial No:</label>
                                                                            <div class="controls">
                                                                                    <input type="text" name="txtstno" id='txtstno'  placeholder="Starting No" class='form-control' value="<?php echo $stno ?>">
                                                                                    
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group col-lg-3">
                                                                            <label for="txtlstno" class=""> Last Serial No:</label>
                                                                            <div class="controls">
                                                                                <input type="text" required="true" name="txtlstno" placeholder="Last Issued No" id="txtlstno" class='form-control'  value="<?php echo $lstno ?>">
                                                                            </div>
                                                                    </div>
                                                                    
                                                                    
                                                     
                                                     
                                                    <div class="clearfix"> </div>
                                                    
                                                    <div class="form-group col-lg-3">
                                                            <label for="txtlstno" class=""> Age Group:</label>
                                                            <div class="controls">
                                                                <select name="selagegrp" id="selagegrp" class='select2-me form-control' onChange="getcities(this.value)">
                                                                        <option value="0" >Any</option>
                                                                        <option value="1" >Between 3-9</option>
                                                                        <option value="2" >Between 10-19</option>
                                                                        <option value="3" >Between 20-29</option>
                                                                        <option value="4" >Between 30-39</option>
                                                                        <option value="5" >Above 40</option>
                                                                                    
                                                                </select>
                                                                
                                                                
                                                            </div>
                                                    </div>
                                                    
                                                    <div class="form-group col-lg-3">
                                                            <label for="txtlstno" class=""> Days:</label>
                                                            <div class="controls">
                                                                <input type="number" name="txtdays" id="txtdays" class='form-control'> 
                                                                
                                                            </div>
                                                    </div>
                                                    <div class="form-group col-lg-3">
                                                            <label for="txtlstno" class=""> State:</label>
                                                            <div class="controls">
                                                                <select name="selprodstate" id="selprodstate" class='select2-me form-control' onChange="getcities(this.value)">
                                                                                    
                                                                </select>
                                                            </div>
                                                    </div>
                                                                    
                                                    
                                                    <div class="clearfix"> </div>  
                                                     <div class="form-group ">
                                                        <label for="selcom" class=""> Company:</label>
                                                        <div class="controls">
                                                            <select name="selcom" id="selcom">
                                                                <?php
                                                                    $database->loadcomlist($pcomky)
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div> 
                                                    
                                                    <div class="form-group"> 
                                                        <label for="exampleInputFile">Product Logo</label> 
                                                        
                                                        <p class="help-block">Select the Product logo.</p> 
                                                        <ul class="qty">
                                                            <li><p><input type="file" name='imagefile1' id='imagefile1'></p> <div class="fileupload-new thumbnail" style="max-width: 110px; max-height: 118px;"><img id="imgitm1" src="img/demo/noimage.png" height="100" width="100"/></div></li>
                                                            <li><p><input type="file" name='imagefile2' id='imagefile2'></p> <div class="fileupload-new thumbnail" style="max-width: 110px; max-height: 118px;"><img id="imgitm2" src="img/demo/noimage.png" height="100" width="100"/></div></li>
                                                            <li><p><input type="file" name='imagefile3' id='imagefile3'></p> <div class="fileupload-new thumbnail" style="max-width: 110px; max-height: 118px;"><img id="imgitm3" src="img/demo/noimage.png" height="100" width="100"/></div></li>
                                                            <li><p><input type="file" name='imagefile4' id='imagefile4'></p> <div class="fileupload-new thumbnail" style="max-width: 110px; max-height: 118px;"><img id="imgitm4" src="img/demo/noimage.png" height="100" width="100"/></div></li>
                                                        </ul>
                                                    </div> 
                                                    <div class="checkbox"> 
                                                        <label> <input type="checkbox" required="true" > I agree that all the above details are true and accurate </label> 
                                                    </div> 
                                                   <div class="form-actions">
                                                        <button type="submit" id="submitprofile" class="btn btn-primary" onclick="" >Save Product Information</button>
                                                        <button type="button" class="btn" onclick="closeapplication();">Close Product Information</button>
                                                    </div>
                                                </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                </div>
            </div>
        </div>
        
  
                                                                                                                </section>
                                                                                                            
                                                                                                                <section id="section-3">
                                                                                                                    
                                                                                                                </section>
                                                                                                                <section id="section-4">
                                                                                                                    
                                                                                                                </section>
																	
													</div><!-- /content -->
												</div>
												<!-- /tabs -->
											</div>
										<script src="js/cbpFWTabs.js"></script>
									<script>
										new CBPFWTabs( document.getElementById( 'tabs' ) );
									</script>
										
										
									
									
										<div class="clearfix"> </div>
								</div>
							</div>
	<!-- end content -->
	<div class="foot-top">
				<!--calling the top footers-->
				<?php $database->topfooter();?>	
				<!--End top footer-->
        </div>
        <div class="footer">
                <!--Footer function-->
                <?php $database->funfooter();?>
                <!--End footer function-->
        </div>
</div>
</div>
			<!--content-->
		</div>
</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
                        <div class="sidebar-menu">
                            <!--Calling side menu-->
                            <?php $database->sidemenu();?>
                            <!--End side menu-->
                        </div>
							  <div class="clearfix"></div>	
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->

<!--js -->
<!--<script src="js/jquery.nicescroll.js"></script>-->
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
   <!-- real-time -->
<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
	<script type="text/javascript">

	$(function() {

		// We use an inline data source in the example, usually data would
		// be fetched from a server

		var data = [],
			totalPoints = 300;

		function getRandomData() {

			if (data.length > 0)
				data = data.slice(1);

			// Do a random walk

			while (data.length < totalPoints) {

				var prev = data.length > 0 ? data[data.length - 1] : 50,
					y = prev + Math.random() * 10 - 5;

				if (y < 0) {
					y = 0;
				} else if (y > 100) {
					y = 100;
				}

				data.push(y);
			}

			// Zip the generated y values with the x values

			var res = [];
			for (var i = 0; i < data.length; ++i) {
				res.push([i, data[i]])
			}

			return res;
		}

		// Set up the control widget

		var updateInterval = 30;
		$("#updateInterval").val(updateInterval).change(function () {
			var v = $(this).val();
			if (v && !isNaN(+v)) {
				updateInterval = +v;
				if (updateInterval < 1) {
					updateInterval = 1;
				} else if (updateInterval > 2000) {
					updateInterval = 2000;
				}
				$(this).val("" + updateInterval);
			}
		});

		var plot = $.plot("#placeholder", [ getRandomData() ], {
			series: {
				shadowSize: 0	// Drawing is faster without shadows
			},
			yaxis: {
				min: 0,
				max: 100
			},
			xaxis: {
				show: false
			}
		});

		function update() {

			plot.setData([getRandomData()]);

			// Since the axes don't change, we don't need to call plot.setupGrid()

			plot.draw();
			setTimeout(update, updateInterval);
		}

		update();

		// Add the Flot version string to the footer

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
<!-- /real-time -->
<script src="js/jquery.fn.gantt.js"></script>
    <script>

		$(function() {
//
//			"use strict";
//
//			$(".gantt").gantt({
//				source: [{
//					name: "Sprint 0",
//					desc: "Analysis",
//					values: [{
//						from: "/Date(1320192000000)/",
//						to: "/Date(1322401600000)/",
//						label: "Requirement Gathering", 
//						customClass: "ganttRed"
//					}]
//				},{
//					name: " ",
//					desc: "Scoping",
//					values: [{
//						from: "/Date(1322611200000)/",
//						to: "/Date(1323302400000)/",
//						label: "Scoping", 
//						customClass: "ganttRed"
//					}]
//				},{
//					name: "Sprint 1",
//					desc: "Development",
//					values: [{
//						from: "/Date(1323802400000)/",
//						to: "/Date(1325685200000)/",
//						label: "Development", 
//						customClass: "ganttGreen"
//					}]
//				},{
//					name: " ",
//					desc: "Showcasing",
//					values: [{
//						from: "/Date(1325685200000)/",
//						to: "/Date(1325695200000)/",
//						label: "Showcasing", 
//						customClass: "ganttBlue"
//					}]
//				},{
//					name: "Sprint 2",
//					desc: "Development",
//					values: [{
//						from: "/Date(1326785200000)/",
//						to: "/Date(1325785200000)/",
//						label: "Development", 
//						customClass: "ganttGreen"
//					}]
//				},{
//					name: " ",
//					desc: "Showcasing",
//					values: [{
//						from: "/Date(1328785200000)/",
//						to: "/Date(1328905200000)/",
//						label: "Showcasing", 
//						customClass: "ganttBlue"
//					}]
//				},{
//					name: "Release Stage",
//					desc: "Training",
//					values: [{
//						from: "/Date(1330011200000)/",
//						to: "/Date(1336611200000)/",
//						label: "Training", 
//						customClass: "ganttOrange"
//					}]
//				},{
//					name: " ",
//					desc: "Deployment",
//					values: [{
//						from: "/Date(1336611200000)/",
//						to: "/Date(1338711200000)/",
//						label: "Deployment", 
//						customClass: "ganttOrange"
//					}]
//				},{
//					name: " ",
//					desc: "Warranty Period",
//					values: [{
//						from: "/Date(1336611200000)/",
//						to: "/Date(1349711200000)/",
//						label: "Warranty Period", 
//						customClass: "ganttOrange"
//					}]
//				}],
//				navigate: "scroll",
//				scale: "weeks",
//				maxScale: "months",
//				minScale: "days",
//				itemsPerPage: 10,
//				onItemClick: function(data) {
//					alert("Item clicked - show some details");
//				},
//				onAddClick: function(dt, rowId) {
//					alert("Empty space clicked - add an item!");
//				},
//				onRender: function() {
//					if (window.console && typeof console.log === "function") {
//						console.log("chart rendered");
//					}
//				}
//			});
//
//			$(".gantt").popover({
//				selector: ".bar",
//				title: "I'm a popover",
//				content: "And I'm the content of said popover.",
//				trigger: "hover"
//			});

			prettyPrint();
                        
                      

                        });

    </script>
    
<script src="js/jquery.nicescroll.js"></script>		
<script src="js/menu_jquery.js"></script>

  
</body>
</html>