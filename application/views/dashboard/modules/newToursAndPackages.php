<?php $this->view("dashboard/common/sub-header"); ?>
<style>
.wysihtml5{
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    width: 100%;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div style="height:50px;"></div>
    <div class="container">
      <section class="content-header">
        <h1><i class="fa fa-dropbox" aria-hidden="true"></i><?php echo $page_title;?></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</li></a> /<?php echo $page_title;?></li></ol>
        <div style="height:20px;"></div>
        <?php if($_SESSION["role_code"]==ADMINISTRATOR){?>
        <?php } ?>
      </section>
          <!-- Main content -->
    <div class="content">
    <?php echo form_open('modules/submitToursAndPackages'); ?> 
    	<div class="nav-tabs-custom col-md-12 col-lg-12">
    		<ul class="nav nav-tabs">
              <li class='active'><a style="background:#31250e;color:#fff;" href="#tab_1" data-toggle="tab"><b>Tours & Packages<b></a></li>
            </ul>
            <div class="tab-content">
            	<?php if($this->session->flashdata('message')){?>
			        <div class="alert alert-success fade in">
			            <a href="#" class="close" data-dismiss="alert">&times;</a>
			            <strong>Success!</strong> <?php echo $this->session->flashdata('message'); ?>
			        </div>
		        <?php }?>
              <div class="tab-pane active" id="tab_1">
                  <div class="form-group col-md-12 col-lg-12">
						<label for="tapTitle">Title:</label>
						<input type="text" style="width:30%" class="form-control" id="tapTitle" name="tapTitle" value="<?php echo set_value('tapTitle') ?>" >
						<span class="error-mess"><?php echo form_error('tapTitle'); ?></span>
		    	  </div>
		        <div class="form-group col-md-12 col-lg-12">
		        	<label for="tapDescription">Description:</label>
					<div class="row">
				      <div class="hero-unit col-md-12">
				    	<textarea class="textarea wysihtml5" style="height:500px" placeholder="Enter text ..." id="tapDescription" name="tapDescription" ><?php echo set_value('tapTitle') ?></textarea>
				  	  </div>
				  	</div>
				  	<span class="error-mess"><?php echo form_error('tapDescription'); ?></span>		
				</div>
				<div class="form-group  col-md-4 col-lg-4">
		        <label for="tapHotel">Hotel:</label>
		        <select class="form-control pull-right" id="tapHotel" name="tapHotel">
		            <option value="">-- Hotel Place --</option>
		            <?php foreach($hotel as $category){ ?>
		            <option value="<?php echo $category->LOOKUP_ID;?>" <?php if(set_value('tapHotel')==$category->LOOKUP_ID){echo "selected='selected'";}?> ><?php echo $category->VALUE;?></option>
		            <?php } ?>
		        </select>
		    	</div>
				<div class="form-group col-md-2 col-lg-2">
				  <label for="tapNoDays">No. of Days:</label>
				  <input type="text" class="form-control" id="tapNoDays" name="tapNoDays" value="<?php echo set_value('tapNoDays') ?>">
				  <span class="error-mess"><?php echo form_error('tapNoDays'); ?></span>
				</div>
				<div class="form-group col-md-2 col-lg-2">
				  <label for="tapNoNights">No. of Nights:</label>
				  <input type="text" class="form-control" id="tapNoNights" name="tapNoNights" value="<?php echo set_value('tapNoNights') ?>">
				  <span class="error-mess"><?php echo form_error('tapNoNights'); ?></span>
				</div>
				<div class="form-group col-md-2 col-lg-2">
					<label>Valid From:</label>
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="text" class="form-control datepicker" id="tapValidFrom" name="tapValidFrom" value="<?php echo set_value('tapValidFrom') ?>" readonly >
					</div>
					<span class="error-mess"><?php echo form_error('tapValidFrom'); ?></span>
				</div>
		        <div class="form-group col-md-2 col-lg-2">
					<label> Valid To:</label>
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="text" class="form-control datepicker" id="tapValidTo" name="tapValidTo" value="<?php echo set_value('tapValidTo') ?>" readonly >
					</div>
					<span class="error-mess"><?php echo form_error('tapValidTo'); ?></span>
				</div>
				<hr/>
				<div class="form-group col-md-6 col-lg-6">
		        	<label for="tapInclusion">Inclusion:</label>
					<div class="row">
				      <div class="hero-unit col-md-12">
				    	<textarea class="textarea wysihtml5" name="tapInclusion" id="tapInclusion" placeholder="Enter text ..." ><?php echo set_value('tapInclusion') ?></textarea>
				  	  </div>
				  	</div>		
				  	<span class="error-mess"><?php echo form_error('tapInclusion'); ?></span>
				</div>
				<div class="form-group col-md-6 col-lg-6">	
		        	<label for="tapExclusion">Exclusion:</label>
					<div class="row">
				      <div class="hero-unit col-md-12">
				    	<textarea class="textarea wysihtml5" name="tapExclusion" id="tapExclusion" placeholder="Enter text ..." ><?php echo set_value('tapExclusion') ?></textarea>
				  	  </div>
				  	</div>	
				  	<span class="error-mess"><?php echo form_error('tapExclusion'); ?></span>	
				</div>
				<div class="form-group col-md-3 col-lg-3">
				  <label for="tapPrice">Price:</label>
				  <input type="text" class="form-control" id="tapPrice" name="tapPrice" value="<?php echo set_value('tapPrice') ?>">
				  <span class="error-mess"><?php echo form_error('tapPrice'); ?></span>
				</div>
				<div class="form-group col-md-12 col-lg-12">	
		        	<input type="submit" class="btn btn-success" value="Save Tour & Package" />		
				</div>
              </div>
          	</div>
    	</div>
    </div>
  	</div>
</div>

<script src="<?php echo base_url()."assets/"; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>
<script>
  $('.textarea').wysihtml5();
</script>
