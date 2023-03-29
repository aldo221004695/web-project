<?php
    session_start();
    if(!isset($_SESSION['id'])) {
        // User is not logged in, redirect to the login page
        header('Location: ../../login.php');
        exit;
    }
    include('../../php/connect.php');
    if(isset($_GET['DriverId'])){
        $id = $_GET['DriverId'];
        $deleteDriver = "DELETE FROM drivers WHERE id = $id";
        $query = mysqli_query($con, $deleteDriver);

        if($query){
            echo "<script>alert('Driver deleted '), window.location.replace('../drivers.php')</script>";
        }
        else{
            echo "<script>alert('Driver failed deletion '), window.location.replace('../drivers.php')</script>";
        }        
    }
?>
