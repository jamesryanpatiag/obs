<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">Table List</h3>
</div>

<!-- /.box-header -->
<div class="box-body">
  <div id="lookup-table-alert-msg"></div>
  <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>ID</th>  
      <th>Booked By</th>
      <th>Title/Description</th>
      <th>Status</th>
      <th width="10%">Action</th>
    </tr>
    </thead>
    <tbody>
        <?php ?>
        <?php if(isset($list) && !empty($list)){?>
            <?php foreach($list as $item){
                ?>
                <tr>
                    <td><?php echo $item->TPS_ID;?></td>
                    <td>
                      <p class="para-no-margin"><b>Username:</b></label> <?php echo getUsernameById($item->USER_ID); ?></p>
                        <p class="para-no-margin"><b>Fullname:</b></label> <?php echo getSinglePersonByUserId($item->USER_ID); ?></p>
                        <p class="para-no-margin"><b>Date Booked:</b> <?php echo date("Y-m-d",strtotime($item->CREATED_DATE)); ?></p>
                    </td>
                    <td>
                      <div class="col-md-12 col-lg-12">
                          <h4><a href="<?php echo site_url("modules/viewPromo/".md5($item->ID))?>"><b><?php echo $item->TITLE; ?></b></a>
                              <?php if($_SESSION["role_code"]==ADMINISTRATOR  && $module == "toursandpackages"){?>
                              &nbsp;<small><a href="<?php echo site_url("modules/editToursAndPackages/".md5($item->ID))?>"><span class="fa fa-pencil"></span> Edit</a></small>
                              <?php } ?>
                          </h4>
                      </div>
                      <div class="col-md-12 col-lg-12">
                          <h4><a href="#" style="color:red"><b><i><?php echo $currency_symbol." ".$item->PRICE;?></i></b></a></h4>
                      </div>
                      <div class="col-md-12 col-lg-12" style="margin-top:2px"></div>
                      <div class="col-md-12 col-lg-12">
                          <h5>Valid From: <?php echo $item->VALID_FROM; ?> to <?php echo $item->VALID_TO; ?></h5>
                      </div>
                    </td>
                    <td><?php echo $item->BOOKING_STATUS;?></td>
                    <td>
                        <?php if($_SESSION["role_code"]==ADMINISTRATOR){?>
                            <button type="button" class="btn btn-warning" title="Change Status" onClick="changeStatus('PROMO', <?php echo $item->TPS_ID; ?> , '<?php echo $item->BOOKING_STATUS;?>')" data-toggle="modal" data-target="#changeStatus" >
                            <span class="fa fa-exchange"></button>
                        <?php } ?>
                        <?php if(!$isCancelled){?>
                          <button title="Cancel Booking" class="btn btn-danger" onClick="cancelBooking(<?php echo $item->TPS_ID; ?>)">
                            <span class="fa fa-trash"></span></a>
                          </button>
                        <?php } ?>
                    </td>
                </tr>
            <?php }?>
        <?php }?>
    </tbody>
    <tfoot>
    </tfoot>
  </table>
</div>
</div>
</div>
</div>
<?php $this->view("dashboard/common/obsInclude"); ?>
<?php $this->view("dashboard/modals/changeStatus"); ?>
<script>
function cancelBooking(id){
    if(confirm('Are you sure you want to cancel this Promo booking?')){
        var form_data = new FormData();
        form_data.append('id', id);
        $.ajax({
        url: "<?php echo site_url('modules/cancelPromo'); ?>",
        type: 'POST',
        data: form_data,  
        processData: false,
        contentType: false,
        success: function(msg) {
          if(msg=="YES"){
            location.reload();
          }else{
            $("#tour-pack-schedule-table-alert-msg").html('<div class="alert alert-danger text-center" style="width:100%">' + msg +  '</div>');
          }
        }
      });
    }
  }

</script>