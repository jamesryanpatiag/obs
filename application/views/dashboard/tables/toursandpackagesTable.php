<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header"></h3>
</div>

<!-- /.box-header -->
<div class="box-body">
  <div id="lookup-table-alert-msg"></div>
  <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>Title/Description</th>
    </tr>
    </thead>
    <tbody>
        <?php if(isset($list) && !empty($list)){?>
            <?php
        		foreach($list as $item){
                ?>
                <tr>
                    <td>    
                        <div class="col-md-12 col-lg-12">
                            <h4><a href="<?php echo site_url("modules/viewToursAndPackages/".$item->ID)?>"><b><?php echo $item->TITLE;?></b></a></h4>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <h4><a href="#" style="color:red"><b><i><?php echo $currency_symbol." ".$item->PRICE;?></i></b></a></h4>
                        </div>
                        <div class="col-md-10 col-lg-10">
                            <p class="text-justify"><?php if(strlen($item->DESCRIPTION)>800){echo substr($item->DESCRIPTION, 0, 800)."...";}else{echo $item->DESCRIPTION;} ?></p>
                        </div>
                        <div class="col-md-12 col-lg-12" style="margin-top:2px"></div>
                        <div class="col-md-12 col-lg-12">
                            <h5>Valid From: <?php echo $item->VALID_FROM; ?> to <?php echo $item->VALID_TO; ?></h5>
                        </div>
                	</td>
                </tr>
            <?php }?>
        <?php }?>
    </tbody>
  </table>
</div>
</div>
</div>
</div>