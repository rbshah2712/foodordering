<?php
    include('connect.php');
   
    $query = "select * from tbl_category WHERE is_active = '1' order by cat_id ASC";
    $result = mysqli_query($connect,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include('scripts.php');?>
</head>

<body>
    <!-- Navbar Section Starts Here -->
   <?php include('navbar.php');?>
    <!-- Navbar Section Ends Here -->



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php if(mysqli_num_rows($result) > 0){ 
                while($row = mysqli_fetch_object($result)){ 
                
            ?>
            <a href="category-foods.php?id=<?php echo $row->cat_id;?>">
            <div class="box-3 flex-container">
                <img src="<?php echo $baseURL.$row->img;?>" alt="<?php echo $row->title;?>" class="img-responsive img-curve" width="300px">

                <h3 class="float-text text-white"><?php echo $row->title;?></h3>
            </div>
            </a>
            <?php } 
                }else{
                    echo 'Sorry,Data is not Available';
                }
            ?>
            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <!-- social Section Starts Here -->
   <?php include('social.php')?>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <?php include('footer.php');?>
    <!-- footer Section Ends Here -->

</body>
</html>