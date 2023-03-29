<?php
    session_start();
    if(!isset($_SESSION['id'])) {
        // User is not logged in, redirect to the login page
        header('Location: ../../login.php');
        exit;
    }
    include '../php/connect.php';
    if(isset($_POST['addBbook'])){
        $client = $_SESSION['id'];
        $quantity = $_POST['quantity'];
        // $price = $_POST['price'];
        $day = $_POST['day'];
        $addCarBook = "INSERT INTO bookcar VALUES(NULL, '$client', '$quantity', now(), '$day')";
        // $editCarAvailable = "UPDATE cars SET Quantity = Quantiy-'$quantity'";
        $query = mysqli_query($con, $addCarBook);
        // $query1 = mysqli_query($con, $editCarAvailable);

        if($query){
            echo "<script>alert('Your Booking is succed in $day days'), window.location.replace('./dashboard.php')</script>";
        }
        else{
            echo "<script>alert('Your Booking is failed, try again'), window.location.replace('./dashboard.php')</script>";
        }
    }
?>