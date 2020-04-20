 
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $_SESSION['login']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">SHOP SETTINGS </li>
        <li>
          <a href="admin.php">
            <i class="fa fa-dashboard"></i> <span>DASH BOARD</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-shopping-cart"></i> <span>ORDERS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<?php if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){ ?>
                                <li><a href="order_list.php"><i class="fa fa-list-ol"></i>Oder List</a></li>
<!--				<li><a href="admin_list.php"><i class="fa fa-circle-o"></i>completed List</a></li>
				<li><a href="reseller_list.php"><i class="fa fa-circle-o"></i>payment pending List</a></li>-->
<!--			<?php } else if(isset($_SESSION['master']) && $_SESSION['master'] != ''){ ?>
				<li><a href="master_list.php"><i class="fa fa-circle-o"></i>ready to deliver List</a></li>
				<li><a href="admin_list.php"><i class="fa fa-circle-o"></i>completed List</a></li>
			<?php } else if(isset($_SESSION['admin']) && $_SESSION['admin'] != ''){ ?>
				<li><a href="reseller_list.php"><i class="fa fa-circle-o"></i>payment pending List</a></li>
			<?php } ?>
                                <li><a href="user_list.php"><i class="fa fa-circle-o"></i> all List</a></li>-->
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i class="fa fa-cube"></i> <span>PRODUCTS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="product_list.php"><i class="fa fa-file-text-o"></i>List</a></li>
              <li><a href="collection_list.php"><i class="fa fa-file-text-o"></i>Collections</a></li>
              
              
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>CATEGORY</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i><?php if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){ ?><?php } ?>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="category_list.php"><i class="fa fa-file-text-o"></i> <span>List</span>
			<?php if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){ ?>
            
			<?php } ?>
			</a></li>
            
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
        </li>-->
        
        	<li class="treeview">
          <a href="#">
            <i class="fa fa-plus-square-o"></i> <span>BRANDS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="brand_list.php"><i class="fa fa-circle-o"></i>List</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Search</a></li>
         
          </ul>
        </li>
        
        	<li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>USER</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           
              <li><a href="user_list.php"><i class="fa fa-circle-o"></i>ALL</a></li>
              <li><a href="subscribers_list.php"><i class="fa fa-circle-o"></i>SUBSCRIBERS</a></li>
            
          </ul>
        </li>
        
              <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>USER REQUEST </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i><?php if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){ ?><small class="label pull-right bg-red"><?= $pending_total; ?></small><?php } ?>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="deposit_list_pending.php"><i class="fa fa-circle-o"></i> <span>TOP UP Pending</span>
			<?php if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){ ?>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?= $pending_deposit; ?></small>
            </span>
			<?php } ?>
	
          </ul>
        </li>

        <li class="header">ADMIN SETTING</li>
        
         <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope-o"></i> <span>POST </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="news_list.php"><i class="fa fa-circle-o"></i> Lastest News</a></li>
            <li><a href="announcement_1.php"><i class="fa fa-circle-o"></i> Announcement 1</a></li>
            <li><a href="announcement_2.php"><i class="fa fa-circle-o"></i> Announcement 2</a></li>
            <li><a href="promo_list.php"><i class="fa fa-circle-o"></i> Promotion</a></li>
          </ul>
        </li>
        
<!--         <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>SLIDER SETTING</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="slider_list.php"><i class="fa fa-circle-o"></i> sliders</a></li>
          </ul>
        </li>-->
        
          <li class="treeview">
          <a href="#">
            <i class="fa  fa-cogs"></i> <span>User Types</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="user_cat_list.php"><i class="fa fa-circle-o"></i> User Categories</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>TRADING </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             
            <li><a href="g-fundpay_out.php"><i class="fa fa-circle-o"></i>COMMISSION PAY</a></li>
             
          </ul>
        </li>
        
          <li class="treeview">
          <a href="#">
            <i class="fa  fa-cogs"></i> <span>Front End Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="slider_list.php"><i class="fa fa-circle-o"></i> sliders</a></li>
               
          </ul>
        </li>
         
        
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>USER MANUAL </span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>TERM & CONDITONS </span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>USER REPORT </span></a></li>
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =========================================================================================================== -->
