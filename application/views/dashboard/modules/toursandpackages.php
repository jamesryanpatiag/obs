<div class="wrapper">

  <?php $this->view("dashboard/common/sub-header"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div style="height:50px;"></div>
    <section class="content-header">
      <h1>
         <i class="fa fa-dropbox" aria-hidden="true"></i>
         <?php echo $page_title;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a>/</li> <?php echo $page_title;?></li>
      </ol>
      <div style="height:20px;"></div>
      <?php if($_SESSION["role_code"]==ADMINISTRATOR){?>
      <a href="<?php echo site_url("modules/newToursandpackages"); ?>" title="New Tour and Package" class="btn btn-info" >
         <i class="fa fa-plus" aria-hidden="true"></i>
         Add <?php echo $page_title;?>
      </a>
      <?php } ?>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php $this->view("dashboard/tables/toursandpackagesTable", $list); ?>
    </section>
  </div>

  <?php $this->view("dashboard/common/footer-html"); ?>
  <div class="control-sidebar-bg"></div>
</div>