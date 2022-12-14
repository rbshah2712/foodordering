<?php include('db.php');
if(isset($_POST['add'])){

        $res_name = $_POST['res_name'];
        $res_address = $_POST['res_address'];
        $res_contact = $_POST['res_contact'];
        $res_email = $_POST['res_email'];
        $res_website = $_POST['res_website'];
        $res_business_hrs = $_POST['res_business_hrs'];
        $res_business_days = $_POST['res_business_days'];
        $is_featured = $_POST['featured'];
       
        if($res_name!= NULL){
       // $photoupload = $_POST['photoupload'];
        $query = "INSERT INTO tbl_restaurant(res_name,res_img,res_address,res_contact,res_email,res_website,business_hours,business_days_open,is_featured,is_active) VALUES('".$res_name."','','".$res_address."','".$res_contact."','".$res_email."','".$res_website."','".$res_business_hrs."','".$res_business_days."','".$is_featured."','1')";
        $result = mysqli_query($connect,$query);
        $id = mysqli_insert_id($connect);
        if(!empty($_FILES["photoupload"]["name"])) { 
            $target_dir = "uploads/categories/";
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
                $update = "UPDATE tbl_restaurant SET img='".$fileName."' WHERE id='".$id."'"; 
                $result = mysqli_query($connect,$update);
                if($result == TRUE){ 
                   set_msg('Record is added successfully'); 
                   header('location:category.php');
                }else{ 
                    set_msg('Error in storing record','danger');
                }  
            }else{ 
              set_msg('Error in storing image','danger');
            } 
        }else{ 
          set_msg('Please upload jpg,png,gif or jpeg files','danger');
        }
    } 
  }else{
      set_msg('Record is added successfully'); 
      header('location:restaurant.php');
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

  <?php include('sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Restaurant</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Restaurant</li>
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
          <h4><a href="restaurant.php" class="card-link">Back</a></h4>
              <!-- /.card-header -->
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Restaurant</h3>
              </div>
              <!-- /.card-header -->
              <form action="add_restaurant.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="res_name">Restaurant Name</code></label>
                  <input type="text" class="form-control form-control-border" name="res_name" id="res_name" placeholder="Enter Restaurant" required>
                </div>
                <div class="form-group">
                  <label for="res_address">Restaurant Address</code></label>
                  <input type="text" class="form-control form-control-border" name="res_address" id="res_address" placeholder="Enter Restaurant Address" required>
                </div>
                <div class="form-group">
                  <label for="res_contact">Restaurant Contact</code></label>
                  <input type="text" maxlength="12" pattern="[0-9]{3}[-][0-9]{3}[-][0-9]{4}" class="form-control form-control-border" name="res_contact" id="res_contact" placeholder="Enter Restaurant Contact" required>
                </div>
                <div class="form-group">
                  <label for="res_email">Restaurant Email</code></label>
                  <input type="email" class="form-control form-control-border" name="res_email" id="res_email" placeholder="Enter Restaurant Email" required>
                </div>
                <div class="form-group">
                  <label for="res_website">Restaurant Website</code></label>
                  <input type="url" class="form-control form-control-border" name="res_website" id="res_website" placeholder="Enter Restaurant Website" required>
                </div>
                <div class="form-group">
                  <label for="res_business_hrs">Restaurant Business Hours</code></label>
                  <input type="url" class="form-control form-control-border" name="res_business_hrs" id="res_business_hrs" placeholder="Enter Restaurant Website" required>
                </div>
                <div class="form-group">
                  <label for="res_business_days">Restaurant Business Days</code></label>
                  <input type="url" class="form-control form-control-border" name="res_business_days" id="res_business_days" placeholder="Enter Restaurant Website" required>
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
                <div class="form-group icheck-primary">
                  <label for="featured">Featured</code></label>
                  <input type="checkbox" class="form-check-input" name="featured" id="featured"  value="1">
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
