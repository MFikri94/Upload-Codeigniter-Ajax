<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Upload files using Codeigniter and Ajax</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
</head>
<body>
	<div class="container">
		<div class="col-sm-4 col-md-offset-4">
		<h4>Upload files using Codeigniter and Ajax</h4>
			<form class="form-horizontal" id="submit">
				<div class="form-group">
					<input type="text" name="title" class="form-control" placeholder="Title">
				</div>
				<div class="form-group">
					<input type="file" name="file">
				</div>

				<div class="form-group">
					<button class="btn btn-success" id="btn_upload" type="submit">Upload</button>
				</div>
			</form>	
		</div>
	</div>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.2.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript">
	$(document).ready(function(){

		$('#submit').submit(function(e){
		    e.preventDefault(); 
		         $.ajax({
		             url:'<?php echo base_url();?>index.php/upload/do_upload',
		             type:"post",
		             data:new FormData(this), //this is formData
		             processData:false,
		             contentType:false,
		             cache:false,
		             async:false,
		              success: function(data){
		                  alert("Upload Image Successful.");
		           }
		         });
		});
		

	});
	
</script>
</body>
</html>