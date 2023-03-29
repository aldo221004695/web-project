<?php
    session_start();
    if(!isset($_SESSION['id'])) {
        // User is not logged in, redirect to the login page
        header('Location: ../../login.php');
        exit;
    }
    include('../../php/connect.php');
    if(isset($_GET['routeId'])){
        $id = $_GET['routeId'];
        $deleteLocation = "DELETE FROM `journey` WHERE id = $id";
        $query = mysqli_query($con, $deleteLocation);

        if($query){
            echo "<script>alert('Route deleted '), window.location.replace('../routes.php')</script>";
        }
        else{
            echo "<script>alert('Route failed deletion '), window.location.replace('../routes.php')</script>";
        }        
    }
?>
