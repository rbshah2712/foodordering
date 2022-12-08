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
          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
          </div>
        </div>
        <div class="row checkbox-row">
        <div class="custom-control custom-checkbox col-sm-6">
        <div class="checkbox-inline" style="text-align:center;">
          <input class="custom-control-input" type="checkbox" name="remember_me" id="remember_me">
          <label for="remember_me" class="custom-control-label">Remember Me</label>
        </div>
      </div>
      </div>
      </div>
      <!-- /.card-body -->
      <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-info" id="login" name="login" value="login">Sign in</button>
        <button type="reset" class="btn btn-default" id="cancel" name="cancel">Cancel</button>
      </div>
      </div>
      <!-- /.card-footer -->
    </form>
    
  </div>
  <div class="form-group row">
  <div class="offset-sm-2 col-sm-10">
    <a href="register.php" class="btn btn-danger">Register</a>&nbsp;
    <a href="forgot_pass.php" class="btn btn-danger" >Forgot Password?</a> </div>
    </div>
  </div>
  
        </div>
        
    </div>
    
</section>
  </div>
</body>
</html>