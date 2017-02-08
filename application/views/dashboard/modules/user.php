<?php $this->view("dashboard/common/sub-header"); ?>
<div class="content-wrapper">
      <div style="height:50px;"></div>
      <section class="container">
      <div class="row">
        <div class="col-xs-12">
        <!-- PERSONAL DETAILS -->
        <?php echo form_open('user/editUser'); ?>
          <div class="col-md-12 col-lg-12">
              <input type="submit" class="btn btn-info" value="Save Details" >
              <br/><br/>
                <?php if(isset($isSuccess) && $isSuccess == "true"){ ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    Account has been successfully saved.
                </div>
                <?php } ?>
          </div>
          <br/><br/><br/>
          <div class="col-md-6 col-lg-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Personal Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                    <div class="form-group">
                      <label for="first_name">Firstname</label>
                      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter Firstname" value="<?php echo set_value('first_name', isset($user) && isset($user->FIRSTNAME) ? $user->FIRSTNAME : ''); ?>"  >
                      <span class="error-mess"><?php echo form_error('first_name'); ?></span>
                    </div>
                    <div class="form-group">
                      <label for="middlename">Middlename</label>
                      <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Enter Middlename" value="<?php echo set_value('middlename', isset($user) && isset($user->MIDDLENAME) ? $user->MIDDLENAME : ''); ?>" >
                    </div>
                    <div class="form-group">
                      <label for="last_name">Surname</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Surname" value="<?php echo set_value('last_name', isset($user) && isset($user->LASTNAME) ? $user->LASTNAME : ''); ?>" >
                      <span class="error-mess"><?php echo form_error('last_name'); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="dob" class="form-control pull-right" id="dob" value="<?php echo set_value('dob', isset($user) && isset($user->BIRTHDATE) ? $user->BIRTHDATE : date('Y-m-d')); ?>">
                        </div>
                        <span class="error-mess"><?php echo form_error('dob'); ?></span>
                    </div>
                    <div class="form-group">
                      <label for="gender">Gender</label>
                      <select id="gender" name="gender" class="form-control">
                          <option value="">-- Choose Gender --</option>
                          <option value="Male" <?php if(isset($user) && $user->GENDER=='M'){ echo 'selected="selected"'; } ?> <?php echo set_select('gender', 'Male', false); ?> >Male</option>
                          <option value="Female" <?php if(isset($user) && $user->GENDER=='F'){ echo 'selected="selected"'; } ?> <?php echo set_select('gender', 'Female', false); ?> >Female</option>
                      </select>
                    </div>
                  </div>
                  <!-- /.box-body -->
              </div>
          </div>

          <!-- ACCOUNT DETAILS -->
          <div class="col-md-6 col-lg-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Account Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <!-- <form role="form"> -->
                  <div class="box-body">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="hidden" id="module" name="module" value="<?php echo $sub_title; ?>" />
                      <?php if(!isset($user)){ ?>
                          <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="<?php echo set_value('username'); ?>">
                      <?php } else { ?>
                          <label>: <?php echo $user->USERNAME; ?></label>
                      <?php } ?>
                      <span class="error-mess"><?php echo form_error('username'); ?></span>
                    </div>
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <?php if(!isset($user)){ ?>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo set_value('email'); ?>">
                      <?php } else { ?>
                          <input type="hidden" class="form-control" id="email" name="email" value="<?php echo $user->EMAIL_ADDRESS; ?>">    
                          <input type="hidden" class="form-control" id="username" name="username" value="<?php echo $user->USERNAME; ?>">
                          <input type="hidden" class="form-control" id="userid" name="userid" value="<?php echo $user->ID; ?>">    
                          <label>: <?php echo $user->EMAIL_ADDRESS; ?></label>
                      <?php } ?>
                      <span class="error-mess"><?php echo form_error('email'); ?></span>
                    </div>  
                    <div class="form-group">
                      <?php if(isset($user)){ ?>
                          <a href="<?php echo site_url('modules/changepassword/') . sha1($user->ID); ?>"><i class="fa fa-key"> Change Password</i></a>
                      <?php } ?>
                    </div>
                  </div>
                  <!-- /.box-body -->
                <!-- </form> -->
              </div>
          </div>

        <?php echo form_close(); ?>

        </div>
      </div>
    </section>
    <!-- /.content -->
</div>
 <?php $this->view("dashboard/common/mail-common-includes"); ?>