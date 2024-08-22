<?php

 include_once('connect.php');
 //$image = $_GET['image'];
  //$categoryname = $_GET['categoryname'];
//$created_at = $_GET['created_at'];
//$views = $_GET['views'];
//  //include_once('includes/loginchecker.php');
 if (isset($_GET['id'])){
  $id = $_GET['id'];
  }else{
  header('location: index.php');
  die();
}
//  try{
//       $sql = "SELECT photos,id photos.tittle,photos.license,photos.dimension,photos.image,photos.format,photos.format,category.categoryname FROM photos inner JOIN category on category.id = photos.tag  WHERE `id` = ? ";
//       $stmt = $conn->prepare($sql);
//     $stmt->execute($id);
//   $result = $stmt->fetch();
//   $tittle = $result['tittle'];
//   $id = $result['id'];
//   $license = $result['license'];
//   $image = $result['image'];
//   $categoryname = $result['categoryname'];
//   } catch(PDOException $e) {
//      $errMsg =  $e->getMessage();
//  }
 try {
    //$sql = "SELECT photos.id,photos.title, photos.license, photos.dimension, photos.image, photos.format, category.categoryname FROM photos INNER JOIN category ON category.id = photos.tag WHERE photos.id = ?";
    $sql = "SELECT * FROM `photos` WHERE `id`=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch();
    $tittle = $result['tittle'];
    $license = $result['license'];
    $image = $result['image'];
    $categoryname = $result['categoryname'];
} catch (PDOException $e) {
    $errMsg = $e->getMessage();
}

?>

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <?php
        $title="Catalog-Z Photo Detail";
        include_once('includes/head.php');
        ?>

</head>
</head>
<body>
<?php
include_once('includes/pageloader.php');
?>
 <!--page photo after page loader -->

 
<div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/hero.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary"><?php echo $tittle?></h2>
        </div>
        <div class="row tm-mb-90">            
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
            <img src="admin/images/<?php echo $image ?>" alt="<?php echo $categoryname ?>" class="img-fluid">
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="tm-bg-gray tm-video-details">
                    <p class="mb-4">
                        Please support us by making <a href="https://paypal.me/templatemo" target="_parent" rel="sponsored">a PayPal donation</a>. Nam ex nibh, efficitur eget libero ut, placerat aliquet justo. Cras nec varius leo.
                    </p>
                    <div class="text-center mb-5">
                        <a href="#" class="btn btn-primary tm-btn-big">Download</a>
                    </div>                    
                    <div class="mb-4 d-flex flex-wrap">
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Dimension: </span><span class="tm-text-primary"><?php echo $license ?></span>
                        </div>
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Format: </span><span class="tm-text-primary">JPG</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h3 class="tm-text-gray-dark mb-3">License</h3>
                        <p>Free for both personal and commercial use. No need to pay anything. No need to make any attribution.</p>
                    </div>
                    <div>
                        <h3 class="tm-text-gray-dark mb-3">Tags</h3>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Cloud</a>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Bluesky</a>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Nature</a>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Background</a>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Timelapse</a>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Night</a>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Real Estate</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                Related Photos
            </h2>
        </div>
        <div class="row mb-3 tm-gallery">
        <?php
                    foreach($stmt->fetchAll() as $row){
                        $id = $row['id'];
                        $views = $row['views'];
                        $image = $row['image'];
                        $categoryname = $row['categoryname'];
                        $created_at = date("d M Y", strtotime($row['created_at']));
                     ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                     <img src="admin/images/<?php echo $image ?>" alt="<?php echo $categoryname ?>" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                    <h2><?php echo $categoryname ?></h2>
                    <a href="#">View more</a>
                    </figcaption>                    
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light"><?php echo $created_at ?></span>
                    <span><?php echo $_SESSION['views'] ."views"; ?></span>
                    
            <?php
		   }
		   ?>
                </div>
            </div>
            </div>
            </div>        
        </div>
                </div>
            </div>        
        </div>
    <?php    
include_once('includes/container.php');
include_once('includes/script.php');
?>
</body>
</html>
    <?php    
include_once('includes/container.php');
include_once('includes/script.php');
?>
</body>
</html>