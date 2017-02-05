  <?php $this->view("dashboard/common/sub-header"); ?>
  <div class="content-wrapper">
    <section class="container">
        <div style="height:50px;"></div>
      <section class="content-header">
        <h1>
          Mailbox
          <small><?php echo count(getAllUnreadMessages()); ?> new messages</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Mailbox</li>
        </ol>
      </section>

      <div class="row">
        <?php if($this->session->flashdata('message')){?>
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('message'); ?>
        </div>
        <?php } ?>
        <div class="col-md-3">
          <a href="<?php echo site_url('/modules/mailbox');?>" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>
          <?php $this->view("dashboard/common/mail-sidebar"); ?>
          <!-- HERE -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Compose New Message</h3>
            </div>
            <!-- /.box-header -->
            <?php echo form_open('modules/sendMail'); ?> 
            <div class="box-body">
              <div class="form-group">
                <input class="form-control" placeholder="To:" name="mailTo" value="<?php echo set_value('mailTo') ?>"/>
              </div>
              <span class="error-mess"><?php echo form_error('mailTo'); ?></span>
              <div class="form-group">
                <input class="form-control" placeholder="Subject:" name="mailSubject" value="<?php echo set_value('mailSubject') ?>"/>
              </div>
              <span class="error-mess"><?php echo form_error('mailSubject'); ?></span>
              <div class="form-group">
                    <textarea id="compose-textarea" class="form-control"  name="mailMessage" style="height: 300px"><?php echo set_value('mailMessage') ?></textarea>
              </div>
              <span class="error-mess"><?php echo form_error('mailMessage'); ?></span>
              <!--
              <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Attachment
                  <input type="file" name="attachment">
                </div>
                <p class="help-block">Max. 32MB</p> 
              </div>
              -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                <input type="submit" class="btn btn-primary" value="Send" />
              </div>
              <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->view("dashboard/common/mail-common-includes"); ?>