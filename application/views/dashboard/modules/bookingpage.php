  <?php $this->view("dashboard/common/sub-header"); ?>
  <style type="text/css">
      .bookingtabs {
          background:#31250e;
          
      }
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div style="height:50px;"></div>
    <div class="container">
      <section class="content-header">
        <h1><i class="fa fa-dropbox" aria-hidden="true"></i><?php echo $page_title;?></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</li></a> /<?php echo $page_title;?></li></ol>
        <div style="height:20px;"></div>
      </section>
      <section class="content">
      <div id="booking-table-alert-msg"></div>
      <?php if($_SESSION["role_code"]==CUSTOMER){?>
      <div class="nav-tabs-custom col-md-12 col-lg-12">
            <ul class="nav nav-tabs">
              <?php if($module==="bookflight"){ ?>
              <li class='active'><a style="background:#31250e;color:#fff;" href="#tab_1" data-toggle="tab"><b>Book Flight</b></a></li>
              <?php } elseif($module==="bookhotel"){ ?>
              <li class='active'><a style="background:#31250e;color:#fff;" href="#tab_2" data-toggle="tab">Book Hotel</a></li>
              <?php } elseif($module==="rentvehicle"){ ?>
              <li class='active'><a style="background:#31250e;color:#fff;" href="#tab_3" data-toggle="tab">Rent Vehicle</a></li>
              <?php }?>
            </ul>
            <div class="tab-content">
                <div class="tab-pane <?php if($module==="bookflight"){echo 'active';}?>" id="tab_1">
                    <?php $this->view("dashboard/tabs/bookFlight"); ?>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane <?php if($module==="bookhotel"){echo 'active';}?>" id="tab_2">
                    <?php $this->view("dashboard/tabs/bookHotel"); ?>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane <?php if($module==="rentvehicle"){echo 'active';}?>" id="tab_3">
                    <?php $this->view("dashboard/tabs/bookVehicle"); ?>
                </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
      </div>
      <? } ?>

    
    <?php if($module==="bookflight"){ ?>
        <?php $this->view("dashboard/tables/bookFlightTable", $list); ?>
    <?php }else if($module==="bookhotel"){?>
        <?php $this->view("dashboard/tables/bookHotelTable", $list); ?>
    <?php }else if($module==="rentvehicle"){?>
        <?php $this->view("dashboard/tables/bookVehicleTable", $list); ?>
    <?php }?>
    </section>
    <!-- /.content -->
  </div>

    <?php $this->view("dashboard/common/obsInclude"); ?>
    <?php $this->view("dashboard/modals/changeStatus"); ?>
  </div>
<script>
  $(function () {

    //Date picker
    $('#flightDepartureDate').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      minDate: 0
    });

    $('#flightReturnDate').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      minDate: 0
    });

    $('#hotelCheckInDate').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      minDate: 0
    });

    $('#hotelCheckOutDate').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      minDate: 0
    });

     $('#vehicleDepartureDate').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      minDate: 0
    });

    $('#vehicleReturnDate').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      minDate: 0
    });
  });
</script>

 