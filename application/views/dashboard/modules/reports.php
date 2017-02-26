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
      <section class="content">
        <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li <?php if($module=="client_registration"){echo "class='active'"; }?>><a href="#client_registration" data-toggle="tab" aria-expanded="false">Client Registration</a></li>
                <li <?php if($module=="book_flight"){echo "class='active'"; }?> ><a href="#flight_booking" data-toggle="tab" aria-expanded="false">Flight Booking</a></li>
                <li <?php if($module=="book_hotel"){echo "class='active'"; }?> ><a href="#hotel_booking" data-toggle="tab" aria-expanded="true">Hotel Booking</a></li>
                <li <?php if($module=="book_vehicle"){echo "class='active'"; }?>><a href="#vehicle_booking" data-toggle="tab" aria-expanded="true">Vehicle Booking</a></li>
                <li <?php if($module=="tap"){echo "class='active'"; }?>><a href="#tap_booking" data-toggle="tab" aria-expanded="true">Tours and Packages</a></li>
                <li <?php if($module=="promos"){echo "class='active'"; }?>><a href="#promos_booking" data-toggle="tab" aria-expanded="true">Promos</a></li>
                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane <?php if($module=="client_registration"){echo "active"; }?>" id="client_registration">
                  <?php echo form_open('modules/searchClientReg'); ?>
                    <div class="box-body">
                      <?php $this->view("dashboard/common/dateFilter"); ?>
                      <br/>
                      <hr/>
                      <br/>
                      <div id="clientTable">
                      <table class="table table-bordered table-hover" style="width:100%;text-align: left">
                        <tr>
                          <th>ID</th>
                          <th>Lastname</th>
                          <th>Firstname</th>
                          <th>Middlename</th>
                          <th>Gender</th>
                          <th>Birthdate</th>
                          <th>Address</th>
                          <th>Created Date</th>
                        </tr>
                        <tbody>
                        <?php if(isset($client_registration)){ ?>
                          <?php foreach($client_registration as $data){ ?>
                          <tr>
                            <td><?php echo $data->ID; ?></td>
                            <td><?php echo $data->LASTNAME; ?></td>
                            <td><?php echo $data->FIRSTNAME; ?></td>
                            <td><?php echo $data->MIDDLENAME; ?></td>
                            <td><?php echo $data->GENDER; ?></td>
                            <td><?php echo $data->BIRTHDATE; ?></td>
                            <td><?php echo $data->ADDRESS; ?></td>
                            <td><?php echo $data->CREATED_DATE; ?></td>
                          </tr>
                          <?php } ?>
                        <?php }?>
                        </tbody>
                      </table>
                      </div>
                      <br/>  
                      <button type="button" class="btn btn-default" onclick="printElem('clientTable')"><i class="fa fa-print"></i> Print</button>
                    </div>
                  <?php echo form_close(); ?>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane <?php if($module=="book_flight"){echo "active"; }?>" id="flight_booking">
                    <?php echo form_open('modules/searchBookFlight'); ?>
                    <div class="box-body">
                      <?php $this->view("dashboard/common/dateFilter"); ?>
                      <br/>
                      <hr/>
                      <br/>
                      <div id="flightTable">
                      <table class="table table-bordered table-hover" style="width:100%;text-align: left">
                        <tr>
                          <th>ID</th>
                          <th>Client full name</th>
                          <th>Ticket type</th>
                          <th>Departure place</th>
                          <th>Arrival place</th>
                          <th>Departure date</th>
                          <th>Arrival date</th>
                          <th>No. of adult</th>
                          <th>No. of children</th>
                          <th>No. of infant</th>
                          <th>Class</th>
                          <th>Airline</th>
                          <th>Booking Status</th>
                        </tr>
                        <tbody>
                        <?php if(isset($flight_booking)){ ?>
                          <?php foreach($flight_booking as $data){ ?>
                          <tr>
                            <td><?php echo $data->ID; ?></td>
                            <td><?php echo getSinglePersonByUserId($data->USER_ID); ?></td>
                            <td><?php echo getLookupValueById($data->TICKET_TYPE_ID);?></td>
                            <td><?php echo getLookupValueById($data->DEPARTURE_PLACE_ID);?></td>
                            <td><?php echo getLookupValueById($data->ARRIVAL_PLACE_ID);?></td>
                            <td><?php echo $data->DEPATURE_DATE;?></td>
                            <td><?php echo $data->RETURN_DATE;?></td>
                            <td><?php echo $data->NO_OF_ADULT; ?></td>
                            <td><?php echo $data->NO_OF_CHILDREN; ?></td>
                            <td><?php echo $data->NO_OF_INFANT; ?></td>
                            <td><?php echo getLookupValueById($data->CLASS_ID);?></td>
                            <td><?php echo getLookupValueById($data->AIRLINE_ID);?></td>
                            <td><?php echo $data->BOOKING_STATUS;?></td>
                          </tr>
                          <?php } ?>
                        <?php }?>
                        </tbody>
                      </table>  
                      </div>
                      <br/>  
                      <button type="button" class="btn btn-default" onclick="printElem('flightTable')"><i class="fa fa-print"></i> Print</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane <?php if($module=="book_hotel"){echo "active"; }?>" id="hotel_booking">
                  <?php echo form_open('modules/searchBookHotel'); ?>
                    <div class="box-body">
                      <?php $this->view("dashboard/common/dateFilter"); ?>
                      <br/>
                      <hr/>
                      <br/>
                      <div id="hotelTable">
                      <table class="table table-bordered table-hover" style="width:100%;text-align: left">
                        <tr>
                          <th>ID</th>
                          <th>Client full name</th>
                          <th>Destination Place</th>
                          <th>Hotel Name</th>
                          <th>Check in Date</th>
                          <th>Check out Date</th>
                          <th>No. of room</th>
                          <th>No. of adult</th>
                          <th>No. of children</th>
                          <th>Booking Status</th>
                        </tr>
                        <tbody>
                        <?php if(isset($hotel_booking)){ ?>
                          <?php foreach($hotel_booking as $data){ ?>
                          <tr>
                            <td><?php echo $data->ID; ?></td>
                            <td><?php echo getSinglePersonByUserId($data->USER_ID); ?></td>
                            <td><?php echo getLookupValueById($data->DESTINATION_ID);?></td>
                            <td><?php echo getLookupValueById($data->HOTEL_ID);?></td>
                            <td><?php echo $data->CHECK_IN_DATE;?></td>
                            <td><?php echo $data->CHECK_OUT_DATE;?></td>
                            <td><?php echo $data->NO_OF_ROOMS;?></td>
                            <td><?php echo $data->NO_OF_ADULT;?></td>
                            <td><?php echo $data->NO_OF_CHILDREN;?></td>
                            <td><?php echo $data->BOOKING_STATUS;?></td>
                          </tr>
                          <?php } ?>
                        <?php }?>
                        </tbody>
                      </table>
                      </div>
                      <br/>  
                      <button type="button" class="btn btn-default" onclick="printElem('hotelTable')"><i class="fa fa-print"></i> Print</button>  
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane  <?php if($module=="book_vehicle"){echo "active"; }?>" id="vehicle_booking">
                  <?php echo form_open('modules/searchBookVehicle'); ?>
                    <div class="box-body">
                      <?php $this->view("dashboard/common/dateFilter"); ?>
                      <br/>
                      <hr/>
                      <br/>
                      <div id="vehicleTable">
                      <table class="table table-bordered table-hover" style="width:100%;text-align: left">
                          <tr>
                          <th>ID</th>
                          <th>Client full name</th>
                          <th>Vehicle Type</th>
                          <th>Departure Place</th>
                          <th>Destination Place</th>
                          <th>Departure Date</th>
                          <th>Return Date</th>
                          <th>Booking Status</th>
                        </tr>
                        <tbody>
                        <?php if(isset($vehicle_booking)){ ?>
                          <?php foreach($vehicle_booking as $data){ ?>
                          <tr>
                            <td><?php echo $data->ID; ?></td>
                            <td><?php echo getSinglePersonByUserId($data->USER_ID); ?></td>
                            <td><?php echo getLookupValueById($data->VEHICLE_TYPE);?></td>
                            <td><?php echo getLookupValueById($data->DEPARTURE_PLACE_ID);?></td>
                            <td><?php echo getLookupValueById($data->DESTINATION_PLACE_ID);?></td>
                            <td><?php echo $data->DEPARTURE_DATE;?></td>
                            <td><?php echo $data->RETURN_DATE;?></td>
                            <td><?php echo $data->BOOKING_STATUS;?></td>
                          </tr>
                          <?php } ?>
                        <?php }?>
                        </tbody>
                      </table>
                      </div>  
                      <br/>  
                      <button type="button" class="btn btn-default" onclick="printElem('vehicleTable')"><i class="fa fa-print"></i> Print</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane <?php if($module=="tap"){echo "active"; }?>" id="tap_booking">
                  <?php echo form_open('modules/searchTap'); ?>
                    <div class="box-body">
                      <?php $this->view("dashboard/common/dateFilter"); ?>
                      <br/>
                      <hr/>
                      <br/>
                      <div id="tapTable">
                      <table class="table table-bordered table-hover" style="width:100%;text-align: left">
                          <th>ID</th>
                          <th>Client full name</th>
                          <th>Tour package name</th>
                          <th>Booking Status</th>
                        </tr>
                        <tbody>
                        <?php if(isset($tap)){ ?>
                          <?php foreach($tap as $data){ ?>
                          <tr>
                            <td><?php echo $data->ID; ?></td>
                            <td><?php echo getSinglePersonByUserId($data->USER_ID); ?></td>
                            <td><?php echo $data->TITLE;?></td>
                            <td><?php echo $data->BOOKING_STATUS;?></td>
                          </tr>
                          <?php } ?>
                        <?php }?>
                        </tbody>
                      </table> 
                      </div>
                      <br/>  
                      <button type="button" class="btn btn-default" onclick="printElem('tapTable')"><i class="fa fa-print"></i> Print</button> 
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane <?php if($module=="promos"){echo "active"; }?>" id="promos_booking">
                  <?php echo form_open('modules/searchPromo'); ?>
                    <div class="box-body">
                      <?php $this->view("dashboard/common/dateFilter"); ?>
                      <br/>
                      <hr/>
                      <br/>
                      <div id="promoTable">
                        <table class="table table-bordered table-hover" style="width:100%;text-align: left">
                        <tr>
                          <th>ID</th>
                          <th>Client full name</th>
                          <th>Promo Name</th>
                          <th>Booking Status</th>
                        </tr>
                        <tbody>
                        <?php if(isset($promo)){ ?>
                          <?php foreach($promo as $data){ ?>
                          <tr>
                            <td><?php echo $data->ID; ?></td>
                            <td><?php echo getSinglePersonByUserId($data->USER_ID); ?></td>
                            <td><?php echo $data->TITLE;?></td>
                            <td><?php echo $data->BOOKING_STATUS;?></td>
                          </tr>
                          <?php } ?>
                        <?php }?>
                        </tbody>
                      </table>
                      </div> 
                      <br/>  
                      <button type="button" class="btn btn-default" onclick="printElem('promoTable')"><i class="fa fa-print"></i> Print</button> 
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
          </div>
          </div>
      </section>
      </div>
  </div>

<?php $this->view("dashboard/modals/addLookupsModal"); ?>
<?php $this->view("dashboard/modals/editLookupsModal"); ?>
<?php $this->view("dashboard/common/obsInclude"); ?>
<script>
function printElem(elem)
{
  var mywindow = window.open('', 'PRINT', 'height=400');
  mywindow.document.write('<html><head><title>' + document.title  + '</title>');
  mywindow.document.write('</head><body >');
  mywindow.document.write('<h1>' + document.title  + '</h1>');
  mywindow.document.write(document.getElementById(elem).innerHTML);
  mywindow.document.write('</body></html>');
  mywindow.document.close(); // necessary for IE >= 10
  mywindow.focus(); // necessary for IE >= 10*/
  mywindow.print();
  mywindow.close();
  return true;
}

</script>