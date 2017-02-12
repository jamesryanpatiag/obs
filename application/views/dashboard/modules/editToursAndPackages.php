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
    <?php
    	$form_attributes = array("id" => "frmEditToursAndPackages"); 
    	echo form_open('modules/updateToursAndPackages', $form_attributes); ?> 
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
              	  <input type="hidden" style="width:30%" class="form-control" id="tapId" name="tapId" value="<?php echo $tap->ID; ?>" />
                  <div class="form-group col-md-12 col-lg-12">
						<label for="tapTitle">Title:</label>
						<input type="text" style="width:30%" class="form-control" id="tapTitle" name="tapTitle" value="<?php echo set_value('tapTitle', isset($tap) && isset($tap->TITLE) ? $tap->TITLE : ''); ?>" >
						<span class="error-mess"><?php echo form_error('tapTitle'); ?></span>
		    	  </div>
		        <div class="form-group col-md-12 col-lg-12">
		        	<label for="tapDescription">Description:</label>
					<div class="row">
				      <div class="hero-unit col-md-12">
				    	<textarea class="textarea wysihtml5" style="height:500px" placeholder="Enter text ..." id="tapDescription" name="tapDescription" ><?php echo set_value('tapDescription', isset($tap) && isset($tap->DESCRIPTION) ? $tap->DESCRIPTION : ''); ?></textarea>
				  	  </div>
				  	</div>
				  	<span class="error-mess"><?php echo form_error('tapDescription'); ?></span>		
				</div>
				<div class="form-group  col-md-4 col-lg-4">
		        <label for="tapHotel">Hotel:</label>
		        <?php var_dump($hotel);?>
		        <select class="form-control pull-right" id="tapHotel" name="tapHotel">
		            <option value="">-- Hotel Place --</option>
		            <?php foreach($hotel as $category){ ?>
		            <option value="<?php echo $category->LOOKUP_ID;?>" <?php if(set_value('tapHotel')==$category->LOOKUP_ID){echo "selected='selected'";}?> ><?php echo $category->VALUE;?></option>
		            <?php } ?>
		        </select>
		    	</div>
				<div class="form-group col-md-4 col-lg-4">
				  <label for="tapNoDays">No. of Days:</label>
				  <input type="text" class="form-control numeric" id="tapNoDays" name="tapNoDays" onBlur="createItineraryFields(this.value)" value="<?php echo set_value('tapNoDays', isset($tap) && isset($tap->NO_OF_DAYS) ? $tap->NO_OF_DAYS : ''); ?>">
				  <span class="error-mess"><?php echo form_error('tapNoDays'); ?></span>
				</div>
				<div class="form-group col-md-4 col-lg-4">
				  <label for="tapNoNights">No. of Nights:</label>
				  <input type="text" class="form-control numeric" id="tapNoNights" name="tapNoNights" value="<?php echo set_value('tapNoNights', isset($tap) && isset($tap->NO_OF_NIGHTS) ? $tap->NO_OF_NIGHTS : ''); ?>">
				  <span class="error-mess"><?php echo form_error('tapNoNights'); ?></span>
				</div> 
				<div class="form-group col-md-6 col-lg-6">
					<label>Valid From:</label>
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="text" class="form-control date datepicker" id="tapValidFrom" name="tapValidFrom" value="<?php echo set_value('tapValidFrom', isset($tap) && isset($tap->VALID_FROM) ? $tap->VALID_FROM : ''); ?>" readonly >
					</div>
					<span class="error-mess"><?php echo form_error('tapValidFrom'); ?></span>
				</div>
		        <div class="form-group col-md-6 col-lg-6">
					<label> Valid To:</label>
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="text" class="form-control datepicker" id="tapValidTo" name="tapValidTo" value="<?php echo set_value('tapValidTo', isset($tap) && isset($tap->VALID_TO) ? $tap->VALID_TO : ''); ?>" readonly >
					</div>
					<span class="error-mess"><?php echo form_error('tapValidTo'); ?></span>
				</div>
				<hr/>
				<div class="form-group col-md-6 col-lg-6">
		        	<label for="tapInclusion">Inclusion:</label>
					<div class="row">
				      <div class="hero-unit col-md-12">
				    	<textarea class="textarea wysihtml5" name="tapInclusion" id="tapInclusion" placeholder="Enter text ..." ><?php echo set_value('tapInclusion', isset($tap) && isset($tap->INCLUSION) ? $tap->INCLUSION : ''); ?></textarea>
				  	  </div>
				  	</div>		
				  	<span class="error-mess"><?php echo form_error('tapInclusion'); ?></span>
				</div>
				<div class="form-group col-md-6 col-lg-6">	
		        	<label for="tapExclusion">Exclusion:</label>
					<div class="row">
				      <div class="hero-unit col-md-12">
				    	<textarea class="textarea wysihtml5" name="tapExclusion" id="tapExclusion" placeholder="Enter text ..." ><?php echo set_value('tapExclusion', isset($tap) && isset($tap->EXCLUSION) ? $tap->EXCLUSION : ''); ?></textarea>
				  	  </div>
				  	</div>	
				  	<span class="error-mess"><?php echo form_error('tapExclusion'); ?></span>	
				</div>
				<div class="form-group col-md-3 col-lg-3">
				  <label for="tapPrice">Price:</label>
				  <input type="text" class="form-control numeric" id="tapPrice" name="tapPrice" value="<?php echo set_value('tapPrice', isset($tap) && isset($tap->PRICE) ? $tap->PRICE : ''); ?>">
				  <span class="error-mess"><?php echo form_error('tapPrice'); ?></span>
				</div>
				<!-- ITINERARY -->
				<div class="row">
			        <div class="col-md-12">
			          <div class="box box-solid">
			            <div class="box-header with-border">
			              <h3 class="box-title" id="itinerary_header_title"></h3>
			            </div>
			            <!-- /.box-header -->
			            <div class="box-body">
			              <div class="box-group" id="itinerary">
			              <?php if(isset($itinerary)) { ?>
			              <?php foreach($itinerary as $i){ ?>
	              				<div class="panel box box-primary">
								  <div class="box-header with-border"> 
								      <h4 class="box-title"> 
								        <a data-toggle="collapse" data-parent="#accordion" href="#itineraryCollapse_<?php echo $i->NTH_DAY; ?>" aria-expanded="false" class="collapsed"> 
								          Day <?php echo $i->NTH_DAY; ?>
								        </a> 
								      </h4> 
								  </div>
								  <div id="itineraryCollapse_<?php echo $i->NTH_DAY; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;"> 
								    <div class="box-body"> 
								      <div class="form-group col-md-12 col-lg-12"> 
								        <label for="tapTitle">Title:</label> 
								        <input type="text" style="width:30%" class="form-control" id="itineraryTitle_<?php echo $i->NTH_DAY; ?>" name="itineraryTitle_<?php echo $i->NTH_DAY; ?>" value="<?php echo set_value('itineraryTitleErrMess_' . $i->NTH_DAY, isset($i) && isset($i->TITLE) ? $i->TITLE : ''); ?>" > 
								        <span class="error-mess" id="itineraryTitleErrMess_<?php echo $i->NTH_DAY; ?>"></span>
								      </div> 
								      <div class="form-group col-md-12 col-lg-12"> 
								        <label for="itineraryDesc_<?php echo $i->NTH_DAY; ?>">Details:</label> 
								        <div class="row"> 
								          <div class="hero-unit col-md-12"> 
								            <textarea class="textarea wysihtml5" name="itineraryDesc_<?php echo $i->NTH_DAY; ?>" id="itineraryDesc_<?php echo $i->NTH_DAY; ?>" placeholder="Enter text ..." ><?php echo set_value('itineraryDescErrMess_' . $i->NTH_DAY, isset($i) && isset($i->DESCRIPTION) ? $i->DESCRIPTION : ''); ?></textarea>
								  		    </div> 
								        </div> 		
								  		  <span class="error-mess" id="itineraryDescErrMess_<?php echo $i->NTH_DAY; ?>"></span> 
								  		</div> 
								    </div> 
								  </div> 
								</div>
			              <?php } ?>
			              <?php } ?>
			              </div>
			            </div>
			            <!-- /.box-body -->
			          </div>
			          <!-- /.box -->
			        </div>
			        <!-- /.col -->
			      </div>
		      	<!-- END OF ITINERARY -->
		      	<div class="form-group col-md-12 col-lg-12">	
		        	<input type="button" onClick="validateItinerary()" class="btn btn-success" value="Update Tour & Package"> 		
				</div>
              </div>
          	</div>
    	</div>
    </div>
  	</div>
</div>
<script src="<?php echo base_url()."assets/"; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>
<script> 

  $(document).ready(function(){

  	// createItineraryFields($("#tapNoDays").val());
  	for(i = 1; i <= <?php echo $tap->NO_OF_DAYS; ?>; i++){
		$('#itineraryCollapse_' + i).collapse("show");
	}

  })

  function createItineraryFields(value){

  	 if(isNumeric(value)){
  	 	$("#itinerary").html("");
  	 	if(value>0){
	 		$("#itinerary_header_title").text("Itinerary");
  	 		for(i = 1;i <= value; i++){
  	 			var html = 
  	 			'<div class="panel box box-primary">' + 
                  '<div class="box-header with-border">' + 
                    '<h4 class="box-title">' + 
                      '<a data-toggle="collapse" data-parent="#accordion" href="#itineraryCollapse_' + i + '" aria-expanded="false" class="collapsed">' + 
                        "Day " + i +
                      '</a>' + 
                    '</h4>' + 
                  '</div>' +
                  '<div id="itineraryCollapse_' + i + '" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">' + 
                    '<div class="box-body">' + 
                		'<div class="form-group col-md-12 col-lg-12">' + 
							'<label for="tapTitle">Title:</label>' + 
							'<input type="text" style="width:30%" class="form-control" id="itineraryTitle_' + i + '" name="itineraryTitle_' + i + '" value="" >' + 
							'<span class="error-mess" id="itineraryTitleErrMess_' + i + '"></span>' + 
			    	  	'</div>' + 
                      	'<div class="form-group col-md-12 col-lg-12">' + 
				        	'<label for="itineraryDesc_' + i + '">Details:</label>' + 
							'<div class="row">' + 
						      '<div class="hero-unit col-md-12">' + 
						    	'<textarea class="textarea wysihtml5" name="itineraryDesc_' + i + '" id="itineraryDesc_' + i + '" placeholder="Enter text ..." ></textarea>' + 
						  	  '</div>' + 
						  	'</div>' + 		
						  	'<span class="error-mess" id="itineraryDescErrMess_' + i + '"></span>' + 
						'</div>' + 
                    '</div>' + 
                  '</div>' + 
                '</div>';
	 			$("#itinerary").append(html);
	 			$('#itineraryCollapse_' + i).collapse("show");
  	 		}
  	 		for(i = 1; i <= value; i++){
                $("#itineraryDesc_" + i).wysihtml5();
  	 		}
  	 	}
  	 }
  }

  function validateItinerary(){
  	 var value = $("#tapNoDays").val();
  	 if(isNumeric(value)){
  	 	if(value==0){
  	 		$("#frmEditToursAndPackages").submit();
  	 	}
  	 	var err = 0;
  	 	for(i = 1;i <= value; i++){
  	 		var title = $("#itineraryTitle_" + i).val();
  	 		var description = $("#itineraryDesc_" + i).val();
  	 		if(title==""){
  	 			$("#itineraryTitleErrMess_" + i).html("<p>The Title field is required.</p>");
  	 			err++;
  	 		}
  	 		if(description==""){
  	 			$("#itineraryDescErrMess_" + i).html("<p>The Description field is required.</p>");	
  	 			err++;
  	 		}
  	 	}
  	 	if(err>0){
  	 		return false;
  	 	}else{
  	 		$("#frmEditToursAndPackages").submit();	
  	 	}
  	 }
  	 $("#frmEditToursAndPackages").submit();
  }

  $('.textarea').wysihtml5();

  function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}
</script>
