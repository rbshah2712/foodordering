<?php
    include('connect.php');
   
    $query = "select * from tbl_food WHERE is_active = '1' order by id ASC";
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



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php if(mysqli_num_rows($result) > 0){ 
                while($row = mysqli_fetch_object($result)){ 
                
            ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $row->food_name;?></h4>
                    <p class="food-price">$<?php echo $row->price;?></p>
                    <p class="food-detail">
                    <?php echo $row->descr;?>
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>
            <?php } } ?>
           


            <div class="clearfix"></div>

            

        </div>

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