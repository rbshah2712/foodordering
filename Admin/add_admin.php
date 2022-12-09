<?php include('db.php');
if(isset($_POST['add'])){

        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        $rptpwd = $_POST['rptpwd'];
        if($pwd != $rptpwd){
          $_SESSION['msg'] = "Password didnot match";
        }else{
        if($fullname!= NULL && $username!= NULL && $pwd!= NULL){
       // $photoupload = $_POST['photoupload'];
        $query = "INSERT INTO tbl_admin(full_name,username,pass,img) VALUES('".$fullname."','".$username."','".$pwd."','')";
        $result = mysqli_query($connect,$query);
        $id = mysqli_insert_id($connect);
        if(!empty($_FILES["photoupload"]["name"])) { 
            $target_dir = "uploads/";
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
                $update = "UPDATE tbl_admin SET img='".$fileName."' WHERE id='".$id."'"; 
                $result = mysqli_query($connect,$update);
                if($result == TRUE){ 
                  set_msg('Record is added successfully'); 
                   header('location:admin.php');
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
    header('location:admin.php');
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

  <?php include('sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Admin Users</h1>
            </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Admin Users</li>
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
          <h4><a href="admin.php" class="card-link">Back</a></h4>
              <!-- /.card-header -->
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Admin Users</h3>
              </div>
              <!-- /.card-header -->
              <form action="add_admin.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="fullname">Full Name</code></label>
                  <input type="text" class="form-control form-control-border" name="fullname" id="fullname" placeholder="Enter Full Name" required>
                </div>
                <div class="form-group">
                  <label for="username">Username</code></label>
                  <input type="text" class="form-control form-control-border border-width-2" name="username" id="username" placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                  <label for="pwd">Password</code></label>
                  <div class="row">
                  <input type="password" class="form-control form-control-border border-width-2 col-md-6" name="pwd" id="pwd" placeholder="Enter Password"  required>
                  <i class="fas fa-eye field-icon toggle-password" toggle="#pwd"></i>
                  </div>
                </div>
                <div class="form-group">
                  <label for="rptpwd">Repeat Password</code></label>
                  <div class="row">
                  <input type="password" class="form-control form-control-border border-width-2 col-md-6" name="rptpwd" id="rptpwd" placeholder="Enter Password" required>
                  <i class="fas fa-eye field-icon toggle-password" toggle="#rptpwd"></i>
                  </div>
                </div>
                <div class="form-group">
                    <label for="photoupload">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input col-md-6" name="photoupload" id="photoupload">
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
