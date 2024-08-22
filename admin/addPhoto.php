<?php
 include_once('../connect.php');
 include_once('includes/loginchecker.php');

 try{
     $sql = "SELECT * FROM `category`";
     $stmt = $conn->prepare($sql);
     $stmt->execute();
 } catch(PDOException $e) {
     $errMsg =  $e->getMessage();
 }
 //insert from DB
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
	try{
	   $created_at = $_POST['created_at'];
	   $tittle = $_POST['tittle'];
	   $license = $_POST['license'];
	   $format = $_POST['format'];
	   $dimension= $_POST['dimension'];
	   $tag= $_POST['tag'];
	   if(isset($_POST['active'])){
		   $active=1;
	   }else { $active=0;
		}
		include_once('upload.php');

	   $sql = "INSERT INTO `photos`( `tittle`, `license`, `dimension`, `formate`, `active`, `image`, `tag`, `created_at`)  VALUES (?,?,?,?,?,?,?,?)";
	   $stm =$conn->prepare($sql);
	   $stm->execute([$tittle, $license,$dimension,$format, $active,$image_name,$tag,$created_at]);
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

	$title="Images Admin | Add photo";
	include_once('includes/head.php');
	
	?>	
	</head>
		
<body class="nav-md">
<?php

	$title1="Manage Photos";
	$title2="Add Photo";
		include_once('includes/menu.php');
		include_once('includes/sidebar.php');
		include_once('includes/menufooter.php');
		include_once('includes/topnavigation.php');
		include_once('includes/pagecontent.php');
?>
		<div class="x_content">
		<br />
		<form action="" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align" for="photo-date">Photo Date <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="date" id="photo-date" required="required" class="form-control" name="created_at"  >
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" id="title" required="required" class="form-control " name="tittle" >
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align" for="license">License <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 ">
					<textarea id="content" name="license" required="required" class="form-control">License</textarea>
				</div>
			</div>
			<div class="item form-group">
				<label for="dimension" class="col-form-label col-md-3 col-sm-3 label-align">Dimension <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 ">
					<input id="dimension" class="form-control" type="text" name="dimension" required="required"  >
				</div>
			</div>
			<div class="item form-group">
				<label for="format" class="col-form-label col-md-3 col-sm-3 label-align">Format <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 ">
					<input id="format" class="form-control" type="text" name="format" required="required" >
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
				<label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="file" id="image" name="image" required="required" class="form-control" >
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Tag <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 ">
					<select class="form-control" name="tag" id="">
						<option value=" ">Select Tag</option>
						<?php
                         foreach($stmt->fetchAll() as $category){
                        ?>
						<option value="<?php echo$category ['id'] ?> "><?php echo$category ['categoryname'] ?></option>
						<?php
					   }
					   ?>
					</select>
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
