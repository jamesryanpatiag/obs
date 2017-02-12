  <?php $this->view("dashboard/common/sub-header"); ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div style="height:50px;"></div>
    <div class="container">
      <section class="content-header">
        <h1><i class="fa fa-dropbox" aria-hidden="true"></i><?php echo $page_title;?></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</li></a> /<?php echo $page_title;?></li></ol>
        <div style="height:20px;"></div>
        <?php if($_SESSION["role_code"]==ADMINISTRATOR && $module==="promos") {?>
          <a href="<?php echo site_url("modules/newPromos"); ?>" title="New Promos" class="btn btn-info" > 
           <i class="fa fa-plus" aria-hidden="true"></i> 
           Add <?php echo $page_title;?> 
          </a> 
          <div style="height:20px;"></div>
          <?php } ?>
      </section>
      <section >
            <?php if($module=="promos"){ ?>
            <?php foreach($list as $item){?>
            <div class="col-md-4">
                <!-- Loop start -->
                <div class="box box-widget widget-user">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header promo-box" style="background-color:#e70d14;color:#ffffff">
                      <h3 class="widget-user-username">
                      <a href="<?php echo site_url("modules/viewPromo/".md5($item->ID))?>">
                        <?php echo $item->TITLE; ?></h3>  
                      </a>
                      <h5 class="widget-user-desc"><?php echo $currency_symbol . " " . $item->PRICE; ?></h5>
                      <?php if($_SESSION["role_code"]==ADMINISTRATOR){?>
                        &nbsp;<small><a href="<?php echo site_url("modules/editPromo/".md5($item->ID))?>" class="btn btn-info"><span class="fa fa-pencil"></span> Edit</a></small>
                      <?php }?>
                  </div>
                  <div class="widget-user-image">
                    <img class="img-circle" src="<?php echo base_url()."assets/"; ?>img/SALEtag.png" alt="User Avatar">
                  </div>
                  <div class="box-footer">
                    <div class="row">
                      <div class="col-sm-6 border-right">
                        <div class="description-block">
                          <span class="description-text">SALES PERIOD FROM</span>
                          <h5 class="description-header"><?php echo $item->SALES_PERIOD_FROM; ?></h5>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-6 border-right">
                        <div class="description-block">
                          <span class="description-text">SALES PERIOD TO</span>
                          <h5 class="description-header"><?php echo $item->SALES_PERIOD_TO; ?></h5>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
                <!-- Loop end -->
            </div>
            <?php }}else{ ?>          
            <?php $this->view("dashboard/tables/promosTable", $list); ?>
            <?php } ?>
      </section>
      </div>
  </div>  11