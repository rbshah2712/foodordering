<?php include('db.php');
include('auth.php');
if(isset($_SESSION['id'])){
  if(!empty($_SESSION['id'])){
  $query = "Select pass from tbl_admin WHERE id='".$_SESSION['id']."'";
  $result = mysqli_query($connect,$query);
  if(mysqli_num_rows($result) > 0){
          
      while($row = mysqli_fetch_object($result)){
          $old_pass = $row->pass;
      }
  }
  }
  }
if(isset($_POST['edit'])){
        if($_POST['old_pass'] == $old_pass){
        $new_pass = $_POST['new_pass'];
        $id = $_POST['id'];
        $update = "UPDATE tbl_admin SET pass='".$new_pass."' WHERE id='".$id."'"; 
        $result = mysqli_query($connect,$update);
        if($result == TRUE){
            set_msg('Password is updated successfully'); 
          //  header('location:change_pass.php');
        }else{ 
            set_msg('Error in updating data','danger');
        }  
        }else{ 
            set_msg('Old Password must be wrong');
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
            <h1>Change Password</h1>
            <?php get_msg();?>
            </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Change password</li>
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
                <h3 class="card-title">Change Password</h3>
                
              </div>
              <!-- /.card-header -->
              <form action="change_pass.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Old Password</code></label>
                  <input type="text" class="form-control form-control-border" name="old_pass" id="old_pass" placeholder="Enter Old Password" required>
                </div>
                <div class="form-group">
                  <label for="title">New Password</code></label>
                  <input type="text" class="form-control form-control-border" name="new_pass" id="new_pass" placeholder="Enter New Password" required>
                </div>
                <div class="form-group">
                  <label for="title">Confirm Password</code></label>
                  <input type="text" class="form-control form-control-border" name="confirm_pass" id="confirm_pass" placeholder="Enter Confirm Password" required>
                </div>
                    <input type="hidden" value="<?php echo $_SESSION['id'];?>" name="id" id="id" >
                 
                <div class="form-group">
                <button type="submit" class="btn btn-primary btn-flat" id="edit" name="edit" value="edit">Change Password</button>
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
