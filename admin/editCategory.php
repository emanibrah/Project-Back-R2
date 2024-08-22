<?php

 include_once('../connect.php');
 include_once('includes/loginchecker.php');
  if (isset($_GET['id'])){
    $id = $_GET['id'];
   }else{
    header('location: categories.php');
    die();
   }
    // start update data...........//
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      try {
      $sql = "UPDATE `category` SET `categoryname`=? WHERE `id`=?";
	  $categoryname=$_POST['categoryname'];
      $stmt = $conn->prepare($sql);
      $stmt->execute([$categoryname,$id]);
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
     }
  }
  
try {
  $sql = "SELECT * FROM `category` WHERE `id`=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);
  $result = $stmt->fetch();
  $categoryname = $result['categoryname'];
 } catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<?php

	$title="Images Admin | Edit Tags";
	include_once('includes/head.php');
	
	?>	
	
</head>

<body class="nav-md">
	<?php

	$title1="Edit Tag";
	$title2="Edit Tag";
		include_once('includes/menu.php');
		include_once('includes/sidebar.php');
		include_once('includes/menufooter.php');
		include_once('includes/topnavigation.php');
		include_once('includes/pagecontent.php');
		?>
		<div class="x_content">
		<br />
		<form action="" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align" for="add-category">Edit Tag <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" id="add-category" required="required" class="form-control " name="categoryname"value="<?php echo $categoryname?>" >
				</div>
			</div>
			
			<div class="ln_solid"></div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<button class="btn btn-primary" type="button">Cancel</button>
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
