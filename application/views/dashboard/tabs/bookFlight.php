	<div class="row" style="padding:20px">
		<?php if($this->session->flashdata('message')){?>
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('message'); ?>
        </div>
        <?php }?>
	  <?php echo form_open('modules/submitBookFlight'); ?> 
	  <div class="col-md-6 col-lg-6 col-sm-6">
	     <div class="form-group">
	        <div class="form-group">
	            <label for="flightTicketType">Ticket Type:</label>
	            <select class="form-control pull-right" id="flightTicketType" name="flightTicketType">
	                <option value="">-- Ticket Type --</option>
	                <?php foreach($ticket_type as $category){ ?>
	                <option value="<?php echo $category->LOOKUP_ID;?>" <?php if(set_value('flightTicketType')==$category->LOOKUP_ID){echo "selected='selected'";}?> > <?php echo $category->VALUE;?></option>
	                <?php } ?>
	            </select>
	        </div>
	        <span class="error-mess"><?php echo form_error('flightTicketType'); ?></span>

	        <div class="form-group">
	            <label for="flightDeparturePlace">Departure Place:</label>
	            <select class="form-control pull-right" id="flightDeparturePlace" name="flightDeparturePlace">
	                <option value="">-- Departure Place --</option>
	                <?php foreach($destination as $category){ ?>
	                <option value="<?php echo $category->LOOKUP_ID;?>" <?php if(set_value('flightDeparturePlace')==$category->LOOKUP_ID){echo "selected='selected'";}?>><?php echo $category->VALUE;?></option>
	                <?php } ?>
	            </select>
	        </div>
	        <span class="error-mess"><?php echo form_error('flightDeparturePlace'); ?></span>

	        <hr/>
	        <div class="form-group">
		      <label>Departure Date:</label>
		      <div class="input-group date">
		        <div class="input-group-addon">
		          <i class="fa fa-calendar"></i>
		        </div>
		        <input type="text" class="form-control pull-right datepicker" id="flightDepartureDate" name="flightDepartureDate" value="<?php echo set_value('flightDepartureDate') ?>" readonly >
		      </div>
		      <span class="error-mess"><?php echo form_error('flightDepartureDate'); ?></span>
		    </div>

	        <div class="form-group">
            <label for="flightAirline">Airline:</label>
	            <select class="form-control pull-right" id="flightAirline" name="flightAirline">
	                <option value="">-- Airline --</option>
	                <?php foreach($airline as $category){ ?>
	                <option value="<?php echo $category->LOOKUP_ID;?>" <?php if(set_value('flightAirline')==$category->LOOKUP_ID){echo "selected='selected'";}?>><?php echo $category->VALUE;?></option>
	                <?php } ?>
	            </select>
	        </div>
	        <span class="error-mess"><?php echo form_error('flightAirline'); ?></span>
	      </div>
	  </div>
	  <div class="col-md-6 col-lg-6 col-sm-6">

      	<div class="form-group">
            <label for="flightClass">Seat Class:</label>
            <select class="form-control pull-right" id="flightClass" name="flightClass">
                <option value="">-- Seat Class --</option>
                <?php foreach($class as $category){ ?>
                <option value="<?php echo $category->LOOKUP_ID;?>" <?php if(set_value('flightClass')==$category->LOOKUP_ID){echo "selected='selected'";}?>><?php echo $category->VALUE;?></option>
                <?php } ?>
            </select>
        </div>
        <span class="error-mess"><?php echo form_error('flightClass'); ?></span>

        <div class="form-group">
            <label for="flightArrivalPlace">Arrival Place:</label>
            <select class="form-control pull-right" id="flightArrivalPlace" name="flightArrivalPlace">
                <option value="">-- Arrival Place --</option>
                <?php foreach($destination as $category){ ?>
                <option value="<?php echo $category->LOOKUP_ID;?>" <?php if(set_value('flightArrivalPlace')==$category->LOOKUP_ID){echo "selected='selected'";}?>><?php echo $category->VALUE;?></option>
                <?php } ?>
            </select>
        </div>
        <span class="error-mess"><?php echo form_error('flightArrivalPlace'); ?></span>
        <hr/>
	    <div class="form-group">
	      <label>Return Date:</label>
	      <div class="input-group date">
	        <div class="input-group-addon">
	          <i class="fa fa-calendar"></i>
	        </div>
	        <input type="text" class="form-control pull-right datepicker" id="flightReturnDate" name="flightReturnDate" value="<?php echo set_value('flightReturnDate') ?>" readonly>
	      </div>
	      <span class="error-mess"><?php echo form_error('flightReturnDate'); ?></span>
	    </div>
	  </div>
	  <div class="form-group col-md-2 col-lg-2">
	          <label for="flightNoAdults">Adults:</label>
	          <input type="text" class="form-control numeric" id="flightNoAdults" name="flightNoAdults" value="<?php echo set_value('flightNoAdults') ?>" >
	          <span class="error-mess"><?php echo form_error('flightNoAdults'); ?></span>
		</div>
		
		<div class="form-group col-md-2 col-lg-2">
		  <label for="flightNoChildren">Children:</label>
		  <input type="text" class="form-control numeric" id="flightNoChildren" name="flightNoChildren" value="<?php echo set_value('flightNoChildren') ?>">
		  <span class="error-mess"><?php echo form_error('flightNoChildren'); ?></span>
		</div>
		
		<div class="form-group col-md-2 col-lg-2">
		  <label for="flightNoInfants">Infants:</label>
		  <input type="text" class="form-control numeric" id="flightNoInfants" name="flightNoInfants" value="<?php echo set_value('flightNoInfants') ?>">
		  <span class="error-mess"><?php echo form_error('flightNoInfants'); ?></span>
		</div>
      	
	  <div style="margin-top:20px" class="form-group col-md-12 col-lg-12">
	    <input type="submit" class="btn btn-warning" >
	    <i class="fa fa-check-circle" aria-hidden="true"/></i>
	    Inquire this Flight
	  </div>
	  <?php echo form_close(); ?>
	</div>