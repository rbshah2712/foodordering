<?php include('db.php');
if(isset($_POST['send'])){

    $emailaddress = $_POST['emailaddress'];
    $query = "Select * from tbl_admin where email='".$emailaddress."'";
    $result = mysqli_query($connect,$query);
    if(mysqli_num_rows($result) > 0){
        $to = "xyz@somedomain.com";
         $subject = "This is subject";
         
         $message = "<b>This is HTML message.</b>";
         $message .= "<h1>This is headline.</h1>";
         
         $header = "From:rsanghvi2712@gmail.com \r\n";
         $header .= "Cc:rsanghvi2712@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         echo $message;
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            set_msg('Message sent successfully...'); 
          //  header("Location: forgot_pass.php");
           
         }else {
            set_msg('Message could not be sent...','danger');
          //  header("Location: forgot_pass.php");
         }
        
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
      <h3 class="card-title">Forgot Password</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?php get_msg();?>
    <form class="form-horizontal" action="forgot_pass.php" method="post">
      <div class="card-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="emailaddress" id="emailaddress" placeholder="Enter Email">
          </div>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-info" id="send" name="send" value="send">Send</button>
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