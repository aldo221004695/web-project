<?php
    include('../../php/connect.php');
    if(isset($_POST['addCar'])){
        $plate = $_POST['plate'];
        $typeOfCar = $_POST['typeOfCar'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $addCar = "INSERT INTO cars VALUE(NULL, '$plate', '$typeOfCar', '$price', '$quantity', now())";
        $query = mysqli_query($con, $addCar);

        if($query){
            echo "<script>alert('car $typeOfCar added '), window.location.replace('../cars.php')</script>";
        }
    }
?>