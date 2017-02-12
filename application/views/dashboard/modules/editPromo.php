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
    	$form_attributes = array("id" => "frmNewPromo"); 
    	echo form_open('modules/updatePromo', $form_attributes); ?> 
    	<div class="nav-tabs-custom col-md-12 col-lg-12">
    		<ul class="nav nav-tabs">
              <li class='active'><a style="background:#31250e;color:#fff;" href="#tab_1" data-toggle="tab"><b>Promo<b></a></li>
            </ul>
            <div class="tab-content">
            	<?php if($this->session->flashdata('message')){?>
			        <div class="alert alert-success fade in">
			            <a href="#" class="close" data-dismiss="alert">&times;</a>
			            <strong>Success!</strong> <?php echo $this->session->flashdata('message'); ?>
			        </div>
		        <?php }?>
              <div class="tab-pane active" id="tab_1">
		    	  <div class="form-group col-md-4 col-lg-4">
						<label for="promoTitle">Title:</label>
						<input type="hidden" class="form-control" id="promoId" name="promoId" value="<?php echo $promo->ID; ?>" />
						<input type="text" class="form-control" id="promoTitle" name="promoTitle" value="<?php echo set_value('promoTitle', isset($promo) && isset($promo->TITLE) ? $promo->TITLE : ''); ?>" >
						<span class="error-mess"><?php echo form_error('promoTitle'); ?></span>
		    	  </div>
		        <div class="form-group col-md-12 col-lg-12">
		        	<label for="promoDescription">Description:</label>
					<div class="row">
				      <div class="hero-unit col-md-12">
				    	<textarea class="textarea wysihtml5" style="height:500px" placeholder="Enter text ..." id="promoDescription" name="promoDescription" ><?php echo set_value('promoDescription', isset($promo) && isset($promo->DESCRIPTION) ? $promo->DESCRIPTION : ''); ?></textarea>
				  	  </div>
				  	</div>
				  	<span class="error-mess"><?php echo form_error('promoDescription'); ?></span>		
				</div>
				<div class="form-group col-md-6 col-lg-6">
					<label>Sales Period From:</label>
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="text" class="form-control date datepicker" id="promoSalesPeriodFrom" name="promoSalesPeriodFrom" value="<?php echo set_value('promoSalesPeriodFrom', isset($promo) && isset($promo->SALES_PERIOD_FROM) ? $promo->SALES_PERIOD_FROM : ''); ?>" readonly >
					</div>
					<span class="error-mess"><?php echo form_error('promoSalesPeriodFrom'); ?></span>
				</div>
		        <div class="form-group col-md-6 col-lg-6">
					<label>Sales Period To:</label>
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="text" class="form-control datepicker" id="promoSalesPeriodTo" name="promoSalesPeriodTo" value="<?php echo set_value('promoSalesPeriodTo', isset($promo) && isset($promo->SALES_PERIOD_TO) ? $promo->SALES_PERIOD_TO : ''); ?>" readonly >
					</div>
					<span class="error-mess"><?php echo form_error('promoSalesPeriodTo'); ?></span>
				</div>
				<div class="form-group col-md-6 col-lg-6">
					<label>Valid From:</label>
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="text" class="form-control date datepicker" id="promoValidFrom" name="promoValidFrom" value="<?php echo set_value('promoValidFrom', isset($promo) && isset($promo->VALID_FROM) ? $promo->VALID_FROM : ''); ?>" readonly >
					</div>
					<span class="error-mess"><?php echo form_error('promoValidFrom'); ?></span>
				</div>
		        <div class="form-group col-md-6 col-lg-6">
					<label> Valid To:</label>
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="text" class="form-control datepicker" id="promoValidTo" name="promoValidTo" value="<?php echo set_value('promoValidTo', isset($promo) && isset($promo->VALID_TO) ? $promo->VALID_TO : ''); ?>" readonly >
					</div>
					<span class="error-mess"><?php echo form_error('promoValidTo'); ?></span>
				</div>
				<hr/>
				<div class="form-group col-md-3 col-lg-3">
				  <label for="promoPrice">Price:</label>
				  <input type="text" class="form-control numeric" id="promoPrice" name="promoPrice" value="<?php echo set_value('promoPrice', isset($promo) && isset($promo->PRICE) ? $promo->PRICE : ''); ?>" >
				  <span class="error-mess"><?php echo form_error('promoPrice'); ?></span>
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
		        	<input type="submit" class="btn btn-success" value="Save Promo"> 		
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
  })

  $('.textarea').wysihtml5();

  function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}
</script>
