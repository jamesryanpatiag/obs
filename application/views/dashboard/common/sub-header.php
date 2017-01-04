<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
    <div class="container topnav">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand topnav" href="<?php echo site_url('/auth/redirectToDashboard'); ?>">
                <img class="img-thumbnail" src="<?php echo base_url()."assets/";?>img/logo.png" style="width:120px;margin-top:-10px" alt="">
            </a>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    Bookings <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo site_url('/modules/bookflight');?>">
                        <i class="fa fa-plane" aria-hidden="true"></i>
                        Book Flight</a></li>
                        <li><a href="<?php echo site_url('/modules/bookhotel');?>">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Book Hotel</a></li>
                        <li><a href="<?php echo site_url('/modules/bookvehicle');?>">
                        <i class="fa fa-car" aria-hidden="true"></i>
                        Book Vehicle</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Reserve Tours/Package</a></li>
                        <li><a href="#">Reserve Promos</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                    Cancelled Transactions <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">
                        Cancelled Inquiries</a></li>
                        <li><a href="#">
                        Cancelled Reservations</a></li>
                    </ul>
                </li>
                <li>
                    <li><a href="#">
                    <i class="fa fa-dropbox" aria-hidden="true"></i>    
                    Tours & Package</a></li>
                </li>
                <li>
                    <li><a href="#">
                    <i class="fa fa-map-o" aria-hidden="true"></i>  
                    Promos</a></li>
                </li>
                <li>
                     <li><a href="<?php echo site_url('/modules/lookups');?>">
                    <i class="fa fa-search" aria-hidden="true"></i>  
                    Lookup Values</a></li>
                </li>
            </ul>
        </div>
    </div>
</nav>