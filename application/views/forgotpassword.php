<style tye="text/css">
    .error-mess{
        color:red;
    }
</style>

<!-- Page Content -->
    <div class="panel-box">
        <div class="container">
            <div class="row" style="margin-top:100px">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <?php if(isset($message) && $message != null){ ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Error!</h4>
                            <?php echo $message;?>
                          </div>
                    <?php } ?>
                    <?php if($this->session->flashdata("forgot_password_success")){ ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            <?php echo $this->session->flashdata("forgot_password_success"); ?>
                          </div>
                    <?php }?>
                    <?php echo form_open('auth/forgotpassword'); ?>
                        <fieldset>
                            <h2>Forgot your Password?</h2>
                            <hr class="colorgraph">
                            <div class="row">
                        		<div class="col-md-4 col-sm-4 col-xs-12">
                        			<img class="img-responsive" src="<?php echo base_url()."assets/img/forgot_password.png"; ?>"/>
                        		</div>
                        		<div class="col-md-8 col-sm-8 col-xs-12">
                        			<div class="form-group">
                        				<h3>Please enter your email.</h3>
                        				<h5>We'll email you the instructions on how to reset your password. </h5>
                        			</div>
                        			<div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php echo set_value('email'); ?>" tabindex="4">
                                        <span class="error-mess"><?php echo form_error('email'); ?></span>
                                    </div>
                        		</div>
                        		<div class="col-md-12 col-sm-12 col-xs-12">
                        			<hr class="colorgraph">
		                            <div class="row">
		                            	<div class="col-xs-8 col-sm-8 col-md-8"></div>
		                                <div class="col-xs-4 col-sm-4 col-md-4">
		                                    <input type="submit" class="btn btn-lg btn-info btn-block" value="Submit">
		                                </div>
		                            </div>
                        		</div>
                            </div>
                        </fieldset>
                </div>
            </div>
        </div>
    </div>
    <br/><br/><br/><br/><br/><br/>
	<a  name="contact"></a>
    <!-- /.banner -->

    <!-- Footer -->
    <div id="footer">
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
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url()."assets/";?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()."assets/";?>js/bootstrap.min.js"></script>

    <script>
    $(function(){
    $('.button-checkbox').each(function(){
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                    on: {
                        icon: 'glyphicon glyphicon-check'
                    },
                    off: {
                        icon: 'glyphicon glyphicon-unchecked'
                    }
            };

        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });

        $checkbox.on('change', function () {
            updateDisplay();
        });

        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');
            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else
            {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }
        function init() {
            updateDisplay();
            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});
    </script> 
</body>
</html>
