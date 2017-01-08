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
              <div id="tap-table-alert-msg" class="col-md-12 col-lg-12" style="text-align: center"></div>
      <div class="nav-tabs-custom col-md-12 col-lg-12">
        <ul class="nav nav-tabs">
              <li class='active'><a style="background:#31250e;color:#fff;" href="#tab_1" data-toggle="tab"><b>Tours & Packages Details<b></a></li>
            </ul>
            <div class="tab-content">
              <?php if($this->session->flashdata('message')){?>
              <div class="alert alert-success fade in">
                  <a href="#" class="close" data-dismiss="alert">&times;</a>
                  <strong>Success!</strong> <?php echo $this->session->flashdata('message'); ?>
              </div>
            <?php }?>
              <div class="tab-pane active" id="tab_1">
                  <div class="row">
                     <div class="form-group col-md-3 col-lg-3">
                        <h2><?php echo $tap->TITLE;?></h2>
                        <label><i class="fa fa-clock-o"></i> <?php echo $tap->NO_OF_NIGHTS . " Nights /";?></label> 
                        <label><?php echo $tap->NO_OF_DAYS . " Days " ?></label>
                        <hr/>
                        <label>Price:</label><br/>
                        <?php echo $currency_symbol." ";?>
                        <a href="#" style="color:red;font-size:30px"><b><i><?php echo number_format($tap->PRICE,2);?></i></b></a>
                        <br/>
                        <?php if($_SESSION["role_code"]==CUSTOMER){?>
                        <?php if(notYetBooked($tap->ID)){?>
                          <button id="bookPackage" class="btn btn-danger" onClick="bookPackage(<?php echo $tap->ID; ?>)"> <i class="fa fa-dropbox" aria-hidden="true"></i> Book this Package</button>
                        <?php }else{ ?>
                          <button class="btn btn-success" disabled><i class="fa fa-dropbox" aria-hidden="true"></i> Already booked this Package</button>
                        <?php } ?>
                        <?php }?>
                        <hr/>
                        <i class="fa fa-calendar" aria-hidden="true"></i> Validity: <?php echo $tap->VALID_FROM . "/" . $tap->VALID_TO; ?>  
                    </div>
                    <div class="form-group col-md-9 col-lg-9">
                      <p class="text-justify"><?php echo $tap->DESCRIPTION;?></P>
                    </div>  
                   
                  </div>
                  <div class="row">
                    <div class="form-group col-md-3 col-lg-3"></div>
                    <div class="form-group col-md-5 col-lg-5">
                      <label for="tapTitle"></label>
                      <h5><b>Inclusion:</b></h5>
                      <P><?php echo $tap->INCLUSION;?></P>
                    </div>
                    <div class="form-group col-md-4 col-lg-4">
                      <label for="tapTitle"></label>
                      <h5><b>Exclusion:</b></h5>
                      <P><?php echo $tap->EXCLUSION;?></P>
                    </div>
                  </div>
                  
              </div>
            </div>
      </div>

      </section>
    </div>
  </div>
  <?php $this->view("dashboard/common/footer-html"); ?>

<script>
  
  function bookPackage(id){
    if(confirm("Are you sure you want to Book this Tour/Package")){
        var fd = new FormData();
        fd.append("id", id);
        $.ajax({
          url: "<?php echo site_url('modules/submitToursAndPackageSchedule'); ?>",
          type: 'POST',
          data: fd,  
          processData: false,
          contentType: false,
          success: function(msg) {
            if(msg=="YES"){
              $("#tap-table-alert-msg").html('<div class="alert alert-success text-center" style="width:100%">Tour / Package has been successfully booked!</div>');
              $("#bookPackage").prop("disabled",true);
              setTimeout(function(){ location.reload() }, 3000);
            }
          }
        });
        return false;
    }
  }

</script>