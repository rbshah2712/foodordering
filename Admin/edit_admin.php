<?php include('db.php');

if(isset($_GET['id'])){
  $id = $_GET['id'];
if(!empty($id)){
$query = "Select * from tbl_admin WHERE id='".$id."'";
$result = mysqli_query($connect,$query);
if(mysqli_num_rows($result) > 0){
        
    while($row = mysqli_fetch_object($result)){
        $id = $row->id;
        $fullname = $row->full_name;
        $username = $row->username;
        $pwd = $row->pass;
        $img = $row->img;

    }
}
}
}

if(isset($_POST['edit'])){
  $id = $_POST['adminid'];
  $fullname = $_POST['fullname'];
  $username = $_POST['username'];
  $pwd = $_POST['pwd'];
  if(!empty($_FILES["photoupload"]["name"])) { 
    $target_dir = "uploads/Users/";
    // Get file info 
    $ext = basename($_FILES["photoupload"]["name"]);
    $fileName = $target_dir.basename($_FILES["photoupload"]["name"]); 
    $fileType = strtolower(pathinfo($ext, PATHINFO_EXTENSION)); 
    // Allow certain file formats 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    if(in_array($fileType, $allowTypes) == true){ 
        $image = $_FILES['photoupload']['tmp_name']; 
        if(move_uploaded_file($image,$target_dir.$_FILES["photoupload"]["name"])){
          $query = "UPDATE  tbl_admin SET full_name = '".$fullname."',username = '".$username."',pass = '".$pwd."',img = '".$fileName."' WHERE id='".$id."'";
          $result = mysqli_query($connect,$query);
          if($result == TRUE){
            set_msg("Record is updated Successfully");
            header('location:admin.php');
          }else{
            set_msg('Error in updating data','danger');
          }
    }
    
}else{ 
  set_msg('Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.','danger'); 
} 
}else{
  $photouploadpreview = $_POST['photouploadpreview'];
  $fileName = $photouploadpreview;
    $query = "UPDATE  tbl_admin SET full_name = '".$fullname."',username = '".$username."',pass = '".$pwd."',img = '".$fileName."' WHERE id='".$id."'";
    $result = mysqli_query($connect,$query);
    if($result == TRUE){
      set_msg("Record is updated Successfully");
      header('location:admin.php');
    }else{
      set_msg('Error in updating data');
    }
}
  
  
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Food Order | Edit Admin Users</title>

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
      <span class="brand-text font-weight-light">Food Order</span>
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
            <h1>Edit Admin Users</h1>
<         </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Admin Users</li>
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
              <!-- /.card-header -->
              <h4><a href="admin.php" class="card-link">Back</a></h4>
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Admin Users</h3>
              </div>
              <!-- /.card-header -->
              <form action="edit_admin.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputBorder">Full Name</code></label>
                  <input type="text" class="form-control form-control-border" name="fullname" id="fullname" placeholder="Enter Full Name" value="<?php echo $fullname;?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">Username</code></label>
                  <input type="text" class="form-control form-control-border border-width-2" name="username" id="username" placeholder="Enter Username" value="<?php echo $username;?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputRounded0">Password</code></label>
                  <div class="row">
                  <input type="password" class="form-control form-control-border border-width-2 col-md-6" name="pwd" id="pwd" placeholder="Enter Password" value="<?php echo $pwd;?>">
                  <i class="fas fa-eye field-icon toggle-password" toggle="#pwd"></i>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputRounded0">Repeat Password</code></label>
                  <div class="row">
                  <input type="password" class="form-control form-control-border border-width-2 col-md-6" name="rptpwd" id="rptpwd" placeholder="Enter Password" value="<?php echo $pwd;?>">
                  <i class="fas fa-eye field-icon toggle-password" toggle="#rptpwd"></i>
                  </div>
                </div>
                <img src="<?php echo $baseURL.$img;?>" width="50px" height="100%">
                <input type="hidden" value="<?php echo $img;?>" name="photouploadpreview" id="photouploadpreview" >
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
                      <input type="hidden" id="adminid" name="adminid" value=<?php echo $id;?>>
                    </div>
                  </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary btn-flat" id="edit" name="edit" value="edit">Edit</button>
                <button type="reset" class="btn btn-light btn-flat" id="cancel" name="cancel">Cancel</button>
            </div>
          </form>
              </div>
              <!-- /.card-body -->
            </div>
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