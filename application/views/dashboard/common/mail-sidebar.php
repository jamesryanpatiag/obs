<div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Folders</h3>

    <div class="box-tools">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="box-body no-padding">
    <ul class="nav nav-pills nav-stacked">
      <li><a href="<?php echo site_url('/modules/mailbox');?>"><i class="fa fa-inbox"></i> Inbox
        <span class="label label-primary pull-right"><?php echo count(getAllUnreadMessages()) > 0 ? count(getAllUnreadMessages()) : "";?></span></a></li>
      <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
      <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
      <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
      </li>
      <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
    </ul>
  </div>
  <!-- /.box-body -->
</div>