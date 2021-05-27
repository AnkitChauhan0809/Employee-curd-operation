<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration Page</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css");?>">
</head>
<body>
	<div id="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="border-bottom:4px solid white;">
		  <h2 class="text-dark"  >Registration Page</h2>
		</nav>
	</div>
	<div class="container my-4">
		<form method="POST" action="<?php echo base_url('Users/save_registration');?>">
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
				<label for="username">User Id</label>
				<div>
					<input type="text" name="username" placeholder="Enter your userid" class="form-control" value="admin@gmail.com"/>
				</div>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<div>
					<input type="passwprd" name="password" placeholder="Enter your password" class="form-control" value="123456"/>
				</div>
			</div>
			<div class="form-group">
				<label for="passwordc">Re-Password</label>
				<div>
					<input type="passwprd" name="passwordc" placeholder="Enter your re-password" class="form-control" value="123456"/>
				</div>
			</div>
			<input type="submit" value="Submit" class="btn btn-primary"/>
		</fieldset>
		</form>
	</div>
</body>
</html>