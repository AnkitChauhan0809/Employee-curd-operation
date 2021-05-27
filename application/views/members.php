<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css");?>">
	<title>Member Detials</title>
</head>
<body>
<?php include 'nav.php';?>
<div class="container  pt-3 text-success">
		<h1 class="text-center text-dark" >Member Data
		<a href="<?php echo base_url('Members/insert/')?>" class="btn btn-outline-success btn-sm float-right" style="margin:40px 20px 10px 0px;">Add Record</a>
		</h1>
<div>
<div class="container">
	<table class="table table-hover">
		<thead>
			<tr class="table-warning">
				<th scope="col">ID</th>
				<th scope="col">Image</th>
				<th scope="col">Name</th>
				<th scope="col">Email</th>
				<th scope="col">Password</th>
				<th scope="col">Contact</th>
				<th scope="col">Action</th> 
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach($row as $k=>$v)
				{
			?>
					<tr class="table-light">
						<td><?=$v["id"]?></td>
						<td><img src="<?php if($v['photo']!=null){echo base_url('uploads/').$v['photo'];}else{echo base_url('uploads/user.jpg');}?>" style="border-radius:50%;" width="50px" height="50px"></td>
						<td><?=$v["fullname"]?></td>
						<td><?=$v["email"]?></td>
						<td><?=$v["contact"]?></td>
						<td><?=$v["birthday"]?></td>
						<td>
							<a href="<?php echo base_url('Members/insert/').$v['id'];?>" class="btn btn-outline-primary btn-sm">Edit</a>
							<a href="<?php echo base_url('Members/deletedata/').$v['id'];?>" onclick="return confirm('are you sure id '+<?=$v['id']?>+' is delete ?')" class="btn btn-outline-danger btn-sm del">Delete</a>
						</td>
					</tr>
			<?php 
				}
			?>
		</tbody>
	</table>
</div>
</body>
</html>