<?php

 include_once('../connect.php');
 include_once('includes/loginchecker.php');
  if (isset($_GET['id'])){
    $id = $_GET['id'];
   }else{
    header('location: users.php');
    die();
   }
    // start update data...........//
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      try {
      $sql = "UPDATE `users` SET `fullname`=?,`username`=?,`password`=?,`email`=?,`active`=? WHERE `id`=?";
	  $fullname = $_POST['fullname'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      if(empty($_POST['password'])){
        $password = $_POST['oldpassword'];
      }else{
      $password =  password_hash($_POST['password'], PASSWORD_DEFAULT);
      }
     
      $active = isset($_POST['active']) ? 1 : 0;
      $stmt = $conn->prepare($sql);
      $stmt->execute([ $fullname,$username,$password, $email, $active, $id]);
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
     }
  }
  
try {
  $sql = "SELECT * FROM `users` WHERE `id` = ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);
  $result = $stmt->fetch();
  $fullname = $result['fullname'];
  $username = $result['username'];
  $password = $result['password'];
  $email = $result['email'];  
  //$active = $result['active'] ? "checked" : "";
  if($result['active']){
   $active ="checked";
  }else{
    $active ="";
  }
 } catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>

	<?php

	$title="Images Admin | Edit User";
	include_once('includes/head.php');

	?>	

<body class="nav-md">
	<?php
	$title1="Manage Users";
	$title2="Edit User";
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
						<input type="text" id="first-name" required="required" class="form-control " name="fullname" value="<?php echo $fullname?>">
					</div>
				</div>
				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-name">Username <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="user-name" required="required" class="form-control" name="username" value="<?php echo $username?>" >
					</div>
				</div>
				<div class="item form-group">
					<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 ">
						<input id="email" class="form-control" type="email" name="email" required="required" name="email" value="<?php echo $email?>">
					</div>
				</div>
				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
					<div class="checkbox">
						<label> 
							<input type="checkbox" class="flat" name="active" <?php echo $email?>  >
						</label>
					</div>
				</div>
				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="password" id="password" name="password"  class="form-control"  name="password"  >
					</div>
				</div>
				<div class="ln_solid"></div>
				<div class="item form-group">
					<div class="col-md-6 col-sm-6 offset-md-3">
						<button class="btn btn-primary" type="button">Cancel</button>
						<input type="hidden" name="oldpassword" value="<?php echo $password?>">
						<button type="submit" class="btn btn-success">Update</button>
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
