</div>
<script src="<?php echo base_url()."assets/"; ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> -->
<!--<script src="<?php echo base_url()."assets/"; ?>plugins/morris/morris.min.js"></script> -->
<script src="<?php echo base_url()."assets/"; ?>plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url()."assets/"; ?>dist/js/app.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>dist/js/demo.js"></script>
<!--Start of Zopim Live Chat Script-->

<!--End of Zopim Live Chat Script-->
<script>

  $(function () {

    $('.numeric').on('keypress', function(e){
        if (e.which < 48 || e.which > 57)
        {
            e.preventDefault();
        }
    })

    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });

    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
    $('.datepicker').datepicker({
      startDate: today,
      format: 'yyyy-mm-dd',
      autoclose: true
    });
    
  });
</script>
<?php $this->view("dashboard/common/footer-html"); ?>
</body>
</html>