<?php include('db.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
  if(!empty($id)){
  $query = "Select * from tbl_customer WHERE id='".$id."'";
  $result = mysqli_query($connect,$query);
  if(mysqli_num_rows($result) > 0){
          
      while($row = mysqli_fetch_object($result)){
          $id = $row->id;
          $cust_name = $row->cust_name;
          $cust_contact = $row->cust_contact;
          $cust_email = $row->cust_email;
          $cust_address = $row->cust_address;
          $cust_img = $row->cust_img;
  
      }
  }
  }
  }
if(isset($_POST['edit'])){

        $cust_name = $_POST['cust_name'];
        $cust_contact = $_POST['cust_contact'];
        $cust_email = $_POST['cust_email'];
        $cust_address = $_POST['cust_address'];
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
                $update = "UPDATE tbl_customer SET cust_name='".$cust_name."',cust_contact='".$cust_contact."',cust_email='".$cust_email."',cust_address='".$cust_address."',cust_img='".$fileName."' WHERE id='".$id."'"; 
                $result = mysqli_query($connect,$update);
                if($result == TRUE){
                   set_msg('Record is updated successfully'); 
                   header('location:customer.php');
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
      $query = "UPDATE  tbl_customer SET cust_name='".$cust_name."',cust_contact='".$cust_contact."',cust_email='".$cust_email."',cust_address='".$cust_address."',cust_img='".$fileName."' WHERE id='".$id."'";
      echo $query;
      $result = mysqli_query($connect,$query);
      if($result == TRUE){
        set_msg("Record is updated Successfully");
        header('location:customer.php');
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
  <title>AdminLTE 3 | Edit Customer</title>

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
            <h1>Edit Category</h1>
            <div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Customer</li>
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
          <h4><a href="category.php" class="card-link">Back</a></h4>
              <!-- /.card-header -->
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Customer</h3>
              </div>
              <!-- /.card-header -->
              <form action="edit_customer.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
              <div class="card-body">
                <div class="form-group">
                  <label for="cust_name">Customer Name</code></label>
                  <input type="text" class="form-control form-control-border" name="cust_name" id="cust_name" placeholder="Enter Customer Name" required value="<?php echo $cust_name;?>">
                </div>
                <div class="form-group">
                  <label for="cust_contact">Customer Contact</code></label>
                  <input type="text" class="form-control form-control-border" name="cust_contact" id="cust_contact" placeholder="Enter Customer Contact" required value="<?php echo $cust_contact;?>">
                </div>
                <div class="form-group">
                  <label for="cust_email">Customer Email</code></label>
                  <input type="text" class="form-control form-control-border" name="cust_email" id="cust_email" placeholder="Enter Customer Email" required value="<?php echo $cust_email;?>">
                </div>
                <div class="form-group">
                  <label for="cust_address">Customer Address</code></label>
                  <textarea class="form-control form-control-border" name="cust_address" id="cust_address" placeholder="Enter Customer Address" ><?php echo $cust_address;?></textarea>
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
                    <img src="<?php echo $baseURL.$cust_img;?>" width="50px" height="100%" class="pull-right">
                    <input type="hidden" value="<?php echo $cust_img;?>" name="photouploadpreview" id="photouploadpreview" >
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
