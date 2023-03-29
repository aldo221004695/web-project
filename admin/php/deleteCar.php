<?php
    session_start();
    if(!isset($_SESSION['id'])) {
        // User is not logged in, redirect to the login page
        header('Location: ../../login.php');
        exit;
    }
    include('../../php/connect.php');
    if(isset($_GET['carId'])){
        $id = $_GET['carId'];
        $deleteCar = "DELETE FROM cars WHERE id = $id";
        $query = mysqli_query($con, $deleteCar);

        if($query){
            echo "<script>alert('car $typeOfCar deleted '), window.location.replace('../cars.php')</script>";
        }
        else{
            echo "<script>alert('car $typeOfCar failed deletion '), window.location.replace('../cars.php')</script>";
        }        
    }
?>
