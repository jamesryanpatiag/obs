<div class="wrapper">

  <?php $this->view("dashboard/common/sub-header"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div style="height:50px;"></div>
    <section class="content-header">
      <h1>
          <a href="#" class="btn btn-info">
             <i class="fa fa-calendar" aria-hidden="true"></i>
             <?php echo $page_title;?>
          </a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a>/</li> <?php echo $page_title;?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php if($module==="bookflight"){ ?>
        <?php $this->view("dashboard/tables/bookFlightTable", $list); ?>
    <?php }else if($module==="bookhotel"){?>
        <?php $this->view("dashboard/tables/bookHotelTable", $list); ?>
    <?php }else if($module==="bookvehicle"){?>
        <?php $this->view("dashboard/tables/bookVehicleTable", $list); ?>
    <?php }?>
    </section>
    <!-- /.content -->
  </div>

  <?php $this->view("dashboard/common/footer-html"); ?>
  <div class="control-sidebar-bg"></div>
</div>

<script type="javascript">

</script>