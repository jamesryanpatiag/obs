  <?php $this->view("dashboard/common/sub-header"); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div style="height:50px;"></div>
    <div class="container">
      <section class="content-header">
        <h1><i class="fa fa-dropbox" aria-hidden="true"></i><?php echo $page_title;?></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</li></a> /<?php echo $page_title;?></li></ol>
        <div style="height:20px;"></div>
      </section>
      <div class="content">
          <?php if($_SESSION["role_code"]==ADMINISTRATOR && $module==="toursandpackages") {?>
          <a href="<?php echo site_url("modules/newToursandpackages"); ?>" title="New Tour and Package" class="btn btn-info" > 
           <i class="fa fa-plus" aria-hidden="true"></i> 
           Add <?php echo $page_title;?> 
          </a> 
          <div style="height:20px;"></div>
          <?php } ?>
          <?php $this->view("dashboard/tables/toursandpackagesTable", $list); ?>
      </div>
    </div>
  </div>
