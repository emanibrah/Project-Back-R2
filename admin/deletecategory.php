<?php
   include_once('includes/loginChecker.php');
   if (isset($_GET['id'])){
   include_once('../connect.php');
try{
    $id = $_GET['id'];
    $sql = "DELETE FROM `category` WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    header('location: categories.php');

}catch(PDOException $e){
    echo $e->getMessage();
    }
  }