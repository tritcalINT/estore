<?php
require_once 'session.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/user_list_data.php';
?>


  <!-- Content Wrapper. Contains page content -->
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i> <?= date('e'); ?></a></li>
        <li class="active"><?= date('d-m-Y h:i A'); ?></li>
      </ol>
    </section>
    
    
    
    <!-- Main content -->
   
    <!-- /.Tab content -->
 <section class="content align-middle">
    
      <div class="row align-middle">
          
          <div class="col-md-4">
              
          
          </div>
           <div class="col-md-4  align-middle">
               <div class="center"><h1 style ="color: white; align-items:center">User Tree Graph </h1></div>
                
              
              <?php
        require './tree.php';
        
        ?> 
          </div>
           <div class="col-md-4">
              
             
          </div>
          
       
     </div>
     </section>
      
      
 
 
 
 
  </div>
  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->

 <?php

require_once 'footer.php';

?>