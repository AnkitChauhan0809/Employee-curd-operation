<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!isset($id))
{
	$id=0;
}
if(!isset($photo))
{
	$photo='';
}
if(!isset($err))
{
	$err=0;
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css");?>">
	<title>Insert Page</title>
</head>
<body>
	<?php include 'nav.php';?>
	<div class="container my-4">
		<form method="POST" action="<?php echo base_url('Members/save/').$id;?>" enctype="multipart/form-data">
		  <fieldset>
			<div style="margin-bottom:10px;">
				<span class="text-warning" style="font-size:12px;"><?php echo validation_errors('~ '); ?></span>
				<span class="text-warning" style="font-size:12px;margin-bottom:50px;"><?php if(isset($error)) echo $error;?></span>
			</div>
			 <div class="form-group">
				<label for="exampleInputEmail1">Name</label>
				<div>
					<input type="text" name="fullname" placeholder="Enter full name" class="form-control" value="<?php if($id!=0 || $err!=0) echo $fullname?>"/>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Email</label>
				<div>
					<input type="text" name="email" placeholder="Enter email" class="form-control" value="<?php if($id!=0 || $err!=0) echo $email?>"/>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Contact</label>
				<div>
					<input type="number" name="contact" placeholder="Enter mobile number" class="form-control" value="<?php if($id!=0 || $err!=0) echo $contact?>"/>
				</div>
			</div>
			<div class="form-group">
			  <label for="exampleInputEmail1">Birthdate</label>
				<div>
					<input type="date" name="birthday" class="form-control" value="<?php if($id!=0 || $err!=0) echo $birthday?>"/>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Profile</label>
				<div>
				<span class="text-warning" style="font-size:12px;">Type : .jpg , .jpeg , .png & Maximam size : 400kb.</span>
				</div>
				<div style="padding:10px 0px 10px 20px;<?php if($id==0 || $err==-1) echo 'display:none;'?>">
					<img src="<?php if($photo!=""){echo base_url('uploads/').$photo;}else{echo base_url('uploads/user.jpg');}?>" style="border-radius:50%;" width="50px" height="50px"></img>
					<span style="margin-left:12px;"><?php if($photo!=""){echo $photo;}else{echo 'null';}?></span>
				</div>
				<div>
					<input type="file" name="photo" class="form-control"/>
				</div>
			</div>
			<input type="submit" value="Submit" class="btn btn-primary"/>
		</fieldset>
		</form>
	</div>
</body>
</html>