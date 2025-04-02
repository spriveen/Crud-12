<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    // Prevent SQL Injection
    $id = mysqli_real_escape_string($con, $id);

    $sqlq = "DELETE FROM `crud` WHERE id=$id";
    $result = mysqli_query($con, $sqlq);

    if($result){
        // echo "Deleted successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}
?>
