<?php include('db.php');
$foods =  mysqli_query($connect,"Select * from tbl_food where is_active='1'");
if(isset($_POST['add'])){

        $food_name = $_POST['food_name'];
        $username = $_POST['username'];
        $rating = $_POST['rating'];
        $notes = $_POST['notes'];
       
        if($food_name!= NULL){
       // $photoupload = $_POST['photoupload'];
        $query = "INSERT INTO tbl_food_review(food_id,user_id,stars,review_note) VALUES('".$food_name."','".$username."','".$rating."','".$notes."')";
        $result = mysqli_query($connect,$query);
        $id = mysqli_insert_id($connect);
 
      set_msg('Record is added successfully'); 
      header('location:food_review.php');
        }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Food Reviews</title>

  <!-- Google Font: Source Sans Pro -->
  <?php include('styles.php');?>
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include('topmenu.php');?>
  <!-- /.navbar -->
  <?php include('sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Food Reviews</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Food Reviews</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <h4><a href="food_review.php" class="card-link">Back</a></h4>
              <!-- /.card-header -->
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Food Reviews</h3>
              </div>
              <!-- /.card-header -->
              <form action="add_food_review.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="fullname">Food Name</code></label>
                  <select class="form-control" id="food_name" name="food_name">
                          <?php
                             while($row = mysqli_fetch_object($foods)){?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->food_name;?></option>
                            <?php } ?>
                        </select>
                </div>
                <div class="form-group">
                  <label for="featured">User Name</code></label>
                  <input type="text" class="form-control form-control-border" name="username" id="username" placeholder="Enter Username">
                </div>
                <div class="form-group">
                  <label for="featured">Rating</code></label>
                  <input type="text" class="form-control form-control-border" name="rating" id="rating" placeholder="Enter Rating" >
                </div>
                <div class="form-group">
                  <label for="featured">Notes</code></label>
                  <textarea  class="form-control form-control-border" name="notes" id="notes" placeholder="Enter Review Note"></textarea>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary btn-flat" id="add" name="add" value="add">Add</button>
                <button type="reset" class="btn btn-light btn-flat" id="cancel" name="cancel">Cancel</button>
            </div>
</form>
              </div>
              <!-- /.card-body -->
            </div>
              <!-- /.card-body -->
            
          
            <!-- /.card -->
            <!-- /.card -->
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include('scripts.php');?>
</body>
</html>
