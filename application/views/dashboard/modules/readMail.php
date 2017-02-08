<?php $this->view("dashboard/common/sub-header"); ?>
<div class="content-wrapper">
    <section class="container">
        <div style="height:50px;"></div>
        <section class="content-header">
        <h1>
          Read Mail
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Mailbox</li>
        </ol>
      </section>
      <div class="row">
        <div class="col-md-3"> 
            <a href="<?php echo site_url('/modules/composeMail');?>" class="btn btn-primary btn-block margin-bottom">Compose</a>
          <?php $this->view("dashboard/common/mail-sidebar"); ?>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Read Mail</h3>

              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding" id="readmail">
              <div class="mailbox-read-info">
                <h3><?php echo $mail->SUBJECT;?></h3>
                <h5><?php echo $mail->EMAIL;?>
                  <span class="mailbox-read-time pull-right"><?php echo $mail->CREATED_DATE;?></span></h5>
              </div>
              <div class="mailbox-read-message">
                <?php echo $mail->MESSAGE;?>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
<!--               <ul class="mailbox-attachments clearfix">
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> App Description.docx</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo1.png" alt="Attachment"></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo1.png</a>
                        <span class="mailbox-attachment-size">
                          2.67 MB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo2.png" alt="Attachment"></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo2.png</a>
                        <span class="mailbox-attachment-size">
                          1.9 MB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
              </ul> -->
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
                <?php if($type=="mailbox"){ ?>
                <a href="<?php echo site_url('/modules/replyMail/'.$mail->ID);?>" class="btn btn-default"><i class="fa fa-reply"></i> Reply</a>
                <?php } ?>
                <!-- <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button> -->
              </div>
              <?php if($orig_type!=""){ ?>
                <button type="button" class="btn btn-default" onclick="deleteMessage(<?php echo $mail->ID?>, '<?php echo $type;?>', 'DELETE_FOREVER')"><i class="fa fa-trash-o"></i> Delete Forever</button>
              <?php }else{ ?>
                <button type="button" class="btn btn-default" onclick="deleteMessage(<?php echo $mail->ID?>, '<?php echo $type;?>', 'MOVE_TO_TRASH')"><i class="fa fa-trash-o"></i> Move to Trash</button>
              <?php } ?>
              <button type="button" class="btn btn-default" onclick="printElem('readmail')"><i class="fa fa-print"></i> Print</button>
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
 <?php $this->view("dashboard/common/mail-common-includes"); ?>