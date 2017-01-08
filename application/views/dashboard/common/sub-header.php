  <header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
                    <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand topnav" href="<?php echo site_url('/auth/redirectToDashboard'); ?>">
                <img class="img-thumbnail" src="<?php echo base_url()."assets/";?>img/logo.png" style="width:100px;margin-top:-10px" alt="">
            </a>
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <b>Bookings</b> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo site_url('/modules/bookflight');?>">
                        <i class="fa fa-plane" aria-hidden="true"></i>
                        <b>Book Flight</b></a></li>
                        <li><a href="<?php echo site_url('/modules/bookhotel');?>">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <b>Book Hotel</b></a></li>
                        <li><a href="<?php echo site_url('/modules/bookvehicle');?>">
                        <i class="fa fa-car" aria-hidden="true"></i>
                        <b>Book Vehicle</b></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('/modules/userToursAndPackages');?>"><i class="fa fa-dropbox" aria-hidden="true"></i><b>Reserve Tours/Package</b></a></li>
                        <li><a href="#"><b>Reserve Promos</b></a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                    <b>Cancelled Transactions</b> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">
                        <b>Cancelled Bookings</b></a></li>
                        <li><a href="#">
                        <b>Cancelled Reservations</b></a></li>
                    </ul>
                </li>
                <li>
                    <li><a href="<?php echo site_url('/modules/toursandpackages');?>">
                    <i class="fa fa-dropbox" aria-hidden="true"></i>    
                    <b>Tours & Package</b></a></li>
                </li>
                <li>
                    <li><a href="#">
                    <i class="fa fa-map-o" aria-hidden="true"></i>  
                    <b>Promos</b></a></li>
                </li>
                <?php if($_SESSION["role_code"]==ADMINISTRATOR){?>
                    <li>
                     <li><a href="<?php echo site_url('/modules/lookups');?>">
                    <i class="fa fa-search" aria-hidden="true"></i>  
                    <b>Lookup Values</b></a></li>
                    </li>
                <?php } ?>
                <!-- User Account Menu -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
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
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
            </ul>            
        </div>
        </div>
    </nav>
</header>