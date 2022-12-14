<?php
    include('connect.php');
    $query = "Select * from tbl_category where is_active = '1'";
    $result = mysqli_query($connect,$query);

    $query1 = "select * from tbl_food WHERE is_active = '1' order by id ASC";
    $result1 = mysqli_query($connect,$query1);

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

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            
            <?php
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_object($result)){

                   
            ?>
           <div class="box-3 flex-container">
            <a href="category-foods.html">
                <img src="<?php echo $baseURL.$row->img;?>" alt="<?php echo $row->title;?>" class="img-responsive img-curve" width="100%">
                <h3 class="float-text text-white"><?php echo $row->title;?></h3>
            </a>
                    </div>
            <?php 
             }
            }
            ?>
            <div class="clearfix"></div>
        
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
                if(mysqli_num_rows($result1) > 0){
                    while($row = mysqli_fetch_object($result1)){

                   
            ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4<?php echo $row->food_name;?></h4>
                    <p class="food-price">$<?php echo $row->price;?></p>
                    <p class="food-detail">
                    <?php echo $row->descr;?>
                    </p>
                    <br>

                    <a href="order.php" class="btn btn-primary">Order Now</a>
                </div>
            </div>
            <?php } }?>
  


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
 <?php include('social.php');?>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <?php include('footer.php');?>
    <!-- footer Section Ends Here -->

</body>
</html>