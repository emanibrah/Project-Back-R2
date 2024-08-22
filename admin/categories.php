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
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php

$title="Tags";
include_once('includes/head.php');

?>	
  </head>

  <body class="nav-md">
  
  <?php

	$title1="Manage Tags";
	$title2="List of Tags";
		include_once('includes/menu.php');
		include_once('includes/sidebar.php');
		include_once('includes/menufooter.php');
		include_once('includes/topnavigation.php');
		include_once('includes/pagecontent.php');
		?>
		<div class="x_content">
		<div class="row">
			<div class="col-sm-12">
			  <div class="card-box table-responsive">
	  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
		<thead>
		  <tr>
			<th>Tag Name</th>
			<th>Edit</th>
			<th>Delete</th>
		  </tr>
		</thead>

		<?php
foreach($stmt->fetchAll() as $row){
      $id=$row['id'];
      $categoryname = $row['categoryname'];
      
?>
		<tbody>
		  <tr>
			<td><?php echo $categoryname ?> </td>
			<td><a href="editCategory.php?id=<?php echo $id ?>"><img src="./images/edit.png"  alt=Edit> </a></td>
			<td><a href="deletecategory.php?id=<?php echo $id ?>" onclick="return confirm('Are you sure you want to delete?')"><img src="./images/delete.png" alt="Delet"></td>
            
		  </tr>
		 <?php
}
?>
		  
		</tbody>
	  </table>
	</div>
	</div>
</div>
</div>
  </div>
</div>
</div>
</div>
</div>
<!-- /page content -->
<?php
		include_once('includes/footercontent.php');
		include_once('includes/tail2.php');
	
	?>
>

 

  </body>
</html>