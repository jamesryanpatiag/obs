<div class="wrapper">

  <?php $this->view("dashboard/common/sub-header"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div style="height:50px;"></div>
    <section class="content-header">
      <h1>
          <a href="#" data-toggle="modal" data-target="#addLookupsModal" title="Lookup" class="btn btn-info" >
             <i class="fa fa-plus" aria-hidden="true"></i>
             Add <?php echo $page_title;?>
          </a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a>/</li> <?php echo $page_title;?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php $this->view("dashboard/tables/lookupsTable", $list); ?>
    </section>
  </div>

  <?php $this->view("dashboard/common/footer-html"); ?>
  <div class="control-sidebar-bg"></div>
</div>
<?php $this->view("dashboard/modals/addLookupsModal"); ?>
<?php $this->view("dashboard/modals/editLookupsModal"); ?>
<?php $this->view("dashboard/common/obsInclude"); ?>