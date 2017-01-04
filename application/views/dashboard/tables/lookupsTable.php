<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">Table List</h3>
</div>

<!-- /.box-header -->
<div class="box-body">
  <div id="lookup-table-alert-msg"></div>
  <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>Category</th>  
      <th>Value</th>
      <th width="10%">Action</th>
    </tr>
    </thead>
    <tbody>
        <?php if(isset($list) && !empty($list)){?>
            <?php foreach($list as $item){
                ?>
                <tr>
                    <td><?php echo $item->NAME;?></td>
                    <td><?php echo $item->VALUE;?></td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#editLookupsModal" title="Edit" class="btn btn-info btn-flat" onClick="getLookupById('<?php echo $item->LOOKUP_ID;?>')">
                              <span class="fa fa-pencil"></span></a>
                        <a href="#" title="Delete" class="btn btn-danger btn-flat" onClick="deleteLookup('<?php echo $item->LOOKUP_ID;?>')">
                              <span class="fa fa-trash"></span></a>
                    </td>
                </tr>
            <?php }?>
        <?php }?>
    </tbody>
    <tfoot>
    <tr>
      <th>Category</th>  
      <th>Value</th>
      <th>Action</th>
    </tr>
    </tfoot>
  </table>
</div>
</div>
</div>
</div>