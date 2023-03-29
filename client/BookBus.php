<?php
 session_start();
    if(!isset($_SESSION['id'])) {
        // User is not logged in, redirect to the login page
        header('Location: ../login.php');
        exit;
    }
    
    include '../php/connect.php';

    if(isset($_POST['BookBus'])){
        $id = $_SESSION['id'];
        $route = $_POST['route'];
        $start = $_POST['start'];
        $arrival = $_POST['arrival'];

        $bookBus = "INSERT INTO booking VALUES(NULL, '$id' ,'$route', now(), '$start' , '$arrival')";
        $query = mysqli_query($con, $bookBus);

        if($query){
            echo "<script>alert('Wooho, Your will start from $start to $arrival on $route '), window.location.replace('./dashboard.php')</script>";
        }
        else{
            echo "<script>alert('Your Booking is failed, try again'), window.location.replace('./dashboard.php')</script>";
        }
    }
?>