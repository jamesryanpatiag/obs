<style>
    .title_font{
        color: white;
        text-shadow: 2px 0 0 #fff, -2px 0 0 #fff, 0 2px 0 #fff, 0 -2px 0 #fff, 1px 1px #fff, -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff;
    }
</style>
<div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <!--<h3>A Template by Start Bootstrap</h3>-->
                        <h1 class="title_font">St. Joseph's Caravan</h1>
                        <h3 class="title_font">Travel and Tours</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="<?php echo site_url('auth'); ?>" class="btn btn-default btn-lg"> <span class="network-name">Login</span></a>
                            </li>
                            <li>
                                <!-- <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a> -->
                            </li>
                            <li>
                                <a href="<?php echo site_url('auth/registrationPage');?>" class="btn btn-default btn-lg"> <span class="network-name">Register</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

	 <div class="content-section-a" id="about">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6" >
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">About Us</h2>
                    <p class="lead"><i>Put About us here.<br/>
                </i></p>
                    </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="<?php echo base_url()."assets/";?>img/ipad.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <a  name="services"></a>
    <div class="content-section-b" id="about">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Our Services</h2>
                    <p class="lead"><i>Put Our Services Here.</i>
                    </p></p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="<?php echo base_url()."assets/";?>img/books.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->
    <!-- /.content-section-a -->

	<a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2></h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">

                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; St. Joseph's Caravan Travel and Tours 2016. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?php echo base_url()."assets/";?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()."assets/";?>js/bootstrap.min.js"></script>
    <!--Start of Zopim Live Chat Script-->

    <script>

        function hideElementsVIA(){
            $('.noPrint').css("display", "none");
        }

        window.onload = hideElementsVIA;
     
    </script>
</body>

</html>
