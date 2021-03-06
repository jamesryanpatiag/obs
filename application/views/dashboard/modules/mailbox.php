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
        <div class="col-md-3">
          <a href="<?php echo site_url('/modules/composeMail');?>" class="btn btn-primary btn-block margin-bottom">Compose</a>
          <?php $this->view("dashboard/common/mail-sidebar"); ?>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $page_title; ?></h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <?php if($module != "trashmailbox"){?>
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <?php } ?>
                <div class="btn-group">
                  <?php if($module != "trashmailbox"){?>
                  <button type="button" class="btn btn-default btn-sm" onClick="deleteSelectedMail('<?php echo $module; ?>', '<?php echo $module != "trashmailbox" ? 'MOVE_TO_TRASH' : 'DELETE_FOREVER'; ?>')"><i class="fa fa-trash-o"></i></button>
                   <?php } ?>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh" onClick="location.reload();"></i></button>
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default  btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  <?php foreach($mails as $mail){ ?>
                  <tr>
                    <td>
                      <?php if($module != "trashmailbox"){?>
                      <input class="mails" id="chkmail_<?php echo $mail->ID; ?>" type="checkbox">
                      <?php }?>
                      <input value="<?php echo $mail->ID; ?>" type="hidden">
                    </td>
                    <?php
                      if(isset($mail->TYPE)){
                         $x = $mail->TYPE;
                      }else{
                         $x = "";
                      }
                    ?>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="<?php echo site_url('/modules/readMail/'.$module.'/' . md5($mail->ID) . '/' . $x)?>"><?php echo getEmailById($mail->FROM_USER_ID);?></a></td>
                    <td class="mailbox-subject">
                        <?php if($mail->IS_READ == 0 && $module=="mailbox"){ ?>
                            <b><?php echo $mail->SUBJECT;?></b>
                        <?php }else{ ?>
                            <?php echo $mail->SUBJECT;?>
                        <?php } ?>
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date"><?php echo date_format(date_create($mail->CREATED_DATE), "F d Y");?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" onClick="deleteSelectedMail('<?php echo $module; ?>', '<?php echo $module != "trashmailbox" ? 'MOVE_TO_TRASH' : 'DELETE_FOREVER'; ?>')"><i class="fa fa-trash-o"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <div class="control-sidebar-bg"></div>
</div>
 <?php $this->view("dashboard/common/mail-common-includes"); ?>