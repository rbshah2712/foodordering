<?php include('db.php');
$allcat = "Select * from tbl_category WHERE is_active = '1'";
$allresult = mysqli_query($connect,$allcat);
if(isset($_GET['id'])){
    $id = $_GET['id'];
  if(!empty($id)){
$query = "Select * from tbl_food WHERE id ='".$id."'";
$result = mysqli_query($connect,$query);
if(mysqli_num_rows($result) > 0){
          
    while($row = mysqli_fetch_object($result)){
        $food_name = $row->food_name;
        $price = $row->price;
        $descr = $row->descr;
        $category = $row->category_id;
        $is_featured = $row->is_featured;
        $img = $row->img;

    }
}
}
}
if(isset($_POST['edit'])){

        $foodname = $_POST['foodname'];
        $descr = $_POST['descr'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $is_featured = $_POST['featured'];
        $id= $_POST['id'];

        if($foodname!= NULL && $price!= NULL && $category!= NULL){
       // $photoupload = $_POST['photoupload']; 
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
                    set_msg('Record is updated successfully'); 
                    header('location:food_category.php');
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
       $query = "UPDATE  tbl_food SET food_name='".$foodname."',descr='".$descr."',price='".$price."',category_id='".$category."',is_featured = '".$is_featured."',img = '".$fileName."' WHERE id='".$id."'";
       $result = mysqli_query($connect,$query);
       if($result == TRUE){
         set_msg("Record is updated Successfully");
         header('location:food_category.php');
       }else{
         set_msg('Error in updating data','danger');
       }
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
            <h1>Edit Food By Category</h1>
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
                <h3 class="card-title">Edit Food By Category</h3>
              </div>
              <!-- /.card-header -->
              <form action="edit_food_category.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="fullname">Food Name</code></label>
                  <input type="text" class="form-control form-control-border" name="foodname" id="foodname" placeholder="Enter Food Name" value="<?php echo $food_name;?>" required>
                </div>
                <div class="form-group">
                  <label for="username">Description</code></label>
                  <textarea class="form-control" rows="3" name="descr" id="descr" placeholder="Enter Description"  required><?php echo $descr;?></textarea>
                </div>
                <div class="form-group">
                        <label>Category Name</label>
                        <select class="form-control" id="category" name="category">
                          <?php
                             while($row = mysqli_fetch_object($allresult)){?>
                            <option value="<?php echo $row->cat_id;?>" <?php if($row->cat_id == $category){ echo 'selected';}?>><?php echo $row->title;?></option>
                            <?php } ?>
                        </select>
                      </div>
                <div class="form-group">
                  <label for="pwd">Price</code></label>
                  <div class="row">
                  <input type="text" class="form-control form-control-border border-width-2 col-md-6" name="price" id="price" placeholder="Enter Price"  value="<?php echo $price;?>" required>
                  </div>
                </div>
                <div class="form-group icheck-primary">
                  <label for="featured">Featured</code></label>
                  <input type="checkbox" class="form-check-input" name="featured" id="featured"  value="1" <?php if($is_featured == 1){ echo 'checked="checked"'; }?>>
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
                <button type="submit" class="btn btn-primary btn-flat" id="add" name="edit" value="edit">Edit</button>
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
