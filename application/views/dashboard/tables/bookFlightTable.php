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
      <th>Ticket Type</th>  
      <th>Departure Place</th>  
      <th>Arrival Place</th>  
      <th>Departure Date</th>   
      <th>Return Date</th>
      <th>Airline</th>
      <th>Seat Class</th>
      <th>No. of Person</th>
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
                      <label class="data-label-row" id="lblFlightBookingId_<?php echo $counter;?>"><?php echo $item->ID;?></label>
                      <input type="hidden" id="flightBookingId_<?php echo $counter;?>" name="flightBookingId_<?php echo $counter;?>" value="<?php echo $item->ID;?>" >
                    </td>
                    <td style="width:10%" >
                        <label class="data-label-row" id="lblFlightTicketType_<?php echo $counter;?>"><?php echo getLookupValueById($item->TICKET_TYPE_ID);?></label>
                        <select class="form-control pull-right data-editable-row" id="flightTicketType_<?php echo $counter;?>" name="flightTicketType_<?php echo $counter;?>">
                            <?php foreach($ticket_type as $category){ ?>
                            <option value="<?php echo $category->LOOKUP_ID;?>" <?php if($item->TICKET_TYPE_ID==$category->LOOKUP_ID){echo "selected='selected'";}?> > <?php echo $category->VALUE;?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td style="width:15%" >
                      <label class="data-label-row" id="lblFlightDeparturePlace_<?php echo $counter;?>"><?php echo getLookupValueById($item->DEPARTURE_PLACE_ID);?></label>
                      <select class="form-control pull-right data-editable-row" id="flightDeparturePlace_<?php echo $counter;?>" name="flightDeparturePlace_<?php echo $counter;?>">
                          <?php foreach($destination as $category){ ?>
                          <option value="<?php echo $category->LOOKUP_ID;?>" <?php if($item->DEPARTURE_PLACE_ID==$category->LOOKUP_ID){echo "selected='selected'";}?>><?php echo $category->VALUE;?></option>
                          <?php } ?>
                      </select>  
                    </td>
                    <td style="width:15%" >
                      <label class="data-label-row" id="lblFlightArrivalPlace_<?php echo $counter;?>"><?php echo getLookupValueById($item->ARRIVAL_PLACE_ID);?></label>
                      <select class="form-control pull-right data-editable-row" id="flightArrivalPlace_<?php echo $counter;?>" name="flightArrivalPlace_<?php echo $counter;?>">
                          <?php foreach($destination as $category){ ?>
                          <option value="<?php echo $category->LOOKUP_ID;?>" <?php if($item->ARRIVAL_PLACE_ID==$category->LOOKUP_ID){echo "selected='selected'";}?>><?php echo $category->VALUE;?></option>
                          <?php } ?>
                      </select>    
                    </td>
                    <td  style="width:10%" >
                      <label class="data-label-row" id="lblFlightDepartureDate_<?php echo $counter;?>"><?php echo $item->DEPATURE_DATE;?></label>
                      <div class="input-group date data-editable-row" id="flightDepartureDate_<?php echo $counter;?>">
                        <input type="text" class="form-control pull-right datepicker" id="flightDepartureDateVal_<?php echo $counter;?>" name="flightDepartureDate_<?php echo $counter;?>" value="<?php echo $item->DEPATURE_DATE;?>" >
                      </div>
                    </td>
                    <td  style="width:10%" >
                      <label class="data-label-row" id="lblFlightReturnDate_<?php echo $counter;?>"><?php echo $item->RETURN_DATE;?></label>
                      <div class="input-group date data-editable-row" id="flightReturnDate_<?php echo $counter;?>">
                        <input type="text" class="form-control pull-right datepicker" id="flightReturnDateVal_<?php echo $counter;?>" name="flightReturnDate_<?php echo $counter;?>" value="<?php echo $item->RETURN_DATE;?>" >
                      </div>    
                    </td>
                    <td>
                      <label class="data-label-row" id="lblFlightAirline_<?php echo $counter;?>"><?php echo getLookupValueById($item->AIRLINE_ID);?></label>
                       <select class="form-control pull-right" id="flightAirline_<?php echo $counter;?>" name="flightAirline_<?php echo $counter;?>">
                            <?php foreach($airline as $category){ ?>
                            <option value="<?php echo $category->LOOKUP_ID;?>" <?php if($item->AIRLINE_ID==$category->LOOKUP_ID){echo "selected='selected'";}?>><?php echo $category->VALUE;?></option>
                            <?php } ?>
                        </select>

                    </td> 
                    <td>
                      <label class="data-label-row" id="lblFlightClass_<?php echo $counter;?>"><?php echo getLookupValueById($item->CLASS_ID);?></label>
                      <select class="form-control pull-right" id="flightClass_<?php echo $counter;?>" name="flightClass_<?php echo $counter;?>">
                          <?php foreach($class as $category){ ?>  
                          <option value="<?php echo $category->LOOKUP_ID;?>" <?php if($item->CLASS_ID==$category->LOOKUP_ID){echo "selected='selected'";}?>><?php echo $category->VALUE;?></option>
                          <?php } ?>
                      </select>
                    </td>
                    <td  style="width:10%" >
                        Adult:
                        <label class="data-label-row" id="lblFlightNoAdults_<?php echo $counter;?>"><?php echo $item->NO_OF_ADULT;?></label>
                        <input type="text"  style="width:50px" class="form-control data-editable-row" id="flightNoAdults_<?php echo $counter;?>" name="flightNoAdults_<?php echo $counter;?>" value="<?php echo $item->NO_OF_ADULT;?>" >
                        <br/>
                        Children:
                        <label class="data-label-row" id="lblFlightNoChildren_<?php echo $counter;?>"><?php echo $item->NO_OF_CHILDREN;?></label>
                        <input type="text" style="width:50px" class="form-control data-editable-row" id="flightNoChildren_<?php echo $counter;?>" name="flightNoChildren_<?php echo $counter;?>" value="<?php echo $item->NO_OF_CHILDREN;?>" >
                        <br/>
                        Infant:
                        <label class="data-label-row" id="lblFlightNoInfants_<?php echo $counter;?>"><?php echo $item->NO_OF_INFANT;?></label>
                        <input type="text" style="width:50px" class="form-control data-editable-row" id="flightNoInfants_<?php echo $counter;?>" name="flightNoInfants_<?php echo $counter;?>" value="<?php echo $item->NO_OF_INFANT;?>" >   
                    </td>
                    <td  style="width:10%" >
                        <button title="Save Booking" style="display:none" class="btn btn-success" id="bntSaveBooking_<?php echo $counter; ?>" onClick="saveRow(<?php echo $counter; ?>)">
                          <span class="fa fa-check"></span></a>
                        </button>
                        <button title="Edit Booking" class="btn btn-info" id="bntEditBooking_<?php echo $counter; ?>"  onClick="editRow(<?php echo $counter; ?>)">
                          <span class="fa fa-pencil"></span></a>
                        </button>
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
    $("#flightTicketType_"+counter).css("display",display);
    $("#flightDeparturePlace_"+counter).css("display",display);
    $("#flightArrivalPlace_"+counter).css("display",display);
    $("#flightDepartureDate_"+counter).css("display",display);
    $("#flightReturnDate_"+counter).css("display",display);
    $("#flightNoAdults_"+counter).css("display",display);
    $("#flightNoChildren_"+counter).css("display",display);
    $("#flightNoInfants_"+counter).css("display",display);
    $("#flightClass_"+counter).css("display",display);
    $("#flightAirline_"+counter).css("display",display); 
  }

  function showHideLabelRow(counter, display){
    $("#lblFlightTicketType_"+counter).css("display",display);
    $("#lblFlightDeparturePlace_"+counter).css("display",display);
    $("#lblFlightArrivalPlace_"+counter).css("display",display);
    $("#lblFlightDepartureDate_"+counter).css("display",display);
    $("#lblFlightReturnDate_"+counter).css("display",display);
    $("#lblFlightNoAdults_"+counter).css("display",display);
    $("#lblFlightNoChildren_"+counter).css("display",display);
    $("#lblFlightNoInfants_"+counter).css("display",display);
    $("#lblFlightClass_"+counter).css("display",display);
    $("#lblFlightAirline_"+counter).css("display",display);
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
      form_data.append('id', $("#flightBookingId_"+counter).val());
      form_data.append('flightTicketType', $("#flightTicketType_"+counter).val());
      form_data.append('flightDeparturePlace', $("#flightDeparturePlace_"+counter).val());
      form_data.append('flightArrivalPlace', $("#flightArrivalPlace_"+counter).val());
      form_data.append('flightDepartureDate', $("#flightDepartureDateVal_"+counter).val());
      form_data.append('flightReturnDate', $("#flightReturnDateVal_"+counter).val());
      form_data.append('flightNoAdults', $("#flightNoAdults_"+counter).val());
      form_data.append('flightNoChildren', $("#flightNoChildren_"+counter).val());
      form_data.append('flightNoInfants', $("#flightNoInfants_"+counter).val());
      form_data.append('flightClass', $("#flightClass_"+counter).val());
      form_data.append('flightAirline', $("#flightAirline_"+counter).val());

      $.ajax({
          url: "<?php echo site_url('modules/saveEditBookFlight'); ?>",
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