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
        <th style="width:20%">Booked By</th>
        <th>Booking Details</th>
      <?php }else{ ?>
      <th>Destination</th>  
      <th>Hotel</th>  
      <th>Check-In Date</th>  
      <th>Check-Out Date</th>
      <th>No. of Rooms</th>   
      <th>No. of Person</th>
      <? } ?>
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
                      <label class="data-label-row" id="lblHotelId_<?php echo $counter;?>"><?php echo $item->ID;?></label>
                      <input type="hidden" id="hotelId_<?php echo $counter;?>" name="hotelId_<?php echo $counter;?>" value="<?php echo $item->ID;?>" >
                    </td>
                    <?php if($_SESSION["role_code"]==ADMINISTRATOR){?>
                        <td>
                              <p class="para-no-margin"><b>Username:</b></label> <?php echo getUsernameById($item->USER_ID); ?></p>
                              <p class="para-no-margin"><b>Fullname:</b></label> <?php echo getSinglePersonByUserId($item->USER_ID); ?></p>
                              <p class="para-no-margin"><b>Date Booked:</b> <?php echo date("Y-m-d",strtotime($item->CREATED_DATE)); ?></p>  
                          </td>
                          <td>
                              <div class="col-md-4 col-lg-4">
                                <p class="para-no-margin"><b>Destination:</b></label> <?php echo getLookupValueById($item->DESTINATION_ID);?></p>
                                <p class="para-no-margin"><b>Hotel:</b></label> <?php echo getLookupValueById($item->HOTEL_ID);?></p>
                                <p class="para-no-margin"><b>Check-In Date:</b></label> <?php echo $item->CHECK_IN_DATE;?></p>
                                <p class="para-no-margin"><b>Check-Out date:</b></label> <?php echo $item->CHECK_OUT_DATE;?></p>
                              </div>
                              <div class="col-md-4 col-lg-4">
                                <p class="para-no-margin"><b>No. of Adults:</b></label> <?php echo $item->NO_OF_ADULT;?></p>
                                <p class="para-no-margin"><b>No. of Children:</b></label> <?php echo $item->NO_OF_CHILDREN;?></p>
                              </div>
                          </td>
                    <? }else{ ?>
                        <td style="width:10%" >
                          <label class="data-label-row" id="lblHotelDestination_<?php echo $counter;?>"><?php echo getLookupValueById($item->DESTINATION_ID);?></label>
                          <select class="form-control pull-right data-editable-row" id="hotelDestination_<?php echo $counter;?>" name="hotelDestination_<?php echo $counter;?>">
                              <?php foreach($destination as $category){ ?>
                              <option value="<?php echo $category->LOOKUP_ID;?>" <?php if($item->DESTINATION_ID==$category->LOOKUP_ID){echo "selected='selected'";}?> > <?php echo $category->VALUE;?></option>
                              <?php } ?>
                          </select>
                      </td>
                      <td style="width:15%" >
                        <label class="data-label-row" id="lblHotel_<?php echo $counter;?>"><?php echo getLookupValueById($item->HOTEL_ID);?></label>
                        <select class="form-control pull-right data-editable-row" id="hotel_<?php echo $counter;?>" name="hotel_<?php echo $counter;?>">
                            <?php foreach($hotel as $category){ ?>
                            <option value="<?php echo $category->LOOKUP_ID;?>" <?php if($item->HOTEL_ID==$category->LOOKUP_ID){echo "selected='selected'";}?>><?php echo $category->VALUE;?></option>
                            <?php } ?>
                        </select>  
                      </td>
                      <td  style="width:10%" >
                        <label class="data-label-row" id="lblHotelCheckInDate_<?php echo $counter;?>"><?php echo $item->CHECK_IN_DATE;?></label>
                        <div class="input-group date data-editable-row" id="hotelCheckInDate_<?php echo $counter;?>">
                          <input type="text" class="form-control pull-right datepicker" id="hotelCheckInDateVal_<?php echo $counter;?>" name="hotelCheckInDateVal_<?php echo $counter;?>" value="<?php echo $item->CHECK_IN_DATE;?>" >
                        </div>
                      </td>
                      <td  style="width:10%" >
                        <label class="data-label-row" id="lblHotelCheckOutDate_<?php echo $counter;?>"><?php echo $item->CHECK_OUT_DATE;?></label>
                        <div class="input-group date data-editable-row" id="hotelCheckOutDate_<?php echo $counter;?>">
                          <input type="text" class="form-control pull-right datepicker" id="hotelCheckOutDateVal_<?php echo $counter;?>" name="hotelCheckOutDateVal_<?php echo $counter;?>" value="<?php echo $item->CHECK_OUT_DATE;?>" >
                        </div>    
                      </td>
                      <td>
                          <label class="data-label-row" id="lblHotelNoRooms_<?php echo $counter;?>"><?php echo $item->NO_OF_ROOMS;?></label>
                          <input type="text"  style="width:50px" class="form-control data-editable-row" id="hotelNoRooms_<?php echo $counter;?>" name="hotelNoRooms_<?php echo $counter;?>" value="<?php echo $item->NO_OF_ADULT;?>" >
                      </td>
                      <td  style="width:10%" >
                          Adult:
                          <label class="data-label-row" id="lblHotelNoAdults_<?php echo $counter;?>"><?php echo $item->NO_OF_ADULT;?></label>
                          <input type="text"  style="width:50px" class="form-control data-editable-row" id="hotelNoAdults_<?php echo $counter;?>" name="hotelNoAdults_<?php echo $counter;?>" value="<?php echo $item->NO_OF_ADULT;?>" >
                          <br/>
                          Children:
                          <label class="data-label-row" id="lblHotelNoChildren_<?php echo $counter;?>"><?php echo $item->NO_OF_CHILDREN;?></label>
                          <input type="text" style="width:50px" class="form-control data-editable-row" id="hotelNoChildren_<?php echo $counter;?>" name="hotelNoChildren_<?php echo $counter;?>" value="<?php echo $item->NO_OF_CHILDREN;?>" >
                      </td>
                    <? } ?>
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
    $("#hotelDestination_"+counter).css("display",display);
    $("#hotel_"+counter).css("display",display);
    $("#hotelCheckInDate_"+counter).css("display",display);
    $("#hotelCheckOutDate_"+counter).css("display",display);
    $("#hotelNoRooms_"+counter).css("display",display);
    $("#hotelNoAdults_"+counter).css("display",display);
    $("#hotelNoChildren_"+counter).css("display",display);
  }

  function showHideLabelRow(counter, display){
    $("#lblHotelDestination_"+counter).css("display",display);
    $("#lblHotel_"+counter).css("display",display);
    $("#lblHotelCheckInDate_"+counter).css("display",display);
    $("#lblHotelCheckOutDate_"+counter).css("display",display);
    $("#lblHotelNoRooms_"+counter).css("display",display);
    $("#lblHotelNoAdults_"+counter).css("display",display);
    $("#lblHotelNoChildren_"+counter).css("display",display);
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
      form_data.append('id', $("#hotelId_"+counter).val());
      form_data.append('hotelDestination', $("#hotelDestination_"+counter).val());
      form_data.append('hotel', $("#hotel_"+counter).val());
      form_data.append('hotelCheckInDate', $("#hotelCheckInDateVal_"+counter).val());
      form_data.append('hotelCheckOutDate', $("#hotelCheckOutDateVal_"+counter).val());
      form_data.append('hotelNoRooms', $("#hotelNoRooms_"+counter).val());
      form_data.append('hotelNoAdults', $("#hotelNoAdults_"+counter).val());
      form_data.append('hotelNoChildren', $("#hotelNoChildren_"+counter).val());

      $.ajax({
          url: "<?php echo site_url('modules/saveEditBookHotel'); ?>",
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