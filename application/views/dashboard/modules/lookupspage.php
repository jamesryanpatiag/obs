  <?php $this->view("dashboard/common/sub-header"); ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div style="height:50px;"></div>
    <div class="container">
      <section class="content-header">
        <h1><i class="fa fa-dropbox" aria-hidden="true"></i><?php echo $page_title;?></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</li></a> /<?php echo $page_title;?></li></ol>
        <div style="height:20px;"></div>
        <?php if($_SESSION["role_code"]==ADMINISTRATOR){?>
          <a href="#" data-toggle="modal" data-target="#addLookupsModal" title="Lookup" class="btn btn-info" > 
             <i class="fa fa-plus" aria-hidden="true"></i> 
             Add <?php echo $page_title;?> 
          </a> 
        <?php } ?>
      </section>
      <section class="content">
          <?php $this->view("dashboard/tables/lookupsTable", $list); ?>
      </section>
      </div>
  </div>

<?php $this->view("dashboard/common/footer-html"); ?>
<?php $this->view("dashboard/modals/addLookupsModal"); ?>
<?php $this->view("dashboard/modals/editLookupsModal"); ?>
<?php $this->view("dashboard/common/obsInclude"); ?>