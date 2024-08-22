<?php

 include_once('../connect.php');
 include_once('includes/loginchecker.php');

 try{
     $sql = "SELECT photos.id,photos.tittle,photos.active,photos.image,photos.created_at,category.categoryname FROM photos inner JOIN category on category.id = photos.tag;";
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
    $title="Photos";
    include_once('includes/head2.php');
    ?>	
  </head>

  <body class="nav-md">
    <?php
  $title1="Manage Photos";
  $title2="List of Photos";
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
        <th>Photo Date</th>
        <th>Title</th>
        <th>image</th>
        <th>category</th>
        <th>Active</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>


    <tbody>
    
      

<?php
    foreach($stmt->fetchAll() as $row){
      $id= $row['id'];
      $created_at = date("d M Y", strtotime($row['created_at']));
      $tittle = $row['tittle'];
      $active = $row['active'];
      $image = $row['image'];
      $categoryname = $row['categoryname'];
        if ($row['active']){
          $active= "yes";
          }else{
          $active= "No";
       }


    ?>

      <tr>
        <td><?php echo $created_at ?></td>
        <td><?php echo $tittle ?> </td>
        <td><?php echo $image ?> </td>
        <td><?php echo $categoryname ?> </td>
        <td><?php echo $active ?> </td>
        <td><a href="editphoto.php?id=<?php echo $id ?>"><img src="./images/edit.png"  alt=Edit> </a></td>
			  <td><a href="deletephoto.php?id=<?php echo $id ?>" onclick="return confirm('Are you sure you want to delete?')"><img src="./images/delete.png" alt="Delet"></td>
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
  </body>
</html>