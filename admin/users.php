<?php

 include_once('../connect.php');
 include_once('includes/loginchecker.php');

 try{
     $sql = "SELECT * FROM `users`";
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
  
    $title="Users";
    include_once('includes/head2.php');
    
    ?>	
    
  </head>
  <body class="nav-md">
     
    <?php
   
  $title1="Manage Users";
  $title2="List of Users";
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
        <th>Registration Date</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Active</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
    </thead>


    <tbody>
    <?php
foreach($stmt->fetchAll() as $row){
      $id=$row['id'];
      $created_at = date("d M Y", strtotime($row['created_at']));
      $fullname = $row['fullname'];
      $username = $row['username'];
      $email = $row['email'];
      if ($row['active']){
      $active= "yes";
      }else{
      $active= "No";

}

?>
      <tr>
        <td><?php echo $created_at ?></td>
        <td><?php echo $fullname ?></td>
        <td><?php echo $username ?></td>
        <td><?php echo $email ?></td>
        <td><?php echo $active ?></td>
        <td><a href="deleteuser.php?id=<?php echo $id ?>" onclick="return confirm('Are you sure you want to delete?')"><img src="./images/delete.png" alt="Delet"></td>
        <td><a href="edituser.php?id=<?php echo $id ?>"><img src="./images/edit.png"  alt=Edit> </a></td>

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
   
    

        <!-- page content <h3>Manage <small>Users</small></h3>
                -->
      
              
  </body>
</html>