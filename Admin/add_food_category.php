<?php include('db.php');
$allcat = "Select * from tbl_category WHERE is_active = '1'";
$allresult = mysqli_query($connect,$allcat);

if(isset($_POST['add'])){

        $foodname = $_POST['foodname'];
        $desc = $_POST['desc'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $is_featured = $_POST['featured'];

        if($foodname!= NULL && $price!= NULL && $category!= NULL){
       // $photoupload = $_POST['photoupload'];
        $query = "INSERT INTO tbl_food(food_name,descr,price,img,category_id,is_featured,is_active) VALUES('".$foodname."','".$desc."','".$price."','','".$category."','".$is_featured."','1')";
        $result = mysqli_query($connect,$query);
        $id = mysqli_insert_id($connect);
        if(!empty($_FILES["photoupload"]["name"])) { 
            $target_dir = "uploads/foods/";
            // Get file info 
            $fileName = $target_dir.basename($_FILES["photoupload"]["name"]); 
            $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); 
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            if(in_array($fileType, $allowTypes)){ 
                $image = $_FILES['photoupload']['tmp_name']; 
                if(move_uploaded_file($image,$target_dir.$_FILES["photoupload"]["name"])){
                //$imgContent = addslashes(file_get_contents($image)); 
                // Insert image content into database 
                $update = "UPDATE tbl_food SET img='".$fileName."' WHERE id='".$id."'"; 
                $result = mysqli_query($connect,$update);
                if($result == TRUE){ 
                   $_SESSION['msg'] = 'Record is added successfully'; 
                    header('location:food_category.php');
                }else{ 
                  $_SESSION['msg'] = 'Error in storing record';
                }  
            }else{ 
              $_SESSION['msg']  = 'Error in storing image';
            } 
        }else{ 
          $_SESSION['msg']  = 'Please upload jpg,png,gif or jpeg files';
        }
    } 
  }else{
  //  header('location:admin.php?msg=err');
  }

}



   

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Simple Tables</title>

  <!-- Google Font: Source Sans Pro -->
  <?php include('styles.php');?>
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include('topmenu.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $baseURL.$_SESSION['pic'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['full_name'];?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
  

      <!-- Sidebar Menu -->
     
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Food By Category</h1>
           </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Food By Category</li>
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
          <h4><a href="food_category.php" class="card-link">Back</a></h4>
              <!-- /.card-header -->
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Food By Category</h3>
              </div>
              <!-- /.card-header -->
              <form action="add_food_category.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="fullname">Food Name</code></label>
                  <input type="text" class="form-control form-control-border" name="foodname" id="foodname" placeholder="Enter Food Name" required>
                </div>
                <div class="form-group">
                  <label for="username">Description</code></label>
                  <textarea class="form-control" rows="3" name="desc" id="desc" placeholder="Enter Description" required></textarea>
                </div>
                <div class="form-group">
                        <label>Category Name</label>
                        <select class="form-control" id="category" name="category">
                          <?php
                             while($row = mysqli_fetch_object($allresult)){?>
                            <option value="<?php echo $row->cat_id;?>"><?php echo $row->title;?></option>
                            <?php } ?>
                        </select>
                      </div>
                <div class="form-group">
                  <label for="pwd">Price</code></label>
                  <div class="row">
                  <input type="text" class="form-control form-control-border border-width-2 col-md-6" name="price" id="price" placeholder="Enter Price"  required>
                  </div>
                </div>
                <div class="form-group icheck-primary">
                  <label for="featured">Featured</code></label>
                  <input type="checkbox" class="form-check-input" name="featured" id="featured"  value="1">
                </div>
                <div class="form-group">
                    <label for="photoupload">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="photoupload" id="photoupload">
                        <label class="custom-file-label" for="photoupload">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
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
