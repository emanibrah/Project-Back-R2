<?php
 include_once('../connect.php');
 include_once('includes/loginchecker.php');
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
 try{
	$fullname = $_POST['fullname'];
    $username = $_POST['username'];
	$email= $_POST['email'];
	if(isset($_POST['active'])){
		$active=1;
	}else { $active=0;
	 }		
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$sql = "INSERT INTO `users`(`fullname`,`username`,`email`,`active`,`password`) VALUES (?,?,?,?,?)";
	$stm =$conn->prepare($sql);
	$stm->execute([$fullname, $username, $email,$active, $password]);
	echo "Inserted Successfully";
 } catch(PDOException $e) {
     $errMsg =  $e->getMessage();
 }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php

	$title="Images Admin | Add User";
	include_once('includes/head.php');
	
	?>	
  </head>	
<body class="nav-md">
<?php

	$title1="Manage Users";
	$title2="Add User";
		include_once('includes/menu.php');
		include_once('includes/sidebar.php');
		include_once('includes/menufooter.php');
		include_once('includes/topnavigation.php');
		include_once('includes/pagecontent.php');
?>

		<div class="x_content">
		<br />
			<form action="" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-la bel-left">

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Full Name <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="first-name" required="required" class="form-control " name="fullname" >
					</div>
				</div>
				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-name">Username <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="user-name"  required="required" class="form-control" name="username" >
					</div>
				</div>
				<div class="item form-group">
					<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 ">
						<input id="email" class="form-control" type="email" name="email" required="required" name="email" >
					</div>
				</div>
				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
					<div class="checkbox">
						<label> 
							<input type="checkbox" class="flat" name="active" >
						</label>
					</div>
				</div>
				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="password" id="password" name="password" required="required" class="form-control"  name="password" >
					</div>
				</div>
				<div class="ln_solid"></div>
				<div class="item form-group">
					<div class="col-md-6 col-sm-6 offset-md-3">
						<button class="btn btn-primary" type="button">Cancel</button>
						<button type="submit" class="btn btn-success">Add</button>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>
</div>

</div>
</div>
<!-- /page content -->
<?php
include_once('includes/footercontent.php');
		include_once('includes/tail.php');
	
	?>


</body></html>
