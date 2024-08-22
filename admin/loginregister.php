<?php
  session_start();
  //$_SESSION['username'] = $username;
  include_once('../connect.php');
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
  try{
      $section = $_POST['section'];
     if ($section ==="signup") {

      $fullname = $_POST['fullname'];
      $username = $_POST['username'];
      $email= $_POST['email'];
      //$password=$_POST['password'];
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $sql = "INSERT INTO `users`(`fullname`,`username`,`email`,`password`) VALUES (? ,?, ?, ?)";
      $stm =$conn->prepare($sql);
      $stm->execute([$fullname, $username, $email, $password]);
      echo "Inserted Successfully";
//
      } elseif($section ==='login'){
            $section = $_POST['section'];
            if ($section ==="login") {
               $username= $_POST['username'];
               $password=$_POST['password'];
                 $sql = "SELECT `email`,`password` from users WHERE username= ? "; 
                  $stmt =$conn->prepare($sql);
                  $stmt->execute([$username]);
                  if($stmt->rowCount()){
                    $result = $stmt->fetch();
                  $verify = password_verify($password,$result['password']); 
                    // Print the result depending if they match 
                    if ($verify) {
                       //$_SESSION['login'] = true
                       $_SESSION['username'] = $username;
                       if(isset($_SESSION['login']) or $_SESSION['login'] = true){
                        header('location: users.php');
                        //die();
                      }
                         
                         //echo 'Password Verified!'; 
                     } else { 
                         echo 'Incorrect Password!'; 
                     }
                   }else{ 
                     echo "Email not found";
                   }
               }
              }
                 }catch(PDOEXCEPTION $e){ 
                   echo $e->getMessage();
                 }
                 }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Images Admin | Login/Register</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

                           <!-- LOGIN SECTION -->
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="POST" >
                  <h1>Login Form</h1>
                  <div>
                    <input type="text" class="form-control" placeholder="Username" required="" name="username" />
                  </div>
                  <div>
                    <input type="password" class="form-control" placeholder="Password" required="" name="password" />
                  </div>
                  <div>
                    <input type="hidden" class="btn btn-default submit" name="section" value="login"/> 
                    <input type="submit" class="btn btn-default submit" placeholder="log in" name="login" /> 
              </div>

              <div>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-file-image-o"></i></i> Images Admin</h1>
                  <p>©2016 All Rights Reserved. Images Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
                   
                               <!-- register SECTION -->

        <div id="register" class="animate form registration_form">
          <section class="login_content">
             
             <form action="" method="POST">
                  <h1>Create Account</h1>
                  <div>
                    <input type="text" class="form-control" placeholder="Fullname" required="" name="fullname"/>
                  </div>
                  <div>
                    <input type="text" class="form-control" placeholder="Username" required="" name="username" />
                  </div>
                  <div>
                    <input type="email" class="form-control" placeholder="Email" required="" name="email" />
                  </div>
                  <div>
                    <input type="password" class="form-control" placeholder="Password" required=""name="password" />
                  </div>
                  <div>
                                <input type="hidden" class="btn btn-default submit" name="section" value="signup"/> 
                                <input type="submit" class="btn btn-default submit" placeholder="log in" name="signup" />               </div>

                          <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-file-image-o"></i></i> Images Admin</h1>
                  <p>©2016 All Rights Reserved. Images Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>