<?php

require_once 'session_master.php';

include_once 'data/functions.php';

require_once 'header.php';
include_once 'data/order_item_data.php'; 
 
require_once 'side_menu.php'; 
?>

    <style>
    .invoice-box {
        background:white;
        max-width: 800px;
        max-height: 1200px;
        width: auto;
        margin: auto;
        padding: 5px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
        
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      
          <section class="content-header">
      <h4> ORDER DETAIL：</h4>
      <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i> <?= date('e'); ?></a></li>
        <li class="active"><?= date('d-m-Y h:i A'); ?></li>
      </ol>
    </section>
      
       <section class="content">
      <div class="row">
        <div class="col-md-12">

                <b class="white-color"> Order Item List : </b>

                <div class="box-body">
              <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-header">
               
                <div class="row">
                    
                    <div class="col-md-3"> 
                         <p><lable style="color:white">Customer Name :  <span><a href="user_details.php?user_id=<?php echo $res['user_id'];?>"><?php echo $res['username']; ?></a></span></lable></p>
                    
                   
                    </div>
                    
<!--                     <div class="col-md-3"> 
                         <p><lable style="color:white">Delivery address :<span><?php echo $res_addr['add1']; ?></span></lable></p>
                    </div>
                     <div class="col-md-3"> 
                         <p><lable style="color:white">Total Amount:  <span>$<?php echo $res_addr ['total']; ?></span></lable></p>
                    </div>
                     <div class="col-md-3"> 
                         <p><lable style="color:white">Payment Type:   <span><?php echo $res_addr['payment_type']; ?> <br> Status:     <?php if ($res_addr['status']==0){
                             echo 'Not recevied';
                         }else{
                                 echo 'received';
                             }

                         ?></span></lable></p>
                    </div>-->
                </div>
                
                </section>
   
          <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="../img/ing1.png" style="width:100%; max-width:150px;">
                            </td>
                            
                            <td>
                                Invoice #: <?php echo $order_id; ?><br>
                                Created: <?php echo $res['order_date']; ?><br>
                                 
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                VC DELUKE.<br>
                                No: 207 Sendayan , Bandar Sri Sendayan, <br>
                                70300 Malaysia
                            </td>
                            
                            <td>
                                 <br>
                                <?php echo $res['username']; ?><br>
                                <?php echo $res_addr['add1']; ?><br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Payment Method : My Wallet
                </td>
                
                <td>
                    Payment Refer#
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    
                </td>
                
                <td>
                   <?php echo $res_addr['payment_type']; ?>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
            
            
            
            
                
                <?php 
				$i=1;
				while($row = mysqli_fetch_assoc($result)) { 
					if($row['status'] == '1'){
						$pd_status = 'Ready to Deliver ';
					} else{
						$pd_status = 'not Delivered';
                                                
					}
                                        
                                  
				?>
            <tr class="item">
                <td>
                    <?php echo $row['item_name']; ?>
                </td>
                
                
                
                <td>
                    $<?php echo $row['itmcpric']; ?>
                </td>
                 </tr>
                
                <?php } ?>
            

            
            <tr class="total">
                <td>
                    <hr>  
                </td>
                
                <td>
                   Total: $<?php echo $res_addr ['total']; ?>
                </td>
            </tr>
        </table>
              

    </div>
    
      <div class="row">
          
          <hr>
      </div>
 
  </div>
  <!-- /.content-wrapper -->

 <?php

require_once 'footer.php';

?>

  
  

