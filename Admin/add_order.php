<?php include('db.php');
if(isset($_POST['add'])){

        $foodname = $_POST['foodname'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $total_price = $_POST['total_price'];
        $total_order_price = $_POST['total_order_price'];
        $order_date = date("Y-m-d",strtotime($_POST['order_date']));
        $order_status = $_POST['order_status'];
        $cust_name = $_POST['cust_name'];
        $cust_address = $_POST['cust_address'];
        $cust_contact = $_POST['cust_contact'];
        $cust_email = $_POST['cust_email'];
        
        if($foodname!= NULL && $price!= NULL && $quantity!= NULL){
       // $photoupload = $_POST['photoupload'];
        $query = "INSERT INTO tbl_order(food,price,quantity,total,total_price,order_date,order_status,cust_name,cust_address,cust_contact,cust_email) 
        VALUES('".$foodname."','".$price."','".$quantity."','".$total_price."','".$total_order_price."','".$order_date."','".$order_status."','".$cust_name."','".$cust_address."','".$cust_contact."','".$cust_email."')";
        $result = mysqli_query($connect,$query);
        $id = mysqli_insert_id($connect);
        $order_number = "RES".$id;
        $update = "UPDATE tbl_order SET order_number='".$order_number."' WHERE id= '".$id."'";
        $resultup = mysqli_query($connect,$update);
        set_msg('Record is added successfully'); 
        header('location:orders.php');
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
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
            <h1>Add Order</h1>
            </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Order</li>
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
          <h4><a href="orders.php" class="card-link">Back</a></h4>
              <!-- /.card-header -->
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Order</h3>
              </div>
              <!-- /.card-header -->
              <form action="add_order.php" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="foodname">Food Name</code></label>
                  <input type="text" class="form-control form-control-border" name="foodname" id="foodname" placeholder="Enter Food Name" required>
                </div>
                <div class="form-group">
                  <label for="price">Price</code></label>
                  <input type="text" class="form-control form-control-border border-width-2" name="price" id="price" placeholder="Enter Price" required>
                </div>
                <div class="form-group">
                  <label for="quantity">Quantity</code></label>
                  <div class="row">
                  <input type="text" class="form-control form-control-border border-width-2 col-md-6" name="quantity" id="quantity" placeholder="Enter Quantity"  required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Total">Total</code></label>
                  <div class="row">
                  <input type="text" class="form-control form-control-border border-width-2 col-md-6" name="total_price" id="total_price" placeholder="Enter Total Price" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Total">Total Net Price</code></label>
                  <div class="row">
                  <input type="text" class="form-control form-control-border border-width-2 col-md-6" name="total_order_price" id="total_order_price" placeholder="Enter Total Price" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="order_date">Order Date</code></label>
                  <div class="row">
                  <input type="text" class="form-control form-control-border border-width-2 col-md-6" name="order_date"  id="order_date" placeholder="Enter Order Date" required>
                  <div class="input-group-append"><span class="fa fa-calendar"></span></div>
                  </div>    
                </div>
                <div class="form-group">
                  <label for="order_date">Order Status</code></label>
                 <select id="order_status" class="form-control col-md-6" name="order_status">
                <option value="Received">Received</option>
                <option value="Processing">Processing</option>
                <option value="Delivered">Delivered</option>
                <option value="Cancelled">Cancelled</option>
                </select> 
                </div>
                <div class="form-group">
                  <label for="order_date">Customer Name</code></label>
                  <div class="row">
                  <input type="text" class="form-control form-control-border border-width-2 col-md-6" name="cust_name" id="cust_name" placeholder="Enter Customer Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="order_date">Customer Address</code></label>
                  <div class="row">
                  <input type="text" class="form-control form-control-border border-width-2 col-md-6" name="cust_address" id="cust_address" placeholder="Enter Customer Address" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="order_date">Customer Contact</code></label>
                  <div class="row">
                  <input type="text" class="form-control form-control-border border-width-2 col-md-6" name="cust_contact" id="cust_contact" placeholder="Enter Customer Contact" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="order_date">Customer Email</code></label>
                  <div class="row">
                  <input type="email" class="form-control form-control-border border-width-2 col-md-6" name="cust_email" id="cust_email" placeholder="Enter Customer Email" required>
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
