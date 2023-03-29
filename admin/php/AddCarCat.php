<?php
    include('../../php/connect.php');
    if(isset($_POST['addCarCategory'])){
        $typeOfCar = $_POST['typeOfCar'];

        $addCar = "INSERT INTO carCategory VALUE(NULL, '$typeOfCar', now())";
        $query = mysqli_query($con, $addCar);

        if($query){
            echo "<script>alert('category $typeOfCar added '), window.location.replace('../cars.php')</script>";
        }
        else{
            echo "<script>alert('category $typeOfCar already exist '), window.location.replace('../cars.php')</script>";
        }
    }
?>