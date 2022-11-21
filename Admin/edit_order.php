<?php include('db.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
  if(!empty($id)){
  $query = "Select * from tbl_order WHERE id='".$id."'";
  $result = mysqli_query($connect,$query);
  if(mysqli_num_rows($result) > 0){
          
      while($row = mysqli_fetch_object($result)){
          $id = $row->id;
          $food = $row->food;
          $price = $row->price;
          $quantity = $row->quantity;
          $total_price = $row->total;
          $total_order_price = $row->total_price;
          $order_date = $row->order_date;
          $order_status = $row->order_status;
          $cust_name = $row->cust_name;
          $cust_address = $row->cust_address;
          $cust_contact = $row->cust_contact;
          $cust_email = $row->cust_email;
  
      }
  }
  }
  }
if(isset($_POST['edit'])){

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
        set_msg('Record is updated successfully'); 
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
            <h1>Edit Order</h1>
            </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Order</li>
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
                <h3 class="card-title">Edit Order</h3>
              </div>
              <!-- /.card-header -->
              <form action="edit_order.php" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="foodname">Food Name</code></label>
                  <input type="text" class="form-control form-control-border" name="foodname" id="foodname" placeholder="Enter Food Name" value="<?php echo $food;?>" required >
                </div>
                <div class="form-group">
                  <label for="price">Price</code></label>
                  <input type="text" class="form-control form-control-border border-width-2" name="price" id="price" placeholder="Enter Price" value="<?php echo $price;?>" required>
                </div>
                <div class="form-group">
                  <label for="quantity">Quantity</code></label>
                  <div class="row">
                  <input type="text" class="form-control form-control-border border-width-2 col-md-6" name="quantity" id="quantity" placeholder="Enter Quantity"  value="<?php echo $quantity;?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Total">Total</code></label>
                  <div class="row">
                  <input type="text" class="form-control form-control-border border-width-2 col-md-6" name="total_price" id="total_price" placeholder="Enter Price" value="<?php echo $total_price;?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Total">Total Net Price</code></label>
                  <div class="row">
                  <input type="text" class="form-control form-control-border border-width-2 col-md-6" name="total_order_price" id="total_order_price" placeholder="Enter Total Price" value="<?php echo $total_order_price;?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="order_date">Order Date</code></label>
                  <div class="row">
                  <input type="text" class="form-control form-control-border border-width-2 col-md-6" name="order_date"  id="order_date" placeholder="Enter Order Date" value="<?php echo $order_date;?>" required>
                  <div class="input-group-append"><span class="fa fa-calendar"></span></div>
                  </div>    
                </div>
                <div class="form-group">
                  <label for="order_date">Order Status</code></label>
                 <select id="order_status" class="form-control col-md-6" name="order_status">
                <option value="Received" <?php if($order_status == "Received"){ echo 'selected';}?>>Received</option>
                <option value="Processing" <?php if($order_status == "Processing"){ echo 'selected';}?>>Processing</option>
                <option value="Delivered" <?php if($order_status == "Delivered"){ echo 'selected';}?>>Delivered</option>
                <option value="Cancelled" <?php if($order_status == "Cancelled"){ echo 'selected';}?>>Cancelled</option>
                </select> 
                </div>
                <div class="form-group">
                  <label for="order_date">Customer Name</code></label>
                  <div class="row">
                  <input type="text" class="form-control form-control-border border-width-2 col-md-6" name="cust_name" id="cust_name" placeholder="Enter Customer Name" required value="<?php echo $cust_name;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="order_date">Customer Address</code></label>
                  <div class="row">
                  <input type="text" class="form-control form-control-border border-width-2 col-md-6" name="cust_address" id="cust_address" placeholder="Enter Customer Address" required value="<?php echo $cust_address;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="order_date">Customer Contact</code></label>
                  <div class="row">
                  <input type="text" class="form-control form-control-border border-width-2 col-md-6" name="cust_contact" id="cust_contact" placeholder="Enter Customer Contact" required value="<?php echo $cust_contact;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="order_date">Customer Email</code></label>
                  <div class="row">
                  <input type="email" class="form-control form-control-border border-width-2 col-md-6" name="cust_email" id="cust_email" placeholder="Enter Customer Email" required value="<?php echo $cust_email;?>">
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
