

<?php

include_once 'data/functions.php';

$userdetails = getUserDetailsbySession($_SESSION['login'], $conn);

?>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../uploads/profiles/<?= $userdetails['user_pic']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $_SESSION['login']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MY E SHOP </li>
        <li>
          <a href="admin.php">
            <i class="fa fa-dashboard"></i> <span>MY DASH BOARD</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-shopping-cart"></i> <span>MY ORDERS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			
                                <li><a href="order_list.php"><i class="fa fa-list-ol"></i>Oder List</a></li>
			
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i class="fa fa-cube"></i> <span>MY PRODUCTS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="product_list.php"><i class="fa fa-file-text-o"></i>List</a></li>
              
              
          </ul>
        </li>

       
<!--		<li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i> <span>STOCK</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i>Levels</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Update by CSV </a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Manuel Update </a></li>
          </ul>
        </li>
        -->
      

        </li>
 
		<li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Wallet </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="my_wallet.php"><i class="fa fa-circle-o"></i>My Cash wallet</a></li>
             
			
          </ul>
        </li>
        
             <li class="treeview">
       <a href="#">
         <i class="fa  fa-users"></i> <span>MY TEAM</span>
         <span class="pull-right-container">
           <i class="fa fa-angle-left pull-right"></i>
        </span>
       </a>
          <ul class="treeview-menu">  
        <?php  
        if((int)$userdetails['user_level']<6){ 
            echo '<li><a href="team.php"><i class="fa fa-user"></i> <span>List</span></a></li>';
            
//              if((int)$userdetails['user_level']==2){
//                  echo '<li><a href="team.php"><i class="fa fa-user"></i> <span>My Distributer List </span></a></li>';
//              }
//              elseif ((int)$userdetails['user_level']==3) {
//               echo '<li><a href="team.php"><i class="fa fa-user"></i> <span>My Re-seller  List </span></a></li>';
//          }elseif ((int)$userdetails['user_level']==4) {
//                      echo '<li><a href="team.php"><i class="fa fa-user"></i> <span>My Shopper  List </span></a></li>';
//                  }elseif ((int)$userdetails['user_level']==5) {
//                      echo '<li><a href="team.php"><i class="fa fa-user"></i> <span>My user  List </span></a></li>';
//                  }
              
            
       
        }
   
       
        
        ?>
	 </ul>
       </li>	

<!--            <li class="treeview">
          <a href="#">
            <i class="fa  fa-cogs"></i> <span>MY SETTING</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">  
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>USER MANUAL </span></a></li>
           <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>TERM & CONDITONS </span></a></li>
           <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>USER REPORT </span></a></li>
          </ul>
        </li>-->
       
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =========================================================================================================== -->
