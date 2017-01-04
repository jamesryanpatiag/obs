<style tye="text/css">
    .error-mess{
        color:red;
    }
</style>
<!-- Page Content -->
    <div class="panel-box">
        <div class="container">
            <div class="row" style="margin-top:100px">
                <div class="col-xs-7 col-sm-7 col-md-7">
                    <h1></h1>
                    <?php echo form_open('auth/computepricing'); ?>
                    <div class="panel panel-info"> 
                        <div class="panel-heading"> 
                            <h3 class="panel-title">Pricing Calculator</h3> 
                        </div> 
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label>Student Level:</label>
                                    </div>
                                </div>
                                <div class="col-xs-9 col-sm-9 col-md-9">
                                    <div class="form-group">
                                        <select name="student_level" id="student_level" class="form-control input-lg">
                                            <option value="">Choose Student Level</option>
                                            <?php foreach($studentLevel as $level){?>
                                            <option value="<?php echo $level->id;?>"  <?php if(set_value('student_level')==$level->id){echo "selected='selected'";} ?> ><?php echo $level->name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="error-mess"><?php echo form_error('student_level'); ?></span>
                                    </div>
                                </div>

                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label>Plan Type:</label>
                                    </div>
                                </div>
                                <div class="col-xs-9 col-sm-9 col-md-9">
                                    <div class="form-group">
                                        <select name="plan_type" id="plan_type" class="form-control input-lg">
                                            <option value="">Choose Plan Type</option>
                                            <?php foreach($plans as $plan){ ?>
                                            <option value="<?php echo $plan->id . "-" . $plan->name; ?>" <?php if(set_value('plan_type')==($plan->id . "-" . $plan->name)){echo "selected='selected'";} ?> ><?php echo $plan->name; ?></option>
                                            <?php }?>
                                        </select>
                                        <span class="error-mess"><?php echo form_error('plan_type'); ?></span>
                                    </div>
                                </div>

                                <div id="divEssaySettingsContainer">
                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label>Page/Words:</label>
                                        </div>
                                    </div>

                                    <div class="col-xs-9 col-sm-9 col-md-9">
                                        <div class="form-group">
                                            <select name="essay_settings" id="essay_settings" class="form-control input-lg">
                                                <option value="">Choose Essay Settings</option>
                                                <?php foreach($essayLookup as $essay){ ?>
                                                <option value="<?php echo $essay->id; ?>" <?php if(set_value('essay_settings')==$essay->id){echo "selected='selected'";} ?> ><?php echo $essay->name; ?></option>
                                                <?php }?>
                                            </select>
                                            <span class="error-mess"><?php echo form_error('essay_settings'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="divClassDurationContainer">
                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label>Class Duration:</label>
                                        </div>
                                    </div>

                                    <div class="col-xs-9 col-sm-9 col-md-9">
                                        <div class="form-group">
                                            <select name="class_duration" id="class_duration" class="form-control input-lg">
                                                <option value="">Choose Class Duration</option>
                                                <?php foreach($classDuration as $class){ ?>
                                                <option value="<?php echo $class->id; ?>" <?php if(set_value('class_duration')==$class->id){echo "selected='selected'";} ?> ><?php echo $class->name; ?></option>
                                                <?php }?>
                                            </select>
                                             <span class="error-mess"><?php echo form_error('class_duration'); ?></span>
                                        </div>
                                    </div>      
                                </div>  

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group pull-right">
                                        <input type="submit" name="compute" value="Compute" id="compute" class="btn btn-primary" /> 
                                    </div>
                                </div>

                            </div> 
                        </div> 
                    </div> 
                    <?php echo form_close();?>
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

    <script type="text/javascript">

    $(function(){

        clearAllFields();

        $("#student_level").on("change", function(){
            changeStudentLevel();
        })

        $("#plan_type").on("change", function(){
            clearAllFields();
            var temp = $("#plan_type").val().split("-");
            if(temp.length>1){
                var planValue = temp[1];
                if(planValue == "Essay"){
                    $("#divEssaySettingsContainer").css("display",""); 
                }else if(planValue == "Class"){
                    $("#divClassDurationContainer").css("display","");   
                }else{
                    clearAllFields();
                }
            }
        })

    });

    function changeStudentLevel(){
        $("#plan_type").val(null);
        clearAllFields();
    }


    function clearAllFields(){
        $("#class_duration").val(null);
        $("#essay_settings").val(null);
        $("#divEssaySettingsContainer").css("display","none"); 
        $("#divClassDurationContainer").css("display","none");
    }

    </script>

    <!--Start of Zopim Live Chat Script-->
    <script type="text/javascript">
    window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
    d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
    _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
    $.src="//v2.zopim.com/?4IbxXuCtXNHU5LJuVOj8hHFi43ezq2j9";z.t=+new Date;$.
    type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
    </script>
    <!--End of Zopim Live Chat Script-->

</body>

</html>
