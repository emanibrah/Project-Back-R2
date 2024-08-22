
<?php
 include_once('../connect.php');
 include_once('includes/loginchecker.php');
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
 try{
	$categoryname=$_POST['categoryname'];
	$sql = "INSERT INTO `category`( `categoryname`) VALUES (?)";
	$stm =$conn->prepare($sql);
      $stm->execute([$categoryname]);
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

$title="Images Admin | Add Tag";
include_once('includes/head.php');

?>	
</head>

<body class="nav-md">
	<?php
	$title1="Manage Tags";
	$title2="Add Tag";
include_once('includes/menu.php');
include_once('includes/sidebar.php');
include_once('includes/menufooter.php');
include_once('includes/topnavigation.php');
include_once('includes/pagecontent.php');
?>
<!-- content add category -->

<div class="x_content">
									<br />
									<form  action="" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="add-category">Add Tag <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="add-category" required="required" class="form-control " name ="categoryname"/>
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
	<?php		
include_once('includes/footercontent.php');
include_once('includes/tail.php');

?>
					 

</body></html>
