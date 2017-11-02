<html>
	<head>
		<title>Players Page</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="../css/home.css">
	</head>

	<body>
		<div class="container" style="margin-top: 30px;">
			<div id="heading" class="container-fluid text-center">
		  	<div class="row">
		  		<div class="col-6 offset-3">
		        <h1>Players</h1>
		        <hr class="style18"> <!--This is the horizontal line-->
		        <br>
		      </div>
		      <div class="col-12">
		        <h5>Welcome to the Players page. Select a Player to find out more info about them, or sort a group to see what others have been up to!</h5>
		        <br><br>
		      </div>
		    </div>
		  </div>
			<div class="container-fluid text-center">
		    <div class="row">
		      <div class="col-12">
		        <div align="right">
						  <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button>
						</div>
		        <br><br>
		        <table id="user_data" class="table table-striped table-bordered table-hover table-small">
		          <thead>
		            <tr>
		              <th>Name</th>
		              <th width="10%">Edit</th>
		              <th width="10%">Delete</th>
		            </tr>
		          </thead>
		        </table>
		      </div>
		    </div>
		  </div>
		</div>


	<div id="userModal" class="modal fade">
		<div class="modal-dialog">
			<form method="post" id="user_form" enctype="multipart/form-data">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add User</h4>
					</div>
					<div class="modal-body">
						<label>Name</label>
						<input type="text" name="first_name" id="first_name" class="form-control" />
						<br />
					</div>
					<div class="modal-footer">
						<input type="hidden" name="user_id" id="user_id" />
						<input type="hidden" name="operation" id="operation" />
						<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Add User");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});

	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"orderable": true,
		"ajax":{
			url:"../testing/fetch.php",
			type:"POST"
		},
		"columnDefs":[{
			"targets":[1,2],
			"orderable":false
		},],
	});

	/*$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var firstName = $('#first_name').val();
		var lastName = $('#last_name').val();
		var extension = $('#user_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#user_image').val('');
				return false;
			}
		}
		if(firstName != '' && lastName != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});*/

	/*$(document).on('click', '.update', function(){
		var user_id = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#first_name').val(data.first_name);
				$('#last_name').val(data.last_name);
				$('.modal-title').text("Edit User");
				$('#user_id').val(user_id);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});*/

	/*$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;
		}
	});*/


});
</script>
