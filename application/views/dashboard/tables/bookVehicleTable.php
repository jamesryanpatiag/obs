<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">My Booked Flights</h3>
</div>
<style>
  .data-editable-row{
     display: none;
  }

</style>
<!-- /.box-header -->
<div class="box-body">
  <div id="bookflight-table-alert-msg" class="col-md-12 col-lg-12" style="text-align: center"></div>
  <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>ID</th>
       <?php if($_SESSION["role_code"]==ADMINISTRATOR){?>
        <th style="width:30%">Booked By</th>
        <th>Booking Details</th>
      <?php }else{ ?>
      <th>Vehicle Type</th>  
      <th>Departure Place</th>  
      <th>Destination Place</th>  
      <th>Departure Date</th>
      <th>Return Date</th>
      <?php } ?> 
      <th>Status</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
        <?php if(isset($list) && !empty($list)){?>
            <?php
                $counter = 1; 
                foreach($list as $item){ 
                  ?>
                <tr> 
                    <td style="width:3%" >
                      <label class="data-label-row" id="lblVehicleId_<?php echo $counter;?>"><?php echo $item->ID;?></label>
                      <input type="hidden" id="vehicleId_<?php echo $counter;?>" name="vehicleId_<?php echo $counter;?>" value="<?php echo $item->ID;?>" >
                    </td>
                    <?php if($_SESSION["role_code"]==ADMINISTRATOR){?>
                        <td>
                            <p class="para-no-margin"><b>Username:</b></label> <?php echo getUsernameById($item->USER_ID); ?></p>
                            <p class="para-no-margin"><b>Fullname:</b></label> <?php echo getSinglePersonByUserId($item->USER_ID); ?></p>
                            <p class="para-no-margin"><b>Date Booked:</b> <?php echo date("Y-m-d",strtotime($item->CREATED_DATE)); ?></p> 
                        </td>
                        <td>
                            <div class="col-md-6 col-lg-6">
                              <p class="para-no-margin"><b>Vehicle Type:</b></label> <?php echo getLookupValueById($item->VEHICLE_TYPE);?></p>
                              <p class="para-no-margin"><b>Departure Place:</b></label> <?php echo getLookupValueById($item->DEPARTURE_PLACE_ID);?></p>
                              <p class="para-no-margin"><b>Destination Place:</b></label> <?php echo getLookupValueById($item->DESTINATION_PLACE_ID);?></p>
                              <p class="para-no-margin"><b>Departure Date:</b></label> <?php echo $item->DEPARTURE_DATE;?></p>
                              <p class="para-no-margin"><b>Return date:</b></label> <?php echo $item->RETURN_DATE;?></p>
                            </div>
                        </td>
                    <?php } else { ?>
                        <td style="width:10%" >
                            <label class="data-label-row" id="lblVehicleType_<?php echo $counter;?>"><?php echo getLookupValueById($item->VEHICLE_TYPE);?></label>
                            <select class="form-control pull-right data-editable-row" id="vehicleVehicleType_<?php echo $counter;?>" name="vehicleVehicleType_<?php echo $counter;?>">
                                <?php foreach($vehicle_type as $category){ ?>
                                <option value="<?php echo $category->LOOKUP_ID;?>" <?php if($item->VEHICLE_TYPE==$category->LOOKUP_ID){echo "selected='selected'";}?> > <?php echo $category->VALUE;?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td style="width:15%" >
                          <label class="data-label-row" id="lblVehicleDeparturePlace_<?php echo $counter;?>"><?php echo getLookupValueById($item->DEPARTURE_PLACE_ID);?></label>
                          <select class="form-control pull-right data-editable-row" id="vehicleDeparturePlace_<?php echo $counter;?>" name="vehicleDeparturePlace_<?php echo $counter;?>">
                              <?php foreach($destination as $category){ ?>
                              <option value="<?php echo $category->LOOKUP_ID;?>" <?php if($item->DEPARTURE_PLACE_ID==$category->LOOKUP_ID){echo "selected='selected'";}?>><?php echo $category->VALUE;?></option>
                              <?php } ?>
                          </select>  
                        </td>
                        <td style="width:15%" >
                          <label class="data-label-row" id="lblVehicleArrivalPlace_<?php echo $counter;?>"><?php echo getLookupValueById($item->DESTINATION_PLACE_ID);?></label>
                          <select class="form-control pull-right data-editable-row" id="vehicleArrivalPlace_<?php echo $counter;?>" name="vehicleArrivalPlace_<?php echo $counter;?>">
                              <?php foreach($destination as $category){ ?>
                              <option value="<?php echo $category->LOOKUP_ID;?>" <?php if($item->DESTINATION_PLACE_ID==$category->LOOKUP_ID){echo "selected='selected'";}?>><?php echo $category->VALUE;?></option>
                              <?php } ?>
                          </select>  
                        </td>
                        <td  style="width:10%" >
                          <label class="data-label-row" id="lblVehicleDepartureDate_<?php echo $counter;?>"><?php echo $item->DEPARTURE_DATE;?></label>
                          <div class="input-group date data-editable-row" id="vehicleDepartureDate_<?php echo $counter;?>">
                            <input type="text" class="form-control pull-right datepicker" id="vehicleDepartureDateVal_<?php echo $counter;?>" name="vehicleDepartureDateVal_<?php echo $counter;?>" value="<?php echo $item->DEPARTURE_DATE;?>" >
                          </div>
                        </td>
                        <td  style="width:10%" >
                          <label class="data-label-row" id="lblVehicleReturnDate_<?php echo $counter;?>"><?php echo $item->RETURN_DATE;?></label>
                          <div class="input-group date data-editable-row" id="vehicleReturnDate_<?php echo $counter;?>">
                            <input type="text" class="form-control pull-right datepicker" id="vehicleReturnDateVal_<?php echo $counter;?>" name="vehicleReturnDateVal_<?php echo $counter;?>" value="<?php echo $item->RETURN_DATE;?>" >
                          </div>    
                        </td>
                    <?php } ?>
                    <td>
                      <label class="data-label-row" id="lblStatus_<?php echo $counter;?>"><?php echo $item->BOOKING_STATUS;?></label>
                    </td>
                    <td  style="width:10%" >
                        <?php if($_SESSION["role_code"]==ADMINISTRATOR){?>
                            <button type="button" class="btn btn-warning" title="Change Status" data-toggle="modal" data-target="#changeStatus" >
                            <span class="fa fa-exchange"></button>
                        <?php }else { ?>
                            <button title="Save Booking" style="display:none" class="btn btn-success" id="bntSaveBooking_<?php echo $counter; ?>" onClick="saveRow(<?php echo $counter; ?>)">
                            <span class="fa fa-check"></span></a>
                          </button>
                          <button title="Edit Booking" class="btn btn-info" id="bntEditBooking_<?php echo $counter; ?>"  onClick="editRow(<?php echo $counter; ?>)">
                            <span class="fa fa-pencil"></span></a>
                          </button>
                        <?php } ?>
                        <button title="Cancel Booking" class="btn btn-danger">
                          <span class="fa fa-trash"></span></a>
                        </button>
                    </td>
                </tr>
            <?php $counter++;}?>
        <?php }?>
    </tbody>
  </table>
</div>
</div>
</div>
</div>

<script>
  $(function () {

    //Date picker
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });
  });

  function showHideEditableRow(counter, display){
    $("#vehicleVehicleType_"+counter).css("display",display);
    $("#vehicleDeparturePlace_"+counter).css("display",display);
    $("#vehicleArrivalPlace_"+counter).css("display",display);
    $("#vehicleDepartureDate_"+counter).css("display",display);
    $("#vehicleReturnDate_"+counter).css("display",display);
  }

  function showHideLabelRow(counter, display){
    $("#lblVehicleVehicleType_"+counter).css("display",display);
    $("#lblVehicleDeparturePlace_"+counter).css("display",display);
    $("#lblVehicleArrivalPlace_"+counter).css("display",display);
    $("#lblVehicleDepartureDate_"+counter).css("display",display);
    $("#lblVehicleReturnDate_"+counter).css("display",display);
  }

  function showHideEditButton(counter, display){
      $("#bntEditBooking_"+counter).css("display", display);
  }

  function showHideSaveButton(counter, display){
      $("#bntSaveBooking_"+counter).css("display", display);
  }

  function showHideLabelRows(display){
    for(i = 1; i < <?php echo $counter;?>; i++){
        showHideLabelRow(i, display);
    }
  }

  function showHideEditableRows(display){
    for(i = 1; i < <?php echo $counter;?>; i++){
        showHideEditableRow(i, display);
    }
  }

  function showHideEditButtons(display){
    for(i = 1; i < <?php echo $counter;?>; i++){
        showHideEditButton(i, display);
    }
  }

  function showHideSaveButtons(display){
    for(i = 1; i < <?php echo $counter;?>; i++){
        showHideSaveButton(i, display);
    }
  }


  function editRow(counter){
      showHideSaveButtons("none");
      showHideEditButtons("");
      showHideEditButton(counter,"none");
      showHideSaveButton(counter,"");
      showHideLabelRows("");
      showHideLabelRow(counter,"none");
      showHideEditableRows("none");
      showHideEditableRow(counter, "block");
  }

  function saveRow(counter){
      


      var form_data = new FormData();
      form_data.append('id', $("#vehicleId_"+counter).val());
      form_data.append('vehicleVehicleType', $("#vehicleVehicleType_"+counter).val());
      form_data.append('vehicleDeparturePlace', $("#vehicleDeparturePlace_"+counter).val());
      form_data.append('vehicleArrivalPlace', $("#vehicleArrivalPlace_"+counter).val());
      form_data.append('vehicleDepartureDate', $("#vehicleDepartureDateVal_"+counter).val());
      form_data.append('vehicleReturnDate', $("#vehicleReturnDateVal_"+counter).val());

      $.ajax({
          url: "<?php echo site_url('modules/saveEditBookVehicle'); ?>",
          type: 'POST',
          data: form_data,  
          processData: false,
          contentType: false,
          success: function(msg) {
            if(msg=="YES"){
                showHideSaveButtons("none");
                showHideEditButton(counter,"");
                showHideEditableRows("none");
                showHideEditableRow(counter, "none");
                showHideLabelRows("");
                showHideLabelRow(counter,"");
                location.reload();
            }else{
              $("#bookflight-table-alert-msg").html('<div class="alert alert-danger text-center" style="width:100%">' + msg +  '</div>');
            }
            
           
          }
        });
  }

  $(document).ready(function(){
      showHideEditableRows("none");

  });
</script>