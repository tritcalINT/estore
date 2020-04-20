<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include('include/sessions.php');
include('include/database.php');
$pcatid=$_GET['pcatid'] == '' ? 0 : base64_decode($_GET['pcatid']);
$psrchtxt=$_GET['srchtxt'] == '' ? 0 : $_GET['srchtxt'];
$pnew=$_GET['$pnew'] == '' ? 0 : $_GET['$pnew'];
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo PG_HEAD; ?>  | Home :: Products </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico" />
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!--Scroller top_-->
<link href="scrolltop/style.css" rel="stylesheet" type="text/css" />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<script src="js/simpleCart.min.js"> </script>
<script src="js/amcharts.js"></script>	
<script src="js/serial.js"></script>	
<script src="js/light.js"></script>	
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>

<!--	<script type="text/javascript" >
		
		function addToCart(itmky, qty, hqty){

			if(itmky == ''){
				alert('Item Key Cannot Be Blank !');
				return;
			}

			if(qty == '' &&  hqty == ''){
				alert('Quantity Cannot Be Blank !');
				return;
			}

			var url = 'controllers/cart_controller?mode=addToCart';
			url += '&itmky=' + itmky;
			url += '&qty=' + qty;
			url += '&hqty=' + hqty;

			$.ajax({
				type: 'GET',
				url: url,
				data: null,
				dataType: 'html',
				success: function(data){
					$('#resp').html(data);
					refrehCart();
				}
			});

		}

		function refrehCart(){
			var url = 'controllers/cart_controller?mode=showCart';
			$.ajax({
				type: 'GET',
				url: url,
				data: null,
				dataType: 'html',
				success: function(data){
					$('#cartdiv').html(data);
				}
			});
		}

		function emptyCart(){
			var url = 'controllers/cart_controller?mode=emptyCart';
			$.ajax({
				type: 'GET',
				url: url,
				data: null,
				dataType: 'html',
				success: function(data){
					$('#cartdiv').html('');
				}
			});
		}

	</script>-->

   <!--pie-chart-->
<script src="js/common-mfh.js" type="text/javascript"></script>
<script src="js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            refrehCart()    ;
            initScroll() ;
           
        });

    </script>
</head> 
<body>
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

   <div class="w_content">
		<div class="women">
			<a href="#"><h4><?php echo $database->getcatnm($pcatid);?> - <span><?php echo $database->getcatrec($pcatid);?>  items</span> </h4></a>
			<ul class="w_nav">
						<li>Sort : </li>
		     			<li><a class="active" href="#">popular</a></li> |
		     			<li><a href="#">new </a></li> |
		     			<li><a href="#">discount</a></li> |
		     			<li><a href="#">price: Low High </a></li> 
		     			<div class="clear"></div>
                                       
		     </ul>
		     <div class="clearfix"></div>	
		</div>
		<!-- grids_of_4 -->
<!--		//<div class="grids_of_4">-->
                     
                   
		<?php

			$data = $database->listAllItems(0,$pcatid,$psrchtxt,$pnew);
			$i = 0;
                        $cnt = 1;
			while ($row = $database->fetch_set($data)) {
                                if($cnt==1)
                                {
                                    echo '<div class="grids_of_4">';
                                    
                                }        
				$qtyid = 'qty'.$i;
				$hqtyid = 'hqty'.$i;
                                $text = $row['shortdesc'] ;
                                $unit = $row['unit'] ;
                                
                                if($unit=="QUANTITY"){ $strplchold ="Quantity";}else{$strplchold ="Full Quantity";}
                                $itemnm = wordwrap($text, 35, "<br />\n");
                                $strdet = "details?pitmky=".base64_encode($row['itmky'])."pele=". base64_decode($i);
                                
				echo '<div class="grid1_of_4">
				<div class="content_box"><a href="'.$strdet.'">';
			   	   	  echo "<img style='width: 175px; height: 175px;' src='./photo/products/" . $row['img1']. "' alt='". $row['itmnm'] . "'>";
				   	  echo '</a>
				    <h4><a href="'.$strdet.'"> '. $row['itmnm'] .'</a></h4>
				     <p>'.$itemnm.'</p>
					 <div class="grid_1 simpleCart_shelfItem">
				    
					 <div class="item_add"><span class="item_price"><h6>ONLY '. $row['itmpric'] .'</h6></span></div>
					 <div class="item_add"><input type="number" class="form-control1 input-sm" id="'.$qtyid.'" placeholder="'.$strplchold.'" ></div>';
					 
                                        if($unit=='TICKET')
                                        { echo '<div class="item_add"><input type="number" class="form-control1 input-sm" id="'.$hqtyid.'" placeholder="Half Quantity." ></div>';}
                                        else
                                        { echo '<div class="item_add"><input type="hidden" class="form-control1 input-sm" id="'.$hqtyid.'" placeholder="Half Quantity." ></div>';}    
					echo '<div class="item_add"><span class="item_price"><a href="javascript:void(0);" 
					onclick="addToCart('. $row['itmky'] .', $(\'#'.$qtyid.'\').val(), $(\'#'.$hqtyid.'\').val());" >Add to Cart</a></span></div>
					 </div>
			   	</div>
			</div>
		';
			++$i;
                        
                         $cnt=$cnt+1;
                        if($cnt==5)
                        {
                            echo ' 
                            <div class="clearfix"></div>
                            </div>
                              ';
                            
                            $cnt=1;
                        }    
                     
			}

		?>
                <div id="resp" ></div>		
		
	</div>
   <div class="clearfix"></div>
   <br>
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
<script src="js/jquery.nicescroll.js"></script>
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

			"use strict";

			$(".gantt").gantt({
				source: [{
					name: "Sprint 0",
					desc: "Analysis",
					values: [{
						from: "/Date(1320192000000)/",
						to: "/Date(1322401600000)/",
						label: "Requirement Gathering", 
						customClass: "ganttRed"
					}]
				},{
					name: " ",
					desc: "Scoping",
					values: [{
						from: "/Date(1322611200000)/",
						to: "/Date(1323302400000)/",
						label: "Scoping", 
						customClass: "ganttRed"
					}]
				},{
					name: "Sprint 1",
					desc: "Development",
					values: [{
						from: "/Date(1323802400000)/",
						to: "/Date(1325685200000)/",
						label: "Development", 
						customClass: "ganttGreen"
					}]
				},{
					name: " ",
					desc: "Showcasing",
					values: [{
						from: "/Date(1325685200000)/",
						to: "/Date(1325695200000)/",
						label: "Showcasing", 
						customClass: "ganttBlue"
					}]
				},{
					name: "Sprint 2",
					desc: "Development",
					values: [{
						from: "/Date(1326785200000)/",
						to: "/Date(1325785200000)/",
						label: "Development", 
						customClass: "ganttGreen"
					}]
				},{
					name: " ",
					desc: "Showcasing",
					values: [{
						from: "/Date(1328785200000)/",
						to: "/Date(1328905200000)/",
						label: "Showcasing", 
						customClass: "ganttBlue"
					}]
				},{
					name: "Release Stage",
					desc: "Training",
					values: [{
						from: "/Date(1330011200000)/",
						to: "/Date(1336611200000)/",
						label: "Training", 
						customClass: "ganttOrange"
					}]
				},{
					name: " ",
					desc: "Deployment",
					values: [{
						from: "/Date(1336611200000)/",
						to: "/Date(1338711200000)/",
						label: "Deployment", 
						customClass: "ganttOrange"
					}]
				},{
					name: " ",
					desc: "Warranty Period",
					values: [{
						from: "/Date(1336611200000)/",
						to: "/Date(1349711200000)/",
						label: "Warranty Period", 
						customClass: "ganttOrange"
					}]
				}],
				navigate: "scroll",
				scale: "weeks",
				maxScale: "months",
				minScale: "days",
				itemsPerPage: 10,
				onItemClick: function(data) {
					alert("Item clicked - show some details");
				},
				onAddClick: function(dt, rowId) {
					alert("Empty space clicked - add an item!");
				},
				onRender: function() {
					if (window.console && typeof console.log === "function") {
						console.log("chart rendered");
					}
				}
			});

			$(".gantt").popover({
				selector: ".bar",
				title: "I'm a popover",
				content: "And I'm the content of said popover.",
				trigger: "hover"
			});

			prettyPrint();

		});

    </script>
		   <script src="js/menu_jquery.js"></script>
</body>
</html>