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
                          <th>Edit</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
          foreach($stmt->fetchAll() as $row){
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
                          <td><img src="./images/e$active dit.png" alt="Edit"></td>
                          <td><a href="updatecar.php?id=<?php echo $id ?>"><img src="../assets/images/update.png" alt=Edit> </a></td>

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