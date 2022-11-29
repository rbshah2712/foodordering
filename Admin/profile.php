<?php include('db.php');
include('auth.php');
if(isset($_SESSION['id'])){
  if(!empty($_SESSION['id'])){
  $query = "Select * from tbl_admin WHERE id='".$_SESSION['id']."'";
  $result = mysqli_query($connect,$query);
  if(mysqli_num_rows($result) > 0){
          
      while($row = mysqli_fetch_object($result)){
          $id = $row->id;
          $full_name = $row->full_name;
          $img = $row->img;
  
      }
  }
  }
  }
if(isset($_POST['edit'])){

        $full_name = $_POST['full_name'];
        $id = $_POST['id'];
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
                $update = "UPDATE tbl_admin SET full_name='".$full_name."',img='".$fileName."' WHERE cat_id='".$id."'"; 
                $result = mysqli_query($connect,$update);
                if($result == TRUE){
                   set_msg('Record is updated successfully'); 
                   header('location:profile.php');
                }else{ 
                  set_msg('Error in updating data','danger');
                }  
            }
        }else{ 
          set_msg('Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.','danger');
        }
    } else{
    $photouploadpreview = $_POST['photouploadpreview'];
    $fileName = $photouploadpreview;
      $query = "UPDATE  tbl_admin SET full_name='".$full_name."',img = '".$fileName."' WHERE id='".$id."'";
      echo $query;
      $result = mysqli_query($connect,$query);
      if($result == TRUE){
        set_msg("Record is updated Successfully");
        header('location:profile.php');
      }else{
        set_msg('Error in updating data','danger');
      }
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
<?php include('sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Profile</h1>
            <?php get_msg();?>
            </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
          <h4><a href="dashboard.php" class="card-link">Back</a></h4>
              <!-- /.card-header -->
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
                
              </div>
              <!-- /.card-header -->
              <form action="profile.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Full Name</code></label>
                  <input type="text" class="form-control form-control-border" name="full_name" id="full_name" placeholder="Enter Full Name" value="<?php echo $full_name;?>" required>
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
                      <input type="hidden" id="id" name="id" value=<?php echo $id;?>>
                    </div>
                    <img src="<?php echo $baseURL.$img;?>" width="50px" height="100%" class="pull-right">
                    <input type="hidden" value="<?php echo $img;?>" name="photouploadpreview" id="photouploadpreview" >
                  </div>
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
