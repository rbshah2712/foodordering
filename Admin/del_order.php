<?php include('db.php');

    $id= $_GET['id'];
    $query = "delete from tbl_order where id = '".$id."'";
    $result = mysqli_query($connect,$query);
    if($result == TRUE){
        $_SESSION['msg'] = "Record is deleted successfully";
       header('location:orders.php');
    }else{
        $_SESSION['msg'] = "Error in deleting record";
        header('location:orders.php');
    }
?>