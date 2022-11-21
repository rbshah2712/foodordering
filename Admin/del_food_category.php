<?php include('db.php');

    $id= $_GET['id'];
    $query = "delete from tbl_food where id = '".$id."'";
    $result = mysqli_query($connect,$query);
    if($result == TRUE){
       $_SESSION['msg'] = "Record is deleted successfully";
       header('location:food_category.php');
    }else{
        $_SESSION['msg'] = "Error in deleting record";
        header('location:food_category.php');
    }
?>