<?php
    include('../../php/connect.php');
    if(isset($_POST['addRoute'])){
        $fromDestiny = $_POST['fromDestiny'];
        $toDestiny = $_POST['toDestiny'];
        $price = $_POST['price'];

        $addCar = "INSERT INTO journey VALUE(NULL, '$fromDestiny', '$toDestiny', '$price', now())";
        $query = mysqli_query($con, $addCar);

        if($query){
            echo "<script>alert('Route from $fromDestiny to $toDestiny added '), window.location.replace('../routes.php')</script>";
        }
    }
?>