<?php
     session_start();
 include_once('connect.php');
 //include_once('includes/loginchecker.php');

 try{
        // $views_file = 'views.txt';

        // // زيادة عدد المشاهدات
        // if (file_exists($views_file)) {
        //     $views = file_get_contents($views_file);
        //     $views++;
        // } else {
        //     $views = 1;
        // }
        // // حفظ عدد المشاهدات في الملف
        // file_put_contents($views_file, $views);
        
        // تحديد متغير لتخزين عدد المشاهدات
        if(!isset($_SESSION['views'])){
            $_SESSION['views'] = 0;
        }
        
        // زيادة عدد المشاهدات عند النقر على الصورة
        if(isset($_GET['image'])){
            $_SESSION['views']++;
        }
        
        // عرض عدد المشاهدات
        
           
     $sql = "SELECT photos.id,photos.views,photos.image,photos.created_at,category.categoryname FROM photos inner JOIN category on category.id = photos.tag WHERE  photos.active=1 ORDER by photos.created_at DESC;";
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
        $title="Catalog-Z Photo ";
        include_once('includes/head.php');
        ?>

</head>
<body>
         
<?php
include_once('includes/pageloader.php');
?>



<!-- lasted photo founf in index file-->

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
            <h2 class="col-6 tm-text-primary">
                Latest Photos
            </h2>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <form action="" class="tm-text-primary">
                    Page <input type="text" value="1" size="1" class="tm-input-paging tm-text-primary"> of 200
                </form>
            </div>
            
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
                    <a href="photo-detail.php?id=<?php echo $id ?>">View more</a>
                    </figcaption>                    
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light"><?php echo $created_at ?></span>
                    <span><?php echo $_SESSION['views'] ."views"; ?></span>
                </div>
            </div>

            <?php
		   }
		   ?>
<!-- lasted photo founf in index file-->


        

            
<?php
include_once('includes/row.php');
include_once('includes/container.php');
include_once('includes/script.php');
?> 
   
</body>
</html>