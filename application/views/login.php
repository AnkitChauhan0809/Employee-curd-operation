<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login Page</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css");?>">
</head>
<body>
	<div id="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="border-bottom:4px solid white;">
		  <h2 class="text-dark" >Login Page</h2>
		</nav>
	</div>
	<div class="container my-4">
		<form method="POST" action="<?php echo base_url('Users/validateUser');?>">
			<fieldset>
				<?php if($this->session->flashdata('errno'))
				{?>
					<strong>
						<div class="form-group" style="color:red;">
							~<?=$this->session->flashdata('message') ?>
						</div>
					</strong>
			<?php } ?>
			<div>
				<span class="text-warning" style="font-size:12px;"><?php echo validation_errors('~ '); ?></span>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">User Id</label>
				<div>
					<input type="text" name="username" placeholder="Enter your userid" class="form-control" value="admin@gmail.com"/>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Password</label>
				<div>
					<input type="passwprd" name="password" placeholder="Enter your password" class="form-control" value="123456"/>
				</div>
			</div>
			<input type="submit" value="Login" class="btn btn-primary"/>
			<a style="margin-left:5px;" href="<?php echo base_url('Users/registration') ?>" class="btn btn-primary">Registration</a>
		</fieldset>
		</form>
	</div>
</body>
</html>