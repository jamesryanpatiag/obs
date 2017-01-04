<div class="modal fade" id="editLookupsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Lookups</h4>
      </div>
      <div class="modal-body">
          <div id="form_container">
            <div class="box-body">
                <div id="lookup-edit-alert-msg"></div>
                <div class="form-group">
                  <label for="editCmbCategory">Category:</label>
                  <select class="form-control pull-right" id="editCmbCategory">
                      <option value="">-- Select Category --</option>
                      <?php foreach($categories as $category){ ?>
                      <option value="<?php echo $category->ID;?>" ><?php echo $category->NAME;?></option>
                      <?php } ?>
                  </select>
                </div>
                <div class="form-group" style="height:10px"></div>
                <div class="form-group">
                    <label for="editTxtValue">Value</label>
                    <input type="text" class="form-control" id="editTxtValue" >
                    <input type="hidden" class="form-control" id="editLookupId" >
                </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <input type="button" id="btnEditLookup" value="Submit" class="btn btn-primary" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>