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
                            <li <?php if($module == "userpromo"){echo "class='active'";} ?>><a href="<?php echo site_url('/modules/userPromo');?>"><i class="fa fa-asterisk" aria-hidden="true"></i><b>Reserve Promos</b></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                        <b>Cancelled Transactions</b> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo site_url('/modules/cancelledbookflight');?>">
                            <b>Cancelled Book Flight</b></a></li>
                             <li><a href="<?php echo site_url('/modules/cancelledbookhotel');?>">
                            <b>Cancelled Book Hotel</b></a></li>
                             <li><a href="<?php echo site_url('/modules/cancelledbookvehicle');?>">
                            <b>Cancelled Book Vehicle</b></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo site_url('/modules/cancelledtoursandpackages');?>">
                            <b>Cancelled Tours & Packages Bookings</b></a></li>
                            <li><a href="<?php echo site_url('/modules/cancelledPromo');?>">
                            <b>Cancelled Promo Bookings</b></a></li>
                            
                        </ul>
                    </li>
                    <li>
                        <li <?php if($module == "toursandpackages" || $module == "viewtoursandpackages"){echo "class='active'";} ?>><a href="<?php echo site_url('/modules/toursandpackages');?>">
                        <i class="fa fa-dropbox" aria-hidden="true"></i>    
                        <b>Tours & Package</b></a></li>
                    </li>
                    <li>
                        <li <?php if($module == "promos" || $module == "viewpromo"){echo "class='active'";} ?>><a href="<?php echo site_url('/modules/promos');?>">
                        <i class="fa fa-asterisk" aria-hidden="true"></i>  
                        <b>Promos</b></a></li>
                    </li>
                    <?php if($_SESSION["role_code"]==ADMINISTRATOR){?>
                        <li <?php if($module == "reports"){echo "class='active'";} ?>><a href="<?php echo site_url('/modules/reports');?>">
                        <i class="fa fa-bar-chart-o" aria-hidden="true"></i>  
                        <b>Reports</b></a></li>
                        <li <?php if($module == "lookup"){echo "class='active'";} ?>><a href="<?php echo site_url('/modules/lookups');?>">
                        <i class="fa fa-search" aria-hidden="true"></i>  
                        <b>Lookup Values</b></a></li>
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
                        <span class="label label-success"><?php echo count(getAllUnreadMessages()) > 0 ? count(getAllUnreadMessages()) : "";?></span>
                      </a>
                      <ul class="dropdown-menu">
                        <li class="header">
                          <label><a href="<?php echo site_url('/modules/composeMail');?>">Compose new message</a></label>
                        </li>
                        <li class="header">You have <?php echo count(getAllUnreadMessages()) > 0 ? count(getAllUnreadMessages()) : "0";?> new message(s)</li>
                        <li>
                          <ul class="menu-message">
                            
                            <!-- end message -->
                          </ul>
                          <!-- /.menu -->
                        </li>
                        <li class="footer">
                          <a href="<?php echo site_url('/modules/mailbox');?>">See All Messages</a>
                        </li>
                      </ul>
                    </li>
                    <!-- /.messages-menu -->

                    
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
                            <div class="pull-left">
                              <a href="<?php echo site_url('/user/userpage/profile')?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
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