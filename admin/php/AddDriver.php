<?php
    include('../../php/connect.php');
    if(isset($_POST['AddDriver'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $typeOfCar = $_POST['typeOfCar'];
        $password = $_POST['password'];

        $addDrivers = "INSERT INTO drivers VALUE(NULL, '$username', '$email', '$phone', '$gender', '$typeOfCar', '$password',now())";
        $query = mysqli_query($con, $addDrivers);

        if($query){
            echo "<script>alert('Driver $username added '), window.location.replace('../drivers.php')</script>";
        }
    }
?>