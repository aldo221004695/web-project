<?php
    session_start();
    if(!isset($_SESSION['id'])) {
        // User is not logged in, redirect to the login page
        header('Location: ../../login.php');
        exit;
    }
    include('../../php/connect.php');
    if(isset($_GET['locId'])){
        $id = $_GET['locId'];
        $deleteLocation = "DELETE FROM `location` WHERE id = $id";
        $query = mysqli_query($con, $deleteLocation);

        if($query){
            echo "<script>alert('location deleted '), window.location.replace('../location.php')</script>";
        }
        else{
            echo "<script>alert('location failed deletion '), window.location.replace('../location.php')</script>";
        }        
    }
?>
