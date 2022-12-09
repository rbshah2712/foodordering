<?php include('db.php');
if(isset($_POST['login'])){

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
   // $md5pass = $pwd);
   if(isset($_POST["remember_me"]) && $_POST["remember_me"]=='1' || $_POST["remember_me"]=='on')
   {
        $hour = time() + 3600 * 24 * 30;
        setcookie('username', $username, $hour);
        setcookie('password', $pwd, $hour);
   }else{
      setcookie("username","");
	    setcookie("password","");
   }
    $query = "Select * from tbl_admin where username='".$username."' AND pass='".$pwd."'";
    $result = mysqli_query($connect,$query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_object($result)){
            $_SESSION["loggedin"] = true;
            $_SESSION['id'] = $row->id;
            $_SESSION['full_name'] = $row->full_name;
            $_SESSION['pic'] = $row->img;
        }
        header("Location: dashboard.php");
    }else{
        set_msg("Username or Password is wrong",'danger');
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin  | Login</title>

  <?php include('styles.php');?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<section class="container-fluid">
<div class="row mb-2 justify-content-center">
    <a href="#" class="brand-link justify-content-center">
        <img src="img/logo_1.png" alt="Food Ordering System" class="brand-image img-circle elevation-3" style="opacity: .8">
      </a>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Admin Panel</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?php get_msg();?>
    <form class="form-horizontal" action="index.php" method="post">
      <div class="card-body">
      <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="confpwd" id="confpwd" placeholder="Confirm Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
          </div>
        </div>
        <div class="form-group row">
                    <label for="photoupload" class="col-sm-2 col-form-label">Image</label>
                    <div class="input-group col-sm-10">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="photoupload" id="photoupload">
                        <label class="custom-file-label" for="photoupload">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
</div>
      </div>
      <!-- /.card-body -->
      <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-info" id="register" name="register" value="register">Sign Up</button>
        <button type="reset" class="btn btn-default" id="cancel" name="cancel">Cancel</button>
      </div>
      </div>
      <!-- /.card-footer -->
    </form>
    
  </div>
  </div>
  
        </div>
        
    </div>
    
</section>
  </div>
</body>
</html>