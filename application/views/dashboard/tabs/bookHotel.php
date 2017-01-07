<div class="row" style="padding:20px">
    <?php if($this->session->flashdata('message')){?>
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('message'); ?>
        </div>
        <?php }?>
  <?php echo form_open('modules/submitBookHotel'); ?>
  <div class="col-md-6 col-lg-6 col-sm-6">
     <div class="form-group">
        <div class="form-group">
            <label for="hotelDestination">Destination:</label>
            <select class="form-control pull-right" id="hotelDestination" name="hotelDestination">
                <option value="">-- Destination --</option>
                <?php foreach($destination as $category){ ?>
                <option value="<?php echo $category->LOOKUP_ID;?>" <?php if(set_value('hotelDestination')==$category->LOOKUP_ID){echo "selected='selected'";}?> ><?php echo $category->VALUE;?></option>
                <?php } ?>
            </select>
        </div>
        <span class="error-mess"><?php echo form_error('hotelDestination'); ?></span>
        <div class="form-group">
            <label>Check-in Date:</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="hotelCheckInDate" name="hotelCheckInDate" value="<?php echo set_value('hotelCheckInDate') ?>">
            </div>
            <span class="error-mess"><?php echo form_error('hotelCheckInDate'); ?></span>
          </div>
      </div>
  </div>
  <div class="col-md-6 col-lg-6 col-sm-6">
    <div class="form-group">
        <label for="hotel">Hotel:</label>
        <select class="form-control pull-right" id="hotel" name="hotel">
            <option value="">-- Hotel Place --</option>
            <?php foreach($hotel as $category){ ?>
            <option value="<?php echo $category->LOOKUP_ID;?>" <?php if(set_value('hotel')==$category->LOOKUP_ID){echo "selected='selected'";}?> ><?php echo $category->VALUE;?></option>
            <?php } ?>
        </select>
    </div>
    <span class="error-mess"><?php echo form_error('hotel'); ?></span>
    <div class="form-group">
      <label>Check-out Date:</label>
      <div class="input-group date">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control pull-right" id="hotelCheckOutDate" name="hotelCheckOutDate" value="<?php echo set_value('hotelCheckOutDate') ?>">
      </div>
      <span class="error-mess"><?php echo form_error('hotelCheckOutDate'); ?></span>
    </div>
  </div>
  <div class="form-group col-md-2 col-lg-2">
          <label for="hotelNoOfRooms">No. of Rooms:</label>
          <input type="text" class="form-control" id="hotelNoRooms" name="hotelNoRooms" value="<?php echo set_value('hotelNoRooms') ?>">
          <span class="error-mess"><?php echo form_error('hotelNoRooms'); ?></span>
  </div>
  <div class="form-group col-md-2 col-lg-2">
          <label for="hotelNoAdults">No. of Adults:</label>
          <input type="text" class="form-control" id="hotelNoAdults" name="hotelNoAdults" value="<?php echo set_value('hotelNoAdults') ?>">
          <span class="error-mess"><?php echo form_error('hotelNoAdults'); ?></span>
  </div>
  <div class="form-group col-md-2 col-lg-2">
      <label for="hotelNoChildren">No. of Children:</label>
      <input type="text" class="form-control" id="hotelNoChildren" name="hotelNoChildren" value="<?php echo set_value('hotelNoChildren') ?>">
      <span class="error-mess"><?php echo form_error('hotelNoChildren'); ?></span>
  </div>

 <div style="margin-top:20px" class="form-group col-md-12 col-lg-12">
	    <input type="submit" class="btn btn-warning" >
	    <i class="fa fa-check-circle" aria-hidden="true"/></i>
	    Book this Hotel
	  </div>
  <?php echo form_close(); ?>
</div>