<?php include('db.php');

    $id= $_GET['id'];
    $query = "delete from tbl_category where cat_id = '".$id."'";
    $result = mysqli_query($connect,$query);
    if($result == TRUE){
        set_msg("Record is deleted successfully");
       header('location:category.php');
    }else{
        set_msg("Error in deleting record",'danger');
        header('location:category.php');
    }
?>