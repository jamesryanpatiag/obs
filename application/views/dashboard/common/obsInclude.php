<script type="text/javascript">

		function changeStatus(type, value, status){
			$("#cmbChangeStatus").val(status);
			$("#bookingId").val(value);
			$("#bookingType").val(type);
		}	

		//##################LOOKUP###################/
		function refreshLookups(){
			$.post("<?php echo site_url('modules/lookupsPage'); ?>", function(data){ 
				$('.box').html(data);
				$('#example2').DataTable({
				"paging": true,
				"lengthChange": true,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": true
				});
			});
		}

		function deleteLookup(id){
			if(confirm("Are you sure you want to delete this lookup?")){
				var fd = new FormData();
				fd.append("id", id);
				$.ajax({
					url: "<?php echo site_url('modules/deleteLookup'); ?>",
					type: 'POST',
					data: fd,  
					processData: false,
					contentType: false,
					success: function(msg) {
						$("#lookup-table-alert-msg").html('<div class="alert alert-success text-center" style="width:50%">Lookup has been successfully deleted!</div>');
						refreshLookups();
					}
				});
				return false;
			}
		}

		function getLookupById(id){
			var fd = new FormData();
				fd.append("id", id);
				$.ajax({
					url: "<?php echo site_url('modules/getLookupById'); ?>",
					type: 'POST',
					data: fd,  
					async: false,
					processData: false,
					contentType: false,
					success: function(result) {
						var resultdata = JSON.parse(result);
						var lookup = resultdata["lookup"];
						console.log(lookup);
						$("#editCmbCategory").val(lookup["CATEGORY_ID"]);
						$("#editTxtValue").val(lookup["VALUE"]);
						$("#editLookupId").val(lookup["LOOKUP_ID"]);
					}
				});
		}

		$(document).ready(function(){

			var empty = "";

			//##################LOOKUP###################/
			$('#btnAddLookup').click(function() {
				var fd = new FormData();
				fd.append("category", $('#cmbCategory').val());
				fd.append("value", $('#txtValue').val());
				$.ajax({
					url: "<?php echo site_url('modules/addLookup'); ?>",
					type: 'POST',
					data: fd,  
					processData: false,
					contentType: false,
					success: function(msg) {
						if (msg == 'YES'){
							$('#lookup-add-alert-msg').html('<div class="alert alert-success text-center">Lookup has been successfully created!</div>');
						}else if (msg == 'NO'){
							$('#lookup-add-alert-msg').html('<div class="alert alert-danger text-center">Error in creating lookup! Please try again later.</div>');
						}else{
							$('#lookup-add-alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
						}
					}
				});
				return false;
			});

			$("#btnEditLookup").click(function() {
				var fd = new FormData();
				fd.append("category", $('#editCmbCategory').val());
				fd.append("value", $('#editTxtValue').val());
				fd.append("id", $("#editLookupId").val());
				$.ajax({
					url: "<?php echo site_url('modules/updateLookup'); ?>",
					type: 'POST',
					data: fd,  
					processData: false,
					contentType: false,
					success: function(msg) {
						if (msg == 'YES'){
							$('#lookup-edit-alert-msg').html('<div class="alert alert-success text-center">Lookup has been successfully updating!</div>');
						}else{
							$('#lookup-edit-alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
						}
					}
				});
				return false;
			});

			$('#addLookupsModal,#editLookupsModal').on('hidden.bs.modal', function () {
				$("#cmbCategory").val(empty);
				$("#txtValue").val(empty);
				$('#editCmbCategory').val(empty);
				$('#editTxtValue').val(empty);
				$("#editLookupId").val(empty);
				$("#lookup-add-alert-msg").html("<div>" + empty + "<div>");
				$("#lookup-edit-alert-msg").html("<div>" + empty + "<div>");
				refreshLookups();
			})
			//##################LOOKUP###################/

			//################## CHANGE STATUS BOOKING ###################/
	      	$('#submitChangeStatus').click(function() {
		        var form_data = {
		          id: $('#bookingId').val(),
		          status: $('#cmbChangeStatus').val(),
		          type: $('#bookingType').val()
		        };
		        $.ajax({
		            url: "<?php echo site_url('modules/changeBookingStatus'); ?>",
		            type: 'POST',
		            data: form_data,  
		            success: function(msg) {
		                if (msg == 'YES'){
		                  $('#status-alert-msg').html('<div class="alert alert-success text-center">Status has been successfully changed!</div>');
		                }else if (msg == 'NO'){
		                    $('#status-alert-msg').html('<div class="alert alert-danger text-center">Error in changing status! Please try again later.</div>');
		                }else{
		                    $('#status-alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
		                }
		            }
		        });
		        return false;
	      	});

	      	//###################### ON-CLOSE MODAL #######################
	      	$('#changeStatus').on('hidden.bs.modal', function () {
          		location.reload();
  			})

		});



</script>