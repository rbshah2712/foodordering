<?php include('db.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
  if(!empty($id)){
  $query = "Select * from tbl_restaurant WHERE id='".$id."'";
  $result = mysqli_query($connect,$query);
  if(mysqli_num_rows($result) > 0){
          
      while($row = mysqli_fetch_object($result)){
          $id = $row->id;
          $res_name = $row->res_name;
          $res_address = $row->res_address;
          $res_contact = $row->res_contact;
          $res_email = $row->res_email;
          $is_featured = $row->is_featured;
         // $img = $row->img;
  
      }
  }
  }
  }
if(isset($_POST['edit'])){

        $res_name = $_POST['res_name'];
        $res_address = $_POST['res_address'];
        $res_contact = $_POST['res_contact'];
        $res_email = $_POST['res_email'];
        $is_featured = $_POST['featured'];
        $id = $_POST['id'];
       /* if(!empty($_FILES["photoupload"]["name"])) { 
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
                $update = "UPDATE tbl_restaurant SET title='".$title."',is_featured = '".$is_featured."',img='".$fileName."' WHERE id='".$id."'"; 
                $result = mysqli_query($connect,$update);
                if($result == TRUE){
                   set_msg('Record is updated successfully'); 
                   header('location:category.php');
                }else{ 
                  set_msg('Error in updating data','danger');
                }  
            }
        }else{ 
          set_msg('Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.','danger');
        }
    } else{ */
   
      $query = "UPDATE  tbl_restaurant SET res_name='".$res_name."',res_address='".$res_address."',res_contact='".$res_contact."',res_email='".$res_email."',is_featured = '".$is_featured."' WHERE id='".$id."'";
      echo $query;
      $result = mysqli_query($connect,$query);
      if($result == TRUE){
        set_msg("Record is updated Successfully");
        header('location:restaurant.php');
      }else{
        set_msg('Error in updating data','danger');
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
            <h1>Edit Restaurant</h1>
</div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Restaurant</li>
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
                <h3 class="card-title">Edit Restaurant</h3>
              </div>
              <!-- /.card-header -->
              <form action="edit_restaurant.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Restaurant Name</code></label>
                  <input type="text" class="form-control form-control-border" name="res_name" id="res_name" placeholder="Enter Restaurant Name" value="<?php echo $res_name;?>" required>
                </div>
                <div class="form-group">
                  <label for="title">Restaurant Address</code></label>
                  <input type="text" class="form-control form-control-border" name="res_address" id="res_address" placeholder="Enter Restaurant Address" value="<?php echo $res_address;?>" required>
                </div>
                <div class="form-group">
                  <label for="title">Restaurant Contact</code></label>
                  <input type="text" maxlength="12" pattern="[0-9]{3}[-][0-9]{3}[-][0-9]{4}" class="form-control form-control-border" name="res_contact" id="res_contact" placeholder="Enter Restaurant Contact" value="<?php echo $res_contact;?>" required>
                </div>
                <div class="form-group">
                  <label for="title">Restaurant Email</code></label>
                  <input type="email" class="form-control form-control-border" name="res_email" id="res_email" placeholder="Enter Restaurant Email" value="<?php echo $res_email;?>" required>
                </div>
                <div class="form-group icheck-primary">
                  <label for="featured">Featured</code></label>
                  <input type="checkbox" class="form-check-input" name="featured" id="featured"  value="1" <?php if($is_featured == 1){ echo 'checked="checked"'; }?>>
                </div>
                <input type="hidden" id="id" name="id" value=<?php echo $id;?>>
                <!--<div class="form-group">
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
                    <img src="<?php echo $baseURL.$img;?>" width="50px" height="100%" class="pull-right">
                    <input type="hidden" value="<?php echo $img;?>" name="photouploadpreview" id="photouploadpreview" >
                  </div>-->
                <div class="form-group">
                <button type="submit" class="btn btn-primary btn-flat" id="edit" name="edit" value="edit">Edit</button>
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
