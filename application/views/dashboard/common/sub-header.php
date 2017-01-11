  <header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header"> 
                <!-- <a href="../../index2.html" class="navbar-brand"><b>Admin</b>LTE</a> -->
                <a class="navbar-brand" href="<?php echo site_url('/auth/redirectToDashboard'); ?>">
                <img class="img-thumbnail" src="<?php echo base_url()."assets/";?>img/logo.png" style="width:100px;margin-top:-10px" alt="">
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                </a>
            </div>
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li <?php if($module == "bookflight" || $module == "bookhotel" || $module == "rentvehicle" || $module == "usertoursandpackages"){ echo "class='active'"; } ?> >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <b>Bookings</b> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li <?php if($module == "bookflight"){echo "class='active'";} ?>><a href="<?php echo site_url('/modules/bookflight');?>">
                            <i class="fa fa-plane" aria-hidden="true"></i>
                            <b>Book Flight</b></a></li>
                            <li <?php if($module == "bookhotel"){echo "class='active'";} ?>><a href="<?php echo site_url('/modules/bookhotel');?>">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <b>Book Hotel</b></a></li>
                            <li <?php if($module == "rentvehicle"){echo "class='active'";} ?>><a href="<?php echo site_url('/modules/bookvehicle');?>">
                            <i class="fa fa-car" aria-hidden="true"></i>
                            <b>Book Vehicle</b></a></li>
                            <li class="divider"></li>
                            <li <?php if($module == "usertoursandpackages"){echo "class='active'";} ?>><a href="<?php echo site_url('/modules/userToursAndPackages');?>"><i class="fa fa-dropbox" aria-hidden="true"></i><b>Reserve Tours/Package</b></a></li>
                            <li><a href="#"><i class="fa fa-asterisk" aria-hidden="true"></i>  <b>Reserve Promos</b></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                        <b>Cancelled Transactions</b> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">
                            <b>Cancelled Bookings</b></a></li>
                            <li><a href="#">
                            <b>Cancelled Reservations</b></a></li>
                        </ul>
                    </li>
                    <li>
                        <li <?php if($module == "toursandpackages" || $module == "viewtoursandpackages"){echo "class='active'";} ?>><a href="<?php echo site_url('/modules/toursandpackages');?>">
                        <i class="fa fa-dropbox" aria-hidden="true"></i>    
                        <b>Tours & Package</b></a></li>
                    </li>
                    <li>
                        <li><a href="#">
                        <i class="fa fa-asterisk" aria-hidden="true"></i>  
                        <b>Promos</b></a></li>
                    </li>
                    <?php if($_SESSION["role_code"]==ADMINISTRATOR){?>
                        <li>
                         <li <?php if($module == "lookup"){echo "class='active'";} ?>><a href="<?php echo site_url('/modules/lookups');?>">
                        <i class="fa fa-search" aria-hidden="true"></i>  
                        <b>Lookup Values</b></a></li>
                        </li>
                    <?php } ?>
                </ul>
            </div>   
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                      </a>
                      <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                          <!-- inner menu: contains the messages -->
                          <ul class="menu">
                            <li><!-- start message -->
                              <a href="#">
                                <div class="pull-left">
                                  <!-- User Image -->
                                  <img src="<?php echo base_url()."assets/";?>dist/img/user2-160x160.png" class="img-circle" alt="User Image">
                                </div>
                                <!-- Message title and timestamp -->
                                <h4>
                                  Support Team
                                  <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                </h4>
                                <!-- The message -->
                                <p>Why not buy a new awesome theme?</p>
                              </a>
                            </li>
                            <!-- end message -->
                          </ul>
                          <!-- /.menu -->
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                      </ul>
                    </li>
                    <!-- /.messages-menu -->

                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                      <!-- Menu toggle button -->
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                      </a>
                      <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                          <!-- Inner Menu: contains the notifications -->
                          <ul class="menu">
                            <li><!-- start notification -->
                              <a href="#">
                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                              </a>
                            </li>
                            <!-- end notification -->
                          </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                      </ul>
                    </li>
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                      <!-- Menu Toggle Button -->
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                      </a>
                      <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                          <!-- Inner menu: contains the tasks -->
                          <ul class="menu">
                            <li><!-- Task item -->
                              <a href="#">
                                <!-- Task title and progress text -->
                                <h3>
                                  Design some buttons
                                  <small class="pull-right">20%</small>
                                </h3>
                                <!-- The progress bar -->
                                <div class="progress xs">
                                  <!-- Change the css width attribute to simulate progress -->
                                  <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">20% Complete</span>
                                  </div>
                                </div>
                              </a>
                            </li>
                            <!-- end task item -->
                          </ul>
                        </li>
                        <li class="footer">
                          <a href="#">View all tasks</a>
                        </li>
                      </ul>
                    </li>

                    <li class="dropdown user user-menu" >
                      <!-- Menu Toggle Button -->
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="<?php echo base_url()."assets/";?>dist/img/user2-160x160.png" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs"><?php echo $_SESSION["fullname"];?></span>
                      </a>
                      <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                          <img src="<?php echo base_url()."assets/";?>dist/img/user2-160x160.png" class="img-circle" alt="User Image">
                          <p style="color:#000">
                            <?php echo $_SESSION["fullname"];?>
                          </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                          <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                          <div class="pull-right">
                            <a href="<?php echo site_url('/auth/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                          </div>
                        </li>
                      </ul>
                    </li>  
                </ul>
            </div>   
        </div>
    </nav>
</header>