<?php include('db.php');
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
  $page_no = $_GET['page_no'];
  } else {
    $page_no = 1;
        }
 
  $total_records_per_page = 2;
  $offset = ($page_no-1) * $total_records_per_page;
  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;
  $adjacents = "2"; 
 
  $result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM tbl_customer ");
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
  $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1; // total page minus 1
$query = "Select * from tbl_customer WHERE is_active='1'";
$result = mysqli_query($connect,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $website;?>| Categories</title>

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
  <?php include('sidebar.php');?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Customers</h3>
            <?php get_msg();?>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Customers</li>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Customers</h3><br/><br/> 
                <a href="add_customer.php"><button type="button" id="add" value="Add" class="btn btn-primary">Add</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Customer Name</th>
                      <th>Customer Contact</th>
                      <th>Customer Email</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        if(mysqli_num_rows($result) > 0){
        
                      while($row = mysqli_fetch_object($result)){
                        ?>
                    <tr>
                      <td><?php echo $row->id;?></td>
                      <td><?php echo $row->cust_name;?></td>
                      <td><?php echo $row->cust_contact;?></td>
                      <td><?php echo $row->cust_email;?></td>
                      <td><a href="edit_customer.php?id=<?php echo $row->id;?>"><button type="button" id="edit" value="Edit" class="btn"><i class="fa fa-edit"></i></button></a>&nbsp;
                      <a onclick='javascript:confirmationDelete($(this));return false;' href='del_customer.php?id=<?php echo $row->id;?>' class="btn"><i class="fa fa-trash"></i></a>
                    <?php } } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <?php include('pagination.php');?>
            </div>
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

<?php include('scripts.php');?>

</body>
</html>
