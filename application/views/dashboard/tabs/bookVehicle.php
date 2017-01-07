<div class="row" style="padding:20px">
  <?php if($this->session->flashdata('message')){?>
    <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Success!</strong> <?php echo $this->session->flashdata('message'); ?>
    </div>
    <?php }?>
    <?php echo form_open('modules/submitBookVehicle'); ?>
    <div class="col-md-6 col-lg-6 col-sm-6">
       <div class="form-group">
          <div class="form-group">
              <label for="vehicleVehicleType">Vehicle Type:</label>
              <select class="form-control pull-right" id="vehicleVehicleType" name="vehicleVehicleType">
                  <option value="">-- Vehicle Type --</option>
                  <?php foreach($vehicle_type as $category){ ?>
                  <option value="<?php echo $category->LOOKUP_ID;?>" <?php if(set_value('vehicleVehicleType')==$category->LOOKUP_ID){echo "selected='selected'";}?> ><?php echo $category->VALUE;?></option>
                  <?php } ?>
              </select>
          </div>
          <span class="error-mess"><?php echo form_error('vehicleVehicleType'); ?></span>
          <div class="form-group" style="height:20px"></div>
          <div class="form-group">
              <label for="vehicleDeparturePlace">Departure Place:</label>
              <select class="form-control pull-right" id="vehicleDeparturePlace" name="vehicleDeparturePlace">
                  <option value="">-- Departure Place --</option>
                  <?php foreach($destination as $category){ ?>
                  <option value="<?php echo $category->LOOKUP_ID;?>" <?php if(set_value('vehicleDeparturePlace')==$category->LOOKUP_ID){echo "selected='selected'";}?> ><?php echo $category->VALUE;?></option>
                  <?php } ?>
              </select>
          </div>
          <span class="error-mess"><?php echo form_error('vehicleDeparturePlace'); ?></span>
          <div class="form-group" style="height:20px"></div>
          <div class="form-group">
              <label for="vehicleArrivalPlace">Arrival Place:</label>
              <select class="form-control pull-right" id="vehicleArrivalPlace" name="vehicleArrivalPlace">
                  <option value="">-- Arrival Place --</option>
                  <?php foreach($destination as $category){ ?>
                  <option value="<?php echo $category->LOOKUP_ID;?>" <?php if(set_value('vehicleArrivalPlace')==$category->LOOKUP_ID){echo "selected='selected'";}?> ><?php echo $category->VALUE;?></option>
                  <?php } ?>
              </select>
          </div>
          <span class="error-mess"><?php echo form_error('vehicleArrivalPlace'); ?></span>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-sm-6">
      <div class="form-group">
        <label>Departure Date:</label>
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right" id="vehicleDepartureDate" name="vehicleDepartureDate" value="<?php echo set_value('vehicleDepartureDate') ?>">
        </div>
        <span class="error-mess"><?php echo form_error('vehicleDepartureDate'); ?></span>
      </div>
      <div class="form-group">
        <label>Return Date:</label>
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right" id="vehicleReturnDate" name="vehicleReturnDate" value="<?php echo set_value('vehicleReturnDate') ?>">
        </div>
        <span class="error-mess"><?php echo form_error('vehicleReturnDate'); ?></span>
      </div>
    </div>
   <div style="margin-top:20px" class="form-group col-md-12 col-lg-12">
      <input type="submit" class="btn btn-warning" >
      <i class="fa fa-check-circle" aria-hidden="true"/></i>
      Rent this Vehicle
    </div>
    <?php echo form_close(); ?>

</div>