<!-- Slimscroll -->
<script src="<?php echo base_url()."assets/"; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()."assets/"; ?>plugins/fastclick/fastclick.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()."assets/"; ?>plugins/iCheck/icheck.min.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>

<script src="<?php echo base_url()."assets/"; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });

  function deleteSelectedMail(type, otype){
      var ids = [];
      $(".mails").each(function() {
        if(this.checked==true){
            var id = this.id.replace("chkmail_", "");
            $(this).closest("tr").hide();
            ids.push(id);
        }
      });  
      console.log(ids);
      var fd = new FormData();
      fd.append("ids", ids);
      fd.append("type", type);
      if(otype=="MOVE_TO_TRASH"){
          if(confirm("Are you sure you want to delete this message?")){
              $.ajax({
                url: "<?php echo site_url('modules/deleteMessages'); ?>",
                type: 'POST',
                data: fd,  
                processData: false,
                contentType: false,
                success: function(msg) {
                }
              });
          }
       }else{
          if(confirm("Are you sure you want to delete this message permanently?")){
              $.ajax({
                url: "<?php echo site_url('modules/deleteForeverMessage'); ?>",
                type: 'POST',
                data: fd,  
                processData: false,
                contentType: false,
                success: function(msg) {
                }
              });
          }
       }
  }

  function printElem(elem)
    {
      var mywindow = window.open('', 'PRINT', 'height=400,width=600');
      mywindow.document.write('<html><head><title>' + document.title  + '</title>');
      mywindow.document.write('</head><body >');
      mywindow.document.write('<h1>' + document.title  + '</h1>');
      mywindow.document.write(document.getElementById(elem).innerHTML);
      mywindow.document.write('</body></html>');
      mywindow.document.close(); // necessary for IE >= 10
      mywindow.focus(); // necessary for IE >= 10*/
      mywindow.print();
      mywindow.close();
      return true;
      }

    function deleteMessage(id, type, otype){
       var fd = new FormData();
       fd.append("ids", id);
       fd.append("type", type);
       if(otype=="MOVE_TO_TRASH"){
          if(confirm("Are you sure you want to delete this message?")){
              $.ajax({
                url: "<?php echo site_url('modules/deleteMessages'); ?>",
                type: 'POST',
                data: fd,  
                processData: false,
                contentType: false,
                success: function(msg) {
                    if(type=="sentmail"){
                      window.location = '<?php echo site_url('/modules/sentmailbox');?>';
                    }else{
                      window.location = '<?php echo site_url('/modules/mailbox');?>';  
                    }
                }
              });
          }
       }else{
          if(confirm("Are you sure you want to delete this message permanently?")){
              $.ajax({
                url: "<?php echo site_url('modules/deleteForeverMessage'); ?>",
                type: 'POST',
                data: fd,  
                processData: false,
                contentType: false,
                success: function(msg) {
                   window.location = '<?php echo site_url('/modules/trashmailbox');?>';
                }
              });
          }
       }
    }
</script>